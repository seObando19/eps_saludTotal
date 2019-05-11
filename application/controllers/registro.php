<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

    function _construct()
    {
        parent::__construct();
        $this->load->library('grocery_CRUD');
		//instanciar la libreria
        $this->crud=new grocery_CRUD();
        if(!$this->session->userdata('id'))
	{
		redirect('login');
	}
    }
	public function index()
	{
		$data[""];
	}
}
