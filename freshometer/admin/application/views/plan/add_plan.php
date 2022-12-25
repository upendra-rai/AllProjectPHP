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
        
        .input-group{
            width:100%;
            margin-bottom: 5px;
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
		
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="padding:0px;">
            <div class="container-fluid" style="margin-top:15px; ">
               <div class="product-status-wrap mycard">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div id="myheadtitle" style="margin-bottom:0px; ">
                                <?php if(isset($selected_plan)){ echo 'Edit Plan'; }else{ echo 'Add Plan'; } ?> 
                                
                            </div>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                       
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                             <div class="message error" style="display:<?php if(isset($message) && $message === "failed"){ echo "block"; } ?>">
                                                 Process Is Failed!
                                                 <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                             </div>
                                             <div class="message card" style="display:<?php if(isset($message) && $message === "taken"){ echo "block"; } ?>">
                                                 This card number is already assign
                                                 <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                             </div>
                                            <div class="message card" style="display:<?php if(isset($message) && $message === "invalid"){ echo "block"; } ?>">
                                                 This card number is not valid
                                                <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                             </div>
                                            <div class="message success" style="display:<?php if(isset($message) && $message === "success"){ echo "block"; } ?>">
                                                 Customer is successfully added. 
                                                 <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                             </div>
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form action="" method="post" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Plan Name</label>
                                                                <div class="input-group">
																   
                                                                    <input name="plan_name" id="plan_name" type="text" class="form-control" value="<?php if(isset($selected_plan)){ echo $selected_plan[0]->plan_name; } ?>" placeholder="Plan Name"   required>
                                                                </div>
                                                               
                                    
                                                               
                                                                 </div>
                                                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                  <label>Shift</label>
                                                                  <div class="input-group" style="margin-bottom:10px;">
                                                                    
                                                                    <input type="checkbox" name="shift_breakfast" value="yes" id="breckfast_check" class="form-control" <?php if(isset($selected_plan[0])){ if($selected_plan[0]->plan_breakfast == 'yes'){ echo 'checked'; }} ?>  style="width:15px; height: 15px; margin:0px; margin-right:10px;
                                                                     ">  
                                                                    <label for="breckfast_check" style="line-height:0px; margin:0px;">Breakfast</label>  
                                                                     <br>  
                                                                    <input type="checkbox" name="shift_launch" value="yes" id="launch_check" class="form-control" <?php if(isset($selected_plan[0])){ if($selected_plan[0]->plan_launch == 'yes'){ echo 'checked'; }} ?> style="width:15px; height: 15px; margin:0px; margin-right:10px;
                                                                     ">  
                                                                    <label for="launch_check" style="line-height:0px; margin:0px;">Launch</label>  
                                                                     <br>
                                                                 
                                                                    <input type="checkbox" name="shift_dinner" value="yes" id="dinner_check" class="form-control" <?php if(isset($selected_plan[0])){ if($selected_plan[0]->plan_dinner == 'yes'){ echo 'checked'; }} ?> style="width:15px; height: 15px; margin:0px; margin-right:10px;
                                                                     ">  
                                                                    <label for="dinner_check" style="line-height:0px; margin:0px;">Dinner</label>    
                                                                  
                                                                </div>
                                                                
                                                               </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                 <label>Status</label>
                                                                 <select name="status" class="form-control" style="width:100%;" required>
                                                                       
                                                                         <option <?php if(isset($selected_plan)){ if($selected_plan[0]->plan_status == 'active'){ echo 'selected'; }} ?>  value="active">Active</option> 
                                                                         <option <?php if(isset($selected_plan)){ if($selected_plan[0]->plan_status == 'inactive'){ echo 'selected'; }} ?>  value="inactive">Inactive</option> 
                                                                     
                                                                         <option <?php if(isset($selected_plan)){ if($selected_plan[0]->plan_status == 'old_plan'){ echo 'selected'; }} ?>  value="old_plan">Old Plan</option>
                                                                         
                                                                    </select>
                                                                
																
                                                                
																 
                                                                </div>
                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                 <label>Plan Discription</label>
                                                                 <div class="input-group">
                                                                     <textarea name="discription" maxlength="500" class="form-control"><?php if(isset($selected_plan)){ echo $selected_plan[0]->discription; } ?></textarea>
                                                                    
                                                                   
                                                                </div>
                                                                
																
                                                                
																 
                                                                </div>
                                                            </div>  
                                                            
                                                            <div class="col-md-6">
                                                                
                                                            
                                                           
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                <label>Plan Duraction</label>
                                                                <div class="input-group">
                                                                    
                                                                    <input name="duraction" id="duraction" type="number" class="form-control" value="<?php if(isset($selected_plan)){ echo $selected_plan[0]->duraction; } ?>" placeholder="Plan Duraction"   required>
                                                                </div>
                                                               
                                    
                                                               
                                                            </div>
                                                            
                                                            
                                                           
                                                            
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                 <label>Plan Cost</label>
                                                                 <div class="input-group">
																    
                                                                    <input name="cost" type="number" class="form-control" value="<?php if(isset($selected_plan)){ echo $selected_plan[0]->cost; } ?>"  placeholder="Plan Cost" required>
                                                                   
                                                                </div>
                                                                
																
                                                                
																 
                                                            </div>
                                                            
                                                             
                                                            
                                                            
                                                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                  <label>No. of Diet</label>
                                                                 <div class="input-group">
																    
                                                                    <input name="tifin_qty" type="number" class="form-control" value="<?php if(isset($selected_plan)){ echo $selected_plan[0]->total_tifin_qty; } ?>"  placeholder="Nuber of Diet" required>
                                                                   
                                                                </div>
                                                                
																
                                                                
																 
                                                            </div>
                                                            
                                                            
                                                            
                                                            
                                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                                 <label>Unit Price</label>
                                                                 <div class="input-group">
																    
                                                                    <input name="per_tifin_price" type="number" step="0.01" class="form-control" value="<?php if(isset($selected_plan)){ echo $selected_plan[0]->per_tifin_price; } ?>"  placeholder="Unit Price" required>
                                                                   
                                                                </div>
                                                                
																
                                                                
																 
                                                            </div>
                                                            
                                                            </div> 
                                                            
                                                             
                                                           
                                                            
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="col-lg-12">
                                                                <div class="payment-adress" style="text-align:left;">
																  
                                                                    <button type="submit" id="add_customer_bt" class="btn btn-primary waves-effect waves-light" style="background-color:#2c6be0;">Submit</button>
                                                                     
                                                                </div>
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
            
                
            <!--  
            <div class="product-status-wrap mycard" style="margin-top:15px;">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div id="myheadtitle" style=" ">
                                Product List
								
                        </div> 
						<div class="asset-inner">
							       
                                <table id="table" data-toggle="table" data-pagination="true">
                                     <thead>
									<tr>
                                        <th>Sr. No.</th>
                                       
                                        <th>Plan Duraction</th>
                                        <th>Plan Price</th>
                                        <th>Shift</th>
                                        <th>Edit</th>
								        <th>Delete</th>
                                    </tr>
									 </thead>
									 <tbody class="team_tbody">
                                         <?php $i=1; foreach($plan_list as $row){?>
                                             <tr class="list_tr">
                                                 <td><?php echo $i++; ?></td>
                                              
                                                 <td class="name_td"><?php echo $row->duraction; ?></td>
                                                  <td class="name_td"><?php echo $row->cost; ?></td>
                                                  <td class="name_td"><?php echo $row->shift; ?></td>
										         <td>
                                                 <button data-toggle="tooltip" title="Edit" id="update" data-update_id="<?php echo $row->menu_id; ?>" class="pd-setting-ed myedit"><i class="fa fa-pencil" aria-hidden="true" ></i></button>
                                                 </td>
                                                 
                                                 <td>
                                                 <button data-toggle="tooltip" title="delete" id="product_delete" data-del_id="<?php echo $row->menu_id; ?>" class="pd-setting-ed mydelete"><i class="fa fa-trash" aria-hidden="true" ></i></button>
                                                 </td>
										        
                                              </tr>
                                         <?php } ?>
                                   
									</tbody>
								</table>
                            </div>
                            
                    </div>
                </div>
            </div> -->
	    
            </div>
                </div>
        
			           <div id="success_alert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    <!--<div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>-->
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2>Awesome!</h2>
                                        <p>Customer Is Successfully Added</p>
                                    </div>
                                    <div class="modal-footer">
                                        
                                       <button class="btn btn-primary" type="button" id="success_ok" style="width:80px; background-color:#2c6be0;">OK</button>
                                    
                                    </div>
                                </div>
                            </div>
                       </div>
			           <div id="failed_alert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                                        <h2>Error!</h2>
                                        <p id="error_p">Sorry Card Number Is Not Valid</p>
                                    </div>
                                    <div class="modal-footer danger-md">
                                       
                                        <button class="btn btn-primary" type="button" data-dismiss="modal" style="width:80px; background-color:#2c6be0;">OK</button>
                                    
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
       
     function forceInputUppercase(e)
  {
    var start = e.target.selectionStart;
    var end = e.target.selectionEnd;
    e.target.value = e.target.value.toUpperCase();
    e.target.setSelectionRange(start, end);
  }
          document.getElementById("field1").addEventListener("keyup", forceInputUppercase, false);
</script>
    
    <script type="text/javascript">
       
        
	$(document).ready(function(){

		$(document).on('click','#success_ok',function(){
			
			window.location.href = window.location.href;
			
			
		});
		$(document).on('click','#fail_ok',function(){
			
			 window.location.href = window.location.href;
			
		});
        
        $(document).on('click','input[class=form-control]',function(){
			$('.success').hide();
			
		});
        
        $(document).on('click','button[title=close]',function(){
			$(this).parent().css('display','none');
			
		});
		
        function colony_take(){
             var colony_selected = $('input[id=colony_selected]').val();
             if(colony_selected === ""){
                 
                 
                 
             }else{
                 
                 $('select[name=colony]').val(colony_selected);
                 
             }
            
            
        } 
        colony_take();
        
        $('input[name=tifin_qty]').keyup(function(){
             var tifin_qty = $('input[name=tifin_qty]').val();
             var cost = $('input[name=cost]').val();
            
             var cal_per_tifin_cost = Math.abs(cost) / Math.abs(tifin_qty);
            
            if(Number(cal_per_tifin_cost)){
                $('input[name=per_tifin_price]').val(Math.floor( cal_per_tifin_cost));
            }
            
        });
        
        $('input[name=per_tifin_price]').keyup(function(){
             var tifin_qty = $('input[name=tifin_qty]').val();
             var cost = $('input[name=cost]').val();
             var per_tifi_cost = $('input[name=per_tifin_price]').val();
            
             var cal_tifin_qty = Math.abs(cost) / Math.abs(per_tifi_cost);
            
            if(Number(cal_tifin_qty)){
                $('input[name=tifin_qty]').val(cal_tifin_qty);
            }
            
        });
        
        $('input[name=cost]').keyup(function(){
             var tifin_qty = $('input[name=tifin_qty]').val();
             var cost = $('input[name=cost]').val();
             var per_tifi_cost = $('input[name=per_tifin_price]').val();
             if(cost > 0){
             if(tifin_qty && per_tifi_cost){
                  var cal_per_tifin_cost = Math.abs(cost) / Math.abs(tifin_qty);
                  if(Number(cal_per_tifin_cost)){
                      $('input[name=per_tifin_price]').val(Math.floor( cal_per_tifin_cost));
                  }
             }else if(tifin_qty && !per_tifi_cost){
                 var cal_per_tifin_cost = Math.abs(cost) / Math.abs(tifin_qty);
                  if(Number(cal_per_tifin_cost)){
                      $('input[name=per_tifin_price]').val(Math.floor( cal_per_tifin_cost));
                  }
             }else if(!tifin_qty && per_tifi_cost){
                 var cal_tifin_qty = Math.abs(cost) / Math.abs(per_tifi_cost);
                 if(Number(cal_tifin_qty)){
                     $('input[name=tifin_qty]').val(cal_tifin_qty);
                 }
             }
             }else{
                 $('input[name=per_tifin_price]').val('');
             }
        });
         
        
	});
	</script>
</body>
</html>