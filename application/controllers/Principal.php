<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	function __construct()
	{
		parent::__construct();	
		if(!$this->session->userdata('pkid'))
		{
			redirect('login');
		}
		
	}

	public function index()
	{
		$this->load->view('principal');
	}
}
