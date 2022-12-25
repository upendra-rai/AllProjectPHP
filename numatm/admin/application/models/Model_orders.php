<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_orders extends CI_Model {
	function __construct(){
		parent::__construct();
	}



public function orders($start,$end,$name,$mobile_no,$status)
{
	 $this->db->select('*');
	 $this->db->from('online_orders');
	 $this->db->join('customer','customer.customer_id = online_orders.customer_id','left');
     $this->db->join('staff_member','staff_member.staff_id = online_orders.delivery_person','left');
     $this->db->join('order_item_details','order_item_details.online_order_id = online_orders.online_order_id');
	 $this->db->join('product','product.product_id = order_item_details.product_id');
  
    
    if($start != ''){
         $start = date('Y-m-d',strtotime($start));
         $this->db->where('date(online_orders.online_order_date) >=',$start);
    }
    
    if($end != ''){
        $end = date('Y-m-d',strtotime($end));
        $this->db->where('date(online_orders.online_order_date) <=',$end);
    }
    
    if($name != ''){
         $this->db->like('customer_details.customer_name',$name);
        
    }
    
    if($mobile_no != ''){
         $this->db->like('customer_details.contact_1',$mobile_no);
        
    }
    
    if($status != ''){
         $this->db->where('order_status',$status);
        
    }
    
    
    
     $this->db->order_by('online_orders.online_order_id','desc');
    $this->db->limit(100);
	 $data = $this->db->get();
 	return $data->result();
}

public function order_details($order_id)
{
	$this->db->select('*');
	$this->db->from('online_orders');
	$this->db->join('customer_details','customer_details.customer_id = online_orders.customer_id');

	$this->db->where('online_orders.online_order_id',$order_id);
	$data = $this->db->get();
	return $data->result();
}

public function order_accept_or_reject($order_id,$action){
    $this->db->where('online_orders.online_order_id',$order_id);
    $this->db->set('order_status',$action);
    if($this->db->update('online_orders')){
         echo 'success';
        
            //redirect('./orders/'.$return_href);
        
    }else{
        
        echo 'failed';
        //redirect('./orders/'.$return_href);
    }
}
    
public function order_dispatch_and_assign($order_id,$action,$delivery_person){
    $this->db->where('online_orders.online_order_id',$order_id);
    $this->db->set('order_status',$action);
    if($action == 'dispatched'){
        $this->db->set('delivery_person',$delivery_person);
    }
    
    if($this->db->update('online_orders')){
          echo 'success';
        
    }else{
          echo 'failed';
    }
}    

public function change_order_delivery_person($order_id,$delivery_person,$return_href){
    $this->db->where('online_orders.online_order_id',$order_id);
    $this->db->set('delivery_person',$delivery_person);
    if($this->db->update('online_orders')){
            redirect('./orders/'.$return_href);
        
    }else{
        redirect('./orders/'.$return_href);
    }
    
}    
    
public function order_item_details($order_id)
{
	$this->db->select('*');
	$this->db->from('online_orders');
	$this->db->where('online_orders.online_order_id',$order_id);
	$data = $this->db->get();
	return $data;
}


public function accept_orders($order_id,$status)
{
		$this->db->where('online_order_id',$order_id);
		$this->db->set('order_status', $status);
		if($this->db->update('online_orders')){
			echo 'success';
		}else {
			echo 'failed';
		}
}


public function count_orders(){
	$this->db->select('count(online_order_id) AS total');
	$this->db->from('online_orders');
	$this->db->where('online_orders.order_status','');
	$new_order = $this->db->get();
  $n = $new_order->result();

	$this->db->select('count(online_order_id) AS total');
	$this->db->from('online_orders');
	$this->db->where('online_orders.order_status','placed');
	$placed_order = $this->db->get();
	$p = $placed_order->result();

	$this->db->select('count(online_order_id) AS total');
	$this->db->from('online_orders');
	$this->db->where('online_orders.order_status','completed');
	$completed_order = $this->db->get();
	$c = $completed_order->result();

	$this->db->select('count(online_order_id) AS total');
	$this->db->from('online_orders');
	$this->db->where('online_orders.order_status','canceled');
	$canceled_order = $this->db->get();
	$cn = $canceled_order->result();

	return array(
			'new_order_count' => $n,
			'placed_order_count' => $p,
			'completed_order_count' => $c,
			'canceled_order_count' => $cn,
	);

}

    
public function all_delivery_person($user_id){
    
    $check_user = $this->db->get_where('staff_member',array('staff_id' => $user_id));
    
    if($check_user->num_rows() == 1){
        
            $outlet_id = $check_user->result()[0]->outlet_id;
            
            $this->db->select('*');
	        $this->db->from('staff_member');
	        $this->db->where('staff_member.role','delivery');
            
            //**********Outlet Filter ********//
            if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id')){
                 $user_outlet = $this->session->userdata('outlet_id');
                 $this->db->where('staff_member.outlet_id',$user_outlet);
            }
            //**********Outlet Filter ********//
        
	        $data = $this->db->get();
	        return $data->result();
        
    }
    
    
    
}
    public function selected_product($product_id){
        $this->db->select('*');
        $this->db->from('product');
        $this->db->where('product.product_id',$product_id);
          $data = $this->db->get();
	        return $data->result();
    }
    public function get_operator_coder($operator_code){
         $this->db->select('*');
        $this->db->from('service_provider');
        $this->db->where('service_provider_code',$operator_code);
          $data = $this->db->get();
	        return $data->result();
        //print_r($data->result());
       /* if($data->num_rows()==1){
            return $data->result()[0]->service_provider_name;
        }*/
    }
    public function get_circle_code($circle_code){
        $this->db->select('*');
        $this->db->from('service_area_code');
        $this->db->where('service_area_code',$circle_code);
       $data = $this->db->get();
	        return $data->result();
    }
    public function add_upc($product_id,$service_provider,$circle,$upc_code,$generation_date,$expiry_date){
         $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
        $generation_date = date('Y-m-d',strtotime($generation_date));
        $expiry_date = date('Y-m-d',strtotime($expiry_date));
        $arr = array(
            'service_provider' => $service_provider,
            'circle' => $circle,
            'product_id' => $product_id,
            'upc_code' => $upc_code,
            'generation_date' => $generation_date,
            'expiry_date' => $expiry_date,
            'created_date'=> $time_stamp,
     );
         //echo $product_id.$service_provider.$circle.$upc_code.$generation_date.$expiry_date;
      if($this->db->insert('uploaded_upc',$arr)){
          
          redirect(base_url().'/orders/orders');
          
        
          
       }else{
          echo 'failed';

       };
    }

}
