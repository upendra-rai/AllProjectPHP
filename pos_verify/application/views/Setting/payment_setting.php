<!doctype html>
<html class="fixed">
<head>
		<?php $this->load->view('common/header_link'); ?>
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/modal.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/Lobibox.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/modal/notifications/notifications.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/custom-scrollbar/jquery.mCustomScrollbar.css">
    <style type="text/css">
        .form-group{
            padding: 0px;
        }    
        
       .form-group .form-control{
           
         width: 100%;  
         padding-left: 30px;
         border:1px solid #43444a;
       }
        .form-group .form-control:option{
            padding: 10px;
        }
        
        .status{
            margin-bottom: 0px;
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
						<div class="col-md-12" style="padding:0px; margin-bottom:15px;">
						<section class="section_card" id="table_section">
                <div class="row">
                    
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

                 </div>
                   
				<header class="panel-heading" style="padding:0px 15px;">				     	<div class="heading_box" style=" border-bottom: none; padding: 6px 2px; height:36px; background-color:#27293d;">
						<h2 class="panel-title" style="color:#dbd6d6; font-size:16px; line-height:10px; text-transform:uppercase;">
							<i class="ion-android-radio-button-on" style="margin-right:10px;"></i>
							 Payment Setting <i class="ion-chevron-right" style="padding:0px 10px; color:#0088cc;"></i> <?php if(isset($return_date)){ echo date('d-M-Y',strtotime($return_date)); } ?>
							</h2>
        				    </div>
								</header>
        <form class="form-horizontal form-bordered" action="" method="POST">
			<div class="panel-body " style="padding-top:0px;">
            <div class="container">
            <div class="row">
               <div class="col-md-3"  style=" color:white; padding: 15px; width: 500px;">
                <div style="border: 1px solid grey; padding: 15px;">
                   <h4>Online Payment <span style= "float: right;">
                    <select class="form-control" name="online_payment">
                        <option value="">Status</option>
                            <option value="active"  <?php if(isset( $list[0])){if($list[0]->online_payment == 'active') { echo "selected";}} ?> >active</option>
                            <option value="inactive"  <?php if(isset( $list[0])){if($list[0]->online_payment == 'inactive') { echo "selected";}} ?> >inactive</option>   
                    </select></span></h4>
                 </div>         
                </div>
            </div>
               <div class="row">
               <div class="col-md-3"  style=" color:white; padding: 15px; width: 500px;">
                <div style="border: 1px solid grey; padding: 15px;">
                   <h4>UPI Payment <span style= "float: right;">
                    <select class="form-control" name="upi_payment">
                        <option value="">Status</option>
                            <option value="active"  <?php if(isset( $list[0])){if($list[0]->upi_payment== 'active') { echo "selected";}} ?>>active</option>
                            <option value="inactive"  <?php if(isset( $list[0])){if($list[0]->upi_payment== 'inactive') { echo "selected";}} ?>>inactive</option>   
                    </select></span></h4>
                 </div>         
               </div>
            </div>
            <div class="row">
               <div class="col-md-3"  style=" color:white; padding: 15px; width: 500px;">
                <div style="border: 1px solid grey; padding: 15px;">
                   <h4>COD Payment <span style= "float: right;">
                    <select class="form-control" name="cod">
                        <option value="">Status</option>
                            <option value="active"  <?php if(isset( $list[0])){if($list[0]->cod == 'active') { echo "selected";}} ?>>active</option>
                            <option value="inactive"  <?php if(isset( $list[0])){if($list[0]->cod== 'inactive') { echo "selected";}} ?>>inactive</option>   
                    </select></span></h4>
                 </div>         
               </div>
           </div>
               <div class="col-md-1" style="padding:6px;">
                     <div class="form-group">
                          <button type="submit" class="btn btn-primary" name="submit" value="submit" style="width:100%;  height:32px; border-radius:5px; background-color:#0088cc; color:#ffffff;">Submit</button>
                     </div>
                   </div>
            
               </div>
                 </div>
                    </form>        
                    </section>
				</div>
				</section>
			</div>

		<!-- main section -->
       
	 <!-- inner wrapper -->
		
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
		
        
        $(document).on('change','select[name=change_order_status]',function(){
            var status = $(this).val();
            var order_id = $(this).data('order_id');
            var href = window.location.href;
            var return_href = href.substring(href.lastIndexOf('/'));
            //alert(return_href);
            if(status && order_id){
                window.location.href = '<?php echo base_url(); ?>orders/order_accept_or_reject/'+order_id+'/'+status+'/'+return_href;
            }
            
        });
});
</script>
</body>
</html>
