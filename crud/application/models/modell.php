<?php

class modell extends CI_Model{
	public function getAllProducts(){
		$query=$this->db->get('product');
	
         if ($query) {
         	return $query->result();
         }
	}
	public function addproduct($name,$price,$quantity){
		$arr = array(
           'name' => $name,
           'price' => $price,
            'quantity' =>  $quantity,
            

		);
		 if($this->db->insert('product',$arr)){
		 	echo 'success';
          redirect(base_url().'view');
         
       }else{
          echo 'failed';

       };
	}
	
	
}
?>