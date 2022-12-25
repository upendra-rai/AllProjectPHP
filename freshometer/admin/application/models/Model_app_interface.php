<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_app_interface extends CI_Model {

	function __construct(){
		parent::__construct();
	}

// //-----//////------/////--------/////////------///////
// //===Profile and login/ragistration Section=====//////
// //-----//////------/////--------/////////-------//////	
	
	public function team_login_model($data1,$data2){
		$check = $this->db->get_where('team_member', array(
					'user_name' => $data1,
					'password' => $data2,
				));
		if($check->num_rows() == 1){
          $agent_id = $check->result()[0]->user_id;
          $role =   $check->result()[0]->role;
           if($agent_id && $role) {
                return array(
		               'login_id' => $agent_id,
		               'role' => $role,
		             );    
               
           }else{
               echo "failed";
           }
          
            
        }else{
	    	
	    }
    }
	public function customer_login_model($email,$password){
		$this->db->select('*');
        $this->db->from('customer_login_details');
        $this->db->join('customer_details','customer_details.customer_id = customer_login_details.customer_id');
        $this->db->join('colony_detail','colony_detail.colony_id = customer_details.colony_id');
        $this->db->where('mobile_no',$email);
        $this->db->where('password',$password);
        
        
       
       $check = $this->db->get();
		if($check->num_rows() == 1){
          echo $check->result()[0]->customer_id;

        }else{
	    	echo "failed";
	    }
	}
    
    public function customer_sign_up($name,$email,$mobile_no,$address,$password){
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
		
		$check_email = $this->db->get_where('customer_details',array( "email_address" => $email));
		
		if($check_email->num_rows() > 0){
			
			echo "email_invalid";
			
		}else{
		
		$check_mobile = $this->db->get_where('customer_details', array("mobile_no" => $mobile_no));
		
		if($check_mobile->num_rows() > 0 ){
			echo "mobile_invalid";
		}else{
		
        $check_user_id = $this->db->get_where('customer_login_details', array("user_id" => $mobile_no));  
            
        if($check_user_id->num_rows() > 0 ){
			echo "mobile_invalid";
		}else{    
        $arr = array(
		    'customer_name' => $name,
            'customer_image' =>'user.png',
			'mobile_no' => $mobile_no,
            'mobile_no2' => null,
            'email_address' => $email,
            'dob' =>'',
            'gender' => '',
			'address' => $address,
            'pincode' => 0,
            'colony_id' => 1,
            'customer_status' => 'active',
            'ragistration_date' => $time_stamp,
			
		);
        if($this->db->insert('customer_details',$arr)){
                $customer_id = $this->db->insert_id();
            
                $arr2 =  array(
                    'customer_id' => $customer_id,
                    'user_id' => $name,
                    'password' => $password,
                  
                );
            
                if($this->db->insert('customer_login_details', $arr2)){
                    echo $customer_id;
					 
					
                }else{
                    echo "failed1";
                
            }
            
        }else{
            
            echo "failed2";
        }    
        }
        }
		}
    }
    
    public function customer_ragistration_submit($name,$dob,$gender,$address_one,$address_two,$colony,$mobile_no,$weight,$height,$allergy,$refrence,$password,$email_id){
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
		
        $dob =  date('d-m-Y',strtotime($dob));
		
		$check_mobile = $this->db->get_where('customer_details', array("mobile_no" => $mobile_no));
		
		if($check_mobile->num_rows() > 0 ){
			echo "mobile_invalid";
		}else{
		
        $check_user_id = $this->db->get_where('customer_login_details', array("user_id" => $mobile_no));  
            
        if($check_user_id->num_rows() > 0 ){
			echo "mobile_invalid";
		}else{    
        $arr = array(
		    'customer_name' => $name,
            'customer_image' =>'user.png',
			'mobile_no' => $mobile_no,
            'mobile_no2' => null,
            'email_address' => $email_id,
            'dob' => $dob,
            'gender' => $gender,
			'address_one' => $address_one,
            'address_two' => $address_two,
            'pincode' => 0,
            'colony_id' => $colony,
            'weight' => $weight,
            'height' => $height,
            'allergy' => $allergy,
            'reference' => $refrence,
            'customer_status' => 'active',
            'ragistration_date' => $time_stamp,
			
		);
        if($this->db->insert('customer_details',$arr)){
                $customer_id = $this->db->insert_id();
            
                $arr2 =  array(
                    'customer_id' => $customer_id,
                    'user_id' => $name,
                    'password' => $password,
                  
                );
            
                if($this->db->insert('customer_login_details', $arr2)){
                    
                     $arr44 = array(
                        'customer_id' => $customer_id,
                         'balance_amount' => 0,
                     
                     );
                    
                    if($this->db->insert('current_balance',$arr44)){
                        
                         echo $customer_id;
                    }else{
                        echo 'failed';
                    }
                   
					                //***************************//
                                    // ******** send sms *******//
									//**************************//
					
									$url = base_url()."send_msg.php?mobile_no=".$mobile_no."&name=".urlencode($name)."&template=welcome"; 
		                            $cSession = curl_init(); 
                                    curl_setopt($cSession,CURLOPT_URL,$url); 
                                    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
                                    curl_setopt($cSession,CURLOPT_HEADER, false); 
                                    $result=curl_exec($cSession);
                                    curl_close($cSession);
		                            //print_r($result);
							        //***************************//
                                    // ******** send sms *******//
									//**************************//
					
                }else{
                    echo "failed1";
                
                }
            
        }else{
            
            echo "failed2";
        }    
        }
        }
 
    }
    
    
    public function customer_profile_updation($customer_id,$name,$user_image,$dob,$gender,$address_one,$address_two,$colony,$mobile_no,$weight,$height,$allergy,$refrence,$old_mobile_no,$email_id){
       $dob =  date('d-m-Y',strtotime($dob));
        
       if($old_mobile_no == $mobile_no){
            $arr2 = array(
		    'customer_name' => $name,
             'customer_image' => $user_image,
            'customer_image' =>'user.png',
			'mobile_no' => $mobile_no,
            'mobile_no2' => null,
            'email_address' => $email_id,
            'dob' => $dob,
            'gender' => $gender,
			'address_one' => $address_one,
            'address_two' => $address_two,
            'pincode' => 0,
            'colony_id' => $colony,
            'weight' => $weight,
            'height' => $height,
            'allergy' => $allergy,
            'reference' => $refrence,
            
			
		);
        
        $this->db->where('customer_id',$customer_id);
        if($this->db->update('customer_details',$arr2)){
            
            echo 'success';
        }else{
            echo 'failed';
        }
       }else{   
         $check_mobile = $this->db->get_where('customer_details', array("mobile_no" => $mobile_no));
           if($check_mobile->num_rows() > 0 ){
			echo "mobile_invalid";
		   }else{ 
               $arr = array(
		    'customer_name' => $name,
             'customer_image' => $user_image,
            'customer_image' =>'user.png',
			'mobile_no' => $mobile_no,
            'mobile_no2' => null,
            'email_address' => $email_id,
            'dob' => $dob,
            'gender' => $gender,
			'address_one' => $address_one,
            'address_two' => $address_two,
            'pincode' => 0,
            'colony_id' => $colony,
            'weight' => $weight,
            'height' => $height,
            'allergy' => $allergy,
            'reference' => $refrence,
            
			
		);
        
        $this->db->where('customer_id',$customer_id);
        if($this->db->update('customer_details',$arr)){
            
            echo 'success';
        }else{
            echo 'failed';
        }
           }
       }
		
    }
    
	public function user_profile_agent($login_email){
        $this->db->select('*');
        $this->db->from('team_member');
		$this->db->where('user_id', $login_email);
        $data = $this->db->get()->result();
		return $data;
    }
	
	public function user_profile_customer($login_email){
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->where('customer_details.customer_id', $login_email);
        $this->db->join('customer_login_details','customer_login_details.customer_id = customer_details.customer_id');
        $this->db->join('current_balance','current_balance.customer_id = customer_details.customer_id','left');
        $this->db->join('subscribed_plan_details','subscribed_plan_details.customer_id = customer_details.customer_id','left');
        $this->db->join('plan','plan.plan_id = subscribed_plan_details.plan_id','left');
        
        $data = $this->db->get()->result();
		return $data;
    }
    
    
    public function customer_tifin_no_select($customer_id){
        
      /*  $this->db->select('*');
        $this->db->from('tifin_id');
        $this->db->where('tifin_id.customer_id', $customer_id);
        $data = $this->db->get()->result();
		return $data;
        */
        
    }
    
	public function update_customer_profile($linked_id,$first_name,$user_img,$email,$mobile_no,$mobile_no2,$gender,$address1,$dob,$shift_id){
        
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
		
        $check  = $this->db->get_where('customer_details', array( 'customer_id !=' => $linked_id,   'mobile_no' => $mobile_no));
        
        if($check->num_rows() > 0 ){
            
            echo "invalid_mobile";
            
        }else{
            
            $check_email = $this->db->get_where('customer_details', array( 'customer_id !=' => $linked_id, 'email_address' =>$email));
        
            if($check_email->num_rows > 0){
                
                echo "invalid_email";
            }else{
            
        $arr = array(
		    'customer_name' => $first_name,
			'customer_image' => $user_img,
			'mobile_no' => $mobile_no,
			'mobile_no2' => $mobile_no2,
            'email_address' => $email,
			'address' => $address1,
			'dob' => $dob,
            'gender' => $gender,
			
		); 
     $this->db->where('customer_id',$linked_id);
		if($this->db->update('customer_details',$arr)){
          
            if($shift_id == 'no_change'){
                echo "success";
                
            }else{
                
            
            $check_shift = $this->db->get_where('changed_order_shift', array('customer_id' => $linked_id, ));
            
            if($check_shift->num_rows() > 0){
                $arr3 = array(
                   'shift_id' => $shift_id,
                   'time_stamp' => $time_stamp,
                   'status' => 'pending',
                );
                $this->db->where('customer_id',$linked_id);
                if($this->db->update('changed_order_shift',$arr3)){
                  echo "success";
                 }else{
                     echo "fail";
                 }
                
            }else{
                
            
            $arr2 = array(
              
                'customer_id' => $linked_id,
                'shift_id' => $shift_id,
                'time_stamp' => $time_stamp,
                'status' => 'pending',
            );
            
            if($this->db->insert('changed_order_shift',$arr2)){
                
                echo "success";
            }else{
                
                echo "fail";
            }
            
            }    
            }
             
		}else{
			echo "fail";
		};
       
            }
            
        }
	}
	public function update_agent_profile($linked_id,$name,$email,$mobile_no,$user_img){
		$arr = array(
		    'name' => $name,
			'image' => $user_img,
			'email' => $email,
			'contact' => $mobile_no,
		);
		$this->db->where('user_id',$linked_id);
		if($this->db->update('team_member',$arr)){
			echo "success";
		}else{
			echo "fail";
		};
	}
    public function update_agent_password($linked_id,$n_pass){
       $arr = array(
		    'password' => $n_pass,
		);
		$this->db->where('user_id',$linked_id);
		if($this->db->update('team_member',$arr)){
			echo "success";
		}else{
			echo "fail";
		};
    }
    
    public function update_customer_password($linked_id,$n_pass){
	   
       $arr = array(
		
		    'password' => $n_pass,

		);
		
		$this->db->where('customer_id',$linked_id);
		if($this->db->update('customer_login_details',$arr)){
			
			echo "success";
			
		}else{
			
			echo "fail";
		};
       
   }
   
   public function set_forget_password_by_email($email_id,$token){
	   
	   
	   $check = $this->db->get_where('customer_details', array( 'email_address' => $email_id, ));
	   
	   if($check->num_rows() == 1){
		   date_default_timezone_set('Asia/Kolkata');
           $date = new DateTime();
           $time_stamp = $date->format('Y-m-d H:i:s');
		   
		   $customer_id = $check->result()[0]->customer_id;
		   
		   $check_two = $this->db->get_where('forget_password' , array('customer_id' => $customer_id,));
		   
		   if($check_two->num_rows() == 1){
			     $arr = array(
		        		'token_no'  => $token,
		        		'time_stamp' => $time_stamp,
		           );
				   
				$this->db->where('customer_id',$customer_id);
 				if($this->db->update('forget_password',$arr)){
					
					echo $customer_id;
				}else{
					
					echo "failed";
				}
			   
		   }else{
		   
		           $arr2 = array(
		                'customer_id' => $customer_id,
		        		'token_no'  => $token,
		        		'time_stamp' => $time_stamp,
		           );
		           
		           if($this->db->insert('forget_password',$arr2)){
		        	   
		        	   echo $customer_id;
		           }else{
		        	   
		        	   echo "failed";
		           }
		   
		   }
	   }else{
		   
		   echo "invalid";
	   }
	   
   }
   
    public function set_forget_password_by_mobile_no($mobile_no,$token){
	   
	   
	   $check = $this->db->get_where('customer_details', array( 'mobile_no' => $mobile_no, ));
	   
	   if($check->num_rows() == 1){
		   date_default_timezone_set('Asia/Kolkata');
           $date = new DateTime();
           $time_stamp = $date->format('Y-m-d H:i:s');
		   
		   $customer_id = $check->result()[0]->customer_id;
		   $customer_name = $check->result()[0]->customer_name;
		   
		   $check_two = $this->db->get_where('forget_password' , array('customer_id' => $customer_id,));
		   
		   if($check_two->num_rows() == 1){
			     $arr = array(
		        		'token_no'  => $token,
		        		'time_stamp' => $time_stamp,
		           );
				   
				$this->db->where('customer_id',$customer_id);
 				if($this->db->update('forget_password',$arr)){
					
					echo $customer_id;
					$username = "messcafefoods@gmail.com";
	                $hash = "13f26ea16c8380284e61d8bfb4cf6af1b0776ffeb280bb87b60ac4d240cbdd62";
	                $test = "0";
	                $sender = "MESSCF";// This is who the message appears to be from.
	                $numbers = '91'.$mobile_no; // A single number or a comma-seperated list of numbers
                    $message = rawurlencode('Dear '.$customer_name.',%nYour one time password to reset of password at your Messcafe account is '.$token.'. OTP will expire in 10 minutes.');
	                
					
					$message = urlencode($message);
	                $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	                $ch = curl_init('http://api.textlocal.in/send/?');
	                curl_setopt($ch, CURLOPT_POST, true);
	                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	                $result = curl_exec($ch); // This is the result from the API
	                curl_close($ch);
                    //$check =  json_decode($result); 
                    //print_r($result);
					
				}else{
					
					echo "failed";
				}
			   
		   }else{
		   
		           $arr2 = array(
		                'customer_id' => $customer_id,
		        		'token_no'  => $token,
		        		'time_stamp' => $time_stamp,
		           );
		           
		           if($this->db->insert('forget_password',$arr2)){
		        	   
		        	   echo $customer_id;
					   $username = "messcafefoods@gmail.com";
	                   $hash = "13f26ea16c8380284e61d8bfb4cf6af1b0776ffeb280bb87b60ac4d240cbdd62";
	                   $test = "0";
	                   $sender = "MESSCF";// This is who the message appears to be from.
	                   $numbers = '91'.$mobile_no; // A single number or a comma-seperated list of numbers
                       $message = rawurlencode('Dear '.$customer_name.',%nYour one time password to reset of password at your Messcafe account is '.$token.'. OTP will expire in 10 minutes.');
	                   
				   	
				   	   $message = urlencode($message);
	                   $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	                   $ch = curl_init('http://api.textlocal.in/send/?');
	                   curl_setopt($ch, CURLOPT_POST, true);
	                   curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	                   curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	                   $result = curl_exec($ch); // This is the result from the API
	                   curl_close($ch);
                       //$check =  json_decode($result); 
                       //print_r($result);
		           }else{
		        	   
		        	   echo "failed";
		           }
		   
		   }
	   }else{
		   
		   echo "invalid";
	   }
	   
   }
   
   
   public function verify_otp($customer_id,$otp){
	   
	   $check = $this->db->get_where('forget_password',array('customer_id' => $customer_id, 'token_no' => $otp,));
	   
	   if($check->num_rows() == 1){
		   
		   echo "verified";
	   }else{
		   
		   echo "failed";
	   }
	   
   }
   
   public function reset_password($customer_id,$password){
	   
	   $this->db->set('password',$password);
	   $this->db->where('customer_id',$customer_id);
	   if($this->db->update('customer_login_details')){
		      
			$this->db->where('customer_id',$customer_id);
			if($this->db->delete('forget_password')){
				
				echo "success";
				
			}else{
				
				echo "success";
			}
			
		   
	   }else{
		   
		   echo "failed";
	   };
	   
   }
   
   public function check_shift_changed($customer_id){
	    $this->db->select('*');
        $this->db->from('changed_order_shift');
		$this->db->where('customer_id',$customer_id);
		$this->db->where('status','pending');
		$data = $this->db->get();
		
		if($data->num_rows() == 1){
			echo $data->result()[0]->shift_id;
			
		}else{
			echo 'no';
		}
		
   }
    
    public function submit_manage_shift($customer_id,$breackfast,$launch,$dinner){
        
        $check = $this->db->get_where('customer_delivery_details',array('customer_id' =>$customer_id ));
        
        if($check->num_rows() > 0){
            $arr2 = array(
                'first_shift' => $breackfast,
                'second_shift' => $launch,
                'third_shift' => $dinner,
            );
            
            $this->db->where('customer_id',$customer_id);
            if($this->db->update('customer_delivery_details',$arr2)){
                
                echo 'success';
            }
        }else{
            $arr = array(
                'customer_id' => $customer_id,
                'first_shift' => $breackfast,
                'second_shift' => $launch,
                'third_shift' => $dinner,
            );
            
            if($this->db->insert('customer_delivery_details',$arr)){
                
                echo 'success';
            }
            
        }
    }
    
    public function select_delivery_shift($customer_id){
        $this->db->select('*');
        $this->db->from('customer_delivery_details');
		$this->db->where('customer_delivery_details.customer_id', $customer_id);
		
        $data = $this->db->get();
        
       
		return $data->result();
        
    }
    
    public function save_delivery_address($customer_id,$address_one,$address_two,$address_three){
         
        $this->db->where('customer_id',$customer_id);
        $this->db->set('address_one',$address_one);
        $this->db->set('address_two',$address_two);
        $this->db->set('address_three',$address_three);
        
        if($this->db->update('customer_details')){
                
                echo 'success';
        }
        
        
    }
    
    public function checkDeliveryShiftAndAddLocationStatus($customer_id){
        
        $check_delivery_shift = $this->db->get_where('customer_delivery_details', array('customer_id' => $customer_id));
        
        $delivery_shift = 'no';
        
        if($check_delivery_shift->num_rows() > 0){
            $delivery_shift = 'yes';
            
        }
        
        $check_add_location = $this->db->get_where('customer_location', array('customer_id' => $customer_id));
        
        $customer_location = 'no';
        
        if($check_add_location->num_rows() > 0){
            $customer_location = 'yes';
            
        }
        
        return array(
            'added_delivery_shift' => $delivery_shift,
            'added_location' => $customer_location,
        );
        
    }
// //-----//////------/////--------/////////------///////
// //======= Transaction Section ======//////
// //-----//////------/////--------/////////-------//////   
   public function user_transaction($user_id){
        date_default_timezone_set('Asia/Kolkata');
       
	    $this->db->select('*');
        $this->db->from('transaction_detail');
		$this->db->where('transaction_detail.customer_id', $user_id);
		$this->db->where('MONTH(transaction_date)',date('m'));
        $this->db->where('YEAR(transaction_date)',date('Y'));
        
		$this->db->order_by('transaction_date','DESC');
		$this->db->order_by('transaction_id','DESC');
        $data = $this->db->get()->result();
		return $data;
   }
   public function search_transaction($user_id,$my_date){
        $my_month = date('m',strtotime($my_date));
		$my_year = date('Y',strtotime($my_date));
		
        $this->db->select('*');
        $this->db->from('transaction_detail');
       
		$this->db->where('transaction_detail.customer_id', $user_id);
		$this->db->where('MONTH(transaction_date)',$my_month);
        $this->db->where('YEAR(transaction_date)',$my_year);
       
		$this->db->order_by('transaction_date','DESC');
		$this->db->order_by('transaction_id','DESC');
        $data = $this->db->get();
        if($data->num_rows() > 0){
            foreach($data->result() as $rows){
                echo ' <tr>';
                echo '<td><img src="../images/transaction arrow.png" alt="" style="width:25px; margin-top:15px;"/><p>'.$rows->duraction.' Day Plan<span>'.date('M d,Y',strtotime($rows->transaction_date)).'</span></p></td>';
                echo '<td>Rs '.$rows->transaction_amount.'</td>';
                echo ' </tr>';
            }
        }else{
            
        }
   }   

 
    
public function recharge_transaction($user_id){
        date_default_timezone_set('Asia/Kolkata');
       
	    $this->db->select('*');
        $this->db->from('recharge_detail');
		$this->db->where('recharge_detail.customer_id', $user_id);
		$this->db->where('MONTH(recharge_date)',date('m'));
        $this->db->where('YEAR(recharge_date)',date('Y'));
        
		$this->db->order_by('recharge_date','DESC');
		$this->db->order_by('recharge_id','DESC');
        $data = $this->db->get()->result();
		return $data;
   }
    
    

public function search_transaction_recharge($user_id,$my_date){
        $my_month = date('m',strtotime($my_date));
		$my_year = date('Y',strtotime($my_date));
		
        $this->db->select('*');
        $this->db->from('recharge_detail');
       
		$this->db->where('recharge_detail.customer_id', $user_id);
		$this->db->where('MONTH(recharge_date)',$my_month);
        $this->db->where('YEAR(recharge_date)',$my_year);
		$this->db->order_by('recharge_date','DESC');
		$this->db->order_by('recharge_id','DESC');
        $data = $this->db->get();
        if($data->num_rows() > 0){
            foreach($data->result() as $rows){
                echo ' <tr>';
                echo '<td><img src="../images/transaction arrow.png" alt="" style="width:25px; margin-top:15px;"/><p>'.date('M d, Y', strtotime($rows->recharge_date)).'</p></td>';
                echo '<td style="color:#007a47;">Rs '.$rows->recharge_amount.'</td>';
                echo ' </tr>';
            }
        }else{
            
        }
   } 
    
   public function recharge_full_details($recharge_id){
       $this->db->select('*');
       $this->db->from('recharge_detail');
       $this->db->where('recharge_id',$recharge_id);
       $this->db->join('plan','plan.plan_id = recharge_detail.plan_id');
       $this->db->join('subscribed_plan_details','subscribed_plan_details.customer_id = recharge_detail.customer_id');
       $data = $this->db->get()->result();
		return $data;
   }    
    
// //-----//////------/////--------/////////------///////
// //======= Notification Section ======//////
// //-----//////------/////--------/////////-------//////    
    
     public function user_notification($user_id){
	    $this->db->select('*');
        $this->db->from('notification');
        $this->db->join('customer_details','customer_details.customer_id = notification.customer_id');
		$this->db->where('notification.customer_id', $user_id);
        $this->db->order_by('notification_id','desc'); 
        $data = $this->db->get()->result();
		return $data;
    }
    
    public function read_notification($id){
        
	    $this->db->select('*');
        $this->db->from('notification');
        $this->db->where('notification_id',$id);
        $this->db->join('customer_details','customer_details.customer_id = notification.customer_id');
        $data = $this->db->get()->result();
		return $data;
   }
    
   public function change_notification_status($id){
       
       $this->db->where('notification_id',$id);
       $this->db->set('notification_status','read');
       $this->db->update('notification');
   }  
    
   public function count_notification($user_id){
	    $this->db->select('COUNT(notification_id) AS new_notification');
        $this->db->from('notification'); 
        $this->db->where('customer_id', $user_id);
		$this->db->where('notification_status', '');
        $data = $this->db->get()->result();
		return $data;
    }    
    
// //-----//////------/////--------/////////------///////
// //======= Plan Section ======//////
// //-----//////------/////--------/////////-------//////   
   public function select_plan(){
       $this->db->select('*');
       $this->db->from('plan');
       $this->db->where('plan_status','active');
       $data = $this->db->get()->result();
       return $data;
   }    
    
   public function selected_plan($id){
	   $this->db->select('*');
       $this->db->from('plan');
	   $this->db->where('plan_id',$id);
       $data = $this->db->get()->result();
       return $data;
	   
	   
   }	

// //-----//////------/////--------/////////------///////
// //======= Plan Order Section ======//////
// //-----//////------/////--------/////////-------////// 

   public function submit_plan($customer_id,$plan_id,$plan_duraction,$order_start_date,$order_end_date,$shift,$plan_cost,$payment_id){  
   
       date_default_timezone_set('Asia/Kolkata');
       $date = new DateTime();
       $today_date = $date->format('Y-m-d');
	   $time_stamp = $date->format('Y-m-d H:i:s');
      
      $check_my_subs = $this->db->get_where('subscribed_plan_details',array('customer_id' => $customer_id, 'start_date <=' => $today_date, 'end_date >=' => $today_date ));
       
      if($check_my_subs->num_rows() > 0){
          
          echo 'already_suscribed';
      
          
      }else{     
       
	   $arr = array(
	        "customer_id" => $customer_id,
			"plan_id"  => $plan_id,
			"shift" => $shift,
			"start_date" => $order_start_date,
			"end_date"  =>  $order_end_date,
			"order_date" => $time_stamp,

	   );
	   
	   if($this->db->insert("orders",$arr)){
		   $order_id = $this->db->insert_id();
           
           
            $this->db->where('customer_id',$customer_id);
            $this->db->set('balance_amount','balance_amount +'.$plan_cost, FALSE);
            if($this->db->update('current_balance')){
                $arr2 = array(
			
			     "customer_id" => $customer_id,
				 "recharge_amount"  => $plan_cost,
				 "recharge_date"  => $time_stamp,
                  "plan_id"  => $plan_id,
				 "payment_id" => $payment_id,
                "order_id" =>  $order_id,   
			
			   );
          
			if($this->db->insert("recharge_detail",$arr2)){
				  
                   $check_subscribed_plan = $this->db->get_where('subscribed_plan_details',array('customer_id' => $customer_id));
                  
                   if($check_subscribed_plan->num_rows() == 1){
                       $arr55 = array(
		        	    "plan_id"  => $plan_id,
                        "shift" => $shift,
		        	    "start_date" => $order_start_date,
		        	    "end_date"  =>  $order_end_date,
                      );
                       $this->db->where('customer_id',$customer_id);
                       if($this->db->update('subscribed_plan_details',$arr55)){
                           echo 'success';
                       }else{ echo 'failed';} 
                      
                   }else{
                    $arr44 = array(
                        "customer_id" => $customer_id,
		        	    "plan_id"  => $plan_id,
                        "shift" => $shift,
		        	    "start_date" => $order_start_date,
		        	    "end_date"  =>  $order_end_date,
                    );
                       
                    if($this->db->insert('subscribed_plan_details',$arr44)){
                        
                          $get_sms_customer = $this->db->get_where('customer_details', array('customer_id' => $customer_id));
                        
                          if($get_sms_customer->num_rows() == 1){
                              
                              $cus_name = $get_sms_customer->result()[0]->customer_name;
                              $cus_mobile = $get_sms_customer->result()[0]->mobile_no;
                                    
									//***************************//
                                    // ******** send sms *******//
									//**************************//
					
									$url = base_url()."send_msg.php?mobile_no=".$cus_mobile."&name=".urlencode($cus_name)."&amount=".$plan_cost."&template=subscribe"; 
		                            $cSession = curl_init(); 
                                    curl_setopt($cSession,CURLOPT_URL,$url); 
                                    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
                                    curl_setopt($cSession,CURLOPT_HEADER, false); 
                                    $result=curl_exec($cSession);
                                    curl_close($cSession);
									
									$url = base_url()."send_msg.php?mobile_no=8819874000&name=".urlencode($cus_name)."&amount=".$plan_cost."&template=subscribe"; 
		                            $cSession = curl_init(); 
                                    curl_setopt($cSession,CURLOPT_URL,$url); 
                                    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
                                    curl_setopt($cSession,CURLOPT_HEADER, false); 
                                    $result=curl_exec($cSession);
                                    curl_close($cSession);
		                            //print_r($result);
							        //***************************//
                                    // ******** send sms *******//
									//**************************//
									
									
                          }
                        
                            echo 'success';
                        
                            
                       }else{ echo 'failed';} 
                   }
                
                                   
                
              }else{
                echo 'failed';   
             }
			
		    }else{
				
				echo "failed";
			}
	   }else{
		   
		   echo "failed";
		   
	   };
      }
   }
  
    
    
   public function renew_plan($customer_id,$plan_id,$plan_duraction,$order_start_date,$order_end_date,$shift,$plan_cost,$payment_id){
        
        date_default_timezone_set('Asia/Kolkata');
       $date = new DateTime();
       $today_date = $date->format('Y-m-d');
	   $time_stamp = $date->format('Y-m-d H:i:s');
      
      $check_my_subs = $this->db->get_where('subscribed_plan_details',array('customer_id' => $customer_id, ));
       
      if($check_my_subs->num_rows() > 0){
              
       
	   $arr = array(
	        "customer_id" => $customer_id,
			"plan_id"  => $plan_id,
			"shift" => $shift,
			"start_date" => $order_start_date,
			"end_date"  =>  $order_end_date,
			"order_date" => $time_stamp,

	   );
	   
	   if($this->db->insert("orders",$arr)){
		   $order_id = $this->db->insert_id();
           
           
            $this->db->where('customer_id',$customer_id);
            $this->db->set('balance_amount','balance_amount +'.$plan_cost, FALSE);
            if($this->db->update('current_balance')){
                $arr2 = array(
			
			     "customer_id" => $customer_id,
				 "recharge_amount"  => $plan_cost,
				 "recharge_date"  => $time_stamp,
                  "plan_id"  => $plan_id,
				 "payment_id" => $payment_id,
                    "order_id" => $order_id,
			
			   );
          
			if($this->db->insert("recharge_detail",$arr2)){
				  
                   $check_subscribed_plan = $this->db->get_where('subscribed_plan_details',array('customer_id' => $customer_id));
                  
                   if($check_subscribed_plan->num_rows() == 1){
                       $arr55 = array(
		        	    "plan_id"  => $plan_id,
                        "shift" => $shift,
		        	   
		        	    "end_date"  =>  $order_end_date,
                      );
                       $this->db->where('customer_id',$customer_id);
                       if($this->db->update('subscribed_plan_details',$arr55)){
                           echo 'success';
                       }else{ echo 'failed';} 
                      
                   }
				/* $get_customer = $this->db->get_where('customer_details',array( "customer_id" => $customer_id,));
				
				if($get_customer->num_rows() == 1){
					
					$cus_name = $get_customer->result()[0]->customer_name;
					$cus_mobile_no = $get_customer->result()[0]->mobile_no;
					
				}else{
					$cus_name = "customer";
					$cus_mobile_no = '';
				} 
				
				echo "success";
				 $username = "messcafefoods@gmail.com";
	            $hash = "13f26ea16c8380284e61d8bfb4cf6af1b0776ffeb280bb87b60ac4d240cbdd62";
	            $test = "0";
	            $sender = "MESSCF";// This is who the message appears to be from.
	            $numbers = '91'.$cus_mobile_no; // A single number or a comma-seperated list of numbers
                $message = rawurlencode('Dear '.$cus_name.',%nThanks for Purchase. %nYou have subscribed tiffin plan Rs. '.$plan_cost.' successfully and is valid till '.$order_end_date.'%nRegards,%nTeam Messcafe');
				
				$message = urlencode($message);
	            $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	            $ch = curl_init('http://api.textlocal.in/send/?');
	            curl_setopt($ch, CURLOPT_POST, true);
	            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	            $result = curl_exec($ch); // This is the result from the API
	            curl_close($ch);
				//print_r($result); 
                
                */
              }else{
                echo 'failed';   
             }
			
		    }else{
				
				echo "failed";
			}
	   }else{
		   
		   echo "failed";
		   
	   };
      }
        
    }
// //-----//////------/////--------/////////------///////
// //======= Vacation Section ======//////
// //-----//////------/////--------/////////-------////// 
 
   public function select_vacation($customer_id){
	   $this->db->select('*');
	   $this->db->from('vacation');
	   $this->db->where('customer_id',$customer_id);
     
	    $this->db->order_by('vacation_id','DESC');
	   $data = $this->db->get();
	   return $data->result();
	   
	   
   }
  
    public function add_vacation($customer_id,$start_date,$end_date,$breakfast,$launch,$dinner){
	   
	   $arr = array(
	     "customer_id" => $customer_id,
		 "start_date"  => $start_date,
		 "end_date"    => $end_date,
		 "shift_one"       => $breakfast,
         "shift_two"       => $launch,
         "shift_three"       => $dinner,
	   
	   );
	   
	   if($this->db->insert("vacation",$arr)){
		   
		   $get_customer = $this->db->get_where('customer_details',array('customer_id' => $customer_id ));
		   
		   if($get_customer->num_rows() == 1){
			   
			   $cus_mobile = 8889955083;
		      $cus_name = $get_customer->result()[0]->customer_name;
			  $s_date = date('d-M-Y',strtotime($start_date));
			  $e_date = date('d-M-Y',strtotime($end_date));
			   
               $msg = "Vacation has successfully applied by ".urlencode($cus_name)." from date ".$s_date." to ".$e_date.". Best Regards, Freshometer";
                $user = "freshometer";
        $password = "Freshometer@123";
        $msisdn = '91'.$cus_mobile;
        $sid = "AKKOTS";
        $name = "vivek";
        $OTP = "6765R";
        $msg = urlencode($msg);
        $fl = "0";
        $gwid = "2";
        $type = "txt";
        $cSession = curl_init(); 
        curl_setopt($cSession,CURLOPT_URL,"http://login.sms.ackko.com/vendorsms/pushsms.aspx?user=".$user."&password=".$password."&msisdn=".$msisdn."&sid=".$sid."&msg=".$msg."&fl=0&gwid=2"); 
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession,CURLOPT_HEADER, false); 
        $result=curl_exec($cSession);
		//echo json_encode($result);
        curl_close($cSession);
      //  print_r($result);
			
			  
		   }
		   
		   echo "success";
	   }else{
		   
		   echo "fail";
	   };
	   
   }
   
   
   public function selected_vacation($id){
	   $this->db->select('*');
	   $this->db->from('vacation');
	   $this->db->where('vacation_id',$id);
	  
	   $data = $this->db->get();
	   return $data->result();
	   
	   
	   
   }
   
   public function edit_vacation($vacation_id,$start_date,$end_date,$shift){
	   $arr = array(
	   
	         "start_date" => $start_date,
			 "end_date"   => $end_date,
			 "shift"       => $shift,
	   
	   );
	   $this->db->where('vacation_id',$vacation_id);
	   if($this->db->update('vacation',$arr)){
		   
		   echo "success";
	   }else{
		   
		   echo "fail";
	   }
   }
    
	public function delete_vacation($vacation_id){
		
      $this->db->join('customer_details','customer_details.customer_id = vacation.customer_id');
      $get_customer = $this->db->get_where('vacation',array('vacation_id' => $vacation_id ));
		   
		   if($get_customer->num_rows() == 1){
			   
			   $cus_mobile = 8889955083;
		      $cus_name = $get_customer->result()[0]->customer_name;
			  $s_date = $get_customer->result()[0]->start_date;
			  $e_date = $get_customer->result()[0]->end_date;
			  
			  //***************************//
                                    // ******** send sms *******//
									//**************************//
					
									$url = base_url()."send_msg.php?mobile_no=".$cus_mobile."&name=".urlencode($cus_name)."&start_date=".$s_date."&end_date=".$e_date."&template=vacation_delete"; 
		                            $cSession = curl_init(); 
                                    curl_setopt($cSession,CURLOPT_URL,$url); 
                                    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
                                    curl_setopt($cSession,CURLOPT_HEADER, false); 
                                    $result=curl_exec($cSession);
                                    curl_close($cSession);
		                            //print_r($result);
							        //***************************//
                                    // ******** send sms *******//
									//**************************//
			  
		   }		
		

		$this->db->where('vacation_id',$vacation_id);
		if($this->db->delete('vacation')){
			
		   echo "success";
	   }else{
		   
		   echo "fail";
	   }
	}
	
	public function vacation_maping($customer_id){
	    $this->db->select('*');
	    $this->db->from('vacation');
	   $this->db->where('customer_id',$customer_id);
	    //$this->db->order_by('vacation_id','DESC');
	   $data = $this->db->get();
	   $y = array();
	   
	   foreach($data->result() as $row){
		   $k = 0;
		   for($i = $row->start_date;   $i <= $row->end_date; $i = date('Y-m-d', strtotime($row->start_date.'+'.$k.' day'))){
		      $k++;
			  $y[] = $i;
		   }
		   //echo $row->vacation_id;
	   }
	   
	   return $y;
		
	}
 // //-----//////------/////--------/////////------///////
