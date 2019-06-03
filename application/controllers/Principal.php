<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('busquedas_model');	
		if(!$this->session->userdata('pkid'))
		{
			redirect('login');
		}
		
	}

	public function index()
	{
		$data['nombreusuario']=$this->session->userdata('nombre');
		$data['cantuser']=$this->busquedas_model->totalPacientes();
		$data['cantmedico']=$this->busquedas_model->totalMedicos();
		$this->load->view('principal',$data);
	}
}
