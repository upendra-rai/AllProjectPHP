<!doctype html>
<html class="fixed">

<body>
		<section class="body">
			<!-- success message -->
			<div class="success_message"></div>
			<!-- success message -->
      

			<div class="inner-wrapper">
			  

				<section role="main" class="content-body" >

					<div class="col-md-12" style="padding:0px;">
					<section class="section_card">
						  <div class="panel-head" style="width:100%; height:30px; background-color:transparent; color:#dbd6d6; padding:10px 16px; ">
						      <h4 style="padding:0px; margin:0px; font-size:16px; text-transform:uppercase;">
										<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
									  Add Source
									</h4>
						 </div>
						 <div class="panel-body" style="padding-left:0px; padding-right:0px;  background-color:#272193d; padding-top:15px; padding-bottom:0px;">
										<form class="form-horizontal form-bordered" action="" method="post">
                                     <div class="col-md-6" style="padding:0px;">
											 <div class="col-md-12">
											   <div class="form-group">
												  <div class="col-md-12">
													   <input type="text" class="form-control" name="product_name" placeholder="Source Name" value="" required>
												  </div>
											   </div>
										   </div>
										</div>
                                            
                                       <div class="form-group" style="display: none;">
												<label class="col-md-3 control-label" for="inputDefault">Image</label>
												<div class="col-md-6">
													<input type="file" name="file" class="form-control" id="file"  data-img_folder_name="testimonial">
												</div>
											</div>
											<label for="file">
											<div id="img_label" style="width:150px; height:150px; border:1px solid red;">
											</div>
										   </label>
                                            
                                            
                                            
									<div class="col-md-12">
											<div class="form-group">
                                                <span style="color:red; padding-left:20px;"><?php if(isset($msg)){ echo $msg; } ?></span>
                                                
												<div class="col-md-12">
													<a href="">	<button type="button" class="btn-transparent btn-red"  style=" width:80px;">Cancel</button></a>
													<input type="submit" class="btn btn-primary" name="submit" value="submit" style="">
												</div>
											</div>
						      </div>
									<div class="col-md-6">
											<div class="form-group">
												<div class="col-md-12">

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
	
		<!-- Body section -->
		

<script type="text/javascript">
		 $(document).ready(function(){
     // set scroll position
		 function set_scroll_position(){

			 var url = window.location.href;
			 var segments = url.split( '/' );
       var scroll_position = segments[7];
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

// rediren for update section
    $(document).on('click','button[id=edit_bt]',function(){
              var edit_id = $(this).data("edit_id");
							var scroll_position = $('html').scrollTop();
              var redirect_link  = '<?php echo base_url(); ?>category/edit_category/'+scroll_position+'/'+edit_id;

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
		              url : '<?php echo base_url(); ?>/category/del_product_category',
								  method: 'POST',
									data:{del_id: del_id},
									success:function(data){
										//alert(data);
										if(data === 'success'){
											window.location.href = window.location.href;
										}
									}
							});
	    });
});
</script>
    
    	<script type="text/javascript">
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
		    	url: '<?php echo base_url(); ?>/controller/upload_image',
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

		</script>
</body>
</html>
