<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/modal.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notifications.css">
       <link rel="stylesheet" href="<?php echo base_url(); ?>catalogs/assets/stylesheets/summernote/summernote.css">
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
								     <div class="panel-body" style="padding-left:0px; padding-right:0px;  background-color:#27293d; padding-top:15px; padding-bottom:0px;">
										<form class="form-horizontal form-bordered" action="" method="post">
                                        <div class="col-md-12">
                                    
									<div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="vendor_name" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_name; } ?>"  required><span class="placeholder">Name</span>
											</div>
										</div>
								     </div>
                                        
                                           
                                   <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="vendor_nickname" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_nickname; } ?>" ><span class="placeholder">Nick Name</span>
											</div>
										</div>
								     </div>
                                            <div class="col-md-12">
										  <div class="form-group">
											   <div class="col-md-12">
												 <input type="file" name="file" id="file" accept="image/*" value="" data-img_folder_name="vendor_img" style="display:none;"/>
												 <label for="file" id="img_label" style="width:150px; height:150px; border:1px solid #424351; text-align:center;  font-size:25px;"><?php if(isset($selected_vendor[0])){ ?> <img src="<?php echo base_url(); ?>uploads/vendor_img/<?php echo $selected_vendor[0]->vendor_img; ?>" data-img_name="" alt="" style="width:100% ; height:100%;"/><input type="hidden" name="vendor_img" value="<?php echo $selected_vendor[0]->vendor_img; ?>" /><button type="button" class="btn" id="temprory_remove_image" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>  <?php }else{ ?> <i class="fa fa-globe" style="margin-top:60px; margin-right:5px;"></i><span style="font-size:12px; ">Browse</span> <?php  } ?>  </label>
											   </div>
												 <!-- last uploaded image name -->
											   <input type="hidden" name="last_uploaded_image_name" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_img; }?>">
										 </div>
									</div>
                                            
                                <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="email" class="form-control" name="vendor_email_id" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_email_id; } ?>"  ><span class="placeholder">E-mail Id</span>
											</div>
										</div>
								     </div>
                                    <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="vendor_password" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_password; } ?>"  required><span class="placeholder">Password</span>
											</div>
										</div>
								     </div>
                                            <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="vendor_address" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_address; } ?>" ><span class="placeholder">Address</span>
											</div>
										</div>
								     </div>
                                            <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="vendor_area" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_area; } ?>"  ><span class="placeholder">Area</span>
											</div>
										</div>
								     </div>
                                            
                                            <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="number" class="form-control" name="vendor_mobile" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_mobile; } ?>"  required><span class="placeholder">Mobile No</span>
											</div>
										</div>
								     </div>
                                            <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="vendor_website" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_website; } ?>" ><span class="placeholder">Website</span>
											</div>
										</div>
								     </div>
                                            <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="number" class="form-control" name="vendor_paytm_number" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_paytm_number; } ?>" ><span class="placeholder">Paytm Number</span>
											</div>
										</div>
								     </div>
                                     <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="number" class="form-control" name="vendor_gpay_number" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_gpay_number; } ?>"  ><span class="placeholder">Gpay Number</span>
											</div>
										</div>
								     </div>
                                            <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="vendor_bank_name" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_bank_name; } ?>"  ><span class="placeholder">Bank Name</span>
											</div>
										</div>
								     </div>
                                            <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="vendor_account_name" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_account_name; } ?>"  ><span class="placeholder">Account Name</span>
											</div>
										</div>
								     </div>
                                    <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="number" class="form-control" name="vendor_account_number" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_account_number; } ?>"  ><span class="placeholder">Account Number</span>
											</div>
										</div>
								     </div>
                                            
                                            <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="vendor_branch_location" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_branch_location; } ?>"  ><span class="placeholder">Branch Location</span>
											</div>
										</div>
								     </div>
                                    <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="vendor_ifsc_code" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_ifsc_code; } ?>"  ><span class="placeholder">IFSC Code</span>
											</div>
										</div>
								     </div>
                                    <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="number" class="form-control" name="vendor_priority" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_priority; } ?>"  ><span class="placeholder">Priority</span>
											</div>
										</div>
								     </div>
                                    <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
                            
										
                                                <select class="form-control" name="vendor_register">
                                                 <option value="">Register Vendor</option>
                                                  <option value="Yes"  <?php if(isset($selected_vendor[0])){ if($selected_vendor[0]->vendor_register == 'Yes'){ echo 'selected'; } } ?> >Yes</option>
                                                  <option value="No" <?php if(isset($selected_vendor[0])){ if($selected_vendor[0]->vendor_register == 'No'){ echo 'selected'; } } ?>>No</option>
                                             </select>
											</div>
										</div>
								     </div> 
											
								     
                                            
                                    <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
                                                <select class="form-control" name="cod_available">
                                                 <option value="">COD Available</option>
                                                  <option value="Yes"  <?php if(isset($selected_vendor[0])){ if($selected_vendor[0]->cod_available == 'Yes'){ echo 'selected'; } } ?> >Yes</option>
                                                  <option value="No" <?php if(isset($selected_vendor[0])){ if($selected_vendor[0]->cod_available == 'No'){ echo 'selected'; } } ?>>No</option>
                                             </select>
												
											</div>
										</div>
								     </div>
                                    <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="vendor_adhar_img" value="<?php if(isset($selected_vendor[0])){ echo $selected_vendor[0]->vendor_adhar_img; } ?>"  ><span class="placeholder">Upaload Adhar Image</span>
											</div>
										</div>
								     </div>
                                       
                                       <div class="col-md-12">
									<div class="col-md-2" style="margin-left:15px;">
											<div class="form-group">
												<div class="col-md-12">
													<input type="submit" class="btn btn-primary" name="submit" value="submit" style=" width:100%;">
												</div>
											</div>
						      </div>
									<div class="col-md-2">
											<div class="form-group">
												<div class="col-md-12">
												<a href="<?php echo base_url(); ?>management/vendor_details">	<button type="button" class="btn-transparent btn-red"  style=" width:100%;">Cancel</button></a>
												</div>
											</div>
										</div>
						             </div>
                                         </div>
									</form>
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
    
<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/summernote/summernote.min.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/summernote/summernote-active.js"></script>
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
      // upload image to server section
    document.getElementById('file').addEventListener('change', (e) => {
        
        const file = e.target.files[0];
         if (!file) {
         return;
        }
        var img_folder_name = $('input[id=file]').data("img_folder_name");
        new ImageCompressor(file, {
        quality: .2,
        success(result) {
           const formData = new FormData();
           formData.append('file', result, result.name);
           formData.append('img_folder_name', img_folder_name);
            $.ajax({
		    	url: '<?php echo base_url(); ?>/management/upload_vendor_image',
		    	method:"POST",
		    	data:formData,
		    	contentType:false,
		    	cache:false,
		    	processData:false,
		    	beforeSend:function(){
		    	//	$('#loading_img').text('loading...');
		    	},
		    	success:function(data)
		    	{
		    		$('#img_label').html(data);
		    		//$('#loading_img').text('');
		    	}
		    });
        },
         error(e) {console.log(e.message); },
      });
    });

    $(document).on('click','button[id=inlink_img_bt]',function(){
			  alert("s");
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


      

});
</script>
</body>
</html>