// //======= Special menu Section ======//////
// //-----//////------/////--------/////////-------////// 
    
  public function select_special_menu(){
      
      $this->db->select('*');
      $this->db->from('special_menu');
      $data = $this->db->get()->result();
      return $data;
      
  } 
    
   public function all_voter(){
      
      $this->db->select('*');
      $this->db->from('customer_details');
      $this->db->where('customer_status','active');
      $data = $this->db->get()->result();
      $count =  count($data); 
      return $count;
      
  }     
    
  public function menu_voting($customer_id,$menu_id){
       date_default_timezone_set('Asia/Kolkata');
       $date = new DateTime();
       $time_stamp = $date->format('Y-m-d H:i:s');
      
      
      $this->db->where('special_menu_id', $menu_id);
      $this->db->set('voting','voting + 1',FALSE);
      if($this->db->update('special_menu')){
          $arr = array(
              "customer_id" => $customer_id,
              "special_menu_id" => $menu_id,
              "date_time" => $time_stamp,
          );
          if($this->db->insert('voting',$arr)){
              echo 'success';
          }else{
              
               echo 'fail';
          }
          
      }else{
          echo 'fail';
      }
      
  } 
    
  public function check_voting($customer_id){
       date_default_timezone_set('Asia/Kolkata');
      
      
       $date = new DateTime();
       $current_date = $date->format('Y-m-d');
       $time_stamp = $date->format('Y-m-d H:i:s');
       $time = $date->format('H:i:s');
       $dayofweek = date('w', strtotime($current_date));
       
       $check_active_menu = $this->db->get_where('special_menu',array('status' => 'active',));
 	   
      	if($check_active_menu->num_rows() > 0){  
           //echo $dayofweek;
           if($dayofweek == 4){
                echo "final_menu";
           }else{
               
               if($dayofweek == 3 && $time >= '20:00:00'){
                   
                   echo "freeze";
               }else{
                   
                   $check = $this->db->get_where('voting', array( "customer_id" => $customer_id ));
                   
                   if($check->num_rows() == 1){
                       echo "close";
                   }else{
                       
                       echo "open";
                   }
                  
                   
               }
               
           }
     
		}else{
			
			echo "deactive";
		}
  }
    
  public function pick_customer_vote($customer_id){
      
      $this->db->select('*');
      $this->db->from('voting');
      $this->db->where('customer_id',$customer_id);
      $data = $this->db->get();
      return $data->result();
      
  }
    
  public function voting_result(){
      
      
        $this->db->select('*');
        $this->db->select_max('voting');
        $this->db->from('special_menu');
        $query=$this->db->get();
       return $query->result();
        
      
  }    
    
    
  public function feedback($customer_id,$quality_rank,$service_rank,$suggestion){
       date_default_timezone_set('Asia/Kolkata');
       $date = new DateTime();
       $time_stamp = $date->format('Y-m-d H:i:s');
      
      $check = $this->db->get_where('feedback',array( 'customer_id' => $customer_id ));
      
      if($check->num_rows() == 1){
           if($suggestion != ''){
                 $arr = array(
          
                    'quality_rank' => $quality_rank,
                    'service_rank' => $service_rank,
                    'suggestion' =>  $suggestion,
                    'time_stamp' =>  $time_stamp,
                
                  );
               
           }else{
               $arr = array(
          
                    'quality_rank' => $quality_rank,
                    'service_rank' => $service_rank,
                    'time_stamp' =>  $time_stamp,
                
                  );
               
           }
             
          
            $this->db->where('customer_id',$customer_id);
            if($this->db->update('feedback',$arr)){
                echo "success";
            }else{
                echo "failed";
            }
          
          
      }else{
          
          $arr2 = array(
          
               'customer_id' => $customer_id,
              'quality_rank' => $quality_rank,
              'service_rank' => $service_rank,
              'suggestion' =>  $suggestion,
              'time_stamp' =>  $time_stamp,
          
          );
          
          if($this->db->insert('feedback',$arr2)){
              
              echo "success";
          }else{
              
              echo "failed";
          }
          
      }
      
      
  }  
    
  public function select_feedback($customer_id){
      
        $this->db->select('*');
        $this->db->from('feedback');
        $this->db->where('customer_id',$customer_id);
        $data = $this->db->get();
       return $data->result();
      
      
  }    
    
    
