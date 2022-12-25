<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class model_inventory extends CI_Model {



	function __construct(){


       date_default_timezone_set("Asia/Calcutta");
		parent::__construct();

	}
    
    
    public function select_gst()
	{
		$this->db->select('*');
		$this->db->from('gst');
		
		$data = $this->db->get();
		return $data->result();
	}
    
     public function select_tax()
	{
		$this->db->select('*');
		$this->db->from('tax_details');
		$this->db->join('tax_type','tax_type.tax_type_id = tax_details.tax_type_id');
		$data = $this->db->get();
		return $data->result();
	}
    public function select_unit(){
        
        $this->db->select('*');
		$this->db->from('unit');
		
		$data = $this->db->get();
		return $data->result();
        
    }
    public function select_outlet()
	{
		$this->db->select('*');
		$this->db->from('outlet_details');
		
		$data = $this->db->get();
		return $data->result();
	}

	public function select_product($category_id,$subcategory_id)
	{
		    $get_category_id = $this->db->get_where('product_category',array('product_category_id' => $category_id ));
        if($get_category_id->num_rows() == 1){

					   $category_have_subcategory = $get_category_id->result()[0]->have_sub_category;

						 if($category_have_subcategory == 'yes'){

							 $this->db->select('*');
							 $this->db->from('product_details');
							 $this->db->join('product_category','product_category.product_category_id = product_details.product_category_id');
							 $this->db->join('product_sub_category','product_sub_category.product_sub_category_id = product_details.product_sub_category_id','left');

							 $this->db->where('product_details.product_category_id',$category_id);
							 $this->db->where('product_details.product_sub_category_id',$subcategory_id);
                             //**********Outlet Filter ********//
                             if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
                                 $user_outlet = $this->session->userdata('outlet_id');
                                 $this->db->where('product_category.outlet_id',$user_outlet);
                             }
                             //**********Outlet Filter ********//
                             
                             $this->db->order_by('product_id','desc');
							 $data = $this->db->get();
							 return $data->result();

						 }else if($category_have_subcategory == 'no'){
							 $this->db->select('*');
							 $this->db->from('product_details');
							 $this->db->join('product_category','product_category.product_category_id = product_details.product_category_id');

							$this->db->where('product_details.product_category_id',$category_id);
                              $this->db->order_by('product_id','desc');
							$data = $this->db->get();
							return $data->result();
						 }


				}


	}
    
    
    public function add_puchase_order($outlet,$supplier,$discount,$note,$item_details){
        
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');   
        $total_items = count(json_decode($item_details));     
        
         $arr = array(
         
              'supplier_id' => $supplier,
             
              'order_discount' => $discount,
              
              'remark' => $note,
              'item' => $total_items,
              
              'purchase_order_date' => $time_stamp,
              'outlet_id' => $outlet,
         
         );
        
        if($this->db->insert('purchase_order',$arr)){
            
            $purchase_order_id = $this->db->insert_id();
            foreach(json_decode($item_details) as $row){
                
                $arr2 = array(
                
                      'purchase_order_id'  => $purchase_order_id,
                      'product_id'  => $row->item_id,
                      'qty'  => $row->item_qty,
                      'purchase_unit_id'  => $row->purchase_unit,
                      'net_unit_cost'  => $row->item_price,
                      'discount'  => $row->discount,
                      'tax_rate'  => $row->tax_rate,
                      'tax'  => $row->tax,
                      'total'  => $row->subtotal,
                      'created_at'  => $time_stamp,
                      'updated_at'  => $time_stamp,
                
                );
                
                $this->db->insert('product_purchases_order',$arr2);
                
            }  
            
            redirect(base_url().'inventory/purchase_order_list');
            
        }else{
            redirect(base_url().'inventory/purchase_order'); 
        }
    }
    
    public function add_puchase($outlet,$supplier,$order_tax,$discount,$shipping_cost,$item_details,$purchase_order_id,$subtotal,$total_tax,$total_qty){
        
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
        $staff_id = $this->session->userdata('uid');
        $total_items = count(json_decode($item_details));
        $cal_order_tax = $subtotal * $order_tax / 100;
        $grand_total = ($subtotal + $cal_order_tax + $shipping_cost) - $discount;
        
        $this->db->where('purchase_order_id',$purchase_order_id);
        $this->db->set('purchase_order_status','received');
        
        if($this->db->update('purchase_order')){
         $arr22 = array(
           
                'purchase_order_id' => $purchase_order_id,
                'staff_id' => $staff_id,
                'outlet_id' => $outlet,
                 'supplier_id' => $supplier,
                 'item' => $total_items,
                 'total_qty' => $total_qty,
                 'total_discount' => $discount,
                 'total_tax' => $order_tax,
                
                 'total_cost' => $subtotal,
                
                 'order_tax_rate' => $order_tax,
                 'order_tax' => $cal_order_tax,
                 'order_discount' => $discount,
                 'shipping_cost' => $shipping_cost,
                 'grand_total' => $grand_total,
                 'paid_amount' => 0,
                 'status' => 0,
                 'payment_status' => 0,
                 'document' => 0,
                 'note' => 0, 
                 'created_at' => $time_stamp,
                 'updated_at' => $time_stamp,
         );    
         
        if($this->db->insert('purchases',$arr22)){  
            $purchase_id = $this->db->insert_id();
      
         foreach(json_decode($item_details) as $row){
            
              $arr33 = array(
                   'purchase_id' => $purchase_id,
                   'product_id' => $row->item_id,
                  'variant_id' => 0,
                  'qty' => $row->item_qty,
                  'recieved' => 0,
                  'purchase_unit_id' => $row->purchase_unit,
                  'net_unit_cost' => $row->item_price,
                  'discount' => $row->discount,
                  'tax_rate' => $row->tax_rate,
                  'tax' => $row->tax,
                  'total' => $row->subtotal,
                  'created_at' => $time_stamp,
                  'updated_at' => $time_stamp,
              ); 
              if($this->db->insert('product_purchases',$arr33)){
             
              $check_stock = $this->db->get_where('product_stock',array('product_id' => $row->item_id, 'outlet_id' => $outlet));
             
             if($check_stock->num_rows() > 0){
                 
               
                 $this->db->set('product_stock_qty','product_stock_qty +'.$row->item_qty,FALSE);
                 $this->db->where('product_id',$row->item_id);
                 $this->db->where('outlet_id',$outlet);
                 $this->db->update('product_stock');
                 
             }else{
                 
                 $this->db->set('product_id',$row->item_id);
                 $this->db->set('product_stock_qty',$row->item_qty);
                 $this->db->set('outlet_id',$outlet);
                 $this->db->insert('product_stock');
             }
              }else{
                  echo 'purchase product inserting failed';
              }
             
         }
          redirect(base_url().'inventory/purchase_list');    
            
        }else{
           redirect(base_url().'inventory/purchase/'.$purchase_order_id); 
        }
        }else{
           redirect(base_url().'inventory/purchase/'.$purchase_order_id); 
        }
    }
    
    public function update_purchase_product($item_id,$purchasing_price,$purchase_unit){
        
        $this->db->where('product_id',$item_id);
        $this->db->set('purchasing_price',$purchasing_price);
        $this->db->set('purchase_unit',$purchase_unit);
        if($this->db->update('product_details')){
            echo 'success';
        }else{
            echo 'failed';
        }
        
    }
    
    public function purchase_order_list(){
        
        $this->db->select('*');
        $this->db->from('purchase_order');
        $this->db->join('supplier_details','supplier_details.supplier_id = purchase_order.supplier_id');
        $this->db->order_by('purchase_order_id','desc');
        
        $data = $this->db->get();
        return $data->result();
    }
    
    public function select_puchase($purchase_id){
        $this->db->select('*');
        $this->db->from('purchases');
        $this->db->join('product_purchases','product_purchases.purchase_id = purchases.purchase_id');
        $this->db->join('product_details','product_details.product_id = product_purchases.product_id');
        $this->db->join('supplier_details','supplier_details.supplier_id = purchases.supplier_id');
         $this->db->join('unit','unit.unit_id = product_purchases.purchase_unit_id');
         $this->db->join('outlet_details','outlet_details.outlet_id = purchases.outlet_id');
        $this->db->where('purchases.purchase_id',$purchase_id);
        //$this->db->order_by('purchase_order_id','desc');
        
        $data = $this->db->get();
        return $data->result();
    }
    
    public function purchase_list(){
        
        $this->db->select('*');
        $this->db->from('purchases');
        $this->db->join('supplier_details','supplier_details.supplier_id = purchases.supplier_id');
        $this->db->order_by('purchase_id','desc');
        
        $data = $this->db->get();
        return $data->result();
    }
    
    public function select_puchase_order($purchase_order_id){
        
        $this->db->select('*');
        $this->db->from('purchase_order');
      
       $this->db->join('product_purchases_order', 'product_purchases_order.purchase_order_id = purchase_order.purchase_order_id');
        $this->db->join('product_details ','product_details.product_id = product_purchases_order.product_id');
         $this->db->join('unit ','unit.unit_id = product_purchases_order.purchase_unit_id');
         $this->db->join('supplier_details ','supplier_details.supplier_id = purchase_order.supplier_id');
        
         $this->db->join('outlet_details ','outlet_details.outlet_id = purchase_order.outlet_id');
      //  $this->db->join('unit ','unit.unit_id = purchase_order.purchase_unit_id');
          $this->db->where('purchase_order.purchase_order_id',$purchase_order_id);
        $data = $this->db->get();
        return $data->result();
    }
    
    public function select_all_supplier(){
        
        $this->db->select('*');
        $this->db->from('supplier_details');
        
        $data = $this->db->get();
        return $data->result();
        
    }
    
    public function select_all_outlet(){
         $this->db->select('*');
        $this->db->from('outlet_details');
        
        $data = $this->db->get();
        return $data->result();
        
    }
    
    public function search_product($val, $p_id,$outlet){
        $this->db->select('*');
        $this->db->from('product_details');
        $this->db->join('product_category','product_category.product_category_id = product_details.product_category_id');
        
        if($outlet){
           $this->db->where('product_category.outlet_id',$outlet);
        }
        if($val){
           $this->db->like('product_name',$val);
        }
        if($p_id){
            
            $this->db->where('product_id',$p_id);
        }
        $data = $this->db->get();
        return $data->result();
    }
    
    public function search_product_by_id($p_id){
        $this->db->select('*');
        $this->db->from('product_details');
        $this->db->join('tax_details','tax_details.tax_id = product_details.tax_id','left');
        $this->db->join('unit','unit.unit_id = product_details.purchase_unit');
        
        if($p_id){
            
            $this->db->where('product_id',$p_id);
        }
        $data = $this->db->get();
        return $data->result();
    }

	

  public function add_product($posted_category_id,$posted_subcategory_id,$product_name,$unit,$unit_price,$status,$img_name,$gst,$short_discription,$discription,$mrp_price){
       if(!$mrp_price){
           $mrp_price = $unit_price;
       }
        $arr = array(
					'product_category_id' => $posted_category_id,
					'product_sub_category_id' => $posted_subcategory_id,
					'product_name' => $product_name,
                    'short_discription' => $short_discription,
                    'discription' => $discription,
					'product_unit' => $unit,
                    'mrp_rate' => $mrp_price,
					'product_unit_price' => $unit_price,
                     'sgst' => $gst/2,
                    'cgst' => $gst/2,
					'product_img' => $img_name,
					'product_status' => $status,
                
				);
				if($this->db->insert('product_details',$arr)){
					 redirect('./product/add_product/'.$posted_category_id.'/'.$posted_subcategory_id.'/?msg=Product is successfully added.');
				}else{
					echo 'failed';
				}
	}


	public function del_product($del_id)
	{
		 $this->db->where('product_id',$del_id);
		 if($this->db->delete('product_details')){
			 echo 'success';
		 }else{
					 echo 'failed';
		 }
	}

 // List product section
    
    
    public function select_all_product(){
         $this->db->select('*,product_category.product_category_id as my_product_category_id');
         $this->db->from('product_details');
         $this->db->join('product_category','product_category.product_category_id = product_details.product_category_id');
         $this->db->join('product_sub_category','product_sub_category.product_sub_category_id = product_details.product_sub_category_id','left');
        //**********Outlet Filter ********//
         if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
              $user_outlet = $this->session->userdata('outlet_id');
              $this->db->where('product_category.outlet_id',$user_outlet);
         }
         //**********Outlet Filter ********//
         $this->db->order_by('product_id','desc');
        $data = $this->db->get();
        return $data->result();
        
    }
    
    
    public function select_product_stock($posted_category_id,$posted_subcategory_id,$product_name,$outlet_id){
        
        $this->db->select('*,product_category.product_category_id as my_product_category_id');
         $this->db->from('product_details');
         $this->db->join('product_category','product_category.product_category_id = product_details.product_category_id');
         $this->db->join('product_sub_category','product_sub_category.product_sub_category_id = product_details.product_sub_category_id','left');
        $this->db->join('product_stock','product_stock.product_id = product_details.product_id');
        //**********Outlet Filter ********//
         if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
              $user_outlet = $this->session->userdata('outlet_id');
              $this->db->where('product_category.outlet_id',$user_outlet);
         }
        
         if($posted_category_id){
             $this->db->where('product_details.product_category_id',$posted_category_id);
         }
        
        if($posted_subcategory_id){
             $this->db->where('product_details.product_sub_category_id',$posted_subcategory_id);
         }
        
        if($product_name){
             $this->db->like('product_details.product_name',$product_name);
         }
        
        if($outlet_id){
            $this->db->where('product_stock.outlet_id',$outlet_id);
            
        }
        
        if(!$posted_category_id && !$posted_subcategory_id && !$product_name){
             $this->db->limit('50');
        }
         //**********Outlet Filter ********//
         $this->db->order_by('product_details.product_id','desc');
        $data = $this->db->get();
        return $data->result();
        
    }
    
    public function select_category()
	{
		        $this->db->select('*');
				$this->db->from('product_category');
                //**********Outlet Filter ********//
                if($this->session->userdata('user_role') != 'master admin' || $this->session->userdata('outlet_id') ){
                     $user_outlet = $this->session->userdata('outlet_id');
                     $this->db->where('product_category.outlet_id',$user_outlet);
                }
                //**********Outlet Filter ********//
				$data = $this->db->get();
				return $data->result();
	}
	public function select_subcategory()
	{
		    $this->db->select('*');
				$this->db->from('product_sub_category');
				
				$data = $this->db->get();
				return $data->result();
	}

    
    // purchase list section 
    public function add_purchase_payment($purchase_id,$paying_amount,$change,$due_amount,$payment_type,$sales_account,$m_note){
        $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
        $staff_id = $this->session->userdata('uid');
        $paying_amount = $paying_amount - $change;
        
        $this->db->where('purchase_id',$purchase_id);
        $this->db->set('paid_amount','paid_amount +'.$paying_amount,FALSE);
        if($due_amount == 0){
            $this->db->set('payment_status','1');
        }
        if($this->db->update('purchases')){
            
            $arr = array(
               'user_id' => $staff_id,
                'purchase_id' => $purchase_id,
                'account_id' => $sales_account,
                'amount' => $paying_amount,
                'change' => $change,
                'paying_method' => $payment_type,
                'payment_note' => $m_note,
                'created_at' => $time_stamp,
                'updated_at' => $time_stamp,
            );
            
            if($this->db->insert('payments',$arr)){
                redirect(base_url().'/inventory/purchase_list');
            }else{
                echo 'no';
            }
            
        }else{
                echo 'no v';
            }
        
    }
    
    
    public function view_purchase_payment($purchase_id){
        
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->where('payments.purchase_id',$purchase_id);
         $this->db->join('accounts','accounts.id = payments.account_id');
        $this->db->join('staff_member','staff_member.staff_id = payments.user_id');
          $this->db->join('purchases','purchases.purchase_id = payments.purchase_id');
         $this->db->join('supplier_details','supplier_details.supplier_id = purchases.supplier_id');
        $data = $this->db->get();
        return $data->result();
    }
    
