<?php

class Model_setting extends CI_Model{
	public function countsms(){
	 $this->db->select('*');
      $this->db->from('sms_account');
      $data=$this->db->get();
       return $data->result();
	}
	

  public function payment_setting(){
	//$this->db->select('*');
	$this->db->where('sr_no=1');
      $this->db->from('payment_gateway_details');
      $data=$this->db->get();
       return $data->result();
   }
   public function edit_payment_setting($online_payment,$upi_payment,$cod){
   	 $this->db->where('sr_no',1);

    $data = array(
      'online_payment' =>$online_payment,
      'upi_payment' => $upi_payment,
      'cod'=> $cod,
     );
     echo $online_payment.$upi_payment.$cod;
      if($this->db->update('payment_gateway_details',$data)){
        echo 'success';
          redirect(base_url().'/Setting/payment_setting');
       }else{
          echo 'failed';
       };
   }
    public function select_payment(){
	//$this->db->select('*');
	$this->db->where('sr_no=1');
      $this->db->from('payment_gateway_details');
      $data=$this->db->get();
       return $data->result();
   }
   public function edit_payment($payment_id,$theme_color){
   	 $this->db->where('sr_no',1);

    $data = array(
      'payment_id' =>$payment_id,
      'theme_color' => $theme_color,
      
     );
     //echo $online_payment.$upi_payment.$cod;
      if($this->db->update('payment_gateway_details',$data)){
        echo 'success';
          redirect(base_url().'/Setting/add_payment');
       }else{
          echo 'failed';
       };
   }
    public function upi_details(){
	//$this->db->select('*');
	$this->db->where('sr_no=1');
      $this->db->from('payment_gateway_details');
      $data=$this->db->get();
       return $data->result();
   }
    
   public function edit_upi_payment($pa,$pn,$mc,$url){
       $this->db->where('sr_no',1);
    $data = array(
      'pa' =>$pa,
      'pn' => $pn,
      'mc' => $mc,
      'url' => $url,
      
     );
     
      if($this->db->update('payment_gateway_details',$data)){
        echo 'success';
         redirect(base_url().'/Setting/upi_details');
       }else{
          echo 'failed';
       };
    
   }
}

?>