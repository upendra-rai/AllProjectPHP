<?php

class status extends CI_Controller
{
	
	public function status_details(){
		$data['status_details'] = $this->status_model->getstatus();
		$this->load->view('status_view',$data);
	}
	public function add(){
		if($this->input->post('submit')){
			$name = $this->input->post('name');
            $this->status_model->add_status($name);
		}else{

            $this->load->view('add_status');
		}
 	}

 	public function delete_status(){		
		if(isset($_POST['vv'])){

      $del_id = $_POST['vv'];
      $this->status_model->delete_data($del_id);
    }
	}
	public function edit_status(){

    $edit_id = $this->uri->segment(3);
           if($this->input->post('submit')){
    $name=$this->input->post('name');
      
        //echo $name;

        $this->status_model->edit($edit_id,$name);
    }else{
     // echo $edit_id;
      $data['selected_list'] = $this->status_model->selected_status($edit_id);
      $this->load->view('edit_status',$data);
    }   
  }
	
}
?>