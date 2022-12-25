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
            <div class="container-fluid" style="margin-top:15px;">
            <div class="product-status-wrap mycard" style="padding-top:0px; border-top:2px solid #0099cc;">
                 <div class="row" style="background-color:#f7f7f7; ">
				        <div class="search_engine" style="height:auto; min-height:60px; padding-top:15px;">
                            <div class="breadcome-heading" style="">
                                <div class="input-group"  style=" width:100%;">
                                        <input type="hidden" id="return_colony" value="<?php if(isset($return_colony)){ echo $return_colony; } ?>">
                                        <input type="hidden" id="return_status" value="<?php if(isset($return_status)){ echo $return_status; } ?>">
                                    
                                        <form action=""  method="post" id="myformsearch">
                                           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >   
                                                <div class="form-group" id="data_5" style=" height:28px;">
                                                   <input type="text" name="name_search" id="name_search" value="<?php if(isset($return_name)){ echo $return_name; } ?>" class="form-control" placeholder="Search By Customer Name" style="background-color:#ffffff; width:100%;">
                                                </div>
                                           </div>
                                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                                            <div class="form-group" id="data_5" style=" height:28px;">
                                                 <select name="plan" class="form-control" style="width:100%;">
                                                     <option value="">All Plan</option>
                                                     <?php foreach($select_plan as $row){ ?>
                                                     <option <?php if(isset($return_plan)){ if($return_plan == $row->plan_id ){ echo 'selected'; } } ?> value="<?php echo $row->plan_id; ?>"><?php echo $row->plan_name ?></option>
                                                     <?php } ?>
                                                </select>
                                            </div>
                                           </div>
                                           <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
                                             <div class="form-group" id="data_5" style=" height:28px;">
                                                  <select name="colony_search" class="form-control" style="width:100%;">
                                                      <option value="">Colony Name</option>
                                                      <?php foreach($select_colony as $row){ ?>
                                                      <option value="<?php echo $row->colony_id; ?>"><?php echo $row->colony_name ?></option>
                                                      <?php } ?>
                                                 </select>
                                             </div>
                                            </div>      
                                           <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                  <div class="form-group" id="data_5" style=" height:28px;">
                                                     <input type="submit" name="submit" class="btn" value="Search" style="background-color: #46c7fe; color:#ffffff; width: calc(100% - 48px);"/>
                                                      
                                                      <span><button type="button" id="tbl_refresh" class="btn" style="width:40px; border:1px solid #e8e8e8"><i class="ion-android-sync" style="color:#46c7fe; "></i></button></span>
                                                  </div>
                                           </div>
                                            
                                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                <button type="button" class="btn" id="print" style="">Print</button> 
                                            </div>
                                    </form>
                                </div>
                             </div>
				          </div>		
				 </div>
         
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
			    <div class="row" style="padding-top:45px;">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:0px;">
                        
						<div class="asset-inner" id="print_area">
                              <?php foreach($all_customer as $row){ ?>
                               <div style="width:450px; height:247px; box-sizing: border-box; display:inline-block; margin-bottom:15px;  margin-left:15px;  position:relative; ">
                                    <img src="<?php echo base_url(); ?>catalogs/img/card.png" alt="" style="width:100%; height:100%; position:absolute; z-index:0;">
                                    <div style="width:218px; box-sizing: border-box;  display:inline-block; color:#ffffff; position:relative; padding-top:50px; padding-left:50px; font-size:16px; font-weight:700;">
                                        <p style="margin-bottom:10px; padding-left:48px; line-height:18px;"><span style="left:40px; position:absolute;">Name: </span>  <?php echo $row->customer_name; ?></p>
                                        <p style="margin-bottom:10px; padding-left:48px; line-height:18px;"><span style="left:40px; position:absolute;">Mob.:</span> <?php echo $row->mobile_no; ?></p>
                                         
                                        <p style="margin-bottom:5px; padding-left:48px; line-height:18px;"><span style="left:40px; position:absolute;">Add.:</span> <?php echo $row->address_one; ?></p>
                                        
                                         
                                          
                                    </div>
                                   <div style="display:inline-block; box-sizing: border-box;  float:right; padding-top:50px;  margin-right:100px; width:130px; height:; z-index:2; position:relative;">
                                        <img src="https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=scan_orders.html?customer_id=<?php echo $row->my_customer_id; ?>&choe=UTF-8" title="Link to Google.com" style="width:100%; height:auto; border:1px solid #fdc061; border-radius:5px;"/>
                                    </div>
                               </div>  
                              <?php } ?>
							   
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
				 url: '<?php echo base_url(); ?>plan/delete_plan',
				
				 data:{del_id:del_id},
				
				 success:function(del){
					 
					 if(del === "success"){
						
						window.location.href = window.location.href;
						
					}else{
						
						
						alert("something Wrong");
					}
					 
				 }
			});
			
		});    
            
        });
	</script>
</body>
</html>