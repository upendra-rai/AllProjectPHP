<?php

class model_assign extends CI_Model{

	public function getAllProducts(){
        
         $this->db->select('*');
        $this->db->from('membership');
       // $this->db->join('membership','membership.id =master. membership_id','left');
        $data=$this->db->get();
        return $data->result();

		
	}
    public function plans_details(){
        $this->db->select('*');
        $this->db->from('plans');
//       / $this->db->join('classes','classes.id =plans.id','left');
        $data=$this->db->get();
        return $data->result();
    }
public function classes_details(){
    $this->db->select('*');
    $this->db->where('id',1);
        $this->db->from('classes');
       // $this->db->join('membership','membership.id =master. membership_id','left');
        $data=$this->db->get();
        return $data->result();
}
   public function delete_details($id){
        $this->db->where('id',$id);
 		   echo $id;
 		  if($this->db->delete('membership1')){
 		  	redirect(base_url().'assign');
 		  }
 		  else{
 		  	echo "failed";
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
       public function search_bar1($price){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->like('price',$price);
        $data=$this->db->get();
        return $data->result();
       }
       public function search_bar2($quantity){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->like('quantity',$quantity);
        $data=$this->db->get();
        return $data->result();
       }
}

?>