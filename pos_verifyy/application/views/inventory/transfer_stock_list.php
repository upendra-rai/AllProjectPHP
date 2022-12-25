<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/modal.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notifications.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.css">
    <style type="text/css">
        .form-group{
            padding: 0px;
        }    
        
       .form-group .form-control{
           
         width: 100%;  
         padding-left: 30px;
         border:1px solid #43444a;
       }
        .form-group .form-control:option{
            padding: 10px;
        }
        
        .status{
            margin-bottom: 0px;
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
						<div class="col-md-12" style="padding:0px; margin-bottom:15px;">
						<section class="section_card" id="table_section">
                <div class="row">
                    <form action="" method="post">
                 <div class="panel-body " style="padding-top:5px;">
                    <div class="col-md-5" style="padding:6px; padding-left:15px;">
                    <div class="form-group">						
				       	<div class="input-daterange input-group"  data-plugin-datepicker style="width:100%;" >
				       		<span class="input-group-addon">
				       			<i class="fa fa-calendar"></i>
				       		</span>
				       		<input type="text" class="form-control" name="start" value="<?php if(isset($return_start)){ echo $return_start; } ?>" placeholder="dd-mm-yyyy" style="text-align:left;" autocomplete="off">
				       		<span class="input-group-addon">to</span>
				       		<input type="text" class="form-control" name="end" value="<?php if(isset($return_end)){ echo $return_end; } ?>" placeholder="dd-mm-yyyy" style="text-align:left;" autocomplete="off">
				       	</div>
                     </div>
                   </div> 
                     
                   <div class="col-md-2" style="padding:6px; padding-left:15px;">
                     <div class="form-group">
                          <span class="search_input_i"><i class="fa fa-search"></i></span>
                          <input type="text" class="form-control" name="name" placeholder="Name" value="<?php if(isset($return_name)){ echo $return_name; } ?>" >
                     </div>
                   </div>
                   <div class="col-md-2" style="padding:6px;">
                     <div class="form-group">
                          <span class="search_input_i"><i class="fa fa-search"></i></span>
                          <input type="number" class="form-control" name="mobile_no" placeholder="Mobile No" value="<?php if(isset($return_mobile_no)){ echo $return_mobile_no; } ?>">
                     </div>
                   </div>
                   
                   <div class="col-md-2" style="padding:6px;">
                     <div class="form-group">
                          <select class="form-control" name="order_status">
                             <option value="">Order Status</option>
                             <option value="pending" <?php if(isset($return_order_status)){  if($return_order_status == 'pending'){ echo 'selected'; } } ?>>Pending</option>
                             <option value="placed" <?php if(isset($return_order_status)){  if($return_order_status == 'placed'){ echo 'selected'; } } ?>>Placed</option>
                             <option value="dispatch" <?php if(isset($return_order_status)){  if($return_order_status == 'dispatch'){ echo 'selected'; } } ?>>Dispatch</option>
                             <option value="delivered" <?php if(isset($return_order_status)){  if($return_order_status == 'delivered'){ echo 'selected'; } } ?>>Delivered</option>
                             <option value="canceled" <?php if(isset($return_order_status)){  if($return_order_status == 'canceled'){ echo 'selected'; } } ?>>Canceled</option>
                         </select> 
                     </div>
                    </div>
                     <div class="col-md-1" style="padding:6px;">
                     <div class="form-group">
                          <button type="submit" class="btn btn-primary" name="submit" value="submit" style="width:100%;  height:32px; border-radius:5px; background-color:#0088cc; color:#ffffff;">Submit</button>
                     </div>
                   </div>
                  <!-- <div class="col-md-2" style="padding:6px;">
                     <div class="form-group">
                          <span class="search_input_i"><i class="fa fa-search"></i></span>
                          <input type="text" class="form-control" placeholder="Date" name="" value="">
                     </div>
                   </div>  
                     
                   <div class="col-md-2" style="padding:6px;">
                     <div class="form-group">
                          <button type="button" class="btn btn-primary" name="button" style="width:100px;  height:32px; border-radius:5px; background-color:#0088cc; color:#ffffff;">Submit</button>
                     </div>
                   </div> -->

                 </div>
                    </form>
               </div>
								 <header class="panel-heading" style="padding:0px 15px;">
								     	<div class="heading_box" style=" border-bottom: none; padding: 6px 2px; height:36px; background-color:#27293d;">
									        <h2 class="panel-title" style="color:#dbd6d6; font-size:16px; line-height:10px; ">
														<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
														Purchase Order List <i class="ion-chevron-right" style="padding:0px 10px; color:#0088cc;"></i> <?php if(isset($return_date)){ echo date('d-M-Y',strtotime($return_date)); } ?>
													</h2>
									    </div>
								</header>
							  <div class="panel-body " style="padding-top:0px;">
                  <table class="table mb-none" id="table" data-toggle="table" data-pagination="true" data-show-columns="true" data-show-pagination-switch="true"  data-show-toggle="true"  data-cookie="true"
                          data-show-export="true"  data-toolbar="#toolbar" style="border-bottom: 1px solid #424351;">
                       <thead>
                       <tr>
                          <th>Sr. No.</th>
                          <th>Date</th>
                           <th>Time</th>   
                         
                          <th>From Outlet</th>
                          <!--<th>Purchase Status</th> -->
                          <th>To Branch</th>
                          <th>Total</th>
                          <th>Shipping Cost</th>
                          <th>Grand Total</th>
                            <th>Status</th>
                          <th>Action</th> 
                      </tr>
     </thead>
     <tbody id="customer_table">
                      <?php $i = 1; if(isset($list)){ foreach($list as $row){ ?>

                       <a href=""> <tr>

                         <td><?php echo $i++; ?></td>
                      
                          <td><?php echo date('d-M-Y', strtotime($row->created_at)); ?></td>
                           <td><?php echo date('h:i:sa', strtotime($row->created_at)); ?></td>
                          <td><?php echo $row->from_outlet_name; ?></td>  
                         
                          <td><?php echo  $row->to_branch_name; ?></td>      
                        <td><?php echo  $row->total_cost; ?></td>  
                          <td><?php echo  $row->shipping_cost; ?></td>   
                          <td><?php echo  $row->grand_total; ?></td>   
                           <td><?php if($row->status == 0){ echo 'Pending'; }else if($row->status == 1){ echo 'received'; } ?></td>   
                         
                           <td style="padding:2px 5px;">
                               <div class="">
                               <select class="form-control" name="drop_action" style="width:100px; height:25px ; padding:2px;"  data-id="<?php echo $row->transfer_id; ?>">          <option style="width:200px;">Action</option>
                                   <option value="view">View</option>
                                   <option value="edit">Edit</option>
                                  <option value="delete">Delete</option>
                               </select>
                               </div>
                           </td>
                         </tr>
                      </a>
            <?php }} ?>
               </tbody>
                <tfoot>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                     <td></td>
                    
                </tfoot>
             </table>
							</div>
						</section>
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
														 
														 <div class="modal-body" style="padding: 0px; background-color:#363956; text-align:center;  background-color:#ffffff;">
                                                             <a class="close" data-dismiss="modal" href="#" style="color:red;">X</a>
                                                             
															<div style="width:100%; height:85vh; overflow:auto;">
                                                            <iframe id="invoice_iframe" src="" style="width:100%; height:800px;">

                                                            </iframe>	 
														 </div>
													
												 </div>
										 </div>
								 </div>
    
    </div>
    
    
         <div id="view_payments" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:70vw; margin:auto;">
										 <div class="modal-dialog" style="width:90%;">
												 <div class="modal-content">
														 
														 <div class="modal-body" style="padding: 0px; background-color:#363956; text-align:center;  background-color:#ffffff;">
                                                             <a class="close" data-dismiss="modal" href="#" style="color:red;">X</a>
                                                             
															<div style="width:100%; height:85vh; overflow:auto;">
                                                            <iframe id="payments_iframe" src="" style="width:100%; height:800px;">

                                                            </iframe>	 
														 </div>
													
												 </div>
										 </div>
								 </div>
    
    </div>
    
        <div id="add_payment" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:70vw; margin:auto;">
										 <div class="modal-dialog" style="width:90%;">
												 <div class="modal-content">
														  <div class="modal-head danger-md" style=" background-color:#3c3f52; border-top:none; border-bottom:1px solid #424351;">
                                                              <div class="row" style="padding:10px 35px;">
                                                              <div class="col-md-8" style="font-size;20px ; color:#c8c6c4;">
                                                                  <strong class="m_product_name">Add Payment</strong>
                                                              </div>
                                                              <div class="col-md-4" style="">
                                                                 <a class="close" data-dismiss="modal" href="#" style="color:#ff4748; text-shadow:none; opacity:1;">X</a> 
                                                              </div>
                                                              </div>
                                                         </div>
														 <div class="modal-body" style="padding: 20px; text-align:center; height:400px;  background-color:#27293d; ">
                                                               <form action="<?php echo base_url(); ?>/inventory/add_purchase_payment" method="post">
                                                               <div class="col-md-6" style="margin-bottom:15px; display:none;">
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" name="m_purchase_id">
                                                                         <span class="placeholder">Purchase ID*</span>
                                                                     </div>
                                                                </div>  
                                                               <div class="col-md-6" style="margin-bottom:15px; display:none;" >
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="number" step="1.00" min="" class="form-control" value="" name="m_rec_amount" >
                                                                         <span class="placeholder">Received amount*</span>
                                                                     </div>
                                                                </div>
                                                               
                                                            	 <div class="col-md-6" style="margin-bottom:15px">
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="number" name="m_paying_amount" class="form-control" value=""  required>
                                                                         <span class="placeholder">Paying Amount*</span>
                                                                     </div>
                                                                </div>
                                                                
                                                                <div class="col-md-6" style="margin-bottom:15px; ">
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="number" class="form-control" value="" readonly name="m_change">
                                                                         <span class="placeholder">Take Change</span>
                                                                     </div>
                                                                </div>
                                                                   
                                                                <div class="col-md-6" style="margin-bottom:15px">
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" readonly name="m_due_amount">
                                                                         <span class="placeholder">Due Amount</span>
                                                                     </div>
                                                                </div>   
                                                                
                                                                <div class="col-md-6" style="margin-bottom:15px" >
                                                                     <div class="form-group" style="position:relative;">
                                                                         <select class="form-control" name="m_payment_type">
                                                                             <option value="1">Cash</option>
                                                                             <option value="2">Chaque</option>
                                                                              <option value="3">Credit Card</option>
                                                                         </select>
                                                                         <span class="placeholder">Unit Cost</span>
                                                                     </div>
                                                                </div>
                                                             
                                                               <div class="col-md-6" style="margin-bottom:15px" >
                                                                     <div class="form-group" style="position:relative;">
                                                                         <select class="form-control" name="m_sales_account" required>
                                                                             <option value=""></option>
                                                                             <option value="1">Sales Account 1</option>
                                                                             <option value="2">Sales Account 2</option>
                                                                              <option value="3">Sales Account 3</option>
                                                                         </select>
                                                                         <span class="placeholder">Sales Account</span>
                                                                     </div>
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:15px" >
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" name="m_note">
                                                                         <span class="placeholder">Payment Note</span>
                                                                     </div>
                                                                </div>
														      <div class="col-md-12" style="margin-bottom:15px">
                                                                     <div class="form-group" style="text-align:left; ">
                                                                         <input type="submit" class="btn-transparent btn-blue" name="submit_edit_product" value="submit" />
                                                                    </div></div>
                                                       </form>
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
     // set scroll position
	
            $(document).on('change','select[name=drop_action]',function(){ 
                
                var id = $(this).data('id');
                var val = $(this).val();
               
                if(val === 'view'){
                    var src = '<?php echo base_url(); ?>/inventory/view_transfer_stock/'+id;
                    $('#invoice_iframe').attr('src',src);
                    $('#invoice').modal('toggle');
                }
                
                if(val === 'add_payment'){
                    
                    var due_amount = $(this).parent().parent().parent().find('.due_amount').text();
                    
                    $('input[name=m_purchase_id]').val(id);
                   // $('input[name=m_rec_amount]').val(due_amount);
                   // $('input[name=m_rec_amount]').attr('min',due_amount);
                    $('input[name=m_paying_amount]').val(due_amount);
                    $('input[name=m_paying_amount]').data('paying_amount',due_amount);
                    
                    $('#add_payment').modal('toggle');
                    
                }
                
                if(val === 'view_payment'){
                    var src = '<?php echo base_url(); ?>/inventory/view_purchase_payment/'+id;
                    $('#payments_iframe').attr('src',src);
                    $('#view_payments').modal('toggle');
                    
                }
                 
            }); 
             
             $(document).on('keyup change','input[name=m_paying_amount]',function(){
                 
                 var val = $(this).val();
                 var pay_amount = $('input[name=m_paying_amount]').data('paying_amount');
                 
                 if(Math.abs(val) < Math.abs(pay_amount)){
                      var due =  Math.abs(pay_amount) - Math.abs(val);
                      $('input[name=m_due_amount]').val(due.toFixed(2));
                     $('input[name=m_change]').val(0);
                 }else if(Math.abs(val) > Math.abs(pay_amount)){
                     var change =  Math.abs(val) - Math.abs(pay_amount);
                      $('input[name=m_change]').val(change.toFixed(2));
                      $('input[name=m_due_amount]').val(0);
                     
                 }else{
                     $('input[name=m_due_amount]').val(0);
                      $('input[name=m_cahnge]').val(0);
                 }
                 
             });
});
</script>
</body>
</html>
