<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class modal_dashboard extends CI_Model {
  
   
	
	public function select_data()
	{
		$this->db->select('*');
		$this->db->from('tbl_food');
		$data=$this->db->get();
		return $data->result();
  
	}

}

