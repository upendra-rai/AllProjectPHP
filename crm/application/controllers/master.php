<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class master extends CI_Controller {
    
    function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_master');
         if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			        redirect('./admin/login');
	      	}
	}
    
    //******************Product******************************************************//

	public function product_details(){
        $data['active_menu'] = "master";
		$data['active_submenu'] = "product_details";
  	$data['product_details'] = $this->model_master->getproduct();
  		 $this->load->view('product_view',$data);
		
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
    //**************************************End Product******************************************//
    
    //*****************Project **************************************//
    public function projects_details(){
 		 $data['active_menu'] = "master";
		$data['active_submenu'] = "projects_details";
 		$data['project_details'] = $this->projects_model->getprojects();
 		$this->load->view('projects_view',$data);
 	}
 	public function add_project(){

 		if($this->input->post('submit')){
  	$id=$this->input->post('id');
      $name=$this->input->post('name');
      $description=$this->input->post('description');
       $status_id=$this->input->post('status_id');
       $customer_id=$this->input->post('customer_id');
       $invoice_id=$this->input->post('invoice_id');
       $start_date=$this->input->post('start_date');
       $deadline=$this->input->post('deadline');
       $created=$this->input->post('created');
       $finished=$this->input->post('finished');
       $pinned=$this->input->post('pinned');
       $staff_id=$this->input->post('staff_id');
       // echo $product_name.$desc.$purchase_price.$sell_price.$stock.$vat.$status;

        $this->projects_model->add_project($id,$name,$description,$status_id,$customer_id,$invoice_id,$start_date,$deadline,$created,$finished,$pinned,$staff_id);
    }else{
             $data['active_menu'] = "master";
		$data['active_submenu'] = "projects_details";
    	$this->load->view('add_project',$data);
    }  
 	}
 	
 	public function delete_project(){  
    if(isset($_POST['vv'])){

      $del_id = $_POST['vv'];
      $this->projects_model->delete_data($del_id);
    }
    //echo $sr_no;
   // 
  }

  public function edit_project(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
  	$id=$this->input->post('id');
      $name=$this->input->post('name');
      $description=$this->input->post('description');
       $status_id=$this->input->post('status_id');
       $customer_id=$this->input->post('customer_id');
       $invoice_id=$this->input->post('invoice_id');
       $start_date=$this->input->post('start_date');
       $deadline=$this->input->post('deadline');
       $created=$this->input->post('created');
       $finished=$this->input->post('finished');
       $pinned=$this->input->post('pinned');
       $staff_id=$this->input->post('staff_id');
        echo $id.$name.$description.$status_id.$customer_id.$invoice_id;

        $this->projects_model->edit_project($edit_id,$id,$name,$description,$status_id,$customer_id,$invoice_id,$start_date,$deadline,$created,$finished,$pinned,$staff_id);
    }else{
     // echo $edit_id;
         $data['active_menu'] = "master";
		$data['active_submenu'] = "projects_details";
      $data['selected_list'] = $this->projects_model->selected_project($edit_id);
      $this->load->view('edit_project',$data);
    }   
  }
    //**************** End Project*********************************************//
    
    
    //**************************Source*****************************************//
  public function source_details(){
       $data['active_menu'] = "master";
		$data['active_submenu'] = "source_details";
		$data['source_details'] = $this->model_master->getsource();
		$this->load->view('source_view',$data);
	}
	public function add_source(){
		if($this->input->post('submit')){
			$name = $this->input->post('name');
            $this->model_master->add_source($name);
		}else{
            $data['active_menu'] = "master";
		    $data['active_submenu'] = "source_details";
            $this->load->view('add_source',$data);
		}
 	}

 	public function delete_source(){		
		if(isset($_POST['vv'])){

      $del_id = $_POST['vv'];
      $this->model_master->delete_data($del_id);
    }
	}
	public function edit_source(){

    $edit_id = $this->uri->segment(3);
           if($this->input->post('submit')){
    $name=$this->input->post('name');
      
        //echo $name;

        $this->model_master->edit_source($edit_id,$name);
    }else{
      echo $edit_id;
               $data['active_menu'] = "master";
		$data['active_submenu'] = "source_details";
      $data['selected_list'] = $this->model_master->selected_source($edit_id);
      $this->load->view('edit_source',$data);
    }   
  }
    //********************************End Source***************************************//
    //*****************************Status*****************************************//
    
    	public function status_details(){
        $data['active_menu'] = "master";
		$data['active_submenu'] = "status_details";
		$data['status_details'] = $this->model_master->getstatus();
		$this->load->view('status_view',$data);
	}
	public function add_status(){
		if($this->input->post('submit')){
			$name = $this->input->post('name');
            $this->model_master->add_status($name);
		}else{
            $data['active_menu'] = "master";
		$data['active_submenu'] = "status_details";
            $this->load->view('add_status',$data);
		}
 	}

 	public function delete_status(){		
		if(isset($_POST['vv'])){

      $del_id = $_POST['vv'];
      $this->model_master->delete_data($del_id);
    }
	}
	public function edit_status(){

    $edit_id = $this->uri->segment(3);
           if($this->input->post('submit')){
    $name=$this->input->post('name');
      
        //echo $name;

        $this->model_master->edit_status($edit_id,$name);
    }else{
     // echo $edit_id;
        $data['active_menu'] = "master";
		$data['active_submenu'] = "status_details";
      $data['selected_list'] = $this->model_master->selected_status($edit_id);
      $this->load->view('edit_status',$data);
    }   
  }
}
