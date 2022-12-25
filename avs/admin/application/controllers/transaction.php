<?php  
  class transaction extends CI_Controller{

  	public function transaction_report(){
    if ($this->input->post('submit')) {
      $sub=$this->input->post('submit');
       $shift = $this->input->post('shift');
       $customer= $this->input->post('customer_name');
       $user    = $this->input->post('user');
       $data['return_shift']=$shift;
        $data['return_customer']=$customer;
        $data['return_user']=$user;


        $data["list"]=$this->transaction_model->transaction_filter($shift,$customer,$user);
         $data['customer_list']=$this->transaction_model->selectcustomer();
          $data['user_list']=$this->transaction_model->selectuser();
           $data['user_shift']=$this->transaction_model->selectshift();
        $this->load->view('transaction_details',$data);
      
    }else{
   $data['list']=$this->transaction_model->transaction();
   $data['customer_list']=$this->transaction_model->selectcustomer();
   $data['user_list']=$this->transaction_model->selectuser();
  
  //print_r($data);
   $this->load->view('transaction_details',$data);
  }
}












  public function transaction_report_datewise(){
    if ($this->input->post('submit')) {
       $date = $this->input->post('mydate');
        $data["list"]=$this->transaction_model->transaction_filter1($date);
       // echo $date;
        $this->load->view('transaction_details_datewise',$data);
    }else{
   $data['list']=$this->transaction_model->transaction_report_datewise();
   
  
  //print_r($data);
  $this->load->view('transaction_details_datewise',$data);
  }
}
  
  }
?>

