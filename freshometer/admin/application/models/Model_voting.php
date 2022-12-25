<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_voting extends CI_Model {

	function __construct(){

		parent::__construct();

	}


    public function add_special_menu($menu,$menu_id){
        
        $arr =  array(
             "menu" => $menu,
        );
        
        $this->db->where('special_menu_id',$menu_id);
        if($this->db->update('special_menu',$arr)){
            echo "success";
        }else{
            echo "fail";
        }
        
    }
    
     public function select_special_menu(){
        
        $this->db->select('*');
        $this->db->from('special_menu');
        $data = $this->db->get();
         return $data->result();
        
    }
    
     public function select_product(){
        
        $this->db->select('*');
        $this->db->from('menu');
        $this->db->order_by('menu_name','ASC');
        $data = $this->db->get();
        return $data->result();
        
    }
}