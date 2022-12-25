<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class employee extends CI_Controller {

	
  public function employee_details(){
    $this->load->model('model_employee');
		$data['employee_list'] = $this->model_employee->get();
		$this->load->view('/HRM/Employee/employee_list',$data);
	}


//id`, `name`, `email`, `phone_number`, `department_id`, `user_id`, `image`, `address`, `city`, `country`, `is_active`, `created_at`, `updated_at`

  	  public function add_employee(){
 		if($this->input->post('submit')){
  	   $name=$this->input->post('name');
       $email=$this->input->post('email');
       $phone_number=$this->input->post('phone_number');
       $department_id=$this->input->post('department_id');
       $address=$this->input->post('address');
      $img_name = $this->input->post('image_name');
       if(!$img_name){
         $img_name = '';
       }

       //echo $name,$email,$img_name;
       $this->load->model('model_employee');
        $this->model_employee->add_employee($name,$email,$phone_number,$address,$img_name);
 
    }else{
      $this->load->view('/HRM/Employee/add_employee');    
  }  
 	}
 	public function delete_employee(){  
    if(isset($_POST['del_id'])){

      $del_id = $_POST['del_id'];
      $this->load->model('model_employee');
      $this->model_employee->delete_employee($del_id);
    }
    //echo $id;
   // 
  }
  public function edit_employee(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
  	    $name=$this->input->post('name');
       $email=$this->input->post('email');
       $phone_number=$this->input->post('phone_number');
       $department_id=$this->input->post('department_id');
       $address=$this->input->post('address');
       $img_name = $this->input->post('image_name');

       $this->load->model('model_employee');
        $this->model_employee->edit_employee($edit_id,$name,$email,$phone_number,$address,$img_name);
    }else{
     // echo $edit_id;
      $this->load->model('model_employee');
      $data['employee_selected'] = $this->model_employee->selected_employee($edit_id);
      $this->load->view('/HRM/Employee/add_employee',$data);
    }   
  }

  public function upload_image(){

    if($_FILES["file"]["name"] != "")
      {
     $img_folder_name = $_POST['img_folder_name'];
     $test = explode(".", $_FILES["file"]["name"]);
     $extension = end($test);
     $name = rand(100,99999).strtotime(date('Y-m-d H:i:s')).bin2hex(openssl_random_pseudo_bytes(4)).'.'.$extension;
     $location = 'upload/'.$img_folder_name.'/'.$name;
     move_uploaded_file($_FILES["file"]["tmp_name"], $location);
     echo '<img src="'.base_url().$location.'" data-img_name="'.$name.'" alt="User" style="width:100% ; height:100%;"/><input type="hidden" name="image_name" value="'.$name.'" /><button type="button" class="btn" id="inlink_img_bt" data-unlink_img_src="'.$location.'" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>';

      }
  }
  	
  
}
