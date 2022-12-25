<?php

class customer_model extends CI_Model{

	public function selectcustomer(){
        
        $this->db->select('*');
      $this->db->from('customer_repot');
      $data=$this->db->get();

       return $data->result();
         }

        public function search_bar($name,$mobile_no,$colony){
        $this->db->select('*');
        $this->db->from('customer_repot');

        if($name){
              $this->db->like('customer_name',$name);

        }

        if($mobile_no){
             $this->db->where('mobile_no',$mobile_no);
        }
        
        if($colony){

             $this->db->like('colony',$colony);
        }
       
        $data=$this->db->get();
        return $data->result();

       }
       
	}



?>