<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_dashboard extends CI_Model {
    
	function __construct(){
       date_default_timezone_set("Asia/Calcutta");
		parent::__construct();
	}

 
  //  Transaction Sale Calculation
    
  public function select_today_sell(){
            $this->db->select('* , SUM(transaction_amount) AS total');
			$this->db->from('transaction_detail');
            $this->db->where('date(transaction_date)',date('Y-m-d'));
			$data = $this->db->get()->result();
            return $data;
  } 

  public function select_yesterday_sell(){
            $yes = date('Y-m-d',strtotime("-1 days"));
            $this->db->select('* , SUM(transaction_amount) AS total');
			$this->db->from('transaction_detail');
            $this->db->where('date(transaction_date)',$yes);
			$data = $this->db->get()->result();
            return $data;
  } 
  
  public function select_month_sell(){
            $this->db->select('* , SUM(transaction_amount) AS total');
			$this->db->from('transaction_detail');
			$this->db->where('MONTH(transaction_date)',date('m'));
            $this->db->where('YEAR(transaction_date)',date('Y'));
			$data = $this->db->get()->result();
            
            return $data;
  } 

  public function select_lastmonth_sell(){
            $yes = date('m',strtotime("-1 month"));
            $this->db->select('SUM(transaction_amount) AS total');
			$this->db->from('transaction_detail');
            $this->db->where('MONTH(transaction_date)',$yes);
            $this->db->where('YEAR(transaction_date)',date('Y'));
			$data = $this->db->get()->result();
            
            return $data;
  }  
    
  public function select_year_sell(){
           
            $this->db->select('* , SUM(transaction_amount) AS total');
			$this->db->from('transaction_detail');
            $this->db->where('YEAR(transaction_date)',date('Y'));
			$data = $this->db->get()->result();
            return $data;
  }   
    
 
    

   public function select_today_recharge(){
            $this->db->select('* , SUM(recharge_amount) AS total');
			$this->db->from('recharge_detail');
            $this->db->where('date(recharge_date)',date('Y-m-d'));
			$data = $this->db->get()->result();
            return $data;
  } 

  public function select_yesterday_recharge(){
            $yes = date('Y-m-d',strtotime("-1 days"));
            $this->db->select('* , SUM(recharge_amount) AS total');
			$this->db->from('recharge_detail');
            $this->db->where('date(recharge_date)',$yes);
			$data = $this->db->get()->result();
            return $data;
  } 
  
  public function select_month_recharge(){
            $this->db->select('* , SUM(recharge_amount) AS total');
			$this->db->from('recharge_detail');
			$this->db->where('MONTH(recharge_date)',date('m'));
            $this->db->where('YEAR(recharge_date)',date('Y'));
			$data = $this->db->get()->result();
            
            return $data;
  } 

  public function select_lastmonth_recharge(){
            $yes = date('m',strtotime("-1 month"));
            $this->db->select('* , SUM(recharge_amount) AS total');
			$this->db->from('recharge_detail');
            $this->db->where('MONTH(recharge_date)',$yes);
            $this->db->where('YEAR(recharge_date)',date('Y'));
			$data = $this->db->get()->result();
            
            return $data;
  }  
    
  public function select_year_recharge(){
           
            $this->db->select('* , SUM(recharge_amount) AS total');
			$this->db->from('recharge_detail');
            $this->db->where('YEAR(recharge_date)',date('Y'));
			$data = $this->db->get()->result();
            return $data;
  }
        
 // customer current status
    
 public function total_customer(){
      $this->db->select('customer_details.customer_id');
      $this->db->from('customer_details');
      $data = $this->db->get()->result();
      $count =  count($data); 
      return $count;
  
  }
    
   public function total_active_customer(){
      $this->db->select('customer_details.customer_id');
      $this->db->from('customer_details');
      $this->db->where('customer_status','active');   
      $data = $this->db->get()->result();
      $count =  count($data); 
      return $count; 
  
  }    
    
   public function total_blocked_customer(){
      $this->db->select('customer_details.customer_id');
      $this->db->from('customer_details');
      $this->db->where('customer_status','blocked');     
      $data = $this->db->get()->result();
      $count =  count($data); 
      return $count;
  
  }   
    
   public function total_terminate(){
      $this->db->select('*');
      $this->db->from('customer_details');
      $this->db->where('customer_status','terminated'); 
      $data = $this->db->get()->result();
      $count =  count($data); 
      return $count;
  
  }     
 
  public function total_blocked_customer_detail(){
      $this->db->select('*');
      $this->db->from('customer_details');
      $this->db->where('customer_status','blocked');   
      $data = $this->db->get()->result();
      //$count =  count($data); 
      return $data;
  
  }  
    
  
    
  public function terminate_customer_select(){
      $this->db->select('*');
      $this->db->from('customer_details');
      $this->db->where('customer_status','terminated'); 
      $data = $this->db->get()->result();
      return $data;
  
  }       
    
  
 // barchart transaction    
    
 public function select_barchart_transaction(){
           
            $this->db->select('transaction_date,SUM(transaction_amount) AS bar_tran');
			$this->db->from('transaction_detail');
            $this->db->where("YEAR(transaction_date)",date('Y'));
			
            $this->db->group_by('MONTH(transaction_date)');
            $this->db->order_by('transaction_date','DESC');
			$data = $this->db->get()->result();
            return $data;
  }   
   
    
  public function today_vacation(){
      date_default_timezone_set('Asia/Kolkata');
      $today_date = date('Y-m-d');
      
      $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('date(start_date) <=',$today_date); 
      $this->db->where('date(end_date) >=',$today_date); 
      $this->db->where('shift_one','yes');
      
      $data = $this->db->get()->result();
      //return $data;
      
      
      $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$today_date); 
      $this->db->where('end_date >=',$today_date); 
      $this->db->where('shift_two','yes');
      $eve = $this->db->get()->result();
      
	  $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$today_date); 
      $this->db->where('end_date >=',$today_date); 
      $this->db->where('shift_three','yes');
      $night = $this->db->get()->result();
	  
      return array(
          'morning' => $data,
          'evening' => $eve,
		  'night' => $night,
       );
  }
    
  public function tommrow_vacation(){
       date_default_timezone_set('Asia/Kolkata');
      $tommrow_date = date('Y-m-d', strtotime('+1 day'));
      
      $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$tommrow_date); 
      $this->db->where('end_date >=',$tommrow_date); 
       $this->db->where('shift_one','yes');
      $data = $this->db->get()->result();
      //return $data;
      
      
      $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$tommrow_date); 
      $this->db->where('end_date >=',$tommrow_date); 
       $this->db->where('shift_two','yes');
      $eve = $this->db->get()->result();
	  
	  $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$tommrow_date); 
      $this->db->where('end_date >=',$tommrow_date); 
      $this->db->where('shift_three','yes');
      $night = $this->db->get()->result();
      
      return array(
          'morning' => $data,
          'evening' => $eve,
		  'night' => $night,
      );
  }    
    
   public function after_tommrow_vacation(){
        date_default_timezone_set('Asia/Kolkata');
      $mydate = date('Y-m-d', strtotime('+2 day'));
      
      $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$mydate); 
      $this->db->where('end_date >=',$mydate); 
      $this->db->where('shift_one','yes');
      $data = $this->db->get()->result();
      //return $data;
      
      
      $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$mydate); 
      $this->db->where('end_date >=',$mydate); 
       $this->db->where('shift_two','yes');
      $eve = $this->db->get()->result();
      
	    $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$mydate); 
      $this->db->where('end_date >=',$mydate); 
      $this->db->where('shift_three','yes');
      $night = $this->db->get()->result();
	  
      return array(
          'morning' => $data,
          'evening' => $eve,
		  'night' => $night,
      );
  }    
    
   public function after_tommrow_tommrow_vacation(){
        date_default_timezone_set('Asia/Kolkata');
      $mydate = date('Y-m-d', strtotime('+3 day'));
      
      $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$mydate); 
      $this->db->where('end_date >=',$mydate); 
      $this->db->where('shift_one','yes');
      $data = $this->db->get()->result();
      //return $data;
      
      
      $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$mydate); 
      $this->db->where('end_date >=',$mydate); 
     $this->db->where('shift_two','yes');
      $eve = $this->db->get()->result();
      
	  $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$mydate); 
      $this->db->where('end_date >=',$mydate); 
     $this->db->where('shift_three','yes');
      $night = $this->db->get()->result();
	  
      return array(
          'morning' => $data,
          'evening' => $eve,
		  'night' => $night,
      );
  }


   public function after_fifth_day_vacation(){
        date_default_timezone_set('Asia/Kolkata');
      $mydate = date('Y-m-d', strtotime('+4 day'));
      
      $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$mydate); 
      $this->db->where('end_date >=',$mydate); 
      $this->db->where('shift_one','yes');
      $data = $this->db->get()->result();
      //return $data;
      
      
      $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$mydate); 
      $this->db->where('end_date >=',$mydate); 
     $this->db->where('shift_two','yes');
      $eve = $this->db->get()->result();
      
	  $this->db->select('*, count(vacation_id) AS total_vac');
      $this->db->from('vacation');
      $this->db->where('start_date <=',$mydate); 
      $this->db->where('end_date >=',$mydate); 
     $this->db->where('shift_three','yes');
      $night = $this->db->get()->result();
	  
      return array(
          'morning' => $data,
          'evening' => $eve,
		  'night' => $night,
      );
  }   
    
  public function menu_a(){
      
      
  }   
    
 public function menu_b(){
     
      
  }
    
 public function menu_c(){
      
      
  }
    