// transfer stock section
    
    
     public function select_all_main_outlet()
	{
		$this->db->select('*');
		$this->db->from('outlet_details');
		$this->db->where('outlet_type','outlet');
		$data = $this->db->get();
		return $data->result();
	}
      public function select_all_outlet_braches()
	{
		$this->db->select('*');
		$this->db->from('outlet_details');
		$this->db->where('outlet_type','branch');
		$data = $this->db->get();
		return $data->result();
	}
    
    public function transfer_stock($outlet,$branch,$status,$shipping_cost,$item_details,$subtotal,$total_tax,$total_qty){
        
         $date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
        $staff_id = $this->session->userdata('uid');
        $total_items = count(json_decode($item_details));
        
        $grand_total = ($subtotal + $shipping_cost);
      
            
         $arr22 = array(
           
               
                'staff_id' => $staff_id,
                'status' => $status,
                 'from_outlet' => $outlet,
                 'to_branch' => $branch,
                 'item' => $total_items,
                 'total_qty' => $total_qty,
                 'total_tax' => $total_tax,
                
                 'total_cost' => $subtotal,
                
                 'shipping_cost' => $shipping_cost,
                 'grand_total' => $grand_total,
                 'document' => '1',
                 'note' => '',
                 'created_at' => $time_stamp,
                 'updated_at' => $time_stamp,
                
         );    
         
        if($this->db->insert('transfer_stock_details',$arr22)){  
            $transfer_id = $this->db->insert_id();
      
         foreach(json_decode($item_details) as $row){
            
             
              $arr33 = array(
                   'transfer_id' => $transfer_id,
                   'product_id' => $row->item_id,
                  'variant_id' => 0,
                  'qty' => $row->item_qty,
                 
                  'purchase_unit_id' => $row->purchase_unit,
                  'net_unit_cost' => $row->item_price,
                 
                  'tax_rate' => $row->tax_rate,
                  'tax' => $row->tax,
                  'total' => $row->subtotal,
                  'created_at' => $time_stamp,
                  'updated_at' => $time_stamp,
              );   
             $this->db->insert('product_transfer',$arr33);
             
          }
            redirect(base_url().'inventory/transfer_stock_list');  
        }else{
            
             redirect(base_url().'inventory/transfer_stock');  
        }
    
        
    }
    
    public function transfer_stock_list(){
        
        $this->db->select('*,out.outlet_name AS from_outlet_name , bran.outlet_name AS to_branch_name');
		$this->db->from('transfer_stock_details');
        
        $this->db->join('outlet_details out','out.outlet_id = transfer_stock_details.from_outlet');
        $this->db->join('outlet_details bran','bran.outlet_id = transfer_stock_details.to_branch');
        $this->db->join('staff_member','staff_member.staff_id = transfer_stock_details.staff_id');
        $this->db->order_by('transfer_stock_details.transfer_id','desc');
        
		$data = $this->db->get();
		return $data->result();
        
    }
    
    public function view_transfer_stock($id){
        
        $this->db->select('*,out.outlet_name AS from_outlet_name , bran.outlet_name AS to_branch_name, out.outlet_address AS from_outlet_address, bran.outlet_address AS to_branch_address');
		$this->db->from('transfer_stock_details');
        
        $this->db->join('outlet_details out','out.outlet_id = transfer_stock_details.from_outlet');
        $this->db->join('outlet_details bran','bran.outlet_id = transfer_stock_details.to_branch');
        $this->db->join('staff_member','staff_member.staff_id = transfer_stock_details.staff_id');
        
        $this->db->join('product_transfer','product_transfer.transfer_id = transfer_stock_details.transfer_id');
        
         $this->db->join('product_details','product_details.product_id = product_transfer.product_id');
        $this->db->join('unit','unit.unit_id = product_transfer.purchase_unit_id');
        
        $this->db->where('transfer_stock_details.transfer_id',$id);
        
		$data = $this->db->get();
		return $data->result();
        
        
    }
}
