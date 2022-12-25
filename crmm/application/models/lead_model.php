<?php
class lead_model extends CI_Model{
	public function getlead(){
		$data=$this->db->get('leads');
		if ($data) {
         	return $data->result();
         }
	}
	public function add($id,$type,$product_id,$name,$title,$company,$description,$country_id,$zip,$city,$state,$email,$address,$website,$phone,$assigned_id,$created,$status,$source,$lastcontact,$dateassigned,$staff_id,$dateconverted,$lost,$junk,$public){

		//id`, `type`, `product_id`, `name`, `title`, `company`, `description`, `country_id`, `zip`, `city`, `state`, `email`, `address`, `website`, `phone`, `assigned_id`, `created`, `status`, `source`, `lastcontact`, `dateassigned`, `staff_id`, `dateconverted`, `lost`, `junk`, `public`
		$data = array(
			'id' =>$id,
			'type'=>$type,
			'product_id'=>$product_id,
			'name'=>$name,
			'title'=>$title,
			'company'=>$company,
			'description'=>$description,
			'country_id'=>$country_id,
			'zip'=>$zip,
			'city'=>$city,
			'state'=>$state,
			'email'=>$email,
			'address'=>$address,
			'website'=>$website,
			'phone'=>$phone,
			'assigned_id'=>$assigned_id,
			'created'=>$created,
			'status'=>$status,
			'source'=>$source,
			'lastcontact'=>$lastcontact,
			'dateassigned'=>$dateassigned,
			'staff_id'=>$staff_id,
			'dateconverted'=>$dateconverted,
			'lost'=>$lost,
			'junk'=>$junk,
			'public'=>$public

		 );
		//echo $id.$type.$product_id.$name.$title.$company.$description.$country_id.$zip.$city.$state.$email.$address.$website.$phone.$assigned_id.$created.$status.$source.$lastcontact.$dateassigned.$staff_id.$dateconverted.$lost.$junk.$public;
 			if($this->db->insert('leads',$data)){
 				echo 'success';
          redirect(base_url().'/lead/lead_details');
          
       }else{
          echo 'failed';

       };
	}

	public function delete_data($id){
		$this->db->where('id',$id);
    if($this->db->delete('leads')){
        echo 'success';

           }else{
              echo 'failed';
           }

  }
  public function edit($edit_id,$id,$type,$product_id,$name,$title,$company,$description,$country_id,$zip,$city,$state,$email,$address,$website,$phone,$assigned_id,$created,$status,$source,$lastcontact,$dateassigned,$staff_id,$dateconverted,$lost,$junk,$public){
  	$this->db->where('id',$edit_id);

  	$data = array(
			'id' =>$id,
			'type'=>$type,
			'product_id'=>$product_id,
			'name'=>$name,
			'title'=>$title,
			'company'=>$company,
			'description'=>$description,
			'country_id'=>$country_id,
			'zip'=>$zip,
			'city'=>$city,
			'state'=>$state,
			'email'=>$email,
			'address'=>$address,
			'website'=>$website,
			'phone'=>$phone,
			'assigned_id'=>$assigned_id,
			'created'=>$created,
			'status'=>$status,
			'source'=>$source,
			'lastcontact'=>$lastcontact,
			'dateassigned'=>$dateassigned,
			'staff_id'=>$staff_id,
			'dateconverted'=>$dateconverted,
			'lost'=>$lost,
			'junk'=>$junk,
			'public'=>$public

		 );
		//echo $id.$name.$description.$status_id.$customer_id.$invoice_id.$start_date.$deadline.$created.$finished.$pinned.$staff_id;
 			if($this->db->update('leads',$data)){
 				echo 'success';
          redirect(base_url().'/lead/lead_details');
       }else{
          echo 'failed';
       };
  }
  public function selected_lead($edit_id){
      $this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('leads');
      $data=$this->db->get();

       return $data->result();

  }

	
}

?>