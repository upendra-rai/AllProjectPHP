<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class add_expanse extends CI_Controller {
    
       public function add(){

             $expense_head_id = $this->uri->segment(3);
             $expense_sub_head_id = $this->uri->segment(4);
             echo $expense_head_id.$expense_sub_head_id;
                 if($this->input->post('submit')){
                 	




                 }else{
              $data['list'] = $this->add_expanse_model->add_expanse($expense_head_id,$expense_sub_head_id );
              $data['selectsubexpanse'] = $this->add_expanse_model->selectsubexpanse();
              $data['selectexpanse'] = $this->add_expanse_model->selectexpanse();
               
                 //print_r($data['list']);
                 $this->load->view('add_expanse_view',$data);
           }
      
        }
          
  }
?>