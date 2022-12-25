<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_qrcode extends CI_Model {

	function __construct(){

		parent::__construct();

	}


	public function add_plan_submit($duraction,$cost,$tifin_qty,$per_tifin_price,$shift,$discription){
      
               
                $arr2 = array(
                     'duraction' =>$duraction,
                     'cost' => $cost,
                     'total_tifin_qty' => $tifin_qty,
                     'per_tifin_price' => $per_tifin_price,
                     'shift' => $shift,
                     'discription' => $discription,
                );
                if($this->db->insert('plan',$arr2)){
                   // return "success";  
                    redirect('./plan/plan_list?001');
                }else{
			       redirect('./plan/add_plan');
                }
		 
		
	}
    
    public function edit_plan_submit($duraction,$cost,$tifin_qty,$per_tifin_price,$shift,$id,$discription){
        
              $arr2 = array(
                     'duraction' =>$duraction,
                     'cost' => $cost,
                     'total_tifin_qty' => $tifin_qty,
                     'per_tifin_price' => $per_tifin_price,
                     'shift' => $shift,
                     'discription' => $discription,
                );
                 
                $this->db->where('plan_id',$id);
                if($this->db->update('plan',$arr2)){
                   // return "success";  
                    redirect('./plan/plan_list?002');
                }else{
			       redirect('./plan/edit_plan/$id');
                }
        
    }
	
    public function select_plan(){
        
        $this->db->select('*');
        $this->db->from('plan');
        $this->db->order_by('plan_id','desc');
        $data = $this->db->get();
        return $data->result();
    }

    public function selected_plan($id){
        $this->db->select('*');
        $this->db->from('plan');
        $this->db->where('plan_id',$id);
        $data = $this->db->get();
        return $data->result();
     }
    
    public function delete_plan($del_id){
        $this->db->where('plan_id',$del_id);
        if($this->db->delete('plan')){
            echo 'success';
        }else{
            echo 'failed';
        }
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
    public function customer_report_multi_searchbar($name_search,$colony_search,$plan){
              
        
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
                
                if($plan != ""){
                        $this->db->where("plan.plan_id",$plan);
                }
                if($name_search != ""){
                         
                            $this->db->like("customer_name", $name_search);
				           
                }
        
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
    
  
}