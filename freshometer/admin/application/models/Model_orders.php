<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_orders extends CI_Model {



	function __construct(){



		parent::__construct();

	}

    public function select_team(){
        
        $this->db->select('*');
        $this->db->from('team_member');
        $this->db->where('user_id !=' , '1');
        $data = $this->db->get();
        return $data->result();
        
    }
    
    public function select_plan(){
        $this->db->select('*');
        $this->db->from('plan');
        $data = $this->db->get();
        return $data->result();
        
    }
   
    public function view_order()
     {  
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

        $this->db->select('*');
        $this->db->from('genrated_order_list');
        $this->db->join("customer_details","customer_details.customer_id = genrated_order_list.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
     
        $this->db->join("subscribed_plan_details","subscribed_plan_details.customer_id = genrated_order_list.customer_id");
        $this->db->join("plan","plan.plan_id = genrated_order_list.plan_id");
       
        $this->db->where("genrated_order_list.order_date",$current_date);

        
        if($shift_id){
            $this->db->where("genrated_order_list.shift_id", $shift_id);
            
        }
        $this->db->order_by("customer_details.customer_name");
        //$this->db->or_where("shift_id",3);
        $data = $this->db->get();
        return $data->result();
        //echo json_encode($data);
    } 
    
    public function view_order_searchbar($status,$shift,$colony,$plan){
        
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $time_stamp = $date->format('Y-m-d H:i:s');  
        
        
        $this->db->select('*');
        $this->db->from('genrated_order_list');
        $this->db->join("customer_details","customer_details.customer_id = genrated_order_list.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
        
        $this->db->join("subscribed_plan_details","subscribed_plan_details.customer_id = genrated_order_list.customer_id");
        $this->db->join("plan","plan.plan_id = genrated_order_list.plan_id");
        $this->db->where("genrated_order_list.order_date",$current_date);
      
        if($plan != ''){
            $this->db->where("genrated_order_list.plan_id",$plan);
            
        }
        
        
        if($shift != ''){
            $this->db->where("genrated_order_list.shift_id",$shift);
            
        }
		
		if($status != ''){
            $this->db->where("genrated_order_list.order_status",$status);
            
        }
        
        if($colony != '' ){
            
            $this->db->where("customer_details.colony_id", $colony);
        }
        
        $this->db->order_by("customer_details.customer_name");
       
        
        //$this->db->or_where("shift_id",3);
        $data = $this->db->get();
        return $data->result();
        
        
    }
    
     public function view_delivered_order_searchbar($status,$shift,$colony){
        
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
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
        $this->db->join("delivery_shift","delivery_shift.shift_id = tifin_order_details.shift_id");
        
        $this->db->where("tifin_order_details.start_date <=",$current_date);
        
       
        $this->db->where_in("tifin_order_details.shift_id",[$shift,3]);
        
        if($shift == 1){
            
            
                $this->db->where("tifin_order_details.morning_order_status", $status);
             
            
        }else if($shift == 2){
            
                $this->db->where("tifin_order_details.evening_order_status", $status);
          
        }
        
        if($colony != '' ){
            
            $this->db->where("customer_details.colony_id", $colony);
        }
        
        
       
        
        //$this->db->or_where("shift_id",3);
        $data = $this->db->get()->result();
        return $data;
        
        
    }
    
    public function view_selected_order($customer_id){
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->join("tifin_order_details","tifin_order_details.customer_id = customer_details.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
        $this->db->join("delivery_shift","delivery_shift.shift_id = tifin_order_details.shift_id");
        
        $this->db->where("customer_details.customer_id", $customer_id);
        
        //$this->db->or_where("shift_id",3);
        $data = $this->db->get()->result();
        return $data;
        //echo json_encode($data);
        
        
    }

  
    
    public function assign_card_submit($card_no,$customer_id,$order_shift){
        
        //echo $card_no;
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
        
        
        if($order_shift == 1){
            $check_customer_order_status = $this->db->get_where('tifin_order_details',array( 'customer_id' => $customer_id , 'morning_order_status' => ''));
           
            $tifin_id_status = 'morning';
            
        }else if($order_shift == 2){
            $check_customer_order_status = $this->db->get_where('tifin_order_details',array( 'customer_id' => $customer_id , 'evening_order_status' => ''));
            $tifin_id_status = 'evening';
        }
        
        if($check_customer_order_status->num_rows() == 1){
        
        $check = $this->db->get_where('tifin_id', array( 'tifin_card_no' => $card_no));
        
        if($check->num_rows() == 1){
            
             $tifin_status = $check->result()[0]->tifin_status;
             
            
            if($tifin_status == 'broken' || $tifin_status == 'lost'){
                
                echo 'broken';
                
            }else if($tifin_status == 'morning' || $tifin_status == 'evening'){
                 
                echo 'assigned';
                
            }else{

                    $arr = array(
                     'customer_id' => $customer_id,
                     'tifin_status' => $tifin_id_status,
                     'tifin_assign_time' => $time_stamp,
                     
                     );
                     
                     $this->db->where('tifin_card_no',$card_no);
                     if($this->db->update('tifin_id',$arr)){
                         
                         $this->db->where('customer_id',$customer_id);
                         
                         if($order_shift == 1){
                              $this->db->set('morning_order_status','assigned');
                         }else if($order_shift == 2){
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
            
             echo "order_assigned";
        }
        
        }else{
            echo "low_ballance";
        }
        }
    }
  
    public function select_colony(){
        
        $this->db->select('*');
        $this->db->from('colony_detail');
        $data = $this->db->get();
        return $data->result();
        
        
    }
    
    public function delete_assigned_order($customer_id,$shift){
        
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
    
    
    // incomplete orders
    
    public function incomplete_orders(){
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $time_stamp = $date->format('Y-m-d H:i:s');  
        
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->join("tifin_id","tifin_id.customer_id = customer_details.customer_id");
        $this->db->join("tifin_order_details","tifin_order_details.customer_id = customer_details.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->join("colony_detail","colony_detail.colony_id = customer_details.colony_id");
        $this->db->join("delivery_shift","delivery_shift.shift_id = tifin_order_details.shift_id");
        
        $this->db->where("date(tifin_assign_time) <",$current_date);
         $data = $this->db->get();
         return $data->result();
    }
    
    public function reset_incomplete_orders($customer_id,$tifin_id,$shift_id){
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $time_stamp = $date->format('Y-m-d H:i:s'); 
        
       
        
        $this->db->select('*');
        $this->db->from('tifin_order_details');
        $this->db->where('tifin_order_details.customer_id',$customer_id);
        $this->db->join("tifin_id","tifin_id.customer_id = tifin_order_details.customer_id");
         if($shift_id == '1'){
            $this->db->where('tifin_status','morning');
        }else if($shift_id == '2'){
            $this->db->where('tifin_status','evening');
        }
        $check_order_details = $this->db->get();
        
        
        if($check_order_details->num_rows() == 1){
             $fine = 0;
             $tifin_cost = $check_order_details->result()[0]->tifin_cost;
             $penalty = $tifin_cost+$fine;
            
             $roti = $check_order_details->result()[0]->roti.' roti';
             $tifin_assign_time = $check_order_details->result()[0]->tifin_assign_time;
            
            
             $get_current_balance = $this->db->get_where('current_balance',array('customer_id' => $customer_id));
            
             if($get_current_balance->num_rows() == 1){
                 
                  $balance_amount = $get_current_balance->result()[0]->balance_amount;
                  $current_balance = $balance_amount - $penalty;
                  
                  $this->db->where('customer_id',$customer_id);
                  $this->db->set('balance_amount',$current_balance);
                  if($this->db->update('current_balance')){
                        
                      $arr1 = array(
                         
                          'customer_id' => $customer_id,
                          'tifin_no' => $tifin_id,
                          'order_detail' => $roti,
                          'transaction_amount' => $penalty,
                          'penalty' => $fine,
                          'ledger' => $current_balance,
                          'shift_id' => $shift_id,
                          'transaction_date' => $tifin_assign_time,
                
                      );
                      
                      if($this->db->insert('transaction_detail',$arr1)){
                         
                          $arr2 = array(
                          
                            'customer_id' => null,
                            'tifin_status' => '',
                            
                          );
                          $this->db->where('tifin_card_no',$tifin_id);
                          if($this->db->update('tifin_id',$arr2)){
                              
                              $this->db->where('customer_id',$customer_id);
                              
                              if($shift_id == '1'){
                                  $this->db->set('morning_order_status','');
                              }else if($shift_id == '2'){
                                  $this->db->set('evening_order_status','');
                              }
                              
                              if($this->db->update('tifin_order_details')){
                                  
                                  echo "success";
                              }else{ echo "failed"; }
                          }else{ echo "failed"; }
                          
                      }else{ echo "failed"; }
                   }else{ echo "failed"; }
             }else{ echo "failed"; }
        }else{ echo "failed"; }
    }
}