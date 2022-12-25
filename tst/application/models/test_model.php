<?php

class test_model extends CI_Model{

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
	public function add($name,$image){
		$arr = array(
           'name' => $name,
           'image' => $image,
		);
        
       if($this->db->insert('test',$arr)){
          redirect(base_url().'controller/add');
         echo 'success';
       }else{
          echo 'failed';

       };
     }
	
}
?>       
		