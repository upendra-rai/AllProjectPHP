<?php  
  class controller extends CI_Controller{


//##############****************###############//**************//
//############## home  ###############//**************//  	
 //##############****************###############//**************// 	
  	public function index(){
  		  //$this->load->model();
  		
          $data['product_details'] = $this->model->getAllProducts();
  		 $this->load->view('view',$data);
  	}


//##############****************###############//**************;;//
//############## add product  ###############//**************;;//  	
 //##############****************###############//**************;;// 	 	

  	public function addProduct(){
  		
     $name=$this->input->post('name');
      $price=$this->input->post('price');
       $Quantity=$this->input->post('Quantity');
        //echo $name.$price.$quantity;

        $this->model->insert_data($name,$price,$Quantity);


  		  	}
public function add(){

	$this->load->view('');
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