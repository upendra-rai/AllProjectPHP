<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class octopus extends CI_Controller {

	
	public function index()
	{
		$this->load->view('octopus_view');
	}
}