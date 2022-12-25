<?php  
  class crud extends CI_Controller{


//##############****************###############//**************//
//############## home  ###############//**************//  	
 //##############****************###############//**************// 	
  	public function index(){
  		  //$this->load->crud_model();
  		
          $data['product_details'] = $this->crud_model->getAllProducts();
  		 $this->load->view('crud_view',$data);
  	}


//##############****************###############//**************//
//############## add product  ###############//**************//  	
 //##############****************###############//**************// 	 	

  	public function addProduct(){
  		
     $name=$this->input->post('name');
      $price=$this->input->post('price');
       $quantity=$this->input->post('quantity');
        //echo $name.$price.$quantity;

        $this->crud_model->insert_data($name,$price,$quantity);


  		  	}
public function add(){

	$this->load->view('common/add');
}

//##############****************###############//**************//
//############## edit product  ###############//**************//  	
 //##############****************###############//**************// 	 		  	
  		  	public function edit_crud(){
  		  		
                $id = $this->uri->segment(3);
                //echo $id;
                $data['selected_list']=$this->crud_model->edit_crud($id);

 				 $data['product_details'] = $this->crud_model->getAllProducts();
 					

              $this->load->view('update_crud',$data);
  		  	}


  		  	public function update_crud(){

               $id=$this->input->post('id');    
               $name=$this->input->post('name');
               $price=$this->input->post('price');
               $quantity=$this->input->post('quantity');
              //echo $id;
               $this->crud_model->update_data($name,$price,$quantity,$id);
  		  	}

//##############****************###############//**************//
//############## delete product  ###############//**************//  	
 //##############****************###############//**************// 	
  		  	public function delete_crud(){
  		  		 $id = $this->uri->segment(3);
               $this ->crud_model->delete_data($id);
  		  		 	

  		  	}


//##############****************###############//**************//
//############## search bar  ###############//**************//  	
 //##############****************###############//**************// 			  	
         public function search_bar(){
         	$name=$this->input->post("search_bar");
         	//	echo $name;
           $data["product_details"]=$this->crud_model->search_bar($name);
           $this->load->view('crud_view',$data);
         }
         public function search_bar1(){
          $price=$this->input->post("search_bar1");
          //  echo $name;
           $data["product_details"]=$this->crud_model->search_bar1($price);
           $this->load->view('crud_view',$data);
         }
         public function search_bar2(){
          $quantity=$this->input->post("search_bar2");
          //  echo $name;
           $data["product_details"]=$this->crud_model->search_bar2($quantity);
           $this->load->view('crud_view',$data);
         }
      
      
      public function sheet_import(){
          $upload_file= $_FILES['upload_file']['name'];
          $extension= pathinfo($upload_file,PATHINFO_EXTENSION);
          if($extension=='csv'){
              $reader= new \PhpOffice\PhpSpreadsheed\Reader\Csv();
          }elseif($extension=='xls'){
              $reader= new \PhpOffice\PhpSpreadsheed\Reader\Xls();
          }else{
             $reader= new \PhpOffice\PhpSpreadsheed\Reader\Xlsx(); 
          }
          $spreadsheet=$reader->load($_FILES['upload_file']['tmp_name']);
          $sheetdata=$spreadsheet->getActiveSheet->toArray();
          echo '<pre>';
          print_r ($sheetdata);
      }
  }
?>
