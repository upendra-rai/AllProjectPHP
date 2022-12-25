 <?php
class model_department extends CI_Model{

  public  function getdepartment(){
    $data=$this->db->get('departments');
    if ($data) {
  return $data->result();
         }
  }
  public function add_department($name){

    $data = array(
      'name' =>$name,
     );
    
      if($this->db->insert('departments',$data)){
        echo 'success';
          redirect(base_url().'/department/department_details');
          
       }else{
          echo 'failed';

       };
  }

  public function delete_data($id){
    $this->db->where('department_id',$id);
    if($this->db->delete('departments')){
        echo 'success';

           }else{
              echo 'failed';
           }
  }

  public function edit_department($edit_id,$name){
    $this->db->where('department_id',$edit_id);

    $data = array(
      'name' =>$name,
     );
    
      if($this->db->update('departments',$data)){
        echo 'success';
          redirect(base_url().'/department/department_details');
       }else{
          echo 'failed';
       };
  }

  public function selected_department($edit_id){
      $this->db->select('*');
      $this->db->where('department_id',$edit_id);
      $this->db->from('departments');
      $data=$this->db->get();
       return $data->result();
  }
 
  
  //**********************************************Holiday List******************************************************************************************************************************************************

   public  function getholiday(){
     $this->db->select('*');
         $this->db->from('holidays');
         $this->db->join('employees','employees.employee_id = holidays.employee_id');
         $data = $this->db->get();
         return $data->result();
   }
    

  public function add_holiday($user_id,$from_date,$to_date,$note){

    $data = array(
      'employee_id' =>$user_id,
      'from_date' =>$from_date,
      'to_date' =>$to_date,
      'note' =>$note,
     );

    echo $user_id.$from_date.$to_date.$note;
      if($this->db->insert('holidays',$data)){
        echo 'success';
          redirect(base_url().'/department/holiday_details');  
       }else{
          echo 'failed';
       };
  }


  public function select_holiday(){
    $this->db->select('*');
      $this->db->from('employees');
      $data=$this->db->get();
       return $data->result();

  }

   public function edit_holiday($edit_id,$user_id,$from_date,$to_date,$note){
    $this->db->where('id',$edit_id);

    $data = array(
      'employee_id' =>$user_id,
      'from_date' =>$from_date,
      'to_date' =>$to_date,
      'note' =>$note,
     );
    
      if($this->db->update('holidays',$data)){
        echo 'success';
          redirect(base_url().'/department/holiday_details');
       }else{
          echo 'failed';
       };
  }
  public function selected_holiday($edit_id){
      $this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('holidays');
      $data=$this->db->get();
       return $data->result();
  }

  public function select_holiday1(){
    $this->db->select('*');
      $this->db->from('employees');
      $data=$this->db->get();
       return $data->result();
  }

  public function delete_holiday($del_id){
    $this->db->where('id',$del_id);
    if($this->db->delete('holidays')){
        echo 'success';
           }else{
              echo 'failed';
           }
  }
  //--------------------------------------------------Employee Details--------------------------------------------------------------------------------------------------------------------------------------------
 public  function getEmployee(){
         $this->db->select('*');
         $this->db->from('employees');
         $this->db->join('departments','departments.department_id = employees.department_id');
         $data = $this->db->get();
         return $data->result();
  }

  public function add_employee($name,$email,$phone_number,$department_id,$address,$img_name){
$date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
    $data = array(
      'employee_name' =>$name,
      'email'=>$email,
      'phone_number'=>$phone_number,
      'department_id'=>$department_id,
      'address'=>$address,
      'image'=>$img_name,
      'created_at'=>$time_stamp,
      'updated_at'=>$time_stamp,
     );
    echo $name.$email.$img_name.$department_id;
      if($this->db->insert('employees',$data)){
        echo 'success';
         redirect(base_url().'/department/employee_details');  
       }else{
          echo 'failed';

       };
  }

  public function select_department(){
    $this->db->select('*');
      $this->db->from('departments');
      $data=$this->db->get();
       return $data->result();
   }

  public function delete_employee($id){
    $this->db->where('employee_id',$id);
    if($this->db->delete('employees')){
        echo 'success';

           }else{
              echo 'failed';
           }
  }
  public function edit_employee($edit_id,$name,$email,$phone_number,$department_id,$address,$img_name){
    $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
    $this->db->where('employee_id',$edit_id);

    $data = array(
       'employee_name' =>$name,
      'email'=>$email,
      'phone_number'=>$phone_number,
      'address'=>$address,
      'department_id'=>$department_id,
      'image'=>$img_name,
      'updated_at'=>$time_stamp,

     );
    //echo $id.$name.$description.$status_id.$customer_id.$invoice_id.$start_date.$deadline.$created.$finished.$pinned.$staff_id;
      if($this->db->update('employees',$data)){
        echo 'success';
          redirect(base_url().'/department/employee_details');
       }else{
          echo 'failed';
       };
  }

