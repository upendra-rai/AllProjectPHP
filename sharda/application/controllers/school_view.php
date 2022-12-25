<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class school_view extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_home');
         if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			        redirect('./admin/login');
	      	}
	}
	public function init_user(){
       $user_id = $this->session->userdata('uid');
			 $data["user_data"] = $this->model_category->select_userdata($user_id);
       return $data;
	}

	
    public function index(){
       $data['profile_details'] = $this->model_home->getprofile();
 		$this->load->view('school_view');
    }

	public function add(){
		if($this->input->post('submit')){
           $img_name = $this->input->post('profile_image');
			 $this->model_main_profile->add($img_name);

		}else{
		$this->load->view('school/add_profile');
	}
	}

	public function edit(){
		  $edit_id = $this->uri->segment(3);

		if($this->input->post('submit')){
      $img_name = $this->input->post('profile_image');
             $this->model_main_profile->edit($edit_id,$img_name);
           

		}else{
		$data["selected_profile"] = $this->model_main_profile->selected_profile($edit_id);
		$this->load->view('school/add_profile');
	  }
	}

	 public function delete(){  
    if(isset($_POST['vv'])){

      $del_id = $_POST['vv'];
      $this->model_main_profile->delete_data($del_id);
    }
    //echo $sr_no;
   // 
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
	   echo '<img src="'.base_url().$location.'" data-img_name="'.$name.'" alt="User" style="width:100% ; height:100%;"/><input type="hidden" name="profile_image" value="'.$name.'" /><button type="button" class="btn" id="inlink_img_bt" data-unlink_img_src="'.$location.'" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>';

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
    
 // list category section
    
    public function list_category()
	{

		if($this->input->post('submit')){
       $category_type = $this->input->post('category_type');
			 $category_name = $this->input->post('category_name');
			 $have_subcategory = $this->input->post('have_subcategory');

			 $status =  $this->input->post('status');
       $img_name = $this->input->post('image_name');
			 if($category_type == 'item'){
				 $data["msg"] = $this->model_category->add_category_of_items($category_name,$status,$have_subcategory,$img_name);

			 }

		}else{
		$data = $this->init_user();
		$data['active_menu'] = "category";
		$data['active_submenu'] = "list_category";

		$data["item_category_list"] = $this->model_category->select_item_category();
		$this->load->view('category/list_category', $data);
	}
	}
}
