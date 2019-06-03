<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicamentos extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->crud=new grocery_CRUD();
		$this->load->model('busquedas_model');
	}

	public function index()
	{
		$data['Usuario']=$this->session->userdata('nombre');
		$data['modulo']="Medicamentos";
		$data['descripcion']="Registro de medicamentos";

		$this->crud->set_theme('flexigrid');

		//
		$this->crud->set_table('medicamentos');
		$this->crud->fields('nombre','tipomedicamento');
		$this->crud->required_fields('nombre','tipomedicamento');
		$this->crud->set_subject('Listado de medicamentos');
		$this->crud->display_as('nombre','Ingrese nombre de medicamento');
		$this->crud->display_as('tipomedicamento','Ingrese tipo de medicamento');
		$this->crud->columns('nombre','tipomedicamento');

		$tabla=$this->crud->render();
		$data['contenido']=$tabla->output;
		$data['js_files']=$tabla->js_files;
		$data['css_files']=$tabla->css_files;
		$data['nombreusuario']=$this->session->userdata('nombre');
		$data['cantuser']=$this->busquedas_model->totalPacientes();
		$data['cantmedico']=$this->busquedas_model->totalMedicos();
		$this->load->view('crud',$data);
	}
}