  public function select_dep(){
        $this->db->select('*');
        $this->db->from('departments');
        $data = $this->db->get();
        return $data->result();
  }

  public function selected_employee($edit_id){
      $this->db->select('*');
      $this->db->where('employee_id',$edit_id);
      $this->db->from('employees');
      $data=$this->db->get();
       return $data->result();

  }
  //----------------------------------------Attendence Details-----------------------------------------------------------------------------------------------------------------------------------------
public  function getattendence(){

        $this->db->select('*');
         $this->db->from('attendances');
         $this->db->join('employees','employees.employee_id = attendances.employee_id');
         $data = $this->db->get();
         return $data->result();   
  }
  public function add_attendence($employee_id,$date,$checkin,$checkout,$note){
$date1 = new DateTime();
        $time_stamp = $date1->format('Y-m-d H:i:s');
        $staff_id= $this->session->userdata('uid');
        echo $staff_id;
    $data = array(
      'employee_id' =>$employee_id,
      'staff_id'=>$staff_id,
      'date'=>$date,
      'checkin'=>$checkin,
      'checkout'=>$checkout,
      'note'=>$note,
      'created_at'=>$time_stamp,
      'updated_at'=>$time_stamp,
      
      
     );
  //  echo $employee_id.$date.$checkin.$checkout.$note;
      if($this->db->insert('attendances',$data)){
        echo 'success';
         redirect(base_url().'/department/attendence_details');
          
       }else{
          echo 'failed';

       };
  }
  public function select_employee1(){
    $this->db->select('*');
      $this->db->from('employees');
      $data=$this->db->get();
       return $data->result();
  }

  public function delete_attendence($id){
    $this->db->where('attendence_id',$id);
    if($this->db->delete('attendances')){
        echo 'success';
           }else{
              echo 'failed';
           }
  }
  public function edit_attendence($edit_id,$employee_id,$date,$checkin,$checkout,$note){
  
$date1 = new DateTime();
        $time_stamp = $date1->format('Y-m-d H:i:s');


    $data = array(
      'employee_id' =>$employee_id,
      'date'=>$date,
      'checkin'=>$checkin,
      'checkout'=>$checkout,
      'note'=>$note,
      'updated_at'=>$time_stamp,

     );
    //echo $id.$name.$description.$status_id.$customer_id.$invoice_id.$start_date.$deadline.$created.$finished.$pinned.$staff_id;
    $this->db->where('attendence_id',$edit_id);
      if($this->db->update('attendances',$data)){
        echo 'success';
          redirect(base_url().'/department/attendence_details');
       }else{
          echo 'failed';
       };
  }

  public function selected_attendence($edit_id){
      $this->db->select('*');
      $this->db->where('attendence_id',$edit_id);
      $this->db->from('attendances');
      $data=$this->db->get();
       return $data->result();
  }
  public function selectedd_employee(){
      $this->db->select('*');
      $this->db->from('employees');
      $data=$this->db->get();
       return $data->result();
  }
   public function select_employee(){
     $this->db->select('*');
        $this->db->from('employees');
        $data = $this->db->get();
        return $data->result();


  }
//-------------------------------------------Payroll Model-------------------------------------------------------------------------------------------------------------------------------------------
 public  function getpayrolls(){

    $this->db->select('*,payrolls.created_at AS payroll_date');
         $this->db->from('payrolls');
         $this->db->join('accounts','accounts.account_id = payrolls.employee_id');
         $data = $this->db->get();
         return $data->result(); 

  }

  public function add_payroll($employee_id,$account_id,$amount,$paying_method,$note){
      $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
       // echo $time_stamp;
    $data = array(
      'employee_id' =>$employee_id,
      'account_id'=>$account_id,
      'amount'=>$amount,
      'paying_method'=>$paying_method,
      'note'=>$note,
      'created_at'=>$time_stamp,
      'updated_at'=>$time_stamp,
     );
    
      if($this->db->insert('payrolls',$data)){
        echo 'success';
          redirect(base_url().'/department/payroll_details');  
       }else{
          echo 'failed';
       };
  }
  public function select_employee11(){
    $this->db->select('*');
      $this->db->from('accounts');
      $data=$this->db->get();
       return $data->result();

  }

  public function delete_payroll($id){
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
          redirect(base_url().'/department/payroll_details');
       }else{
          echo 'failed';
       };
  }

  public function selected_payroll11($edit_id){
      $this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('payrolls');
      $data=$this->db->get();
       return $data->result();
  }
  public function selected_employe11(){
    $this->db->select('*');
      $this->db->from('accounts');
      $data=$this->db->get();
       return $data->result();
  }
}
?>