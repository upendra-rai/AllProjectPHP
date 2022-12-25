<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class about extends CI_Controller {

    
    public function __construct()
        {
                parent::__construct();
                // Your own constructor code
               if(!$this->session->userdata('user_login')){
                	redirect(base_url().'login/login');
                }
        }
	
	public function index()
	{
		$this->load->view('octopus_view');
		
	}


	public function about_list(){

		$data['list']=$this->about_model->selectabout();

		$this->load->view('about_list',$data);
	}
	public function add_about(){

		if($this->input->post('submit')){

			$image_name = $this->input->post('image_name');

			$about = $this->input->post('about');

			$description = $this->input->post('description');

			echo $image_name;
 
            $this->about_model->add_about($image_name,$about ,$description);


		}else{

             $this->load->view('add_about');
		}
		
	}


    public function edit_about(){

         $edit_id = $this->uri->segment(3);
   
        if($this->input->post('submit')){
                 $image_name = $this->input->post('image_name');

			       $about = $this->input->post('about');

			       $description = $this->input->post('description');

                 //echo $image_name;

                 $this->about_model->edit_about($edit_id,$image_name,$about, $description);


        }else{
        	 echo $edit_id;


        	   $data['selected_list'] = $this->about_model->selected_about($edit_id);
               $this->load->view('edit_about',$data);

        }

        


    }

	public function delete_about(){
		
		$sr_no = $this->uri->segment(3);
		//echo $sr_no;

		$this->about_model->delete_data($sr_no);



	}


		// upload category image
	public function upload_image(){

	  if($_FILES["file"]["name"] != "")
      {
		 $img_folder_name = $_POST['img_folder_name'];
	   $test = explode(".", $_FILES["file"]["name"]);
	   $extension = end($test);
	   $name = rand(100,99999).strtotime(date('Y-m-d H:i:s')).bin2hex(openssl_random_pseudo_bytes(4)).'.'.$extension;
	   $location = 'upload/'.$img_folder_name.'/'.$name;
	   move_uploaded_file($_FILES["file"]["tmp_name"], $location);
	   echo '<img src="'.base_url().$location.'" data-img_name="'.$name.'" alt="User" style="width:100% ; height:100%;"/><input type="hidden" name="image_name" value="'.$name.'" /><button type="button" class="btn" id="inlink_img_bt" data-unlink_img_src="'.$location.'" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>';

      }
	}



	}