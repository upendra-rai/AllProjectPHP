<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class future_model extends CI_Model {
  
   
  
  public function selectfuture()
  {
    
      $this->db->select('*');
      $this->db->from('future');
      $data=$this->db->get();

       return $data->result();
  }


  public function add_future($image_name,$name, $description){

      if($image_name != ''){
      $arr = array(
                'future_image' => $image_name,
                'name' => $name,
                'des' => $description,
       );
 
           //$this->db->set('work_image',$image_name);
           if($this->db->insert('future',$arr)){
                echo 'success';
                redirect(base_url().'/future/future_list');

           }else{
              echo 'failed';
           }
       }else{
         redirect(base_url().'/future/future_list');
       }
  }


  public function delete_data($sr_no){
    echo $sr_no;
    
    $this->db->where('sr_no',$sr_no);
    if($this->db->delete('future')){
        redirect(base_url().'/future/future_list');

           }else{
              echo 'failed';
           }

  }



  public function edit_future($edit_id,$image_name,$name, $description){


           $this->db->where('sr_no',$edit_id);

          $arr = array(
                'future_image' => $image_name,
                'name' => $name,
                'des' => $description,
       );

          if($this->db->update('future',$arr)){

            echo 'success';
            redirect(base_url().'/future/future_list');
          }else{
            echo 'failed';
          }

  }


  public function selected_future($edit_id){


      $this->db->select('*');
      $this->db->where('sr_no',$edit_id);
      $this->db->from('future');
      $data=$this->db->get();

       return $data->result();

  }


}

