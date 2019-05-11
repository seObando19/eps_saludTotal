<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_model {

	public function index()
	{
		$this->load->view('usuarios');
	}
}
