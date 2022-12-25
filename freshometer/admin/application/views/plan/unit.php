<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('common/header_link'); ?>
   
   <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/modals.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/preloader/preloader-style.css">
   <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.print.min.css">
    
     <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/notifications/notifications.css">
    <style type="text/css">
        .message{
            width:100%;
            height:40px;
           
            padding-top:8px;
            text-align:center; color:red;
            box-shadow: 0px 3px 7px -1px rgba(0,0,0,0.6);
            display: none;
           
        }
        .message.error{
              color: #ffffff;
             background-color: #e91e63;
             border:1px solid #e91e63;
        }
        .message.success{
             color: #ffffff;
             background-color: #4caf50;
             border:1px solid green;
            margin-bottom: 10px;
        }
        .message.card{
             color: #ffffff;
             background-color: #ff9600;
             border:1px solid #ff9600;
        }
        .input-group{
            width:100%;
        }
        label{
            font-weight: 500;
            
        }
    </style>
</head>

<body>
    <div class="preloader-single shadow-inner mg-b-30" id="my_loader" style="position:fixed; background: rgba(0,0,0,0.8); width:100%; height:100vh; z-index: 9999; display:none;">
        <div class="ts_preloading_box" style="">
            <div id="ts-preloader-absolute09" style="position:fixed; margin:auto;   border-radius:70px;">
                <div class="tsperloader9" id="tsperloader9_one"></div>
                <div class="tsperloader9" id="tsperloader9_two"></div>
                <div class="tsperloader9" id="tsperloader9_three"></div>
                <div class="tsperloader9" id="tsperloader9_four"></div>
            </div>
        </div>
    </div>
    <?php $this->load->view('common/sidemenu'); ?>
    <div class="all-content-wrapper">
        
        <?php $this->load->view('common/titlebar'); ?>
		
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
            <div class="container-fluid" style="margin-top:15px; ">
            <div class="product-status-wrap mycard" style="margin-top:15px;">
                 <div class="row">
                                       
                                       <div class="message error" style="display:<?php if(isset($message) && $message === "failed"){ echo "block"; } ?>">
                                                          Process Is Failed!
                                                          <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                                          <br>
                                                          <br>
                                                      </div>
                                                     <div class="message success s_add" style="display:<?php if(isset($message) && $message === "success"){ echo "block"; } ?>">
                                                          Team member is successfully added. 
                                                         <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                                         <br>
                                                          <br>
                                                      </div>
                                                     <div class="message success s_update" style="display:<?php if(isset($message) && $message === "updatesuccess"){ echo "block"; } ?>">
                                                         Team member is successfully updated. 
                                                          <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                                        <br>
                                                      </div>
                                    </div>
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="myheadtitle" style="border-bottom:none; margin-bottom:0px; ">
                                Unit List
								<ul class="" style="float:right; ">
								    <li>
                                        <a href="<?php echo base_url(); ?>/plan/add_unit"><button data-toggle="modal" data-target="#PrimaryModalhdbgcl" title="Add Team Member" class="pd-setting-ed" style="background-color:#f3f3f3; border:1px solid #e5e5e5; color:#46c7fe; box-shadow:none;"><i class="ion-android-person-add" aria-hidden="true" style="color:#46c7fe; font-size:14px;"></i> &nbsp Add Unit</button></a>
                                        
                                    </li>
                                    
                                </ul>
                        </div> 
						<div class="asset-inner">
							       
                                <table id="table" data-toggle="table" data-pagination="true">
                                     <thead>
									<tr>
                                        <th>Sr. No.</th>
                                        <th>Unit Name</th> 
                                        <th>Edit</th>
								        <th>Delete</th>
                                    </tr>
									 </thead>
									 <tbody class="team_tbody">
                                         <?php $i=1; foreach($unit_list as $row){?>
                                             <tr class="list_tr">
                                                 <td><?php echo $i++; ?></td>
                                                 <td><?php echo $row->unit_name; ?></td>
										         <td>
                                                     <a href="<?php echo base_url(); ?>plan/edit_unit/<?php echo $row->unit_id; ?>"><button data-toggle="tooltip" title="Edit" id="update" data-update_id="" class="pd-setting-ed myedit"><i class="fa fa-pencil" aria-hidden="true" ></i></button></a>
                                                 </td>
                                                 
                                                 <td>
                                                 <button data-toggle="tooltip"  id="del_row" data-del_id="<?php echo $row->unit_id; ?>" class="pd-setting-ed mydelete"><i class="fa fa-trash" aria-hidden="true" ></i></button>
                                                 </td>
										        
                                              </tr>
                                         <?php } ?>
                                   
									</tbody>
								</table>
                            </div>
                            
                    </div>
                </div>
            </div> 
	    
            </div>
                </div>
         
			           <div id="del_alert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                                        <h2>Are You Sure!</h2>
                                        <p class="fail_model_p">You want to delete this account.</p>
                                    </div>
                                    <div class="modal-footer danger-md">
                                        <button class="btn btn-primary" type="button" data-dismiss="modal" style="width:80px; background-color:#2c6be0;">No</button>
                                        <button data-delete_id="" id="del_model_bt" class="btn btn-primary" type="button"  style="width:80px; background-color:#39ae60;">Yes</button>
                                    
									</div>
                                </div>
                            </div>
                        </div>
        
                       <div id="failed_alert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                                        <h2>Error!</h2>
                                        <p class="fail_model_p">Sorry Opration Is failed ! Try Again</p>
                                    </div>
                                    <div class="modal-footer danger-md">
                                       
                                        <button class="btn btn-primary" type="button" id="error_ok" style="width:80px; background-color:#2c6be0;">OK</button>
                                    
									</div>
                                </div>
                            </div>
                        </div>
	</div>

   <?php $this->load->view('common/footer_script'); ?>
     <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/datepicker-active.js"></script>
    
    <!-- notification JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/notifications/Lobibox.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/notifications/notification-active.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            function show_alert() {
             var url = window.location.href;
		    var check = url.substring(url.lastIndexOf("?")+1); 
              
            if(check === "001"){
                 $('.s_add').show();
                /* Lobibox.notify('success', {
                    msg: 'Customer Profile Is Successfully Added.'
                });*/
                
            }else if(check === "002"){
                $('.s_update').show(); 
            }
            
        }     
        show_alert();    
            
          function myhide_msg(){
            $('.success').hide();
          
        }
        setTimeout(myhide_msg, 2000);  
            
          $(document).on('click','#success_ok',function(){
			
			window.location.href = window.location.href;
			
		}); 
            
        $(document).on('click','button[id=del_row]',function(){
           
			var del_id = $(this).data("del_id");
            $('button[id=del_model_bt]').data("delete_id",del_id);
            $('#del_alert').modal("toggle");
            
        });   
         
         $(document).on('click','button[id=del_model_bt]',function(){
              $('#del_alert').modal("toggle");
            var del_id = $(this).data("delete_id"); 
            // alert(del_id);
			$.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>plan/delete_unit',
				
				 data:{del_id:del_id},
				
				 success:function(del){
					 
					 if(del === "success"){
						
						window.location.href = window.location.href;
						
					}else{
						
						
                        $('p[class=fail_model_p]').text("This plan is already subscribed by some users. Please release it from them before deletion.")
						$('#failed_alert').modal("toggle");
					
					}
					 
				 }
			});
			
		});    
            
        $(document).on('click','#error_ok',function(){
			
			 window.location.href = window.location.href;
			
		});    
            
        });
	</script>
</body>
</html>