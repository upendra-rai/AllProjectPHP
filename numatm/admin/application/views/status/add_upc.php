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
												<input type="number" class="form-control" name="product_current_no" value="<?php  if(isset($selected_product[0])){ echo $selected_product[0]->product_current_no; } ?>"  required><span class="placeholder">Mobile Number</span>
											</div>
										</div>
								     </div>
                                            
									<div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" maxlength="8" class="form-control" name="upc_code" value=""  required><span class="placeholder">UPC Code</span>
											</div>
										</div>
								     </div>

                                   <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="operator_code" value=""  required><span class="placeholder"> Operator</span>
											</div>
										</div>
								     </div>
                                <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="circle_code" value=""  required><span class="placeholder">Circle</span>
											</div>
										</div>
								     </div>
                                              <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="date" class="form-control" name="generation_date" value="<?php echo date('Y-m-d'); ?>"  required><span class="placeholder">Generation Date</span>
											</div>
										</div>
								     </div>
                                            
                                    <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="expiry_date" value=""  required><span class="placeholder"> Expiry Date</span>
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
												<a href="<?php echo base_url(); ?>orders/orders">	<button type="button" class="btn-transparent btn-red"  style=" width:100%;">Cancel</button></a>
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
             
function addDays(date, days) {
        var result = new Date(date);
        result.setDate(result.getDate() + days);
        var day =  result.getDate();
       
        var month =  result.getMonth();
        var year =  result.getYear();          
        return day+'-'+month+'-'+year;
}
             
function mytoday(){
     /*var mydate = new Date();
       var day =  mydate.getDate();
       
        var month =  mydate.getMonth();
        var year =  mydate.getYear();  
     return day+'-'+month+'-'+year; */
    return 'ss';
}   
         
            
    $(document).on('keyup','input[name=upc_code]',function(){
		
        var upc_code= $(this).val();
        var operator_code = String(upc_code).charAt(0);
        var circle_code = String(upc_code).charAt(1);
       alert(circle_code);
       $.ajax({
              url : '<?php echo base_url(); ?>/orders/get_operator_code',
						  method: 'POST',
							data:{operator_code: operator_code},
							success:function(data){
								
                                var service_provider = JSON.parse(data).operator_code;
								var service_provider_name = service_provider[0].service_provider_name;
                                //var validity = service_provider[0].expiry_date;
                                 $('input[name=operator_code]').val(service_provider_name);
                                
                                 
							}
					});
       
        $.ajax({
              url : '<?php echo base_url(); ?>/orders/get_circle_code',
						  method: 'POST',
							data:{circle_code: circle_code},
							success:function(data){
                                alert(data);
                                 var circle_code = JSON.parse(data).circle_code;					
                                var circle_code_name = circle_code[0].service_area_name;
                                  var validity = circle_code[0].expiry_date;
                                 $('input[name=circle_code]').val(circle_code_name);
                                
                                   var mydate = new Date();
                                   var day =  mydate.getDate();
                                    var month =  mydate.getMonth();
                                    var year =  mydate.getYear();  
                                  var mytoday = year+'-'+month+'-'+day;
                                
                                 var expiry_date =  addDays(mytoday,validity);
                                 // 
                                  $('input[name=expiry_date]').val(expiry_date);	
							}
					});
});

// rediren for update section

});
</script>
</body>
</html>
