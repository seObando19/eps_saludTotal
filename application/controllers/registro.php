<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    function _construct()
    {
        parent::__construct();
        $this->load->model("usuarios_model");
    }
	public function index()
	{
		$this->load->view('registro');
	}
}
