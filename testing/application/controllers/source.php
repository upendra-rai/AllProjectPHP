<?php

class source extends CI_Controller
{
	
	public function source_details(){
		$data['source_details'] = $this->source_model->getsource();
		$this->load->view('source_view',$data);
	}
	public function add_source(){
		if($this->input->post('submit')){
			$name = $this->input->post('name');
            $image = $this->input->post('source_image');
            $this->source_model->add_source($name,$image);
		}else{

            $this->load->view('add_source');
		}
 	}
    public function upload_image(){

	  if($_FILES["file"]["name"] != "")
      {
		 $img_folder_name = $_POST['img_folder_name'];
	   $test = explode(".", $_FILES["file"]["name"]);
	   $extension = end($test);
	   $name = rand(100,99999).strtotime(date('Y-m-d H:i:s')).bin2hex(openssl_random_pseudo_bytes(4)).'.'.$extension;
	   $location = 'upload/'.$img_folder_name.'/'.$name;
	   move_uploaded_file($_FILES["file"]["tmp_name"], $location);
	   echo '<img src="'.base_url().$location.'" data-img_name="'.$name.'" alt="User" style="width:100% ; height:100%;"/><input type="hidden" name="source_image" value="'.$name.'" /><button type="button" class="btn" id="inlink_img_bt" data-unlink_img_src="'.$location.'" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>';

      }
	}


 	public function delete_source(){		
		if(isset($_POST['vv'])){

      $del_id = $_POST['vv'];
      $this->source_model->delete_data($del_id);
    }
	}
	public function edit_source(){

    $edit_id = $this->uri->segment(3);
           if($this->input->post('submit')){
    $name=$this->input->post('name');
      
        //echo $name;

        $this->source_model->edit($edit_id,$name);
    }else{
      echo $edit_id;
      $data['selected_list'] = $this->source_model->selected_source($edit_id);
      $this->load->view('edit_source',$data);
    }   
  }
	
}
?>