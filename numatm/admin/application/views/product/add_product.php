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
                                                <select class="form-control" name="category_id"   >
													  <option value="">Category</option>
													 <?php foreach($category_list as $row){ ?>
													 <option value="<?php echo $row->category_id; ?>" <?php if(isset($selected_product)){  if($selected_product[0]->category_id == $row->category_id){echo 'selected';  }else{ echo ''; }   } ?>     ><?php echo $row->category_name; ?></option>
													<?php } ?>
												 </select>
											</div>
										</div>
								     </div>
                                        
                                           
                                   <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
                                                <select class="form-control" name="sub_category_id"   >
													  <option value="">Sub Category</option>
													 <?php foreach($subcategory_list as $row){ ?>
													 <option value="<?php echo $row->sub_category_id; ?>" <?php if(isset($selected_product)){  if($selected_product[0]->sub_category_id == $row->sub_category_id){echo 'selected';  }else{ echo ''; }   } ?>     ><?php echo $row->sub_category_name; ?></option>
													<?php } ?>
												 </select>
											</div>
										</div>
								     </div>
                                            
                                <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="product_type" value="<?php if(isset($selected_product[0])){ echo $selected_product[0]->product_type; } ?>"  ><span class="placeholder">Product Type</span>
											</div>
										</div>
								     </div>
                                    <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
                                                 <select class="form-control" name="product_type_id"   >
													  <option value="">Number Status*</option>
													 <?php foreach($number_list as $row){ ?>
													 <option value="<?php echo $row->brand_id; ?>" <?php if(isset($selected_product)){  if($selected_product[0]->product_type_id == $row->brand_id){echo 'selected';  }else{ echo ''; }   } ?>     ><?php echo $row->brand_name; ?></option>
													<?php } ?>
												 </select>
												
											</div>
										</div>
								     </div>
                                            
                     
                                            
                                            <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
                                             <select class="form-control" name="current_number">
                                                 <option value="">Current Number</option>
                                                  <option value="Postpaid"  <?php if(isset($selected_product[0])){ if($selected_product[0]->current_number == 'Postpaid'){ echo 'selected'; } } ?> >Postpaid</option>
                                                  <option value="Prepaid" <?php if(isset($selected_product[0])){ if($selected_product[0]->current_number == 'Prepaid'){ echo 'selected'; } } ?>>Prepaid</option>
                                             </select>
											</div>
										</div>
								     </div>
                                          <!-- <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<textarea type="text" class="form-control" name="product_vanity_no" value="<?php if(isset($selected_product[0])){ echo $selected_product[0]->product_vanity_no; } ?>"  required>
                                                    </textarea><span class="placeholder">Vanity Number</span>
											</div>
										</div>
								     </div>-->
									 <div class="col-md-6" style="display:none;">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="product_vanity_no" value="<?php if(isset($selected_product[0])){ echo $selected_product[0]->product_current_no; } ?>" ><span class="placeholder"> Vanity Number</span>
											</div>
										</div>
								     </div>

		<div class="all-content-wrapper">         
        <div class="tinymce-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                        <div class="tinymce-single responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>Vanity Number</h2> 
                            </div>
                            <div id="summernote1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    </div>
                                            
                                            <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="product_rate" value="<?php if(isset($selected_product[0])){ echo $selected_product[0]->product_rate; } ?>"  required><span class="placeholder">Number Rate</span>
											</div>
										</div>
								     </div>
                                     <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
                                                <select class="form-control" name="vendor_id"   >
													  <option value="">Area</option>
													 <?php foreach($vendor_list as $row){ ?>
													 <option value="<?php echo $row->vendor_id; ?>" <?php if(isset($selected_product)){  if($selected_product[0]->vendor_id == $row->vendor_id){echo 'selected';  }else{ echo ''; }   } ?>     ><?php echo $row->vendor_name; ?></option>
													<?php } ?>
												 </select>
											</div>
										</div>
								     </div>
                                            <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="vendor_rate" value="<?php if(isset($selected_product[0])){ echo $selected_product[0]->vendor_rate; } ?>"  required><span class="placeholder">Vendor Rate</span>
											</div>
										</div>
								     </div>
                                     <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
                                                <select class="form-control" name="product_cod_available">
                                                 <option value="">COD Available</option>
                                                  <option value="Yes"  <?php if(isset($selected_product[0])){ if($selected_product[0]->product_cod_available == 'Yes'){ echo 'selected'; } } ?> >Yes</option>
                                                  <option value="No" <?php if(isset($selected_product[0])){ if($selected_product[0]->product_cod_available == 'No'){ echo 'selected'; } } ?>>No</option>
                                             </select>
											</div>
										</div>
								     </div>    
                                    <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="discount_percentage" value="<?php if(isset($selected_product[0])){ echo $selected_product[0]->discount_percentage; } ?>"  ><span class="placeholder">Discount%</span>
											</div>
										</div>
								     </div> 
                                            <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="flat_discount" value="<?php if(isset($selected_product[0])){ echo $selected_product[0]->flat_discount; } ?>" ><span class="placeholder">Flat Discount</span>
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
												<a href="<?php echo base_url(); ?>management/number_details">	<button type="button" class="btn-transparent btn-red"  style=" width:100%;">Cancel</button></a>
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
		              url : '<?php echo base_url(); ?>/department/delete_employee',
								  method: 'POST',
									data:{del_id: del_id},
									success:function(data){
										if(data === 'success'){
											window.location.href = window.location.href;
										}
									}
							});
	    
		});
	
 function load_vanity_number(){
	var vanity_number= $('input[name=product_vanity_no').val();
	$('.note-editable').html(vanity_number);
 }
 load_vanity_number();

		$(document).on('keyup','.note-editable',function(){
			
		var vanity_number = $(this).html();
		//alert(vanity_number);
		
		$('input[name=product_vanity_no]').val(vanity_number);
		});

		$(document).on('click','#submit',function(){
          var note= $('.note-editable').html();
         
         $.ajax({
				type: "POST",
				url: '<?php echo base_url(); ?>/management/add_product',

				data:{

					note:note,
					},
				success: function(data){
                    alert (data);
                    if(data==='success'){
                        window.location.href =  window.location.href;
                    }
					

				},
               error: function(XMLHttpRequest, textStatus, errorThrown) {
                    
                 }


			});
      }
    );
});
</script>
</body>
</html>
