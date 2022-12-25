<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class management extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_management');
         if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			        redirect('./admin/login');
	      	}
	}
	public function init_user(){
       $user_id = $this->session->userdata('uid');
      $data["user_data"] = $this->model_management->select_userdata($user_id);
       return $data;
	}
            //=========********===========********========******========//
            // ************ Category section ***********//
            //=========********===========********========******========//
    
    
	public function manage_categoryu(){
		$data['active_menu'] = "management";
		$data['active_submenu'] = "manage_category";
		$data["category_list"] = $this->model_master->select_category();
		$this->load->view('category/category_view', $data);
	
	}
    
    public function manage_category(){
       if($this->input->post('submit')){
  	   $category_name=$this->input->post('category_name');
        $category_desc=$this->input->post('category_desc');
       $category_img=$this->input->post('category_img');
    $this->model_management->add_category($category_name,$category_desc,$category_img);
 
    }else{
           $data['active_menu'] = "management";
		$data['active_submenu'] = "manage_category";
        $data["category_list"] = $this->model_management->select_category();
		$this->load->view('category/category_view', $data);
         
  }  
        
    }
    public function edit_category(){
        $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	   $category_name=$this->input->post('category_name');
        $category_desc=$this->input->post('category_desc');
       $category_img=$this->input->post('category_img');
        $this->model_management->edit_category($edit_id,$category_name,$category_desc,$category_img);
    }else{
        $data["category_list"] = $this->model_management->select_category();
      $data['selected_category'] = $this->model_management->selected_category($edit_id);
      $this->load->view('/category/category_view', $data);
    }   
    }
    public function delete_category(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_management->delete_category($del_id);
    }
    }
    
    public function upload_category_image(){

    if($_FILES["file"]["name"] != "")
      {
     $img_folder_name = $_POST['img_folder_name'];
     $test = explode(".", $_FILES["file"]["name"]);
     $extension = end($test);
     $name = rand(100,99999).strtotime(date('Y-m-d H:i:s')).bin2hex(openssl_random_pseudo_bytes(4)).'.'.$extension;
     $location = 'uploads/'.$img_folder_name.'/'.$name;
     move_uploaded_file($_FILES["file"]["tmp_name"], $location);
     echo '<img src="'.base_url().$location.'" data-img_name="'.$name.'" alt="User" style="width:100% ; height:100%;"/><input type="hidden" name="category_img" value="'.$name.'" /><button type="button" class="btn" id="inlink_img_bt" data-unlink_img_src="'.$location.'" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>';

      }
  }
    
    
            //=========********===========********========******========//
            // ************ End Category section ***********//
            //=========********===========********========******========//
    
    
            //=========********===========********========******========//
            // ************ Sub Category section ***********//
            //=========********===========********========******========//

            //=========********===========********========******========//
            // ************ Sub Category section ***********//
            //=========********===========********========******========//
    
    public function manage_subcategorytt(){
        $data['active_menu'] = "management";
		$data['active_submenu'] = "manage_subcategory"; 
        $data["subcategory_list"] = $this->model_management->subcategory_details();
        $this->load->view('category/subcategory_list', $data);
    }
    
    public function manage_subcategory(){
         if($this->input->post('submit')){
             $category_id=$this->input->post('category_id');
  	       $sub_category_name=$this->input->post('sub_category_name');
            $sub_category_desc=$this->input->post('sub_category_desc');
            

        //echo $sub_category_name.$sub_category_desc.$sub_category_img;
    $this->model_management->add_subcategory($category_id,$sub_category_name,$sub_category_desc);
    }else{
        $data['active_menu'] = "management";
		$data['active_submenu'] = "manage_subcategory"; 
     $data["category_name"] = $this->model_management->category_list(); 
     $data["subcategory_list"] = $this->model_management->subcategory_details();         
      $this->load->view('/category/subcategory_list',$data);    
  }  
        
    }
    
    public function edit_subcategory(){
        $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
         
             $category_id=$this->input->post('category_id');
  	        $sub_category_name=$this->input->post('sub_category_name');
            $sub_category_desc=$this->input->post('sub_category_desc');
            
         
           $this->model_management->edit_subcategory($edit_id,$category_id,$sub_category_name,$sub_category_desc);

    }else{
         
        $data["category_name"] = $this->model_management->category_list();     
         $data["subcategory_list"] = $this->model_management->subcategory_details();
      $data['selected_subcategory'] = $this->model_management->selected_subcategory($edit_id);
      $this->load->view('/category/subcategory_list',$data);
    }   
    }
    public function delete_subcategory(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_management->delete_subcategory($del_id);
    }
    }

            //=========********===========********========******========//
            // ************End Sub Category section ***********//
            //=========********===========********========******========//
    
    
    /*##############################################Product#########################################################################################################Product#######################################################*/
	public function number_details(){
		$data['active_menu'] = "management";
		$data['active_submenu'] = "number_details";
		$data["number_list"] = $this->model_management->product_number_details();
		$this->load->view('product/number_list', $data);
	
	}
    
    public function add_product(){
       if($this->input->post('submit')){
            $category_id=$this->input->post('category_id');
            $sub_category_id=$this->input->post('sub_category_id');
            $product_type=$this->input->post('product_type');
            $product_type_id=$this->input->post('product_type_id');
            $product_current_no=$this->input->post('current_number');
            $product_vanity_no=$this->input->post('product_vanity_no');
            $product_rate=$this->input->post('product_rate');
            $vendor_id=$this->input->post('vendor_id');
            $vendor_rate=$this->input->post('vendor_rate');
            $product_cod_available=$this->input->post('product_cod_available');
            $discount_percentage=$this->input->post('discount_percentage');
            $flat_discount=$this->input->post('flat_discount');
           
            
    // echo $vendor_name.$vendor_nickname.$vendor_resgister.$cod_available.$vendor_adhar_img;
    $this->model_management->add_product($category_id,$sub_category_id,$product_type,$product_type_id,$product_current_no,$product_vanity_no,$product_rate,$vendor_id,$vendor_rate,$product_cod_available,$discount_percentage,$flat_discount);
 
    }else{
        $data["number_list"] = $this->model_management->number_list(); 
        $data["vendor_list"] = $this->model_management->vendor_list();   
       $data["subcategory_list"] = $this->model_management->subcategory_list();      
      $data["category_list"] = $this->model_management->category_list();    
      $this->load->view('/product/add_product',$data);    
  }  
        
    }
    public function edit_product_number(){
        $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	        $category_id=$this->input->post('category_id');
            $sub_category_id=$this->input->post('sub_category_id');
            $product_type=$this->input->post('product_type');
            $product_type_id=$this->input->post('product_type_id');
            $product_current_no=$this->input->post('current_number');
            $product_vanity_no=$this->input->post('product_vanity_no');
            $product_rate=$this->input->post('product_rate');
            $vendor_id=$this->input->post('vendor_id');
            $vendor_rate=$this->input->post('vendor_rate');
            $product_cod_available=$this->input->post('product_cod_available');
            $discount_percentage=$this->input->post('discount_percentage');
            $flat_discount=$this->input->post('flat_discount');
            //$change_description=$this->input->post('change_description');

          // echo $category_id.$sub_category_id.$product_type.$product_type_id.$product_current_no.$product_vanity_no.$product_rate.$vendor_id.$vendor_rate.$product_cod_available.$discount_percentage.$flat_discount.$change_description;
         $this->model_management->edit_product($edit_id,$category_id,$sub_category_id,$product_type,$product_type_id,$product_current_no,$product_vanity_no,$product_rate,$vendor_id,$vendor_rate,$product_cod_available,$discount_percentage,$flat_discount);
    }else{
      $data["number_list"] = $this->model_management->number_list(); 
      $data["vendor_list"] = $this->model_management->vendor_list();   
      $data["subcategory_list"] = $this->model_management->subcategory_list();      
      $data["category_list"] = $this->model_management->category_list(); 
      $data['selected_product'] = $this->model_management->selected_product($edit_id);
      $this->load->view('/product/add_product',$data);
     }   
    }
    
    public function delete_product(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_management->delete_product($del_id);
      }
    }
    
    
    
