<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class add_expanse extends CI_Controller {
    
       public function add(){
                 if($this->input->post('submit')){
                 	




                 }else{
              $data['list'] = $this->add_expanse_model->add_expanse();
              $data['selectsubexpanse'] = $this->add_expanse_model->selectsubexpanse();
              $data['selectexpanse'] = $this->add_expanse_model->selectexpanse();
                  $this->load->view('add_expanse',$data);
           }
      
        }
          
  }
?>