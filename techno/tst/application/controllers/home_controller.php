<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_controller extends CI_Controller {

	public function index()
	{
		$this->load->model('home_model');
		$data["list"] = $this->home_model->getAllProducts();
		$data["list1"] = $this->home_model->getjoinProducts();

		$this->load->view('home',$data);
	}
	public function login(){
  	 		$this->load->model('home_model');	
    // $username=$this->input->post('username');
    //  $password=$this->input->post('password');
       // echo "hello";

      //  $this->home_model->insert_data($username,$password);
        $this->load->view('common/login');
    }


    public function insert_data(){
  		
     $username=$this->input->post('username');
      $password=$this->input->post('password');

        $this->home_model->insert_data($username,$password);


  		  	}

	
	
}