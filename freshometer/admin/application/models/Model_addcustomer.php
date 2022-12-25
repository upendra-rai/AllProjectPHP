<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_addcustomer extends CI_Model {

	function __construct(){

		parent::__construct();

	}


	public function add_customer_submit($firstname,$mobileno,$mobileno2,$address1,$address2,$colony,$gender,$dob,$weight,$height,$allergy,$reffrence,$password){
      
			date_default_timezone_set('Asia/Kolkata');
            $date = new DateTime();
            $mydate = $date->format('Y-m-d');
            $time_stamp = $date->format('Y-m-d H:i:s');
			
            $check = $this->db->get_where('customer_details',array( 'mobile_no' => $mobileno,));
          
            if($check->num_rows() > 0){
                
                 return "invalid_mobile";
                
            }else{
			$arr = array(
		    
		    'customer_name' => $firstname,
            'customer_image' =>'user.png',
			'mobile_no' => $mobileno,
            'mobile_no2' => null,
            'email_address' => '',
            'dob' => $dob,
            'gender' => $gender,
			'address_one' => $address1,
            'address_two' => $address2,
            'pincode' => 0,
            'colony_id' => $colony,
            'weight' => $weight,
            'height' => $height,
            'allergy' => $allergy,
            'reference' => $reffrence,
            'customer_status' => 'active',
            'ragistration_date' => $time_stamp,
		    
		    
		    );
		
		    
		    if($this->db->insert('customer_details',$arr)){
                $customer_id = $this->db->insert_id();
                $arr2 = array(
                     'customer_id' =>$customer_id,
                     'user_id' => '',
                     'password' => $password,
                );
                if($this->db->insert('customer_login_details',$arr2)){
                      
                    $arr3 = array(
                    
                           'customer_id' => $customer_id,
                           'balance_amount' => 0,
                    );
                    
                    if($this->db->insert('current_balance',$arr3)){
                        
                                    //***************************//
                                    // ******** send sms *******//
									//**************************//
					
									$url = base_url()."send_msg.php?mobile_no=".$mobileno."&name=".urlencode($firstname)."&template=welcome"; 
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
     
				       redirect('./customer/view_customer/'.$customer_id.'/001');
								
                    
                    }else{
                         return "failed";
                    }
                    
                }else{
			    return "failed";
                }
		    	
                
		    }else{
			    return "failed";
		    };
                
            }
		
	}
	
     
     public function select_colony(){
        
                $this->db->select('*');
		    	$this->db->from('colony_detail');
                 $this->db->order_by('colony_name','ASC');
		    	$data = $this->db->get();
                return $data->result();
        
     }
    
}