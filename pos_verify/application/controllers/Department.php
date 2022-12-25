<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class department extends CI_Controller {
  function __construct(){
    parent::__construct();
    if($this->session->userdata('logged_in') != 'verifysoft_pos'){
      redirect('./dashboard');
    }
  }

  
  public function department_details(){
    $this->load->model('model_department');
    $data['department_details'] = $this->model_department->getdepartment();
    $this->load->view('/HRM/department_list',$data);
  }

  public function add_department(){
    if($this->input->post('submit')){
       $name=$this->input->post('name');
       $this->load->model('model_department');
        $this->model_department->add_department($name);
    }else{  
      $this->load->view('/HRM/add_department');    
  }  
  }

  public function delete_department(){  
    if(isset($_POST['vdelv'])){
      $del_id = $_POST['vdelv'];
      $this->load->model('model_department');
      $this->model_department->delete_data($del_id);
    }
    //echo $id;
   // 
  }

  public function edit_department(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
        $name=$this->input->post('name');
       $this->load->model('model_department');
        $this->model_department->edit_department($edit_id,$name);
    }else{
     // echo $edit_id;
      $this->load->model('model_department');
      $data['selected_list'] = $this->model_department->selected_department($edit_id);
      $this->load->view('/HRM/edit_department',$data);
    }   
  }
    //**************************************Holidays**************************************************************************************************************************************************************
   public function holiday_details(){
    $this->load->model('model_department');
    $data['holiday_details'] = $this->model_department->getholiday();
    $this->load->view('/HRM/holiday_list',$data);
  }


   public function add_holiday(){
    if($this->input->post('submit')){
       $user_id=$this->input->post('user_id');
        $from_date=$this->input->post('from_date');
         $to_date=$this->input->post('to_date');
         $note=$this->input->post('note');
       $this->load->model('model_department');
        $this->model_department->add_holiday($user_id,$from_date,$to_date,$note);
 
    }else{ 
     $this->load->model('model_department');
       $data["holidays_list"] = $this->model_department->select_holiday();
      $this->load->view('/HRM/add_holiday',$data);    
  }  
  }

  public function edit_holiday(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
       $user_id=$this->input->post('user_id');
        $from_date=$this->input->post('from_date');
         $to_date=$this->input->post('to_date');
         $note=$this->input->post('note');
       $this->load->model('model_department');
        $this->model_department->edit_holiday($edit_id,$user_id,$from_date,$to_date,$note);
    }else{
     // echo $edit_id;
      $this->load->model('model_department');
       $data["holidays_list1"] = $this->model_department->select_holiday1();
      $data['selected_list'] = $this->model_department->selected_holiday($edit_id);
      $this->load->view('/HRM/edit_holiday',$data);
    }   
  }

  public function delete_holiday(){  
    if(isset($_POST['vdelv'])){

      $del_id = $_POST['vdelv'];
      $this->load->model('model_department');
      $this->model_department->delete_holiday($del_id);
    } 
  }
 
