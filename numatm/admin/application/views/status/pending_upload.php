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
								 <header class="panel-heading" style="padding:0px 15px; padding-bottom:20px;">
								     	<div class="heading_box" style=" border-bottom: none; padding: 6px 2px; height:36px; background-color:#27293d;">
									        <h2 class="panel-title" style="color:#dbd6d6; font-size:16px; line-height:10px; text-transform:uppercase;">
														<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
														Pendig Uploads <i class="ion-chevron-right" style="padding:0px 10px; color:#0088cc;"></i><span>
                                                <input type="checkbox" name="selected_all" value="select_all" style="margin-left 15px;" >&nbsp;<label>Select All</label>
                                                </span> 
														
												
                                                <span> 
                                                    &nbsp;&nbsp;
                                                <input type="hidden" name="selected_numbers" value="">
                                                    <button type="button" name="aprove_all_bt" class="btn btn-primary active">Aprove</button>
                                                </span>
														
													</h2>
									    </div>
								</header>
							   <div class="panel-body " style="padding-top:0px;">
								   <table class="table mb-none" id="table" data-toggle="table" data-pagination="true" style="border-bottom: 1px solid #424351;">
									 <thead>
									   	<tr>
								             <th>Sr no</th>
                                             <th>Number</th>
                                             <th>Total Sum</th>
                                             <th>Category</th>
                                             <th>Current Number</th>
                                             <th>Number Status</th>
                                             <th>Rate</th>
                                             <th>Discount</th>
                                             <th>Vendor Rate</th>
                                             <th>Vendor</th>    
                                             <th>Update Date</th>
                                            
                                             <th>Edit</th>
								            
										</tr>
									</thead>
									<tbody>
                                        <?php function sum($num) { 
                                                                        $sum = 0; 
                                                                        for ($i = 0; $i < strlen($num); $i++){ 
                                                                            $sum += $num[$i]; 
                                                                        } 
                                                                        return $sum; 
                                                                    } ?>
                                        
                                        
										  <?php $i = 1;  if(isset($pending_list)){ foreach($pending_list as $row){ ?>
                                                     <tr>
														  <td><?php echo $i++; ?>&nbsp;&nbsp;<input type="checkbox" name="td_check" value="<?php echo $row->my_product_id; ?>"  data-cat_id="<?php echo $row->category_id; ?>"></td>
                                                        <td><?php echo $row->product_current_no; ?></td>
                                                         <td><?php  $number_sum =  sum($row->product_current_no); echo $number_sum; echo '='; $sum_value = sum(json_encode($number_sum)); echo $sum_value; ?></td>
                                                        <td><?php echo $row->category_name; ?></td>
                                                         <td><?php echo $row->current_number; ?></td>
                                                         <td><?php echo $row->brand_name; ?></td>
                                                        <td><?php echo $row->product_rate; ?></td>
                                                        <td><?php echo $row->discount_percentage; ?></td>
                                                        <td><?php echo $row->vendor_rate; ?></td>
                                                         <td><?php echo $row->vendor_name; ?></td>
                                                        <td><?php echo $row->product_create_at; ?></td>
                                                       

                                        <td>
                                            <a 
                                               href="<?php echo base_url(); ?>/management/edit_product_number/<?php echo $row->my_product_id; ?>"> <button type="button"   style=" width:100%;"><i class="fa fa-pencil"></i></button>

                                           </a>
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
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notification-active.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script type="text/javascript">
		 $(document).ready(function(){
             
             function get_number_id(){
                 var my_array =[] ;
                 $('input[name=td_check]').each(function(){
                     
                      if($(this).is(':checked')){
                     var product_id = $(this).val();
                          var category_id= $(this).data("cat_id");
                          alert(category_id);
                          if(category_id){
                               my_array.push({'product_id':product_id});
                          }
                    
                      }
                  // alert(product_id);  
                 });
                 $('input[name=selected_numbers]').val(JSON.stringify(my_array));
                 console.log(my_array);
             }
             
         $('input[name=selected_all]').click(function(){
            
             if($(this).is(':checked')){
                 $('input[name=td_check]').prop("checked", true);
                 
             }else{
               $('input[name=td_check]').prop("checked", false);
             }
            
              get_number_id();
         });     
             
              $(document).on('click','input[name=td_check]',function(){
                          get_number_id();
                            });
             
             $(document).on('click','button[name=aprove_all_bt]',function(){
                           
                 var product_array= $('input[name=selected_numbers]').val(); 
                     
                 $.ajax({
              url : '<?php echo base_url(); ?>/status/aprove_number',
						  method: 'POST',
							data:{product_array: product_array},
							success:function(data){
                                 if(data==='success'){
                                     window.location.href= window.location.href;
                                 }
					         }
					});
                            });
         });
</script>
</body>
</html>
