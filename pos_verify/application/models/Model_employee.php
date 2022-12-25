<?php
class model_employee extends CI_Model{

  public  function get(){
    $data=$this->db->get('employees');
    if ($data) {
  return $data->result();
         }
  }
  public function add_employee($name,$email,$phone_number,$address,$img_name){

    $data = array(
      'name' =>$name,
      'email'=>$email,
      'phone_number'=>$phone_number,
      'address'=>$address,
      'image'=>$img_name,
     );
    //echo $name,$email,$img_name;
      if($this->db->insert('employees',$data)){
        echo 'success';
          redirect(base_url().'/employee/employee_details');
          
       }else{
          echo 'failed';

       };
  }
  public function delete_employee($id){
    $this->db->where('id',$id);
    if($this->db->delete('employees')){
        echo 'success';

           }else{
              echo 'failed';
           }
  }
  public function edit_employee($edit_id,$name,$email,$phone_number,$address,$img_name){
    $this->db->where('id',$edit_id);

    $data = array(
       'name' =>$name,
      'email'=>$email,
      'phone_number'=>$phone_number,
      'address'=>$address,
      'image'=>$img_name,

     );
    //echo $id.$name.$description.$status_id.$customer_id.$invoice_id.$start_date.$deadline.$created.$finished.$pinned.$staff_id;
      if($this->db->update('employees',$data)){
        echo 'success';
          redirect(base_url().'/employee/employee_details');
       }else{
          echo 'failed';
       };
  }
  public function selected_employee($edit_id){
      $this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('employees');
      $data=$this->db->get();

       return $data->result();

  }
  
  

  
  
}

?>