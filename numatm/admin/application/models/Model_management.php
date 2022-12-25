<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_management extends CI_Model {
	function __construct(){
    date_default_timezone_set("Asia/Calcutta");
		parent::__construct();
	}
    
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
          redirect(base_url().'/management/manage_category');
          
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
          redirect(base_url().'/management/manage_category');
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
     
    public function add_subcategory($category_id,$sub_category_name,$sub_category_desc){
          $this->db->where('sub_category_id');
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
        'category_id' =>$category_id,
      'sub_category_name' =>$sub_category_name,
        'sub_category_desc'=>$sub_category_desc,
        'sub_category_create_at'=>$time_stamp,

     );
    //echo $sub_category_name.$sub_category_desc.$subcategory_img;
        //echo $sub_category_name.$sub_category_desc.$subcategory_img;
      if($this->db->insert('sub_category',$data)){
        echo 'success';
          redirect(base_url().'/management/manage_subcategory');
       }else{
          echo 'failed';
       };
    }
    public function category_name(){
        $this->db->select('*');
        $this->db->from('sub_category');
        $data=$this->db->get();
        return $data->result();
    }
    
   public function edit_subcategory($edit_id,$category_id,$sub_category_name,$sub_category_desc){
        $this->db->where('sub_category_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
        'category_id' =>$category_id,
      'sub_category_name' =>$sub_category_name,
        'sub_category_desc'=>$sub_category_desc,
        'sub_category_updated_at'=>$time_stamp,

     );
   
      if($this->db->update('sub_category',$data)){
        echo 'success';
          redirect(base_url().'/management/manage_subcategory');
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
    
    
    /*##########################################Product##########################################################################################################Product############################################################*/
        

	public function product_number_details(){
        $this->db->select('*,product.product_id AS my_product_id');
		$this->db->from('product');
         $this->db->join('category','category.category_id = product.category_id','left');
         $this->db->join('vendor','vendor.vendor_id = product.vendor_id','left');
        $this->db->join('brand','brand.brand_id = product.product_type_id','left');
        $this->db->join('user_likes','user_likes.product_id = product.product_id','left');
        $this->db->join('product_log','product_log.product_id = product.product_id','left');
		$data = $this->db->get();
		 return $data->result();
        
    }
    public function category_list(){
        $this->db->select('*');
		$this->db->from('category');
		$data = $this->db->get();
		return $data->result();
    }
    public function subcategory_list(){
        $this->db->select('*');
		$this->db->from('sub_category');
		$data = $this->db->get();
		return $data->result();
    }
    public function vendor_list(){
        $this->db->select('*');
		$this->db->from('vendor');
		$data = $this->db->get();
		return $data->result();
    }
    public function number_list(){
        $this->db->select('*');
		$this->db->from('brand');
		$data = $this->db->get();
		return $data->result();
    }
	
	public function add_product($category_id,$sub_category_id,$product_type,$product_type_id,$product_current_no,$product_vanity_no,$product_rate,$vendor_id,$vendor_rate,$product_cod_available,$discount_percentage,$flat_discount){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
        
        'category_id' =>$category_id,
        'sub_category_id' =>$sub_category_id,
        'product_type' =>$product_type,
        'product_type_id' =>$product_type_id,
        'current_number' =>$product_current_no,
        'product_current_no' =>$product_vanity_no,
        'product_rate' =>$product_rate,
        'vendor_id' =>$vendor_id,
        'vendor_rate' =>$vendor_rate,
        'product_cod_available' =>$product_cod_available,
        'discount_percentage' =>$discount_percentage,
        'flat_discount' =>$flat_discount,
        'product_create_at'=>$time_stamp,
     );
    //echo $customer_name.$customer_email.$customer_alter_email.$customer_mobile.$customer_alter_mobile.$customer_company_name.$customer_gst_no.$customer_address.$customer_state;
      if($this->db->insert('product',$data)){
        echo 'success';
          redirect(base_url().'/management/number_details');
          
       }else{
          echo 'failed';

       };
  }
    
    public function selected_product($edit_id){
        $this->db->select('*');
		$this->db->from('product');
        $this->db->where('product_id',$edit_id);
        //$this->db->join('product_log','product_log.product_id = product. product_id');
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_product($edit_id,$category_id,$sub_category_id,$product_type,$product_type_id,$product_current_no,$product_vanity_no,$product_rate,$vendor_id,$vendor_rate,$product_cod_available,$discount_percentage,$flat_discount ){
       
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
       'category_id' =>$category_id,
        'sub_category_id' =>$sub_category_id,
        'product_type' =>$product_type,
        'product_type_id' =>$product_type_id,
        'current_number' =>$product_current_no,
        'product_current_no' =>$product_vanity_no,
        'product_rate' =>$product_rate,
        'vendor_id' =>$vendor_id,
        'vendor_rate' =>$vendor_rate,
        'product_cod_available' =>$product_cod_available,
        'discount_percentage' =>$discount_percentage,
        'flat_discount' =>$flat_discount,
       // 'change_description' =>$change_description,
        'product_updated_at'=>$time_stamp,

     );
          $this->db->where('product_id',$edit_id);
   if($this->db->update('product',$data)){
          
         /* $arr2 = array(
           'product_id' => $edit_id,
              'user_id' => $user_id,
              'change_discription' => $change_discription,
          );
          
          if($this->db->insert('product_log',$arr2)){
              
               echo 'success';
               redirect(base_url().'/product_number/number_details');
          }else{
              echo 'failed2';
          } */
        echo 'success';
               redirect(base_url().'/management/number_details');
       }else{
          echo 'failed1';
       };
    }
        
    
    public function delete_product($del_id){
        $this->db->where('product_id',$del_id);
    if($this->db->delete('product')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    
 /*###########################################Product##########################################################################################################Product###########################################################*/
    
    
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
          redirect(base_url().'/management/payment_method');
          
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
          redirect(base_url().'/management/payment_method');
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
    
    public function add_brand($brand_name,$brand_img){
         $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'brand_name' =>$brand_name,
        'brand_img' =>$brand_img,
        'brand_create_at'=>$time_stamp,
     );
     echo $brand_name.$brand_img.$time_stamp;
      if($this->db->insert('brand',$data)){
        echo 'success';
          redirect(base_url().'/management/brand');
          
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
    public function edit_brand($edit_id,$brand_name,$brand_img){
         $this->db->where('brand_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
     'brand_name' =>$brand_name,
        'brand_img' =>$brand_img,
        'brand_create_at'=>$time_stamp,
     );
   
      if($this->db->update('brand',$data)){
        echo 'success';
          redirect(base_url().'/management/brand');
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
    /*##############################################Banner#################################################################################################################################################*/
    public function select_banner(){
        $this->db->select('*');
		$this->db->from('banner');
		$data = $this->db->get();
		return $data->result();
        
    }
    
    public function add_banner($banner_title,$banner_subtitle,$banner_img){
       
    $data = array(
        'banner_title' =>$banner_title,
        'banner_subtitle' =>$banner_subtitle,
        'banner_img' =>$banner_img,
        
     );
     //echo $brand_name;
      if($this->db->insert('banner',$data)){
        echo 'success';
          redirect(base_url().'/management/banner');
          
       }else{
          echo 'failed';

       };
        
    }
    
    public function selected_banner($edit_id){
        $this->db->select('*');
		$this->db->from('banner');
         $this->db->where('banner_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_banner($edit_id,$banner_title,$banner_subtitle,$banner_img){
         $this->db->where('banner_id',$edit_id);
        

    $data = array(
     'banner_title' =>$banner_title,
        'banner_subtitle' =>$banner_subtitle,
        'banner_img' =>$banner_img,
     );
   
      if($this->db->update('banner',$data)){
        echo 'success';
          redirect(base_url().'/management/banner');
       }else{
          echo 'failed';
       };
        
    }
    public function delete_banner($del_id){
        $this->db->where('banner_id',$del_id);
    if($this->db->delete('banner')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    
/*##############################################EndBanner#################################################################################################################################################*/
    
   /*##############################################LogoSection############################################################################################################################################*/
    
    public function select_logo(){
        $this->db->select('*');
		$this->db->from('client_logo');
		$data = $this->db->get();
		return $data->result();
        
    }
    
    public function add_logo($logo_img){
       
    $data = array(
        'logo_img' =>$logo_img,
        
        
     );
     //echo $brand_name;
      if($this->db->insert('client_logo',$data)){
        echo 'success';
          redirect(base_url().'/management/client_logo');
          
       }else{
          echo 'failed';

       };
        
    }
    
   
    
    public function delete_logo($del_id){
        $this->db->where('logo_id',$del_id);
    if($this->db->delete('client_logo')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
   /*##############################################EndLogoSection############################################################################################################################################*/
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
          redirect(base_url().'/management/commission');
          
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
          redirect(base_url().'/management/commission');
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
          redirect(base_url().'/management/profile_details');
          
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
          redirect(base_url().'/management/profile_details');
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
    public function add_product_type($product_type_name){
       $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'product_type_name' =>$product_type_name,
        'product_type_create_at'=>$time_stamp,
     );
    // echo $brand_name;
      if($this->db->insert('product_type',$data)){
        echo 'success';
          redirect(base_url().'/management/product_details');
          
       }else{
          echo 'failed';

       };
        
    }
    public function selected_product_type($edit_id){
       $this->db->select('*');
		$this->db->from('product_type');
        $this->db->where('product_type_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_product_type($edit_id,$product_type_name){
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
          redirect(base_url().'/management/product_details');
       }else{
          echo 'failed';
       };
        
    }
   public function delete_product_type($del_id){
       
        $this->db->where('product_type_id',$del_id);
    if($this->db->delete('product_type')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
   }
    
/*########################################ProductType######################################################################################################ProductType##########################################################*/
public function vendor_details($name,$mobile_no,$status){
        $this->db->select('*');
		$this->db->from('vendor');
        
        if($name != ''){
         $this->db->like('vendor.vendor_name',$name);
         }
    
       if($mobile_no != ''){
         $this->db->like('vendor.vendor_mobile',$mobile_no); 
        }
        if($status != ''){
         $this->db->where('vendor.vendor_status',$status);
        
    }
		$data = $this->db->get();
		return $data->result();
        
    }
    public function vendor_view(){
        $this->db->select('*');
		$this->db->from('vendor');
        $data = $this->db->get();
		return $data->result();
    }
	
	public function add_vendor($vendor_name,$vendor_nickname,$vendor_img,$vendor_email_id,$vendor_password,$vendor_address,$vendor_area,$vendor_mobile,$vendor_website,$vendor_paytm_number,$vendor_gpay_number,$vendor_bank_name,$vendor_account_name,$vendor_bank_account,$vendor_branch_location,$vendor_ifsc_code,$vendor_priority,$vendor_resgister,$cod_available,$vendor_adhar_img){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
        'vendor_name' =>$vendor_name,
        'vendor_nickname' =>$vendor_nickname,
        'vendor_img' =>$vendor_img,
        'vendor_email_id' =>$vendor_email_id,
        'vendor_password' =>$vendor_password,
        'vendor_address' =>$vendor_address,
        'vendor_area' =>$vendor_area,
        'vendor_mobile' =>$vendor_mobile,
        'vendor_website' =>$vendor_website,
        'vendor_paytm_number' =>$vendor_paytm_number,
        'vendor_gpay_number' =>$vendor_gpay_number,
        'vendor_bank_name' =>$vendor_bank_name,
        'vendor_account_name' =>$vendor_account_name,
        'vendor_account_number' =>$vendor_bank_account,
        'vendor_branch_location' =>$vendor_branch_location,
        'vendor_ifsc_code' =>$vendor_ifsc_code,
        'vendor_priority' =>$vendor_priority,
        'vendor_register' =>$vendor_resgister,
        'cod_available' =>$cod_available,
        'vendor_adhar_img' =>$vendor_adhar_img,
        'vendor_create_at'=>$time_stamp,
     );
    //echo $vendor_name.$vendor_nickname.$vendor_email_id.$vendor_password.$vendor_address.$vendor_area.$vendor_mobile.$vendor_website.$vendor_paytm_number.$vendor_gpay_number.$vendor_bank_name.$vendor_account_name.$vendor_bank_account.$vendor_branch_location.$vendor_ifsc_code.$vendor_priority.$vendor_resgister.$cod_available.$vendor_adhar_img;
      if($this->db->insert('vendor',$data)){
        echo 'success';
          redirect(base_url().'/management/vendor_details');
          
       }else{
          echo 'failed';

       };
  }
    
    public function selected_vendor($edit_id){
        $this->db->select('*');
		$this->db->from('vendor');
        $this->db->where('vendor.vendor_id',$edit_id);
        $this->db->join('vendor_current_balance','vendor_current_balance.vendor_id = vendor.vendor_id','left');
		$data = $this->db->get();
		return $data->result();
        
    }
    public function edit_vendor($edit_id,$vendor_name,$vendor_nickname,$vendor_img,$vendor_email_id,$vendor_password,$vendor_address,$vendor_area,$vendor_mobile,$vendor_website,$vendor_paytm_number,$vendor_gpay_number,$vendor_bank_name,$vendor_account_name,$vendor_bank_account,$vendor_branch_location,$vendor_ifsc_code,$vendor_priority,$vendor_resgister,$cod_available,$vendor_adhar_img){
         $this->db->where('vendor_id',$edit_id);
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

    $data = array(
      'vendor_name' =>$vendor_name,
        'vendor_nickname' =>$vendor_nickname,
        'vendor_img' =>$vendor_img,
        'vendor_email_id' =>$vendor_email_id,
        'vendor_password' =>$vendor_password,
        'vendor_address' =>$vendor_address,
        'vendor_area' =>$vendor_area,
        'vendor_mobile' =>$vendor_mobile,
        'vendor_website' =>$vendor_website,
        'vendor_paytm_number' =>$vendor_paytm_number,
        'vendor_gpay_number' =>$vendor_gpay_number,
        'vendor_bank_name' =>$vendor_bank_name,
        'vendor_account_name' =>$vendor_account_name,
        'vendor_account_number' =>$vendor_bank_account,
        'vendor_branch_location' =>$vendor_branch_location,
        'vendor_ifsc_code' =>$vendor_ifsc_code,
        'vendor_priority' =>$vendor_priority,
        'vendor_register' =>$vendor_resgister,
        'cod_available' =>$cod_available,
        'vendor_adhar_img' =>$vendor_adhar_img,
        'vendor_create_at'=>$time_stamp,

     );
   
      if($this->db->update('vendor',$data)){
        echo 'success';
          redirect(base_url().'/management/vendor_details');
       }else{
          echo 'failed';
       };
    }
    
    public function delete_vendor($del_id){
        $this->db->where('vendor_id',$del_id);
    if($this->db->delete('vendor')){
        echo 'success';

           }else{
              echo 'failed';
           }
        
    }
    public function active_vendor_details(){
        $this->db->select('*');
		$this->db->from('vendor');
        $this->db->where('vendor.vendor_status','active');
		$data = $this->db->get();
		return $data->result();
        
    }
    public function deactive_vendor_details(){
        $this->db->select('*');
		$this->db->from('vendor');
        $this->db->where('vendor.vendor_status','deactive');
		$data = $this->db->get();
		return $data->result();
    }
    public function name_list(){
         $this->db->select('*');
		$this->db->from('vendor');
		$data = $this->db->get();
		return $data->result();
    }
    public function delete_number($vendor_id){
        $this->db->where('vendor_id',$vendor_id);
    if($this->db->delete('vendor')){
        echo 'success';
                redirect(base_url().'/management/vendor_number_delete');
           }else{
              echo 'failed';
           }
    }
    public function pirority_list(){
        $this->db->select('*,vendor.vendor_id AS my_vendor_id');
		$this->db->from('vendor');
        $this->db->join('vendor_priority','vendor_priority.vendor_id=vendor.vendor_id','left');
        $this->db->order_by('vendor_priority.priority','asc');
		$data = $this->db->get();
		return $data->result();
    }
    public function transction_detail($edit_id){
         $this->db->select('*');
		$this->db->from('vendor_current_balance');
        $this->db->where('vendor_current_balance_id',$edit_id);
        $this->db->join('vendor','vendor.vendor_id = vendor_current_balance.vendor_id');
        $this->db->join('transaction_details','transaction_details.transaction_id = vendor_current_balance.vendor_current_balance_id');
		$data = $this->db->get();
		return $data->result();
        
        
    }
    public function settlement_detail($edit_id){
        
    }
    
     
    
    public function vendor_priority($vendor_priority){
        
        foreach( $vendor_priority as $row){
            
            $check_vendor = $this->db->get('vendor_priority', array('vendor_id' => $row->vendor_id ));
            
            if($check_vendor->num_rows() == 1){
                $arr = array(
                    'priority' =>  $row->priority,
                    'priority_limit' => $row->limit,
                );
                $this->db->where('vendor_priority_id',$row->vendor_id);
                $this->db->update('vendor_priority',$arr);
            }else{
                $arr2 = array(
                    'vendor_id' =>  $row->vendor_id,
                    'priority' =>  $row->priority,
                    'priority_limit' => $row->limit,
                );
                
                $this->db->limit('vendor_priority',$arr2); 
                
            }
            
        }
        
    }
    public function update_vendor_priority($arr){
      //$arr=json_encode($arr);
      foreach($arr as $row){
        //print_r($row);
       
        $check_vendor= $this->db->get_where('vendor_priority',array('vendor_id'=>$row['vendor_id']));
        if($check_vendor->num_rows()==1){
         
                $this->db->where('vendor_id',$row['vendor_id']);
                  $this->db->set('priority',$row['priority']);
                  $this->db->set('priority_limit',$row['limit']);
                  $this->db->update('vendor_priority');
        }else{
          
          $myarr =array(
            'vendor_id'=> $row['vendor_id'],
            'priority'=> $row['priority'],
            'priority_limit'=> $row['limit'],

            );
                
            $this->db->insert('vendor_priority',$myarr);
        }
     
          
      }echo 'success';
    }
    public function add_test($name,$image){
        $data = array(
      'name' =>$name,
        'image' =>$image,
        
     );
     
      if($this->db->insert('test',$data)){
        echo 'success';
          
          
       }else{
          echo 'failed';

       };
    }

}
