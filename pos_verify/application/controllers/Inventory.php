<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inventory extends CI_Controller {

	function __construct(){

		parent::__construct();

		 ini_set('max_execution_time', 0);
         ini_set('memory_limit','2048M');

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_inventory');
         $this->load->model('model_dashboard');
        if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			redirect('./admin/login');
		}
       date_default_timezone_set('Asia/Kolkata');

	}
	public function init_user(){
       $user_id = $this->session->userdata('uid');
			 $data["user_data"] = $this->model_dashboard->select_userdata($user_id);
       return $data;
	}

	public function index(){
        $data['active_menu'] = "home";
        $this->load->helper('form');
        $this->load->view('home', $data);
	}
    
    
    public function search_product(){
        
        if(isset($_POST["val"])){
            
           $val = $_POST["val"];
            $outlet = $_POST["outlet_id"];
           $p_id = '';
            
           $data["list"] = $this->model_inventory->search_product($val,$p_id,$outlet);
            
           echo json_encode($data);    
            
        }
        
    }
    
     public function search_product_by_id(){
        
        if(isset($_POST["p_id"])){
            
         
           $p_id = $_POST["p_id"];
          
           $data["list"] = $this->model_inventory->search_product_by_id($p_id);
            
           echo json_encode($data);    
            
        }
        
    }
    
    public function purchase_order(){
        
       // url segment
	     $outlet_id = $this->uri->segment(3);
		
		//url segment
        $data = $this->init_user();
		if($this->input->post('submit')){
                 
             $outlet = $this->input->post('outlet');    
             $supplier = $this->input->post('supplier');    
             //$order_tax = $this->input->post('order_tax');  
             $discount = $this->input->post('discount');    
             //$shipping_cost = $this->input->post('shipping_cost');discription
             $note = $this->input->post('discription');    
             $item_details = $this->input->post('item_details');    
 

      //$outlet.$supplier.$order_tax.$discount.$shipping_cost;
     	 $data["msg"] = $this->model_inventory->add_puchase_order($outlet,$supplier,$discount,$note,$item_details);
		}else{
		    $data['active_menu'] = "inventory";
		    $data['active_submenu'] = "add_purchase_order";
            
            $data['selected_outlet'] = $outlet_id;
            
            $data["supplier_list"] = $this->model_inventory->select_all_supplier();
            
             $data["outlet_list"] = $this->model_inventory->select_all_outlet();
            $data["tax_list"] = $this->model_inventory->select_tax();
             $data["unit_list"] = $this->model_inventory->select_unit();
	 	    $this->load->view('inventory/purchase_order', $data);
	    } 
 
    }
    
    
     public function purchase_order_invoice(){
         
          $purchase_order_id = $this->uri->segment(3);
           $data["purchase_product_list"] = $this->model_inventory->select_puchase_order($purchase_order_id);
         
          $this->load->view('inventory/purchase_order_invoice', $data);
     }
    
    public function purchase(){
        
        $purchase_order_id = $this->uri->segment(3);
      
		//url segment
        $data = $this->init_user();
		if($this->input->post('submit')){
                 
             $outlet = $this->input->post('outlet');    
             $supplier = $this->input->post('supplier');    
             $order_tax = $this->input->post('order_tax'); 
             if($order_tax == ''){
                 $order_tax = 0;
             }
            
             $discount = $this->input->post('discount');    
             $shipping_cost = $this->input->post('shipping_cost');    
             $item_details = $this->input->post('item_details'); 
             $subtotal = $this->input->post('subtotal'); 
             $total_tax = $this->input->post('total_tax'); 
             $total_qty = $this->input->post('total_qty'); 
            
      
      //$outlet.$supplier.$order_tax.$discount.$shipping_cost;
     	 $data["msg"] = $this->model_inventory->add_puchase($outlet,$supplier,$order_tax,$discount,$shipping_cost,$item_details,$purchase_order_id,$subtotal,$total_tax,$total_qty);
		}else{
		    $data['active_menu'] = "inventory";
		    $data['active_submenu'] = "purchase";
            
            $data['purchase_order_id'] = $purchase_order_id;
            
             $data["purchase_product_list"] = $this->model_inventory->select_puchase_order($purchase_order_id);
             $data["supplier_list"] = $this->model_inventory->select_all_supplier();
            
             $data["outlet_list"] = $this->model_inventory->select_all_outlet();
            $data["tax_list"] = $this->model_inventory->select_tax();
             $data["unit_list"] = $this->model_inventory->select_unit();
            //echo json_encode($data['purchase_product_list']);
	 	    $this->load->view('inventory/purchase', $data);
	    } 
        
    }
    
     public function update_purchase_product(){
       
        if(isset($_POST['item_id'])){
            
            $item_id = $_POST['item_id'];
            $purchasing_price = $_POST['item_price'];
            $purchase_unit = $_POST['unit'];
            echo $item_id.$purchasing_price.$purchase_unit;
            $data["msg"] = $this->model_inventory->update_purchase_product($item_id,$purchasing_price,$purchase_unit);
        } 
    }
	
    
    public function purchase_invoice(){
         
          $purchase_id = $this->uri->segment(3);
           $data["list"] = $this->model_inventory->select_puchase($purchase_id);
         //echo json_encode($data);
        $this->load->view('inventory/purchase_invoice', $data);
     }
    public function purchase_order_list(){
         $data = $this->init_user();
         $data['active_menu'] = "inventory";
		 $data['active_submenu'] = "purchase_order_list";
         $data["list"] = $this->model_inventory->purchase_order_list();
	 	 $this->load->view('inventory/purchase_order_list', $data);
    }
    
     public function purchase_list(){
         $data = $this->init_user();
         $data['active_menu'] = "inventory";
		 $data['active_submenu'] = "purchase_list";
         $data["list"] = $this->model_inventory->purchase_list();
	 	$this->load->view('inventory/purchase_list', $data);
    }

	public function add_purchase()
	{
    // url segment
	   $category_id = $this->uri->segment(3);
		 $subcategory_id = $this->uri->segment(4);
		//url segment
        $data = $this->init_user();
		if($this->input->post('submit')){

            $posted_category_id = $this->input->post('category');
		    $posted_subcategory_id = $this->input->post('subcategory');
            if(!$posted_subcategory_id){
				  $posted_subcategory_id = null;
			 }

             $product_name = $this->input->post('product_name');
			 $unit = $this->input->post('unit');
			 $unit_price = $this->input->post('unit_price');
			 $status =  $this->input->post('status');
             $gst =  $this->input->post('gst');
             $short_discription =  $this->input->post('short_discription');
             $discription =  $this->input->post('discription');
            
             $mrp_price =  $this->input->post('mrp_price');
            
       $img_name = $this->input->post('image_name');
       if(!$img_name){
				 $img_name = '';
			 }

      //echo $posted_category_id;
			 $data["msg"] = $this->model_product->add_product($posted_category_id,$posted_subcategory_id,$product_name,$unit,$unit_price,$status,$img_name,$gst,$short_discription,$discription,$mrp_price);
		}else{
		$data['active_menu'] = "product";
		$data['active_submenu'] = "add_product";

	 
	 	$this->load->view('inventory/add_purchase', $data);
	}
	}

     
   
