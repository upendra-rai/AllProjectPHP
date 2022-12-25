<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class blog extends CI_Controller {

	
	public function index()
	{
		$this->load->view('octopus_view');
		
	}


	public function blog_list(){

		$data['list']=$this->blog_model->selectblog();

		$this->load->view('blog_list',$data);
	}
	public function add_blog(){

		if($this->input->post('submit')){

			$image_name = $this->input->post('image_name');

			$my_date = $this->input->post('my_date');

			$description = $this->input->post('description');

			echo $image_name;
 
            $this->blog_model->add_blog($image_name,$my_date ,$description);


		}else{

             $this->load->view('add_blog');
		}
		
	}


    public function edit_blog(){

         $edit_id = $this->uri->segment(3);
   
        if($this->input->post('submit')){
                 $image_name = $this->input->post('image_name');

                 //echo $image_name;

                 $this->blog_model->edit_blog($image_name,$edit_id);


        }else{
        	 echo $edit_id;


        	   $data['selected_list'] = $this->blog_model->selected_blog($edit_id);
               $this->load->view('edit_blog',$data);

        }

        


    }

	public function delete_blog(){
		
		$sr_no = $this->uri->segment(3);
		//echo $sr_no;

		$this->blog_model->delete_data($sr_no);



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