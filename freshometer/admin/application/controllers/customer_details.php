<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class customer_details extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		
		 

		$this->load->library('session');
         $this->load->helper('form');
        
        $this->load->model('model_dashboard');
        $this->load->model('model_customer_details');
       if($this->session->userdata('logged_in') !== 'messcafe_login'){
			redirect('./admin/login');
		}
		
	}

	public function init($active_menu){
        
		$uid = $this->session->userdata('uid');
		$data['user_data'] = $this->model_dashboard->user_data($uid);
		
		$data['active_menu'] = $active_menu;

		return $data;
	}

	public function index(){
       
		

		
			 $this->load->helper('form');
		$this->load->view('home', $data);

	}
/*  //////// Add Customer /////// */
	public function details(){
          $this->load->helper('form');
          $data['active_menu'] = "customer_details";
          $data['active_submenu'] = "details";
          $data["customer_list"] = $this->model_customer_details->customer_details();
		
		   $this->load->view('customer_details/customer_details',$data);
        }
    
    
    public function add_customer(){
        if($this->input->post('submit')){
  	   $customer_name=$this->input->post('customer_name');
       $customer_contact=$this->input->post('customer_contact');
       $customer_address=$this->input->post('customer_address');
       $customer_area=$this->input->post('customer_area_id');
       $customer_plan=$this->input->post('plan_id');
       $reference=$this->input->post('reference');
       $customer_password=$this->input->post('customer_password');
       $customer_gender=$this->input->post('customer_gender');
            
           echo  $customer_area.$customer_plan;
        //echo $customer_name.$customer_contact.$customer_address.$customer_area.$reference.$customer_password.$customer_gendor;

        $this->model_customer_details->add_customer($customer_name,$customer_contact,$customer_address,$customer_area,$customer_plan,$reference,$customer_password,$customer_gender);
    }else{
        
        $data['active_menu'] = "customer_details";
        $data['active_submenu'] = "details";
        $data['area_list'] = $this->model_customer_details->select_area();
        $data['plan_list'] = $this->model_customer_details->select_plan();
        $this->load->view('customer_details/add_customer',$data);
    }  	
        
    }
    
    public function customer_edit(){
    $edit_id = $this->uri->segment(3);
           if($this->input->post('submit')){
     $customer_name=$this->input->post('customer_name');
       $customer_contact=$this->input->post('customer_contact');
       $customer_address=$this->input->post('customer_address');
       $customer_area=$this->input->post('customer_area_id');
       $customer_plan=$this->input->post('plan_id');
       $reference=$this->input->post('reference');
       $customer_password=$this->input->post('customer_password');
       $customer_gender=$this->input->post('customer_gender');
       // echo $product_name.$desc.$purchase_price.$sell_price.$stock.$vat.$status;

        $this->model_customer_details->edit_customer($edit_id,$customer_name,$customer_contact,$customer_address,$customer_area,$customer_plan,$reference,$customer_password,$customer_gender);
    }else{
     // echo $edit_id;
        $data['active_menu'] = "master";
		$data['active_submenu'] = "product_details";
      $data['area_list'] = $this->model_customer_details->select_area();
      $data['plan_list'] = $this->model_customer_details->select_plan();
      $data['selected_customer'] = $this->model_customer_details->selected_customer($edit_id);
      $this->load->view('customer_details/add_customer',$data);
    }   
  }
    
    public function customer_view(){
        $customer_id =  $this->uri->segment(3);
        $data['active_menu'] = "customer_details";
        $data['active_submenu'] = "details";
        
            $data['detail_recharge'] = $this->model_customer_details->customer_view($customer_id);
        $data['detail'] = $this->model_customer_details->customer_view($customer_id);
        $this->load->view('customer_details/customer_view',$data);
    }
	
    public function add_product(){
   if($this->input->post('submit')){
  	$productname=$this->input->post('productname');
      $description=$this->input->post('description');
      $image=$this->input->post('image');
       $purchase_price=$this->input->post('purchase_price');
       $sale_price=$this->input->post('sale_price');
       $stock=$this->input->post('stock');
       $vat=$this->input->post('vat');
       $status_id=$this->input->post('status_id');
       // echo $product_name.$desc.$purchase_price.$sell_price.$stock.$vat.$status;

        $this->model_master->add_product($productname,$description,$image,$purchase_price,$sale_price,$stock,$vat,$status_id);
    }else{
       
        
        $data['active_menu'] = "master";
		$data['active_submenu'] = "product_details";
    	$this->load->view('add_view',$data);
    }  	
  }
    
    
  public function delete_product(){  
   
    if(isset($_POST['vv'])){

      $del_id = $_POST['vv'];
      $this->model_master->delete_data($del_id);
    }
    //echo $sr_no;
   // 
  }

  public function edit_product(){
    $edit_id = $this->uri->segment(3);
           if($this->input->post('submit')){
    $productname=$this->input->post('productname');
      $description=$this->input->post('description');
      $image=$this->input->post('image');
       $purchase_price=$this->input->post('purchase_price');
       $sale_price=$this->input->post('sale_price');
       $stock=$this->input->post('stock');
       $vat=$this->input->post('vat');
       $status_id=$this->input->post('status_id');
       // echo $product_name.$desc.$purchase_price.$sell_price.$stock.$vat.$status;

        $this->model_master->edit_product($edit_id,$productname,$description,$image,$purchase_price,$sale_price,$stock,$vat,$status_id);
    }else{
     // echo $edit_id;
        $data['active_menu'] = "master";
		$data['active_submenu'] = "product_details";
      $data['selected_list'] = $this->model_master->selected_product($edit_id);
      $this->load->view('edit_product',$data);
    }   
  }
	
	public function form_submit(){
					
		if(isset($_POST["card_no"])){
			
			$firstname  =  $_POST["firstname"];
			$lastname  =  $_POST["lastname"];
			$mobileno  =  $_POST["mobileno"];
            $mobileno2  =  $_POST["mobileno2"];
			$email  =  $_POST["email"];
			$address1  =  $_POST["address1"];
			$address2  =  $_POST["address2"];
			$postcode  =  $_POST["postcode"];
			$colony  =  $_POST["colony"];
			$city  =  $_POST["city"];
            $delivery_type  =  $_POST["delivery_type"];
			$advance_payment  =  $_POST["advance_payment"];
			$card_no  =  $_POST["card_no"];
		
			/* echo $firstname.$lastname.$mobileno.$email.$address1.$address2.$postcode.$colony.$city.$advance_payment.$card_no; */
			
			$this->model_customer->add_customer_submit($firstname,$lastname,$mobileno,$mobileno2,$email,$address1,$address2,$postcode,$colony,$city,$delivery_type,$advance_payment,$card_no);
		}			
		
	}
	
	
	
	
	
