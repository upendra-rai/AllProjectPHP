<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class product extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		
		 

		$this->load->library('session');
         $this->load->helper('form');
        
        $this->load->model('model_dashboard');
        $this->load->model('model_product');
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
        $data['active_menu'] = "management";
        $data['active_submenu'] = "product";  
        $data["product"] = $this->model_product->select_product();
		$this->load->view('product/product',$data);

	}
   
    public function submit_product(){
        $data['active_menu'] = "management";
        $data['active_submenu'] = "product";
        if($this->input->post('myaction') != ""){
            $action = $this->input->post('myaction');
            $name = $this->input->post('product_name');
            
            if($action == 'insert'){
            
            $data['message'] = $this->model_product->add_product_submit($name); 
            $data["product"] = $this->model_product->select_product();
            $this->load->view('product/product',$data); 
            
            }else if($action == 'update'){
            
            $id =  $this->input->post('product_id');   
                
            $data['message'] = $this->model_product->update_product_submit($name,$id); 
            $data["product"] = $this->model_product->select_product();
            $this->load->view('product/product',$data); 
                
                
            }
            
        }else{
            
           $data["product"] = $this->model_product->select_product();
           $this->load->view('product/product',$data); 
        }
        
        
    }
   
  
    
    public function delete_product(){
        
        if(isset($_POST['del_id'])){
            
            $del_id = $_POST['del_id'];
            $this->model_product->delete_product($del_id);
        }
    }
}
