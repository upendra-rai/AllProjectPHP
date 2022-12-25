<?php
class status_model extends CI_Model{

	public function getstatus(){
		$data=$this->db->get('leadsstatus');
		if ($data) {
         	return $data->result();
         }
	}
  public function add_status($name){
  	$arr = array(
                'name' => $name,       
       );         
           if($this->db->insert('leadsstatus',$arr)){
                echo 'success';
                redirect(base_url().'/status/status_details');

           }else{
              echo 'failed';
           };
  }
  public function delete_data($id){
		$this->db->where('id',$id);
    if($this->db->delete('leadsstatus')){
        echo 'success';

           }else{
              echo 'failed';
           }

  }

  public function edit($edit_id,$name){
  	$this->db->where('id',$edit_id);

  	$data = array(
			'name' =>$name,
			
		 );
		          
 			if($this->db->update('leadsstatus',$data)){
 				echo 'success';
          redirect(base_url().'/status/status_details');
          
       }else{
          echo 'failed';

       };


  }
  public function selected_status($edit_id){
  	$this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('leadsstatus');
      $data=$this->db->get();

       return $data->result();

  }
	
}

?>