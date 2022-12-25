<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class products1 extends CI_Controller {

	public function product_details()
  {
  	$data['product_details'] = $this->product_model->getproduct();
  		 $this->load->view('product_view',$data);
		
  }
  public function add(){
   if($this->input->post('submit')){
  	$productname=$this->input->post('productname');
      $description=$this->input->post('description');
      $image=$this->input->post('image');
       $purchase_price=$this->input->post('purchase_price');
       $sale_price=$this->input->post('sale_price');
       $stock=$this->input->post('stock');
       $vat=$this->input->post('vat');
       $status_id=$this->input->post('status_id');
       // echo $product_name.$desc.$purchase_price.$sell_price.$stock.$vat.$status;

        $this->product_model->add($productname,$description,$image,$purchase_price,$sale_price,$stock,$vat,$status_id);
    }else{
    	$this->load->view('add_view');
    }  	
  }
  public function delete_product(){  
   
    if(isset($_POST['vv'])){

      $del_id = $_POST['vv'];
      $this->product_model->delete_data($del_id);
    }
    //echo $sr_no;
   // 
  }

  public function edit_product(){
    $edit_id = $this->uri->segment(3);
           if($this->input->post('submit')){
    $productname=$this->input->post('productname');
      $description=$this->input->post('description');
      $image=$this->input->post('image');
       $purchase_price=$this->input->post('purchase_price');
       $sale_price=$this->input->post('sale_price');
       $stock=$this->input->post('stock');
       $vat=$this->input->post('vat');
       $status_id=$this->input->post('status_id');
       // echo $product_name.$desc.$purchase_price.$sell_price.$stock.$vat.$status;

        $this->product_model->edit($edit_id,$productname,$description,$image,$purchase_price,$sale_price,$stock,$vat,$status_id);
    }else{
     // echo $edit_id;
      $data['selected_list'] = $this->product_model->selected_product($edit_id);
      $this->load->view('edit_product',$data);
    }   
  }
  
}
