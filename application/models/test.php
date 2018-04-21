<?php 

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('login_window');
	
	}


 ?>