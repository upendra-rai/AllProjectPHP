<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class lead extends CI_Controller {

	public function lead_details()
  {
  	$data['lead_details'] = $this->lead_model->getlead();
 		$this->load->view('lead_view',$data);
		//$this->load->view('leads_view');
  }
  public function add(){
//id`, `type`, `product_id`, `name`, `title`, `company`, `description`, `country_id`, `zip`, `city`, `state`, `email`, `address`, `website`, `phone`, `assigned_id`, `created`, `status`, `source`, `lastcontact`, `dateassigned`, `staff_id`, `dateconverted`, `lost`, `junk`, `public`


 		if($this->input->post('submit')){
  	$id=$this->input->post('id');
      $type=$this->input->post('type');
      $product_id=$this->input->post('product_id');
       $name=$this->input->post('name');
       $title=$this->input->post('title');
       $company=$this->input->post('company');
       $description=$this->input->post('description');
       $country_id=$this->input->post('country_id');
       $zip=$this->input->post('zip');
       $city=$this->input->post('city');
       $state=$this->input->post('state');
       $email=$this->input->post('email');
       $address=$this->input->post('address');
       $website=$this->input->post('website');
       $phone=$this->input->post('phone');
       $assigned_id=$this->input->post('assigned_id');
       $created=$this->input->post('created');
       $status=$this->input->post('status');
       $source=$this->input->post('source');
       $lastcontact=$this->input->post('lastcontact');
       $dateassigned=$this->input->post('dateassigned');
       $staff_id=$this->input->post('staff_id');
       $dateconverted=$this->input->post('dateconverted');
       $lost=$this->input->post('lost');
       $junk=$this->input->post('junk');
       $public=$this->input->post('public');

      // echo $id.$type.$product_id.$name.$title.$company.$description.$country_id.$zip.$city.$state.$email.$address.$website.$phone.$assigned_id.$created.$status.$source.$lastcontact.$dateassigned.$staff_id.$dateconverted.$lost.$junk.$public;

        $this->lead_model->add($id,$type,$product_id,$name,$title,$company,$description,$country_id,$zip,$city,$state,$email,$address,$website,$phone,$assigned_id,$created,$status,$source,$lastcontact,$dateassigned,$staff_id,$dateconverted,$lost,$junk,$public);
    }else{
    	$this->load->view('add_lead');
    }  
 	}
  public function delete_lead(){  
    if(isset($_POST['vv'])){

      $del_id = $_POST['vv'];
      $this->lead_model->delete_data($del_id);
    }
    //echo $sr_no;
   // 
  }

    public function edit(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
  	$id=$this->input->post('id');
      $type=$this->input->post('type');
      $product_id=$this->input->post('product_id');
       $name=$this->input->post('name');
       $title=$this->input->post('title');
       $company=$this->input->post('company');
       $description=$this->input->post('description');
       $country_id=$this->input->post('country_id');
       $zip=$this->input->post('zip');
       $city=$this->input->post('city');
       $state=$this->input->post('state');
       $email=$this->input->post('email');
       $address=$this->input->post('address');
       $website=$this->input->post('website');
       $phone=$this->input->post('phone');
       $assigned_id=$this->input->post('assigned_id');
       $created=$this->input->post('created');
       $status=$this->input->post('status');
       $source=$this->input->post('source');
       $lastcontact=$this->input->post('lastcontact');
       $dateassigned=$this->input->post('dateassigned');
       $staff_id=$this->input->post('staff_id');
       $dateconverted=$this->input->post('dateconverted');
       $lost=$this->input->post('lost');
       $junk=$this->input->post('junk');
       $public=$this->input->post('public');
       // echo $id.$name.$description.$status_id.$customer_id.$invoice_id;

        $this->lead_model->edit($edit_id,$id,$type,$product_id,$name,$title,$company,$description,$country_id,$zip,$city,$state,$email,$address,$website,$phone,$assigned_id,$created,$status,$source,$lastcontact,$dateassigned,$staff_id,$dateconverted,$lost,$junk,$public);
    }else{
     // echo $edit_id;
      $data['selected_list'] = $this->lead_model->selected_lead($edit_id);
      $this->load->view('edit_lead',$data);
    }   
  }
}
