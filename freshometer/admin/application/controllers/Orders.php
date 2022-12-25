<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class orders extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		
		 

		$this->load->library('session');
         $this->load->helper('form');
        
        $this->load->model('model_orders');
         if($this->session->userdata('logged_in') !== 'messcafe_login'){
			redirect('./admin/login');
		}
		
	}

	public function init($active_menu){
        
		$uid = $this->session->userdata('uid');
		$data['user_data'] = $this->model_dashboard->user_data($uid);
		
		$data['active_menu'] = $active_menu;

		return $data;
	}

	public function index(){
		
        $this->load->helper('form');
       

	}
    
   
    
    public function orders(){
        
         $data['active_menu'] = "orders";
        $data['active_submenu'] = "orders_list";
         if($this->input->post('submit') != ""){
              $status = $this->input->post('order_status');
              $shift = $this->input->post('shift');
              $colony = $this->input->post('colony_search');
              $plan = $this->input->post('plan');
             
              $data['return_status'] = $status;
              $data['return_shift']  =   $shift;
              $data['return_colony']  =   $colony;
              $data['return_plan']  =   $plan;
             
              $data['select_colony'] =  $this->model_orders->select_colony();
              $data['select_plan'] =  $this->model_orders->select_plan();
             
              $data['order_list'] =  $this->model_orders->view_order_searchbar($status,$shift,$colony,$plan);
             
            $this->load->view('orders/orders',$data);
             
         }else if($this->input->post('delete_order') != ""){
             $customer_id = $this->input->post('delete_order');
             $status = $this->input->post('order_status');
             echo $status;
         }else{
             
             date_default_timezone_set('Asia/Kolkata');
             $date = new DateTime();
             $current_date = $date->format('Y-m-d');
             $time_stamp = $date->format('Y-m-d H:i:s');  
             $get_time = date("H:i:s");
              if($get_time >= '06:00:00'  && $get_time <= '10:30:00'){
                    $shift_id = 1;
                }else if($get_time >= '10:31:00'  && $get_time <= '15:00:00'){
                   $shift_id = 2;
             }else{
                 $shift_id = 3;
             }
             
             $data['return_status'] = '';      
             $data['return_shift']  =   $shift_id;
             $data['select_colony'] =  $this->model_orders->select_colony();
             $data['select_plan'] =  $this->model_orders->select_plan();
             $data['order_list'] =  $this->model_orders->view_order();
            // echo json_encode($data);
             $this->load->view('orders/orders',$data);
             
         }
    }
    
    public function assign_tifin($id){
        
          $data['active_menu'] = "orders";
        $data['active_submenu'] = "orders_list";
         $customer_id = $this->uri->segment(3);
         $order_shift = $this->uri->segment(4);
        
         if($this->input->post('team_name') != ""){
             
             
         }else{
             
             $data['return_shift'] = $order_shift;
             $data['order_list'] =  $this->model_orders->view_selected_order($customer_id,$order_shift);
             $this->load->view('orders/assign_tifin',$data);
             
         }
        
    }
    
    public function assign_card_submit(){
        
        if(isset($_POST['card_no'],$_POST['customer_id'])){
            
            $card_no  = $_POST['card_no'];
            $customer_id =  $_POST['customer_id'];   
            $order_shift = $_POST['order_status'];
            
            //echo $card_no.$customer_id;
            $this->model_orders->assign_card_submit($card_no,$customer_id,$order_shift);
        }
        
    }
    
    
    public function delete_assigned_order(){
        
        if(isset($_POST['customer_id'])){
            $customer_id = $_POST['customer_id'];
            $shift =  $_POST['shift'];
            
            $this->model_orders->delete_assigned_order($customer_id,$shift);
        }
        
    }
 
    
    // incomplete orders
    
    public function incomplete_orders(){
        
              $data['active_menu'] = "orders";
             $data['active_submenu'] = "incomplete_orders";
             $data['order_list'] =  $this->model_orders->incomplete_orders();
             $this->load->view('orders/uncomplete_orders',$data);
        
        
    }
    
    public function reset_incomplete_orders(){
        
       if(isset($_POST['customer_id'])){
            $customer_id = $_POST['customer_id'];
            $tifin_id =  $_POST['tifin_id'];
            $order_shift = $_POST['order_shift'];
            if($order_shift == 'morning'){
                $shift_id = 1;
            }else if($order_shift == 'evening'){
                $shift_id = 2;
            } 
           
           
           $this->model_orders->reset_incomplete_orders($customer_id,$tifin_id,$shift_id);
        } 
        
    }
}
