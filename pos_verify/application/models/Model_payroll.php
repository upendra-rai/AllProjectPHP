<?php
class model_payroll extends CI_Model{

  public  function get(){
    $data=$this->db->get('payrolls');
    if ($data) {
  return $data->result();
         }
  }
  public function add_payroll($employee_id,$account_id,$amount,$paying_method,$note){
      $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
    $data = array(
      'employee_id' =>$employee_id,
      'account_id'=>$account_id,
      'amount'=>$amount,
      'paying_method'=>$paying_method,
      'note'=>$note,
      'created_at'=>$time_stamp,
      
      
     );
    
      if($this->db->insert('payrolls',$data)){
        echo 'success';
          redirect(base_url().'/payroll/payroll_details');
          
       }else{
          echo 'failed';

       };
  }
  public function delete_data($id){
    $this->db->where('id',$id);
    if($this->db->delete('payrolls')){
        echo 'success';

           }else{
              echo 'failed';
           }
  }
  public function edit_payroll($edit_id,$employee_id,$account_id,$amount,$paying_method,$note){

     $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
    $this->db->where('id',$edit_id);

    $data = array(
      'employee_id' =>$employee_id,
      'account_id'=>$account_id,
      'amount'=>$amount,
      'paying_method'=>$paying_method,
      'note'=>$note,
      'updated_at'=>$time_stamp,

     );
    //echo $id.$name.$description.$status_id.$customer_id.$invoice_id.$start_date.$deadline.$created.$finished.$pinned.$staff_id;
      if($this->db->update('payrolls',$data)){
        echo 'success';
          redirect(base_url().'/payroll/payroll_details');
       }else{
          echo 'failed';
       };
  }
  public function selected_payroll($edit_id){
      $this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('payrolls');
      $data=$this->db->get();

       return $data->result();

  }
  
  

  
  
}

?>