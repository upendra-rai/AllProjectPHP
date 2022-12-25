<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer extends CI_Controller {

	function __construct(){

		parent::__construct();
         $this->load->model('model_home');

        
	}
    
    public function index(){
        
    }
     public function my_profile(){
         
         $customer_id=$this->session->userdata('customerlogin_id');
         $data['selected_customer']=$this->model_home->selected_customer($customer_id);
          $data['noti_unread']=$this->model_home->unread_notification($customer_id);
         $data['active_cus'] = 'my_profile';
         $this->load->view('profile',$data);
    }
    public function order_history(){
          $data['active_cus'] = 'order';
         $customer_id=$this->session->userdata('customerlogin_id');
         $data['selected_customer']=$this->model_home->selected_customer($customer_id);
          $data['noti_unread']=$this->model_home->unread_notification($customer_id);
        $data['order_history']=$this->model_home->select_order($customer_id);
         $this->load->view('order',$data);
    }
     public function my_wallet(){
           $data['active_cus'] = 'wallet';
         $customer_id=$this->session->userdata('customerlogin_id');
           $data['noti_unread']=$this->model_home->unread_notification($customer_id);
           $data['selected_customer']=$this->model_home->selected_customer($customer_id);
         $data['payments']=$this->model_home->select_customer_payments($customer_id);
         $this->load->view('wallet',$data);
    }
      public function my_points(){
          $customer_id=$this->session->userdata('customerlogin_id');
           $data['selected_customer']=$this->model_home->selected_customer($customer_id);
            $data['active_cus'] = 'points';
            $data['noti_unread']=$this->model_home->unread_notification($customer_id);
         $this->load->view('points',$data);
    }
      public function coupans(){
            $data['active_cus'] = 'coupans';
          $customer_id=$this->session->userdata('customerlogin_id');
           $data['selected_customer']=$this->model_home->selected_customer($customer_id);
            $data['noti_unread']=$this->model_home->unread_notification($customer_id);
           $data['coupans']=$this->model_home->selected_coupan($customer_id);
         $this->load->view('coupans',$data);
    }
      public function notifications(){
            $data['active_cus'] = 'notification';
           $customer_id=$this->session->userdata('customerlogin_id');
           $data['selected_customer']=$this->model_home->selected_customer($customer_id);
            $data['noti_unread']=$this->model_home->unread_notification($customer_id);
           $data['notification']=$this->model_home->selected_notification($customer_id);
         $this->load->view('notification',$data);
    }
    public function read_notification(){
          $data['active_cus'] = 'notification';
        $customer_id=$this->session->userdata('customerlogin_id');
        $notification_id=$this->uri->segment(3);
          $data['noti_unread']=$this->model_home->unread_notification($customer_id);
         $data['selected_notification']=$this->model_home->select_notification($notification_id);
         $this->load->view('read_notification',$data);
    }
      public function change_password(){
            $data['active_cus'] = 'password';
          if( $this->input->post('submit')){
              $customer_id=$this->session->userdata('customerlogin_id');
              $data['noti_unread']=$this->model_home->unread_notification($customer_id);
             $current_password= $this->input->post('current_password');
                $new_password= $this->input->post('new_password');
              $data['msg']=$this->model_home->change_password($current_password,$new_password,$customer_id);
               $this->load->view('password',$data);
          }else{
              $customer_id=$this->session->userdata('customerlogin_id');
              
              $data['selected_customer']=$this->model_home->selected_customer($customer_id);
              $data['noti_unread']=$this->model_home->unread_notification($customer_id);
              $this->load->view('password',$data);
          }
           
    }
     
     public function login(){
         $data['active_cus'] = '';
         
          $customer_id=$this->session->userdata('customerlogin_id');
         if($this->input->post('submit')){
             $username=$this->input->post('mobileno');
             $password=$this->input->post('password');
                  $data['msg']=$this->model_home->login($username,$password); 
            // print_r ($data);
              $this->load->view('login',$data);
         }else{
              if($customer_id){
                 redirect ('customer/my_profile') ;   
             }else{
                 $this->load->view('login',$data);
             }
               
         }
           
    }
     public function signup(){
         
         if($this->input->post('name')){
             $name = $this->input->post('name');
         $email = $this->input->post('email_id');
         $mobileno = $this->input->post('mobileno');
         $password = $this->input->post('password');
         $address = $this->input->post('address');
        // echo $mobileno;
             $data['msg'] = $this->model_home->add_customer($name,$email,$mobileno,$password,$address);
             $this->load->view('signup',$data);
         } else{
              $data['active_cus'] = '';
              $customer_id=$this->session->userdata('customerlogin_id');
             if($customer_id){
                 redirect ('customer/my_profile') ;     
             }else{
                 $this->load->view('signup',$data);
             }
              
         }
        
    }
    public function logout(){
        $this->session->sess_destroy();
        redirect('home');    
    }
    public function order_confirmation(){
       $order_id = $this->uri->segment(3);
            $data['order'] = $this->model_home->select_order_confirmation($order_id);
       // print_r ($data);
      
         $this->load->view('order_confirmation',$data);
    }
    public function remove_cart(){
          $cart_id = $this->uri->segment(3);
         $data['msg'] = $this->model_home->remove_cart($cart_id);
    }
	
}
