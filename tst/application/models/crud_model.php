<?php

class crud_model extends CI_Model{

	public function getAllProducts(){

		$query=$this->db->get('product');
         if ($query) {
         	return $query->result();
         }
	}

	public function insert_data($name,$price,$quantity){
	//	echo 'ssss';
	//	echo $name.$price.$quantity;
		$arr = array(
           'name' => $name,
           'price' => $price,
            'quantity' =>  $quantity,

		);


       if($this->db->insert('product',$arr)){
          redirect(base_url().'crud');
         echo 'success';
       }else{
          echo 'failed';

       };
 
	}
	public function edit_crud($id){

        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('id',$id);
        $data=$this->db->get();
        return $data->result();
	}

    public function update_data($name,$price,$quantity,$id){

             
             $arr = array(

                    'name' => $name,
                    'price' => $price,
                    'quantity' =>  $quantity,
             );

           $this->db->where('id',$id);
           
           if($this->db->update('product',$arr)){
           	echo "succes";
           }
           else{
           	echo "failed";
           }
		}

		public function delete_data($id){
 		 echo $id;
 		  $this->db->where('id',$id);
 		  
 		  if($this->db->delete('product')){
 		  	redirect(base_url().'crud');
 		  }
 		  else{
 		  	echo "failed";
 		  }

		}
       public function search_bar($name){

        
        $this->db->select('*');
        $this->db->from('product');
        $this->db->like('name',$name);
        $data=$this->db->get();
        return $data->result();

       }
}

?>