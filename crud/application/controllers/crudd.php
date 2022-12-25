<?php

class crudd extends CI_Controller{
	
	public function index(){
		 $data['list'] = $this->modell->getAllProducts();
		$this->load->view('view',$data);
	}
	public function add(){
			if($this->input->post('submit')){
		
	  $name=$this->input->post('name');
      $price=$this->input->post('price');
       $quantity=$this->input->post('quantity');
        echo $name.$price.$quantity;

        $this->modell->addproduct($name,$price,$quantity);
  		  	}else{
		$this->load->view('add');
	}
	         
	 }
}
?>