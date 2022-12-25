<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class demo_controller extends CI_Controller {

	
	public function index(){
		$this->load->model('demo_model');

    $data['product_details']= $this->demo_model->getAllproducts();

		$this->load->view('demo_view',$data);
	}

   
   public function addproduct(){

          $sr_no=$this->input->post('sr_no');
          $image=$this->input->post('image');
          $category_name=$this->input->post('category_name');
          $sub_category=$this->input->post('sub_category');
          $status=$this->input->post('status');
          
               $config['upload_path']   = './image/'; 
         $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
         $config['max_size']      = 10000; 
         $config['max_width']     = 10241; 
         $config['max_height']    = 76800;  
         $this->load->library('upload', $config);
      
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('upload_form', $error); 
         }
      
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            $this->load->view('upload_success', $data); 
                $this->load->model('demo_model');
      $this->demo_model->insert_data($sr_no,$image,$category_name,$sub_category,$status);
         } 
         
                 $this->load->model('demo_model');
      $this->demo_model->insert_data($sr_no,$image,$category_name,$sub_category,$status);
      

         } 

       
            

          

           public function insert(){
            $this->load->view('common/insert');

          }
          public function add(){
            $this->load->view('common/add');

          }

              public function edit_ctg($sr_no){

                $sr_no = $this->uri->segment(3);


            $data['sproduct']=$this->demo_model->edit_ctg($sr_no);
            $data['product_details'] = $this->demo_model->getAllproducts();
          
            
             // $this->load->view('update_ctg',$data);

              $this->load->view('common/add',$data);


              

              } 

         public function update_ctg($sr_no){
            $sr_no=$this->input->post('sr_no');    
               $image=$this->input->post('userfile');
               $category_name=$this->input->post('category_name');
               $sub_category=$this->input->post('sub_category');
               $status=$this->input->post('status');

      $config['upload_path']   = './image/'; 
         $config['allowed_types'] = 'gif|jpg|png|jpeg'; 
         $config['max_size']      = 10000; 
         $config['max_width']     = 10241; 
         $config['max_height']    = 76800;  
         $this->load->library('upload', $config);
      
         if ( ! $this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors()); 
            $this->load->view('upload_form', $error); 
         }
      
         else { 
            $data = array('upload_data' => $this->upload->data()); 
            $this->load->view('upload_success', $data); 
         } 
         
         // $this->demo_model->update_data($sr_no,$image,$category_name,$sub_category,$status);
               // $path = ($_POST ['mob_no'] [0] . $na . "." . $b);
       
              // 


         } 



            public function delete_ctg($sr_no){

             $result=$this->demo_model->delete_ctg($sr_no);

              

          }	

	}
