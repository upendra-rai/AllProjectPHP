<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class expanse_subhead extends CI_Controller {
    public function index(){
        //$this->load->crud_model();
      
          $data['list'] = $this->expanse_subhead_model->getExpanse();
       $this->load->view('expanse_subhead',$data);
    }

   //###############*******#######**************############//
   //###############*******Add Expanse Details section **************############//  
   //###############*******#######**************############// 


       public function add(){
        if($this->input->post('submit')){ 
               $expanse_head_id = $this->input->post('expanse_head');
                $expanse_subhead_name = $this->input->post('expanse_subhead_name');
               echo $expanse_subhead_name;

                $this->expanse_subhead_model->add($expanse_subhead_name,$expanse_head_id);
                 $data['list'] = $this->expanse_subhead_model->get_list();
                 $this->load->view('expanse_subhead',$data);
           }else{
                 
                  $head_id = $this->uri->segment(3);
                  $data['list'] = $this->expanse_subhead_model->get_list($head_id);
                   $data['headlist'] = $this->expanse_subhead_model->headlist();
                  $this->load->view('expanse_subhead',$data);
           }
      }

      public function edit(){
       
          $expanse_subhead_id = $this->uri->segment(3);
          if($this->input->post('submit')){
               $expanse_subhead_name = $this->input->post('expanse_subhead_name');
             //  echo $expanse_head_name;
               // $data['list'] = $this->expanse_subhead_model->get_list($head_id);
               $this->expanse_subhead_model->edit($expanse_subhead_name,$expanse_subhead_id);
           }else{
                 // echo $expanse_head_id;
            $head_id = $this->uri->segment(3);
                  $data['selected_list'] = $this->expanse_subhead_model->selected($expanse_subhead_id);
                  $data['list'] = $this->expanse_subhead_model->get_list($head_id);
                 // print_r($data) ;
                  $this->load->view('expanse_subhead',$data);
           }
      }

      public function delete(){
             $expanse_subhead_id = $this->uri->segment(3);
               $this ->expanse_subhead_model->delete($expanse_subhead_id);       
          }

   //###############*******#######**************############//
   //###############*******Add Expanse Details section **************############//  
   //###############*******#######**************############//       

          
  }
?>