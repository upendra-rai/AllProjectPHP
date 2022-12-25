<?php

class transaction_model extends CI_Model{

	public function transaction(){
        
        $this->db->select('*');
      $this->db->from('transaction_details');
      $this->db->join('customer_repot','customer_repot.sr_no = transaction_details.customer_id');
      $this->db->join('shift','shift.shift_id = transaction_details.shift_id');
      $this->db->join('user','user.user_id = transaction_details.user_id');
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

         public function selectshift(){
        $this->db->select('*');
      $this->db->from('shift');
      $data=$this->db->get();
       return $data->result();
         }


      public function transaction_filter($shift,$customer,$user){
         $this->db->select('*');
      $this->db->from('transaction_details');
      $this->db->join('customer_repot','customer_repot.sr_no = transaction_details.customer_id');
      $this->db->join('shift','shift.shift_id = transaction_details.shift_id');
      $this->db->join('user','user.user_id = transaction_details.user_id');
      if($shift != ''){
         $this->db->where('transaction_details.shift_id',$shift);
      }
      if($customer != ''){
          $this->db->where('transaction_details.customer_id',$customer);
      }
      if($user != ''){
          $this->db->where('transaction_details.user_id',$user);
      }
      $data=$this->db->get();
      return $data->result();
    }
    public function transaction_report_datewise(){
      $this->db->select('*,SUM(transaction_amount) AS sum_transcation_amount,COUNT(transaction_id) AS count_transaction');
      $this->db->from('transaction_details');
      $this->db->group_by('date(transaction_date)'); 
      $data=$this->db->get();
      
       return $data->result();
    }


    public function transaction_filter1($date){
         $this->db->select('*,SUM(transaction_amount) AS sum_transcation_amount,COUNT(transaction_id) AS count_transaction');
      $this->db->from('transaction_details');

      if ($date) {
       $this->db->where('date(transaction_date)',$date); 
      }
      $this->db->group_by('date(transaction_date)'); 
      $data=$this->db->get();
      return $data->result();
    }
      
      }
?>