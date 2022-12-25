<?php
class projects_model extends CI_Model{
	public function getprojects(){
		$data=$this->db->get('projects');
		if ($data) {
         	return $data->result();
         }
	}
	public function add($id,$name,$description,$status_id,$customer_id,$invoice_id,$start_date,$deadline,$created,$finished,$pinned,$staff_id){
		$data = array(
			'id' =>$id,
			'name'=>$name,
			'description'=>$description,
			'status_id'=>$status_id,
			'customer_id'=>$customer_id,
			'invoice_id'=>$invoice_id,
			'start_date'=>$start_date,
			'deadline'=>$deadline,
			'created'=>$created,
			'finished'=>$finished,
			'pinned'=>$pinned,
			'staff_id'=>$staff_id,
		 );
		//echo $productname.$description.$purchase_price.$sale_price.$stock.$vat.$status_id;
 			if($this->db->insert('projects',$data)){
 				echo 'success';
          redirect(base_url().'/projects/projects_details');
          
       }else{
          echo 'failed';

       };
	}

	public function delete_data($id){
		$this->db->where('id',$id);
    if($this->db->delete('projects')){
        echo 'success';

           }else{
              echo 'failed';
           }

  }
  public function edit($edit_id,$id,$name,$description,$status_id,$customer_id,$invoice_id,$start_date,$deadline,$created,$finished,$pinned,$staff_id){
  	$this->db->where('id',$edit_id);

  	$data = array(
			'id' =>$id,
			'name'=>$name,
			'description'=>$description,
			'status_id'=>$status_id,
			'customer_id'=>$customer_id,
			'invoice_id'=>$invoice_id,
			'start_date'=>$start_date,
			'deadline'=>$deadline,
			'created'=>$created,
			'finished'=>$finished,
			'pinned'=>$pinned,
			'staff_id'=>$staff_id,
		 );
		echo $id.$name.$description.$status_id.$customer_id.$invoice_id.$start_date.$deadline.$created.$finished.$pinned.$staff_id;
 			if($this->db->update('projects',$data)){
 				echo 'success';
          redirect(base_url().'/projects/projects_details');
       }else{
          echo 'failed';
       };
  }
  public function selected_project($edit_id){
      $this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('projects');
      $data=$this->db->get();

       return $data->result();

  }

	
}

?>