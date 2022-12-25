<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class portfolio_model extends CI_Model {
  
   
	
	public function selectwork()
	{
		
      $this->db->select('*');
      $this->db->from('work');
      $data=$this->db->get();

       return $data->result();
	}


	public function add_work($image_name){

      if($image_name != ''){
		  $arr = array(
                'work_image' => $image_name,
		   );
 
           //$this->db->set('work_image',$image_name);
           if($this->db->insert('work',$arr)){
                echo 'success';
                redirect(base_url().'/portfolio/portfolio_list');

           }else{
           	  echo 'failed';
           }
       }else{
       	 redirect(base_url().'/portfolio/portfolio_list');
       }
	}


	public function delete_data($sr_no){
		echo $sr_no;
		
		$this->db->where('sr_no',$sr_no);
		if($this->db->delete('work')){
        redirect(base_url().'/portfolio/portfolio_list');

           }else{
           	  echo 'failed';
           }

	}



	public function edit_work($image_name,$edit_id){


           $this->db->where('sr_no',$edit_id);

          $arr = array(
                'work_image' => $image_name,
		   );

          if($this->db->update('work',$arr)){

          	echo 'success';
          	redirect(base_url().'/portfolio/portfolio_list');
          }else{
          	echo 'failed';
          }

	}


	public function selected_work($edit_id){


      $this->db->select('*');
      $this->db->where('sr_no',$edit_id);
      $this->db->from('work');
      $data=$this->db->get();

       return $data->result();

	}


}

