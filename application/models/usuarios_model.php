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
	function ingresar()
	{
		/*
		como se hizo en el acceso de login se recuperan las variables, se les aplica el xss clean perguntar po el campo unico correo
		*/
		$nombre=$this->input->post('nombre');
		$correo=$this->input->post('correo');
		$clave=$this->input->post('clave');
		$telefono=$this->input->post('telefono');	
		//
		$nombre=$this->security->xss_clean($nombre);
		$correo=$this->security->xss_clean($correo);
		$clave=$this->security->xss_clean($clave);
		$telefono=$this->security->xss_clean($telefono);		
		//
		/*
		Para validar si un registro ya existe podemos usar la funcion get_where de CI 
		la cual si encuentra registro  devuelve el array o en caso contrario devuelve en array pero en 0
		*/
		//
		$query=$this->db->get_where("usuarios",array("correo"=>$correo));
		$resultado=$query->result_array();
		if(count($resultado)>0)
		{
			$resp="este regisro ya se encuentra. revise los datos";
		}else
		{
			//el siguiente proceso aplica tanto para modificar o inserta. CI nos recomienda pasar los datos en un array y ejecutar insert o el update
			$vector=array(
				"nombre"=>$nombre,
				"correo"=>$correo,
				"clave"=>md5($clave),				
				"telefono"=>$telefono,				
			);
			$this->db->insert("usuarios",$vector);
			$resp="Registro insertado con exito";
		}
		return $resp;
	}
}
