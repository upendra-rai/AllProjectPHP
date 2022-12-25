<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class notification extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		
		 

		$this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_dashboard');
        $this->load->model('model_notification');
     
       
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
       
		$data = $this->init('dashboard');
        
		
			 $this->load->helper('form');
		$this->load->view('home', $data);

	}
    
    public function notification(){
        $data['active_menu'] = "notification";
        
        if($this->input->post('submit') != ''){
           
            $name_search = $this->input->post('name_search');
            $colony_search = $this->input->post('colony_search');
            $status_search = $this->input->post('status_search');
            $mobile_no = $this->input->post('mobile_no');
            
            $data['return_name'] = $name_search;
            $data['return_colony'] = $colony_search;
            $data['return_status']  =   $status_search;
            $data['return_mobile_no']  =   $mobile_no;
            $data['select_colony'] = $this->model_notification->select_colony();
            $data['all_customer'] = $this->model_notification->customer_report_multi_searchbar($name_search,$colony_search,$status_search,$mobile_no);
            $this->load->view('notification/notification',$data);		
            
        }else if($this->input->post('submit_notification') != ''){
                
              $msg = $this->input->post('text_msg');
              $customer_id_array = $this->input->post('all_customer_id');
              $customer_mobile_no_array = $this->input->post('all_customer_mobile');
              
              $customer_id = explode(',',$customer_id_array);
              foreach($customer_id as $row){
                   $data['msg'] = $this->model_notification->send_notification($msg,$customer_id);
                  
              }
            
              $data['all_customer'] = $this->model_notification->select_customer_report();
              $this->load->view('notification/notification',$data);	
              
          }else{
             $data['all_customer'] = $this->model_notification->select_customer_report();
             $data['select_colony'] = $this->model_notification->select_colony();
             $this->load->view('notification/notification',$data);		
        }
    
       
		
	}    
    
    public function send_notification(){
          if(isset($_POST["title"])){
              
              $title = $_POST["title"];
              $msg = $_POST["msg"];
              $customer_id_array = $_POST["customer_id"];
              $customer_mobile_no_array = $_POST["mobile_no"];
              $send_type = $_POST["send_type"];
              
              if($send_type == "sms"){
                  
                   // echo $customer_mobile_no_array;
                  
                   // Authorisation details.
                 	$username = "contact@messcafe.in";
                 	$hash = "9f33b0d76319223254cc65ec66166f0267c5228f1452bc278cf4ac6afc155b2a";
                 
                 	// Config variables. Consult http://api.textlocal.in/docs for more info.
                 	$test = "0";
                 
                 	// Data for text message. This is the text message data.
                 	$sender = "TXTLCL"; // This is who the message appears to be from.
                 	$numbers = $customer_mobile_no_array; // A single number or a comma-seperated list of numbers
                 	$message = $msg;
                 	// 612 chars or less
                 	// A single number or a comma-seperated list of numbers
                 	$message = urlencode($message);
                 	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                 	$ch = curl_init('http://api.textlocal.in/send/?');
                 	curl_setopt($ch, CURLOPT_POST, true);
                 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                 	$result = curl_exec($ch); // This is the result from the API
                 	curl_close($ch);
                     $result = json_decode($result);              
                      if ($result->status == 'success') {
                            echo 'success';
                      } else {
                            echo "failed";
                      }             
         
                  
              }else if($send_type == "notification"){
                  
                  
                 /* $customer_id = explode(',',$customer_id_array);
                  foreach($customer_id as $row){
                       $data['msg'] = $this->model_notification->send_notification($title,$msg,$row);
                      
                  } */
                  
                       $data['msg'] = $this->model_notification->send_notification($title,$msg,$customer_id_array);
                
                  
              }else if($send_type == "both"){
                  
                  
                    $username = "contact@messcafe.in";
                 	$hash = "9f33b0d76319223254cc65ec66166f0267c5228f1452bc278cf4ac6afc155b2a";
                 
                 	// Config variables. Consult http://api.textlocal.in/docs for more info.
                 	$test = "0";
                 
                 	// Data for text message. This is the text message data.
                 	$sender = "TXTLCL"; // This is who the message appears to be from.
                 	$numbers = $customer_mobile_no_array; // A single number or a comma-seperated list of numbers
                 	$message = $msg;
                 	// 612 chars or less
                 	// A single number or a comma-seperated list of numbers
                 	$message = urlencode($message);
                 	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
                 	$ch = curl_init('http://api.textlocal.in/send/?');
                 	curl_setopt($ch, CURLOPT_POST, true);
                 	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                 	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                 	$result = curl_exec($ch); // This is the result from the API
                 	curl_close($ch);
                    $result = json_decode($result); 
                    $this->model_notification->send_notification($title,$msg,$customer_id_array);
                
                  
              }
              
              
          }
        
        
        
    }
   
}
