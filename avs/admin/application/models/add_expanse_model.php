<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class add_expanse_model extends CI_Model {
        
  public function add_expanse(){
   $this->db->select('*');
      $this->db->from('expainse_details');
      $data=$this->db->get();
       return $data->result();

}
public function selectexpanse(){
   $this->db->select('*');
      $this->db->from('expanse_head');
      $data=$this->db->get();
       return $data->result();

}
public function selectsubexpanse(){
      $this->db->select('*');
      $this->db->from('expanse_subhead');
      $data=$this->db->get();
       return $data->result();
}
   public function addexpanse($expanse_head,$expanse_subhead,$mydate,$expanse_amount,$expanse_note){
   	$this->db->select('*');
      $this->db->from('transaction_details');
      $this->db->join('expainse_details','expainse_details.expanse_head_id = expanse_head.expanse_head_id');
      if($expanse_head != ''){
         $this->db->where('expainse_details.expainse_head_id',$expanse_head);
      }
      

   }
}	
?>