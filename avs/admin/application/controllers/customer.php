<?php  
  class customer extends CI_Controller{

  	public function customer_report(){

            if($this->input->post('submit')){
                $name=$this->input->post("search_bar");
                $mobile_no=$this->input->post("search_bar1");
                $colony=$this->input->post("search_bar2");


               $data["list"]=$this->customer_model->search_bar($name,$mobile_no,$colony);
               $data['return_name'] =  $name;
               $data['return_mobile'] =  $mobile_no;
               $data['return_colony'] =  $colony;

               $this->load->view('customer_report',$data);

            }else{
                $data['list']=$this->customer_model->selectcustomer();
                $this->load->view('customer_report',$data);
            }
  }

      
  }
?>
