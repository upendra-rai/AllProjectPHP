<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class enquiry extends CI_Controller {

	function __construct(){

		parent::__construct();
         $this->load->model('model_home');

	}
    
    public function index(){
         
         if($this->input->post('submit')){
         $required_number = $this->input->post('required_number');
          $budget = $this->input->post('budget');
          $name = $this->input->post('name');
          $email = $this->input->post('email');
          $number = $this->input->post('number');
          $address = $this->input->post('address');
          $city = $this->input->post('city');
         $post_code = $this->input->post('post_code');
              echo $required_number;
              $data['message']  = $this->model_home->insert_enquiry($required_number,$budget,$name,$email,$number,$address,$city,$post_code);
         
         }else{
                 
        $this->load->view('enquirynow');
     }
        
    }
    
   
	
}
