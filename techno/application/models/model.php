<?php

class model extends CI_Model{

	public function getAllProducts(){

		$query=$this->db->get('product1');
	
         if ($query) {
         	return $query->result();
         }
	}

	public function insert_data($name,$price,$product_quantity){
	//	echo 'ssss';
	//	echo $name.$price.$quantity;
		$arr = array(
           'name' => $name,
           'price' => $price,
            'quantity' =>  $porduct_quantity,

		);


       if($this->db->insert('product',$arr)){
          redirect(base_url().'controller');
         echo 'success';
       }else{
          echo 'failed';

       };
 
	}
	public function edit_crud($id){

        $this->db->select('*');
        $this->db->from('product1');
        $this->db->where('id',$id);
        $data=$this->db->get();
        return $data->result();
	}

    public function update_data($name,$price,$Product_quantity,$id){

             
             $arr = array(

                    'name' => $name,
                    'price' => $price,
                    'quantity' =>$product_quantity,
             );

           $this->db->where('id',$id);
           
           if($this->db->update('product1',$arr)){
           	echo "succes";
           }
           else{
           	echo "failed";
           }
		}

		public function delete_data($id){
 		 echo $id;
 		  $this->db->where('id',$id);
 		  
 		  if($this->db->delete('product1')){
 		  	redirect(base_url().'view');
 		  }
 		  else{
 		  	echo "failed";
 		  }

		}
       public function search_bar($name){ 

        
        $this->db->select('*');
        $this->db->from('product1');
        $this->db->like('name',$name);
        $data=$this->db->get();
        return $data->result();

       }
}

?>