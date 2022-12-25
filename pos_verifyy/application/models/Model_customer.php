<?php
class model_customer extends CI_Model{

  public  function get(){
    $data=$this->db->get('customers');
    if ($data) {
  return $data->result();
         }
  }
  public function add_customer($name,$company_name,$email,$phone_number,$tax_no,$address,$city,$deposit){

    $data = array(
      'name' =>$name,
      'company_name'=>$company_name,
      'email'=>$email,
      'phone_number'=>$phone_number,
      'tax_no'=>$tax_no,
      'address'=>$address,
      'city'=>$city,
      'deposit'=>$deposit,
      
     );
    
      if($this->db->insert('customers',$data)){
        echo 'success';
          redirect(base_url().'/Customer/customer_details');
          
       }else{
          echo 'failed';

       };
  }
  public function delete_data($id){
    $this->db->where('id',$id);
    if($this->db->delete('customers')){
        echo 'success';

           }else{
              echo 'failed';
           }
  }
  public function edit_customer($edit_id,$name,$company_name,$email,$phone_number,$tax_no,$address,$city,$deposit){
    $this->db->where('id',$edit_id);

    $data = array(
      'name' =>$name,
      'company_name'=>$company_name,
      'email'=>$email,
      'phone_number'=>$phone_number,
      'tax_no'=>$tax_no,
      'address'=>$address,
      'city'=>$city,
      'deposit'=>$deposit,

     );
    
      if($this->db->update('customers',$data)){
        echo 'success';
          redirect(base_url().'/customer/customer_details');
       }else{
          echo 'failed';
       };
  }
  public function selected_customer($edit_id){
      $this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('customers');
      $data=$this->db->get();

       return $data->result();

  }
  
  
//*****+++++++**********+++++******Supplier Details****************************************************
  
  public  function getsupplier(){
    $data=$this->db->get('supplier_details');
    if ($data) {
  return $data->result();
         }
  }
  public function add_supplier($supplier_name,$supplier_mobile_no,$supplier_email_id,$supplier_address){

    //supplier_id`, ` `supplier_name`, `supplier_mobile_no`, `supplier_email_id`, `supplier_address`,
     $data = array(
      'supplier_name' =>$supplier_name,
      'supplier_mobile_no'=>$supplier_mobile_no,
      'supplier_email_id'=>$supplier_email_id,
      'supplier_address'=>$supplier_address,
      
     );
    
      if($this->db->insert('supplier_details',$data)){
        echo 'success';
          redirect(base_url().'/Customer/supplier_details');
          
       }else{
          echo 'failed';

       };
  }

  public function edit_supplier($edit_id,$supplier_name,$supplier_mobile_no,$supplier_email_id,$supplier_address){
    $this->db->where('supplier_id',$edit_id);

    $data = array(
      'supplier_name' =>$supplier_name,
      'supplier_mobile_no'=>$supplier_mobile_no,
      'supplier_email_id'=>$supplier_email_id,
      'supplier_address'=>$supplier_address,

     );
    
      if($this->db->update('supplier_details',$data)){
        echo 'success';
          redirect(base_url().'/Customer/supplier_details');
       }else{
          echo 'failed';
       };
  }
  public function selected_supplier($edit_id){
      $this->db->select('*');
      $this->db->where('supplier_id',$edit_id);
      $this->db->from('supplier_details');
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