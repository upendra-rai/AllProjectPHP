<?php
class customer_model extends CI_Model{

	public  function get1(){
		$data=$this->db->get('customers');
		if ($data) {
         	return $data->result();
         }
	}
	public function add($id,$type,$created,$staff_id,$company,$namesurname,$taxoffice,$taxnumber,$executive,$address,$zipcode,$country_id,$state,$city,$town,$phone,$email,$web){

//`id`, `type`, `created`, `staff_id`, `company`, `namesurname`, `taxoffice`, `taxnumber`, `ssn`, `executive`, `address`, `zipcode`, `country_id`, `state`, `city`, `town`, `phone`, `fax`, `email`, `web`, `risk`, `status_i
		$data = array(
			'id' =>$id,
			'type'=>$type,
			'created'=>$created,
			'staff_id'=>$staff_id,
			'company'=>$company,
			'namesurname'=>$namesurname,
			'taxoffice'=>$taxoffice,
			'taxnumber'=>$taxnumber,
			'executive'=>$executive,
			'address'=>$address,
			'zipcode'=>$zipcode,
			'country_id'=>$country_id,
			'state'=>$state,
			'city'=>$city,
			'town'=>$town,
			'phone'=>$phone,
			'email'=>$email,
			'web'=>$web
		 );
		//echo $id.$type.$created.$staff_id.$company.$namesurname.$taxoffice.$taxnumber.$executive.$address.$zipcode.$country_id.$state.$city.$town.$phone.$email.$web;
 			if($this->db->insert('customers',$data)){
 				echo 'success';
          redirect(base_url().'/customers/customers_detail');
          
       }else{
          echo 'Already Exist';

       };
	}
	public function delete_data($id){
		$this->db->where('id',$id);
    if($this->db->delete('customers')){
        echo 'success';

           }else{
              echo 'failed';
           }
  }
  public function edit($edit_id,$id,$type,$created,$staff_id,$company,$namesurname,$taxoffice,$taxnumber,$executive,$address,$zipcode,$country_id,$state,$city,$town,$phone,$email,$web){
  	$this->db->where('id',$edit_id);

  	$data = array(
			'id' =>$id,
			'type'=>$type,
			'created'=>$created,
			'staff_id'=>$staff_id,
			'company'=>$company,
			'namesurname'=>$namesurname,
			'taxoffice'=>$taxoffice,
			'taxnumber'=>$taxnumber,
			'executive'=>$executive,
			'address'=>$address,
			'zipcode'=>$zipcode,
			'country_id'=>$country_id,
			'state'=>$state,
			'city'=>$city,
			'town'=>$town,
			'phone'=>$phone,
			'email'=>$email,
			'web'=>$web

		 );
		//echo $id.$name.$description.$status_id.$customer_id.$invoice_id.$start_date.$deadline.$created.$finished.$pinned.$staff_id;
 			if($this->db->update('customers',$data)){
 				echo 'success';
          redirect(base_url().'/customers/customers_detail');
       }else{
          echo 'failed';
       };
  }
  public function selected_customer($edit_id){
      $this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('customers');
      $data=$this->db->get();

       return $data->result();

  }
  
  

  
	
}

?>