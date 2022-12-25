<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/modal.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notifications.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.css">
    
    <style type="text/css">
        .select2-container .select2-choices .select2-search-field input, .select2-container .select2-choice, .select2-container .select2-choices {
            
            border-color:#9f9f9f;
        }
        .my_drop_down{
            width: 100%;
            position: absolute;
            z-index: 99999;
            background-color: #202233;
            margin-top: -1px;
            display: none;
        }
        .my_drop_down li{
            width: 100%;
            border-left: 1px solid #424351;
            border-right: 1px solid #424351;
            
            padding: 8px 10px;
        
        }
        .my_drop_down li:hover{
            background-color: #006a9f;
            color:#ffffff;
        }
        .my_drop_down li.active{
            background-color: #006a9f;
            color:#ffffff;
        }
        
          .search_input_i{
            width:30px;
            height: 35px;
            position: absolute;
            color: #0088cc;
            padding: 5px 9px;
        }
        
    </style>
</head>
<body>
		<section class="body">
			<!-- success message -->
			<div class="success_message">Kot Genrated Successfully</div>
			<!-- success message -->
      <?php $this->load->view("common/titlebar"); ?>

			<div class="inner-wrapper">
			  <?php $this->load->view('common/sidemenu'); ?>

				<section role="main" class="content-body" >
                    
                        <div class="col-md-12" style="padding:0px; padding-right:15px;">
					<section class="section_card">
						  <div class="panel-head" style="width:100%; height:30px; background-color:transparent; color:#dbd6d6; padding:10px 16px; ">
						      <h4 style="padding:0px; margin:0px; font-size:16px; text-transform:uppercase;">
										<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
											<?php if(isset($product_selected[0])){ echo 'Edit Product'; }else{ echo 'Add Product'; } ?>
									</h4>
						 </div>
						 <div class="panel-body" style="padding-left:0px; padding-right:0px;  background-color:#27293d; padding-top:15px; padding-bottom:0px;">
										<form class="form-horizontal form-bordered" action="" method="POST">
                                        <div class="col-md-12">
                                            
                                           <div class="col-md-3" style="display:none;">
											<div class="form-group">
												<div class="col-md-12">
                                                    <input type="hidden" value="" class="form-control" name="item_details" />
                                                    <span class="placeholder">Item Details</span>
												</div>
											</div>
						                </div> 
                                            
										<div class="col-md-3">
											<div class="form-group">
												<div class="col-md-12">
													
                                                     <select class="form-control" name="outlet"  required>
                                                     <option value="" <?php if(isset($purchase_product_list[0])){echo 'disabled'; } ?> ></option>
                                                     <?php foreach($outlet_list as $row){ ?>
                                                       <option value="<?php echo $row->outlet_id ?>" <?php if(isset($purchase_product_list[0]->outlet_id)){ if($purchase_product_list[0]->outlet_id == $row->outlet_id){ echo 'selected'; }else{ echo 'disabled'; }  } ?> ><?php echo $row->outlet_name;  ?></option>
                                                     <?php } ?>
                                                 </select><span class="placeholder">From Outlet</span>
												</div>
											</div>
						              </div>
                                            
                                        <div class="col-md-3">
											<div class="form-group">
												<div class="col-md-12">
													
                                                     <select class="form-control" name="branch"  required>
                                                     <option value="" <?php if(isset($purchase_product_list[0])){echo 'disabled'; } ?> ></option>
                                                     <?php foreach($outlet_branch_list as $row){ ?>
                                                       <option value="<?php echo $row->outlet_id ?>" <?php if(isset($purchase_product_list[0]->outlet_id)){ if($purchase_product_list[0]->outlet_id == $row->outlet_id){ echo 'selected'; }else{ echo 'disabled'; }  } ?> ><?php echo $row->outlet_name;  ?></option>
                                                     <?php } ?>
                                                 </select><span class="placeholder">To Branch</span>
												</div>
											</div>
						              </div>    
									 
									
                                 <div class="col-md-3">
										<div class="form-group">
											<div class="col-md-12">
												<select class="form-control" name="status" required>
                                                    <option></option>
                                                    <option>Received</option>
                                                    <option>Pending</option>
                                                    
                                                </select><span class="placeholder">Status</span>
											</div>
										</div>
								 </div>  
                                  
                                     <div class="col-md-3"  >
										 <div class="form-group">
											 <div class="col-md-12">
												 <input type="text" class="form-control" name="shipping_cost" value="<?php if(isset($purchase_product_list[0]->shipping_cost)){ echo $purchase_product_list[0]->shipping_cost;  } ?>" ><span class="placeholder">Shipping Cost *</span>
											 </div>
										 </div>
									</div> 
                                            
                                    <div class="col-md-3"  >
										 <div class="form-group">
											 <div class="col-md-12">
                                                 <label for="delivery_chalan" class="form-control">Choose file</label>
												 <input type="file"  name="delivery_chalan" value="" id="delivery_chalan"  style="display:none;"><span class="placeholder">Delivery Chalan</span>
											 </div>
										 </div>
									</div>   
                                            
                                    <div class="col-md-3"  >
										 <div class="form-group">
											 <div class="col-md-12">
                                               
												 <input type="text"  name="subtotal" value="" class="form-control"  required ><span class="placeholder">Grand Total</span>
											 </div>
										 </div>
									</div>   
                                            
                                    <div class="col-md-3"  style="display:none;">
										 <div class="form-group">
											 <div class="col-md-12">
                                               
												 <input type="text"  name="total_tax" value="" class="form-control"  ><span class="placeholder">Total Tax</span>
											 </div>
										 </div>
									</div>  
                                            
                                    <div class="col-md-3"  style="display:none;">
										 <div class="form-group">
											 <div class="col-md-12">
                                               
												 <input type="text"  name="total_qty" value=""  class="form-control"  ><span class="placeholder">Total Qty</span>
											 </div>
										 </div>
									</div>        
                                        	<div class="col-md-2" >
											<div class="form-group">
												<div class="col-md-12">
													<input type="submit" class="btn btn-primary" name="submit" value="submit" style=" width:100%;">
												</div>
											</div>
						      </div>
									  
                                 </div>
                                  
								
									</form>
                             
                             
                             
						</div>
                          <div class="seacrch_product" style="padding-left: 30px; padding-right: 30px; margin-bottom:15px; ">
                            <div class="form-group" style=" position:relative; width:100%;">
                                               <span class="search_input_i"><i class="fa fa-search"></i></span>
                                              <input type="text" class="form-control" value="" id="my_drop_down_input" placeholder="Barcode | Product Name" style="padding-left:30px;">
                                
                                
                                               <ul class="my_drop_down" style="list-style:none; padding:0px;">
                                                   <li class="active">Select Product</li>
                                                 
                                               </ul>
											
													<!--<select data-plugin-selectTwo class="select-control populate" id="search_item" style="background-color: #3c3f52; width: 100%;" >
                                                       
													</select> -->
											</div>
                           
                            </div>  
                        
                          <div class="panel-body " style="padding-top:0px; padding-left: 30px; padding-right: 30px;">
								   <table class="table mb-none"   style="border-bottom: 1px solid #424351;">
									 <thead>
									   	<tr>
											 <th>Sr no</th>
											 <th>Product Name</th>
								             <th>Qty</th>
                                             <th>Unit</th>
								             <th>Unit Price</th>
                                             <th>Discount</th>
											 <th>Tax</th>
											 <th>Subtotal</th>
											 <th>Edit</th>
                                             <th>Remove</th>
										</tr>
									</thead>
									<tbody class="item_table">
                                        
                                        <!--'<tr class="item_tr" data-item_id="'+my_data[0].product_id+'"  ><td>1</td><td>'+my_data[0].product_name+'</td><td><input type="number" class="form-control" value="1" name="p_qty"  style="width: 150px;" data-price="'+my_data[0].product_unit_price+'"></td> <td class="discount">'+my_data[0].product_unit_price+'</td> <td>0</td> <td class="tax">'+ gst_in_rupee +'</td> <td class="subtotal">'+my_data[0].product_unit_price+' </td> <td><button type="button" name="del" class="btn"><i class="fa fa-home"></i></button></td></tr>' -->
                                        
                                        <?php foreach($purchase_product_list as $row){ ?>
										 <tr name="item_tr_<?php echo $row->product_id; ?>" class="item_tr"  data-item_id="<?php echo $row->product_id; ?>">
                                             <td>1</td>
                                              <td class="product_name"><?php echo $row->product_name; ?></td>
                                              <td><input type="number" class="form-control" value="<?php if(isset($row->qty)){ echo $row->qty; } ?>" name="p_qty"  style="width: 100px;" data-price="<?php if(isset($row->net_unit_cost)){ echo $row->net_unit_cost; } ?>"></td>
                                             
                                             <td class="unit" data-unit_id="<?php echo $row->unit_id; ?>"><?php echo $row->unit_name; ?></td>
                                              <td class="purchasing_price"><?php if(isset($row->net_unit_cost)){ echo $row->net_unit_cost; } ?></td>
                                              <td class="discount"><?php if(isset($row->discount)){ echo $row->discount; } ?></td>
                                              <td class="tax" data-tax_rate="<?php echo $row->tax_rate; ?>" data-tax_method="<?php echo $row->tax_method; ?>"><?php if(isset($row->tax)){ echo $row->tax; } ?> </td>
                                             <td class="subtotal"><?php if(isset($row->total)){ echo $row->total; } ?> </td>
                                             
                                             <td><button type="button" name="edit" class="btn" style="color:#0088cc;"><i class="fa fa-edit"></i></button></td>
                                             
                                             <td><button type="button" name="del" class="btn" style="color:#ff4748;">X</button></td>
                                             
                                        </tr>
                                        
                                        <?php } ?>
									</tbody>
                                       
                                       <tfoot>
                                            <tr>
                                                <td>Total</td>
                                                <td></td>
                                                <td class="footer_qty"></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td class="footer_tax"></td>
                                                <td class="footer_subtotal"></td>
                                                <td></td>
                                                <td></td>
                                           </tr>
                                       </tfoot>
                                       
								</table>
							</div>
          </section>
				</div>
						<div class="col-md-12" style="padding:0px; padding-right:15px; margin-bottom:15px;"> 
						<!--<section class="section_card" id="table_section">
								 <header class="panel-heading" style="padding:0px 15px;">
								     	<div class="heading_box" style=" border-bottom: none; padding: 6px 2px; height:36px; background-color:#27293d;">
									        <h2 class="panel-title" style="color:#dbd6d6; font-size:16px; line-height:10px; text-transform:uppercase;">
														<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
														Product List <i class="ion-chevron-right" style="padding:0px 10px; color:#0088cc;"></i> <?php  if(isset($product_list[0]->product_sub_category_name)){ echo $product_list[0]->product_sub_category_name;  } ?>
														<i class="ion-chevron-right" style="padding:0px 10px; color:#0088cc;"></i>
														<?php  if(isset($product_list[0]->product_category_name)){ echo $product_list[0]->product_category_name;  } ?>
													</h2>
									    </div>
								</header> 
							  <div class="panel-body " style="padding-top:0px;">
								   <table class="table mb-none" id="table" data-toggle="table" data-pagination="true" style="border-bottom: 1px solid #424351;">
									 <thead>
									   	<tr>
											 <th>Sr no</th>
										   
											 <th>Product Name</th>

												 <th>Unit</th>
												 <th>Price</th>
                                             <th>GST</th>
											   <th class="hidden-phone">Status</th>
											   <th>Edit</th>
											   <th>Action</th>
										</tr>
									</thead>
									<tbody class="item_table">
										 
                                         
									</tbody>
								</table>
							</div>
						</section> -->
					</div>
					
		<!-- main section -->
        </section>
	 <!-- inner wrapper -->
		</div>
		<?php $this->load->view('common/sidebar_right'); ?>
		<!-- Body section -->
		</section>
		<!-- Delete confimation model -->
		          <div id="del_alert_action" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:460px; margin:auto;">
										 <div class="modal-dialog" style="width:90%;">
												 <div class="modal-content">
														 <div class="modal-close-area modal-close-df">
																 <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
														 </div>
														 <div class="modal-body" style="padding: 30px 30px; background-color:#363956; text-align:center; color:#ffffff;">
																 <span class="ion-ios-flame-outline" style="font-size:50px; color:#ff4747;"></span>
																 <h2 style="margin-top:6px;">Are You Sure!</h2>
																 <p class="fail_model_p">Do you want to delete this account?</p>
														 </div>
														 <div class="modal-footer danger-md" style=" background-color:#363956; border-top:none;">
																 <button class="btn-transparent btn-red" type="button" data-dismiss="modal" style="width:80px;">No</button>
																 <button data-del_id="" id="del_bt" class="btn-transparent btn-green" type="button"  style="width:80px; ">Yes</button>
					                                     </div>
												 </div>
										 </div>
								 </div>
    
    
    <div id="invoice" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:70vw; margin:auto;">
										 <div class="modal-dialog" style="width:90%;">
												 <div class="modal-content">
														  <div class="modal-head danger-md" style=" background-color:#3c3f52; border-top:none; border-bottom:1px solid #424351;">
                                                              <div class="row" style="padding:10px 35px;">
                                                              <div class="col-md-8" style="font-size;20px ; color:#c8c6c4;">
                                                                  <strong class="m_product_name">Product name </strong>
                                                              </div>
                                                              <div class="col-md-4" style="">
                                                                 <a class="close" data-dismiss="modal" href="#" style="color:#ff4748; text-shadow:none; opacity:1;">X</a> 
                                                              </div>
                                                              </div>
                                                         </div>
														 <div class="modal-body" style="padding: 20px; text-align:center; height:400px;  background-color:#27293d; ">
                                                                  <div class="col-md-12" style="margin-bottom:15px; display:none;">
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" name="m_product_id">
                                                                         <span class="placeholder">Product ID</span>
                                                                     </div>
                                                                </div>
                                                               
                                                            	 <div class="col-md-12" style="margin-bottom:15px">
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" name="m_product_qty">
                                                                         <span class="placeholder">Quantity</span>
                                                                     </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12" style="margin-bottom:15px">
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" name="m_unit_discount">
                                                                         <span class="placeholder">Unit Discount</span>
                                                                     </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12" style="margin-bottom:15px" >
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" name="m_unit_cost">
                                                                         <span class="placeholder">Unit Cost</span>
                                                                     </div>
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:15px" >
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" name="m_tax_method">
                                                                         <span class="placeholder">Tax Method</span>
                                                                     </div>
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:15px">
                                                                     <div class="form-group" style="position:relative;">
                                                                         
                                                                         <select class="form-control" name="m_tax_rate" required>
                                                                            <option value=""></option>
                                                                            <?php foreach($tax_list as $row){ ?>
                                                                            <option value="<?php echo $row->tax_rate; ?>"><?Php echo $row->tax_type_name.' '.$row->tax_rate; ?> % </option>
                                                                            <?php } ?>

                                                                        </select>
                                                                         
                                                                         <span class="placeholder" >Tax Rate</span>
                                                                     </div>
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:15px">
                                                                     <div class="form-group" style="position:relative;">
                                                                         <select class="form-control" name="m_product_unit" required>
                                                                            <option value=""></option>
                                                                            <?php foreach($unit_list as $row){ ?>
                                                                            <option value="<?php echo $row->unit_id; ?>"><?Php echo $row->unit_name; ?></option>
                                                                            <?php } ?>

                                                                        </select>
                                                                        
                                                                         <span class="placeholder">Product Unit</span>
                                                                    </div></div>
														      <div class="col-md-12" style="margin-bottom:15px">
                                                                     <div class="form-group" style="text-align:left; ">
                                                                         <button type="button" class="btn-transparent btn-blue" name="submit_edit_product">Submit</button>
                                                                    </div></div>
                                                       
												 </div>
										 </div>
								 </div>
    
    </div>

