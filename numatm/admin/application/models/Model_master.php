<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_master extends CI_Model {
	function __construct(){
    date_default_timezone_set("Asia/Calcutta");
		parent::__construct();
	}
    /*##########################################Customer################################################################################################Customer##################################################*/
        

	public function customer_details(){
        $this->db->select('*');
		$this->db->from('customer');
		$data = $this->db->get();
		return $data->result();
        
    }
	
	public function add_customer($customer_name,$customer_email,$customer_alter_email,$customer_mobile,$customer_alter_mobile,$customer_company_name,$customer_gst_no,$customer_address,$customer_pincode,$customer_state){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
        
        'customer_name' =>$customer_name,
        'customer_email' =>$customer_email,
        'customer_alter_email' =>$customer_alter_email,
        'customer_mobile' =>$customer_mobile,
        'customer_alter_mobile' =>$customer_alter_mobile,
        'customer_company_name' =>$customer_company_name,
        'customer_gst_no' =>$customer_gst_no,
        'customer_address' =>$customer_address,
        'customer_pincode' =>$customer_pincode,
        'customer_state' =>$customer_state,
        'customer_create_at'=>$time_stamp,
     );
    echo $customer_name.$customer_email.$customer_alter_email.$customer_mobile.$customer_alter_mobile.$customer_company_name.$customer_gst_no.$customer_address.$customer_state;
      if($this->db->insert('customer',$data)){
        echo 'success';
          redirect(base_url().'/master/customer_details');
          
       }else{
          echo 'failed';

       };
  }
    
    public function selected_customer($edit_id){
        $this->db->select('*');
		$this->db->from('customer');
        $this->db->where('customer_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_customer($edit_id,$customer_name,$customer_email,$customer_alter_email,$customer_mobile,$customer_alter_mobile,$customer_company_name,$customer_gst_no,$customer_address,$customer_pincode,$customer_state){
         $this->db->where('customer_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'customer_name' =>$customer_name,
        'customer_email' =>$customer_email,
        'customer_alter_email' =>$customer_alter_email,
        'customer_mobile' =>$customer_mobile,
        'customer_alter_mobile' =>$customer_alter_mobile,
        'customer_company_name' =>$customer_company_name,
        'customer_gst_no' =>$customer_gst_no,
        'customer_address' =>$customer_address,
        'customer_pincode' =>$customer_pincode,
        'customer_state' =>$customer_state,
        'customer_updated_at'=>$time_stamp,

     );
   
      if($this->db->update('customer',$data)){
        echo 'success';
          redirect(base_url().'/master/customer_details');
       }else{
          echo 'failed';
       };
    }
    
    public function delete_customer($del_id){
        $this->db->where('customer_id',$del_id);
    if($this->db->delete('customer')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    
    /*##############################################Customer###############################################################################################Customer##########################################*/
    /*##########################################Employee##############################################################################################Employee####################################################*/
        

	public function employee_details(){
      $this->db->select('*,employee.employee_id');
		$this->db->from('employee'); 
      $this->db->join('profile_type','profile_type.profile_type_id = employee.profile_type_id','left');
		$data = $this->db->get();
		return $data->result();    
    }
	public function employee_profile_list(){
      $this->db->select('*');
		$this->db->from('profile_type');
		$data = $this->db->get();
		return $data->result();
    }
    public function add_employee($employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile){
      $date = new DateTime();
      $time_stamp = $date->format('Y-m-d H:i:s');

  $data = array(
      'employee_login_id' =>$employee_login_id,
      'employee_password' =>$employee_password,
      'employee_first_name' =>$employee_first_name,
      'employee_last_name' =>$employee_last_name,
      'employee_contact_number' =>$employee_contact_number,
      'employee_email_id' =>$employee_email_id,
      'profile_type_id' =>$employee_profile,
      'employee_create_at'=>$time_stamp,
   );
        echo $employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile;
    if($this->db->insert('employee',$data)){
      echo 'success';
        redirect(base_url().'/master/employee_details');
        
     }else{
        echo 'failed';

     };
}
  
  public function selected_employee($edit_id){
      $this->db->select('*');
    $this->db->from('employee');
      $this->db->where('employee_id',$edit_id);
    $data = $this->db->get();
    return $data->result();
      
  }
  public function edit_employee($edit_id,$employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile){
        
   $this->db->where('employee_id',$edit_id);
  $date = new DateTime();
  $time_stamp = $date->format('Y-m-d H:i:s');

$data = array(
 'employee_login_id' =>$employee_login_id,
  'employee_password' =>$employee_password,
  'employee_first_name' =>$employee_first_name,
  'employee_last_name' =>$employee_last_name,
  'employee_contact_number' =>$employee_contact_number,
  'employee_email_id' =>$employee_email_id,
  'profile_type_id' =>$employee_profile,
  'employee_upadated_at'=>$time_stamp,
  

);
  echo $employee_login_id,$employee_password,$employee_first_name,$employee_last_name,$employee_contact_number,$employee_email_id,$employee_profile;

if($this->db->update('employee',$data)){
  echo 'success';
    redirect(base_url().'/master/employee_details');
 }else{
    echo 'failed';
 };
}
  
  public function delete_employee($del_id){
      $this->db->where('employee_id',$del_id);
  if($this->db->delete('employee')){
      echo 'success';

         }else{
            echo 'failed';
         }
      
  }
   
        
    
    
    /*##############################################Employee############################################################################################Employee##########################################*/
    /*##############################################Category##############################################################################################################################################*/
    

	public function select_category(){
        $this->db->select('* ,category.category_id AS my_category_id');
		$this->db->from('category');
       $this->db->join('sub_category','sub_category.category_id=category.category_id','left');
		$data = $this->db->get();
		return $data->result();
        
    }
	
	public function add_category($category_name,$category_desc,$category_img){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'category_name' =>$category_name,
        'category_desc'=>$category_desc,
      'category_img'=>$category_img,
        'category_create_at'=>$time_stamp,
      
    //'category_create_at'=>$category_create_at,
     );
    //echo $name,$email,$img_name;
      if($this->db->insert('category',$data)){
        echo 'success';
          redirect(base_url().'/master/manage_category');
          
       }else{
          echo 'failed';

       };
  }
    
    
    public function selected_category($edit_id){
        $this->db->select('*');
		$this->db->from('category');
        $this->db->where('category_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_category($edit_id,$category_name,$category_desc,$category_img){
         $this->db->where('category_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'category_name' =>$category_name,
        'category_desc'=>$category_desc,
      'category_img'=>$category_img,
        'category_updated_at'=>$time_stamp,

     );
   
      if($this->db->update('category',$data)){
        echo 'success';
          redirect(base_url().'/master/manage_category');
       }else{
          echo 'failed';
       };
    }
    
    public function delete_category($del_id){
        $this->db->where('category_id',$del_id);
    if($this->db->delete('category')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    
/*##############################################Category########################################################################################################################################################################*/

    public function subcategory_details(){
        $this->db->select('*');
        $this->db->from('sub_category');
        $data=$this->db->get();
        return $data->result();
    }
     
    public function add_subcategory($sub_category_name,$sub_category_desc,$subcategory_img){
          $this->db->where('sub_category_id');
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'sub_category_name' =>$sub_category_name,
        'sub_category_desc'=>$sub_category_desc,
      'sub_category_img'=>$subcategory_img,
        'sub_category_create_at'=>$time_stamp,

     );
    echo $sub_category_name.$sub_category_desc.$subcategory_img;
        //echo $sub_category_name.$sub_category_desc.$subcategory_img;
      if($this->db->update('sub_category',$data)){
        echo 'success';
          redirect(base_url().'/master/manage_subcategory');
       }else{
          echo 'failed';
       };
    }
    
   public function edit_subcategory($edit_id,$sub_category_name,$sub_category_desc,$sub_category_img){
        $this->db->where('sub_category_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'sub_category_name' =>$sub_category_name,
        'sub_category_desc'=>$sub_category_desc,
      'sub_category_img'=>$sub_category_img,
        'sub_category_updated_at'=>$time_stamp,

     );
   
      if($this->db->update('sub_category',$data)){
        echo 'success';
          redirect(base_url().'/master/manage_subcategory');
       }else{
          echo 'failed';
       };
   }
    public function selected_subcategory($edit_id){
        $this->db->select('*');
		$this->db->from('sub_category');
        $this->db->where('sub_category_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
    }
    
    public function delete_subcategory($del_id){
        $this->db->where('sub_category_id',$del_id);
    if($this->db->delete('sub_category')){
        echo 'success';

           }else{
              echo 'failed';
           }
    }
    
    
    public function payment_method(){
        $this->db->select('*');
		$this->db->from('payment_method');
		$data = $this->db->get();
		return $data->result();
        
    }
    public function add_payment_method($payment_method_name){


    $data = array(
      'payment_method_name' =>$payment_method_name,
        
     );
    // echo $brand_name;
      if($this->db->insert('payment_method',$data)){
        echo 'success';
          redirect(base_url().'/master/payment_method');
          
       }else{
          echo 'failed';

       };     
    }
    
    public function selected_payment_method($edit_id){
        $this->db->select('*');
		$this->db->from('payment_method');
        $this->db->where('payment_method_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
        
    }
    public function edit_payment_method($edit_id,$payment_method_name){
        $this->db->where('payment_method_id',$edit_id);

    $data = array(
     'payment_method_name' =>$payment_method_name,
       
     );
   
      if($this->db->update('payment_method',$data)){
        echo 'success';
          redirect(base_url().'/master/payment_method');
       }else{
          echo 'failed';
       };
        
    }
    public function delete_payment_method($del_id){
        $this->db->where('payment_method_id',$del_id);
    if($this->db->delete('payment_method')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    
    
    
    
    /*##############################################Brand##################################################################################################################################################*/
    
    public function select_brand(){
        $this->db->select('*');
		$this->db->from('brand');
		$data = $this->db->get();
		return $data->result();
        
    }
    
    public function add_brand($brand_name){
         $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'brand_name' =>$brand_name,
        'brand_create_at'=>$time_stamp,
     );
     echo $brand_name;
      if($this->db->insert('brand',$data)){
        echo 'success';
          redirect(base_url().'/master/brand');
          
       }else{
          echo 'failed';

       };
        
    }
    
    public function selected_brand($edit_id){
        $this->db->select('*');
		$this->db->from('brand');
         $this->db->where('brand_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_brand($edit_id,$brand_name){
         $this->db->where('brand_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
     'brand_name' =>$brand_name,
        'brand_create_at'=>$time_stamp,
     );
   
      if($this->db->update('brand',$data)){
        echo 'success';
          redirect(base_url().'/master/brand');
       }else{
          echo 'failed';
       };
        
    }
    public function delete_brand($del_id){
        $this->db->where('brand_id',$del_id);
    if($this->db->delete('brand')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
     /*##############################################Brand#################################################################################################################################################*/
    
     /*##############################################Commission############################################################################################################################################*/
     public function select_commission(){
        $this->db->select('*');
		$this->db->from('commission');
		$data = $this->db->get();
		return $data->result();
     }
    public function add_commission($from_amount,$to_amount,$commission_percent,$commission_rs){
         $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'from_amount' =>$from_amount,
        'to_amount' =>$to_amount,
        'commission_percent' =>$commission_percent,
        'commission_rs' =>$commission_rs,
        'commission_create_at'=>$time_stamp,
     );
     echo $brand_name;
      if($this->db->insert('commission',$data)){
        echo 'success';
          redirect(base_url().'/master/commission');
          
       }else{
          echo 'failed';

       };
        
    }
    public function selected_commission($edit_id){
        $this->db->select('*');
		$this->db->from('commission');
		$data = $this->db->get();
		return $data->result();  
    }
    public function edit_commission($edit_id,$from_amount,$to_amount,$commission_percent,$commission_rs){
        $this->db->where('commission_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'from_amount' =>$from_amount,
        'to_amount' =>$to_amount,
        'commission_percent' =>$commission_percent,
        'commission_rs' =>$commission_rs,
        'commission_create_at'=>$time_stamp,

     );
   
      if($this->db->update('commission',$data)){
        echo 'success';
          redirect(base_url().'/master/commission');
       }else{
          echo 'failed';
       };
    }
    public function delete_commission($del_id){
        $this->db->where('commission_id',$del_id);
    if($this->db->delete('commission')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
/*##############################################Commission#######################################################################################################Commission#####################################################*/
    
/*########################################ProfileDetails###################################################################################################ProfileDetails#######################################################*/
    
    public function profile_details(){
         $this->db->select('*');
		$this->db->from('profile_type');
		$data = $this->db->get();
		return $data->result();
        
    }
    public function add_profile($profile_type_name){
       $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'profile_type_name' =>$profile_type_name,
        'profile_type_create_at'=>$time_stamp,
     );
    // echo $brand_name;
      if($this->db->insert('profile_type',$data)){
        echo 'success';
          redirect(base_url().'/master/profile_details');
          
       }else{
          echo 'failed';

       };
        
    }
    public function selected_profile($edit_id){
       $this->db->select('*');
		$this->db->from('profile_type');
        $this->db->where('profile_type_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_profile($edit_id,$profile_type_name){
        $this->db->where('profile_type_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
     'profile_type_name' =>$profile_type_name,
        'profile_type_updated'=>$time_stamp,
     );
       //echo $profile_type_name.$time_stamp;
      if($this->db->update('profile_type',$data)){
        echo 'success';
          redirect(base_url().'/master/profile_details');
       }else{
          echo 'failed';
       };
        
    }
   public function delete_profile($del_id){
       
        $this->db->where('profile_type_id',$del_id);
    if($this->db->delete('profile_type')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
   }
 /*########################################ProfileDetails###################################################################################################ProfileDetails#####################################################*/
    
/*########################################ProductType######################################################################################################ProductType##########################################################*/
    
     public function product_details(){
         $this->db->select('*');
		$this->db->from('product_type');
		$data = $this->db->get();
		return $data->result();
        
    }
    public function add_product($product_type_name){
       $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'product_type_name' =>$product_type_name,
        'product_type_create_at'=>$time_stamp,
     );
    // echo $brand_name;
      if($this->db->insert('product_type',$data)){
        echo 'success';
          redirect(base_url().'/master/product_details');
          
       }else{
          echo 'failed';

       };
        
    }
    public function selected_product($edit_id){
       $this->db->select('*');
		$this->db->from('product_type');
        $this->db->where('product_type_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_product($edit_id,$product_type_name){
        $this->db->where('product_type_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
     'product_type_name' =>$product_type_name,
        'product_type_updated_at'=>$time_stamp,
     );
       //echo $profile_type_name.$time_stamp;
      if($this->db->update('product_type',$data)){
        echo 'success';
          redirect(base_url().'/master/product_details');
       }else{
          echo 'failed';
       };
        
    }
   public function delete_product($del_id){
       
        $this->db->where('product_type_id',$del_id);
    if($this->db->delete('product_type')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
   }
    
/*########################################ProductType######################################################################################################ProductType##########################################################*/
 //=========********===========********========******========//
             // ************ Service Provider section ***********//
             //=========********===========********========******========//
     public function service_provider(){
        $this->db->select('*');
		$this->db->from('service_provider');
		$data = $this->db->get();
		return $data->result();
     }
    public function add_service($service_provider_name,$service_provider_code){
         $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'service_provider_name' =>$service_provider_name,
        'service_provider_code' =>$service_provider_code,
        'service_provider_create_at'=>$time_stamp,
     );
     //echo $brand_name;
      if($this->db->insert('service_provider',$data)){
        echo 'success';
          redirect(base_url().'/master/service_provider');
          
       }else{
          echo 'failed';

       };
        
    }
    public function selected_service($edit_id){
        $this->db->select('*');
		$this->db->from('service_provider');
        $this->db->where('service_provider_id',$edit_id);
		$data = $this->db->get();
		return $data->result(); 
    }
    public function edit_service($edit_id,$service_provider_name,$service_provider_code){
        $this->db->where('service_provider_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'service_provider_name' =>$service_provider_name,
        'service_provider_code' =>$service_provider_code,
        'service_provider_updated_at'=>$time_stamp,

     );
   
      if($this->db->update('service_provider',$data)){
        echo 'success';
          redirect(base_url().'/master/service_provider');
       }else{
          echo 'failed';
       };
    }
    public function delete_service_provider($del_id){
        $this->db->where('service_provider_id',$del_id);
    if($this->db->delete('service_provider')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    
    
                //=========********===========********========******========//
             // ************End Service Provider section ***********//
             //=========********===========********========******========//

    
    
                //=========********===========********========******========//
             // ************ Service Provider Area section ***********//
             //=========********===========********========******========//
    
    public function service_area_code(){
        $this->db->select('*');
		$this->db->from('service_area_code');
		$data = $this->db->get();
		return $data->result();
     }
    public function add_service_area($service_area_name,$service_area_code,$expiry_date){
      

    $data = array(
      'service_area_name' =>$service_area_name,
        'service_area_code' =>$service_area_code,
        'expiry_date' =>$expiry_date,
        
     );
     //echo $brand_name;
      if($this->db->insert('service_area_code',$data)){
        echo 'success';
          redirect(base_url().'/master/service_area_code');
          
       }else{
          echo 'failed';

       };
        
    }
    public function selected_service_area($edit_id){
        $this->db->select('*');
		$this->db->from('service_area_code');
        $this->db->where('service_area_id',$edit_id);
		$data = $this->db->get();
		return $data->result();  
    }
    public function edit_service_area($edit_id,$service_area_name,$service_area_code,$expiry_date){
        $this->db->where('service_area_id',$edit_id);
        

    $data = array(
      'service_area_name' =>$service_area_name,
        'service_area_code' =>$service_area_code,
          'expiry_date' =>$expiry_date,
     );
   
      if($this->db->update('service_area_code',$data)){
        echo 'success';
          redirect(base_url().'/master/service_area_code');
       }else{
          echo 'failed';
       };
    }
    public function delete_service_area($del_id){
        $this->db->where('service_area_id',$del_id);
    if($this->db->delete('service_area_code')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    
    
                //=========********===========********========******========//
             // ************End Service Area section ***********//
             //=========********===========********========******========//
}
