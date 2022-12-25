<?php

class atm_model extends CI_Model{

	public function filter_atm($atm,$card_status){
        
        $this->db->select('*');
      $this->db->from('atm_card');
     if($atm){
       $this->db->where('atm_no',$atm);
     } 
     if($card_status){
       $this->db->where('atm_status',$card_status);
      }
      $data=$this->db->get();

       return $data->result();
         }
  public function atm1(){       
        $this->db->select('*');
      $this->db->from('atm_card');
      $data=$this->db->get();
       return $data->result();
         }
          public function selectatm(){
        $this->db->select('*');
      $this->db->from('atm_card');
      $data=$this->db->get();
       return $data->result();
         }
          public function selectcard(){
        $this->db->select('*');
      $this->db->from('atm_card');
      $data=$this->db->get();
       return $data->result();
         }
       
      }
?>