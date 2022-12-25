<?php
class model_attendence extends CI_Model{

  public  function get(){
    $data=$this->db->get('attendances ');
    if ($data) {
  return $data->result();
         }
  }
  public function add_attendence($employee_id,$date,$checkin,$checkout,$note){

    $data = array(
      'employee_id' =>$employee_id,
      'date'=>$date,
      'checkin'=>$checkin,
      'checkout'=>$checkout,
      'note'=>$note,
      
      
     );
    
      if($this->db->insert('attendances',$data)){
        echo 'success';
          redirect(base_url().'/attendence/attendence_details');
          
       }else{
          echo 'failed';

       };
  }
  public function delete_data($id){
    $this->db->where('id',$id);
    if($this->db->delete('attendances')){
        echo 'success';

           }else{
              echo 'failed';
           }
  }
  public function edit_attendence($edit_id,$employee_id,$date,$checkin,$checkout,$note){
    $this->db->where('id',$edit_id);

    $data = array(
      'employee_id' =>$employee_id,
      'date'=>$date,
      'checkin'=>$checkin,
      'checkout'=>$checkout,
      'note'=>$note,

     );
    //echo $id.$name.$description.$status_id.$customer_id.$invoice_id.$start_date.$deadline.$created.$finished.$pinned.$staff_id;
      if($this->db->update('attendances',$data)){
        echo 'success';
          redirect(base_url().'/attendence/attendence_details');
       }else{
          echo 'failed';
       };
  }
  public function selected_attendence($edit_id){
      $this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('attendances');
      $data=$this->db->get();

       return $data->result();

  }
  
  

  
  
}

?>