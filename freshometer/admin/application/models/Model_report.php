<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_report extends CI_Model {



	function __construct(){



		parent::__construct();

	}
    
   public function select_plan(){
        $this->db->select('*');
        $this->db->from('plan');
        $data = $this->db->get();
        return $data->result();
        
    }
   
    
    public function daily_transaction(){
        
                $this->db->select('* , SUM(transaction_amount) AS total_value , COUNT(transaction_id) as count_tran');
		    	$this->db->from('transaction_detail');
                $this->db->where('MONTH(transaction_date)',date('m'));
                $this->db->where('YEAR(transaction_date)',date('Y'));
                $this->db->join('customer_details', 'customer_details.customer_id = transaction_detail.customer_id');
                
                $this->db->order_by('transaction_date','DESC');
                $this->db->group_by('DATE(transaction_date)');
		    	$data = $this->db->get();
                return $data->result();
        
             
                
    }

    public function transaction_date_report($date){
        
                $this->db->select('*');
		    	$this->db->from('transaction_detail');
                $this->db->join('customer_details', 'customer_details.customer_id = transaction_detail.customer_id');
                $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                $this->db->join('plan', 'plan.plan_id = transaction_detail.plan_id');
                $this->db->where('date(transaction_date)',$date);
                $this->db->order_by('transaction_id','DESC');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    public function daily_recharge(){
                $this->db->select('* , SUM(recharge_amount) AS total_value , COUNT(recharge_id) as count_recharge');
		    	$this->db->from('recharge_detail');
                $this->db->where('MONTH(recharge_date)',date('m'));
                $this->db->where('YEAR(recharge_date)',date('Y'));
                $this->db->join('customer_details', 'customer_details.customer_id = recharge_detail.customer_id');
                
                $this->db->group_by('DATE(recharge_date)');
                $this->db->order_by('recharge_date','DESC');
		    	$data = $this->db->get();
                return $data->result();
    }
    
    public function recharge_date_report($date,$agent_id){
                $this->db->select('*');
		    	$this->db->from('recharge_detail');
               // $this->db->join('team_member', 'team_member.user_id = recharge_detail.user_id');
                $this->db->join('customer_details', 'customer_details.customer_id = recharge_detail.customer_id');
                
                $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                $this->db->where('date(recharge_date)',$date);
                $this->db->join('plan', 'plan.plan_id = recharge_detail.plan_id');
                $this->db->where('date(recharge_date)',$date);
        
                if( $agent_id != ""){
                    $this->db->where('recharge_detail.user_id',$agent_id);
                };
                $this->db->order_by('recharge_id','DESC');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    public function daily_agent_report(){
                /*$this->db->select('* , transaction.tran_date,transaction.tran_by, SUM(tran_amount) AS total_value ');
		    	$this->db->from('app_team');
                $this->db->join('transaction', 'transaction.tran_by = app_team.team_id');
                $this->db->where('MONTH(tran_date)',date('m'));
                $this->db->group_by('DATE(tran_date)');
                $this->db->group_by('tran_by');
		    	$data = $this->db->get();
                return $data->result();*/
        
                $this->db->select('*');
		    	$this->db->from('team_member');
		    	$data = $this->db->get();
                return $data->result();
    }
    
  
    
     public function select_all_agent(){
        
                $this->db->select('*');
		    	$this->db->from('team_member');
                
		    	$data = $this->db->get();
                return $data->result();
        
     }
    public function select_agent($id){
           
        
                $this->db->select('*');
		    	$this->db->from('team_member');
                $this->db->where('user_id',$id);
		    	$data = $this->db->get();
                return $data->result();
    }
    
     public function select_product(){
           
        
                $this->db->select('*');
		    	$this->db->from('dairy_products');
		    	$data = $this->db->get();
                return $data->result();
    }
    
    public function agent_treansaction($id){
                $this->db->select('*, SUM(transaction_amount) AS total_value, COUNT(transaction_id) as count_tran');
		    	$this->db->from('transaction_detail');
                $this->db->where('transaction_detail.user_id',$id);
                $this->db->where('MONTH(transaction_date)',date('m'));
                $this->db->where('YEAR(transaction_date)',date('Y'));
                $this->db->join('customer_details', 'customer_details.customer_id = transaction_detail.customer_id');
                $this->db->join('atm_card_detail', 'atm_card_detail.customer_id = transaction_detail.customer_id');
                $this->db->join('team_member', 'team_member.user_id = transaction_detail.user_id');
                $this->db->group_by('DATE(transaction_date)');
                $this->db->order_by('transaction_date','DESC');
		    	$data = $this->db->get();
               
                return $data->result();
        
    }
    
     public function agent_recharge($id){
                $this->db->select('*, SUM(recharge_amount) AS total_re_value, COUNT(recharge_id) as count_re');
		    	$this->db->from('recharge_detail');
                $this->db->where('recharge_detail.user_id',$id);
                $this->db->where('MONTH(recharge_date)',date('m'));
                $this->db->where('YEAR(recharge_date)',date('Y'));
                $this->db->join('customer_details', 'customer_details.customer_id = recharge_detail.customer_id');
                $this->db->join('atm_card_detail', 'atm_card_detail.customer_id = recharge_detail.customer_id');
                $this->db->join('team_member', 'team_member.user_id = recharge_detail.user_id');
                $this->db->group_by('DATE(recharge_date)');
                $this->db->order_by('recharge_date','DESC');
		    	$data = $this->db->get();
               
                return $data->result();
        
    }
    
   public function team_detail_transaction($team_id,$date){
                $this->db->select('*');
		    	$this->db->from('transaction_detail');
                $this->db->where('transaction_detail.user_id',$team_id);
                $this->db->where('date(transaction_date)',$date);
                $this->db->join('customer_details', 'customer_details.customer_id = transaction_detail.customer_id');
                $this->db->join('atm_card_detail', 'atm_card_detail.customer_id = transaction_detail.customer_id');
                $this->db->join('dairy_products', 'dairy_products.product_id = transaction_detail.product_id');
                $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                $this->db->join('delivery_type_details', 'delivery_type_details.d_type_id = customer_details.d_type_id');
                $this->db->order_by('transaction_id','DESC');
		    	$data = $this->db->get();
                return $data->result();
       
   }
    
    public function team_detail_recharge($team_id,$date){
                $this->db->select('*');
		    	$this->db->from('recharge_detail');
                $this->db->where('recharge_detail.user_id',$team_id);
                $this->db->where('date(recharge_date)',$date);
                $this->db->join('customer_details', 'customer_details.customer_id = recharge_detail.customer_id');
                $this->db->join('atm_card_detail', 'atm_card_detail.customer_id = recharge_detail.customer_id');
                $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                $this->db->join('delivery_type_details', 'delivery_type_details.d_type_id = customer_details.d_type_id');
                $this->db->order_by('recharge_id','DESC');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    
     public function select_colony(){
        
                $this->db->select('*');
		    	$this->db->from('colony_detail');
                 $this->db->order_by('colony_name','ASC');
		    	$data = $this->db->get();
                return $data->result();
        
    }
         
    public function select_shift(){
        
               /* $this->db->select('*');
		    	$this->db->from('delivery_shift');
               
		    	$data = $this->db->get();
                return $data->result();
        */
    }     
         
    
    public function select_customer_report(){
        
                $this->db->select('*,customer_details.customer_id AS my_customer_id');
		    	$this->db->from('customer_details');
                $this->db->order_by("customer_name", "asc");
                $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                
                $this->db->join('current_balance', 'current_balance.customer_id = customer_details.customer_id');
                $this->db->join('subscribed_plan_details', 'subscribed_plan_details.customer_id = customer_details.customer_id','left');
              
                $this->db->join('plan', 'plan.plan_id = subscribed_plan_details.plan_id','left');
        
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    public function customer_report_multi_searchbar($name_search,$colony_search,$status_search,$plan){
              
        
                $this->db->select('*,customer_details.customer_id AS my_customer_id');
		    	$this->db->from('customer_details');
                
               
                $this->db->order_by("customer_name", "asc");
		        $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                
                 $this->db->join('current_balance', 'current_balance.customer_id = customer_details.customer_id');
                $this->db->join('subscribed_plan_details', 'subscribed_plan_details.customer_id = customer_details.customer_id','left');
              
                $this->db->join('plan', 'plan.plan_id = subscribed_plan_details.plan_id','left');
        
                  if($colony_search != ""){
                        $this->db->where("customer_details.colony_id", $colony_search);
                }
                
                if($status_search != ""){
                        $this->db->where("tifin_order_details.shift_id",$status_search);
                }
                if($name_search != ""){
                         
                            $this->db->like("customer_name", $name_search);
				           
                }
        
                if($plan != ""){
                         
                           $this->db->where("subscribed_plan_details.plan_id",$plan);
				           
                }
                 $data = $this->db->get();
                return $data->result();
        
        
    }
    
    public function transaction_date_multi_searchbar($colony_search,$shift_search,$on_date,$plan){
                $this->db->select('*');
		    	$this->db->from('transaction_detail');
                $this->db->where('date(transaction_date)', $on_date);
                
        
                $this->db->join('customer_details','customer_details.customer_id = transaction_detail.customer_id');
		        $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                $this->db->join('plan', 'plan.plan_id = transaction_detail.plan_id');
        
                if($colony_search != ""){
                    $this->db->where('customer_details.colony_id', $colony_search); 
                    
                }
        
                if($shift_search != ""){
                    $this->db->where('transaction_detail.shift_id', $shift_search); 
                    
                }
        
                if($plan != ""){
                    $this->db->where('transaction_detail.plan_id', $plan); 
                    
                }
                 $data = $this->db->get();
                return $data->result();
        
        
        
    }
    
    
    public function recharge_date_multi_searchbar($colony_search,$on_date,$plan){
        
                $this->db->select('*');
		    	$this->db->from('recharge_detail');
                $this->db->where('date(recharge_date)', $on_date);
        
                if($colony_search != ""){
                    $this->db->where('customer_details.colony_id', $colony_search); 
                    
                }
        
                if($plan != ''){
                     $this->db->where('recharge_detail.plan_id', $plan);
                }
        
                $this->db->join('customer_details','customer_details.customer_id = recharge_detail.customer_id');
              
                $this->db->join('current_balance', 'current_balance.customer_id = recharge_detail.customer_id');
                
		        $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                $this->db->join('plan', 'plan.plan_id = recharge_detail.plan_id');
               
                 $data = $this->db->get();
                return $data->result();
        
        
        
    }
    
    public function customer_report_list($id){
        
                $this->db->select('*');
		    	$this->db->from('customer_details');
                $this->db->where('customer_details.customer_id',$id);
                $this->db->join('current_balance', 'current_balance.customer_id = customer_details.customer_id','left');
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
                
                $this->db->order_by('transaction_date','DESC');
		        $this->db->order_by('transaction_id','DESC');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    public function customer_full_report_rech($id){
                $this->db->select('*');
		    	$this->db->from('recharge_detail');
                $this->db->where('recharge_detail.customer_id',$id);
                $this->db->where('MONTH(recharge_date)',date('m'));
                $this->db->where('YEAR(recharge_date)',date('Y'));
                //$this->db->join('team_member', 'team_member.user_id = recharge_detail.user_id','left');
                $this->db->order_by('recharge_date','DESC');
		  
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    public function customer_full_report_rech_search($start_date,$end_date,$id){
             $start = date('Y-m-d',strtotime($start_date));
             $end = date('Y-m-d',strtotime($end_date));
        
                $this->db->select('*');
		    	$this->db->from('recharge_detail');
                
                $this->db->where('date(recharge_date) >=', $start);
                $this->db->where('date(recharge_date) <=', $end);
                $this->db->where('recharge_detail.customer_id',$id);
                $this->db->join('team_member', 'team_member.user_id = recharge_detail.user_id');
                $this->db->order_by('recharge_date','DESC');
		        $this->db->order_by('recharge_date','DESC');
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
    
    public function recharge_report_search($start_date,$end_date,$agent_search){
        
                $this->db->select('* , SUM(recharge_amount) AS total_value , COUNT(recharge_id) as count_recharge');
		    	$this->db->from('recharge_detail');
                 if($start_date != 'Start Date'){
                    $start = date('Y-m-d',strtotime($start_date));
                    $this->db->where('date(recharge_date) >=', $start);
                } 
                if($end_date != 'End Date'){
                     $end = date('Y-m-d',strtotime($end_date));
                    $this->db->where('date(recharge_date) <=', $end);
                }
                if($agent_search != ''){
                     $this->db->where('user_id', $agent_search);
                    
                }
        
                $this->db->join('customer_details', 'customer_details.customer_id = recharge_detail.customer_id');
                
                $this->db->group_by('DATE(recharge_date)');
                $this->db->order_by('recharge_date','DESC');
		    	$data = $this->db->get();
                return $data->result();
    }
    
    
    public function agent_transection_searchbar($start_date,$end_date,$team_id){
        
           $start = date('Y-m-d',strtotime($start_date));
           $end = date('Y-m-d',strtotime($end_date));
        
                $this->db->select('* , SUM(transaction_amount) AS total_value , COUNT(transaction_id) as count_tran');
		    	$this->db->from('transaction_detail');
                $this->db->where('transaction_detail.user_id', $team_id);
                $this->db->where('date(transaction_date) >=', $start);
                $this->db->where('date(transaction_date) <=', $end);
                $this->db->join('customer_details', 'customer_details.customer_id = transaction_detail.customer_id');
                $this->db->join('atm_card_detail', 'atm_card_detail.customer_id = transaction_detail.customer_id');
                $this->db->join('team_member', 'team_member.user_id = transaction_detail.user_id');
                $this->db->group_by('DATE(transaction_date)');
                $this->db->order_by('transaction_date','DESC');
		    	$data = $this->db->get();
                //return $data->result();
        
            //echo json_encode($data);
            if($data->num_rows() > 0){
                 
		          foreach($data->result() as $row){
				       echo '<tr class="click_tr" data-team_id="'.$row->user_id.'" data-date="'.date('Y-m-d',strtotime($row->transaction_date)).'">';
					   
			           echo '<td>'.date('d-M-y',strtotime($row->transaction_date)).'</td>';
                       echo '<td>'.$row->total_value.'</td>';
                       echo '<td>'.$row->count_tran.'</td>';
			           echo ' </tr>'; 
  
				 }
				 }else{

					   echo '<tr>';
                      echo '<td>';
					  echo "No Result found";
                      echo '</td>';
                      echo '</tr>';
				 }
        
    }
    
    public function agent_recharge_searchbar($start_date,$end_date,$team_id){
        
           $start = date('Y-m-d',strtotime($start_date));
           $end = date('Y-m-d',strtotime($end_date));
        
                $this->db->select('* , SUM(recharge_amount) AS total_re_value , COUNT(recharge_id) as count_re');
		    	$this->db->from('recharge_detail');
                $this->db->where('recharge_detail.user_id', $team_id);
                $this->db->where('date(recharge_date) >=', $start);
                $this->db->where('date(recharge_date) <=', $end);
                $this->db->join('customer_details', 'customer_details.customer_id = recharge_detail.customer_id');
                $this->db->join('atm_card_detail', 'atm_card_detail.customer_id = recharge_detail.customer_id');
                $this->db->join('team_member', 'team_member.user_id = recharge_detail.user_id');
                $this->db->group_by('DATE(recharge_date)');
                $this->db->order_by('recharge_date','DESC');
		    	$data = $this->db->get();
                //return $data->result();
        
            //echo json_encode($data);
            if($data->num_rows() > 0){
                 
		          foreach($data->result() as $row){
				       echo '<tr class="click_tr2" data-team_id="'.$row->user_id.'" data-date="'.date('Y-m-d', strtotime($row->recharge_date)).'">';
					  
			           echo '<td>'.date('d-M-y',strtotime($row->recharge_date)).'</td>';
                       echo '<td>'.$row->total_re_value.'</td>';
                       echo '<td>'.$row->count_re.'</td>';
			           echo ' </tr>'; 
                  
				 }
				 }else{

					   echo '<tr>';
                      echo '<td>';
					  echo "No Result found";
                      echo '</td>';
                      echo '</tr>';
				 }
        
    }
    
    
    public function customerreport_recharge_searchbar($start_date,$end_date,$link_id){
        
           $start = date('Y-m-d',strtotime($start_date));
           $end = date('Y-m-d',strtotime($end_date));
        
                $this->db->select('* ');
		    	$this->db->from('recharge_detail');
                $this->db->where('customer_id', $link_id);
                $this->db->where('date(recharge_date) >=', $start);
                $this->db->where('date(recharge_date) <=', $end);
                $this->db->join('team_member', 'team_member.user_id = recharge_detail.user_id');
                $this->db->order_by('recharge_date','DESC');
                $this->db->order_by('recharge_id','DESC');
		    	$data = $this->db->get();
                //return $data->result();
        
            //echo json_encode($data);
            if($data->num_rows() > 0){
                  echo '<thead>';
                  echo '<tr>';
                 
                  echo '<th>Recharge Date</th>';
                  echo '<th>Amount</th>';
                  echo '<th>Recharge By</th>';
                  echo '</tr>';
                  echo '</thead>';
                  echo '<tbody>';
                  $total1 = 0;
                  
		          foreach($data->result() as $row){
				       echo '<tr>';
					   
			           echo '<td>'.date('d-M-y',strtotime($row->recharge_date)).'</td>';
                       echo '<td>'.$row->recharge_amount.'</td>';
                       echo '<td>'.$row->name.'</td>';
			           echo ' </tr>'; 
                      $total1 += $row->recharge_amount;
				   }
                     echo '</tbody>';
                     echo '<tfoot>';
                           echo '<tr>';
                           echo '<td style="border:1px solid #dddddd;">Total</td>';
                           
                           echo '<td style="border:1px solid #dddddd;">'.$total1.'</td>';
                           echo '<td></td>';                   
                           echo '<tr>';                        
                       echo '</tfoot>'; 
                
				 }else{

					  echo '<tr>';
                      echo '<td>';
					  echo "No Result found";
                      echo '</td>';
                       echo '<tr>'; 
				 }
        
    }
    
    
     public function customerreport_tran_searchbar($start_date,$end_date,$link_id){
        
           $start = date('Y-m-d',strtotime($start_date));
           $end = date('Y-m-d',strtotime($end_date));
        
                $this->db->select('* ');
		    	$this->db->from('transaction_detail');
                $this->db->where('customer_id', $link_id);
                $this->db->where('date(transaction_date) >=', $start);
                $this->db->where('date(transaction_date) <=', $end);
                $this->db->join('team_member', 'team_member.user_id = transaction_detail.user_id');
                $this->db->join('dairy_products', 'dairy_products.product_id = transaction_detail.product_id');
                $this->db->order_by('transaction_date','DESC');
                $this->db->order_by('transaction_id','DESC');
		    	$data = $this->db->get();
                //return $data->result();
        
            //echo json_encode($data);
            if($data->num_rows() > 0){
                  echo '<thead>';
                  echo '<tr>';
                  
                  echo '<th>Transaction Date</th>';
                  echo '<th>Product</th>';
                  echo '<th>Amount</th>';
                  echo '<th>Transaction By</th>';
                  echo '</tr>';
                  echo '</thead>';
                  echo '<tbody>';
                 
                  $total = 0;
		          foreach($data->result() as $row){
				       echo '<tr>';
					   
			           echo '<td>'.date('d-M-y',strtotime($row->transaction_date)).'</td>';
                       echo '<td>'.$row->product_name.'</td>';
                       echo '<td>'.$row->transaction_amount.'</td>';
                       echo '<td>'.$row->name.'</td>';
			           echo ' </tr>';
                      $total += $row->transaction_amount;
				    }
                    echo '</tbody>';
                     echo '<tfoot>';
                           echo '<tr>';
                           echo '<td style="border:1px solid #dddddd;">Total</td>';
                          
                           echo '<td></td>';
                           echo '<td style="border:1px solid #dddddd;">'.$total.'</td>';
                           echo '<td></td>';                   
                           echo '<tr>';                        
                       echo '</tfoot>';                              
                          
                  
				 }else{
                      echo '<tr>';
                      echo '<td>';
					  echo "No Result found";
                      echo '</td>';
                       echo '<tr>'; 
				 }
        
    }
    
    public function searchbar_result($search_by,$search_for){

		    	$this->db->select('*');
		    	$this->db->from('customers');
				$this->db->where($search_by, $search_for);
		    	$data = $this->db->get();

				if($data->num_rows() > 0){
		          foreach($data->result() as $row){
                      
                       echo '<tr class="click_tr" data-card_no="'.$row->linked_no.'">';
					   echo '<td>1</td>';
			           echo '<td>'.$row->customer_firstname.' '.$row->customer_lastname.'</td>';
                       echo '<td>'.$row->linked_no.'</td>';
			           echo '<td>'.$row->colonyname.'</td>';
			           echo '<td>'.$row->mobile_no.'</td>';
                       echo '<td>'.$row->mobile_no2.'</td>';
			           echo '<td>'.$row->email_id.'</td>';
                       echo '<td>'.$row->account.'</td>';
                       echo '<td>'.$row->delivery_type.'</td>';
			           echo '<td><div class="st_active">'.$row->status.'</div></td>';
			           echo ' </tr>';

				 }
				 }else{

					 echo "No matching records found";
				 }

    }
	
	public function searchbar_like_result($search_by,$search_for){

		    	$this->db->select('*');
		    	$this->db->from('customers');
				$this->db->like($search_by, $search_for);
		    	$data = $this->db->get();

				if($data->num_rows() > 0){
		          foreach($data->result() as $row){
					 echo '<tr class="click_tr" data-card_no="'.$row->linked_no.'">';
					   echo '<td>1</td>';
			           echo '<td>'.$row->customer_firstname.' '.$row->customer_lastname.'</td>';
                       echo '<td>'.$row->linked_no.'</td>';
			           echo '<td>'.$row->colonyname.'</td>';
			           echo '<td>'.$row->mobile_no.'</td>';
                       echo '<td>'.$row->mobile_no2.'</td>';
			           echo '<td>'.$row->email_id.'</td>';
                       echo '<td>'.$row->account.'</td>';
                       echo '<td>'.$row->delivery_type.'</td>';
			           echo '<td><div class="st_active">'.$row->status.'</div></td>';
			           echo ' </tr>';

				 }
				 }else{

					 echo "No matching records found";
				 }

    }
	
    public function searchbar_like_list($search_by,$search_for){

		    	$this->db->select('*');
		    	$this->db->from('customers');
				$this->db->like($search_by, $search_for);
		    	$data = $this->db->get();

				if($data->num_rows() > 0){
		          foreach($data->result() as $row){
					   echo '<tr class="click_tr" data-card_no="'.$row->linked_no.'">';
					   echo '<td>1</td>';
			           echo '<td>'.$row->customer_firstname.' '.$row->customer_lastname.'</td>';
                       echo '<td>'.$row->linked_no.'</td>';
			           echo '<td>'.$row->colonyname.'</td>';
			           echo '<td>'.$row->mobile_no.'</td>';
                       echo '<td>'.$row->mobile_no2.'</td>';
			           echo '<td>'.$row->email_id.'</td>';
                       echo '<td>'.$row->account.'</td>';
                       echo '<td>'.$row->delivery_type.'</td>';
			           echo '<td><div class="st_active">'.$row->status.'</div></td>';
			           echo ' </tr>';

                  }
				 }else{

					  
				 }

    }
    
    public function searchbar_like_list_number($search_by,$search_for){

		    	$this->db->select('*');
		    	$this->db->from('customers');
				$this->db->like("mobile_no", $search_for);
                $this->db->or_like("mobile_no2", $search_for);
		    	$data = $this->db->get();

				if($data->num_rows() > 0){
		          foreach($data->result() as $row){
					  echo '<tr class="click_tr" data-card_no="'.$row->linked_no.'">';
					   echo '<td>1</td>';
			           echo '<td>'.$row->customer_firstname.' '.$row->customer_lastname.'</td>';
                       echo '<td>'.$row->linked_no.'</td>';
			           echo '<td>'.$row->colonyname.'</td>';
			           echo '<td>'.$row->mobile_no.'</td>';
                       echo '<td>'.$row->mobile_no2.'</td>';
			           echo '<td>'.$row->email_id.'</td>';
                       echo '<td>'.$row->account.'</td>';
                       echo '<td>'.$row->delivery_type.'</td>';
			           echo '<td><div class="st_active">'.$row->status.'</div></td>';
			           echo ' </tr>';

                  }
				 }else{

					  
				 }

    }
    public function searchbar_name_result($search_by,$firstname,$lastname){

		    	$this->db->select('*');
		    	$this->db->from('customers');
				$this->db->like("customer_firstname", $firstname);
				$this->db->like("customer_lastname", $lastname);
		    	$data = $this->db->get();

				if($data->num_rows() > 0){
		          foreach($data->result() as $row){
                       echo '<tr class="click_tr" data-card_no="'.$row->linked_no.'">';
					   echo '<td>1</td>';
			           echo '<td>'.$row->customer_firstname.' '.$row->customer_lastname.'</td>';
                       echo '<td>'.$row->linked_no.'</td>';
			           echo '<td>'.$row->colonyname.'</td>';
			           echo '<td>'.$row->mobile_no.'</td>';
                       echo '<td>'.$row->mobile_no2.'</td>';
			           echo '<td>'.$row->email_id.'</td>';
                       echo '<td>'.$row->account.'</td>';
                       echo '<td>'.$row->delivery_type.'</td>';
			           echo '<td><div class="st_active">'.$row->status.'</div></td>';
			           echo ' </tr>';
				 }
				 }else{
                     echo "No matching records found";
					 
				 }

    }
    
	public function searchbar_list_name($search_by,$firstname,$lastname){

		    	$this->db->select('*');
		    	$this->db->from('customers');
				$this->db->like("customer_firstname", $firstname);
				$this->db->like("customer_lastname", $lastname);
		    	$data = $this->db->get();

				if($data->num_rows() > 0){
		          foreach($data->result() as $row){
                       echo '<tr class="click_tr" data-card_no="'.$row->linked_no.'">';
					   echo '<td>1</td>';
			           echo '<td>'.$row->customer_firstname.' '.$row->customer_lastname.'</td>';
                       echo '<td>'.$row->linked_no.'</td>';
			           echo '<td>'.$row->colonyname.'</td>';
			           echo '<td>'.$row->mobile_no.'</td>';
                       echo '<td>'.$row->mobile_no2.'</td>';
			           echo '<td>'.$row->email_id.'</td>';
                       echo '<td>'.$row->account.'</td>';
                       echo '<td>'.$row->delivery_type.'</td>';
			           echo '<td><div class="st_active">'.$row->status.'</div></td>';
			           echo ' </tr>';
				 }
				 }else{
                     
					 
				 }

    }
	
	public function search_by_date_result($from_date,$to_date){
           date_default_timezone_set('Asia/Kolkata');
		   $start = date("y-m-d",strtotime($from_date));
		   $end = date("y-m-d",strtotime($to_date));
		    
		   
	    	$this->db->select('*');
	    	$this->db->from('customers');
			$this->db->where('time_stamp >=', $start);
            $this->db->where('time_stamp <=', $end);
			
	    	$data = $this->db->get();

			if($data->num_rows() > 0){
		          foreach($data->result() as $row){
				     echo '<tr class="click_tr" data-card_no="'.$row->linked_no.'">';
					   echo '<td>1</td>';
			           echo '<td>'.$row->customer_firstname.' '.$row->customer_lastname.'</td>';
                       echo '<td>'.$row->linked_no.'</td>';
			           echo '<td>'.$row->colonyname.'</td>';
			           echo '<td>'.$row->mobile_no.'</td>';
                       echo '<td>'.$row->mobile_no2.'</td>';
			           echo '<td>'.$row->email_id.'</td>';
                       echo '<td>'.$row->account.'</td>';
                       echo '<td>'.$row->delivery_type.'</td>';
			           echo '<td><div class="st_active">'.$row->status.'</div></td>';
			           echo ' </tr>';

				 }
				 }else{

					  
				 }

	}
    
    
    public function atm_card_report(){
        
                $this->db->select('*, c1.customer_name as assign_name, c2.customer_name as scaned_by, c2.mobile_no as scaned_by_mobile_no');
		    	$this->db->from('tifin_id');
                 $this->db->order_by('tifin_card_no','ASC');
                $this->db->join('customer_details c1','c1.customer_id = tifin_id.customer_id','left');
        
                $this->db->join('transaction_detail','transaction_detail.transaction_id = tifin_id.transaction_id','left');
                $this->db->join('customer_details c2','c2.customer_id = transaction_detail.customer_id','left');
               
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    public function atm_card_report_searchbar($card_search,$status_search){
             date_default_timezone_set('Asia/Kolkata');
           // $date = new DateTime();
            // $time_stamp = $date->format('Y-m-d H:i:s');
             $before_date = date('Y-m-d',strtotime("-2 days"));
        
               $this->db->select('*, c1.customer_name as assign_name, c2.customer_name as scaned_by, c2.mobile_no as scaned_by_mobile_no');
		    	$this->db->from('tifin_id');
                if($card_search != ''){
                    $this->db->where('tifin_card_no',$card_search);
                }
               
              if($status_search != ''){
                    
                    if($status_search == 'available'){
                        $this->db->where('tifin_status','');
                    }else if($status_search == 'unscan'){
                        
                        $this->db->where('date(last_transaction_date) >=','2000-01-01');
                        $this->db->where('date(last_transaction_date) <=',$before_date);
                        
                    }else if($status_search == 'delivered'){
                        $this->db->where('tifin_status',$status_search);
                        
                    }else if($status_search == 'assigned'){
                        $this->db->where_in('tifin_status',['morning','evening']);
                        
                    }else if($status_search == 'lost'){
                        $this->db->where_in('tifin_status',['lost','broken']);
                    }
                    
                }
                
                $this->db->order_by('id','ASC');
                $this->db->join('customer_details c1','c1.customer_id = tifin_id.customer_id','left');
                $this->db->join('transaction_detail','transaction_detail.transaction_id = tifin_id.transaction_id','left');
                $this->db->join('customer_details c2','c2.customer_id = transaction_detail.customer_id','left');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    public function atm_card_status(){
        
                $this->db->select('*');
		    	$this->db->from('atm_card_detail');
                $this->db->where('card_status','lost');
                $this->db->or_where('card_status','broken');
                $this->db->or_where('card_status','');
                $this->db->order_by('atm_card_no','ASC');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    public function atm_card_status_update($status,$id){
        
        $this->db->where('atm_id',$id);
        
        if($status == 'available'){
            $this->db->set('card_status','');
        }else{
            $this->db->set('card_status',$status);
        }
        
        if($this->db->update('atm_card_detail')){
            echo "success";
        }else{
            echo "failed";
        }
        
    }
    
    public function atm_card_status_searchbar($card_search,$status_search){
                $this->db->select('*');
		    	$this->db->from('tifin_id');
                if($card_search != ''){
                    $this->db->where('tifin_card_no',$card_search);
                }
               
              if($status_search != ''){
                    
                    if($status_search == 'available'){
                        $this->db->where('tifin_status','');
                    }else{
                        $this->db->where('tifin_status',$status_search);
                    }
                    
                }
                $this->db->where('customer_id',null);
                $this->db->order_by('tifin_card_no','ASC');
		    	$data = $this->db->get();
                return $data->result();
        
        
    }
    
    
//=========********===========********========******========//
// ************ Orders Reports Section ***********//
//=========********===========********========******========//     
    public function order_report($start,$end,$customer_id){
        
				$this->db->select('*');
				$this->db->from('genrated_order_list');
                $this->db->join('customer_details', 'customer_details.customer_id = genrated_order_list.customer_id');
                $this->db->join('plan', 'plan.plan_id = genrated_order_list.plan_id');
                 $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                if($customer_id){
					$this->db->where('customer_details.customer_id',$customer_id);
				}
				if($start && $start != 'Start Date'){
					
					$start = date('Y-m-d',strtotime($start));
					$this->db->where('order_date >=',$start);
				}
				
				if($end && $end != 'End Date'){
					
					$end = date('Y-m-d',strtotime($end));
					$this->db->where('order_date <=',$end);
				}
				$this->db->order_by('order_date','desc');
				$data = $this->db->get();
                return $data->result();
    }     
  
     public function select_all_customers_for_drop_down(){
								$this->db->select('customer_details.customer_id,customer_details.customer_name,customer_details.mobile_no');
								$this->db->from('customer_details');
								
								$data = $this->db->get();
								return $data->result();
    }
    
    
    // feed back
    
     public function select_feedback(){
        
                $this->db->select('*');
		    	$this->db->from('feedback');
                $this->db->join('customer_details', 'customer_details.customer_id = feedback.customer_id');
                 $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                 $this->db->join('subscribed_plan_details', 'subscribed_plan_details.customer_id = customer_details.customer_id','left');
               $this->db->join('plan', 'plan.plan_id = subscribed_plan_details.plan_id');
                $this->db->order_by('feedback_id','desc');
		    	$data = $this->db->get();
                return $data->result();
        
    }
    
    public function select_feedback_filter($name_search,$colony_search,$status_search,$plan){
              
                $this->db->select('*');
		    	$this->db->from('feedback');
               
                $this->db->join('customer_details', 'customer_details.customer_id = feedback.customer_id');
		        $this->db->join('colony_detail', 'colony_detail.colony_id = customer_details.colony_id');
                $this->db->join('subscribed_plan_details', 'subscribed_plan_details.customer_id = customer_details.customer_id','left');
                $this->db->join('plan', 'plan.plan_id = subscribed_plan_details.plan_id','left');
        
                if($colony_search != ""){
                    $this->db->where("customer_details.colony_id", $colony_search);
                }
                
                if($status_search != ""){
                    $this->db->where("tifin_order_details.shift_id",$status_search);
                }
                if($name_search != ""){
                    $this->db->like("customer_name", $name_search);
                }
        
                if($plan != ""){
                    $this->db->where("subscribed_plan_details.plan_id",$plan);
                }
        
                $data = $this->db->get();
                return $data->result();
        
        
    }
    
    
}