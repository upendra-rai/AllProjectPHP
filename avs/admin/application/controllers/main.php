<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class main extends CI_Controller {

	
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


	public function main_list(){

		$data['list']=$this->main_model->selectmain();

		$this->load->view('main_list',$data);
	}
	public function add_main(){

		if($this->input->post('submit')){

			$image_name = $this->input->post('image_name');

			$main = $this->input->post('name');

			$description = $this->input->post('description');

			echo $image_name;
 
            $this->main_model->add_main($image_name,$main ,$description);


		}else{

             $this->load->view('add_main');
		}
		
	}


    public function edit_main(){

         $edit_id = $this->uri->segment(3);
   
        if($this->input->post('submit')){
                 $image_name = $this->input->post('image_name');

			       $name = $this->input->post('name');

			       $description = $this->input->post('description');

                 //echo $image_name;

                 $this->main_model->edit_main($edit_id,$image_name,$name, $description);


        }else{
        	 echo $edit_id;


        	   $data['selected_list'] = $this->main_model->selected_main($edit_id);
               $this->load->view('edit_main',$data);

        }

        


    }

	public function delete_main(){
		
		$sr_no = $this->uri->segment(3);
		//echo $sr_no;

		$this->main_model->delete_data($sr_no);



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