//***************************************Employee Details***********************************************************************************************************************************************************
    public function employee_details(){
    $this->load->model('model_department');
    $data['employee_list'] = $this->model_department->getEmployee();
    $this->load->view('/HRM/Employee/employee_list',$data);
  }


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
       $this->load->model('model_department');
        $this->model_department->add_employee($name,$email,$phone_number,$department_id,$address,$img_name);
 
    }else{
      $this->load->model('model_department');
       $data["department_list"] = $this->model_department->select_department();
      $this->load->view('/HRM/Employee/add_employee',$data);    
  }  
  }

  public function delete_employee(){  
    if(isset($_POST['del_id'])){

      $del_id = $_POST['del_id'];
      $this->load->model('model_department');
      $this->model_department->delete_employee($del_id);
    }
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

       $this->load->model('model_department');
        $this->model_department->edit_employee($edit_id,$name,$email,$phone_number,$department_id,$address,$img_name);
    }else{
     // echo $edit_id;
      $this->load->model('model_department');
      $data['department_list']=$this->model_department->select_dep();

       //print_r($data);
      $data['employee_selected'] = $this->model_department->selected_employee($edit_id);
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
  //****************************************Attendence Details****************************************************************************************************************************************************
public function attendence_details(){
    $this->load->model('model_department');
    $data['attendence_details'] = $this->model_department->getattendence();
    $this->load->view('/HRM/Attendence/attendence_list',$data);
  }

public function add_attendence(){
    if($this->input->post('submit')){
       $employee_id=$this->input->post('employee_id');
       $date=$this->input->post('date');
       $checkin=$this->input->post('checkin');
       $checkout=$this->input->post('checkout');
       $note=$this->input->post('note');
      

       $this->load->model('model_department');
        $this->model_department->add_attendence($employee_id,$date,$checkin,$checkout,$note);
    }else{
          $this->load->model('model_department');
       $data["employee1_list"] = $this->model_department->select_employee1();
      $this->load->view('/HRM/Attendence/add_attendence',$data);    
  }  
  }

public function delete_attendence(){  
    if(isset($_POST['vdelv'])){

      $del_id = $_POST['vdelv'];
      $this->load->model('model_department');
      $this->model_department->delete_attendence($del_id);
    }
    //echo $id;
   // 
  }

public function edit_attendence(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
       $employee_id=$this->input->post('employee_id');
       $date=$this->input->post('date');
       $checkin=$this->input->post('checkin');
       $checkout=$this->input->post('checkout');
       $note=$this->input->post('note');

       $this->load->model('model_department');
        $this->model_department->edit_attendence($edit_id,$employee_id,$date,$checkin,$checkout,$note);
    }else{
     // echo $edit_id;
      $this->load->model('model_department');
      $data['employee_lists'] = $this->model_department->selectedd_employee();
      $data['selected_list'] = $this->model_department->selected_attendence($edit_id);
      $this->load->view('/HRM/Attendence/edit_attendence',$data);
    }   
  }
    
//***************************************Payroll Details****************************************************************************************************************************************************

public function payroll_details(){
    $this->load->model('model_department');
    $data['payroll_details'] = $this->model_department->getpayrolls();
    $this->load->view('/HRM/Payroll/payroll_list',$data);
  }

public function add_payroll(){
    if($this->input->post('submit')){
       $employee_id=$this->input->post('employee_id');
       $account_id=$this->input->post('account_id');
       $amount=$this->input->post('amount');
       $paying_method=$this->input->post('paying_method');
       $note=$this->input->post('note');
       

       $this->load->model('model_department');
        $this->model_department->add_payroll($employee_id,$account_id,$amount,$paying_method,$note);
 
    }else{
      $this->load->model('model_department');
       $data["employee_list2"] = $this->model_department->select_employee11();
      $this->load->view('/HRM/Payroll/add_payroll',$data);    
  }  
  }

public function delete_payroll(){  
    if(isset($_POST['vdelv'])){

      $del_id = $_POST['vdelv'];
      $this->load->model('model_department');
      $this->model_department->delete_payroll($del_id);
    }
    //echo $id;
   // 
  }

public function edit_payroll(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
         $employee_id=$this->input->post('employee_id');
       $account_id=$this->input->post('account_id');
       $amount=$this->input->post('amount');
       $paying_method=$this->input->post('paying_method');
       $note=$this->input->post('note');
       

       $this->load->model('model_department');
        $this->model_department->edit_payroll($edit_id,$employee_id,$account_id,$amount,$paying_method,$note);
    }else{
     // echo $edit_id;
      $this->load->model('model_department');
      $data['employee_lists11'] = $this->model_department->selected_employe11();
      $data['selected_list11'] = $this->model_department->selected_payroll11($edit_id);
      $this->load->view('/HRM/Payroll/edit_payroll',$data);
    }   
  }
}
