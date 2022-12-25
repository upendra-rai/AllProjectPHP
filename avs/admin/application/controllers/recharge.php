<?php  
  class recharge extends CI_Controller{
  


    public function recharge(){
    if ($this->input->post('submit')) {
      $sub=$this->input->post('submit');
       $user = $this->input->post('username');
       $customer= $this->input->post('customer_name');
       $recharge1= $this->input->post('recharge_amount');
       //echo $recharge1;
       $data['return_user']=$user;
       $data['return_customer']=$customer;
       $data['return_recharge']=$recharge1;
        $data["list"]=$this->recharge_model->recharge_filter($user,$customer,$recharge1);
        $data['customer_list']=$this->recharge_model->selectcustomer();
         $data['user_list']=$this->recharge_model->selectuser();
          $data['recharge_list']=$this->recharge_model->selectrecharge();
      // echo $sub;
      // print_r($data);
    $this->load->view('recharge_details',$data);
      
    }else{
   $data['list']=$this->recharge_model->recharge();
  $data['customer_list']=$this->recharge_model->selectcustomer();
  $data['user_list']=$this->recharge_model->selectuser();
  $data['recharge_list']=$this->recharge_model->selectrecharge();
  
  //print_r($data);
   $this->load->view('recharge_details',$data);
  }
}
  
 


 } 
  
?>