// //-----//////------/////--------/////////------///////
// //======= Tifin Delivery Confirmation ======//////
// //-----//////------/////--------/////////-------//////
    
   public function tifin_delivery_confirmation($customer_id,$card_no){
       
        $this->db->select('*');
        $this->db->from('tifin_id');
        $this->db->where('tifin_id.customer_id',$customer_id);
        $this->db->where('qr_code',$card_no);
        $this->db->join("tifin_order_details","tifin_order_details.customer_id = tifin_id.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = tifin_id.customer_id");
        $check = $this->db->get();
        
        if($check->num_rows() == 1){
            date_default_timezone_set('Asia/Kolkata');
            $date = new DateTime();
            $time_stamp = $date->format('Y-m-d H:i:s');
            
            $coution_money = 300;
            
            $current_balance = $check->result()[0]->balance_amount;
            $tifin_charge = $check->result()[0]->tifin_cost;
            
            $total_charge = $tifin_charge+$coution_money;
            
               if($current_balance >= $tifin_charge){
                    $this->db->set("delivery_status","delivered");
                    $this->db->set("last_transaction_date",$time_stamp);
                    $this->db->where('qr_code',$card_no);
                    if($this->db->update("tifin_id")){
                        
                        $arr = array(
                            "customer_id" => $customer_id,
                            "transaction_amount" => $tifin_charge,
                            "transaction_date" => $time_stamp,
                        
                        );
                        
                        if($this->db->insert("transaction_detail",$arr)){
                            $available_balance = $current_balance-$tifin_charge;
                            
                            $this->db->where("customer_id",$customer_id);
                            $this->db->set("balance_amount",$available_balance);
                            if($this->db->update("current_balance")){
                                echo "delivered";
                            }else{
                                echo "failed";
                            }
                         }else{
                            echo "failed";
                         }
                    }else{
                        echo "failed";
                    }
                }else{
                   echo "insufficent_balance";
                }
            }else{
                    echo "invalid";
            }

   }    
      
