<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    function __construct(){

		parent::__construct();

        $this->load->model('model_home');
	}

	
	public function index()
	{
         //$data['profile_details'] = $this->model_main_profile->getprofile();
		 $this->load->view('school_view');
	}
}
