<?php
class product_model extends CI_model{
	
	public function getproduct(){
		$data=$this->db->get('products');
		if ($data) {
         	return $data->result();
         }
	}
	public function add($productname,$description,$image,$purchase_price,$sale_price,$stock,$vat,$status_id){

       // INSERT INTO `products` (`id`, `code`, `productname`, `description`, `productimage`, `purchase_price`, `sale_price`, `stock`, `vat`, `status_id`) VALUES (NULL, '01', 'CRM', 'Discription', 'img.jpg', '50000.00', '60000.00', '50', '15.00', 'acitve');

		$data = array(
			'productname' =>$productname,
			'description'=>$description,
			'productimage'=>$image,
			'purchase_price'=>$purchase_price,
			'sale_price'=>$sale_price,
			'stock'=>$stock,
			'vat'=>$vat,
			'status_id'=>$status_id
		 );
		echo $productname.$description.$purchase_price.$sale_price.$stock.$vat.$status_id;
 			if($this->db->insert('products',$data)){
 				echo 'success';
          redirect(base_url().'/products/product_details');
          
       }else{
          echo 'failed';

       };
	}
	public function delete_data($id){
		$this->db->where('id',$id);
    if($this->db->delete('products')){
        echo 'success';

           }else{
              echo 'failed';
           }

  }

  public function edit($edit_id,$productname,$description,$image,$purchase_price,$sale_price,$stock,$vat,$status_id){
  	$this->db->where('id',$edit_id);

  	$data = array(
			'productname' =>$productname,
			'description'=>$description,
			'productimage'=>$image,
			'purchase_price'=>$purchase_price,
			'sale_price'=>$sale_price,
			'stock'=>$stock,
			'vat'=>$vat,
			'status_id'=>$status_id
		 );
		//echo $productname.$description.$purchase_price.$sale_price.$stock.$vat.$status_id;
 			if($this->db->update('products',$data)){
 				echo 'success';
          redirect(base_url().'/products/product_details');
          
       }else{
          echo 'failed';

       };


  }

  public function selected_product($edit_id){
      $this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('products');
      $data=$this->db->get();

       return $data->result();

  }
	}


?>