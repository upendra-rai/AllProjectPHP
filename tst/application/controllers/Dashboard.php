<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

	
	public function emp()
	{
		$this->load->view('emp');
	}
}