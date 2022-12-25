<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class testimonial_model extends CI_Model {
  
   
  
  public function selecttestimonial()
  {
    
      $this->db->select('*');
      $this->db->from('testimonial');
      $data=$this->db->get();

       return $data->result();
  }


  public function add_testimonial($image_name,$name,$post, $description){

      if($image_name != ''){
      $arr = array(
                'testimonial_image' => $image_name,
                'name' => $name,
                'post' => $post,
                'des' => $description,
       );
 
           //$this->db->set('work_image',$image_name);
           if($this->db->insert('testimonial',$arr)){
                echo 'success';
                redirect(base_url().'/testimonial/testimonial_list');

           }else{
              echo 'failed';
           }
       }else{
         redirect(base_url().'/testimonial/testimonial_list');
       }
  }


  public function delete_data($sr_no){
    echo $sr_no;
    
    $this->db->where('sr_no',$sr_no);
    if($this->db->delete('testimonial')){
        redirect(base_url().'/testimonial/testimonial_list');

           }else{
              echo 'failed';
           }

  }



  public function edit_testimonial($edit_id,$image_name,$name,$post, $description){


           $this->db->where('sr_no',$edit_id);

          $arr = array(
                'testimonial_image' => $image_name,
                'name' => $name,
                'post' => $post,
                'des' => $description,
       );

          if($this->db->update('testimonial',$arr)){

            echo 'success';
            redirect(base_url().'/testimonial/testimonial_list');
          }else{
            echo 'failed';
          }

  }


  public function selected_testimonial($edit_id){


      $this->db->select('*');
      $this->db->where('sr_no',$edit_id);
      $this->db->from('testimonial');
      $data=$this->db->get();

       return $data->result();

  }


}

