<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modcitas extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->crud=new grocery_CRUD();
	}
	public function index()
	{
		$data["Usuario"]=$this->session->userdata('nombre');
		$data["modulo"]="Citas Medicas";
		$data['descripcion']="Citas";

		//cargar tema de la tabla flexigrid/datatables
		$this->crud->set_theme('flexigrid');
		//definiendo la tabla a la que va dirigida
		$this->crud->set_table('citas');		
		//relaciones
		$this->crud->set_relation("paciente","paciente","nombre");
		$this->crud->set_relation("medico","medico","nombre");
		//cargar la tabla
		$this->crud->fields("paciente","medico","fecha","hora","observaciones");
		$this->crud->required_fields("paciente","medico","fecha","hora","observaciones");
		$this->crud->set_subject("Listado de citas");
		$this->crud->display_as('paciente','Seleccione paciente');
		$this->crud->display_as('medico','Seleccione medicos');
		$this->crud->display_as('fecha','Seleccione fecha');
		$this->crud->display_as('hora','Ingrese hora');
		$this->crud->display_as('observaciones','Ingrese observacion');
		$this->crud->columns("paciente","medico","fecha","hora","observaciones");

		//cargar la vista
		$tabla=$this->crud->render();

		//los tres componentes neesarios
		$data['contenido']=$tabla->output;
		$data['js_files']=$tabla->js_files;
		$data['css_files']=$tabla->css_files;

		$this->load->view('crud',$data);
	}
}
