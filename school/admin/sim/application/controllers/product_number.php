<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product_number1 extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
          $this->load->model('model_product_number');
         if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			        redirect('./admin/login');
	      	}
	}
	public function init_user(){
       $user_id = $this->session->userdata('uid');
      $data["user_data"] = $this->model_category->select_userdata($user_id);
       return $data;
	}
/*##############################################Product#########################################################################################################Customer#######################################################*/
	public function number_details(){
		$data['active_menu'] = "product_number";
		$data['active_submenu'] = "number_details";
		$data["number_list"] = $this->model_product_number->product_number_details();
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
    $this->model_product_number->add_product($category_id,$sub_category_id,$product_type,$product_type_id,$product_current_no,$product_vanity_no,$product_rate,$vendor_id,$vendor_rate,$product_cod_available,$discount_percentage,$flat_discount);
 
    }else{
        $data["number_list"] = $this->model_product_number->number_list(); 
        $data["vendor_list"] = $this->model_product_number->vendor_list();   
       $data["subcategory_list"] = $this->model_product_number->subcategory_list();      
      $data["category_list"] = $this->model_product_number->category_list();    
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
           
           
         $this->model_product_number->edit_product($edit_id,$category_id,$sub_category_id,$product_type,$product_type_id,$product_current_no,$product_vanity_no,$product_rate,$vendor_id,$vendor_rate,$product_cod_available,$discount_percentage,$flat_discount);
    }else{
       $data["number_list"] = $this->model_product_number->number_list(); 
        $data["vendor_list"] = $this->model_product_number->vendor_list();   
       $data["subcategory_list"] = $this->model_product_number->subcategory_list();      
      $data["category_list"] = $this->model_product_number->category_list(); 
      $data['selected_product'] = $this->model_product_number->selected_product($edit_id);
      $this->load->view('/product/add_product',$data);
     }   
    }
    
    public function delete_product(){
        if(isset($_POST['del_id'])){
      $del_id = $_POST['del_id'];
      $this->model_product_number->delete_product($del_id);
      }
    }
    
    
    
/*##############################################Customer#########################################################################################################Customer#######################################################*/	
}
