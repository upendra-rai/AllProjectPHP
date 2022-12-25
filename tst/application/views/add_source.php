<html>
<div class="col-md-12" style="padding:0px;">
					<section class="section_card1">
						  <div class="panel-head" style="width:100%; height:30px; background-color:transparent; color:#dbd6d6; padding:10px 16px; ">
						      <h4 style="padding:0px; margin:0px; font-size:16px; text-transform:uppercase;">
										<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
									  Add Source
									</h4>
						 </div>
						 <div class="panel-body" style="padding-left:0px; padding-right:0px;  background-color:#272913d; padding-top:15px; padding-bottom:0px;">
										<form class="form-horizontal form-bordered" action="<?php echo base_url(); ?>source/add_source" method="post">
                                     <div class="col-md-6" style="padding:0px;">
											 <div class="col-md-12">
											   <div class="form-group">
												  <div class="col-md-12">
													   <input type="text" class="form-control" name="name" placeholder="Source Name" value="" required>
												  </div>
											   </div>
										   </div>
										</div>
                                            
                                       <div class="form-group" style="display: none;">
												<label class="col-md-3 control-label" for="inputDefault">Image</label>
												<div class="col-md-6">
													<input type="file" name="file" class="form-control" id="file"  data-img_folder_name="source_image">
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
		    	url: '<?php echo base_url(); ?>/source/upload_image',
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
    </html>