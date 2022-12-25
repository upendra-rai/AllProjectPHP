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
                    
                        <div class="col-md-12" style="padding:0px; padding-right:15px;">
					<section class="section_card">
						  <div class="panel-head" style="width:100%; height:30px; background-color:transparent; color:#dbd6d6; padding:10px 16px; ">
						      <h4 style="padding:0px; margin:0px; font-size:16px; text-transform:uppercase;">
										<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
											<?php if(isset($product_selected[0])){ echo 'Edit Product'; }else{ echo 'Add Employee'; } ?>
									</h4>
						 </div>
						 <div class="panel-body" style="padding-left:0px; padding-right:0px;  background-color:#27293d; padding-top:15px; padding-bottom:0px;">
										<form class="form-horizontal form-bordered" action="" method="post">
                                        <div class="col-md-12">

									<div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="name" value="<?php if(isset($employee_selected[0])){ echo $employee_selected[0]->employee_name; } ?>"  required><span class="placeholder">Name</span>
											</div>
										</div>
								     </div>

									 <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text"  class="form-control" name="email" value="<?php if(isset($employee_selected[0])){ echo $employee_selected[0]->email; } ?>"  required><span class="placeholder">Email</span>
											</div>
										</div>
								      </div>
									
                                            
                                     <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text"  class="form-control" name="phone_number" value="<?php if(isset($employee_selected[0])){ echo $employee_selected[0]->phone_number; } ?>"  required><span class="placeholder">Phone Number</span>
											</div>
										</div>
								      </div>

                                     <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
													<select class="form-control" name="department_id" <?php  if(!empty($department_list)){ echo 'required'; }  ?>  >
													  <option value="">Department</option>
													 <?php foreach($department_list as $row){ ?>
													 <option value="<?php echo $row->department_id; ?>" <?php if(isset($employee_selected)){  if($employee_selected[0]->department_id == $row->department_id){echo 'selected';  }else{ echo ''; }   } ?>     ><?php echo $row->name; ?></option>
													<?php } ?>
												 </select>

											<!--	<input type="text"  class="form-control" name="department_id" value="<?php if(isset($employee_selected[0])){ echo $employee_selected[0]->department_id; } ?>"  required><span class="placeholder">Department</span>-->
											</div>
										</div>
								      </div> 
                                            
								     <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text"  class="form-control" name="address" value="<?php if(isset($employee_selected[0])){ echo $employee_selected[0]->address; } ?>"  required><span class="placeholder">Address</span>
											</div>
										</div>
								      </div>
								        
									 
                                     
                                    
                                   <div class="col-md-2">          
									 <div class="col-md-12">
										  <div class="form-group">
											   <div class="col-md-12">
												 <input type="file" name="file" id="file" accept="image/*" value="" data-img_folder_name="employee_image" style="display:none;"/>
												 <label for="file" id="img_label" style="width:150px; height:150px; border:1px solid #424351; text-align:center;  font-size:25px;"><?php if(isset($employee_selected[0])){ ?> <img src="<?php echo base_url(); ?>uploads/employee_image/<?php echo $employee_selected[0]->image; ?>" data-img_name="" alt="" style="width:100% ; height:100%;"/><input type="hidden" name="image_name" value="<?php echo $employee_selected[0]->image; ?>" /><button type="button" class="btn" id="temprory_remove_image" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>  <?php }else{ ?> <i class="fa fa-globe" style="margin-top:60px; margin-right:5px;"></i><span style="font-size:12px; ">Browse</span> <?php  } ?>  </label>
											   </div>
												 <!-- last uploaded image name -->
											   <input type="hidden" name="last_uploaded_image_name" value="<?php if(isset($employee_selected[0])){ echo $employee_selected[0]->image; }?>">
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
												<a href="<?php echo base_url(); ?>product/add_product">	<button type="button" class="btn-transparent btn-red"  style=" width:100%;">Cancel</button></a>
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
		 set_scroll_position();
    // set scroll position

	  // upload image to server section
    document.getElementById('file').addEventListener('change', (e) => {
        const file = e.target.files[0];
         if (!file) {
         return;
        }
        var img_folder_name = $('input[id=file]').data("img_folder_name");
		alert("sss");
        new ImageCompressor(file, {
        quality: .2,
        success(result) {
           const formData = new FormData();
           formData.append('file', result, result.name);
           formData.append('img_folder_name', img_folder_name);
            $.ajax({
		    	url: '<?php echo base_url(); ?>/category/upload_image',
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
		              url : '<?php echo base_url(); ?>/product/del_product',
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
