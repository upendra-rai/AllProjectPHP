<?php
 class projects extends CI_Controller{

 	public function projects_details(){
 		$this->load->model('projects_model');
 		$data['project_details'] = $this->projects_model->getprojects();
 		$this->load->view('projects_view',$data);
 	}
 	public function add(){

 		if($this->input->post('submit')){
  	$id=$this->input->post('id');
      $name=$this->input->post('name');
      $description=$this->input->post('description');
       $status_id=$this->input->post('status_id');
       $customer_id=$this->input->post('customer_id');
       $invoice_id=$this->input->post('invoice_id');
       $start_date=$this->input->post('start_date');
       $deadline=$this->input->post('deadline');
       $created=$this->input->post('created');
       $finished=$this->input->post('finished');
       $pinned=$this->input->post('pinned');
       $staff_id=$this->input->post('staff_id');
       // echo $product_name.$desc.$purchase_price.$sell_price.$stock.$vat.$status;

        $this->projects_model->add($id,$name,$description,$status_id,$customer_id,$invoice_id,$start_date,$deadline,$created,$finished,$pinned,$staff_id);
    }else{
    	$this->load->view('add_project');
    }  
 	}
 	
 	public function delete_project(){  
    if(isset($_POST['vv'])){

      $del_id = $_POST['vv'];
      $this->projects_model->delete_data($del_id);
    }
    //echo $sr_no;
   // 
  }

  public function edit_project(){
    $edit_id = $this->uri->segment(3);
    if($this->input->post('submit')){
  	$id=$this->input->post('id');
      $name=$this->input->post('name');
      $description=$this->input->post('description');
       $status_id=$this->input->post('status_id');
       $customer_id=$this->input->post('customer_id');
       $invoice_id=$this->input->post('invoice_id');
       $start_date=$this->input->post('start_date');
       $deadline=$this->input->post('deadline');
       $created=$this->input->post('created');
       $finished=$this->input->post('finished');
       $pinned=$this->input->post('pinned');
       $staff_id=$this->input->post('staff_id');
        echo $id.$name.$description.$status_id.$customer_id.$invoice_id;

        $this->projects_model->edit($edit_id,$id,$name,$description,$status_id,$customer_id,$invoice_id,$start_date,$deadline,$created,$finished,$pinned,$staff_id);
    }else{
     // echo $edit_id;
      $data['selected_list'] = $this->projects_model->selected_project($edit_id);
      $this->load->view('edit_project',$data);
    }   
  }
 }
?>