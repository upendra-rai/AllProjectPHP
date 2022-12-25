<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class plan extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		$this->load->library('session');
        $this->load->helper('form');
        $this->load->model('model_plan');
        if($this->session->userdata('logged_in') !== 'messcafe_login'){
			redirect('./admin/login');
		}
		
	}

	public function init($active_menu){
		$uid = $this->session->userdata('uid');
		$data['active_menu'] = $active_menu;
		return $data;
	}

	public function index(){
        $this->load->helper('form');
		$this->load->view('customer/add_customer', $data);

	}
/*  //////// Add Customer /////// */
	public function add_plan(){
        $data['active_menu'] = "plan_list";
        if($this->input->post('duraction') != ''){
            
            $plan_name = $this->input->post("plan_name");
            $duraction  =  $this->input->post("duraction");
            $cost  =  $this->input->post("cost");
            $tifin_qty  =  $this->input->post("tifin_qty");
            $per_tifin_price  =  $this->input->post("per_tifin_price");
            $shift  =  0;//$this->input->post("shift");
            
            $shift_breakfast = $this->input->post("shift_breakfast");
            if(!$shift_breakfast){
                $shift_breakfast = '';
            }else{
                $shift += 1;
            }
            
            $shift_launch = $this->input->post("shift_launch");
            if(!$shift_launch){
                $shift_launch = '';
            }else{
                $shift += 1;
            }
            
            $shift_dinner = $this->input->post("shift_dinner");
            if(!$shift_dinner){
                $shift_dinner = '';
            }else{
                $shift += 1;
            }

            $discription  =  $this->input->post("discription");
            $status = $this->input->post("status");
			
           $data['message'] =  $this->model_plan->add_plan_submit($plan_name,$duraction,$cost,$tifin_qty,$per_tifin_price,$shift,$discription,$status,$shift_breakfast,$shift_launch,$shift_dinner);
           
        }else{
           
		   $this->load->view('plan/add_plan',$data);
        }
	}
    
    public function edit_plan($id){
        $data['active_menu'] = "plan_list";
        if($this->input->post('duraction') != ''){
            
            $plan_name = $this->input->post("plan_name");
            $duraction  =  $this->input->post("duraction");
            $cost  =  $this->input->post("cost");
            $tifin_qty  =  $this->input->post("tifin_qty");
            $per_tifin_price  =  $this->input->post("per_tifin_price");
			
            $shift  =  0;//$this->input->post("shift");
            
            $shift_breakfast = $this->input->post("shift_breakfast");
            if(!$shift_breakfast){
                $shift_breakfast = '';
            }else{
                $shift += 1;
            }
            
            $shift_launch = $this->input->post("shift_launch");
            if(!$shift_launch){
                $shift_launch = '';
            }else{
                $shift += 1;
            }
            
            $shift_dinner = $this->input->post("shift_dinner");
            if(!$shift_dinner){
                $shift_dinner = '';
            }else{
                $shift += 1;
            }
            
            $discription  =  $this->input->post("discription");
            $status = $this->input->post("status");
			
           $data['message'] =  $this->model_plan->edit_plan_submit($plan_name,$duraction,$cost,$tifin_qty,$per_tifin_price,$shift,$id,$discription,$status,$shift_breakfast,$shift_launch,$shift_dinner);
           
        }else{
           $data['selected_plan'] =  $this->model_plan->selected_plan($id);
		   $this->load->view('plan/add_plan',$data);
        }
	}
    
    public function plan_list(){
          
           $data['active_menu'] = "plan";
           $data['active_submenu'] = "plan_list";
           $data['plan_list'] =  $this->model_plan->select_plan();
		   $this->load->view('plan/plan_list',$data);
    }
    
    public function delete_plan(){
                
          if(isset($_POST['del_id'])){
              
              $del_id = $_POST['del_id'];
              $this->model_plan->delete_plan($del_id);
          }
    }
    
    public function product_list(){
        $data['active_menu'] = "plan";
         $data['active_submenu'] = "product_list";
        $data['product_list'] =  $this->model_plan->select_product();
        $this->load->view('plan/product',$data);
    }
    
     public function add_product(){
        if($this->input->post('submit')){
			    $name = $this->input->post("product_name");
                $unit = $this->input->post("unit_id");
                $product_price= $this->input->post("product_price");
          //echo $name.$unit.$product_price;
			$this->model_plan->add_product($name,$unit,$product_price);
                redirect('./plan/product_list');
		}else{
		
            $data['active_menu'] = "plan";
           $data['active_submenu'] = "product_list";
           $data["unit_list"] = $this->model_plan->list_unit();
		   $this->load->view('plan/add_product',$data);
	   }
        
	}
    
    public function edit_product(){
         $product_id = $this->uri->segment(3);
        if($this->input->post('submit')){
			  $name = $this->input->post("product_name");
                $unit = $this->input->post("unit_id");
                $product_price= $this->input->post("product_price");
          // echo $name;
			$this->model_plan->edit_unit($name,$unit_id);
                redirect('./plan/product_list');
		}else{
		
            $data['active_menu'] = "plan";
            $data['active_submenu'] = "unit_details";
            $data["unit_list"] = $this->model_plan->list_unit();
            $data["select_product"] = $this->model_plan->selected_product($product_id);
		    $this->load->view('plan/add_product',$data);
	   }
        
	}
    public function delete_product(){
        if(isset($_POST["del_id"])){
			$del_id = $_POST["del_id"];
			$this->model_plan->delete_product($del_id);
		}
    }
    
    public function unit_details(){
            $data['active_menu'] = "plan";
         $data['active_submenu'] = "unit_details";
        $data['unit_list'] =  $this->model_plan->select_unit();
        $this->load->view('plan/unit',$data);
    }
 
    public function add_unit(){
        if($this->input->post('submit')){
			    $name = $this->input->post("unit_name");
          // echo $name;
			$this->model_plan->add_unit($name);
                redirect('./plan/unit_details');
		}else{
		
             $data['active_menu'] = "plan";
           $data['active_submenu'] = "unit_details";
		   $this->load->view('plan/add_unit',$data);
	   }
        
	}
    public function edit_unit(){
         $unit_id = $this->uri->segment(3);
        if($this->input->post('submit')){
			    $name = $this->input->post("unit_name");
          // echo $name;
			$this->model_plan->edit_unit($name,$unit_id);
                redirect('./plan/unit_details');
		}else{
		
            $data['active_menu'] = "plan";
            $data['active_submenu'] = "unit_details";
            $data["list_unit"] = $this->model_plan->select_list($unit_id);
		    $this->load->view('plan/add_unit',$data);
	   }
        
	}
    public function delete_unit(){
        if(isset($_POST["del_id"])){
			$del_id = $_POST["del_id"];
			$this->model_plan->delete_unit($del_id);
		}
    }
    


	public function index1(){
        $data['active_menu'] = "home";

        $this->load->helper('form');


        $this->load->view('home', $data);

	}

	public function add()
	{

		if($this->input->post('submit')){
			 $status =  $this->input->post('status');
            $img_name = $this->input->post('image_name');
			 $data["msg"] = $this->model_offer_banner->add($status,$img_name);

		}else{
		$data['active_menu'] = "manage_content";
		$data['active_submenu'] = "offer_banner";

		$data["list"] = $this->model_offer_banner->select_list();
		$this->load->view('banner/offer_banner', $data);
	}
	}

	public function edit($id)
	{

		if($this->input->post('submit')){

			 $status =  $this->input->post('status');
       $img_name = $this->input->post('image_name');
       $last_uploaded_image_name =  $this->input->post('last_uploaded_image_name');

			 if($last_uploaded_image_name != $img_name){
				  unlink('uploads/offer_banner_image/'.$unlink_img_src);
		  	}
				$data["msg"] = $this->model_offer_banner->edit($id,$status,$img_name);
		}else{
		$data['active_menu'] = "manage_content";
		$data['active_submenu'] = "offer_banner";

		$data["selected_row"] = $this->model_offer_banner->selected_row($id);
		$data["list"] = $this->model_offer_banner->select_list();
		$this->load->view('banner/offer_banner', $data);
	  }
	}

	public function del_row()
	{
		if(isset($_POST["del_id"])){
			$del_id = $_POST["del_id"];
			$data["msg"] = $this->model_offer_banner->del_row($del_id);
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
    public function service(){
            $data['active_menu'] = "Offer_banner";
            $data['active_submenu'] = "service"; 
         $data["list1"] = $this->model_offer_banner->select_app_content();
        $this->load->view('banner/service',$data);
        
    }
    public function insert_service_content(){
        if(isset($_POST['note'])){
            $note = $_POST['note'];
           //echo $note;
           $data["list"] = $this->model_offer_banner->insert_service_content($note);
        }
    }
    
    public function about(){
        $data['active_menu']="Offer_menu";
        $data['active_submenu']="about";
        $data["about_list"] = $this->model_offer_banner->select_about();
        $this->load->view('banner/about',$data);
        
    }
    public function insert_about_content(){
        if(isset($_POST['note1'])){
            $note1=$_POST['note1'];
            //echo $note1;
            
            $data["list2"] = $this->model_offer_banner->insert_about_content($note1);
        }
        
    }
}