<?php
class model_brand extends CI_Model{

  public  function getbrand(){
    $data=$this->db->get('brands');
    if ($data) {
  return $data->result();
         }
  }
  public function add_brand($title,$is_active,$img_name){

    $data = array(
      'title' =>$title,
      'is_active'=>$is_active,
      'image'=>$img_name,
     );
    
      if($this->db->insert('brands',$data)){
        echo 'success';
          redirect(base_url().'/brand/brand_details');
          
       }else{
          echo 'failed';

       };
  }
  public function delete_data($id){
    $this->db->where('id',$id);
    if($this->db->delete('brands')){
        echo 'success';

           }else{
              echo 'failed';
           }
  }
  public function edit_customer($edit_id,$title,$is_active,$img_name){
    $this->db->where('id',$edit_id);

    $data = array(
      'title' =>$title,
      'is_active'=>$is_active,
      'image'=>$img_name,

     );
    
      if($this->db->update('brands',$data)){
        echo 'success';
          redirect(base_url().'/brand/brand_details');
       }else{
          echo 'failed';
       };
  }
  public function selected_brand($edit_id){
      $this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('brands');
      $data=$this->db->get();

       return $data->result();

  }
  
  
//*****+++++++**********+++++******Payment Details*******************************************************************************************************************************************************************
  
  public  function getpayment(){
    $data=$this->db->get('payment_method');
    if ($data) {
  return $data->result();
         }
  }
  public function add_payment($payment_type_name){

    //supplier_id`, ` `supplier_name`, `supplier_mobile_no`, `supplier_email_id`, `supplier_address`,
     $data = array(
      'payment_type_name' =>$payment_type_name,

      
     );
    
      if($this->db->insert('payment_method',$data)){
        echo 'success';
          redirect(base_url().'/brand/payment_details');
          
       }else{
          echo 'failed';

       };
  }

  public function edit_payment($edit_id,$payment_type_name){
    $this->db->where('paying_method_id',$edit_id);

    $data = array(
      'payment_type_name' =>$payment_type_name,
      

     );
    
      if($this->db->update('payment_method',$data)){
        echo 'success';
          redirect(base_url().'/brand/payment_details');
       }else{
          echo 'failed';
       };
  }
  public function selected_payment($edit_id){
      $this->db->select('*');
      $this->db->where('paying_method_id',$edit_id);
      $this->db->from('payment_method');
      $data=$this->db->get();

       return $data->result();

  }
  public function delete_supplier($id){
    $this->db->where('supplier_id',$id);
    if($this->db->delete('supplier_details')){
        echo 'success';

           }else{
              echo 'failed';
           }
  }
}

?>