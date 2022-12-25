<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog_model extends CI_Model {
  
   
	
	public function selectblog()
	{
		
      $this->db->select('*');
      $this->db->from('blog');
      $data=$this->db->get();

       return $data->result();
	}


	public function add_blog($image_name,$my_date, $description){

      if($image_name != ''){
		  $arr = array(
                'blog_image' => $image_name,
                'date' => $my_date,
                'des' => $description,
		   );
 
           //$this->db->set('work_image',$image_name);
           if($this->db->insert('blog',$arr)){
                echo 'success';
                redirect(base_url().'/blog/blog_list');

           }else{
           	  echo 'failed';
           }
       }else{
       	 redirect(base_url().'/blog/blog_list');
       }
	}


	public function delete_data($sr_no){
		echo $sr_no;
		
		$this->db->where('sr_no',$sr_no);
		if($this->db->delete('blog')){
        redirect(base_url().'/blog/blog_list');

           }else{
           	  echo 'failed';
           }

	}



	public function edit_blog($image_name,$edit_id){


           $this->db->where('sr_no',$edit_id);

          $arr = array(
                'blog_image' => $image_name,
		   );

          if($this->db->update('blog',$arr)){

          	echo 'success';
          	redirect(base_url().'/blog/blog_list');
          }else{
          	echo 'failed';
          }

	}


	public function selected_blog($edit_id){


      $this->db->select('*');
      $this->db->where('sr_no',$edit_id);
      $this->db->from('blog');
      $data=$this->db->get();

       return $data->result();

	}


}

