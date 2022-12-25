<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hair extends CI_Controller {

	
	public function index()
	{
		$this->load->view('hair_view');
	}
}