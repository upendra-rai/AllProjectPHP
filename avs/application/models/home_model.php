<?php

class home_model extends CI_Model{

	public function getAllProducts(){

		$query=$this->db->get('explore_foods');
	
         if ($query) {
         	return $query->result();
         	
         }
	}
	   public function getjoinProducts(){
        $this->db->select('*');
        $this->db->from('food_menu');
        //$this->db->get('food_menu');
		$query=$this->db->get();
	    
         if ($query) {
         	return $query->result();
         	
         }
	}
	public function insert_data($username,$password){
		$this->db->select('*');
        $this->db->from('login');
        //$this->db->get('login');
		$query=$this->db->get();
	    
         if ($query) {
         	return $query->result();
         }
     }
	
}
?>       
		