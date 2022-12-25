<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/modal.css">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notifications.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.css">
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
						<div class="col-md-12" style="padding:0px; padding-right:15px; margin-bottom:15px;">
						<section class="section_card" id="table_section">
               
								 <header class="panel-heading" style="padding:0px 15px;">
								     	<div class="heading_box" style=" border-bottom: none; padding: 6px 2px; height:36px; background-color:#27293d;">
									        <h2 class="panel-title" style="color:#dbd6d6; font-size:16px; line-height:10px; text-transform:uppercase;">
														<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
														Vendor Pirority <i class="ion-chevron-right" style="padding:0px 10px; color:#0088cc;"></i> 
														
														<button type="botton" class="btn btn-primary active" name="update_priority_bt" style="float:right">Update Priority</button>
                                                
                                                       <input type="hidden" value="" name="status"  >
														
													</h2>
									    </div>
								</header>
							   <div class="panel-body " style="padding-top:0px;">
								   <table class="table mb-none" id="table" data-toggle="table" data-pagination="true" style="border-bottom: 1px solid #424351;">
									 <thead>
									   	<tr>
								            <th>Sr no</th>
                                            <th>Vendor Name</th>
                                            <th>Pirority</th>
                                            <th>Limit</th>
                                            
										</tr>
									</thead>
									<tbody>
                                        

                        <!--<ul id="sortable">
                          <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 1</li>
                          <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>
                          <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
                          <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>
                          <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>
                          <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>
                          <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>
                        </ul>-->
										  <?php $i = 1; if(isset($pirority_list)){ foreach($pirority_list as $row){ ?>
                                        <tr class="vendor_tr">
												        <td><?php echo $i++; ?> <?php echo $row->vendor_id; ?></td>
                                                       <td><?php echo $row->vendor_name; ?></td>
                                            <td>              
                                        <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="priority" value="<?php echo $row->priority; ?>" data-vendor_id=<?php echo $row->my_vendor_id; ?>  required><span class="placeholder"></span>
											</div>
										</div>
								     </div></td>
                                    <td>              
                                        <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="limit" value="<?php echo $row->priority_limit; ?>"  required><span class="placeholder"></span>
											</div>
										</div>
								     </div>
                                 </td>
                                                        
                             
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notification-active.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
		 $(document).ready(function(){
    /* $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );*/
  
              $(document).on('click','button[name=update_priority_bt]',function(){
				
                  $('input[name=priority]').css('border','1px solid white');
                   $('input[name=status]').val('active');
                  
                             $('input[name=priority]').each(function(){
                             var current_priority = $(this).val();
                             var vendor_id = $(this).data('vendor_id');
                             var current_vendor = $(this);
                             
                             $('input[name=priority]').each(function(){
                                 
                                 var priority = $(this).val();
                                 var other_vendor_id = $(this).data('vendor_id');
                                 var other_vendor = $(this);
                                 
                                 if(priority===current_priority &&  vendor_id!==other_vendor_id ){
                                     current_vendor.css('border','1px solid red');
                                     other_vendor.css('border','1px solid red');
                                     $('input[name=status]').val('block');
                                     
                                 }else{
                                      
                                 }
                                 });
                         });
                  
                  
                     var check_status = $('input[name=status]').val();
                  
                     if(check_status === 'active'){
                         
                         
                         var arr = [];
                         
                         
                         $('tr[class=vendor_tr]').each(function(){
                              
                             var priority = $(this).find('input[name=priority]').val();
                             var vendor_id = $(this).find('input[name=priority]').data("vendor_id");
                             var limit = $(this).find('input[name=limit]').val();
                             
                             arr.push({'vendor_id':vendor_id, 'priority': priority, 'limit':limit });
                             
                         });
                         //alert(JSON.stringnify(arr));
                        
                         
                         $.ajax({
                             url : '<?php echo base_url(); ?>/management/update_vendor_priority',
						     method: 'POST',
							data:{arr: arr},
							success:function(data){
							//	alert(data);
                                 if(data==='success'){
                                     window.location.href= window.location.href;
                                 }
					         }
					     });  
                     }else{
                        
                     }
                  
                  
                });
        
		
});
</script>
</body>
</html>
