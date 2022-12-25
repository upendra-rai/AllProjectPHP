<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class home extends CI_Controller {

	function __construct(){

		parent::__construct();

        $this->load->model('model_home');
	}
    
    public function index(){
        $data['myproduct']  = $this->model_home->selectproduct();
        $data['banner']  = $this->model_home->selectbanner();
        $data['list']  = $this->model_home->selectcart();
         //echo json_encode($data['myproduct']);
        $this->load->view('index',$data);
    }
    
  
    
    public function add_to_cart(){
      //  $product_id = $this->uri->segment(3);
       // $product_rate = $this->uri->segment(4);
        $ip_address = $this->input->ip_address();
        
        if(isset($_POST['product_id'])){
            
             $product_id = $_POST['product_id'];
             $data['cart_data']  = $this->model_home->add_to_cart($product_id,$ip_address);
        }
      
       
  
    }
    
    public function count_cart(){

        $ip_address = $this->input->ip_address();
        $data['list']  = $this->model_home->count_cart($ip_address);
    }
      
       public function checkout(){
           $cart_total = $this->input->post('cart_total');
          
           $name = $this->input->post('name');
           $mobilenumber = $this->input->post('mobilenumber');
           $email = $this->input->post('email');
           $city = $this->input->post('city');
           $state = $this->input->post('state');
           $pincode = $this->input->post('pincode');
           $address = $this->input->post('address');
           $data['cart_data']  = $this->model_home->checkout($cart_total,$name,$mobilenumber,$email,$city,$state
,$pincode,$address);
           
       }
    
    
      public function selected_product(){
          
          if(isset($_POST['product_id'])){
              
              $product_id = $_POST['product_id'];
             
               $data['list']  = $this->model_home->selected_cart_product($product_id);
              
              echo json_encode($data);
              
          }
          
      }
	
}
