<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class app_interface extends CI_Controller {
    
	function __construct(){
		parent::__construct();
		$this->load->library('session');
        $this->load->helper('form');
        $this->load->model('model_app_interface');
	}

// //-----//////------/////--------/////////------///////
// //===Profile and login/ragistration Section=====//////
// //-----//////------/////--------/////////-------//////
	
    public function team_login(){
		if(isset($_POST['login']))
         {
	      $email=$_POST['email'];
	      $password=$_POST['password'];
		 
	      $data["login_status"] = $this->model_app_interface->team_login_model($email,$password);
          echo json_encode($data);   
             
        }else{
            
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
	       $email = $request->email;
		   $password = $request->password;
           $data["login_status"] = $this->model_app_interface->team_login_model($email,$password);
           echo json_encode($data);   
        }
	}
	
	public function customer_login(){
        
		if(isset($_POST['login']))
         {
	      $email=$_POST['email'];
	      $password=$_POST['password'];
		 $data["login_status"] = $this->model_app_interface->customer_login_model($email,$password);
        
	     
        }
	}
	
    
    public function customer_sign_up(){
       
		if(isset($_POST['name']))
         {
	      $name=$_POST['name'];
	      $email=$_POST['email'];
          $mobile_no=$_POST['mobile_no'];
	      $address=$_POST['address'];
	      $password=$_POST['password'];
		 
	      $data["sign_up_status"] = $this->model_app_interface->customer_sign_up($name,$email,$mobile_no,$address,$password);
        }
	}
    
    public function customer_ragistration_submit(){
         
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	      $name = $request->name;
          $dob = $request->dob;
          $gender = $request->gender;
          $address_one = $request->address_one; 
          $address_two = $request->address_two;
          $colony = $request->colony;
          $mobile_no = $request->mobile_no;
          $weight = $request->weight;
          $height = $request->height;
          $allergy = $request->allergy;
          $refrence = $request->refrence;
          $password = $request->password;
          $email_id = $request->email_id;
        
        
         //echo $name;
          $data["sign_up_status"] = $this->model_app_interface->customer_ragistration_submit($name,$dob,$gender,$address_one,$address_two,$colony,$mobile_no,$weight,$height,$allergy,$refrence,$password,$email_id);
        
    }
    
    public function customer_profile_updation(){
         
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
          $customer_id = $request->customer_id;
	      $name = $request->name;
          $user_image = $request->user_img;
          $dob = $request->dob;
          $gender = $request->gender;
          $address_one = $request->address_one; 
          $address_two = $request->address_two;
          $colony = $request->colony;
          $mobile_no = $request->mobile_no;
          $email_id = $request->email_id;
        
          $weight = $request->weight;
          $height = $request->height;
          $allergy = $request->allergy;
          $refrence = $request->refrence;
          $old_mobile_no = $request->old_mobile_no;
          
        
         //echo $name;
          $data["sign_up_status"] = $this->model_app_interface->customer_profile_updation($customer_id,$name,$user_image,$dob,$gender,$address_one,$address_two,$colony,$mobile_no,$weight,$height,$allergy,$refrence,$old_mobile_no,$email_id);
        
    }
    
	public function user_profile_data(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $login_email = $request->login_email;
		   $role = $request->role;
		   if($role == "agent"){
			   $data["user"] = $this->model_app_interface->user_profile_agent($login_email);
		   }else if($role == "customers"){
			   $data["user"] = $this->model_app_interface->user_profile_customer($login_email);
		   }
		  echo json_encode($data);
	}
    
    public function customer_tifin_no_select(){
          $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
	       $customer_id = $request->customer_id;
        //echo $customer_id;
           $data["tifin_id"] = $this->model_app_interface->customer_tifin_no_select($customer_id);
        
          echo json_encode($data);
    }
	
    public function set_forget_password_by_email(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	      $email_id = $request->email_id;
		  
          $token = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
          //echo $email_id.$token;
          $this->model_app_interface->set_forget_password_by_email($email_id,$token);
		   
		  //echo json_encode($data);
	}
	
	public function set_forget_password_by_mobile_no(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	      $mobile_no = $request->mobile_no;
		  
          $token = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
          //echo $email_id.$token;
          $this->model_app_interface->set_forget_password_by_mobile_no($mobile_no,$token);
		   
		  //echo json_encode($data);
	}
	
	
	public function verify_otp(){
		  $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
		  $customer_id = $request->customer_id;
		  $otp = $request->otp;
		  $this->model_app_interface->verify_otp($customer_id,$otp);
		   
	}
	
	
	public function reset_password(){
		  $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
		  $customer_id = $request->customer_id;
		  $password = $request->password;
		  $this->model_app_interface->reset_password($customer_id,$password);
		
		
	}
	
	public function update_customer_profile(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $linked_id = $request->customer_id;
		   $first_name = $request->first_name;
		   $user_img = $request->user_img;
		   $email = $request->email;
		   $mobile_no = $request->mobile_no;
		   $mobile_no2 = $request->mobile_no2;
           if($mobile_no2 == ''){
               $mobile_no2 = null;
           }
		   $gender = $request->gender;
		   $address1 = $request->address1;
		   $dob = $request->dob;
		   $shift_id = $request->shift_id;

		   $this->model_app_interface->update_customer_profile($linked_id,$first_name,$user_img,$email,$mobile_no,$mobile_no2,$gender,$address1,$dob,$shift_id);
	}
    public function update_customer_password(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
         
	       $linked_id = $request->customer_id;
           $n_pass = $request->n_pass;
		 
           $this->model_app_interface->update_customer_password($linked_id,$n_pass);
		  
    }
    public function upload_customer_image(){
	  if($_FILES["file"]["name"] != "")
      {
	   $test = explode(".", $_FILES["file"]["name"]);
	   $extension = end($test);
	   $name = rand(100,99999).strtotime(date('Y-m-d H:i:s')).bin2hex(openssl_random_pseudo_bytes(4)).'.'.$extension;
	   $location = 'catalogs/img/customer_img/'.$name;
	   move_uploaded_file($_FILES["file"]["tmp_name"], $location);      
	   echo '<img src="'.base_url().$location.'" alt="User" /><input type="hidden" id="customer_img_name" value="'.$name.'" /><input type="hidden" name="unlink_img" value="'.$name.'" />';
       $unlink_image = $_POST['unlink_image'];
	   if($unlink_image != ''){ 
       unlink('catalogs/img/customer_img/'.$unlink_image); 
       }
      }
	  	
	}
	
	public function update_agent_profile(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $linked_id = $request->customer_id;
		   $name = $request->name;
		   $email = $request->email;
		   $mobile_no = $request->mobile_no;
		   $user_img = $request->user_img;
		   $this->model_app_interface->update_agent_profile($linked_id,$name,$email,$mobile_no,$user_img);
	}
	
    public function update_agent_password(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $linked_id = $request->customer_id;
           $n_pass = $request->n_pass;
           $this->model_app_interface->update_agent_password($linked_id,$n_pass);
    }
	
	public function upload_team_image(){
	  if($_FILES["file"]["name"] != "")
      {
	   $test = explode(".", $_FILES["file"]["name"]);
	   $extension = end($test);
	   $name = rand(100,99999).strtotime(date('Y-m-d H:i:s')).bin2hex(openssl_random_pseudo_bytes(4)).'.'.$extension;
	   $location = 'catalogs/img/agent/'.$name;
	   move_uploaded_file($_FILES["file"]["tmp_name"], $location);
	   echo '<img src="'.base_url().$location.'" alt="User"/><input type="hidden" id="customer_img_name" value="'.$name.'" /><input type="hidden" name="unlink_img" value="'.$name.'" />';
       $unlink_image = $_POST['unlink_image'];
	   if($unlink_image != ''){ 
       unlink('catalogs/img/agent/'.$unlink_image); 
       }
      }
	}
    
    
    
     public function add_payment(){
        
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $customer_id = $request->customer_id;
           $recharge_amount = $request->recharge_amount;
           $payment_id = $request->payment_id;
           
        
           //echo $customer_id.$recharge_amount;
		   $data["add_payment"] = $this->model_app_interface->add_payment($customer_id,$recharge_amount,$payment_id);
			
		  //echo json_encode($data);
        
    }
	
	public function check_shift_changed(){
		$postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
	    $customer_id = $request->customer_id;
		$data["change_shift_data"] = $this->model_app_interface->check_shift_changed($customer_id);
	}
    
    
    public function submit_manage_shift(){
      
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
	    $customer_id = $request->customer_id;
        $breackfast = $request->breackfast;
        $launch = $request->launch;
        $dinner = $request->dinner;
		$data["change_shift_data"] = $this->model_app_interface->submit_manage_shift($customer_id,$breackfast,$launch,$dinner);
        
    }
    
    public function select_delivery_shift(){
        
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
	    $customer_id = $request->customer_id;
    
		$data["selected_shift"] = $this->model_app_interface->select_delivery_shift($customer_id);
        echo json_encode($data);
    }
    
    public function save_delivery_address(){
      
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
        
        $customer_id = $request->customer_id;
	    $address_one = $request->address_one;
        $address_two = $request->address_two;
        $address_three = $request->address_three;
    
		$data["msg"] = $this->model_app_interface->save_delivery_address($customer_id,$address_one,$address_two,$address_three);
        
    }
    
    public function checkDeliveryShiftAndAddLocationStatus(){
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
	    $customer_id = $request->customer_id;
    
		$data["status"] = $this->model_app_interface->checkDeliveryShiftAndAddLocationStatus($customer_id);
        echo json_encode($data);
        
        
    }
    
    
    public function send_otp_to_customer(){
        
        $postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
	    $mobile_no = $request->mobile_no;
        $otp = $request->otp;
        
                                    //***************************//
                                    // ******** send sms *******//
									//**************************//
					
									$url = base_url()."send_msg.php?mobile_no=".$mobile_no."&otp_number=".$otp."&template=otp"; 
		                            $cSession = curl_init(); 
                                    curl_setopt($cSession,CURLOPT_URL,$url); 
                                    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
                                    curl_setopt($cSession,CURLOPT_HEADER, false); 
                                    $result=curl_exec($cSession);
                                    curl_close($cSession);
		                           // print_r($result);
							        //***************************//
                                    // ******** send sms *******//
									//**************************//

    }
// //-----//////------/////--------/////////------///////
// //======= Plan Section ======//////
// //-----//////------/////--------/////////-------//////

    public function select_plan(){
		   $data["select_plan"] = $this->model_app_interface->select_plan();
		   echo json_encode($data);
	}

	public function selected_plan($id){
		   $data["selected_plan"] = $this->model_app_interface->selected_plan($id);
		   echo json_encode($data);
	}
	
// //-----//////------/////--------/////////------///////
// //======= Plan Section ======//////
// //-----//////------/////--------/////////-------//////
    public function submit_plan(){
		  $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	      $customer_id = $request->customer_id;
		  $plan_id = $request->plan_id;
          $plan_duraction = $request->plan_duraction;
		  $order_start_date = date('Y-m-d',strtotime($request->order_start_date));
		  $order_end_date = date('Y-m-d',strtotime($request->order_end_date));
		  $shift = $request->shift;
		  $plan_cost = $request->plan_cost;
         $payment_id = $request->payment_id;
        
		  $this->model_app_interface->submit_plan($customer_id,$plan_id,$plan_duraction,$order_start_date,$order_end_date,$shift,$plan_cost,$payment_id);
	}

    public function renew_plan(){
         $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	      $customer_id = $request->customer_id;
		  $plan_id = $request->plan_id;
          $plan_duraction = $request->plan_duraction;
		  $order_start_date = date('Y-m-d',strtotime($request->order_start_date));
		  $order_end_date = date('Y-m-d',strtotime($request->order_end_date));
		  $shift = $request->shift;
		  $plan_cost = $request->plan_cost;
         $payment_id = $request->payment_id;
		   
		  $this->model_app_interface->renew_plan($customer_id,$plan_id,$plan_duraction,$order_start_date,$order_end_date,$shift,$plan_cost,$payment_id);
        
    }
	
// //-----//////------/////--------/////////------///////
// //======= Vacation Section ======//////
// //-----//////------/////--------/////////-------//////

    public function select_vacation(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $customer_id = $request->customer_id;
		   $data["vacation_list"] = $this->model_app_interface->select_vacation($customer_id);
		   echo json_encode($data);
	}
    public function selected_vacation($id){
		   $data["selected_vacation"] = $this->model_app_interface->selected_vacation($id);
		   echo json_encode($data);
	}

    public function add_vacation(){
		  $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	      $customer_id = $request->customer_id;
		  $start_date = date('Y-m-d',strtotime($request->start_date));
		  $end_date = date('Y-m-d',strtotime($request->end_date));
       
		  $breakfast = $request->breakfast;
        $launch= $request->launch;
        $dinner = $request->dinner;
		  $this->model_app_interface->add_vacation($customer_id,$start_date,$end_date,$breakfast,$launch,$dinner);
 
	}

	public function edit_vacation(){
		  $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	      $vacation_id = $request->vacation_id;
		  $start_date = date('Y-m-d',strtotime($request->start_date));
		  $end_date = date('Y-m-d',strtotime($request->end_date));
		  $shift = $request->shift;
		  
		  $this->model_app_interface->edit_vacation($vacation_id,$start_date,$end_date,$shift);
	  
	}	
	
	public function delete_vacation(){
		  $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	      $vacation_id = $request->vacation_id;
		  $this->model_app_interface->delete_vacation($vacation_id);
	  
	}	
	
	public function vacation_maping(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $customer_id = $request->customer_id;
		   $data["vacation_maping"] = $this->model_app_interface->vacation_maping($customer_id);
		   echo json_encode($data);
	}
// //-----//////------/////--------/////////------///////
// //======= Transaction Section ======//////
// //-----//////------/////--------/////////-------//////
	
	public function user_transaction(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $user_id = $request->user_id;
		   $data["tran"] = $this->model_app_interface->user_transaction($user_id);
		   echo json_encode($data);
	}
    
    public function search_transaction(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $user_id = $request->user_id;
           $my_date = $request->my_date;
		   $this->model_app_interface->search_transaction($user_id,$my_date);
			
	}
    
    public function recharge_transaction(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $user_id = $request->user_id;
		   $data["recharge_tran"] = $this->model_app_interface->recharge_transaction($user_id);
		   echo json_encode($data);
	}
    
    public function search_transaction_recharge(){
          $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $user_id = $request->user_id;
           $my_date = $request->my_date;
		   $this->model_app_interface->search_transaction_recharge($user_id,$my_date);
			
	}
    
    public function recharge_full_details(){
         $postdata = file_get_contents("php://input");
          $request = json_decode($postdata);
	       $recharge_id = $request->recharge_id;
         $data["recharge_details"] = $this->model_app_interface->recharge_full_details($recharge_id);
		   echo json_encode($data);
    }
// //-----//////------/////--------/////////------///////
// //======= Notification Section ======//////
// //-----//////------/////--------/////////-------//////
	
	public function user_notification(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
	       $user_id = $request->user_id;
		   $data["noti"] = $this->model_app_interface->user_notification($user_id);
		   echo json_encode($data);
        
        
    }
    
    public function read_notification($id){
          
		   $data["noti"] = $this->model_app_interface->read_notification($id);
           $this->model_app_interface->change_notification_status($id);
		   echo json_encode($data);
        
        
    }
    
    public function count_notification(){
          
		   $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
	       $user_id = $request->user_id;
		   $data["noti"] = $this->model_app_interface->count_notification($user_id);
		   echo json_encode($data);
        
        
    }
	
// //-----//////------/////--------/////////------///////
// //======= Special menu Section ======//////
// //-----//////------/////--------/////////-------//////
   public function select_special_menu(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
		   $data["select_special_menu"] = $this->model_app_interface->select_special_menu();
		   echo json_encode($data);
        
        
    }
    
    public function menu_voting(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $menu_id = $request->menu_id;
           $customer_id = $request->customer_id;
		   $data["select_special_menu"] = $this->model_app_interface->menu_voting($customer_id,$menu_id);
		   
        
        
    }
    
    public function check_voting(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           
           $customer_id = $request->customer_id;
		   $data["check_voting"] = $this->model_app_interface->check_voting($customer_id);
        
    }
    
    public function pick_customer_vote(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           
           $customer_id = $request->customer_id;
		   $data["pick_customer_vote"] = $this->model_app_interface->pick_customer_vote($customer_id);
           echo json_encode($data);
        
    }
    
    public function voting_result(){
        $data["voting_result"] = $this->model_app_interface->voting_result();
         echo json_encode($data);
        
    }
    
    public function all_voter(){
        $data["all_voter"] = $this->model_app_interface->all_voter();
         echo json_encode($data);
        
    }
    
    
    public function feedback(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           
           $customer_id = $request->customer_id;
            $quality_rank = $request->quality_rank;
           $service_rank = $request->service_rank;
           $suggestion = $request->suggestion;
		   $this->model_app_interface->feedback($customer_id,$quality_rank,$service_rank,$suggestion);
           
        
        
    }
        
    public function select_feedback(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $customer_id = $request->customer_id;
		   $data["feedback"] = $this->model_app_interface->select_feedback($customer_id);
		   echo json_encode($data);
        
        
    }  
    
    
    
 // //-----//////------/////--------/////////------///////
// //======= Tifin Delivery Confirmation ======//////
// //-----//////------/////--------/////////-------//////
	 public function tifin_delivery_confirmation(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $customer_id = $request->customer_id;
           $card_no = str_replace(' ', '', $request->card_no);   
		   $this->model_app_interface->tifin_delivery_confirmation($customer_id,$card_no);
   
    } 
    
    
 // //-----//////------/////--------/////////------///////
// //======= Orders ======//////
// //-----//////------/////--------/////////-------//////    
     public function order_list(){
            $postdata = file_get_contents("php://input");
            $request = json_decode($postdata);
            $shift = $request->shift;
            $status = $request->status;
            $login_id = $request->login_id;
         
            $data["order_list"] = $this->model_app_interface->order_list($shift,$status,$login_id);
		    echo json_encode($data);
    }
    
     public function search_orders(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $customer_id = $request->customer_id;
           $assigning_shift = $request->assigning_shift;
		   $this->model_app_interface->search_orders($customer_id,$assigning_shift);
 
    }
    
    public function selected_order(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $customer_id = $request->customer_id;
           $shift_id = $request->shift_id;
        
            $data["order_details"] = $this->model_app_interface->selected_order($customer_id,$shift_id);
		    echo json_encode($data);
        
    }
    
    public function search_by_shift_and_meal(){
        
        $shift = $this->uri->segment(3);
        $status = $this->uri->segment(4);
        $colony_id = $this->uri->segment(5);
        if($colony_id == 0){
            $colony_id = '';
        }
        
        $agent_id = $this->uri->segment(6);
        if(!$agent_id){
            $agent_id = '';
        }
        
        $data['order_list'] = $this->model_app_interface->search_by_shift_and_meal($shift,$status,$colony_id,$agent_id);
        echo json_encode($data);
      
    }
    
    public function assign_tifin_qrcode(){
        
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $tifin_barcode = $request->tifin_barcode;
           $customer_id = $request->customer_id;
           $assigning_shift = $request->assigning_shift;
         
        
		  $this->model_app_interface->assign_tifin_qrcode($tifin_barcode, $customer_id,$assigning_shift);
        
        
    }
    
    
    public function count_orders_of_shift_one(){
        $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $status = $request->status;
         $login_id = $request->login_id;
         $data["total"] = $this->model_app_interface->count_orders_of_shift_one($status,$login_id);
        
        echo json_encode($data);
    }
    
    public function count_orders_of_shift_two(){
        $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $status = $request->status;
         $login_id = $request->login_id;
         $data["total"] = $this->model_app_interface->count_orders_of_shift_two($status,$login_id);
        
        echo json_encode($data);
    }
    
    public function count_orders_of_shift_three(){
        $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $status = $request->status;
         $login_id = $request->login_id;
         $data["total"] = $this->model_app_interface->count_orders_of_shift_three($status,$login_id);
        
        echo json_encode($data);
    }
    
// //-----//////------/////--------/////////------///////
// //======= assigned Orders ======//////
// //-----//////------/////--------/////////-------//////   
    
    public function assigned_orders_list(){
            $data["assigned_orders_list"] = $this->model_app_interface->assigned_orders_list();
		    echo json_encode($data);
    }
    
    public function filter_assigned_orders_list(){
        
        $shift = $this->uri->segment(3);
        $meal = $this->uri->segment(4);
        $data['order_list'] = $this->model_app_interface->filter_assigned_orders_list($shift,$meal);
        echo json_encode($data);
      
    }
    
     public function search_assigned_orders(){
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $customer_id = $request->customer_id;
           $assigning_shift = $request->assigning_shift;
		   $this->model_app_interface->search_assigned_orders($customer_id,$assigning_shift);
 
    }
        
// //-----//////------/////--------/////////------///////
// //======= Order delivered ======//////
// //-----//////------/////--------/////////-------//////          
    public function order_delivered(){
        
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           $tifin_barcode = str_replace(' ', '', $request->tifin_barcode);
           $customer_id = $request->customer_id;
           // echo $customer_id;
        
		  $this->model_app_interface->order_delivered($tifin_barcode, $customer_id);
        
        
    }
    
    
    public function start_orders(){	   
        
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           
           $customer_id = $request->customer_id;
           $recharge_amount = $request->recharge_amount;
           $order_start_date = date('Y-m-d', strtotime($request->order_start_date));
           $shift = $request->shift;
           $payment_id = $request->payment_id;  
        
           
          $this->model_app_interface->start_orders($customer_id,$recharge_amount,$order_start_date,$shift,$payment_id);
        
    }
    
// //-----//////------/////--------/////////------///////
// //======= Agent section complete Order list ======//////
// //-----//////------/////--------/////////-------//////        
    
    public function complete_orders_list(){	   

          $data['complete_orders'] = $this->model_app_interface->complete_orders_list();
          echo json_encode($data);
    }
    
    public function search_complete_orders_by_shift(){
        
        $shift = $this->uri->segment(3);
        $meal = $this->uri->segment(4);
        $data['order_list'] = $this->model_app_interface->search_complete_orders_by_shift($shift,$meal);
        echo json_encode($data);
      
    }
    
// //-----//////------/////--------/////////------///////
// //======= Agent section Prevent Order list ======//////
// //-----//////------/////--------/////////-------//////        
    
    public function prevent_orders_list(){	   

          $data['order_list'] = $this->model_app_interface->prevent_orders_list();
          echo json_encode($data);
    }
    
    public function search_prevent_orders_by_shift(){
        
        $shift = $this->uri->segment(3);
        $meal = $this->uri->segment(4);
        $data['order_list'] = $this->model_app_interface->search_complete_orders_by_shift($shift,$meal);
        echo json_encode($data);
      
    }    
    
// //-----//////------/////--------/////////------///////
// //======= Agent home find tifin section ======//////
// //-----//////------/////--------/////////-------////// 
    
   public function find_tifin(){	   
        
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           
           $qr_code = $request->qr_code;
   
          $this->model_app_interface->find_tifin($qr_code);
        
    }
    
    public function find_tifin_details($customer_id){
        
        $data['find_tifin_details'] = $this->model_app_interface->find_tifin_details($customer_id);
        echo json_encode($data);
        
    }
    
// //-----//////------/////--------/////////------///////
// //======= Delete assigned Orders ======//////
// //-----//////------/////--------/////////-------//////      
    
   public function delete_assign_order(){	   
        
           $postdata = file_get_contents("php://input");
           $request = json_decode($postdata);
           
           $shift = $request->shift;
           $customer_id = $request->customer_id;
   
          $this->model_app_interface->delete_assign_order($shift,$customer_id);
        
    }  
    
// //-----//////------/////--------/////////------///////
// //======= Ckeck app version number======//////
// //-----//////------/////--------/////////-------//////  
    public function check_app_version(){	   

          $this->model_app_interface->check_app_version();
        
    }
    
// //-----//////------/////--------/////////------///////
// //======= Select Colony ======//////
// //-----//////------/////--------/////////-------//////  
     public function select_colony(){	   
           $data['select_colony'] = $this->model_app_interface->select_colony();
           echo json_encode($data);
     }
 // //-----//////------/////--------/////////------///////
	 // //======= Location Tracking======//////
	 // //-----//////------/////--------/////////-------//////

	 // agent section

	 	public function location_tracking(){

	         if(isset($_POST["lat"],$_POST["lng"],$_POST["agent_id"])){
	 		    $lat = $_POST["lat"];
	 			$lng = $_POST["lng"];
	 			$agent_id = $_POST["agent_id"];
	 		    $this->model_app_interface->location_tracking($lat,$lng,$agent_id);
	 		}

	     }

	 	public function agent_customers_location(){
	           $postdata = file_get_contents("php://input");
	           $request = json_decode($postdata);


	 	       $login_email = $request->login_email;
	 		   $role = $request->role;

	 		   if($role == "agent"){
	 			   $data["user"] = $this->model_app_interface->agent_customers_location($login_email);

	 		   }

	 		  echo json_encode($data);
	 	}

	 	public function update_location(){
	 		$postdata = file_get_contents("php://input");
	         $request = json_decode($postdata);
	 	    $agent_id = 2;//$request->agent_id;
	 		$data["position"] = $this->model_app_interface->update_location($agent_id);
	 		echo json_encode($data);

	 	}
	 // customer section

	 	public function customer_data_for_location(){
	           $postdata = file_get_contents("php://input");
	           $request = json_decode($postdata);


	 	       $login_email = $request->login_email;
	 		  
	 		  $data["user"] = $this->model_app_interface->customer_data_for_location($login_email);
	 		  echo json_encode($data);
	 	}


	 	public function customer_data_for_add_marker(){
	 		 $postdata = file_get_contents("php://input");
	           $request = json_decode($postdata);


	 	       $login_email = $request->login_email;
	 		   $role = $request->role;

	 		   if($role == "customers"){
	 			   $data["user"] = $this->model_app_interface->customer_data_for_add_marker($login_email);

	 		   }

	 		  echo json_encode($data);


	 	}

	 	public function customer_add_locations(){

	 		$postdata = file_get_contents("php://input");
	        $request = json_decode($postdata);
	 	    $customer_id = $request->mark_customer_id;
	 		$customer_lat = $request->user_lat;
	 		$customer_lng = $request->user_lng;
            $shift = $request->mark_shift;
            
            

	 		$this->model_app_interface->customer_add_locations($customer_id,$customer_lat,$customer_lng,$shift);
	 	}
	   
        public function customer_added_location(){
            $postdata = file_get_contents("php://input");
	        $request = json_decode($postdata);
	 	    $customer_id = $request->customer_id;
            $data["location"] = $this->model_app_interface->customer_added_location($customer_id);
            echo json_encode($data);
            
        }
// //-----//////------/////--------/////////------///////
// //======= scan orders ======//////
// //-----//////------/////--------/////////-------//////
    public function scan_orders(){
		
		$postdata = file_get_contents("php://input");
        $request = json_decode($postdata);
	    $customer_id = $request->customer_id;
		$agent_id = $request->agent_id;
        $current_date  = $request->current_date;
        $shift = $request->shift;
        
		$this->model_app_interface->scan_orders($customer_id,$agent_id,$current_date,$shift);
	}
    
}
