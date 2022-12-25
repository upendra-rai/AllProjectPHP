<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_customer_details extends CI_Model {

	function __construct(){

		parent::__construct();

	}

     public function customer_details(){
        $this->db->select('*');
        $this->db->from('customer');
         $this->db->join('customer_area','customer_area.customer_area_id=customer.customer_area_id','left');
        $data = $this->db->get();
        return $data->result();
        
    }
    public function select_area(){
         $this->db->select('*');
        $this->db->from('customer_area');
        $data = $this->db->get();
        return $data->result();
    }
    public function select_plan(){
        $this->db->select('*');
        $this->db->from('plan');
        $data = $this->db->get();
        return $data->result();
        
    }
    
    public function add_customer($customer_name,$customer_contact,$customer_address,$customer_area,$customer_plan,$reference,$customer_password,$customer_gender){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
        
        'customer_name' =>$customer_name,
        'customer_contact' =>$customer_contact,
        'customer_address' =>$customer_address,
        'customer_area_id' =>$customer_area,
        'plan_id' =>$customer_plan,
        'reference' =>$reference,
        'customer_password' =>$customer_password,
        'customer_gender' =>$customer_gender,
     );
    //echo $customer_name.$customer_email.$customer_address.$customer_mobile.$customer_alter_mobile.$customer_company_name.$customer_gst_no.$customer_address.$customer_state;
      if($this->db->insert('customer',$data)){
        echo 'success';
          redirect(base_url().'/customer_details/details');
          
       }else{
          echo 'failed';

       };
  }
    
    public function selected_customer($edit_id){
        $this->db->select('*');
		$this->db->from('customer');
        $this->db->where('customer_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_customer($edit_id,$customer_name,$customer_email,$customer_alter_email,$customer_mobile,$customer_alter_mobile,$customer_company_name,$customer_gst_no,$customer_address,$customer_pincode,$customer_state){
         $this->db->where('customer_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'customer_name' =>$customer_name,
        'customer_email' =>$customer_email,
        'customer_alter_email' =>$customer_alter_email,
        'customer_mobile' =>$customer_mobile,
        'customer_alter_mobile' =>$customer_alter_mobile,
        'customer_company_name' =>$customer_company_name,
        'customer_gst_no' =>$customer_gst_no,
        'customer_address' =>$customer_address,
        'customer_pincode' =>$customer_pincode,
        'customer_state' =>$customer_state,
        'customer_updated_at'=>$time_stamp,

     );
   
      if($this->db->update('customer',$data)){
        echo 'success';
          redirect(base_url().'/master/customer_details');
       }else{
          echo 'failed';
       };
    }
    
    public function delete_customer($del_id){
        $this->db->where('customer_id',$del_id);
    if($this->db->delete('customer')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    

	public function add_customer_submit($firstname,$mobileno,$mobileno2,$address1,$address2,$colony,$gender,$dob,$weight,$height,$allergy,$reffrence){
           $check_mobile = $this->db->get_where('customer_details', array("mobile_no" => $mobile_no));
		
		if($check_mobile->num_rows() > 0 ){
			echo "mobile_invalid";
		}else{
		
        $check_user_id = $this->db->get_where('customer_login_details', array("user_id" => $mobile_no));  
            
        if($check_user_id->num_rows() > 0 ){
			echo "mobile_invalid";
		}else{ 
      
			date_default_timezone_set('Asia/Kolkata');
            $date = new DateTime();
            $mydate = $date->format('Y-m-d');
            $time_stamp = $date->format('Y-m-d H:i:s');
			
			$arr = array(
		    
		    'customer_name' => $firstname,
            'customer_image' =>'user.png',
			'mobile_no' => $mobile_no,
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
            'reference' => $refrence,
            'customer_status' => 'active',
            'ragistration_date' => $time_stamp,
		    
		    );
		
		    
		    if($this->db->insert('customer_details',$arr)){
		    	$customer_id = $this->db->insert_id();
                
                        $arr4 = array(
                            'customer_id' => $customer_id,
                            'balance_amount' => 0,
                        );
                        if($this->db->insert('current_balance', $arr4)){
                            redirect('./customer/view_customer/'.$customer_id.'/001');
                            
                        }else{
                            return "failed";
                        }
                  
		    }else{
			    return "failed";
		    };
        }
        }
	}
	
     
     public function select_colony(){
        
                $this->db->select('*');
		    	$this->db->from('colony_detail');
                 $this->db->order_by('colony_name','ASC');
		    	$data = $this->db->get();
                return $data->result();
        
     }
     public function select_recharge_limit(){
        
        $this->db->select('*');
        $this->db->from('recharge_limit');
        $data = $this->db->get();
        return $data->result();
        
    }
    public function customer_view($customer_id){
        $this->db->select('*');
        $this->db->from('customer');
         $this->db->where('customer_id',$customer_id);
        $data = $this->db->get();
        return $data->result();
    }
	public function edit_customer_submit($firstname,$mobileno,$mobileno2,$email,$address1,$colony,$dob,$gender,$customer_id){
        
		$check = $this->db->get_where('customer_details',array('customer_id' => $customer_id));
		
		if($check->num_rows() == 1){
			
			$arr = array(

		     'customer_name' => $firstname,
            'mobile_no' => $mobileno,
            'mobile_no2' => $mobileno2,    
            'email_address' => $email,    
			'dob' => $dob,
			'gender' => $gender,
			'address' => $address1,
            'colony_id' =>  $colony,
			'pincode' => 0,
            
		
		    );
		
		    $this->db->where('customer_id',$customer_id);
		    if($this->db->update('customer_details',$arr)){
		    	
		    	  redirect('./customer/view_customer/'.$customer_id.'/002');
                
		    }else{
			
			return "failed";
		    };
			
			
		}else{
			
			return "invalid";
		}
		
       

	}
	
	public function fetch_customer(){
		
		
		$this->db->select('*');
		$this->db->from('customers');
        
		$this->db->where('ac_assign','yes');
		$data = $this->db->get();
		return $data->result();
		
		
	}
	
	
	public function view_customer($linked_no){
		
		$this->db->select('*');
		$this->db->from('customer_details');
        $this->db->join('current_balance','current_balance.customer_id = customer_details.customer_id');
        $this->db->join('customer_login_details','customer_login_details.customer_id = customer_details.customer_id','left');
        $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
        $this->db->join('subscribed_plan_details', 'subscribed_plan_details.customer_id = customer_details.customer_id','left');
        $this->db->join('plan', 'plan.plan_id = subscribed_plan_details.plan_id','left');
        $this->db->where('customer_details.customer_id',$linked_no);
		$data = $this->db->get();
		return $data->result();
		
		
	}
     
    public function assign_card($customer_id,$old_card,$new_card,$card_status){
        
       $check   = $this->db->get_where('atm_card_detail', array('atm_card_no' => $new_card));    
      if($check->num_rows() == 1){
          $check_aval = $this->db->get_where('atm_card_detail', array('atm_card_no' => $new_card, 'customer_id' => null, 'card_status' => ''));
          if($check_aval->num_rows() == 1){
          
            date_default_timezone_set('Asia/Kolkata');
            $date = new DateTime();
            $time_stamp = $date->format('Y-m-d H:i:s');
            $last_transaction_date = $this->db->get_where('atm_card_detail', array('atm_card_no' => $old_card, 'customer_id' => $customer_id));
          
           $arr = array(
            
               'customer_id' => $customer_id,
               'card_status' => 'active',
               'card_assign_time' => $time_stamp,
               'last_transaction_date' => $last_transaction_date->result()[0]->last_transaction_date,
               'last_recharge_date' => $last_transaction_date->result()[0]->last_recharge_date,
           );
          
          $this->db->where('atm_card_no',$new_card);
          if($this->db->update('atm_card_detail',$arr)){
              
              $arr2 = array(
                  'customer_id' => null,
                  'card_status' => $card_status,
                  'card_assign_time' => '',
                  'last_transaction_date' => '',
                  'last_recharge_date' => '',
              
              );
              $this->db->where('atm_card_no',$old_card);
              if($this->db->update('atm_card_detail',$arr2)){
                                  $this->db->select('*');
                                  $this->db->from('customer_details');
                                  $this->db->where('customer_details.customer_id',$customer_id);
                                  $get_name = $this->db->get();
                                  
                                  if($get_name->num_rows() == 1){
                                      $cus_first_name = $get_name->result()[0]->first_name;
                                      if(strlen($cus_first_name) > 15){
                                         $cus_name = substr($cus_first_name,0, 15);
                                       }else{
                                         $cus_name = $cus_first_name;
                                       }  
                                      
                                      $mobile_no = $get_name->result()[0]->contact_1;
                                      
                                      if(isset($cus_name,$new_card,$mobile_no)){
                                         $username = "sharmadairy@gmail.com";
	                                     $hash = "5ab31680b52065c0860857c56560fd89a0970b553b8c50e31036cd8e093c1d54";
	                                     $test = "0";
	                                     $sender = "SDAIRY"; // This is who the message appears to be from.
	                                     $numbers = '91'.$mobile_no; // A single number or a comma-seperated list of numbers
	                                     $message = rawurlencode('Dear '.$cus_name.',%nWe are sad that your card is Lost/Broken.%nPlease pay Rs 50 as caution money for new card no '.$new_card.'%nRegards,%nTeam Sharma Dairy');
	                                     $message = urlencode($message);
	                                     $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	                                     $ch = curl_init('http://api.textlocal.in/send/?');
	                                     curl_setopt($ch, CURLOPT_POST, true);
	                                     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	                                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	                                     $result = curl_exec($ch); // This is the result from the API
	                                     curl_close($ch);
                                         //$check =  json_decode($result); 
                                        // print_r($result); 
                                      }
                                      }
                  return "success";
              }else{
                  
                  return "failed";
              }
              
              
          }else{
                  
                  return "failed";
              }
          }else{
             $this->db->select('*');
             $this->db->from('atm_card_detail');
             $this->db->where('atm_card_no',$new_card);
             $this->db->where_in('card_status',array('active','blocked'));
             //$this->db->where_in('card_status','blocked');
              
            $check_status = $this->db->get();
            if($check_status->num_rows() == 1){
               return 'assigned';
              
            }else{
                return 'lost';
                
            }
          
          }
      }else{
          
          return "invalid";
      } 
      
        
    }
	public function edit_customer1($linked_no){
		
		$this->db->select('*');
		$this->db->from('customer_details');
		$this->db->where('customer_details.customer_id',$linked_no);
        $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
        $data = $this->db->get();
		return $data->result();
		
		
	} 
    
    
    public function recharge_account($recharge_value,$link_id,$r_mobile){
        
        $check = $this->db->get_where('current_balance',array('customer_id' => $link_id));
        
        if($check->num_rows() == 1){
			$ac_ballance = $check->result()[0]->balance_amount;
			$total_ballance = ($ac_ballance+$recharge_value);
            $arr = array(
		        'balance_amount' => $total_ballance,
		        );
		    $this->db->where('customer_id',$link_id);
            if($this->db->update('current_balance',$arr)){
                    date_default_timezone_set('Asia/Kolkata');
                    $date = new DateTime();
					$re_date = $date->format('Y-m-d');
                    $time_stamp = $date->format('Y-m-d H:i:s');
                $arr2 = array(
                    'customer_id' => $link_id,
                    'recharge_amount' => $recharge_value,
                    'user_id' =>  '1',
                    'recharge_date' => $time_stamp,
                    
                );
                if($this->db->insert('recharge_detail',$arr2)){
						
                            
                            if(isset($r_mobile,$total_ballance)){
                             $this->db->select('*');
                             $this->db->from('customer_details');
                             $this->db->where('customer_details.customer_id',$link_id);
                             $customer_name_get = $this->db->get();   
                            if($customer_name_get->num_rows() == 1){
                                $customer_name = $customer_name_get->result()[0]->customer_name;
                                if(strlen($customer_name) > 15){
                                    $cus_name = substr($customer_name,0, 15);
                                }else{
                                    $cus_name = $customer_name;
                                }
                                $atm_card = '';
                               }else{
                                  $cus_name = 'customer';
                                  $atm_card = 'card_no';
                               }    
                              
                               $username = "";
	                           $hash = "";
	                           $test = "0";
	                           $sender = ""; // This is who the message appears to be from.
	                           $numbers = '91'.$r_mobile; // A single number or a comma-seperated list of numbers
	                           $message = rawurlencode ('Dear '.$cus_name.' ,%nYour card number '.$atm_card.' has been successfully recharged with Rs. '.number_format($recharge_value).' Available Balance is Rs. '.number_format($total_ballance).' %nThank You,%nTeam Sharma Dairy');
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
                               echo 'success';    
                            
                            }
                      
				}else{
                    echo "fail";
                };
               
            }else{
                echo "fail";
            }
            
        }
 
    }
	
    
    public function block_accout($link_id){
        $arr = array(
		        'card_status' => 'blocked',
		        );
        
        $this->db->where('customer_id',$link_id);
        
        if($this->db->update('atm_card_detail',$arr)){
                
                echo "success";
            }else{
                echo "fail";
            }
        
    }
    
    public function unblock_accout($link_id){
                    date_default_timezone_set('Asia/Kolkata');
                    $date = new DateTime();
					$current_date = $date->format('Y-m-d');
                    $time_stamp = $date->format('Y-m-d H:i:s');
                   
        $arr = array(
		        'card_status' => 'active',
                'last_transaction_date' => $time_stamp,
		        );
        
        $this->db->where('customer_id',$link_id);
        
        if($this->db->update('atm_card_detail',$arr)){
                
                echo "success";
            }else{
                echo "fail";
            }
        
    }
    public function delete_customer1($link_id){
		
		$arr = array(
            'customer_id' => null,
            'card_status' => '',
            'card_assign_time' => '',
            'last_transaction_date' => '',
            'last_recharge_date' => '',
		    );
		
		    $this->db->where('customer_id',$link_id);
		    if($this->db->update('atm_card_detail',$arr)){
                $this->db->where('customer_id',$link_id);
                $check = $this->db->get('current_balance');
                if($check->num_rows() == 1){
                    date_default_timezone_set('Asia/Kolkata');
                    $date = new DateTime();
					$current_date = $date->format('Y-m-d');
                    
                     $arr2 = array(
                           'customer_id' => $link_id,
                           'amount_returned' => $check->result()[0]->balance_amount,
                           'terminate_date' => $current_date,
                      
                     );
                    if($this->db->insert('terminated_customer',$arr2)){
                          $arr3 = array(
                              'customer_status' => 'terminated',
                          );
                          $this->db->where('customer_id',$link_id);
                          if($this->db->update('customer_details',$arr3)){
                              $this->db->where('customer_id',$link_id);
                              if($this->db->delete('current_balance')){
                             
                                  $this->db->select('*');
                                  $this->db->from('customer_details');
                                  $this->db->where('customer_details.customer_id',$link_id);
                                  $this->db->join('terminated_customer','terminated_customer.customer_id = customer_details.customer_id');
                                  $get_name = $this->db->get();
                                  
                                  if($get_name->num_rows() == 1){
                                      $cus_first_name = $get_name->result()[0]->first_name;
                                      if(strlen($cus_first_name) > 15){
                                         $cus_name = substr($cus_first_name,0, 15);
                                      }else{
                                         $cus_name = $cus_first_name;
                                      }
                                      
                                      $return_amount = $get_name->result()[0]->amount_returned;
                                      $mobile_no = $get_name->result()[0]->contact_1;
                                      
                                      if(isset($cus_name,$return_amount,$mobile_no)){
                                         $username = "sharmadairy@gmail.com";
	                                     $hash = "5ab31680b52065c0860857c56560fd89a0970b553b8c50e31036cd8e093c1d54";
	                                     $test = "0";
	                                     $sender = "SDAIRY"; // This is who the message appears to be from.
	                                     $numbers = '91'.$mobile_no; // A single number or a comma-seperated list of numbers
	                                     $message = rawurlencode('Dear '.$cus_name.',%nIt is sad that you are leaving us. Please submit your card and collect the balance amount of Rs '.number_format($return_amount).'%nBest wishes,%nTeam Sharma Dairy');
	                                     $message = urlencode($message);
	                                     $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
	                                     $ch = curl_init('http://api.textlocal.in/send/?');
	                                     curl_setopt($ch, CURLOPT_POST, true);
	                                     curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	                                     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	                                     $result = curl_exec($ch); // This is the result from the API
	                                     curl_close($ch);
                                         //$check =  json_decode($result); 
                                        // print_r($result); 
                                      }
                                         
                                  }
                                  echo "success";
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
                    
                    echo "failed";
                }
   	
	     }else{
                    
                    echo "failed";
                }

    }
    
 
    
    public function customer_tran_report($id){
                $this->db->select('*');
		    	$this->db->from('transaction_detail');
                $this->db->join('team_member', 'team_member.user_id = transaction_detail.user_id');
                $this->db->join('dairy_products', 'dairy_products.product_id = transaction_detail.product_id');
                $this->db->where('customer_id',$id);
                $this->db->where('MONTH(transaction_date)',date('m'));
                $this->db->where('YEAR(transaction_date)',date('Y'));
		        $this->db->order_by('transaction_date','DESC');
		        $this->db->order_by('transaction_id','DESC');
        
		    	$data = $this->db->get();
               
              if($data->num_rows() > 0){
		         $i=1; foreach($data->result() as $row){
                      
                       echo '<tr>';
                       echo '<td>'.$i++.'</td>';
                       echo '<td>'.date('d-M-Y', strtotime($row->transaction_date)).'</td>';
                       echo '<td>'.$row->transaction_amount.'</td>';
                       echo '<td>'.$row->product_name.'</td>';
                       echo '<td>'.$row->name.'</td>';
                       echo '<td><a href="'.base_url().'/customer/delete_transaction/'.$row->transaction_id.'/'.$row->customer_id.'"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed myedit" style="background-color:#e91e63;"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></a></td>';
                       echo '</tr>';
                             
                      
                  }
                  
              }else{
                  
                       echo '<tr>';
                       echo '<td>No Record Found</td>';
                       
                       echo '</tr>';
              }
              
        
    }
    
    public function delete_transaction($transaction_id,$customer_id){
        $check = $this->db->get_where('transaction_detail', array('transaction_id' => $transaction_id));
        
        if($check->num_rows() == 1){
            echo "gg";
            $amount = $check->result()[0]->transaction_amount;
            
            $this->db->where('transaction_id',$transaction_id);
            if($this->db->delete('transaction_detail')){
               
                $this->db->set('balance_amount', 'balance_amount + '.$amount,FALSE);
                $this->db->where('customer_id',$customer_id);
                if($this->db->update('current_balance')){
                    
                    redirect('./customer/view_customer/'.$customer_id.'/transaction');
                }
            
            }
        }else{
            echo "something wrong";
        }
        
    }
     public function delete_recharge($transaction_id,$customer_id){
        $check = $this->db->get_where('recharge_detail', array('recharge_id' => $transaction_id));
        
        if($check->num_rows() == 1){
            
            $amount = $check->result()[0]->recharge_amount;
            
            $this->db->where('recharge_id',$transaction_id);
            if($this->db->delete('recharge_detail')){
               
                $this->db->set('balance_amount', 'balance_amount - '.$amount,FALSE);
                $this->db->where('customer_id',$customer_id);
                if($this->db->update('current_balance')){
                    
                    redirect('./customer/view_customer/'.$customer_id.'/recharge');
                }
            
            }
        }else{
            echo "something wrong";
        }
        
    }
    
    public function customer_rech_report($id){
                 $this->db->select('*');
		    	$this->db->from('recharge_detail');
                $this->db->join('team_member', 'team_member.user_id = recharge_detail.user_id');
                $this->db->where('customer_id',$id);
                $this->db->where('MONTH(recharge_date)',date('m'));
                $this->db->where('YEAR(recharge_date)',date('Y'));
		        $this->db->order_by('recharge_date','DESC');
		        $this->db->order_by('recharge_id','DESC');
		    	$data = $this->db->get();
               
              if($data->num_rows() > 0){
		         $i=1; foreach($data->result() as $row){
                      
                       echo '<tr>';
                       echo '<td>'.$i++.'</td>';
                       echo '<td>'.date('d-M-Y', strtotime($row->recharge_date)).'</td>';
                       echo '<td>'.$row->recharge_amount.'</td>';
                       echo '<td>'.$row->name.'</td>';
                       echo '<td><a href="<?php echo base_url(); ?>/customer/delete_recharge/'.$row->recharge_id.'/'.$row->customer_id.'"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed myedit" style="background-color:#e91e63;"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></a></td>';
                       echo '</tr>';
                             
                      
                  }
                  
              }else{
                  
                       echo '<tr>';
                       echo '<td>No Record Found</td>';
                       
                       echo '</tr>';
              }
        
    }
    
    public function customer_rech_report2($id){
                $this->db->select('*');
		    	$this->db->from('recharge_detail');
                $this->db->join('team_member', 'team_member.user_id = recharge_detail.user_id','left');
                $this->db->join('plan', 'plan.plan_id = recharge_detail.plan_id','left');
                $this->db->join('orders', 'orders.order_id = recharge_detail.order_id','left');
        
                $this->db->where('recharge_detail.customer_id',$id);
		        $this->db->order_by('recharge_date','DESC');
		        $this->db->order_by('recharge_id','DESC');
                $this->db->limit(10);
		    	$data = $this->db->get();
                return $data->result();
            
        
    }
    
    public function customer_tran_report2($id){
                $this->db->select('*');
		    	$this->db->from('transaction_detail');
                
                $this->db->where('customer_id',$id);
		        $this->db->order_by('transaction_date','DESC');
		        $this->db->order_by('transaction_id','DESC');
                $this->db->limit(10);
		    	$data = $this->db->get();
                return $data->result();
            
        
    }
    
    
    public function add_subscription($plan_id,$order_start_date,$order_end_date,$customer_id,$shift,$plan_cost){
        
       date_default_timezone_set('Asia/Kolkata');
       $date = new DateTime();
       $today_date = $date->format('Y-m-d');
	   $time_stamp = $date->format('Y-m-d H:i:s');
        
       $order_start_date = date('Y-m-d',strtotime($order_start_date)); 
       $order_end_date = date('Y-m-d',strtotime($order_end_date));     
      
    //   $check_my_subs = $this->db->get_where('subscribed_plan_details',array('customer_id' => $customer_id, 'start_date <=' => $today_date, 'end_date >=' => $today_date ));    
        
    /*  if($check_my_subs->num_rows() > 0){
          
          redirect('customer/view_customer/'.$customer_id.'?msg=already_suscribed');
          
      }else{    */
        
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
				 "payment_id" => '',
                 "order_id" => $order_id,
			
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
                           redirect('customer/view_customer/'.$customer_id.'?msg=subscription_success');
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
                          redirect('customer/view_customer/'.$customer_id.'?msg=subscription_success');
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
                echo 'fail';   
             }
			
		    }else{
				
				echo "fail1";
			}
	   }else{
		   
		   echo "fail2";
		   
	   };
        
   // }
    }
	
// //-----//////------/////--------/////////------///////
// //======= Renew Plan Section ======//////
// //-----//////------/////--------/////////-------//////

    public function renew_plan($customer_id){
        
		$payment_id = '';
		
       date_default_timezone_set('Asia/Kolkata');
       $date = new DateTime();
       $today_date = $date->format('Y-m-d');
	   $time_stamp = $date->format('Y-m-d H:i:s');
      
	  $this->db->join('plan','plan.plan_id = subscribed_plan_details.plan_id');
      $check_my_subs = $this->db->get_where('subscribed_plan_details',array('customer_id' => $customer_id, ));
       
      if($check_my_subs->num_rows() > 0){
       
       $plan_id = $check_my_subs->result()[0]->plan_id;
	   $shift = $check_my_subs->result()[0]->shift;
	   $last_end_date = $check_my_subs->result()[0]->end_date;
	   $duraction = $check_my_subs->result()[0]->duraction;
	   $plan_cost = $check_my_subs->result()[0]->cost;
	   
	   
	   $order_start_date = date('Y-m-d', strtotime($last_end_date .' +1 day'));
       $order_end_date = date('Y-m-d', strtotime($last_end_date .'+'.$duraction.' day'));
       
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
	
}