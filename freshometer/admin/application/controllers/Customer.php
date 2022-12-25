<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		
		 

		$this->load->library('session');
         $this->load->helper('form');
        
        $this->load->model('model_dashboard');
        $this->load->model('model_customer');
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
		$this->load->view('home', $data);

	}
/*  //////// Add Customer /////// */
	public function add_customer(){
        $data['active_menu'] = "customer";
        if($this->input->post('firstname') != ''){
            
            $firstname  =  $this->input->post("firstname");
			//$lastname  =  $this->input->post("lastname");
			$mobileno  =  $this->input->post("mobileno");
            $mobileno2  =  $this->input->post("mobileno2");
            if($mobileno2 == ''){
                
                $mobileno2 = null;
            }
            
			//$email  =  $this->input->post("email");
			$address1  =  $this->input->post("address1");
			$address2  =  $this->input->post("address2");
		
			$colony  =  $this->input->post("colony");
            
            $weight  =  $this->input->post("weight");
            $height  =  $this->input->post("height");
            $allergy  =  $this->input->post("allergy");
            $reffrence  =  $this->input->post("reffrence");
            
            $gender =  $this->input->post("gender");
            $dob =  $this->input->post("dob");
			//$city  =  $this->input->post("city");
           // $delivery_type  =  $this->input->post("delivery_type");
			//$advance_payment  =  $this->input->post("advance_payment");
			//$card_no  =  $this->input->post("card_no");
             $data['r_first_name'] = $firstname;
               $data['r_lastname'] = $lastname;
               $data['r_mobileno'] = $mobileno;
               $data['r_mobileno2'] = $mobileno2;
               //$data['r_email'] = $email;
               $data['r_address1'] = $address1;
               $data['r_address2'] = $address2;
               $data['r_colony'] = $colony;
               //$data['r_city'] = $city;
               //$data['r_delivery_type'] = $delivery_type;
               //$data['r_advance_payment'] = $advance_payment;
               //$data['r_card_no'] = $card_no;
               $data['r_weight'] = $weight;
               $data['r_height'] = $height;
               $data['r_allergy'] = $allergy;
               $data['r_reffrence'] = $reffrence;
               $data['r_gender'] = $gender;
               $data['r_dob'] = $dob;
            
            
           $data['message'] =  $this->model_customer->add_customer_submit($firstname,$mobileno,$mobileno2,$address1,$address2,$colony,$gender,$dob,$weight,$height,$allergy,$reffrence);
          
              
               
               $data['select_colony'] = $this->model_customer->select_colony();
               $this->load->view('customer/add_customer',$data);
           
        }else{
           $data['select_colony'] = $this->model_customer->select_colony();
		   $this->load->view('customer/add_customer',$data);
        }
	}
	
	public function form_submit(){
					
		if(isset($_POST["card_no"])){
			
			$firstname  =  $_POST["firstname"];
			$lastname  =  $_POST["lastname"];
			$mobileno  =  $_POST["mobileno"];
            $mobileno2  =  $_POST["mobileno2"];
			$email  =  $_POST["email"];
			$address1  =  $_POST["address1"];
			$address2  =  $_POST["address2"];
			$postcode  =  $_POST["postcode"];
			$colony  =  $_POST["colony"];
			$city  =  $_POST["city"];
            $delivery_type  =  $_POST["delivery_type"];
			$advance_payment  =  $_POST["advance_payment"];
			$card_no  =  $_POST["card_no"];
		
			/* echo $firstname.$lastname.$mobileno.$email.$address1.$address2.$postcode.$colony.$city.$advance_payment.$card_no; */
			
			$this->model_customer->add_customer_submit($firstname,$lastname,$mobileno,$mobileno2,$email,$address1,$address2,$postcode,$colony,$city,$delivery_type,$advance_payment,$card_no);
		}			
		
	}
	
	
	
	
	
/*  ////////\\\\\\\\ ///////\\\\\\\\\\ */	

