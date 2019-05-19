<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_model {

	function __construct()
	{
		//invocar helper de seguridad
		$this->load->helper('security');
	}

	public function validar_acceso()
	{
		//1-espera estos 2 parametros del formulario
		$correo=$this->input->post('correo');
		$clave=$this->input->post('clave');

		//2-aplicar politicas de control
		//2-limpieza codigo malisioso
		$correo=$this->security->xss_clean($correo);
		$clave=$this->security->xss_clean($clave);
		
		//3-usar con el and o con el or
		//3-el vector debe ser asociativo y los nombres de las variables deben coincidir con los nombres de los campos
		$vector=array("correo"=>$correo,"clave"=>md5($clave));

		//4-get_where el cual es la tabla y el vector de los parametros que deseo
		$query=$this->db->get_where("usuarios",$vector);

		//5-retorno del la busqueda
		return $query->result_array();

	}
}
