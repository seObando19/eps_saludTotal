<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modinformes extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('grocery_CRUD');
		$this->crud=new grocery_CRUD();
		$this->load->model("busquedas_model");
	}
	public function informesPacientes()
	{	
		$data["Usuario"]=$this->session->userdata('nombre');
		$data["modulo"]="Pacientes";
		$data["descripcion"]="Registro de pacientes";

		//cargar tema de la tabla flexigrid/datatables
		$this->crud->set_theme('flexigrid');

		//cargar la tabla
		$this->crud->set_table('paciente');		
		$this->crud->columns("nombre","apellido","telefono","email","direccion","ciudad","identificacion");
		$this->crud->unset_add();
		$this->crud->unset_edit();
		$this->crud->unset_clone();
		$this->crud->unset_delete();
		$this->crud->unset_read();
		$this->crud->unset_back_to_list();
		
		$data['lista']=$this->busquedas_model->listar();		
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
	public function informesMedicos()
	{
		$data["Usuario"]=$this->session->userdata('nombre');
		$data["modulo"]="Medicos";
		$data['descripcion']="Registro de medicos";
		$this->crud->set_theme('flexigrid');
		$this->crud->set_table('medico');
		$this->crud->columns('nombre','apellido','telefono','email','direccion','ciudad','identificacion');
		$this->crud->unset_add();
		$this->crud->unset_edit();
		$this->crud->unset_clone();
		$this->crud->unset_delete();
		$this->crud->unset_read();
		$this->crud->unset_back_to_list();
		$data['lista']=$this->busquedas_model->listar();	
		$tabla=$this->crud->render();
		//los tres componentes que se llaman output,js_files y css_files
		$data['contenido']=$tabla->output;
		$data['js_files']=$tabla->js_files;
		$data['css_files']=$tabla->css_files;
		$data['nombreusuario']=$this->session->userdata('nombre');
		$data['cantuser']=$this->busquedas_model->totalPacientes();
		$data['cantmedico']=$this->busquedas_model->totalMedicos();
		$this->load->view('crud',$data);
	}
}
