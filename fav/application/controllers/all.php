<?php
class all extends CI_Controller{
  
 public function index(){
  $data['get'] = $this->all_model->getstudenttable();
  $this->load->view('all_view',$data);
 }
 public function getstudent(){
  $data['get'] = $this->all_model->getstudenttable();
  $this->load->view('all_view',$data);
 }
 public function insertstudent(){
  $this->load->view('add_student');

 }
}
?>