// upload category image
	public function upload_image(){

	  if($_FILES["file"]["name"] != "")
      {
		 $img_folder_name = $_POST['img_folder_name'];
	   $test = explode(".", $_FILES["file"]["name"]);
	   $extension = end($test);
	   $name = rand(100,99999).strtotime(date('Y-m-d H:i:s')).bin2hex(openssl_random_pseudo_bytes(4)).'.'.$extension;
	   $location = 'uploads/'.$img_folder_name.'/'.$name;
	   move_uploaded_file($_FILES["file"]["tmp_name"], $location);
	   echo '<img src="'.base_url().$location.'" data-img_name="'.$name.'" alt="User" style="width:100% ; height:100%;"/><input type="hidden" name="image_name" value="'.$name.'" /><button type="button" class="btn" id="inlink_img_bt" data-unlink_img_src="'.$location.'" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>';

      }
	}
// upload category image

	public function unlink_image()
	{
		  if(isset($_POST['unlink_img_src'])){
          $unlink_img_src = $_POST['unlink_img_src'];
					if($unlink_img_src != ''){
		        if(unlink($unlink_img_src)){
							echo 'success';
						}else{
							echo 'failes';
						}
		 		 }
			}
	}
    
    
  public function product_stock()
	{
         $data['active_menu'] = "inventory";
		$data['active_submenu'] = "product_stock";
       
        $data = $this->init_user();
		if($this->input->post('submit')){

           $posted_category_id = $this->input->post('category');
		   $posted_subcategory_id = $this->input->post('subcategory');
           if(!$posted_subcategory_id){
				  $posted_subcategory_id = null;
			 }

            $product_name = $this->input->post('product_name');
            $outlet_id = $this->input->post('outlet');
            
            $data['selected_outlet'] = $outlet_id;
            $data['selected_category'] = $posted_category_id;
            $data['selected_subcategory'] = $posted_subcategory_id;
            $data['product_selected'] = $product_name;    
			 
			 $data["product_list"] = $this->model_inventory->select_product_stock($posted_category_id,$posted_subcategory_id,$product_name,$outlet_id);
             $data["category_list"] = $this->model_inventory->select_category();
		     $data["subcategory_list"] = $this->model_inventory->select_subcategory();
             $data["outlet_list"] = $this->model_inventory->select_outlet(); 
            $this->load->view('inventory/product_stock', $data);
		}else{
		
        $product_name = '';    
         $category_id = '';  
        $subcategory_id = '';    
        $outlet_id = ''; 
            
        $data["category_list"] = $this->model_inventory->select_category();
		$data["subcategory_list"] = $this->model_inventory->select_subcategory();    
        $data["outlet_list"] = $this->model_inventory->select_outlet();    
        
		$data["product_list"] = $this->model_inventory->select_product_stock($category_id,$subcategory_id,$product_name,$outlet_id);
		$this->load->view('inventory/product_stock', $data);
	}
	}
    
    // purchase list section
    
    public function add_purchase_payment(){
        
        if($this->input->post('submit_edit_product')){
       
            $purchase_id = $this->input->post('m_purchase_id');
            $paying_amount =  $this->input->post('m_paying_amount');
            $change = $this->input->post('m_change');
            $due_amount = $this->input->post('m_due_amount');
            $payment_type = $this->input->post('m_payment_type');
            $sales_account = $this->input->post('m_sales_account');
            $m_note =  $this->input->post('m_note');
                
            $this->model_inventory->add_purchase_payment($purchase_id,$paying_amount,$change,$due_amount,$payment_type,$sales_account,$m_note);
            
            
        }
        
    }
    
    public function view_purchase_payment(){
        
        $purchase_id = $this->uri->segment(3);
           $data["list"] = $this->model_inventory->view_purchase_payment($purchase_id);
         //echo json_encode($data);
        $this->load->view('inventory/view_purchase_payment', $data);
        
    }
    
    
    
    //  transfer stock
    
    
    public function transfer_stock(){
        
        $purchase_order_id = $this->uri->segment(3);
      
		//url segment
        $data = $this->init_user();
		if($this->input->post('submit')){
                 
             $outlet = $this->input->post('outlet');    
             $branch = $this->input->post('branch');    
             $status = $this->input->post('status');    
             $shipping_cost = $this->input->post('shipping_cost');    
             $item_details = $this->input->post('item_details'); 
             $subtotal = $this->input->post('subtotal'); 
             $total_tax = $this->input->post('total_tax'); 
             $total_qty = $this->input->post('total_qty'); 
            
      
      //$outlet.$supplier.$order_tax.$discount.$shipping_cost;
     	 $data["msg"] = $this->model_inventory->transfer_stock($outlet,$branch,$status,$shipping_cost,$item_details,$subtotal,$total_tax,$total_qty);
		}else{
		    $data['active_menu'] = "inventory";
		    $data['active_submenu'] = "transfer_stock";
            
            $data['purchase_order_id'] = $purchase_order_id;
            
             $data["purchase_product_list"] = $this->model_inventory->select_puchase_order($purchase_order_id);
             $data["supplier_list"] = $this->model_inventory->select_all_supplier();
            
             $data["outlet_list"] = $this->model_inventory->select_all_main_outlet();
             $data["outlet_branch_list"] = $this->model_inventory->select_all_outlet_braches();
            $data["tax_list"] = $this->model_inventory->select_tax();
             $data["unit_list"] = $this->model_inventory->select_unit();
            //echo json_encode($data['purchase_product_list']);
	 	    $this->load->view('inventory/transfer_stock', $data);
	    } 
        
    }
    
     public function transfer_stock_list(){
         $data = $this->init_user();
         $data['active_menu'] = "inventory";
		 $data['active_submenu'] = "transfer_stock_list";
         $data["list"] = $this->model_inventory->transfer_stock_list();
         
         //echo json_encode($data['list']);
	 	$this->load->view('inventory/transfer_stock_list', $data);
    }
    
    public function view_transfer_stock(){
        
        $id = $this->uri->segment(3);
           $data["list"] = $this->model_inventory->view_transfer_stock($id);
         //echo json_encode($data);
        $this->load->view('inventory/view_transfer_stock', $data);
        
    }
    
}
