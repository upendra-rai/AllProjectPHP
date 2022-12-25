<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/modal.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notifications.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.css">
    
    <style type="text/css">
        .select2-container .select2-choices .select2-search-field input, .select2-container .select2-choice, .select2-container .select2-choices {
            
            border-color:#9f9f9f;
        }
        
        
        .my_drop_down{
            width: 100%;
            position: absolute;
            z-index: 99999;
            background-color: #202233;
            margin-top: -1px;
            display: none;
        }
        .my_drop_down li{
            width: 100%;
            border-left: 1px solid #424351;
            border-right: 1px solid #424351;
            
            padding: 8px 10px;
        
        }
        .my_drop_down li:hover{
            background-color: #006a9f;
            color:#ffffff;
        }
        .my_drop_down li.active{
            background-color: #006a9f;
            color:#ffffff;
        }
        
          .search_input_i{
            width:30px;
            height: 35px;
            position: absolute;
            color: #0088cc;
            padding: 5px 9px;
        }
        
       
    </style>
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
										<i class="ion-android-radio-button-on" style="margin-right:10px;"></i> Add Department
									</h4>
						 </div>
						 <div class="panel-body" style="padding-left:0px; padding-right:0px;  background-color:#27293d; padding-top:15px; padding-bottom:0px;">
										<form class="form-horizontal form-bordered" action="" method="POST">
                                        <div class="col-md-12">
								      <div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="text" class="form-control" name="name" value=""  required><span class="placeholder">Name</span>
											</div>
										</div>
								      </div> 
                                </div>
                                  
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
									</form>
                             
                             
                             
						</div>
                         
                          <div class="seacrch_product" style="padding-left: 30px; padding-right: 30px; margin-bottom:15px; ">
                            <div class="form-group" style=" position:relative; width:100%;">
                                               
                                
                                
                                               <ul class="my_drop_down" style="list-style:none; padding:0px;">
                                                   <li class="active">Select Product</li>
                                                 
                                               </ul>
											
											</div>
                           
                            </div> 
                        
                      
          </section>
				</div>







						<div class="col-md-12" style="padding:0px; padding-right:15px; margin-bottom:15px;"> 
						<!--

						

						<div class="col-md-6">
										<div class="form-group">
											<div class="col-md-12">
												<input type="number"  class="form-control" name="from_account_id" value="<?php echo $selected_money[0]->from_account_id; ?>"  required>
												<span class="placeholder">From Account</span>
											</div>
										</div>
								      </div>








						<section class="section_card" id="table_section">
								 <header class="panel-heading" style="padding:0px 15px;">
								     	<div class="heading_box" style=" border-bottom: none; padding: 6px 2px; height:36px; background-color:#27293d;">
									        <h2 class="panel-title" style="color:#dbd6d6; font-size:16px; line-height:10px; text-transform:uppercase;">
														<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
														Product List <i class="ion-chevron-right" style="padding:0px 10px; color:#0088cc;"></i> <?php  if(isset($product_list[0]->product_sub_category_name)){ echo $product_list[0]->product_sub_category_name;  } ?>
														<i class="ion-chevron-right" style="padding:0px 10px; color:#0088cc;"></i>
														<?php  if(isset($product_list[0]->product_category_name)){ echo $product_list[0]->product_category_name;  } ?>
													</h2>
									    </div>
								</header> 
							  <div class="panel-body " style="padding-top:0px;">
								   <table class="table mb-none" id="table" data-toggle="table" data-pagination="true" style="border-bottom: 1px solid #424351;">
									 <thead>
									   	<tr>
											 <th>Sr no</th>
										   
											 <th>Product Name</th>

												 <th>Unit</th>
												 <th>Price</th>
                                             <th>GST</th>
											   <th class="hidden-phone">Status</th>
											   <th>Edit</th>
											   <th>Action</th>
										</tr>
									</thead>
									<tbody class="item_table">
										 
                                         
									</tbody>
								</table>
							</div>
						</section> -->
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
    
    
    <div id="invoice" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:70vw; margin:auto;">
										 <div class="modal-dialog" style="width:90%;">
												 <div class="modal-content">
														  <div class="modal-head danger-md" style=" background-color:#3c3f52; border-top:none; border-bottom:1px solid #424351;">
                                                              <div class="row" style="padding:10px 35px;">
                                                              <div class="col-md-8" style="font-size;20px ; color:#c8c6c4;">
                                                                  <strong class="m_product_name">Product name </strong>
                                                              </div>
                                                              <div class="col-md-4" style="">
                                                                 <a class="close" data-dismiss="modal" href="#" style="color:#ff4748; text-shadow:none; opacity:1;">X</a> 
                                                              </div>
                                                              </div>
                                                         </div>
														 <div class="modal-body" style="padding: 20px; text-align:center; height:400px;  background-color:#27293d; ">
                                                                  <div class="col-md-12" style="margin-bottom:15px; display:none;">
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" name="m_product_id">
                                                                         <span class="placeholder">Product ID</span>
                                                                     </div>
                                                                </div>
                                                               
                                                            	 <div class="col-md-12" style="margin-bottom:15px">
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" name="m_product_qty">
                                                                         <span class="placeholder">Quantity</span>
                                                                     </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12" style="margin-bottom:15px">
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" name="m_unit_discount">
                                                                         <span class="placeholder">Unit Discount</span>
                                                                     </div>
                                                                </div>
                                                                
                                                                <div class="col-md-12" style="margin-bottom:15px" >
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" name="m_unit_cost">
                                                                         <span class="placeholder">Unit Cost</span>
                                                                     </div>
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:15px" >
                                                                     <div class="form-group" style="position:relative;">
                                                                         <input type="text" class="form-control" value="" name="m_tax_method">
                                                                         <span class="placeholder">Tax Method</span>
                                                                     </div>
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:15px">
                                                                     <div class="form-group" style="position:relative;">
                                                                         
                                                                         <select class="form-control" name="m_tax_rate" required>
                                                                            <option value=""></option>
                                                                            <?php foreach($tax_list as $row){ ?>
                                                                            <option value="<?php echo $row->tax_rate; ?>"><?Php echo $row->tax_type_name.' '.$row->tax_rate; ?> % </option>
                                                                            <?php } ?>

                                                                        </select>
                                                                         
                                                                         <span class="placeholder" >Tax Rate</span>
                                                                     </div>
                                                                </div>
                                                                <div class="col-md-12" style="margin-bottom:15px">
                                                                     <div class="form-group" style="position:relative;">
                                                                         <select class="form-control" name="m_product_unit" required>
                                                                            <option value=""></option>
                                                                            <?php foreach($unit_list as $row){ ?>
                                                                            <option value="<?php echo $row->unit_id; ?>"><?Php echo $row->unit_name; ?></option>
                                                                            <?php } ?>

                                                                        </select>
                                                                        
                                                                         <span class="placeholder">Product Unit</span>
                                                                    </div></div>
														      <div class="col-md-12" style="margin-bottom:15px">
                                                                     <div class="form-group" style="text-align:left; ">
                                                                         <button type="button" class="btn-transparent btn-blue" name="submit_edit_product">Submit</button>
                                                                    </div></div>
                                                       
												 </div>
										 </div>
								 </div>
    
    </div>


<?php $this->load->view('common/footer_script'); ?>
<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/image-compressor.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notification-active.js"></script>
<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>

</body>
</html>
   