/*  //////// list Customer /////// */

	public function list_customer(){
        
        $data['active_menu'] = "customer";
		$data['customer_list'] = $this->model_customer->fetch_customer();
		$this->load->view('customer/list_customer',$data);
	}
	
	public function view_customer(){
        $data['active_menu'] = "customer";
        $linked_no =  $this->uri->segment(3);
        $switch = $this->uri->segment(4);
        if(isset($switch)){
                
                $data['switch'] =  $this->uri->segment(4);
                $data['detail_recharge'] =  $this->model_customer->customer_rech_report2($linked_no);
                $data['detail_transaction'] =  $this->model_customer->customer_tran_report2($linked_no);
                $data['select_plan'] = $this->model_customer->select_plan();
            
                $data['detail'] = $this->model_customer->view_customer($linked_no);
		        $this->load->view('customer/view_customer',$data);
        }else{
                $data['switch'] =  "no";
            
                $data['select_plan'] = $this->model_customer->select_plan();
                $data['detail'] = $this->model_customer->view_customer($linked_no);
                $data['minimum_recharge'] =  $this->model_customer->select_recharge_limit();
		        $this->load->view('customer/view_customer',$data);
        }
        
        if($this->input->post('submit')){
            
            $plan_id = $this->input->post('plan');
            $order_start_date = $this->input->post('start_date');
            $order_end_date = $this->input->post('end_date');
            $shift = $this->input->post('plan_shift');
            $plan_cost = $this->input->post('plan_cost');
            
            if($plan_id && $order_start_date && $order_end_date && $shift && $plan_cost){
             $data['detail'] = $this->model_customer->add_subscription($plan_id,$order_start_date,$order_end_date,$linked_no,$shift,$plan_cost);
            }
         
        }
        
	}
    
    
    
    
    public function assign_card($linked_no){
		$data['active_menu'] = "customer";
        if($this->input->post('customer_id') != ''){
            $customer_id = $this->input->post('customer_id');
            $old_card = $this->input->post('old_card_no');
            $new_card = $this->input->post('new_card_no');
            $card_status = $this->input->post('card_status');
            
            $data['message'] = $this->model_customer->assign_card($customer_id,$old_card,$new_card,$card_status);
            $data['edit_detail'] = $this->model_customer->edit_customer($linked_no);
            $this->load->view('customer/assign_card',$data);
            
        }else{
        
        $data['edit_detail'] = $this->model_customer->edit_customer($linked_no);
		$this->load->view('customer/assign_card',$data);
            
        }
	}
	
	public function edit_customer($linked_no){
        $data['active_menu'] = "customer";
        if($this->input->post('firstname') != ''){
            
            $firstname  =  $this->input->post("firstname");
			
			$mobileno  =  $this->input->post("mobileno");
            $mobileno2  =  $this->input->post("mobileno2");
            if($mobileno2 == ''){
                
                $mobileno2 = null;
            }
            
			$email  =  $this->input->post("email");
			$address1  =  $this->input->post("address1");
			
			$colony  =  $this->input->post("colony");
			$dob  =  $this->input->post("dob");
            $gender  =  $this->input->post("gender");
            $customer_id = $this->input->post("customer_id");
			
            
           $data['message'] =  $this->model_customer->edit_customer_submit($firstname,$mobileno,$mobileno2,$email,$address1,$colony,$dob,$gender,$customer_id);
           $data['edit_detail'] = $this->model_customer->edit_customer($linked_no);
             $data['select_colony'] = $this->model_customer->select_colony();
            $this->load->view('customer/edit_customer',$data);
        }else{
           
		   $data['edit_detail'] = $this->model_customer->edit_customer($linked_no);
             $data['select_colony'] = $this->model_customer->select_colony();
		  $this->load->view('customer/edit_customer',$data);
        }
        
        
	}
	
	public function form_submit_edit(){
					
		if(isset($_POST["card_no"])){
			
			$firstname  =  $_POST["firstname"];
			$lastname  =  $_POST["lastname"];
			$mobileno  =  $_POST["mobileno"];
            $mobileno2  =  $_POST["mobileno2"];
			$email  =  $_POST["email"];
			$address1  =  $_POST["address1"];
			$address2  =  $_POST["address2"];
			$postcode  =  $_POST["postcode"];
			$colony  =  $_POST["colony"];
			$city  =  $_POST["city"];
            $delivery_type  =  $_POST["delivery_type"];
			$advance_payment  =  $_POST["advance_payment"];
			$card_no  =  $_POST["card_no"];
		
			/* echo $firstname.$lastname.$mobileno.$email.$address1.$address2.$postcode.$colony.$city.$advance_payment.$card_no; */
			
			$this->model_customer->edit_customer_submit($firstname,$lastname,$mobileno,$mobileno2,$email,$address1,$address2,$postcode,$colony,$city,$delivery_type,$advance_payment,$card_no);
		}			
		
	}
    
    
    public function recharge_account(){
        if(isset($_POST['link_id'],$_POST['recharge_value'])){
            
			$recharge_value = $_POST['recharge_value'];
			$link_id = $_POST['link_id'];
            $r_mobile ="";
           
			$this->model_customer->recharge_account($recharge_value,$link_id,$r_mobile);
			
		}else{
            
            echo "something wrong";
        }
	}
    
    public function block_accout(){
        if(isset($_POST['link_id'])){
			$link_id = $_POST['link_id'];
			$this->model_customer->block_accout($link_id);
		}else{
            echo "something wrong";
        }
	}
    
    public function unblock_accout(){
        if(isset($_POST['link_id'])){
			$link_id = $_POST['link_id'];
			$this->model_customer->unblock_accout($link_id);
		}else{
            echo "something wrong";
        }
	}
    
	public function delete_customer(){
        if(isset($_POST['link_id'])){
			
			$link_id = $_POST['link_id'];
			$this->model_customer->delete_customer($link_id);
			
		}
	}
    
    public function customer_tran_report($id){
        
        $this->model_customer->customer_tran_report($id);
       
    } 
    
    public function customer_rech_report($id){
       
        $this->model_customer->customer_rech_report($id);
       
    } 
    
    public function delete_transaction(){
         $transaction_id =  $this->uri->segment(3);
         $customer_id =  $this->uri->segment(4);
         $this->model_customer->delete_transaction($transaction_id,$customer_id);
       
    }
    public function delete_recharge(){
         $transaction_id =  $this->uri->segment(3);
         $customer_id =  $this->uri->segment(4);
         $this->model_customer->delete_recharge($transaction_id,$customer_id);
       
    }
/*  ////////\\\\\\\\ ///////\\\\\\\\\\ */	

    
	public function enter_code(){

		$this->model_dashboard->enter_code();
	}
// //-----//////------/////--------/////////------///////
// //======= Renew Plan Section ======//////
// //-----//////------/////--------/////////-------//////	
	
	public function renew_plan(){
          $customer_id = $this->uri->segment(3);
		   
		  // echo $customer_id;
		  $this->model_customer->renew_plan($customer_id);
        
    }
	
}
