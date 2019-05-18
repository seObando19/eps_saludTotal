<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modpaciente extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
		//instanciar la libreria
        $this->crud=new grocery_CRUD();
        /*if(!$this->session->userdata('id'))
	{
		redirect('login');
	} */
    }
	public function index()
	{
		$data["Usuario"]=$this->session->userdata('nombre');
		$data["modulo"]="registros";
		$data["descripcion"]="Registro de usuarios";

		//cargar tema de la tabla flexigrid/datatables
		$this->crud->set_theme('flexigrid');

		//cargar la tabla
		$this->crud->set_table('paciente');
		$this->crud->set_relation("ciudad","ciudad","ciudad");
		$this->crud->fields("nombre","apellido","telefono","email","direccion","ciudad","identificacion","observaciones");
		$this->crud->required_fields("nombre","apellido","telefono","email","direccion","ciudad","identificacion");
		$this->crud->set_subject("Listado de pacientes");
		$this->crud->display_as("nombre","nombre");
		$this->crud->display_as("apellido","apellido");
		$this->crud->display_as("telefono"," telefono");
		$this->crud->display_as("email"," email");
		$this->crud->display_as("direccion"," direccion");
		$this->crud->display_as("ciudad","Seleccione ciudad");
		$this->crud->display_as("identificacion","identificacion");
		$this->crud->display_as("observaciones","observaciones");
		//$this->crud->display_as("lugar_nacim","ciudad");
		$this->crud->display_as("fechaingreso","Fecha de registro");
		$this->crud->display_as("fechamodificacion","Ultima modificacion");
		$this->crud->columns("nombre","apellido","telefono","email","direccion","ciudad","identificacion","observaciones");
		

		//Aplicar el render  que es ejecutar estas variables y esperar los 3 componentes

		//para cargar en la vista
		$tabla=$this->crud->render();

		//los tres componentes que se llaman output,js_files y css_files
		$data["contenido"]=$tabla->output;
		$data["js_files"]=$tabla->js_files;
		$data["css_files"]=$tabla->css_files;

		$this->load->view('crud', $data);
	}
}