<?php $this->load->view('common/footer_script'); ?>
<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/image-compressor.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notification-active.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    
   // calculate item table footer total
    
    function cal_item_table_total(){
        
        var total_qty = 0;
        var total_subtotal = 0;
        var total_tax = 0;
        // qty
        $('input[name=p_qty]').each(function(){
            var qty =  $(this).val();
           
            total_qty += Math.abs(qty);
        });
        
        // subtotal
        
        $('.subtotal').each(function(){
            var subtotal = $(this).html();
            total_subtotal += Math.abs(subtotal);
        });
        
        // tax
        $('.tax').each(function(){
           var tax =  $(this).html();
           total_tax += Math.abs(tax); 
        });
        
        $('.footer_qty').html(total_qty.toFixed(2));
        $('.footer_subtotal').html(total_subtotal.toFixed(2));
        $('.footer_tax').html(total_tax.toFixed(2));
        
        // product details data
        var product_details_arr = [];
        
        
        $('.item_tr').each(function(){
            
            var item_id = $(this).data('item_id');
            var item_qty = $(this).find('input[name=p_qty]').val();
            var item_price =   $(this).find('input[name=p_qty]').data("price");
            var tax  = $(this).find('.tax').text();
            var tax_rate  = $(this).find('.tax').data('tax_rate');
            var subtotal = $(this).find(".subtotal").html();
            var discount = $(this).find(".discount").html();
            var purchase_unit = $(this).find(".unit").data('unit_id');
         
            // alert(item_id+item_qty+tax+subtotal);
            product_details_arr.push({item_id:item_id,item_qty:item_qty,purchase_unit:purchase_unit,item_price:item_price,discount:discount,tax_rate:tax_rate,tax:tax,subtotal:subtotal});
            
        });
        
        //console.log(product_details_arr);
        
        var str_product_details_arr = JSON.stringify(product_details_arr);
        
          $('input[name=item_details]').val(str_product_details_arr);
          $('input[name=subtotal]').val(total_subtotal.toFixed(2));
          $('input[name=total_tax]').val(total_tax.toFixed(2));
          $('input[name=total_qty]').val(total_qty.toFixed(2));
        
       
     
    }
    cal_item_table_total();
    
    $(document).on('click','button[name=edit]',function(){
            var item_id = $(this).parent().parent('.item_tr').data('item_id');
            var item_name = $(this).parent().parent('.item_tr').find('.product_name').text();
            var item_qty = $(this).parent().parent('.item_tr').find('input[name=p_qty]').val();
            var item_price =   $(this).parent().parent('.item_tr').find('input[name=p_qty]').data("price");
            
            var tax_rate  = $(this).parent().parent('.item_tr').find('.tax').data('tax_rate');
            var tax_method  = $(this).parent().parent('.item_tr').find('.tax').data('tax_method');
            //var subtotal = $(this).find(".subtotal").html();
            var discount = $(this).parent().parent('.item_tr').find(".discount").html();
        
            var unit = $(this).parent().parent('.item_tr').find(".unit").data('unit_id');
        alert(tax_method);
        
        $('.m_product_name').text(item_name);
        $('input[name=m_product_id]').val(item_id);      
        $('input[name=m_product_qty]').val(item_qty);
        $('input[name=m_unit_cost]').val(item_price);
       
         $('select[name=m_tax_rate]').val(tax_rate);
        $('input[name=m_tax_method]').val(tax_method);
          $('select[name=m_product_unit]').val(unit);
         $('input[name=m_unit_discount]').val(discount);
         
        $('#invoice').modal('toggle'); 
        
    });
    
       
    $(document).on('click','button[name=submit_edit_product]',function(){

        var item_id =  $('input[name=m_product_id]').val();      
        var item_qty =  $('input[name=m_product_qty]').val();
        var item_price =  $('input[name=m_unit_cost]').val();
        var tax_rate =  $('select[name=m_tax_rate]').val();
        var tax_method =  $('input[name=m_tax_method]').val();
        var unit =   $('select[name=m_product_unit]').val();
        var unit_name =   $('select[name=m_product_unit] option:selected').text();
        var discount =  $('input[name=m_unit_discount]').val();
        
        var cal_unit_tax = Math.abs(item_price) *  Math.abs(tax_rate) / 100;
        var cal_tax = Math.abs(cal_unit_tax) * Math.abs(item_qty);
        
     
        if(tax_method == 1){
          
            var cal_item_price = Math.abs(item_price);
            var subtotal = ( Math.abs(cal_item_price) * Math.abs(item_qty) + Math.abs(cal_tax) ) - Math.abs(discount);
        
        }else if(tax_method == 2){
            
            var cal_item_price = Math.abs(item_price)  - Math.abs(cal_unit_tax);
            var subtotal = ( Math.abs(cal_item_price) * Math.abs(item_qty) + Math.abs(cal_tax) ) - Math.abs(discount);
        
            
        }
        
        $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>inventory/update_purchase_product',
				 data:{item_id:item_id,item_price:item_price,unit:unit},
				 success:function(html){
				    
                     
                     $('tr[name=item_tr_'+item_id+']').find('input[name=p_qty]').val(item_qty);
                     
                     $('tr[name=item_tr_'+item_id+']').find('input[name=p_qty]').data("price",cal_item_price.toFixed(2));
                     
                     $('tr[name=item_tr_'+item_id+']').find(".unit").data('unit_id',unit);
                     
                    $('tr[name=item_tr_'+item_id+']').find(".unit").text(unit_name);
                     
                    $('tr[name=item_tr_'+item_id+']').find(".tax").data('tax_rate',tax_rate);
                     
                     $('tr[name=item_tr_'+item_id+']').find(".tax").text(cal_tax.toFixed(2));
                    $('tr[name=item_tr_'+item_id+']').find(".purchasing_price").text(cal_item_price.toFixed(2));
                    $('tr[name=item_tr_'+item_id+']').find(".discount").text(Math.abs(discount).toFixed(2));
                    //    alert(subtotal);
                     $('tr[name=item_tr_'+item_id+']').find(".subtotal").text(subtotal.toFixed(2));
                     cal_item_table_total();
                     $('#invoice').modal('toggle'); 
				 }
			});
    });
    
    
      $(document).on('keydown','#my_drop_down_input',function(){
           
           var key  = event.which;
           
           if(key === 38){
                var index = $('.my_drop_down li.active').index();
                var next_index = Math.abs(index - 1);
                
                $('.my_drop_down li').eq(next_index).addClass('active');
                $('.my_drop_down li').eq(index).removeClass('active');
           }
           
           
           if(key === 40){
               
                var index = $('.my_drop_down li.active').index();
                var next_index = Math.abs(index + 1);
                
                $('.my_drop_down li').eq(next_index).addClass('active');
                $('.my_drop_down li').eq(index).removeClass('active');
              
               
           }
           
             if(key === 13){
                 $('.my_drop_down li.active').click();
                 
             }
       });
     // set scroll position
		 $(document).on('keyup','#my_drop_down_input',function(){
             var key  = event.which;
             if(key !== 38 && key !== 40 && key !== 13){
             
             var val = $(this).val();
              var outlet_id =   $('select[name=outlet]').val();  
                 
               
              if(outlet_id){
             $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>inventory/search_product',
				 data:{val:val,outlet_id:outlet_id},
				 success:function(html){
				     var my_data = JSON.parse(html).list;
                   
                    // console.log(my_data);
                       $('.my_drop_down').html('').show();
                     for(var i = 0; i < my_data.length; i++ ){
                         
                         
                         $('.my_drop_down').append('<li value="'+my_data[i].product_id+'">'+my_data[i].product_name+'</li>');
                         //$('.my_drop_down li').eq(0).addClass('active');
                     }

				 }
			});
             }else{
                 $('select[name=outlet]').css('border','1px solid red');
             }
             }
           
         });
    
       $(document).on('click','.my_drop_down li',function(){
            
           var p_id = $(this).val();
           $('.my_drop_down').hide().html('');
            $('#my_drop_down_input').val('');
           
           
           var check_tr = 'item_tr_'+p_id;
           var check = $('.item_table').find('tr[name = '+check_tr+']').length;
           alert(check);
           if(check){
               
           }else{
           //alert(p_id);
             $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>inventory/search_product_by_id',
				 data:{p_id:p_id},
				 success:function(html){
				     var my_data = JSON.parse(html).list;
                    
                     var tax_method = my_data[0].tax_method;
                     
                     
                     // convert gst in rupee
                     var gst = (Math.abs(my_data[0].sgst) +Math.abs(my_data[0].cgst));
                     var gst_in_rupee = Math.abs(gst) * Math.abs(my_data[0].product_unit_price) / 100;
                     
                     var purchase_price = my_data[0].purchasing_price;
                     var tax_rate = Math.abs(my_data[0].tax_rate);
                     var tax  = Math.abs(purchase_price) * Math.abs(tax_rate) / 100;
                      
                     if(tax_method == 1){
                      var cal_purchase_price = purchase_price;
                      var my_subtotal = Math.abs(tax) + Math.abs(purchase_price);
                         
                     }else if(tax_method == 2){
                       var cal_purchase_price = Math.abs(purchase_price) - Math.abs(tax);  
                       var my_subtotal = Math.abs(cal_purchase_price) + Math.abs(tax);
                         
                        
                      }
                     
                      $('.item_table').find('tr[class=no-records-found]').remove();
                      $('.item_table').append('<tr class="item_tr" name="item_tr_'+my_data[0].product_id+'" data-item_id="'+my_data[0].product_id+'"  ><td>1</td><td class="product_name">'+my_data[0].product_name+'</td><td><input type="number" class="form-control" value="1" name="p_qty"  style="width: 100px;" data-price="'+Math.abs(cal_purchase_price).toFixed(2)+'"></td><td class="unit" data-unit_id="'+my_data[0].unit_id+'">'+my_data[0].unit_name+'</td> <td class="purchasing_price">'+Math.abs(cal_purchase_price).toFixed(2)+'</td> <td class="discount">0</td> <td class="tax" data-tax_rate="'+tax_rate+'" data-tax_method="'+tax_method+'">'+ Math.abs(tax).toFixed(2) +'</td> <td class="subtotal">'+ Math.abs(my_subtotal).toFixed(2) +' </td>  <td><button type="button" name="edit" class="btn" style="color:#0088cc;"><i class="fa fa-edit"></i></button></td><td><button type="button" name="del" class="btn" style="color:#ff4748;">X</button></td></tr>');
                     
                       cal_item_table_total();

				 }
			});
           }
       });
    
  
  
    
    
    
    
    // ==========================
    
        
      $(document).on('change','input[name=p_qty]',function(){
          var qty = $(this).val();
          var price = $(this).data("price");
          var tax_rate = $(this).parent().parent().find('.tax').data('tax_rate');
          var discount = $(this).parent().parent().find('.discount').text();
          
          var cal_price = Math.abs(qty) * Math.abs(price);
          var cal_tax = cal_price * Math.abs(tax_rate) / 100;
          var subtotal = ( cal_price + cal_tax ) - Math.abs(discount);
          $(this).parent().parent().find('.subtotal').html(subtotal.toFixed(2));  
          $(this).parent().parent().find('.tax').text(cal_tax.toFixed(2));           
          cal_item_table_total();
      });
    
      $(document).on('keyup','input[name=p_qty]',function(){
          var qty = $(this).val();
          var price = $(this).data("price");
          var tax_rate = $(this).parent().parent().find('.tax').data('tax_rate');
          var discount = $(this).parent().parent().find('.discount').text();
          
          var cal_price = Math.abs(qty) * Math.abs(price);
          var cal_tax = cal_price * Math.abs(tax_rate) / 100;
          var subtotal = cal_price + cal_tax - Math.abs(discount);
          $(this).parent().parent().find('.subtotal').html(subtotal.toFixed(2));  
          $(this).parent().parent().find('.tax').text(cal_tax.toFixed(2));
         cal_item_table_total();
          
      });
    
     // remover item tr
    
    $(document).on('click','button[name=del]',function(){
         $(this).parent().parent().remove();
         cal_item_table_total();
    });
    
    
    // get purchase order id 
    
    $(document).on('keydown','input[name=purchase_order_number]',function(e){
        
       var val = $(this).val();    
        
       if (e.keyCode == 13) {
          
            window.location.href = '<?php echo base_url(); ?>/inventory/purchase/'+val;
        }
    });
    
    
});
</script>
</body>
</html>
