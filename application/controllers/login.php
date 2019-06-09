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

		$this->load->view('login');
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
	public function nuevo()
	{
		
		$data["nombreusuario"]=$this->session->userdata('nombre');		
		$data["titulo"]="Ingreso de nuevo Usuario";
		/*
		Proceso de insercion
		1-preguntamos si se pasa el vector _POST > 0
		2- si es mayor de cero, es por que estan enviando datos desde un formulario
		3- cargar el modelo que permita ingresar
		4- pasaremos una variable llamada mensaje a la vista en el cual le indicamos si el registro fue ingresado no
		*/
		if(count($this->input->post())>0)
		{
			$resp=$this->usuarios_model->ingresar();
			$data["mensaje"]=$resp;
		}

		redirect('principal');
	}	
}