/*  ////////\\\\\\\\ ///////\\\\\\\\\\ */	

/*  //////// list Customer /////// */

	public function list_customer(){
        
        $data['active_menu'] = "customer";
		$data['customer_list'] = $this->model_customer->fetch_customer();
		$this->load->view('customer/list_customer',$data);
	}
	
	public function view_customer(){
        $data['active_menu'] = "customer";
        $linked_no =  $this->uri->segment(3);
        $switch = $this->uri->segment(4);
        if(isset($switch)){
                
                $data['switch'] =  $this->uri->segment(4);
                $data['detail_recharge'] =  $this->model_customer->customer_rech_report2($linked_no);
                $data['detail_transaction'] =  $this->model_customer->customer_tran_report2($linked_no);
                $data['select_plan'] = $this->model_customer->select_plan();
            
                $data['detail'] = $this->model_customer->view_customer($linked_no);
		        $this->load->view('customer/view_customer',$data);
        }else{
                $data['switch'] =  "no";
            
                $data['select_plan'] = $this->model_customer->select_plan();
                $data['detail'] = $this->model_customer->view_customer($linked_no);
                $data['minimum_recharge'] =  $this->model_customer->select_recharge_limit();
		        $this->load->view('customer/view_customer',$data);
        }
        
        if($this->input->post('submit')){
            
            $plan_id = $this->input->post('plan');
            $order_start_date = $this->input->post('start_date');
            $order_end_date = $this->input->post('end_date');
            $shift = $this->input->post('plan_shift');
            $plan_cost = $this->input->post('plan_cost');
            
            if($plan_id && $order_start_date && $order_end_date && $shift && $plan_cost){
             $data['detail'] = $this->model_customer->add_subscription($plan_id,$order_start_date,$order_end_date,$linked_no,$shift,$plan_cost);
            }
         
        }
        
	}
    
    
    
    
    public function assign_card($linked_no){
		$data['active_menu'] = "customer";
        if($this->input->post('customer_id') != ''){
            $customer_id = $this->input->post('customer_id');
            $old_card = $this->input->post('old_card_no');
            $new_card = $this->input->post('new_card_no');
            $card_status = $this->input->post('card_status');
            
            $data['message'] = $this->model_customer->assign_card($customer_id,$old_card,$new_card,$card_status);
            $data['edit_detail'] = $this->model_customer->edit_customer($linked_no);
            $this->load->view('customer/assign_card',$data);
            
        }else{
        
        $data['edit_detail'] = $this->model_customer->edit_customer($linked_no);
		$this->load->view('customer/assign_card',$data);
            
        }
	}
	
	public function edit_customer($linked_no){
        $data['active_menu'] = "customer";
        if($this->input->post('firstname') != ''){
            
            $firstname  =  $this->input->post("firstname");
			
			$mobileno  =  $this->input->post("mobileno");
            $mobileno2  =  $this->input->post("mobileno2");
            if($mobileno2 == ''){
                
                $mobileno2 = null;
            }
            
			$email  =  $this->input->post("email");
			$address1  =  $this->input->post("address1");
			
			$colony  =  $this->input->post("colony");
			$dob  =  $this->input->post("dob");
            $gender  =  $this->input->post("gender");
            $customer_id = $this->input->post("customer_id");
			
            
           $data['message'] =  $this->model_customer->edit_customer_submit($firstname,$mobileno,$mobileno2,$email,$address1,$colony,$dob,$gender,$customer_id);
           $data['edit_detail'] = $this->model_customer->edit_customer($linked_no);
             $data['select_colony'] = $this->model_customer->select_colony();
            $this->load->view('customer/edit_customer',$data);
        }else{
           
		   $data['edit_detail'] = $this->model_customer->edit_customer($linked_no);
             $data['select_colony'] = $this->model_customer->select_colony();
		  $this->load->view('customer/edit_customer',$data);
        }
        
        
	}
	
	public function form_submit_edit(){
					
		if(isset($_POST["card_no"])){
			
			$firstname  =  $_POST["firstname"];
			$lastname  =  $_POST["lastname"];
			$mobileno  =  $_POST["mobileno"];
            $mobileno2  =  $_POST["mobileno2"];
			$email  =  $_POST["email"];
			$address1  =  $_POST["address1"];
			$address2  =  $_POST["address2"];
			$postcode  =  $_POST["postcode"];
			$colony  =  $_POST["colony"];
			$city  =  $_POST["city"];
            $delivery_type  =  $_POST["delivery_type"];
			$advance_payment  =  $_POST["advance_payment"];
			$card_no  =  $_POST["card_no"];
		
			/* echo $firstname.$lastname.$mobileno.$email.$address1.$address2.$postcode.$colony.$city.$advance_payment.$card_no; */
			
			$this->model_customer->edit_customer_submit($firstname,$lastname,$mobileno,$mobileno2,$email,$address1,$address2,$postcode,$colony,$city,$delivery_type,$advance_payment,$card_no);
		}			
		
	}
    
    
    public function recharge_account(){
        if(isset($_POST['link_id'],$_POST['recharge_value'])){
            
			$recharge_value = $_POST['recharge_value'];
			$link_id = $_POST['link_id'];
            $r_mobile ="";
           
			$this->model_customer->recharge_account($recharge_value,$link_id,$r_mobile);
			
		}else{
            
            echo "something wrong";
        }
	}
    
    public function block_accout(){
        if(isset($_POST['link_id'])){
			$link_id = $_POST['link_id'];
			$this->model_customer->block_accout($link_id);
		}else{
            echo "something wrong";
        }
	}
    
    public function unblock_accout(){
        if(isset($_POST['link_id'])){
			$link_id = $_POST['link_id'];
			$this->model_customer->unblock_accout($link_id);
		}else{
            echo "something wrong";
        }
	}
    
	public function delete_customer(){
        if(isset($_POST['link_id'])){
			
			$link_id = $_POST['link_id'];
			$this->model_customer->delete_customer($link_id);
			
		}
	}
    
    public function customer_tran_report($id){
        
        $this->model_customer->customer_tran_report($id);
       
    } 
    
    public function customer_rech_report($id){
       
        $this->model_customer->customer_rech_report($id);
       
    } 
    
    public function delete_transaction(){
         $transaction_id =  $this->uri->segment(3);
         $customer_id =  $this->uri->segment(4);
         $this->model_customer->delete_transaction($transaction_id,$customer_id);
       
    }
    public function delete_recharge(){
         $transaction_id =  $this->uri->segment(3);
         $customer_id =  $this->uri->segment(4);
         $this->model_customer->delete_recharge($transaction_id,$customer_id);
       
    }
/*  ////////\\\\\\\\ ///////\\\\\\\\\\ */	

    
	public function enter_code(){

		$this->model_dashboard->enter_code();
	}
// //-----//////------/////--------/////////------///////
// //======= Renew Plan Section ======//////
// //-----//////------/////--------/////////-------//////	
	
	public function renew_plan(){
          $customer_id = $this->uri->segment(3);
		   
		  // echo $customer_id;
		  $this->model_customer->renew_plan($customer_id);
        
    }
	
}
