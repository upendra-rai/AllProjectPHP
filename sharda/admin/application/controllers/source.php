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
            $this->source_model->add_source($name);
		}else{

            $this->load->view('add_source');
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