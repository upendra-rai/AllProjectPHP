<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/modal.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notifications.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.css">
    <style type="text/css">
        
        #table > tbody > tr > td, .table > tfoot > tr > td{
            line-height: 24px;
        }
        
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
            width:90px; text-align:center; color:#ffffff; font-weight:700; border-radius:30px;
        }
        
        .search_input_i{
            width:30px;
            height: 35px;
            position: absolute;
            color: #0088cc;
            padding: 5px 9px;
        }
        
        .order_quick_detail{
            width:100%; height:250px; background:#1e1e2f;
            border: 1px solid #3e3e60;
            padding: 10px;
            overflow: auto;
        }
        
        .order_quick_detail p{
            margin-bottom: 0px;
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
                 <div class="panel-body " style="padding-top:5px;">
                      <form action="" method="post" >    
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
                          <input type="text" class="form-control" name="name" placeholder="Name" value="" >
                     </div>
                   </div>
                   <div class="col-md-2" style="padding:6px;">
                     <div class="form-group">
                          <span class="search_input_i"><i class="fa fa-search"></i></span>
                          <input type="text" class="form-control" name="mobile_no" placeholder="Mobile No" value="">
                     </div>
                   </div>
                  
                  
                     <div class="col-md-2" style="padding:6px;">
                     <div class="form-group">
                         <select class="form-control" name="status">
                             <option value="">New</option>
                              <option value="placed"  <?php if(isset($r_status)){ if($r_status == 'placed'){ echo 'selected'; } } ?> >Placed</option>
                              <option value="dispatched" <?php if(isset($r_status)){ if($r_status == 'dispatched'){ echo 'selected'; } } ?>>Dispatch</option>
                              <option value="delivered" <?php if(isset($r_status)){ if($r_status == 'delivered'){ echo 'selected'; } } ?>>Delivered</option>
                              <option value="canceled" <?php if(isset($r_status)){ if($r_status == 'canceled'){ echo 'selected'; } } ?>>Canceled</option>
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
                    </form>
                 </div>
               </div>
								 <header class="panel-heading" style="padding:0px 15px;">
								     	<div class="heading_box" style=" border-bottom: none; padding: 6px 2px; height:36px; background-color:#27293d;">
									        <h2 class="panel-title" style="color:#dbd6d6; font-size:16px; line-height:10px; text-transform:uppercase;">
														<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
														Order List
													</h2>
									    </div>
								</header>
							  <div class="panel-body " style="padding-top:0px;">
                  <table class="table mb-none" id="table" data-toggle="table" data-pagination="false" data-show-columns="true" data-show-pagination-switch="true"  data-show-toggle="true"  data-cookie="true"
                          data-show-export="true"  data-toolbar="#toolbar" style="border-bottom: 1px solid #424351;">
                       <thead>
    <tr>
                          <th>Sr. No.</th>
                          <th>Order Id</th>
                          <th>Order Date</th>
        
                          <th>Product</th>
                          <th>Customer Name</th>

                          <th>Phone 1</th>

                          <th>Delivery Date</th>
                          <th>Order Status</th>
                          <th>Action</th>
                          <th>View</th>
                            <th>Upload Upc</th>

                      </tr>
                     </thead>
                 <tbody id="customer_table">
                      <?php $i = 1; if(isset($orders_list)){ foreach($orders_list as $row){ ?>

                        <tr >

                         <td><?php echo $i++; ?></td>
                         <td><?php echo $row->online_order_id; ?></td>
                           
                       
                         <td><?php echo date('d-M-Y',strtotime($row->online_order_date)); ?></td>
                         <td><?php echo $row->product_current_no; ?></td>     
                         <td><?php echo $row->customer_name; ?></td>

                         <td><?php echo $row->customer_mobile; ?></td>

                         <td><?php echo date('d-M-Y',strtotime($row->delivery_date)); ?></td>
                         <td class="status_td">
                           <?php if($row->order_status == ''){?> <p class="status" style="background-color:#0088cc; ">New</p> <?php } ?>
                           <?php if($row->order_status == 'placed'){?> <p class="status" style="background-color:#e29739; ">Placed</p> <?php } ?>
                           <?php if($row->order_status == 'dispatched'){?> <p class="status" style="background-color:#e335a7; ">Dispatched</p> <?php } ?>
                        <?php if($row->order_status == 'delivered'){?> <p class="status" style="background-color:#019727; ">Delivered</p> <?php } ?>     
                           <?php if($row->order_status == 'canceled'){?> <p class="status" style="background-color:#ff4748; ">Canceled</p> <?php } ?>

                         </td>
                            <td><select class="form-control" data-order_id="<?php echo $row->online_order_id; ?>" name="change_order_status"  style="height:25px; padding:0px 5px;">
                                  <option value="">Status</option>
                               <option value="placed" <?php if( $row->order_status == 'placed'){ echo 'selected'; } ?>>Accept </option>
                                <option value="canceled" <?php if( $row->order_status == 'canceled'){ echo 'selected'; } ?>>Cancel</option>
                                </select>
                            </td>    
                         <!--<td> <button type="button" class="btn view_bt" name="click_tr1" data-tr_id="<?php echo $row->online_order_id; ?>" style=""><i class="fa fa-eye" style="color:#ffffff;"></i></button> </td>-->
                            
                            <td><a href="<?php echo base_url(); ?>/orders/order_details/<?php echo $row->online_order_id; ?>"> <button type="button" class="btn view_bt"  style="font-size:10px;font-weight:400;"><i class="fa fa-eye" style="color:#ffffff;"></i></button></a> </td>
                            
                        <td><a href="<?php echo base_url(); ?>/orders/add_upc/<?php echo $row->product_id; ?>"> <button type="button" class="btn view_bt" name="upload_upc"  style="font-size:10px;font-weight:400;">Upload UPC</button></a> </td>

                         </tr>
                       
            <?php }} ?>
              </tbody>
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

<?php $this->load->view('common/footer_script'); ?>
<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/image-compressor.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notification-active.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
		 $(document).ready(function(){
     
        $(document).on('change','select[name=change_order_status]',function(){
            
           
            
            var status = $(this).val();
            var order_id = $(this).data('order_id');
            var href = window.location.href;
            var return_href = href.substring(href.lastIndexOf('/'));
            
            var this_eliment = $(this);
            //alert(return_href);
            if(status && order_id){
              //  window.location.href = '<?php echo base_url(); ?>orders/order_accept_or_reject/'+order_id+'/'+status+'/'+return_href;
              $.ajax({
                      
                        type: 'POST',
						url: '<?php echo base_url(); ?>orders/order_accept_or_reject',
						data: {status:status,order_id:order_id},
						beforeSend: function(){

							//$('#submit_notification').val('Processing...');

						},

						success: function(data){
                            
                            if(data === 'success'){
                                
                                window.location.href = '<?php echo base_url(); ?>orders/orders';
                                
                                if(status === 'placed'){    
                                  
                                    
                                  this_eliment.css('border','1px solid #cfd22d');
                                    
                                    //var j = this_eliment.parent().patent().html();
                                    //alert(j);
                                          this_eliment.parent().parent().find('.status_td').html('<p class="status" style="background-color:#e29739; width:90px; text-align:center; color:#ffffff; font-weight:700; border-radius:30px;">Placed</p>');
                                     
                                }else if(status === 'canceled'){
                                    this_eliment.css('border','1px solid #fd1e34');
                                     this_eliment.parent().parent().find('.status_td').html('<p class="status" style="background-color:#ff4748; width:90px; text-align:center; color:#ffffff; font-weight:700; border-radius:30px;">Canceled</p>');
                                }else if(status === 'dispatched'){
                                    this_eliment.css('border','1px solid #2eed3d');
                                    
                                     this_eliment.parent().parent().find('.status_td').html('<p class="status" style="background-color:#e335a7; width:90px; text-align:center; color:#ffffff; font-weight:700; border-radius:30px;">Dispatched</p>');
                                }
                            }
                        }
                      
                  });   
                
                
            }
            
            
            
        });
             
        $('.order_quick_detail_tr').hide();   
             
        $('.order_quick_detail_tr td').css('padding','0px');     
             
        $(document).on('click','button[name=click_tr]',function(){
                       
             var tr_id = $(this).data('tr_id'); 
             $('tr[id='+tr_id+']').toggle();
        });    
             
       
});
</script>
</body>
</html>
