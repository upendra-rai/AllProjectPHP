<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/modal.css">
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
                <div class="row">
                 <div class="panel-body " style="padding-top:5px;">
                      <form action="" method="post" >    
                    
              
                  
                     
                   
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
														 
								        
														
													</h2>
									    </div>
								</header>
							   <div class="panel-body " style="padding-top:0px;">
								 <div class="col-md-6" style="border-right:1px solid white;">
                                    
                                     <h2 style="border-style: solid;">Vendor personal Details</h2>
                                     <p style="width:110px; padding:4px; text-align:center;"><img src="<?php echo base_url(); ?>/uploads/vendor_img/<?php echo $vendor_list[0]->vendor_img; ?>" style="border-radius:2px; border:1px solid #45496d;" width="100"></p>
                  
                                      <p style="font-size:16px; color:white;">Name:<?php echo $vendor_list[0]->vendor_name; ?></p>
                                     <p style="font-size:16px; color:white;">NickName:<?php echo $vendor_list[0]->vendor_nickname; ?></p>
                                     <p style="font-size:16px; color:white;">Email Add:<?php echo $vendor_list[0]->vendor_email_id; ?></p>
                                     <p style="font-size:16px; color:white;">Password:<?php echo $vendor_list[0]->vendor_password; ?></p>
                                     <p style="font-size:16px; color:white;">Address: <?php echo $vendor_list[0]->vendor_address; ?></p>
                                     <p style="font-size:16px; color:white;">Area:<?php echo $vendor_list[0]->vendor_area; ?></p>
                                     <p style="font-size:16px; color:white;">Mobile No: <?php echo $vendor_list[0]->vendor_mobile; ?></p>
                                      <p style="font-size:16px; color:white;">Registration: <?php echo $vendor_list[0]->vendor_register; ?></p>
                                     <p style="font-size:16px; color:white;">Date: <?php echo $vendor_list[0]->vendor_create_at; ?></p>
                                     
                                     <p style="font-size:16px; color:white;">Website: <?php echo $vendor_list[0]->vendor_website; ?></p>
                                     
                                   </div>
                                    <div class="col-md-6" style="border-right:1px solid white;">
                                    <h2 style="border-style: solid;"> Account Details</h2>
                                      <p style="font-size:16px; color:white;">Bank Name:<?php echo $vendor_list[0]->vendor_bank_name; ?></p>
                                     <p style="font-size:16px; color:white;">Account Name:<?php echo $vendor_list[0]->vendor_account_name; ?></p>
                                     <p style="font-size:16px; color:white;">Account Number:<?php echo $vendor_list[0]->vendor_account_number; ?></p>
                                        <p style="font-size:16px; color:white;">IFSC Code:<?php echo $vendor_list[0]->vendor_ifsc_code; ?></p>
                                     <p style="font-size:16px; color:white;">Branch Name:<?php echo $vendor_list[0]->vendor_branch_location; ?></p>
                                        <p style="font-size:16px; color:white;">Paytm Number:<?php echo $vendor_list[0]->vendor_paytm_number; ?></p>
                                        <p style="font-size:16px; color:white;">Gpay Number:<?php echo $vendor_list[0]->vendor_gpay_number; ?></p>
                                     <div class="form-group">
												<label class="control-label col-md-3"></label>
												<div class="col-md-9">
													<div class="switch switch-sm switch-primary">
                                                        <p>Active</p>
														<input type="checkbox" name="switch" data-plugin-ios-switch checked="checked" />
                                                        <p>Deactive</p>
													</div>
													
												</div>
											</div>
                                        
                                        <a href="<?php echo base_url(); ?>/management/edit_vendor/<?php echo $vendor_list[0]->vendor_id; ?>"type="btn" class="btn-transparent btn-info ">Edit Vendor <i class="fa fa-pencil"></i></a>
                                        
                                        <a href="<?php echo base_url(); ?>/management/transction_details/<?php echo $vendor_list[0]->vendor_current_balance_id; ?>"type="btn" class="btn-transparent btn-info ">Transcation Details </a>
                                        
                                        <a href="<?php echo base_url(); ?>/management/settlement_details/<?php echo $vendor_list[0]->vendor_current_balance_id; ?>"type="btn" class="btn-transparent btn-info ">Settlement </a>
                                   </div>                                                                   
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
    
    
		
		<!-- Specific Page Vendor -->
		
		
		
		
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/bootstrap-maxlength/bootstrap-maxlength.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/ios7-switch/ios7-switch.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/theme.js"></script>
		
		
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/theme.init.js"></script>


		<!-- Examples -->
		
    
    <!-- old Links -->
    
