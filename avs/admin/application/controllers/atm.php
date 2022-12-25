<?php  
  class atm extends CI_Controller{

  	public function atm_details(){
      if ($this->input->post('submit')) {
         $sub=$this->input->post('submit');
          $atm = $this->input->post('atm_no');
           $card_status = $this->input->post('cardstatus');
            $data['return_atm_no']=$atm;
             $data['return_cardstatus']=$card_status;
           $data['list']= $this->atm_model->filter_atm($atm,$card_status);
           $data['atm_list']=$this->atm_model->selectatm();
            $data['card_list']=$this->atm_model->selectcard();
           $this->load->view('atm_details',$data);
        // print_r($data);
       
      }else{
    
   $data['list']=$this->atm_model->atm1();
   $data['card_list']=$this->atm_model->selectcard();
   $data['atm_list']=$this->atm_model->selectatm();
   $this->load->view('atm_details',$data);



   
 }
  }

}
?>

