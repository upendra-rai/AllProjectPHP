<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
       <link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/stylesheet/summernote/summernote.css">
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
												<input type="text" class="form-control" name="sub_category_name" value="<?php if(isset($selected_subcategory[0])){ echo $selected_subcategory[0]->sub_category_name; } ?>"  required><span class="placeholder">Sub Category Name</span>
											</div>
										</div>
								     </div>
                                            
                                            

                             


                                   <div class="col-md-6" >
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="sub_category_desc" value="<?php if(isset($selected_subcategory[0])){ echo $selected_subcategory[0]->sub_category_desc; } ?>" ><span class="placeholder">Sub Category Description</span>
											</div>
										</div>
								     </div>                                    

                                             <div class="col-md-12">
										  <div class="form-group">
											   <div class="col-md-12">
												 <input type="file" name="file" id="file" accept="image/*" value="" data-img_folder_name="sub_category_img" style="display:none;"/>
												 <label for="file" id="img_label" style="width:150px; height:150px; border:1px solid #424351; text-align:center;  font-size:25px;"><?php if(isset($selected_subcategory[0])){ ?> <img src="<?php echo base_url(); ?>uploads/sub_category_img/<?php echo $selected_subcategory[0]->sub_category_img; ?>" data-img_name="" alt="" style="width:100% ; height:100%;"/><input type="hidden" name="sub_category_img" value="<?php echo $selected_subcategory[0]->sub_category_img; ?>" /><button type="button" class="btn" id="temprory_remove_image" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>  <?php }else{ ?> <i class="fa fa-globe" style="margin-top:60px; margin-right:5px;"></i><span style="font-size:12px; ">Browse</span> <?php  } ?>  </label>
											   </div>
												 <!-- last uploaded image name -->
											   <input type="hidden" name="last_uploaded_image_name" value="<?php if(isset($selected_subcategory[0])){ echo $selected_subcategory[0]->sub_category_img; }?>">
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
												<a href="<?php echo base_url(); ?>master/manage_category">	<button type="button" class="btn-transparent btn-red"  style=" width:100%;">Cancel</button></a>
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
                
                <section role="main" class="content-body" >
                    	<div class="col-md-8" style="padding:0px; padding-right:15px; margin-bottom:15px;">
						<section class="section_card" id="table_section">
								 <header class="panel-heading" style="padding:0px 15px;">
								     	<div class="heading_box" style=" border-bottom: none; padding: 6px 2px; height:36px; background-color:#27293d;">
									        <h2 class="panel-title" style="color:#dbd6d6; font-size:16px; line-height:10px; text-transform:uppercase;">
														<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
													 Sub Category List <i class="ion-chevron-right" style="padding:0px 10px; color:#0088cc;"></i> <?php  if(isset($product_subcategory[0])){ echo $product_subcategory[0]->product_category_name;  } ?>
													</h2>
									    </div>
								</header>
							  <div class="panel-body " style="padding-top:0px;">
								   <table class="table mb-none" id="table" data-toggle="table" data-pagination="true" style="border-bottom: 1px solid #424351;">
									  <thead>
									   	<tr>
											     <th>Sr no</th>
										         <th>Category Name</th>
                                                 <th>Edit</th>
											     <th>Action</th>
										</tr>
									</thead>
									<tbody>
										  <?php $i = 1; if(isset($subcategory_list)){ foreach($subcategory_list as $row){ ?>
                          <tr>
								  <td><?php echo $i++; ?></td>
                          	     <td><?php echo $row->sub_category_name; ?></td>
                                                          
                                <td>
                                    <a 
                                       href="<?php echo base_url(); ?>/master/edit_subcategory/<?php echo $row->sub_category_id; ?>"> <button type="button"   style=" width:100%;"><i class="fa fa-pencil"></i></button>

                                   </a>
                                 </td>
                      

                                  <td style="text-align:center;"><button type="button" class="btn btn-primary" id="confirm_del_action" data-confirm_del_id="<?php echo $row->sub_category_id; ?>" style="color:#ff4747; "><i class="fa  fa-times-circle"></i></button>
                                  </td>
                          </tr>
										<?php }} ?>
									</tbody>
								</table>
							</div>
						</section>
					</div>
						<div class="col-md-4" style="padding:0px; padding-right:15px; margin-bottom:15px;">
						<section class="section_card" id="table_section">
								     <div class="panel-body" style="padding-left:0px; padding-right:0px;  background-color:#27293d; padding-top:15px; padding-bottom:0px;">
										<form class="form-horizontal form-bordered" action="" method="post">
                                        <div class="col-md-12">

									<div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="sub_category_name" value="<?php if(isset($selected_subcategory[0])){ echo $selected_subcategory[0]->sub_category_name; } ?>"  required><span class="placeholder">Sub Category Name</span>
											</div>
										</div>
								     </div>
                                            
                                            

                            <div class="tinymce-area mg-b-15"  style="display:none;">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-6 col-sm-6 col-xs-12">
                                            <div class="tinymce-single responsive-mg-b-30">
                                                <div class="alert-title">
                                                    <h4>Category Description</h4>
                                                </div>
                                                <div id="summernote1">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 


                                    <div class="col-md-6" >
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="sub_category_desc" value="<?php if(isset($selected_subcategory[0])){ echo $selected_subcategory[0]->sub_category_desc; } ?>" ><span class="placeholder">Sub Category Description</span>
											</div>
										</div>
								     </div> 
                                   
                                            
                                    <div class="col-md-12">
										  <div class="form-group">
											   <div class="col-md-12">
												 <input type="file" name="file" id="file" accept="image/*" value="" data-img_folder_name="sub_category_img" style="display:none;"/>
												 <label for="file" id="img_label" style="width:150px; height:150px; border:1px solid #424351; text-align:center;  font-size:25px;"><?php if(isset($selected_subcategory[0])){ ?> <img src="<?php echo base_url(); ?>uploads/sub_category_img/<?php echo $selected_subcategory[0]->sub_category_img; ?>" data-img_name="" alt="" style="width:100% ; height:100%;"/><input type="hidden" name="sub_category_img" value="<?php echo $selected_subcategory[0]->sub_category_img; ?>" /><button type="button" class="btn" id="temprory_remove_image" style="position:absolute; background-color:#ff4747; color:#ffffff; margin-top:-2px;">X</button>  <?php }else{ ?> <i class="fa fa-globe" style="margin-top:60px; margin-right:5px;"></i><span style="font-size:12px; ">Browse</span> <?php  } ?>  </label>
											   </div>
												 <!-- last uploaded image name -->
											   <input type="hidden" name="last_uploaded_image_name" value="<?php if(isset($selected_subcategory[0])){ echo $selected_subcategory[0]->sub_category_img; }?>">
										 </div>
									</div>       

                                       
                                       <div class="col-md-12">
									<div class="col-md-6" >
											<div class="form-group">
												<div class="col-md-12">
													<input type="submit" class="btn btn-primary" name="submit" value="submit" style="  width:100%; height:35px;">
												</div>
											</div>
						                 </div>
									<div class="col-md-6">
											<div class="form-group">
												<div class="col-md-12">
												<a href="<?php echo base_url(); ?>master/manage_subcategory">	<button type="button" class="btn-transparent btn-red"  style="  width:100%; height:35px;">Cancel</button></a>
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
		    	url: '<?php echo base_url(); ?>/master/upload_subcategory_image',
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
             
              $(document).on('blur','.note-editing-area',function(){
                  
                    var category_desc= $('.note-editable').html();
                  console.log(category_desc);
                  $('input[name=category_desc]').val(category_desc);
                  
              });
              $(document).on('click','.note-editing-area',function(){
                  
                    var category_desc= $('.note-editable').html();
                  console.log(category_desc);
                  $('input[name=category_desc]').val(category_desc);
                  
              });
             
              $(document).on('click','#submit',function(){
          var sub_category_name= $('.note-editable').html();
         
         $.ajax({
				type: "POST",
				url: '<?php echo base_url(); ?>/master/add_subcategory',

				data:{

					sub_category_name:sub_category_name,
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
      });

		
});
</script>
</body>
</html>