/*##############################################Product#########################################################################################################Product#######################################################*/

            //=========********===========********========******========//
            // ************End Sub Category section ***********//
            //=========********===========********========******========//
    
    public function payment_method(){
		$data['active_menu'] = "management";
		$data['active_submenu'] = "payment_method";
		$data["payment_method_list"] = $this->model_management->payment_method();
		$this->load->view('category/payment_method_list', $data);
	
	}
    
    public function add_payment_method(){
         if($this->input->post('submit')){
  	   $payment_method_name=$this->input->post('payment_method_name');
  
    $this->model_management->add_payment_method($payment_method_name);
 
    }else{
      $this->load->view('/category/add_payment_method');    
      }
        
    }
    public function edit_payment_method(){
        $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	  $payment_method_name=$this->input->post('payment_method_name');
    $this->model_management->edit_payment_method($edit_id,$payment_method_name);
    }else{
      $data['selected_payment_method'] = $this->model_management->selected_payment_method($edit_id);
      $this->load->view('/category/add_payment_method',$data);
      }  
        
    }
    public function delete_payment_method(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_management->delete_payment_method($del_id);
    }
    }
    
    
    
    
             //=========********===========********========******========//
             // ************ Brand section ***********//
             //=========********===========********========******========//

    public function brand(){
		$data['active_menu'] = "management";
		$data['active_submenu'] = "brand";
		$data["brand_list"] = $this->model_management->select_brand();
		$this->load->view('category/brand', $data);
	
	}
    
    public function add_brand(){
        if($this->input->post('submit')){
  	   $brand_name=$this->input->post('brand_name');
       $brand_img=$this->input->post('brand_img');
  
    $this->model_management->add_brand($brand_name,$brand_img);
 
    }else{
            $data['active_menu'] = "management";
		$data['active_submenu'] = "add_brand";
      $this->load->view('/category/add_brand');    
      }       
    }
    public function edit_brand(){
         $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	   $brand_name=$this->input->post('brand_name');
         $brand_img=$this->input->post('brand_img');
        $this->model_management->edit_brand($edit_id,$brand_name,$brand_img);
    }else{
      $data['selected_brand'] = $this->model_management->selected_brand($edit_id);
      $this->load->view('/category/add_brand',$data);
      }      
    }
    public function upload_brand_image(){

	  if($_FILES["file"]["name"] != "")
      {
		 $img_folder_name = $_POST['img_folder_name'];
	   $test = explode(".", $_FILES["file"]["name"]);
	   $extension = end($test);
	   $name = rand(100,99999).strtotime(date('Y-m-d H:i:s')).bin2hex(openssl_random_pseudo_bytes(4)).'.'.$extension;
	   $location = 'uploads/'.$img_folder_name.'/'.$name;
	   move_uploaded_file($_FILES["file"]["tmp_name"], $location);
	   echo '<img src="'.base_url().$location.'" data-img_name="'.$name.'" alt="User" style="width:100% ; height:100%;"/><input type="hidden" name="brand_img" value="'.$name.'" /><button type="button" class="btn" id="inlink_img_bt" data-unlink_img_src="'.$location.'" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>';

      }
	}
    public function delete_brand(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_management->delete_brand($del_id);
    }
    }
             //=========********===========********========******========//
             // ************ End Brand section ***********//
             //=========********===========********========******========//
    
    
    
            //=========********===========********========******========//
             // ************ Banner section ***********//
             //=========********===========********========******========//
    
 
	
        public function banner(){
       if($this->input->post('submit')){
  	   $banner_title=$this->input->post('banner_title');
        $banner_subtitle=$this->input->post('banner_subtitle');
       $banner_img=$this->input->post('banner_img');
    $this->model_management->add_banner($banner_title,$banner_subtitle,$banner_img);
 
    }else{
           $data['active_menu'] = "management";
		$data['active_submenu'] = "banner";
       $data["banner_list"] = $this->model_management->select_banner();
		$this->load->view('banner/banner',$data);
         
  }  
        
    }
    public function edit_banner(){
        $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	   $banner_title=$this->input->post('banner_title');
        $banner_subtitle=$this->input->post('banner_subtitle');
       $banner_img=$this->input->post('banner_img');
        $this->model_management->edit_banner($edit_id,$banner_title,$banner_subtitle,$banner_img);
    }else{
      $data["banner_list"] = $this->model_management->select_banner();
      $data['selected_banner'] = $this->model_management->selected_banner($edit_id);
      $this->load->view('banner/banner',$data);
    }   
    }
    public function delete_banner(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_management->delete_banner($del_id);
    }
    }
    
    public function upload_banner_image(){

    if($_FILES["file"]["name"] != "")
      {
     $img_folder_name = $_POST['img_folder_name'];
     $test = explode(".", $_FILES["file"]["name"]);
     $extension = end($test);
     $name = rand(100,99999).strtotime(date('Y-m-d H:i:s')).bin2hex(openssl_random_pseudo_bytes(4)).'.'.$extension;
     $location = 'uploads/'.$img_folder_name.'/'.$name;
     move_uploaded_file($_FILES["file"]["tmp_name"], $location);
     echo '<img src="'.base_url().$location.'" data-img_name="'.$name.'" alt="User" style="width:100% ; height:100%;"/><input type="hidden" name="banner_img" value="'.$name.'" /><button type="button" class="btn" id="inlink_img_bt" data-unlink_img_src="'.$location.'" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>';

      }
  }
    
             //=========********===========********========******========//
             // ************End Banner section ***********//
             //=========********===========********========******========//
    
    
             //=========********===========********========******========//
             // ************Logo section ***********//
             //=========********===========********========******========//
    
     public function client_logo(){
       if($this->input->post('submit')){
       $logo_img=$this->input->post('logo_img');
    $this->model_management->add_logo($logo_img);
 
    }else{
           $data['active_menu'] = "management";
		$data['active_submenu'] = "client_logo";
       $data["logo_list"] = $this->model_management->select_logo();
		$this->load->view('banner/client_logo',$data);
         
  }  
        
    }
 
    public function delete_logo(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_management->delete_logo($del_id);
    }
    }
    
    public function upload_logo_image(){

    if($_FILES["file"]["name"] != "")
      {
     $img_folder_name = $_POST['img_folder_name'];
     $test = explode(".", $_FILES["file"]["name"]);
     $extension = end($test);
     $name = rand(100,99999).strtotime(date('Y-m-d H:i:s')).bin2hex(openssl_random_pseudo_bytes(4)).'.'.$extension;
     $location = 'uploads/'.$img_folder_name.'/'.$name;
     move_uploaded_file($_FILES["file"]["tmp_name"], $location);
     echo '<img src="'.base_url().$location.'" data-img_name="'.$name.'" alt="User" style="width:100% ; height:100%;"/><input type="hidden" name="logo_img" value="'.$name.'" /><button type="button" class="btn" id="inlink_img_bt" data-unlink_img_src="'.$location.'" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>';

      }
  }
    
             //=========********===========********========******========//
             // ************End Logo section ***********//
             //=========********===========********========******========//
    public function vendor_details(){
		$data['active_menu'] = "management";
		$data['active_submenu'] = "vendor_details";
        if($this->input->post('submit')){
        $name = $this->input->post('vendor_name');
        $mobile_no = $this->input->post('vendor_mobile');
        $status = $this->input->post('vendor_status');
        
   
        $data["r_status"] =  $status;
        $data["vendor_list"] = $this->model_management->vendor_details($name,$mobile_no,$status);
		$this->load->view('vendor/vendor_list', $data);
         }else{
        
        $name = '';
        $mobile_no = '';
        $status = '';
      
     $data["vendor_list"] = $this->model_management->vendor_details($name,$mobile_no,$status);
		$this->load->view('vendor/vendor_list', $data);
    }
		
    }
	
    
    public function add_vendor(){
       if($this->input->post('submit')){
           $vendor_name=$this->input->post('vendor_name');
           $vendor_nickname=$this->input->post('vendor_nickname');
           $vendor_img=$this->input->post('vendor_img');
           $vendor_email_id=$this->input->post('vendor_email_id');
           $vendor_password=$this->input->post('vendor_password');
           $vendor_address=$this->input->post('vendor_address');
           $vendor_area=$this->input->post('vendor_area');
           $vendor_mobile=$this->input->post('vendor_mobile');
           $vendor_website=$this->input->post('vendor_website');
           $vendor_paytm_number=$this->input->post('vendor_paytm_number');
           $vendor_gpay_number=$this->input->post('vendor_gpay_number');
           $vendor_bank_name=$this->input->post('vendor_bank_name');
           $vendor_account_name=$this->input->post('vendor_account_name');
           $vendor_bank_account=$this->input->post('vendor_account_number');
           $vendor_branch_location=$this->input->post('vendor_branch_location');
           $vendor_ifsc_code=$this->input->post('vendor_ifsc_code');
           $vendor_priority=$this->input->post('vendor_priority');
           $vendor_resgister=$this->input->post('vendor_register');
           $cod_available=$this->input->post('cod_available');
           $vendor_adhar_img=$this->input->post('vendor_adhar_img');
           
       
          // echo $vendor_name.$vendor_nickname.$vendor_email_id.$vendor_password.$vendor_address.$vendor_area.$vendor_mobile.$vendor_website.$vendor_paytm_number.$vendor_gpay_number.$vendor_bank_name.$vendor_account_name.$vendor_bank_account.$vendor_branch_location.$vendor_ifsc_code.$vendor_priority.$vendor_resgister.$cod_available.$vendor_adhar_img;
    $this->model_management->add_vendor($vendor_name,$vendor_nickname,$vendor_img,$vendor_email_id,$vendor_password,$vendor_address,$vendor_area,$vendor_mobile,$vendor_website,$vendor_paytm_number,$vendor_gpay_number,$vendor_bank_name,$vendor_account_name,$vendor_bank_account,$vendor_branch_location,$vendor_ifsc_code,$vendor_priority,$vendor_resgister,$cod_available,$vendor_adhar_img);
 
    }else{
      $this->load->view('/vendor/add_vendor');    
  }  
        
    }
    public function view_vendor(){
         $edit_id = $this->uri->segment(3);
        $data["vendor_list"] = $this->model_management->selected_vendor($edit_id);
         $this->load->view('/vendor/view_vendor',$data); 
    }
    
    
    
    public function edit_vendor(){
        $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	    $vendor_name=$this->input->post('vendor_name');
           $vendor_nickname=$this->input->post('vendor_nickname');
            $vendor_img=$this->input->post('vendor_img');
           $vendor_email_id=$this->input->post('vendor_email_id');
           $vendor_password=$this->input->post('vendor_password');
           $vendor_address=$this->input->post('vendor_address');
           $vendor_area=$this->input->post('vendor_area');
           $vendor_mobile=$this->input->post('vendor_mobile');
           $vendor_website=$this->input->post('vendor_website');
           $vendor_paytm_number=$this->input->post('vendor_paytm_number');
           $vendor_gpay_number=$this->input->post('vendor_gpay_number');
           $vendor_bank_name=$this->input->post('vendor_bank_name');
           $vendor_account_name=$this->input->post('vendor_account_name');
           $vendor_bank_account=$this->input->post('vendor_account_number');
           $vendor_branch_location=$this->input->post('vendor_branch_location');
           $vendor_ifsc_code=$this->input->post('vendor_ifsc_code');
           $vendor_priority=$this->input->post('vendor_priority');
           $vendor_resgister=$this->input->post('vendor_register');
           $cod_available=$this->input->post('cod_available');
           $vendor_adhar_img=$this->input->post('vendor_adhar_img');
           
         $this->model_management->edit_vendor($edit_id,$vendor_name,$vendor_nickname,$vendor_img,$vendor_email_id,$vendor_password,$vendor_address,$vendor_area,$vendor_mobile,$vendor_website,$vendor_paytm_number,$vendor_gpay_number,$vendor_bank_name,$vendor_account_name,$vendor_bank_account,$vendor_branch_location,$vendor_ifsc_code,$vendor_priority,$vendor_resgister,$cod_available,$vendor_adhar_img);
    }else{
      $data['selected_vendor'] = $this->model_management->selected_vendor($edit_id);
      $this->load->view('/vendor/add_vendor',$data);
     }   
    }
     public function upload_vendor_image(){

    if($_FILES["file"]["name"] != "")
      {
     $img_folder_name = $_POST['img_folder_name'];
     $test = explode(".", $_FILES["file"]["name"]);
     $extension = end($test);
     $name = rand(100,99999).strtotime(date('Y-m-d H:i:s')).bin2hex(openssl_random_pseudo_bytes(4)).'.'.$extension;
     $location = 'uploads/'.$img_folder_name.'/'.$name;
     move_uploaded_file($_FILES["file"]["tmp_name"], $location);
     echo '<img src="'.base_url().$location.'" data-img_name="'.$name.'" alt="User" style="width:100% ; height:100%;"/><input type="hidden" name="vendor_img" value="'.$name.'" /><button type="button" class="btn" id="inlink_img_bt" data-unlink_img_src="'.$location.'" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>';

      }
  }
    
    public function delete_vendor(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_management->delete_vendor($del_id);
      }
    }
    public function active_vendor_details(){
        $data["active_vendor_list"] = $this->model_management->active_vendor_details();
		$this->load->view('vendor/active_vendor',$data);
        
    }
    public function deactive_vendor_details(){
        $data["active_vendor_list"] = $this->model_management->deactive_vendor_details();
		$this->load->view('vendor/active_vendor',$data);
        
    }
    
    public function vendor_number_delete(){
        $data["name_list"] = $this->model_management->name_list();
		$this->load->view('vendor/number_delete_list',$data);
    }
    public function delete_number(){
        $vendor_id = $this->uri->segment(3);
        $this ->model_management->delete_number($vendor_id);
    }
    
    
    public function vendor_pirority(){
        $data['active_menu'] = "management";
		$data['active_submenu'] = "vendor_pirority";
    $data["pirority_list"] = $this->model_management->pirority_list();
    $this->load->view('vendor/vendor_pirority',$data);
    }
    
    public function transction_details(){
         $edit_id = $this->uri->segment(3);
        $data["transcation_list"] = $this->model_management->transction_detail($edit_id);
         $this->load->view('/vendor/transcation_details',$data); 
    }
     
    
    public function settlement_details(){
        $edit_id = $this->uri->segment(3);
        $data["settlement_list"] = $this->model_management->settlement_detail($edit_id);
         $this->load->view('/vendor/settlement_view',$data);
        
    }
