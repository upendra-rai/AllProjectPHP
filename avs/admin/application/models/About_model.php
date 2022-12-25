<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class about_model extends CI_Model {
  
   
  
  public function selectabout()
  {
    
      $this->db->select('*');
      $this->db->from('about');
      $data=$this->db->get();

       return $data->result();
  }


  public function add_about($image_name,$about, $description){

      if($image_name != ''){
      $arr = array(
                'about_image' => $image_name,
                'about' => $about,
                'des' => $description,
       );
 
           //$this->db->set('work_image',$image_name);
           if($this->db->insert('about',$arr)){
                echo 'success';
                redirect(base_url().'/about/about_list');

           }else{
              echo 'failed';
           }
       }else{
         redirect(base_url().'/about/about_list');
       }
  }


  public function delete_data($sr_no){
    echo $sr_no;
    
    $this->db->where('sr_no',$sr_no);
    if($this->db->delete('about')){
        redirect(base_url().'/about/about_list');

           }else{
              echo 'failed';
           }

  }



  public function edit_about($edit_id,$image_name,$about, $description){


           $this->db->where('sr_no',$edit_id);

          $arr = array(
                'about_image' => $image_name,
                'about' => $about,
                'des' => $description,
       );

          if($this->db->update('about',$arr)){

            echo 'success';
            redirect(base_url().'/about/about_list');
          }else{
            echo 'failed';
          }

  }


  public function selected_about($edit_id){


      $this->db->select('*');
      $this->db->where('sr_no',$edit_id);
      $this->db->from('about');
      $data=$this->db->get();

       return $data->result();

  }


}

