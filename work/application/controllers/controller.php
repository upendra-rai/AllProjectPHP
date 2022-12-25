<?php  
  class controller extends CI_Controller{


//##############****************###############//**************//
//############## home  ###############//**************//  	
 //##############****************###############//**************// 	
  	


//##############****************###############//**************;;//
//############## add product  ###############//**************;;//  	
 //##############****************###############//**************;;// 
      
      public function add(){
		if($this->input->post('submit')){
			$product_name = $this->input->post('name');
            $product_image = $this->input->post('source_image');
            $this->source_model->add_source($product_name,$product_image);
		}else{

            $this->load->view('add');
		}
 	}

  

//##############****************###############//**************;;//
//############## edit product  ###############//**************;;//  	
 //##############****************###############//**************;;// 	 		  	
  		  	public function edit_crud(){
  		  		
                $id = $this->uri->segment(3);
                //echo $id;
                $data['selected_list']=$this->model->edit_crud($id);

 				 $data['product_details'] = $this->model->getAllProducts();
 					

              $this->load->view('update_crud',$data);
  		  	}


  		  	public function update_crud(){

               $id=$this->input->post('id');    
               $name=$this->input->post('name');
               $price=$this->input->post('price');
               $Quantity=$this->input->post('Quantity');
              //echo $id;
               $this->model->update_data($name,$price,$Quantity,$id);
  		  	}

//##############****************###############//**************;;//
//############## delete product  ###############//**************;;//  	
 //##############****************###############//**************;;// 	
  		  	public function delete_crud(){
  		  		 $id = $this->uri->segment(3);
               $this ->model->delete_data($id);
  		  		 	

  		  	}


//##############****************###############//**************;;//
//############## search bar  ###############//**************;;//  	
 //##############****************###############//**************;;// 			  	
         public function search_bar(){
         	$name=$this->input->post("search_bar");
         	//	echo $name;
           $data["product_details"]=$this->model->search_bar($name);
           $this->load->view('view',$data);
         }
  }
?>