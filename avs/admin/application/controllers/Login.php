<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class login extends CI_Controller {
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


	public function login(){
        if($this->input->post('submit')){
                   $user_name = $this->input->post('username');
		           $password = $this->input->post('password');
                   $this->login_model->login($user_name,$password);
                   
        }else{

               $this->load->view('login');

        }
		
	}


	public function logout(){

        $this->session->sess_destroy();
      
         redirect(base_url().'/login/login');

	}
	

	}