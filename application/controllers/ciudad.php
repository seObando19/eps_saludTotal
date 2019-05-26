<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudad extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->crud=new grocery_CRUD();
	}
	public function index()
	{
		$data["Usuario"]=$this->session->userdata('nombre');
		$data["modulo"]="Ciudades";
		$data["descripcion"]="Registro de ciudades";

		//cargar tema de la tabla flexigrid/datatables
		$this->crud->set_theme('flexigrid');
		$this->crud->set_table('ciudad');
		$this->crud->fields('ciudad');
		$this->crud->required_fields('ciudad');
		$this->crud->set_subject('Listado de ciudades');
		$this->crud->display_as('ciudad','Ingrese ciudad');
		$this->crud->columns('ciudad');
		
		$tabla=$this->crud->render();
		$data['contenido']=$tabla->output;
		$data['js_files']=$tabla->js_files;
		$data['css_files']=$tabla->css_files;
		$data['nombreusuario']=$this->session->userdata('nombre');
		$this->load->view('ciudad',$data);
	}
}
