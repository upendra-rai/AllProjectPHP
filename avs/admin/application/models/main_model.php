<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main_model extends CI_Model {
  
   
  //name=slider
  public function selectmain()
  {
    
      $this->db->select('*');
      $this->db->from('main');
      $data=$this->db->get();

       return $data->result();
  }


  public function add_main($image_name,$name, $description){

      if($image_name != ''){
      $arr = array(
                'main_image' => $image_name,
                'name' => $name,
                'des' => $description,
       );
 
           //$this->db->set('work_image',$image_name);
           if($this->db->insert('main',$arr)){
                echo 'success';
                redirect(base_url().'/main/main_list');

           }else{
              echo 'failed';
           }
       }else{
         redirect(base_url().'/main/main_list');
       }
  }


  public function delete_data($sr_no){
    echo $sr_no;
    
    $this->db->where('sr_no',$sr_no);
    if($this->db->delete('main')){
        redirect(base_url().'/main/main_list');

           }else{
              echo 'failed';
           }

  }



  public function edit_main($edit_id,$image_name,$name, $description){


           $this->db->where('sr_no',$edit_id);

          $arr = array(
                'main_image' => $image_name,
                'name' => $name,
                'des' => $description,
       );

          if($this->db->update('main',$arr)){

            echo 'success';
            redirect(base_url().'/main/main_list');
          }else{
            echo 'failed';
          }

  }


  public function selected_main($edit_id){


      $this->db->select('*');
      $this->db->where('sr_no',$edit_id);
      $this->db->from('main');
      $data=$this->db->get();

       return $data->result();

  }


}

