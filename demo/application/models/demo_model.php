<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class demo_model extends CI_Model {
  
   
	
	public function getAllproducts()
	{
$query=  $this->db->select('*');
		$this->db->from('category_list');
		$data=$this->db->get();
		return $data->result(); 
  
	}
	public function insert_data($sr_no,$image,$category_name,$sub_category,$status){
	
		echo 'hello';

	     //echo $sr_no,$image,$category_name,$sub_category,$status;
		$arr = array(
				           'sr_no' => $sr_no,
				           'image' => $image,
				            'category_name' =>  $category_name,
				            'sub_category' =>  $sub_category,
				            'status' =>  $status,

		);


       if($this->db->insert('category_list',$arr)){
          redirect(base_url().'demo_controller');
         echo 'success';
       }else{
          echo 'failed';

       };
 
	}
	
	
	public function edit_ctg($sr_no){
     $this->db->where('sr_no',$sr_no);
     $query=$this->db->get('category_list');
     if($query){

    return $query->row();

     }

	}
	public function update_data($sr_no,$image,$category_name,$sub_category,$status){
		
		     $arr = array(

                    'sr_no' => $sr_no,
                    'image' => $image,
                    'category_name' =>  $category_name,
                    'sub_category' => $sub_category,
                    'status' => $status,
             );

           $this->db->where('sr_no',$sr_no);
           
           if($this->db->update('category_list',$arr)){
           	echo "succes";
            redirect(base_url().'demo_controller');
              echo "succes";
           }
           else{
           	echo "failed";
           }
		}

 	public function delete_ctg($sr_no){
 		 //echo $sr_no;
 		  $this->db->where('sr_no',$sr_no);
 		  $query=$this->db->delete('category_list');

 		  
 		  if($query){
 		  	redirect(base_url().'demo_controller');
 		  	return true;
 		  	
 		  }
 		  else{
 		  	return false;
 		  }

		}


	}



