<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model("usuarios_model");
	}

	public function index()
	{

		$this->load->view('logincopia');
	}
	public function acceso()
	{
		$data=$this->usuarios_model->validar_acceso();

		if(sizeof($data)>0)
		{
			//1-cargar las sesiones
			$data_session=array(
				'pkid'=>$data[0]['pkid'],
				'nombre'=>$data[0]['nombre'],
				'telefono'=>$data[0]['telefono'],
				'foto'=>$data[0]['foto']
			);
			
			//las sessiones em el ci no se cargan como normalmente  que se hace ---> session_star();$_SESSION			
			//en el CI se una es pasar los datos a un vector asociativo y luego ejecutar la funcion set_userdata
			//para que estos funcione debe estar la libreria session activa
			$this->session->set_userdata($data_session);
			redirect('principal');
		}
		else
		{
			redirect('login');
		}
	}
}
