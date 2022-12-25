<?php

class recharge_model extends CI_Model{


  public function recharge(){
     $this->db->select('*');
      $this->db->from('recharge_report');
      $this->db->join('customer_repot','customer_repot.sr_no = recharge_report.customer_id');
      $this->db->join('user','user.user_id = recharge_report.user_id');
      $this->db->order_by('recharge_id','asc');
      $data=$this->db->get();

       return $data->result();
         
  }

       public function selectcustomer(){
        $this->db->select('*');
      $this->db->from('customer_repot');
      $data=$this->db->get();
       return $data->result();
         }

         public function selectuser(){
        $this->db->select('*');
      $this->db->from('user');
      $data=$this->db->get();
       return $data->result();
         }

         public function selectrecharge(){
        $this->db->select('*');
      $this->db->from('recharge_report');
      $data=$this->db->get();
       return $data->result();
         }


         public function recharge_filter($user,$customer,$recharge1){
          $this->db->select('*');
      $this->db->from('recharge_report');
      $this->db->join('customer_repot','customer_repot.sr_no = recharge_report.customer_id');
      $this->db->join('user','user.user_id = recharge_report.user_id');
      
      if ($user) {
       $this->db->where('recharge_report.user_id',$user);
      }
       if ($customer) {
         $this->db->where('recharge_report.customer_id',$customer);
       }
       if ($recharge1) {
         $this->db->where('recharge_report.recharge_amount',$recharge1);
       }
     
      $data=$this->db->get();

       return $data->result();
         }
      }
?>