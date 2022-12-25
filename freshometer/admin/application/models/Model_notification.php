<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_notification extends CI_Model {



	function __construct(){



		parent::__construct();

	}
    
    
    
     public function select_colony(){
        
                $this->db->select('*');
		    	$this->db->from('colony_detail');
                 $this->db->order_by('colony_name','ASC');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    public function select_customer_report(){
        
                $this->db->select('*');
		    	$this->db->from('customer_details');
                $this->db->order_by("customer_name", "asc");
                $this->db->join('current_balance', 'current_balance.customer_id = customer_details.customer_id');
                
                $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
 
    
    public function customer_report_list($id){
                
                $this->db->select('*');
		    	$this->db->from('customer_details');
                $this->db->where('customer_details.customer_id',$id);
                
		    	$this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                $data = $this->db->get();
                return $data->result();
        
    }
    
    public function customer_full_report_tran($id){
                $this->db->select('*');
		    	$this->db->from('transaction_detail');
                $this->db->where('transaction_detail.customer_id',$id);
                $this->db->where('MONTH(transaction_date)',date('m'));
                $this->db->where('YEAR(transaction_date)',date('Y'));
                $this->db->join('plan', 'plan.plan_id = transaction_detail.plan_id');
                $this->db->join('orders', 'orders.order_id = transaction_detail.order_id');
                $this->db->order_by('transaction_date','DESC');
		        $this->db->order_by('transaction_id','DESC');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    public function customer_full_report_tran_search($start_date,$end_date,$id){
             $start = date('Y-m-d',strtotime($start_date));
             $end = date('Y-m-d',strtotime($end_date));
                $this->db->select('*');
		    	$this->db->from('transaction_detail');
                $this->db->where('date(transaction_date) >=', $start);
                $this->db->where('date(transaction_date) <=', $end);
                $this->db->where('transaction_detail.customer_id',$id);
                $this->db->join('team_member', 'team_member.user_id = transaction_detail.user_id');
		        $this->db->join('dairy_products', 'dairy_products.product_id = transaction_detail.product_id');
                $this->db->order_by('transaction_date','DESC');
		        $this->db->order_by('transaction_id','DESC');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    
    
    public function transaction_report_search($start_date,$end_date){
        
           
          
        
                $this->db->select('* , SUM(transaction_amount) AS total_value , COUNT(transaction_id) as count_tran');
		    	$this->db->from('transaction_detail');
                
                
                if($start_date != 'Start Date'){
                    $start = date('Y-m-d',strtotime($start_date));
                    $this->db->where('date(transaction_date) >=', $start);
                } 
                if($end_date != 'End Date'){
                     $end = date('Y-m-d',strtotime($end_date));
                    $this->db->where('date(transaction_date) <=', $end);
                }
             
                $this->db->join('customer_details', 'customer_details.customer_id = transaction_detail.customer_id');
                $this->db->group_by('DATE(transaction_date)');
                $this->db->order_by('transaction_date','DESC');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    public function customer_report_multi_searchbar($name_search,$colony_search,$status_search,$mobile_no){
              
        
                $this->db->select('*');
		    	$this->db->from('customer_details');
                
                if($colony_search != ""){
                        $this->db->where("customer_details.colony_id", $colony_search);
                }
                
                
                if($name_search != ""){
                         
                            $this->db->like("customer_name", $name_search);
				           
                }
                 if($mobile_no != ""){
                         
                            $this->db->like("mobile_no", $mobile_no);
				           
                }              

                $this->db->order_by("customer_name", "asc");
		      
                
                
                $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                 $data = $this->db->get();
                return $data->result();
        
        
    }
    
    public function send_notification($title,$msg,$customer_id_array){
        
        
        date_default_timezone_set('Asia/Kolkata');
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
        
        
        $customer_id = explode(',',$customer_id_array);
        $my_msg = 0;
        
        $i = 1;
        foreach($customer_id as $row){
        $i++;
        $my_msg = $i;    
        $arr = array(
	        "customer_id" => $row,
			"title"  => $title,
			"message" => $msg,
			"notification_date" => $time_stamp,
		

	   );
	   
	   $this->db->insert("notification",$arr); 
      }
      
        echo 'success';
    }

}