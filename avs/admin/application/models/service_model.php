<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class service_model extends CI_Model {
  
   
  
  public function selectservice()
  {
    
      $this->db->select('*');
      $this->db->from('service');
      $data=$this->db->get();

       return $data->result();
  }


  public function add_service($name, $description){
      
      $arr = array(
                
                'name' => $name,
                'des' => $description,
       );
 
           
           if($this->db->insert('service',$arr)){
                echo 'success';
                redirect(base_url().'/service/service_list');

           }else{
              echo 'failed';
           };
       }
  


  public function delete_data($sr_no){
    echo $sr_no;
    
    $this->db->where('sr_no',$sr_no);
    if($this->db->delete('service')){
        redirect(base_url().'/service/service_list');

           }else{
              echo 'failed';
           }

  }



  public function edit_service($edit_id,$name, $description){


           $this->db->where('sr_no',$edit_id);

          $arr = array(
               
                'name' => $name,
                
                'des' => $description,
       );

          if($this->db->update('service',$arr)){

            echo 'success';
            redirect(base_url().'/service/service_list');
          }else{
            echo 'failed';
          }

  }


  public function selected_service($edit_id){


      $this->db->select('*');
      $this->db->where('sr_no',$edit_id);
      $this->db->from('service');
      $data=$this->db->get();

       return $data->result();

  }


}

