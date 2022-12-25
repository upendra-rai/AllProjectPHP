<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class store extends CI_Controller {

	function __construct(){

		parent::__construct();
         $this->load->model('model_home');

	}
    
    public function index(){
          
         $data['product_list']  = $this->model_home->selectproduct();
                $data['category_list']  = $this->model_home->selectcategory_list();
         $this->load->view('store', $data);
    }
 
	 public function store(){
           $category_id =  $this->uri->segment(3);
         
           if($category_id){
                $data['product_list']  = $this->model_home->selectproduct();
                $data['category_list']  = $this->model_home->selectcategory_list();
           }else{
               $category_id = '';
               $data['category_list']  = $this->model_home->selectcategory_list();
               
           }
           $this->load->view('store', $data);
     }
    
    
    public function filter_store(){
        
        if(isset($_POST['catgory_id'])){
            
            $category_id = $_POST['catgory_id'];
            
             $subcategory_id      =  $_POST['sub_cat_id'];
            
            //echo $category_id;
            
             $data['list']  = $this->model_home->filter_store($category_id,$subcategory_id);
            
            echo json_encode($data);
        }
    }
}
