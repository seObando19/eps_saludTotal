<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modformulamedica extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		//instanciar la libreria
		$this->crud=new grocery_CRUD();
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
		//$this->crud->set_relation('referencia','referencia,referencia');
		$this->crud->fields("paciente","medico","fechaFormula","referencia1","cantidad1","referencia2","cantidad2","referencia3","cantidad3","observaciones");
		$this->crud->required_fields("paciente","medico","fechaFormula","referencia1","cantidad1","referencia2","cantidad2","referencia3","cantidad3");
		$this->crud->set_subject("Formulas medicas");
		$this->crud->display_as('paciente','Seleccione paciente');
		$this->crud->display_as('medico','Seleccione medico');
		$this->crud->display_as('fechaFormula','Ingrese fecha de la formula');
		$this->crud->display_as('referencia1','Ingrese referencia 1:');
		$this->crud->display_as('cantidad1','Ingrese cantidad');
		$this->crud->display_as('referencia2','Ingrese referencia 2:');
		$this->crud->display_as('cantidad2','Ingrese cantidad');
		$this->crud->display_as('referencia3','Ingrese referencia 3:');
		$this->crud->display_as('cantidad3','Ingrese cantidad');
		$this->crud->display_as('observaciones','ingrese observaciones');
		$this->crud->columns("paciente","medico","fechaFormula","referencia1","cantidad1","referencia2","cantidad2","referencia3","cantidad3");

		$tabla=$this->crud->render();

		$data['contenido']=$tabla->output;
		$data['js_files']=$tabla->js_files;
		$data['css_files']=$tabla->css_files;
		$this->load->view('crud',$data);
	}
}
