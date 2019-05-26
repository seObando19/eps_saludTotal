<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class historiaClinica extends CI_Controller {

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
		$data["modulo"]="Historias";
		$data['descripcion']="Historia clinica";

		//cargar tema de la tabla flexigrid/datatables
		$this->crud->set_theme('flexigrid');

		//cargar la tabla
		$this->crud->set_table('historia_clinica');
        $this->crud->set_relation("paciente","paciente","nombre");
        $this->crud->set_relation("medico","medico","nombre");
		$this->crud->fields("paciente","medico","lugar_nacim","estatura","peso","profesion","motivo","antecedente","diagnostico","tratamiento");
		$this->crud->required_fields("paciente","medico","estatura","peso","profesion","motivo","antecedente","diagnostico","tratamiento");
		$this->crud->set_subject("Listado historias clinicas");
		$this->crud->display_as('paciente','Seleccione paciente');
		$this->crud->display_as('medico','Seleccione medico');
		$this->crud->display_as('estatura','Ingrese estatura');
		$this->crud->display_as('peso','Ingrese peso');
		$this->crud->display_as('profesion','Ingrese profesion');
		$this->crud->display_as('motivo','Ingrese motivo de consulta');
		$this->crud->display_as('antecedente','Ingrese antecedentes');
		$this->crud->display_as('diagnostico','Ingrese diganostico');
		$this->crud->display_as('tratamiento','Ingrese tratamiento');		
        $this->crud->columns("paciente","medico","estatura","peso","antecedente","diagnostico","tratamiento","fechaingreso");
        

		//Aplicar el render  que es ejecutar estas variables y esperar los 3 componentes

		//para cargar en la vista
		$tabla=$this->crud->render();

		//los tres componentes que se llaman output,js_files y css_files
		$data['contenido']=$tabla->output;
		$data['js_files']=$tabla->js_files;
		$data['css_files']=$tabla->css_files;
		$data['nombreusuario']=$this->session->userdata('nombre');

		$this->load->view('historiaclinica',$data);
	}
}