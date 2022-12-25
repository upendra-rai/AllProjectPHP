<?php
class source_model extends CI_Model{
	public function getsource(){
		$data=$this->db->get('leadssources');
		if ($data) {
         	return $data->result();
         }
	}
  public function add_source($name,$image){
  	$arr = array(
                'name' => $name, 
               'source_image' => $image, 
       );         
           if($this->db->insert('leadssources',$arr)){
                echo 'success';
                redirect(base_url().'/source/source_details');

           }else{
              echo 'failed';
           };
  }
  public function delete_data($id){
		$this->db->where('id',$id);
    if($this->db->delete('leadssources')){
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
		          
 			if($this->db->update('leadssources',$data)){
 				echo 'success';
          redirect(base_url().'/source/source_details');
          
       }else{
          echo 'failed';

       };


  }
  public function selected_source($edit_id){
  	$this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('leadssources');
      $data=$this->db->get();

       return $data->result();

  }
	
}

?>