<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_product extends CI_Model {



	function __construct(){



		parent::__construct();

	}

    public function select_product(){
        
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->order_by('menu_name','ASC');
        $data = $this->db->get();
        return $data->result();
        
    }

	public function add_product_submit($name){
           
			$arr = array(
		
		    'menu_name' => $name,
            
            
		    );
		
		    if($this->db->insert('menu',$arr)){
		    	
		    	return "success";
		    }else{
			
			return "failed";
		    };

	}
    
  
    
    public function update_product_submit($name,$id){
        $arr = array(
		
		    'menu_name' => $name,
            
		
		    );
		    $this->db->where('menu_id',$id);
		    if($this->db->update('menu',$arr)){
		    	
		    	return "updatesuccess";
		    }else{
			
			return "failed";
		    };
        
    }
   
    public function delete_product($del_id){
        
        $this->db->where('menu_id',$del_id);
        if($this->db->delete('menu')){
            
            echo 'success';
        }else{
            echo 'failed';
        }
    }
  

}