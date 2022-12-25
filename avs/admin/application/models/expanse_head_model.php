<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class expanse_head_model extends CI_Model {
  public function get_list(){
  	    $this->db->select('*');
		$this->db->from('expanse_head');
		$data=$this->db->get();
		return $data->result(); 	
	}


  public function add($expanse_head_name){

       $arr = array(
             'expanse_head_name' => $expanse_head_name,
       );

       if($this->db->insert('expanse_head',$arr)){

            redirect(base_url().'expanse_head/add');
            echo 'success';
       }else{

           echo 'failed';
       }

  }

  public function edit($expanse_head_name,$expanse_head_id){
    
     $arr = array(
             'expanse_head_name' => $expanse_head_name,
       );
       
       $this->db->where('expanse_head_id',$expanse_head_id);
       if($this->db->update('expanse_head',$arr)){

            redirect(base_url().'expanse_head/add');
            echo 'success';
       }else{

           echo 'failed';
       }



  }

  public function selected($expanse_head_id){
        $this->db->select('*');
        $this->db->from('expanse_head');
        $this->db->where('expanse_head_id',$expanse_head_id);
        $data=$this->db->get();
        return $data->result();

  }



	public function delete_data($expanse_head_id){
 		 //echo $id;
 		  $this->db->where('expanse_head_id',$expanse_head_id);
 		  if($this->db->delete('expanse_head')){
 		  	redirect(base_url().'expanse_head/add');
 		  }
 		  else{
 		  	echo "failed";
 		  }

		}
}
?>