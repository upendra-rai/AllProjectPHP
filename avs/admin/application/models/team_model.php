<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class team_model extends CI_Model {
  
   
  
  public function selectteam()
  {
    
      $this->db->select('*');
      $this->db->from('team');
      $data=$this->db->get();

       return $data->result();
  }


  public function add_team($image_name,$name,$post, $description){

      if($image_name != ''){
      $arr = array(
                'team_image' => $image_name,
                'name' => $name,
                'post' => $post,
                'des' => $description,
       );
        print_r($arr);
 
           //$this->db->set('work_image',$image_name);
           if($this->db->insert('team',$arr)){
                echo 'success';
                redirect(base_url().'/team/team_list');

           }else{
              echo 'failed';
           }
       }else{
         redirect(base_url().'/team/team_list');
       }
  }


  public function delete_data($sr_no){
    echo $sr_no;
    
    $this->db->where('sr_no',$sr_no);
    if($this->db->delete('team')){
        redirect(base_url().'/team/team_list');

           }else{
              echo 'failed';
           }

  }



  public function edit_team($edit_id,$image_name,$name,$post, $description){


           $this->db->where('sr_no',$edit_id);

          $arr = array(
                'team_image' => $image_name,
                'name' => $name,
                'post' => $post,
                'des' => $description,
       );


          if($this->db->update('team',$arr)){

            echo 'success';
            redirect(base_url().'/team/team_list');
          }else{
            echo 'failed';
          }

  }


  public function selected_team($edit_id){


      $this->db->select('*');
      $this->db->where('sr_no',$edit_id);
      $this->db->from('team');
      $data=$this->db->get();

       return $data->result();

  }


}

