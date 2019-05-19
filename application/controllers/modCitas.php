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
		$data["modulo"]="Historias";
		$data['descripcion']="Historia clinica";

		//cargar tema de la tabla flexigrid/datatables
		$this->crud->set_theme('flexigrid');
		//definiendo la tabla a la que va dirigida
		$this->crud->set_table('citas');
		//cargar la tabla
		

		$this->load->view('welcome_message');
	}
}
