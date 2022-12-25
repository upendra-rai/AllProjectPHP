<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct(){

		parent::__construct();

        $this->load->model('model_home');
	}
    
    public function index(){
        $data['myproduct']  = $this->model_home->selectproduct();
         $data['banner']  = $this->model_home->selectbanner();
       
        $this->load->view('index',$data);
    }
    
  
    
    public function add_to_cart(){
      /*$number_id=$this->uri->segment(3);
      
        $data['cart_data']  = $this->model_home->selectedproduct($number_id);
       
        
        $session_data = $this->session->set_userdata('my_cart', $data);
        
       //print_r($this->session->get_userdata('my_cart'));
        
         $this->load->view('cart',$data);*/
    }
      
       public function checkout(){
        /*   $cart_total = $this->input->post('cart_total');
           $name = $this->input->post('name');
           $mobilenumber = $this->input->post('mobilenumber');
           $email = $this->input->post('email');
           $city = $this->input->post('city');
           $state = $this->input->post('state');
           $pincode = $this->input->post('pincode');
           $address = $this->input->post('address');
           $data['cart_data']  = $this->model_home->checkout($cart_total,$name,$mobilenumber,$email,$city,$state
,$pincode,$address);*/
           
       }
	
}
