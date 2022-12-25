<?php
class setting extends CI_Controller{
	function __construct(){

		parent::__construct();
            
		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_setting');
         if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			        redirect('./admin/login');
	      	}
	}
	
	public function smsaccount(){
        $data['active_menu'] = "setting";
        $data['active_submenu'] = "smsaccount";
    $data['sms_details'] = $this->model_setting->countsms();
    $this->load->view('/Setting/sms_account_view',$data);
	}


	public function payment_setting(){
        $data['active_menu'] = "setting";
        $data['active_submenu'] = "payment_setting";
    if($this->input->post('submit')){
        $online_payment=$this->input->post('online_payment');
        $upi_payment=$this->input->post('upi_payment');
        $cod=$this->input->post('cod');
        $this->model_setting->edit_payment_setting($online_payment,$upi_payment,$cod);
       
    }else{
     $data['list'] = $this->model_setting->payment_setting();
    $this->load->view('/Setting/payment_setting',$data);
      
    }   
  }
    public function add_payment(){
        $data['active_menu'] = "setting";
        $data['active_submenu'] = "add_payment";
        if($this->input->post('submit')){
        $payment_id=$this->input->post('payment_id');
        $theme_color=$this->input->post('theme_color');
        $this->model_setting->edit_payment($payment_id,$theme_color);
       
    }else{
      $data['list'] = $this->model_setting->select_payment();
    $this->load->view('/Setting/add_payment',$data);
      
    }   
       
 }
    public function upi_details(){
        $data['active_menu'] = "setting";
        $data['active_submenu'] = "upi_details";
        if($this->input->post('submit')){
        $pa=$this->input->post('pa');
        $pn=$this->input->post('pn');
        $mc=$this->input->post('mc');
        $url=$this->input->post('url');
            echo 'ssss';
        $this->model_setting->edit_upi_payment($pa,$pn,$mc,$url);
       
    }else{
      $data['list'] = $this->model_setting->upi_details();
        $this->load->view('/Setting/upi_details',$data);
        
        
        
     }
    }
}
?>