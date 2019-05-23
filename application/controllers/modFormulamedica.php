<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formulamedica extends CI_Controller {

	function __construct()
	{
		$this->load->library('grocery_CRUD');
		//instanciar la libreria
		$this->$crud=new grocery_CRUD();
	}
	
	public function index()
	{
		$data["Usuario"]=$this->session->userdata('nombre');
		$data["modulo"]="Formula medica";
		$data['descripcion']="Formulas";
		
		$this->crud->set_theme('flexigrid');

		$this->crud->set_table('formula_medica');
		$this->crud->set_relation("paciente","paciente","nombre");
		$this->crud->set_relation("medico","medico","nombre");
		$this->crud->set_relation('referencia','referencia,referencia');
		$this->fields()


		$this->load->view('welcome_message');
	}
}
