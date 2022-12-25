<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class expanse_head extends CI_Controller {
		public function index(){
  		  //$this->load->crud_model();
  		
          $data['list'] = $this->expanse_head_model->getExpanse();
  		 $this->load->view('expanse_head_view',$data);
  	}

   //###############*******#######**************############//
   //###############*******Add Expanse Details section **************############//  
   //###############*******#######**************############// 


			 public function add(){
        if($this->input->post('submit')){
               $expanse_head_name = $this->input->post('expanse_head_name');
             //  echo $expanse_head_name;
               $this->expanse_head_model->add($expanse_head_name);
           }else{
                
          			 	$data['list'] = $this->expanse_head_model->get_list();
          			 	//print_r($data) ;
          				$this->load->view('expanse_head_view',$data);
           }
			}

      public function edit(){
       
          $expanse_head_id = $this->uri->segment(3);
          if($this->input->post('submit')){
               $expanse_head_name = $this->input->post('expanse_head_name');
             //  echo $expanse_head_name;
               $this->expanse_head_model->edit($expanse_head_name,$expanse_head_id);
           }else{
                 // echo $expanse_head_id;
                  $data['selected_list'] = $this->expanse_head_model->selected($expanse_head_id);
                  $data['list'] = $this->expanse_head_model->get_list();
                 // print_r($data) ;
                  $this->load->view('expanse_head_view',$data);
           }
      }

      public function delete(){
             $expanse_head_id = $this->uri->segment(3);
               $this ->expanse_head_model->delete_data($expanse_head_id);       
          }

   //###############*******#######**************############//
   //###############*******Add Expanse Details section **************############//  
   //###############*******#######**************############//       

  		  	
	}
?>