/*##############################################Vendor##################################################################################################Vendor##################################################*/
    
    
             //=========********===========********========******========//
             // ************ commission section ***********//
             //=========********===========********========******========//
    
    public function commission(){
		$data['active_menu'] = "management";
		$data['active_submenu'] = "commission";
		$data["commission_list"] = $this->model_management->select_commission();
		$this->load->view('category/commission_list', $data);
	
	}
    public function add_commission(){
        if($this->input->post('submit')){
  	       $from_amount=$this->input->post('from_amount');
            $to_amount=$this->input->post('to_amount');
            $commission_percent=$this->input->post('commission_percent');
            $commission_rs=$this->input->post('commission_rs');
  
    $this->model_management->add_commission($from_amount,$to_amount,$commission_percent,$commission_rs);
 
    }else{
      $this->load->view('/category/add_commission');    
  }  
        
    }
    public function edit_commission(){
         $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
  	    $from_amount=$this->input->post('from_amount');
            $to_amount=$this->input->post('to_amount');
            $commission_percent=$this->input->post('commission_percent');
            $commission_rs=$this->input->post('commission_rs');
    $this->model_management->edit_commission($edit_id,$from_amount,$to_amount,$commission_percent,$commission_rs);
    }else{
      $data['selected_commission'] = $this->model_management->selected_commission($edit_id);
      $this->load->view('/category/add_commission',$data);
      }       
    }
    
     public function delete_commission(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_management->delete_commission($del_id);
     }
    }
             //=========********===========********========******========//
             // ************ End commission section ***********//
             //=========********===========********========******========//
    
    
    
             //=========********===========********========******========//
             // ************ profile details section ***********//
             //=========********===========********========******========//
    
    public function profile_details(){
        $data['active_menu'] = "management";
		$data['active_submenu'] = "profile_details";
		$data["profile_list"] = $this->model_management->profile_details();
		$this->load->view('category/profile_type_list',$data);
        
    }
    public function add_profile(){
        if($this->input->post('submit')){
  	   $profile_type_name=$this->input->post('profile_type_name');
  
    $this->model_management->add_profile($profile_type_name);
 
    }else{
      $this->load->view('/category/add_profile_type');     
      }       
    }
    public function edit_profile(){
         $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
         
  	   $profile_type_name=$this->input->post('profile_type_name');
         
        $this->model_management->edit_profile($edit_id,$profile_type_name);
    }else{
      $data['selected_profile'] = $this->model_management->selected_profile($edit_id);
      $this->load->view('/category/add_profile_type',$data);
      }  
        
    }
    public function delete_profile(){
         if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_management->delete_profile($del_id);
         }
    }
             //=========********===========********========******========//
             // ************ End profile details section ***********//
             //=========********===========********========******========//
    
             //=========********===========********========******========//
             // ************ product details section ***********//
             //=========********===========********========******========//

public function product_details(){
        $data['active_menu'] = "management";
		$data['active_submenu'] = "product_details";
		$data["product_list"] = $this->model_management->product_details();
		$this->load->view('category/product_type_list',$data);
        
    }
    public function add_product_type(){
        if($this->input->post('submit')){
  	   $product_type_name=$this->input->post('product_type_name');
  
    $this->model_management->add_product_type($product_type_name);
 
    }else{
      $this->load->view('/category/add_product_type');     
      }       
    }
    public function edit_product(){
         $edit_id = $this->uri->segment(3);
     if($this->input->post('submit')){
         
  	   $product_type_name=$this->input->post('product_type_name');
         
        $this->model_management->edit_product_type($edit_id,$product_type_name);
    }else{
      $data['selected_product'] = $this->model_management->selected_product_type($edit_id);
      $this->load->view('/category/add_product_type',$data);
      }  
        
    }
    public function delete_product_type(){
         if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_management->delete_product_type($del_id);
         }
    }
    
   

	
}
