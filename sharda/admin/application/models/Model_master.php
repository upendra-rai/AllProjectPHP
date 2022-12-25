<?php
class model_master extends CI_model{
    
    
	//***************************Product************************************************//
    
	public function getproduct(){
		$data=$this->db->get('products');
		if ($data) {
         	return $data->result();
         }
	}
	public function add_product($productname,$description,$image,$purchase_price,$sale_price,$stock,$vat,$status_id){

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
          redirect(base_url().'/master/product_details');
          
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

  public function edit_product($edit_id,$productname,$description,$image,$purchase_price,$sale_price,$stock,$vat,$status_id){
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
          redirect(base_url().'/master/product_details');
          
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
	
//****************************End Product*****************************************************//

//***********************************Project*************************************************//
 public function getprojects(){
		$data=$this->db->get('projects');
		if ($data) {
         	return $data->result();
         }
	}
	public function add_project($id,$name,$description,$status_id,$customer_id,$invoice_id,$start_date,$deadline,$created,$finished,$pinned,$staff_id){
		$data = array(
			'id' =>$id,
			'name'=>$name,
			'description'=>$description,
			'status_id'=>$status_id,
			'customer_id'=>$customer_id,
			'invoice_id'=>$invoice_id,
			'start_date'=>$start_date,
			'deadline'=>$deadline,
			'created'=>$created,
			'finished'=>$finished,
			'pinned'=>$pinned,
			'staff_id'=>$staff_id,
		 );
		//echo $productname.$description.$purchase_price.$sale_price.$stock.$vat.$status_id;
 			if($this->db->insert('projects',$data)){
 				echo 'success';
          redirect(base_url().'/master/projects_details');
          
       }else{
          echo 'failed';

       };
	}

	public function delete_project($id){
		$this->db->where('id',$id);
    if($this->db->delete('projects')){
        echo 'success';

           }else{
              echo 'failed';
           }

  }
  public function edit_project($edit_id,$id,$name,$description,$status_id,$customer_id,$invoice_id,$start_date,$deadline,$created,$finished,$pinned,$staff_id){
  	$this->db->where('id',$edit_id);

  	$data = array(
			'id' =>$id,
			'name'=>$name,
			'description'=>$description,
			'status_id'=>$status_id,
			'customer_id'=>$customer_id,
			'invoice_id'=>$invoice_id,
			'start_date'=>$start_date,
			'deadline'=>$deadline,
			'created'=>$created,
			'finished'=>$finished,
			'pinned'=>$pinned,
			'staff_id'=>$staff_id,
		 );
		echo $id.$name.$description.$status_id.$customer_id.$invoice_id.$start_date.$deadline.$created.$finished.$pinned.$staff_id;
 			if($this->db->update('projects',$data)){
 				echo 'success';
          redirect(base_url().'/master/projects_details');
       }else{
          echo 'failed';
       };
  }
  public function selected_project($edit_id){
      $this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('projects');
      $data=$this->db->get();

       return $data->result();

  }
    
    //******************************End Project*************************************************//
    
    
    //********************************Source*****************************************************//
    public function getsource(){
		$data=$this->db->get('leadssources');
		if ($data) {
         	return $data->result();
         }
	}
  public function add_source($name){
  	$arr = array(
                'name' => $name,       
       );         
           if($this->db->insert('leadssources',$arr)){
                echo 'success';
                redirect(base_url().'/master/source_details');

           }else{
              echo 'failed';
           };
  }
  public function delete_source($id){
		$this->db->where('id',$id);
    if($this->db->delete('leadssources')){
        echo 'success';

           }else{
              echo 'failed';
           }

  }

  public function edit_source($edit_id,$name){
  	$this->db->where('id',$edit_id);

  	$data = array(
			'name' =>$name,
			
		 );
		          
 			if($this->db->update('leadssources',$data)){
 				echo 'success';
          redirect(base_url().'/master/source_details');
          
       }else{
          echo 'failed';

       };


  }
  public function selected_source($edit_id){
  	$this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('leadssources');
      $data=$this->db->get();

       return $data->result();

  }
    //**************************************************End Source*********************************//
    
    
   //****************************************Status*****************************************//
    public function getstatus(){
		$data=$this->db->get('leadsstatus');
		if ($data) {
         	return $data->result();
         }
	}
  public function add_status($name){
  	$arr = array(
                'name' => $name,       
       );         
           if($this->db->insert('leadsstatus',$arr)){
                echo 'success';
                redirect(base_url().'/master/status_details');

           }else{
              echo 'failed';
           };
  }
  public function delete_status($id){
		$this->db->where('id',$id);
    if($this->db->delete('leadsstatus')){
        echo 'success';

           }else{
              echo 'failed';
           }

  }

  public function edit_status($edit_id,$name){
  	$this->db->where('id',$edit_id);

  	$data = array(
			'name' =>$name,
			
		 );
		          
 			if($this->db->update('leadsstatus',$data)){
 				echo 'success';
          redirect(base_url().'/master/status_details');
          
       }else{
          echo 'failed';

       };


  }
  public function selected_status($edit_id){
  	$this->db->select('*');
      $this->db->where('id',$edit_id);
      $this->db->from('leadsstatus');
      $data=$this->db->get();

       return $data->result();

  }
    //***********************************************End Status********************************//
}
?>