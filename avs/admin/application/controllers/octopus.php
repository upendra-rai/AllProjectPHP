<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class octopus extends CI_Controller {
  

    public function __construct()
        {
                parent::__construct();
                // Your own constructor code
               if(!$this->session->userdata('user_login')){
                	redirect(base_url().'login/login');
                }
        }
	
	public function index()
	{

		
                $this->load->view('octopus_view');     
		
		
	}
}