<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/image-compressor.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notification-active.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
		 $(document).ready(function(){
     // set scroll position
		 function set_scroll_position(){

			 var url = window.location.href;
			 var segments = url.split( '/' );
       var scroll_position = segments[9];
			 if(scroll_position){
					 $('html').scrollTop(scroll_position);
			 }
		 }
		// set_scroll_position();
    // set scroll position



    $(document).on('click','button[id=inlink_img_bt]',function(){
			 
          var unlink_img_src = $(this).data("unlink_img_src");

				  $.ajax({
              url : '<?php echo base_url(); ?>/category/unlink_image',
						  method: 'POST',
							data:{unlink_img_src: unlink_img_src},
							success:function(data){
								alert(data);
								if(data === 'success'){
										$('#img_label').html('<i class="fa fa-globe" style="margin-top:60px; margin-right:5px;"></i><span style="font-size:12px;">Browse</span>');
								}
							}
					});
	   });

    $(document).on('click','button[id=temprory_remove_image]',function(){
          $('#img_label').html('<i class="fa fa-globe" style="margin-top:60px; margin-right:5px;"></i><span style="font-size:12px;">Browse</span>');
		});

// category and subcategory change event
$(document).on('change','select[name=category]',function(){
			var category_id = $('select[name=category]').val();
			if(category_id === ''){
				category_id = 0;
			}
		 var sub_category_id = 0;
     var redirect_link = '<?php echo base_url(); ?>product/add_product/'+category_id+'/'+sub_category_id;
			window.location.href = redirect_link;
		//	alert(sub_category_id);
});

$(document).on('change','select[name=subcategory]',function(){
			var category_id = $('select[name=category]').val();
			if(category_id === ''){
				category_id = 0;
			}
			var sub_category_id = $('select[name=subcategory]').val();
			if(sub_category_id === ''){
				sub_category_id = 0;
			}
     var redirect_link = '<?php echo base_url(); ?>product/add_product/'+category_id+'/'+sub_category_id;
			window.location.href = redirect_link;
		//	alert(sub_category_id);
});

// rediren for update section
    $(document).on('click','button[id=edit_bt]',function(){
       
              var edit_id = $(this).data("edit_id");
							var scroll_position = $('html').scrollTop()
                            
                            //alert(edit_id);
              // category id and cetegory id selected
							var url = window.location.href;
			 			  var segments = url.split( '/' );

							var category_id = $(this).data("category_id");
							var subcategory_id = $(this).data("subcategory_id");
                            if(!subcategory_id){
                                subcategory_id = 0;
                            }
          
              var redirect_link  = '<?php echo base_url(); ?>product/edit_product/'+category_id+'/'+subcategory_id+'/'+edit_id+'/'+scroll_position;
           
                          
							window.location.href = redirect_link;

		});
// delete functionality
    $(document).on('click','button[id=confirm_del_action]',function(){
        
        
						 var confirm_del_id = $(this).data("confirm_del_id");
						 $('#del_bt').data('del_id',confirm_del_id);
						 $('#del_alert_action').modal("toggle");
		});

		$(document).on('click','button[id=del_bt]',function(){
			   var del_id = $(this).data("del_id");
							$.ajax({
		              url : '<?php echo base_url(); ?>/vendor/delete_vendor',
								  method: 'POST',
									data:{del_id: del_id},
									success:function(data){
										if(data === 'success'){
											window.location.href = window.location.href;
										}
									}
							});
	    });
});
</script>
</body>
</html>
