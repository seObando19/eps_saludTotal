<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modusuarios extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
		//instanciar la libreria
		$this->crud=new grocery_CRUD();
		$this->load->model('busquedas_model');
        /*if(!$this->session->userdata('id'))
	{
		redirect('login');
	} */
    }
	public function index()
	{
		$data["Usuario"]=$this->session->userdata('nombre');
		$data["modulo"]="Pacientes";
		$data["descripcion"]="Registro de pacientes";

		//cargar tema de la tabla flexigrid/datatables
		$this->crud->set_theme('flexigrid');

		//cargar la tabla
		$this->crud->set_table('usuarios');		
		$this->crud->fields("nombre","correo","clave","telefono","fechaingreso","fechamodificacion");
		$this->crud->required_fields("nombre","correo","clave","telefono");
		$this->crud->set_subject("Listado de pacientes");
		$this->crud->display_as("nombre","nombre");
		$this->crud->display_as("correo","correo");
		$this->crud->display_as("clave"," clave");
		$this->crud->display_as("telefono"," telefono");		
		$this->crud->display_as("fechaingreso","Fecha de registro");
		$this->crud->display_as("fechamodificacion","Ultima modificacion");
		$this->crud->columns("nombre","correo","clave","telefono","fechaingreso");
		

		//Aplicar el render  que es ejecutar estas variables y esperar los 3 componentes

		//para cargar en la vista
		$tabla=$this->crud->render();

		//los tres componentes que se llaman output,js_files y css_files
		$data["contenido"]=$tabla->output;
		$data["js_files"]=$tabla->js_files;
		$data["css_files"]=$tabla->css_files;
		$data['nombreusuario']=$this->session->userdata('nombre');
		$data['cantuser']=$this->busquedas_model->totalPacientes();
		$data['cantmedico']=$this->busquedas_model->totalMedicos();		
		$this->load->view('crud', $data);
	}
}
