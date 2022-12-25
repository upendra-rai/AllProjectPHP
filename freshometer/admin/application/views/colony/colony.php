<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('common/header_link'); ?>
   
   <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/modals.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/preloader/preloader-style.css">
   <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.print.min.css">
    
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
        }
        .message.card{
             color: #ffffff;
             background-color: #ff9600;
             border:1px solid #ff9600;
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
		
         <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="padding:0px;">
            <div class="container-fluid" style="margin-top:15px;">
               <div class="product-status-wrap mycard">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div id="myheadtitle" style=" margin:0px;">
                                Add New Colony
                                
                            </div>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                                               <div style="margin-bottom:15px;">
                                                      <div class="message error" style="display:<?php if(isset($message) && $message === "failed"){ echo "block"; } ?>">
                                                          Process is failed!
                                                          <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                                          <br>
                                                      </div>
                                                     <div class="message success" style="display:<?php if(isset($message) && $message === "success"){ echo "block"; } ?>">
                                                         Colony name is successfully added. 
                                                         <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                                         <br>
                                                      </div>
                                                        <div class="message success" style="display:<?php if(isset($message) && $message === "updatesuccess"){ echo "block"; } ?>">
                                                         Colony name is successfully updated. 
                                                         <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                                         <br>
                                                      </div>
                                                   </div>
                                            <div class="review-content-section" style=" margin:0px;">
                                                <div id="dropzone1" class="pro-ad">
                                                     
                                                    <form action="<?php echo base_url(); ?>colony/submit_colony" method="post" class="dropzone dropzone-custom needsclick add-professors" id="myForm">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="input-group">
																    <span class="input-group-addon"><i style="font-size: 21px;" class="ion-bag"></i></span>
                                                                    <input name="colony_name" id="colony_name" type="text" class="form-control" value="" placeholder="Colony Name" required onkeypress="return onlyAlphabets(event,this);">
                                                                    <span id="span_msg" ></span>
                                                                </div>
                                                                <input name="clone_colony" id="clone_colony" type="hidden" class="form-control" value="clone_blank" >
                                                               
                                                            </div>
                                                            
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                               
                                                                 <input name="myaction"  type="hidden" class="form-control" value="insert" readonly />
                                                                <input name="colony_id"  type="hidden" class="form-control" value="" readonly />
                                                            </div>
                                                           
                                                        </div>
                                                         <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress" style="float:left;">
																  
                                                                    <button type="button" title="submit" class="btn btn-primary waves-effect waves-light" style="background-color:#2c6be0;">Submit</button>
                                                                    <button type="button" id="cancel" class="btn btn-primary waves-effect waves-light" style="background-color:#f50a5c; display:none;">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
													
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
					</div>
                </div>
               </div>
            </div>
        
        <div class="container-fluid" style="margin-top:15px;">
            <div class="product-status-wrap mycard">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="myheadtitle" style=" ">
                                Colony List
								
                        </div> 
						<div class="asset-inner">
							       
                                <table id="table" data-toggle="table" >
                                     <thead>
									<tr>
                                        <th>Sr. No.</th>
                                       
                                        <th>Colony Name</th>
										
                                        <th>Edit</th>
										 <th>Delete</th>
                                    </tr>
									 </thead>
									 <tbody class="team_tbody">
                                         <?php $i=1; foreach($colony as $row){?>
                                             <tr class="list_tr">
                                                 <td><?php echo $i++; ?></td>
                                              
                                                 <td class="name_td"><?php echo $row->colony_name; ?></td>
                                                 
                                                 
										         <td>
                                                 <button data-toggle="tooltip" title="Edit" id="update" data-update_id="<?php echo $row->colony_id; ?>" class="pd-setting-ed myedit"><i class="fa fa-pencil" aria-hidden="true" ></i></button>
                                                 </td>
										        <td>
                                                 <button data-toggle="tooltip" title="delete" id="colony_delete" data-del_id="<?php echo $row->colony_id; ?>" class="pd-setting-ed mydelete"><i class="fa fa-trash" aria-hidden="true" ></i></button>
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
        
        
			           <div id="success_alert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    <!--<div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>-->
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2>Done!</h2>
                                        <p class="success_model_p"></p>
                                    </div>
                                    <div class="modal-footer">
                                        
                                       <button class="btn btn-primary" type="button" id="success_ok" style="width:80px; background-color:#2c6be0;">OK</button>
                                    
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
        
         <div id="del_alert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                                        <h2>Are You Sure!</h2>
                                        <p class="fail_model_p">You want to delete this Colony Name.</p>
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
<script type="text/javascript">
function validateNumber(evt) {
    var e = evt || window.event;
    var key = e.keyCode || e.which;

    if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
    // numbers   
    key >= 48 && key <= 57 ||
    // Numeric keypad
    key >= 96 && key <= 105 ||
    // Backspace and Tab and Enter
    key == 8 || key == 9 || key == 13 ||
    // Home and End
    key == 35 || key == 36 ||
    // left and right arrows
    key == 37 || key == 39 ||
    // Del and Ins
    key == 46 || key == 45) {
        // input is VALID
    }
    else {
        // input is INVALID
        e.returnValue = false;
        if (e.preventDefault) e.preventDefault();
    }
}
    
 function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || charCode === 32)
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }       
</script>
    
    <script type="text/javascript">
	$(document).ready(function(){
		
        $("#myForm").submit(function(e) {
            e.preventDefault();
            window.history.back();
        });
        
        
		$(document).on('click','button[id = update]',function(){
			$('.success').hide();
			var name = $(this).parent().parent('.list_tr').find('.name_td').text();
			var id = $(this).data('update_id');
            
             $('input[name=colony_name]').val(name);
            $('input[name=clone_colony]').val(name);
             $('input[name=myaction]').val('update');
             $('input[name=colony_id]').val(id);
			$('#cancel').show();
            $('#span_msg').html('');
            $('html,body').animate({ scrollTop: 0 }, 'slow');
            
            $('#myheadtitle').text('Edit Colony Name');
		});
		
        $(document).on('click','#cancel',function(){
			
			window.location.href = window.location.href;
			
			
		});
        
        $(document).on('click','button[id=colony_delete]',function(){
			var del_id = $(this).data("del_id");
            $('button[id=del_model_bt]').data("delete_id",del_id);
            $('#del_alert').modal("toggle");
            
        });
        
         $(document).on('click','button[id=del_model_bt]',function(){
              $('#del_alert').modal("toggle");
             
            var del_id = $(this).data("delete_id"); 
            //alert(del_id);
			$.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>colony/delete_colony',
				
				 data:{del_id:del_id},
				
				 success:function(del){
					
					 if(del === "success"){
						$('p[class=success_model_p]').text("Colony Name is successfully deleted.");
						$('#success_alert').modal("toggle");
						
					}else{
						
                        $('p[class=fail_model_p]').text("The colony name is already assigned to some users. Please release it from them before deletion.")
						$('#failed_alert').modal("toggle");
					 
					}
					 
				 }
			});
			
		}); 
        
		$(document).on('click','#success_ok',function(){
			
			window.location.href = window.location.href;
			
			
		});
		$(document).on('click','#fail_ok',function(){
			
			 window.location.href = window.location.href;
			
		});
        $(document).on('click','#error_ok',function(){
			
			 window.location.href = window.location.href;
			
		});
         $(document).on('click','input[class=form-control]',function(){
			$('.success').hide();
			
		});
        
        $(document).on('click','button[title=close]',function(){
			$(this).parent().css('display','none');
			
		});
        
        $(document).on('click','button[title=submit]',function(){
			var val = $('#colony_name').val().toLowerCase();
            
            if(val === ''){
                $('#colony_name').css('border','1px solid red');
            }else{
            
            var clone_colony = $('#clone_colony').val().toLowerCase(); 
            if(clone_colony !== val ){ 
                 var replace_val =val.replace(/\s(?=\s)/g,'');
                 var trim_val = $.trim(replace_val).toLowerCase();
                 var valid = true;
            
                 $('.name_td').each(function(){
                    var colony =  $(this).text(); 
                    var replace_colony = colony.replace(/\s(?=\s)/g,'');   
                    var trim_colony = $.trim(replace_colony).toLowerCase();
                        if(trim_colony === trim_val){
                           return valid = false;
                        }
                });
                if(valid === false){
                    $('#span_msg').html('&nbsp Colony name is already exist');
                }else{
                    $("#myForm").unbind('submit').submit(); 
                }    
                
            }else if(clone_colony === val){
                $("#myForm").unbind('submit').submit(); 
            }
            }
		});
      
		
	});
	</script>
</body>
</html>