public function menu_d(){
     
      
  }   
    

 // user ragistration
    
  //  Transaction Sale Calculation
    
  public function select_today_registration(){
            $this->db->select('COUNT(customer_id) AS total');
			$this->db->from('customer_details');
            $this->db->where('date(ragistration_date)',date('Y-m-d'));
			$data = $this->db->get()->result();
            return $data;
  } 

  public function select_yesterday_registration(){
            $yes = date('Y-m-d',strtotime("-1 days"));
            $this->db->select('COUNT(customer_id) AS total');
			$this->db->from('customer_details');
            $this->db->where('date(ragistration_date)',$yes);
			$data = $this->db->get()->result();
            return $data;
  } 
  
  public function select_month_registration(){
            $this->db->select('COUNT(customer_id) AS total');
			$this->db->from('customer_details');
			$this->db->where('MONTH(ragistration_date)',date('m'));
            $this->db->where('YEAR(ragistration_date)',date('Y'));
			$data = $this->db->get()->result();
            
            return $data;
  } 

  public function select_lastmonth_registration(){
            $yes = date('m',strtotime("-1 month"));
            $this->db->select('COUNT(customer_id) AS total');
			$this->db->from('customer_details');
            $this->db->where('MONTH(ragistration_date)',$yes);
            $this->db->where('YEAR(ragistration_date)',date('Y'));
			$data = $this->db->get()->result();
            
            return $data;
  }  
    
  public function select_year_registration(){
           
            $this->db->select('COUNT(customer_id) AS total');
			$this->db->from('customer_details');
            $this->db->where('YEAR(ragistration_date)',date('Y'));
			$data = $this->db->get()->result();
            return $data;
  }   
    
 public function view_vacation($date,$shift){
     
     $this->db->select('*');
     $this->db->from('vacation');
     $this->db->join('customer_details','customer_details.customer_id = vacation.customer_id');
     $this->db->join('colony_detail','colony_detail.colony_id = customer_details.colony_id');
	 //$this->db->join('subscribed_plan_details','subscribed_plan_details.customer_id = customer_details.customer_id');
	 //$this->db->join('plan','plan.plan_id = subscribed_plan_details.plan_id');
	 
     //$this->db->where('subscribed_plan_status','active'); 
     $this->db->where('start_date <=',$date);
	 $this->db->where('end_date >=',$date);
	 
	 if($shift == 1){
		 $this->db->where('shift_one','yes');
	 }
     if($shift == 2){
		 $this->db->where('shift_two','yes');
	 }
	 if($shift == 3){
		 $this->db->where('shift_three','yes');
	 }
     
     $data = $this->db->get()->result();
            return $data;
 }     
    
  public function view_order()
     {  
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $time_stamp = $date->format('Y-m-d H:i:s');  
      
      
        $this->db->select('*');
        $this->db->from('customer_details');
        $this->db->join("tifin_order_details","tifin_order_details.customer_id = customer_details.customer_id");
        $this->db->join("current_balance","current_balance.customer_id = customer_details.customer_id");
        $this->db->where("balance_amount >=", 300);
        $this->db->where("shift_id",1);
        //$this->db->or_where("shift_id",3);
        $data = $this->db->get()->result();
        echo json_encode($data);
    }  
    
    
    public function genrate_orders(){
        
      date_default_timezone_set('Asia/Kolkata');
      $today_date = date('Y-m-d');
        
      $after_fifteen_day = date( "Y-m-d", strtotime( "$today_date -15 day" ) );    
        
	  
	  $check_genrated_orders = $this->db->get_where('genrated_order_list',array('order_date' => $today_date));
	  
	  if($check_genrated_orders->num_rows() > 0){
		  echo 'order_already_genrated';
	  }else{
	  

	  $ckeck_validity  = $this->db->get_where('subscribed_plan_details',array( 'end_date <' => $after_fifteen_day));
	  if($ckeck_validity->num_rows() > 0){
		  foreach($ckeck_validity->result() as $row){
			  $customer_id = $row->customer_id;
			   $this->db->where('customer_id',$customer_id);
			   $this->db->set('subscribed_plan_status','expired');
			   $this->db->update('subscribed_plan_details');
		  }
	  }
      
          
      $get_first_shift_vacation =  $this->db->get_where('vacation',array('start_date <=' => $today_date, 'end_date >=' => $today_date, 'shift_one' => 'yes'));     
          
      $this->db->select('*');
	  $this->db->from('subscribed_plan_details');
	  $this->db->join('plan','plan.plan_id = subscribed_plan_details.plan_id');
       $this->db->join('current_balance','current_balance.customer_id = subscribed_plan_details.customer_id');      
          
     // $this->db->where('subscribed_plan_details.start_date <=' ,$today_date);   
     // $this->db->where('subscribed_plan_details.end_date >=' ,$today_date);      
	  //$this->db->join('customer_delivery_details','customer_delivery_details.customer_id = subscribed_plan_details.customer_id');
	  $this->db->where_in('subscribed_plan_status',['active']);
      
      if($get_first_shift_vacation->num_rows() > 0){
          
          foreach($get_first_shift_vacation->result() as $vrows){
              $vac_id = $vrows->customer_id;
              
              $this->db->where('subscribed_plan_details.customer_id !=',$vac_id);
          }
          
      }      
          
	  $first_shift_data = $this->db->get();
	  //return $data->result();
	  
	  if($first_shift_data->num_rows() > 0){
		   
		   foreach($first_shift_data->result() as $row){
               
               
			   $myshift_id = 1;
			   $customer_delivery_shift = $row->plan_breakfast;
           
			   $plan_status = $row->subscribed_plan_status;
               
              
               if($row->balance_amount >= $row->per_tifin_price){
               
			    if($customer_delivery_shift != ''){
			       $arr = array(
			             
			    		'order_date' =>  $today_date,
			            'customer_id' => $row->customer_id,
			    		'plan_id'  => $row->plan_id,
			    		'shift_id' => $myshift_id,
			    		'tiffin_cost' => $row->per_tifin_price,
			    		'order_status' => 'pending',
			       
			       );
			       
			       $this->db->insert('genrated_order_list',$arr);
			    }
               }
		   }
		   
      }
          
      $get_second_shift_vacation =  $this->db->get_where('vacation',array('start_date <=' => $today_date, 'end_date >=' => $today_date, 'shift_two' => 'yes'));     
          
      $this->db->select('*');
	  $this->db->from('subscribed_plan_details');
	  $this->db->join('plan','plan.plan_id = subscribed_plan_details.plan_id');
      $this->db->join('current_balance','current_balance.customer_id = subscribed_plan_details.customer_id');
          
     // $this->db->where('subscribed_plan_details.start_date <=' ,$today_date);   
     //  $this->db->where('subscribed_plan_details.end_date >=' ,$today_date);         
	  //$this->db->join('customer_delivery_details','customer_delivery_details.customer_id = subscribed_plan_details.customer_id');
	  $this->db->where_in('subscribed_plan_status',['active']);
      
      if($get_second_shift_vacation->num_rows() > 0){
          
          foreach($get_second_shift_vacation->result() as $vrows){
              $vac_id = $vrows->customer_id;
              
              $this->db->where('subscribed_plan_details.customer_id !=',$vac_id);
          }
          
      }      
      $second_shift_data = $this->db->get();
               
          
     if($second_shift_data->num_rows() > 0){      
	       
		   foreach($second_shift_data->result() as $row){
			   $myshift_id = 2;
			   
               $customer_delivery_shift = $row->plan_launch;
			   $plan_status = $row->subscribed_plan_status;
			   
               if($row->balance_amount >= $row->per_tifin_price){
              
			   if($customer_delivery_shift != ''){
			       $arr = array(
			             
			    		'order_date' =>  $today_date,
			            'customer_id' => $row->customer_id,
			    		'plan_id'  => $row->plan_id,
			    		'shift_id' => $myshift_id,
			    		'tiffin_cost' => $row->per_tifin_price,
			    		'order_status' => 'pending',
			       
			       );
			       
			       $this->db->insert('genrated_order_list',$arr);
			   }
              }
		   }
     }
          
    $get_third_shift_vacation =  $this->db->get_where('vacation',array('start_date <=' => $today_date, 'end_date >=' => $today_date, 'shift_three' => 'yes'));     
          
      $this->db->select('*');
	  $this->db->from('subscribed_plan_details');
	  $this->db->join('plan','plan.plan_id = subscribed_plan_details.plan_id');
      $this->db->join('current_balance','current_balance.customer_id = subscribed_plan_details.customer_id');           
      //$this->db->where('subscribed_plan_details.start_date <=' ,$today_date);   
      //$this->db->where('subscribed_plan_details.end_date >=' ,$today_date);         
	  //$this->db->join('customer_delivery_details','customer_delivery_details.customer_id = subscribed_plan_details.customer_id');
	  $this->db->where_in('subscribed_plan_status',['active']);
      
      if($get_third_shift_vacation->num_rows() > 0){
          
          foreach($get_third_shift_vacation->result() as $vrows){
              $vac_id = $vrows->customer_id;
              
              $this->db->where('subscribed_plan_details.customer_id !=',$vac_id);
          }
          
      }      
      $third_shift_data = $this->db->get(); 
          
     if($third_shift_data->num_rows() > 0){         
		   foreach($third_shift_data->result() as $row){
			   $myshift_id = 3;
			   $customer_delivery_shift = $row->plan_dinner;
              
			   $plan_status = $row->subscribed_plan_status;
               
               if($row->balance_amount >= $row->per_tifin_price){
                   
			   if($customer_delivery_shift != ''){
			       $arr = array(
			             
			    		'order_date' =>  $today_date,
			            'customer_id' => $row->customer_id,
			    		'plan_id'  => $row->plan_id,
			    		'shift_id' => $myshift_id,
			    		'tiffin_cost' => $row->per_tifin_price,
			    		'order_status' => 'pending',
			       
			       );
			       
			       $this->db->insert('genrated_order_list',$arr);
			   }
              }
		   }
		   
		   echo 'success';
		   
	  }
	  
	  }
    }
    
    
    public function count_order()
     {  
       date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $current_date = $date->format('Y-m-d');
        $time_stamp = $date->format('Y-m-d H:i:s');  
    
        // pending order count
        
        $this->db->select('COUNT(genrated_order_id) AS brekfast');
        $this->db->from('genrated_order_list');
        $this->db->where("genrated_order_list.order_date",$current_date);
        $this->db->where("genrated_order_list.order_status",'pending');
        $this->db->where("genrated_order_list.shift_id",'1');
        $pending_brekfast = $this->db->get();
        
        
        $this->db->select('COUNT(genrated_order_id) AS launch');
        $this->db->from('genrated_order_list');
        $this->db->where("genrated_order_list.order_date",$current_date);
        $this->db->where("genrated_order_list.order_status",'pending');
        $this->db->where("genrated_order_list.shift_id",'2');
        $pending_lunch = $this->db->get();
        
        
        $this->db->select('COUNT(genrated_order_id) AS dinner');
        $this->db->from('genrated_order_list');
        $this->db->where("genrated_order_list.order_date",$current_date);
        $this->db->where("genrated_order_list.order_status",'pending');
        $this->db->where("genrated_order_list.shift_id",'3');
        $pending_dinner = $this->db->get();
        
        //compeleted  order count
        
        $this->db->select('COUNT(genrated_order_id) AS brekfast');
        $this->db->from('genrated_order_list');
        $this->db->where("genrated_order_list.order_date",$current_date);
        $this->db->where("genrated_order_list.order_status",'completed');
        $this->db->where("genrated_order_list.shift_id",'1');
        $completed_brekfast = $this->db->get();
        
        
        $this->db->select('COUNT(genrated_order_id) AS launch');
        $this->db->from('genrated_order_list');
        $this->db->where("genrated_order_list.order_date",$current_date);
        $this->db->where("genrated_order_list.order_status",'completed');
        $this->db->where("genrated_order_list.shift_id",'2');
        $completed_lunch = $this->db->get();
        
        
        $this->db->select('COUNT(genrated_order_id) AS dinner');
        $this->db->from('genrated_order_list');
        $this->db->where("genrated_order_list.order_date",$current_date);
        $this->db->where("genrated_order_list.order_status",'completed');
        $this->db->where("genrated_order_list.shift_id",'3');
        $completed_dinner = $this->db->get();
        
         return array(
          'pending_brekfast' => $pending_brekfast->result(),
          'pending_launch' => $pending_lunch->result(),
          'pending_dinner' => $pending_dinner->result(),   
          'completed_brekfast' => $completed_brekfast->result(),
          'completed_launch' => $completed_lunch->result(), 
          'completed_dinner' => $completed_dinner->result(),     
      );
	  
	  
    }

    public function enter_code(){
         $qr_code = 1001;
		$link_no = 1001;
		
		for($i = 1; $i <= 1000; $i++){
			
			echo "The number is: ".$i." <br>";
			
			$arr = array(

		       'qr_code' => "tel:MC_".$qr_code++,
			   'tifin_card_no'    => $link_no++,
			   
		    );

		    $this->db->insert('tifin_id',$arr);
		}
	}	
    
    
    // select genrate order  date
    
     public function get_genrate_order_date(){
         
         $this->db->select('*');
         $this->db->from('genrate_order');
         $data = $this->db->get()->result();
         return $data;
     }
}