// //-----//////------/////--------/////////------///////
// //======= Orders List======//////
// //-----//////------/////--------/////////-------//////    
    
    public function order_list($shift,$status,$login_id)
     {  
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $time_stamp = $date->format('Y-m-d H:i:s');  
       
        

        $this->db->select('*');
        $this->db->from('genrated_order_list');
        $this->db->join("customer_details","customer_details.customer_id = genrated_order_list.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
            
        if($login_id != ''){    
        
        $this->db->join('assigned_colony','assigned_colony.colony_id = customer_details.colony_id');    
        $this->db->where('assigned_colony.agent_id',$login_id);    
        }
            
        $this->db->where("genrated_order_list.order_date", $current_date);
        if($shift && $shift != 'all'){
            $this->db->where("genrated_order_list.shift_id", $shift);
        }
        if($status){
            $this->db->where("genrated_order_list.order_status", $status);
        }
        
         
        //$this->db->or_where("shift_id",3);
        $data = $this->db->get()->result();
        return $data;
        //echo json_encode($data);
          
    } 
    
    
    public function search_orders($customer_id,$assigning_shift){
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $time_stamp = $date->format('Y-m-d H:i:s'); 
        
        
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->join("tifin_order_details","tifin_order_details.customer_id = customer_details.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
       
        
        $this->db->where("customer_details.customer_id",$customer_id);
        $this->db->where("tifin_order_details.start_date <=",$current_date);
        //$this->db->or_where("shift_id",3);
        $check = $this->db->get();
        
        if($check->num_rows() == 1){
            
            
            $balance = $check->result()[0]->balance_amount;
            
            if($assigning_shift == 1){
                $order_status = $check->result()[0]->morning_order_status;
            }else if($assigning_shift == 2){
                $order_status = $check->result()[0]->evening_order_status;
            }
            
            
            if($balance >= 300){
                
                  if($order_status == ''){
                      
                      echo $customer_id;
                      
                  }else if($order_status == 'assigned'){
                      
                      echo "alredy_assigned";
                      
                  }else if($order_status == 'vacation'){
                      
                      echo "vacation";
                  }else if($order_status == 'null'){
                      
                      echo "null";
                  }
                
            }else{
                
                echo "insufficeant_balance";
            }
            
            
        }else{
            
            echo "invalid";
            
        }
        
        
        
    }
    
    
    public function selected_order($customer_id,$shift_id){
         date_default_timezone_set('Asia/Kolkata');
         $date = new DateTime();
         $current_date = $date->format('Y-m-d');
         $time_stamp = $date->format('Y-m-d H:i:s');  
        
        
         $this->db->select('*');
         $this->db->from('customer_details');
          $this->db->where("customer_details.customer_id",$customer_id);
         $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
         $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
        
         $this->db->join("genrated_order_list","genrated_order_list.customer_id = customer_details.customer_id",'left');
         $this->db->join("plan","plan.plan_id = genrated_order_list.plan_id",'left');
         $this->db->where("genrated_order_list.order_date",$current_date);
         $this->db->where("genrated_order_list.shift_id",$shift_id);
        
         //$this->db->or_where("shift_id",3);
         $data = $this->db->get();
         return $data->result();
        
    }
    
  
    
    public function search_by_shift_and_meal($shift,$status,$colony_id,$login_id){
         date_default_timezone_set('Asia/Kolkata');
         $date = new DateTime();
         $current_date = $date->format('Y-m-d');
         $time_stamp = $date->format('Y-m-d H:i:s');  
         
        
        $this->db->select('*');
        $this->db->from('genrated_order_list');
        $this->db->join("customer_details","customer_details.customer_id = genrated_order_list.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
        
        if($login_id != ''){    
        
        $this->db->join('assigned_colony','assigned_colony.colony_id = customer_details.colony_id');    
        $this->db->where('assigned_colony.agent_id',$login_id);    
        }
        
        $this->db->where("genrated_order_list.order_date", $current_date);
        if($shift && $shift != 'all'){
            $this->db->where("genrated_order_list.shift_id", $shift);
        }
        
        if($status){
            $this->db->where("genrated_order_list.order_status", $status);
        }
        
        if($colony_id){
            $this->db->where("customer_details.colony_id", $colony_id);
        }
        
         $data = $this->db->get();
         return $data->result();

        
    }
   
     
    public function count_orders_of_shift_one($status,$login_id){
        date_default_timezone_set('Asia/Kolkata');
         $date = new DateTime();
         $current_date = $date->format('Y-m-d');
         $time_stamp = $date->format('Y-m-d H:i:s'); 
        
        $this->db->select('COUNT(genrated_order_id) AS total');
        $this->db->from('genrated_order_list');
         $this->db->join("customer_details","customer_details.customer_id = genrated_order_list.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
       
          if($login_id != ''){    
        
        $this->db->join('assigned_colony','assigned_colony.colony_id = customer_details.colony_id');    
        $this->db->where('assigned_colony.agent_id',$login_id);    
        }
         
        $this->db->where("genrated_order_list.order_date", $current_date);
         $this->db->where("genrated_order_list.shift_id", 1);
         $this->db->where("genrated_order_list.order_status", $status);
     
        
        $data = $this->db->get();
        return $data->result();
    }
    
     public function count_orders_of_shift_two($status,$login_id){
        date_default_timezone_set('Asia/Kolkata');
         $date = new DateTime();
         $current_date = $date->format('Y-m-d');
         $time_stamp = $date->format('Y-m-d H:i:s'); 
        
        $this->db->select('COUNT(genrated_order_id) AS total');
        $this->db->from('genrated_order_list');
          $this->db->join("customer_details","customer_details.customer_id = genrated_order_list.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
       
          if($login_id != ''){    
        
        $this->db->join('assigned_colony','assigned_colony.colony_id = customer_details.colony_id');    
        $this->db->where('assigned_colony.agent_id',$login_id);    
        }
         
        $this->db->where("genrated_order_list.order_date", $current_date);
         $this->db->where("genrated_order_list.shift_id", 2);
          $this->db->where("genrated_order_list.order_status", $status);
        
        $data = $this->db->get();
        return $data->result();
    }
    
     public function count_orders_of_shift_three($status,$login_id){
        date_default_timezone_set('Asia/Kolkata');
         $date = new DateTime();
         $current_date = $date->format('Y-m-d');
         $time_stamp = $date->format('Y-m-d H:i:s'); 
        
        $this->db->select('COUNT(genrated_order_id) AS total');
        $this->db->from('genrated_order_list');
         $this->db->join("customer_details","customer_details.customer_id = genrated_order_list.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
       
          if($login_id != ''){    
        
        $this->db->join('assigned_colony','assigned_colony.colony_id = customer_details.colony_id');    
        $this->db->where('assigned_colony.agent_id',$login_id);    
        }
         
        $this->db->where("genrated_order_list.order_date", $current_date);
        $this->db->where("genrated_order_list.shift_id", 3);
        $this->db->where("genrated_order_list.order_status", $status);
         
         
        $data = $this->db->get();
        return $data->result();
    }
// //-----//////------/////--------/////////------///////
// //======= assigned Orders ======//////
// //-----//////------/////--------/////////-------////// 
    
    public function assigned_orders_list(){
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $time_stamp = $date->format('Y-m-d H:i:s');  
        $get_time = date("H:i:s");
         if($get_time >= '04:00:00'  && $get_time <= '17:00:00'){
             $shift_id = 1;
         }else{
            $shift_id = 2;
         }
        
        $this->db->select('*');
        $this->db->from('genrated_order_list');
        $this->db->join("customer_details","customer_details.customer_id = genrated_order_list.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
        
        $this->db->where("genrated_order_list.order_date", $current_date);
        if($shift_id){
             $this->db->where('genrated_order_list.shift_id',$shift_id);
        
        }
        $this->db->where('genrated_order_list.order_status','assigned');
        //$this->db->or_where("shift_id",3);
        $data = $this->db->get()->result();
        return $data;
        //echo json_encode($data);
        
    }
    
     public function filter_assigned_orders_list($shift,$meal){
         date_default_timezone_set('Asia/Kolkata');
         $date = new DateTime();
         $current_date = $date->format('Y-m-d');
         $time_stamp = $date->format('Y-m-d H:i:s'); 
         
         $get_per_tifin_cost = $this->db->get('per_tiffin_cost');
         if($get_per_tifin_cost->num_rows() == 1){
             $per_tifin_cost = $get_per_tifin_cost->result()[0]->cost;
         }else{
             $per_tifin_cost = 0;
         }
         
         $this->db->select('*');
         $this->db->from('customer_details');
         $this->db->join("tifin_order_details","tifin_order_details.customer_id = customer_details.customer_id");
		 $this->db->join("tifin_id","tifin_id.customer_id = customer_details.customer_id");
         $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
         $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
         
         // $this->db->join("tifin_id","tifin_id.customer_id = customer_details.customer_id");
         $this->db->where("tifin_order_details.start_date <=",$current_date);
         $this->db->where("balance_amount >=", 300+$per_tifin_cost);
         
         if($meal != "all"){
             $this->db->where("tifin_order_details.roti", $meal);    
         } 
        
         if($shift == 1){
            $this->db->where("tifin_order_details.morning_order_status", 'assigned');
         }else if($shift == 2){
             $this->db->where("tifin_order_details.evening_order_status", 'assigned');
         }
         $data = $this->db->get();
         return $data->result();

        
    }

    public function search_assigned_orders($customer_id,$assigning_shift){
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $time_stamp = $date->format('Y-m-d H:i:s'); 
        
        
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->join("tifin_order_details","tifin_order_details.customer_id = customer_details.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
       
        // $this->db->join("tifin_id","tifin_id.customer_id = customer_details.customer_id");
        $this->db->where("tifin_order_details.start_date <=",$current_date);
        $this->db->where("customer_details.customer_id",$customer_id);
        
        if($assigning_shift == 1){
               $this->db->where("tifin_order_details.morning_order_status",'assigned');
         }else if($assigning_shift == 2){
            $this->db->where("tifin_order_details.evening_order_status",'assigned');
         }
        //$this->db->or_where("shift_id",3);
        $check = $this->db->get();
        
        if($check->num_rows() == 1){
            
            
            $balance = $check->result()[0]->balance_amount;
            
            
            if($balance >= 300){
              
                      echo $customer_id;

            }else{
                
                echo "insufficeant_balance";
            }
            
            
        }else{
            
            echo "invalid";
            
        }
        
        
        
    }
 
 // //-----//////------/////--------/////////------///////
// //======= Agent section complete order list ======//////
// //-----//////------/////--------/////////-------//////        
     
    public function complete_orders_list(){
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $time_stamp = $date->format('Y-m-d H:i:s');  
        $get_time = date("H:i:s");
         if($get_time >= '04:00:00'  && $get_time <= '17:00:00'){
             $shift_id = 1;
         }else{
            $shift_id = 2;
         }
        
      
      
        $this->db->select('*');
        $this->db->from('genrated_order_list');
        $this->db->join("customer_details","customer_details.customer_id = genrated_order_list.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
      
        $this->db->where("genrated_order_list.order_date", $current_date);
        if($shift_id){
             $this->db->where('genrated_order_list.shift_id',$shift_id);
        
        }
         $this->db->where("genrated_order_list.order_status", 'completed');
        
        //$this->db->or_where("shift_id",3);
        $data = $this->db->get()->result();
        return $data;
        
    }
    
    public function search_complete_orders_by_shift($shift,$meal){
        
        date_default_timezone_set('Asia/Kolkata');
         $date = new DateTime();
         $current_date = $date->format('Y-m-d');
         $time_stamp = $date->format('Y-m-d H:i:s');  
        
         $this->db->select('*');
        $this->db->from('genrated_order_list');
        $this->db->join("customer_details","customer_details.customer_id = genrated_order_list.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
       
        $this->db->where("genrated_order_list.order_date", $current_date);
        if($shift){
             $this->db->where('genrated_order_list.shift_id',$shift);
        
        }
         $this->db->where("genrated_order_list.order_status", 'completed');
        
         $data = $this->db->get();
         return $data->result();

        
    }
    
    
 // //-----//////------/////--------/////////------///////
// //=======Prevent order list Agent section  ======//////
// //-----//////------/////--------/////////-------//////        
     
    public function prevent_orders_list(){
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $time_stamp = $date->format('Y-m-d H:i:s');  
        $get_time = date("H:i:s");
         if($get_time >= '04:00:00'  && $get_time <= '17:00:00'){
             $shift_id = 1;
         }else{
            $shift_id = 2;
         }
        
        $get_per_tifin_cost = $this->db->get('per_tiffin_cost');
         if($get_per_tifin_cost->num_rows() == 1){
             $per_tifin_cost = $get_per_tifin_cost->result()[0]->cost;
         }else{
             $per_tifin_cost = 0;
         }
      
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->join("tifin_order_details","tifin_order_details.customer_id = customer_details.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
       
       // $this->db->join("tifin_id","tifin_id.customer_id = customer_details.customer_id");
        
        $this->db->where("tifin_order_details.start_date <=",$current_date);
        $this->db->where("balance_amount <",340);
        
        //$this->db->or_where("shift_id",3);
        $data = $this->db->get()->result();
        return $data;
        
    }
    
    public function search_prevent_orders_by_shift($shift,$meal){
        
        date_default_timezone_set('Asia/Kolkata');
         $date = new DateTime();
         $current_date = $date->format('Y-m-d');
         $time_stamp = $date->format('Y-m-d H:i:s');  
        
         $this->db->select('*');
         $this->db->from('customer_details');
         $this->db->join("tifin_order_details","tifin_order_details.customer_id = customer_details.customer_id");
         $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
         $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
        
         
         $this->db->where_in("tifin_order_details.shift_id",[ $shift,'3']);
         $this->db->where("tifin_order_details.start_date <=",$current_date);
        
         
         if($meal != "all"){
             $this->db->where("tifin_order_details.roti", $meal);    
         } 
        
        
        if($shift == 1){
            $this->db->where("tifin_order_details.morning_order_status", 'delivered');
        }else if($shift == 2){
            $this->db->where("tifin_order_details.evening_order_status", 'delivered');
        }
        
         $data = $this->db->get();
         return $data->result();

        
    }    
    
 // //-----//////------/////--------/////////------///////
// //======= assigning Tifin qr code ======//////
// //-----//////------/////--------/////////-------//////    
    public function assign_tifin_qrcode($tifin_barcode, $customer_id,$assigning_shift){
        
       // echo $customer_id;
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
        
        $this->db->select('*');
        $this->db->from('current_balance');
        $this->db->join('tifin_order_details','tifin_order_details.customer_id = current_balance.customer_id');
        $this->db->where('current_balance.customer_id',$customer_id);
        $check_customer_balance = $this->db->get();
       
        if($check_customer_balance->num_rows() == 1){
        
        $required_balance = (300 + $check_customer_balance->result()[0]->tifin_cost);
            
        if($check_customer_balance->result()[0]->balance_amount >= $required_balance){
        
        $check = $this->db->get_where('tifin_id', array( 'qr_code' => $tifin_barcode));
        
        if($check->num_rows() == 1){
            
             $tifin_status = $check->result()[0]->tifin_status;
             if($assigning_shift == 1){
                 $tifin_status_shiftname = 'morning';
             }else if($assigning_shift == 2){
                 $tifin_status_shiftname = 'evening';
             }
            
            if($tifin_status == 'broken' || $tifin_status == 'lost'){
                echo 'broken';
            }else if($tifin_status == 'morning' || $tifin_status == 'evening'){
                echo 'assigned';
            }else{

                    $arr = array(
                     'customer_id' => $customer_id,
                     'tifin_status' => $tifin_status_shiftname,
                     'tifin_assign_time' => $time_stamp,
                     
                     );
                     
                     $this->db->where('qr_code',$tifin_barcode);
                     if($this->db->update('tifin_id',$arr)){
                         
                         $this->db->where('customer_id',$customer_id);
                         if($assigning_shift == 1){
                             $this->db->set('morning_order_status','assigned');
                         }else if($assigning_shift == 2){
                             $this->db->set('evening_order_status','assigned');
                             
                         }
                         if($this->db->update('tifin_order_details')){
                             echo "success";
                         }else{
                             echo "failed";
                         }
                         
                     }else{
                         
                         echo "failed";
                     }
            }
        }else{
            echo "invalid";
        }
        
        }else{
            echo "low_ballance";
        }
        }
    }
    
       
     
// //-----//////------/////--------/////////------///////
// //======= Order Delivered ======//////
// //-----//////------/////--------/////////-------//////    
    
    public function order_delivered($tifin_barcode, $customer_id){
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
        
        $check_tifin_id = $this->db->get_where('tifin_id', array('qr_code' => $tifin_barcode));
        
        //echo $tifin_barcode;
        
        if($check_tifin_id->num_rows() == 1){
        
        $check_cutomer_id =  $check_tifin_id->result()[0]->customer_id;   
        
        if($check_cutomer_id == $customer_id){    
        
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->join('tifin_order_details','tifin_order_details.customer_id = customer_details.customer_id');
        $this->db->join('current_balance','current_balance.customer_id = customer_details.customer_id');
        $this->db->join('tifin_id','tifin_id.customer_id = customer_details.customer_id');
        $this->db->where('customer_details.customer_id',$customer_id);
        $this->db->where('qr_code',$tifin_barcode);
        $check = $this->db->get();    
            
            
            
        $tifin_no = $check->result()[0]->tifin_card_no;
        $order_detail = $check->result()[0]->roti.' roti';
        $tifin_cost = $check->result()[0]->tifin_cost;

        $ac_ballance = $check->result()[0]->balance_amount;
        $avalible_ballance = ($ac_ballance-$tifin_cost);
            
        $tifin_id_status =  $check->result()[0]->tifin_status;   

        if($ac_ballance < 300+$tifin_cost){
        	echo "low_balance";
        }else{
            if($tifin_id_status == 'morning'){
                                 
                 $transaction_shift_id = '1';
             }else if($tifin_id_status == 'evening'){
                 
                 $transaction_shift_id = '2';
             }
          
            
            $arr = array(
            
                  'customer_id' => $customer_id,
                  'tifin_no'    => $tifin_no,
                  'order_detail'=> $order_detail,
                  'transaction_amount' => $tifin_cost,
                  'ledger' => $avalible_ballance,
                  'shift_id' => $transaction_shift_id,
                  'transaction_date' => $time_stamp,
            
            );
            
            if($this->db->insert('transaction_detail',$arr)){
                  $transaction_id = $this->db->insert_id(); 
                  $arr2 = array(
		             'balance_amount' => $avalible_ballance,
		          );
                  $this->db->where('customer_id',$customer_id);
                  if($this->db->update('current_balance',$arr2)){
                      
                      $arr3 = array(
                      
                         'customer_id' => null,
                         'tifin_status' => 'delivered',
                         'transaction_id' => $transaction_id,
                         'tifin_assign_time' => '0000-00-00 00:00:00',
                         'last_transaction_date' => $time_stamp,
                      );
                      $this->db->where('qr_code', $tifin_barcode);
                      if($this->db->update('tifin_id',$arr3)){
                             $this->db->where('customer_id',$customer_id);
                             if($tifin_id_status == 'morning'){
                                 
                                 $this->db->set('morning_order_status', 'delivered');
                             }else if($tifin_id_status == 'evening'){
                                 
                                 $this->db->set('evening_order_status', 'delivered');
                             }
                          
                             
                             if($this->db->update('tifin_order_details')){
                                  echo 'success';
                                 
                             }else{
                                  echo 'failed';
                                 
                             }
                          
                      }else{
                           echo 'failed';
                      }
                      
                  }else{
                      echo 'failed';
                  } 
                
            }else{
                
                echo 'failed';
            }
        }
        
        }else{
            
            echo 'wrong_tifin';
            
        }
            
        }else{
            
            echo 'invalid';
            
        }

        
    }
    
    
    
    // add payment
    
      public function add_payment($customer_id,$recharge_amount,$payment_id){
        
		$check = $this->db->get_where('current_balance', array('customer_id' => $customer_id));
		if($check->num_rows() == 1){
			$ac_ballance = $check->result()[0]->balance_amount;
			$total_ballance = ($ac_ballance+$recharge_amount);
				$arr = array(
		        'balance_amount' => $total_ballance,
		        );
		    	$this->db->where('customer_id',$customer_id);
		    	if($this->db->update('current_balance',$arr)){
					date_default_timezone_set('Asia/Kolkata');
                    $date = new DateTime();
					$re_date = $date->format('Y-m-d');
                    $time_stamp = $date->format('Y-m-d H:i:s');
					$arr2 = array(
                        'customer_id' =>  $customer_id,
                        'recharge_amount' => $recharge_amount,
                        'user_id' =>  '5',
					    'recharge_date' => $time_stamp,
                        'payment_id' => $payment_id,
						
					);
					if($this->db->insert('recharge_detail',$arr2)){
                                      /*
							            $this->db->select('*');
										$this->db->from('customer_details');
										$this->db->where('customer_details.customer_id',$customer_id);
										$this->db->join('atm_card_detail','atm_card_detail.customer_id = customer_details.customer_id');
										$this->db->join('current_balance','current_balance.customer_id = customer_details.customer_id');
										$get_sms_value = $this->db->get();
							            if($get_sms_value->num_rows() == 1){
											
										$get_name = $get_sms_value->result()[0]->first_name;

										$get_atm = $get_sms_value->result()[0]->atm_card_no;
										
										$get_balance = $get_sms_value->result()[0]->balance_amount;
										
										$get_number = $get_sms_value->result()[0]->contact_1;
										
										if(isset($get_name,$get_atm,$get_balance,$get_number,$value)){
										
										if(strlen($get_name) > 15){
                                            $cus_name = substr($get_name,0, 15);
                                    
                                        }else{
                                    
                                            $cus_name = $get_name;
                                        }
										*/
										/*$username = "sharmadairy@gmail.com";
	                                    $hash = "5ab31680b52065c0860857c56560fd89a0970b553b8c50e31036cd8e093c1d54";
                                        
	                                    // Config variables. Consult http://api.textlocal.in/docs for more info.
	                                    $test = "0";
                                        
	                                    // Data for text message. This is the text message data.
	                                    $sender = "SDAIRY"; // This is who the message appears to be from.
	                                    $numbers = '91'.$get_number; // A single number or a comma-seperated list of numbers
	                                    
                                        $message = rawurlencode ('Dear '.$cus_name.' ,%nYour card number '.$get_atm.' has been successfully recharged with Rs. '.number_format($value).' Available Balance is Rs. '.number_format($get_balance).' %nThank You,%nTeam Sharma Dairy');    
                                        //('Dear '.$customer_name.',%nWelcome to Sharma Dairy%nYour card No. is '.$atm_card.'');    
                                        //('Dear '.$customer_name.',%nYour card No. '.$atm_card.' has successfully recharged with ₹. '.$recharge_value.' Avl Bal ₹. '.$total_ballance.'%nThank You,%nTeam Sharma Dairy');    
                                            
                                        //('Dear '.$customer_name.'%nYour card number '.$atm_card.' has been successfully recharged with Rs'.$recharge_value.' Available balance Rs'.$total_ballance.'%nThank You,%nTeam Sharma Dairy');    
	                                    // 612 chars or less
	                                    // A single number or a comma-seperated list of numbers
	                                    $message = urlencode($message);
	                                    $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	                                    $ch = curl_init('http://api.textlocal.in/send/?');
	                                    curl_setopt($ch, CURLOPT_POST, true);
	                                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	                                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	                                    $result = curl_exec($ch); // This is the result from the API
	                                    curl_close($ch);*/
                                        //$check =  json_decode($result); 
                                        //print_r($result);
                                        echo "success";
                        
										}else{
                                             echo 'failed';
                                        }
										
                            
                }else{
                    
                    echo 'failed';
                }

		}else{
			echo "invalid";
		}
        
        
        
    }
    
    public function start_orders($customer_id,$recharge_amount,$order_start_date,$shift,$payment_id){
        
           $check = $this->db->get_where('customer_details',array( 'customer_id' => $customer_id));
        
           if($check->num_rows() == 1){
               
                 $arr  = array(
                 
                      'customer_id' => $customer_id,
                      'balance_amount' => $recharge_amount,
                 );
               
                if($this->db->insert('current_balance',$arr)){
                    if($shift == 1){
                        $morning_order_status = '';
                        $evening_order_status = 'null';
                        
                    }else if($shift == 2){
                        $morning_order_status = 'null';
                        $evening_order_status = '';
                        
                    }else if($shift == 3){
                         $morning_order_status = '';
                         $evening_order_status = '';
                        
                    }
                    
                    
                    $arr2 = array(
                    
                          'customer_id' => $customer_id,
                          'shift_id' => $shift,
                          'morning_order_status' => $morning_order_status,
                          'evening_order_status' => $evening_order_status,
                          'start_date' => $order_start_date,
                    
                    );
                    
                    if($this->db->insert('tifin_order_details',$arr2)){
                          date_default_timezone_set('Asia/Kolkata');
                          $date = new DateTime();
					      $re_date = $date->format('Y-m-d');
                          $time_stamp = $date->format('Y-m-d H:i:s');
					      $arr3 = array(
                              'customer_id' =>  $customer_id,
                              'recharge_amount' => $recharge_amount,
                              'user_id' =>  '5',
					          'recharge_date' => $time_stamp,
                              'payment_id' => $payment_id,
					      	
					      );
					      if($this->db->insert('recharge_detail',$arr3)){
                               
                              echo 'success';
                              
                          }else{
                              
                              echo 'failed';
                          }
                         
                    }else{
                        
                        echo 'failed';
                    }
                }else{
                        
                        echo 'failed';
                    }
               
           }else{
               
                echo 'failed';
           }
        
    }
    
    
// //-----//////------/////--------/////////------///////
// //======= Agent home find tifin section ======//////
// //-----//////------/////--------/////////-------////// 
    
   public function find_tifin($qr_code){	   
        
           $check_qr = $this->db->get_where('tifin_id',array('qr_code' => $qr_code));
       
           if($check_qr->num_rows() == 1){
               
               $check2 = $this->db->get_where('tifin_id', array('qr_code' => $qr_code, 'customer_id !=' => '' , 'tifin_status !=' => '' ));
               
               if($check2->num_rows() == 1){
                   
                   echo $check2->result()[0]->customer_id;
                   
               }else{
                   
                  echo 'not_assigned';
               }
               
           }else{
               
               echo "invalid";
               
           }
        
    }
    
    public function find_tifin_details($customer_id){
        
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->where('customer_details.customer_id',$customer_id);
        $this->db->join('tifin_id','tifin_id.customer_id = customer_details.customer_id');
        $this->db->join('tifin_order_details','tifin_order_details.customer_id = customer_details.customer_id');
        $this->db->join('colony_detail','colony_detail.colony_id = customer_details.colony_id');
       
        $this->db->join('current_balance','current_balance.customer_id = customer_details.customer_id');
        $data = $this->db->get();
        return $data->result();
    }
    
    
// //-----//////------/////--------/////////------///////
// //======= Delete assigned Orders ======//////
// //-----//////------/////--------/////////-------//////      
    
   public function delete_assign_order($shift,$customer_id){	   
        
          if($shift == 1){
           
           $arr = array(
           
               'customer_id' => null,
               'tifin_status' => '',
               'tifin_assign_time' => '0000-00-00 00:00:00',
           );
           
           $this->db->where('customer_id',$customer_id);
           $this->db->where('tifin_status','morning');
           if($this->db->update('tifin_id',$arr)){
               
               $this->db->where('customer_id',$customer_id);
               $this->db->set('morning_order_status','');
               if($this->db->update('tifin_order_details')){
                   
                   echo "success";
               }else{ echo "failed";}
               
           }else{ echo "failed";}
           
       }else if($shift == 2){
           
           $arr = array(
           
               'customer_id' => null,
               'tifin_status' => '',
               'tifin_assign_time' => '0000-00-00 00:00:00',
           );
           
           $this->db->where('customer_id',$customer_id);
           $this->db->where('tifin_status','evening');
           if($this->db->update('tifin_id',$arr)){
               
               $this->db->where('customer_id',$customer_id);
               $this->db->set('evening_order_status','');
               if($this->db->update('tifin_order_details')){
                   
                   echo "success";
               }else{ echo "failed";}
               
           }else{ echo "failed";}
           
       } 
        
    }     
    
// //-----//////------/////--------/////////------///////
// //======= Ckeck app version number======//////
// //-----//////------/////--------/////////-------//////  
    public function check_app_version(){	   

          $this->db->select('*');
		  $this->db->from('app_version');
		  $data = $this->db->get();
		  
		  if($data->num_rows() == 1){
			  
			   $version_code = $data->result()[0]->version_no;
			   echo $version_code;
		  }else{
			  
			  echo "failed";
		  }
    }
    
// //-----//////------/////--------/////////------///////
// //======= Select Colony ======//////
// //-----//////------/////--------/////////-------//////  
     public function select_colony(){	   
         $this->db->select('*');
         $this->db->from('colony_detail');
         $data = $this->db->get();
         return $data->result();
     }    


// //-----//////------/////--------/////////------///////
// //======= Location Tracking======//////
// //-----//////------/////--------/////////-------//////

			 // agent Section
			 	public function location_tracking($lat,$lng,$agent_id){

			 		$check_agent = $this->db->get_where('agent_location',array( "agent_id" => $agent_id));

			 		if($check_agent->num_rows() > 0){
			 			$get_lat = $check_agent->result()[0]->lat;
			 			$get_lng = $check_agent->result()[0]->lng;
			 			if($lat != $get_lat && $lng != $get_lng){

			 			$arr1 = array(

			 			    "lat" => $lat,
			 				"lng" => $lng

			 			);
			 			$this->db->where("agent_id",$agent_id);
			 			$this->db->update('agent_location',$arr1);


			 			}


			 		}
			 	}

			 	public function agent_customers_location($login_email){
                    date_default_timezone_set('Asia/Kolkata');
                     $date = new DateTime();
                     $current_date = $date->format('Y-m-d');
                     $time_stamp = $date->format('Y-m-d H:i:s');  
                     $get_time = date("H:i:s");
                      if($get_time >= '06:00:00'  && $get_time <= '10:30:00'){
                          $shift_id = 'first';
                      }else if($get_time >= '10:31:00'  && $get_time <= '15:00:00'){
                         $shift_id = 'second';
                      }else{
                          $shift_id = 'third';
                      }
                    
                    $check_customer = $this->db->get_where('customer_location',array('shift' => $shift_id));
                    
			 		$this->db->select('*');
			         $this->db->from('team_member');
			         $this->db->where('team_member.user_id', $login_email);
			 		$this->db->join('agent_location','agent_location.agent_id = team_member.user_id');
                    $this->db->join('assigned_colony','assigned_colony.agent_id = team_member.user_id');
			         $this->db->join('customer_details','customer_details.colony_id = assigned_colony.colony_id','left');
			 		$this->db->join('customer_location','customer_location.customer_id = customer_details.customer_id','left');
                    
			 		$data = $this->db->get()->result();
			 		return $data;

			 	}

			 	public function update_location($agent_id){

			 	   $this->db->select('*');
			        $this->db->from('agent_location');
			 	   $this->db->where('agent_location.agent_id', $agent_id);
			 	   $this->db->join('team_member','team_member.user_id = agent_location.agent_id');
			 	   $data = $this->db->get();

			 	   return $data->result();

			    }
			 // customer_section

			     public function customer_data_for_location($login_email){

			         $this->db->select('*');
			         $this->db->from('customer_details');
			         $this->db->where('customer_details.customer_id', $login_email);
			 		$this->db->join('customer_location','customer_location.customer_id = customer_details.customer_id','left');
			 		$this->db->join('assigned_colony','assigned_colony.colony_id = customer_details.colony_id','left');
                    $this->db->join('agent_location','agent_location.agent_id = assigned_colony.agent_id','left'); 
                    $this->db->join('team_member','team_member.user_id = assigned_colony.agent_id','left'); 
			 		$data = $this->db->get()->result();
			 		return $data;

			     }

			     public function customer_data_for_add_marker($login_email){

			 		$this->db->select('*');
			         $this->db->from('customer_details');
			         $this->db->where('customer_details.customer_id', $login_email);
			 		$this->db->join('customer_location','customer_location.customer_id = customer_details.customer_id','left');
			 		$data = $this->db->get()->result();
			 		return $data;


			 	}

			 	public function customer_add_locations($customer_id,$customer_lat,$customer_lng,$shift){

			 		$check_customer = $this->db->get_where('customer_location',array('customer_id' => $customer_id, 'shift' => $shift));

			 		if($check_customer->num_rows() > 0 ){
			 			$arr2 = array(
			 			    "customer_lat" =>  $customer_lat,
			 				"customer_lng" =>  $customer_lng,
                            'shift' => $shift,
			 			);

			 			$this->db->where('customer_id',$customer_id);
                        $this->db->where('customer_id',$shift);
			 			if($this->db->update('customer_location',$arr2)){
			 				echo "success";
			 			}else{
			 				echo "failed";
			 			}

			 		}else{
			 			$arr = array(
			 			    "customer_id" => $customer_id,
			 			    "customer_lat" =>  $customer_lat,
			 				"customer_lng" =>  $customer_lng,
                            'shift' => $shift,
			 			);
			 		    if($this->db->insert('customer_location',$arr)){
			 		    	echo "success";
			 		    }else{
			 		    		echo "failed";
			 	        };
			 		}
			 	}
    
     public function customer_added_location($customer_id){
         
                    $this->db->select('*');
			        $this->db->from('customer_location');
			        $this->db->where('customer_location.customer_id', $customer_id);
			 		$data = $this->db->get();
			 		
                    if($data->num_rows() > 0){
                        
                        $first = '';
                        $second = '';
                        $third = '';
                         
                        foreach($data->result() as $row){
                            
                            if($row->shift == 'first'){
                                $first = 'yes';
                            }else if($row->shift == 'second'){
                                $second = 'yes';
                            }else if($row->shift == 'third'){
                                $third = 'yes';
                             }
                            
                        }
                        
                        return array(
                            'first_shift' =>  $first,
                            'second_shift' => $second,
                            'third_shift' => $third,
                        );
                    }
         
     }

// //-----//////------/////--------/////////------///////
// //======= scan orders ======//////
// //-----//////------/////--------/////////-------//////  
   public function scan_orders($customer_id,$agent_id,$current_date,$shift){
        $current_date = date('Y-m-d',strtotime($current_date));
        
        
       $check_customer = $this->db->get_where( 'genrated_order_list', array( 'customer_id' => $customer_id, 'order_date' => $current_date ));
       
        
        if($check_customer->num_rows() > 0){
            
            
            $this->db->select('*');
            $this->db->from('genrated_order_list');
            $this->db->where('genrated_order_list.customer_id',$customer_id);
            $this->db->join("current_balance","current_balance.customer_id = genrated_order_list.customer_id");
           // $this->db->where('order_status','pending');
            $this->db->where('order_date',$current_date);
            $this->db->where('genrated_order_list.shift_id',$shift);
            $check = $this->db->get();
            
            if($check->num_rows() == 1){
            
            date_default_timezone_set('Asia/Kolkata');
            $date = new DateTime();
            $time_stamp = $date->format('Y-m-d H:i:s');
           
            $my_order_status =  $check->result()[0]->order_status;   
            $genrated_order_id = $check->result()[0]->genrated_order_id;
            $current_balance = $check->result()[0]->balance_amount;
            $tifin_charge = $check->result()[0]->tiffin_cost;
            $plan_id = $check->result()[0]->plan_id;
            $available_balance = $current_balance - $tifin_charge;
            $shift_id = $check->result()[0]->shift_id;
            
            if($my_order_status == 'completed'){
                echo "alredy_scaned";
            }else if($my_order_status == 'pending'){    

               if($current_balance >= $tifin_charge){
                  
                        $arr = array(
                            "customer_id" => $customer_id,
                            "plan_id" => $plan_id,
                            "transaction_amount" => $tifin_charge,
                            "ledger" => $available_balance,
                            "shift_id" => $shift_id,
                            "transaction_date" => $time_stamp,
                        
                        );
                        
                        if($this->db->insert("transaction_detail",$arr)){
                            
                            $this->db->where("customer_id",$customer_id);
                            $this->db->set("balance_amount",$available_balance);
                            if($this->db->update("current_balance"))
                                
                                $this->db->where('genrated_order_id',$genrated_order_id);
                                $this->db->set('order_status','completed');
                               if($this->db->update('genrated_order_list')){
                                    echo "success";
                               }else{
                                   echo "failed";
                               }
                               
                               
                            }else{
                                echo "failed";
                            }
                         }else{
                            echo "insufficent_balance";
                         }
                    }else{ echo "failed"; } 
                 }else{
                     echo "wrong_shift";
                
                  }
                }else{
                   echo "invalid";
                }
   
}



}
  
