<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class busquedas_model extends CI_model {

	function __construct()
	{
		//invocar helper de seguridad
		$this->load->helper('security');
	}
	function listar()
	{	
		$query=$this->db->get("paciente");
		return $query->result_array();
	}
	function totalPacientes()
	{
		$res=$this->db->count_all_results('paciente');
		return $res;
	}

	function totalMedicos()
	{
		$res=$this->db->count_all_results('medico');
		return $res;
	}

}
