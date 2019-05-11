<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    function _construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
		//instanciar la libreria
        $this->crud=new grocery_CRUD();
        if(!$this->session->userdata('id'))
	{
		redirect('login');
	}
    }
	public function index()
	{
		$data["Usuario"]=$this->session->userdata('nombre');
		$data["modulo"]="registros";
		$data['descripcion']="Registro de usuarios";

		//cargar tema de la tabla flexigrid/datatables
		$this->crud->sset_theme('flexigrid');

		//cargar la tabla
		$this->crud->set_table('paciente');
		$this->crud->set_relation("ciudad","historia_clinica","lugar_nacim");
		$this->crud->fields('nombre','apellido','telefono','email','direccion','ciudad','identificacion','observaciones','fechaingreso','fechamodificacion');
		$this->crud->required_fields('nombre','apellido','telefono','email','direccion','ciudad','identificacion');
		$this->display_as('nombre','Digite nombre');
		$this->display_as('apellido','Digite apellido');
		$this->display_as('telefono','Digite telefono');
		$this->display_as('email','Digite email');
		$this->display_as('direccion','Digite direccion');
		$this->display_as('ciudad','Seleccione ciudad');
		$this->display_as('identidicacion','Ingrese identificacion');
		$this->display_as('observaciones','Ingrese las observaciones');
		$this->display_as('lugar_nacim','ciudad');
		$this->crud->display_as("fechaingreso","Fecha de registro");
		$this->crud->display_as("fechamodificacion","Ultima modificacion");

		//Aplicar el render  que es ejecutar estas variables y esperar los 3 componentes

		//para cargar en la vista
		$tabla=$this->crud->render();

		//los tres componentes que se llaman output,js_files y css_files
		$data['contenido']=$tabla->output;
		$data['js_files']=$tabla->js_files;
		$data['css_files']=$tabla->css_files;

		$this->load->view('crud',$data);
	}
}
