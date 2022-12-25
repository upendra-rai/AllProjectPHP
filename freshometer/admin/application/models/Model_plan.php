<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_plan extends CI_Model {

	function __construct(){

		parent::__construct();

	}


	public function add_plan_submit($plan_name,$duraction,$cost,$tifin_qty,$per_tifin_price,$shift,$discription,$status,$shift_breakfast,$shift_launch,$shift_dinner){
      
               
                $arr2 = array(
                     'plan_name' => $plan_name,
                     'duraction' =>$duraction,
                     'cost' => $cost,
                     'total_tifin_qty' => $tifin_qty,
                     'per_tifin_price' => $per_tifin_price,
                     'shift' => $shift,
                     'discription' => $discription,
                     'plan_status' => $status,
                     'plan_breakfast' => $shift_breakfast,
                     'plan_launch' => $shift_launch,
                     'plan_dinner' => $shift_dinner,
                );
                if($this->db->insert('plan',$arr2)){
                   // return "success";  
                    redirect('./plan/plan_list?001');
                }else{
			       redirect('./plan/add_plan');
                }
		 
		
	}
    
    public function edit_plan_submit($plan_name,$duraction,$cost,$tifin_qty,$per_tifin_price,$shift,$id,$discription,$status,$shift_breakfast,$shift_launch,$shift_dinner){
        
              $arr2 = array(
                     'plan_name' => $plan_name,
                     'duraction' =>$duraction,
                     'cost' => $cost,
                     'total_tifin_qty' => $tifin_qty,
                     'per_tifin_price' => $per_tifin_price,
                     'shift' => $shift,
                     'discription' => $discription,
                     'plan_status' => $status,
                     'plan_breakfast' => $shift_breakfast,
                     'plan_launch' => $shift_launch,
                     'plan_dinner' => $shift_dinner,
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
    public function select_product(){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->join('unit','unit.unit_id = product.unit_id','left');
        $data = $this->db->get();
        return $data->result();
    }
    
    
    public function add_product($name,$unit,$product_price){
        $arr = array(
		    'product_name' => $name,
             'unit_id' => $unit,
             'product_price' => $product_price,
		    );
		//echo $name;
		    if($this->db->insert('product',$arr)){
		    	return "success";
                
		    }else{
			
			return "failed";
		    };
    }
    
    public function list_unit(){
        $this->db->select('*');
        $this->db->from('unit');
        $data = $this->db->get();
        return $data->result();
    }
    public function select_unit(){
        $this->db->select('*');
        $this->db->from('unit');
        $data = $this->db->get();
        return $data->result();
    }
    public function edit_product($product_id){
        $arr = array(
		    'product_name' => $name,
             'unit_id' => $unit,
             'product_price' => $product_price,
		    );
		//echo $name;
		    $this->db->where('product_id',$product_id);
			if($this->db->update('product',$arr)){
		    	return "success";
                
		    }else{
			
			return "failed";
		    };
    }
    public function selected_product($product_id){
         $this->db->select('*');
         $this->db->where('product_id',$product_id);
        $this->db->from('product');
        $data = $this->db->get();
        return $data->result();
    }
    public function delete_product($del_id){
        $this->db->where('product_id',$del_id);
        if($this->db->delete('product')){
            echo 'success';
        }else{
            echo 'failed';
        }
    }
    public function add_unit($name){
            $arr = array(
		    'unit_name' => $name,
		    );
		//echo $name;
		    if($this->db->insert('unit',$arr)){
		    	return "success";
                redirect('./plan/unit_details');
		    }else{
			
			return "failed";
		    };
	}
    public function select_list($unit_id){
         $this->db->select('*');
        $this->db->from('unit');
        $this->db->where('unit_id',$unit_id);
        $data = $this->db->get();
        return $data->result();
    }
    public function edit_unit($name,$unit_id){
        $arr = array(
		    'unit_name' => $name,
		    );
		//echo $name;
            $this->db->where('unit_id',$unit_id);
			if($this->db->update('unit',$arr)){
		    	return "success";
                redirect('./plan/unit_details');
		    }else{
			
			return "failed";
		    };
        
    }
    public function delete_unit($del_id){
        $this->db->where('unit_id',$del_id);
        if($this->db->delete('unit')){
            echo 'success';
        }else{
            echo 'failed';
        }
    }
    /*########################################################################################*/

    
}