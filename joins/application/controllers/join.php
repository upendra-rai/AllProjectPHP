<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class join extends CI_Controller {

public function index(){
	
	$data['list'] = $this->join_model->head__list();
       $this->load->view('dashboard',$data);
} 
public function add(){
       $head_id = $this->uri->segment(3);
        if($this->input->post('submit')){ 
               $expanse_head_id = $this->input->post('expanse_head');
                $expanse_subhead_name = $this->input->post('expanse_subhead_name');
               echo $expanse_subhead_name;

                $this->join_model->add($expanse_head_id,$expanse_subhead_name);
                 $data['list'] = $this->join_model->get_list( $head_id);
                 $this->load->view('join_view',$data);
           }else{
                 
                  $head_id = $this->uri->segment(3);
                  $data['list'] = $this->join_model->get_list($head_id);
                   $data['headlist'] = $this->join_model->headlist();
                  $this->load->view('join_view',$data);
           }
      }

      public function edit(){
       
          $expanse_subhead_id = $this->uri->segment(3);
          if($this->input->post('submit')){
               $expanse_subhead_name = $this->input->post('expanse_subhead_name');
             //  echo $expanse_head_name;
               // $data['list'] = $this->expanse_subhead_model->get_list($head_id);
               $this->join_model->edit($expanse_subhead_name,$expanse_subhead_id);
           }else{
                 // echo $expanse_head_id;
            $head_id = $this->uri->segment(3);
                  $data['selected_list'] = $this->join_model->selected($expanse_subhead_id);
                  $data['list'] = $this->join_model->get_list($head_id);
                 // print_r($data) ;
                  $this->load->view('join_view',$data);
           }
      }

      public function delete(){
             $expanse_subhead_id = $this->uri->segment(3);
               $this ->join_model->delete($expanse_subhead_id);       
          }




}
?>