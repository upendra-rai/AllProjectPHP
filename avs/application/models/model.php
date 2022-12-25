<?php

class model extends CI_Model{

	    public function getAllProducts()
	{
		$this->db->select('*');
		$this->db->from('team');
		$data=$this->db->get();
		return $data->result();
  
	}
	public function getjoinProducts(){
        $this->db->select('*');
        $this->db->from('recent');
        //$this->db->get('food_menu');
		$query=$this->db->get();
	    
         if ($query) {
         	return $query->result();
         	
         }
	}
	public function getjointProducts(){
        $this->db->select('*');
        $this->db->from('work');
        //$this->db->get('food_menu');
		$query=$this->db->get();
	    
         if ($query) {
         	return $query->result();
         	
         }
	}
	public function getabout(){
		$this->db->select('*');
		$this->db->from('about');
		$data=$this->db->get();
		if ($data) {
			return $data->result();
		}
	}
	public function getfuture(){
		$this->db->select('*');
		$this->db->from('future');
		$data=$this->db->get();

		if ($data) {
			return $data->result();
		}
	}
  public function getservice(){
  	$this->db->select('*');
  	$this->db->from('service');
  	$data=$this->db->get();

  	if ($data) {
  		return $data->result();  	}
  }
  public function getmain(){
  	$this->db->select('*');
  	$this->db->from('main');
  	$data=$this->db->get();
    
    if ($data) {
    	return $data->result();
    }
  }
   public function gettestmonial(){
  	$this->db->select('*');
  	$this->db->from('testimonial');
  	$data=$this->db->get();
    
    if ($data) {
    	return $data->result();
    }
  }
	

	
}

?>