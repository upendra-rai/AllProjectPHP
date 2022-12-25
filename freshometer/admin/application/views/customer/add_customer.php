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
            <div class="container-fluid" style="margin-top:15px; ">
               <div class="product-status-wrap mycard">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div id="myheadtitle" style=" ">
                                Add Customer <?php if(isset($firstname[0])){echo $firstname[0]; }?>
                                
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
                                            <div class="message card" style="display:<?php if(isset($message) && $message === "invalid_mobile"){ echo "block"; } ?>">
                                                 This Mobile no is already taken.
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
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="input-group">
																    <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                                                                    <input name="firstname" id="first_name" type="text" class="form-control" value="<?php if(isset($r_first_name)){ echo $r_first_name; } ?>" placeholder="Full Name" onkeypress="return onlyAlphabets(event,this);"  required>
                                                                </div>
                                    
                                                                <div class="input-group">
																    <span class="input-group-addon"><i class="ion-social-whatsapp-outline" style="font-size:18px;"></i></span>
                                                                    <input name="mobileno" type="text" class="form-control" value="<?php if(isset($r_mobileno)){ echo $r_mobileno; } ?>" placeholder="Phone 1"  maxlength="10" minlength="10" required onkeydown="validateNumber(event);"/>
                                                                </div>
                                                                <!--
                                                                <div class="input-group">
																    <span class="input-group-addon"><i class="ion-social-whatsapp-outline" style="font-size:18px;"></i></span>
                                                                    <input name="mobileno2" type="text" class="form-control" value="<?php if(isset($r_mobileno2)){ echo $r_mobileno2; } ?>" placeholder="Phone 2" maxlength="10" minlength="10"  onkeydown="validateNumber(event);"/>
                                                                </div>
                                                               -->
                                                               
																<div class="input-group">
																    <span class="input-group-addon"><i class="fa fa-vcard-o"></i></span>
                                                                    <input name="address1" type="text" class="form-control" value="<?php if(isset($r_address1)){ echo $r_address1; } ?>"  placeholder="Address 1" required>
                                                                   
                                                                </div>
                                                                
                                                                <div class="input-group">
																    <span class="input-group-addon"><i class="fa fa-vcard-o"></i></span>
                                                                    <input name="address2" type="text" class="form-control" value="<?php if(isset($r_address2)){ echo $r_address2; } ?>"  placeholder="Address 2" >
                                                                   
                                                                </div>
																
                                                                 <div class="input-group">
																    <span class="input-group-addon" style="border: 1px solid #e5e6e7;"><i class="ion-social-windows-outline" style="font-size:18px;"></i></span>
                                                                    &nbsp &nbsp
                                                                    <label for="male" style="float:left ; padding: 0px 10px; margin-top:5px; color:#a5a8ab;">Male</label>
                                                                    <input name="gender" type="radio" id="male" value="Male" <?php if(isset($r_gender)){ if($r_gender == 'Male'){ echo 'checked';}}else{ echo 'checked'; } ?> style=" float:left ;margin-top:10px;"> &nbsp 
                                                                    <label for="female" style=" float:left ; padding: 0px 10px; margin-top:5px; color:#a5a8ab;">Female</label>
                                                                    <input name="gender" type="radio" id="female" value="Female" <?php if(isset($r_gender)){ if($r_gender == 'Female'){ echo 'checked';}} ?> style=" float:left ;margin-top:10px;">
                                                                        
                                                                </div>
                                                                 <div class="input-group">
																    <span class="input-group-addon"><i class="ion-social-whatsapp-outline" style="font-size:18px;"></i></span>
                                                                    <input name="dob" type="date" class="form-control" value="<?php if(isset($r_dob)){ echo $r_dob; } ?>" placeholder="DOB" />
                                                                </div>
																 
                                                               
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                              
																<div class="input-group">
                                                                    <input type="hidden" id="colony_selected" value="<?php if(isset($r_colony)){ echo $r_colony; }else{ echo ''; } ?>">
																    <span class="input-group-addon"><i class="ion-ios-location-outline" style="font-size:18px;"></i></span>
                                                                    <select name="colony" class="form-control" style="width:100%;" required>
                                                                        <option value="">Colony Name</option>
                                                                        <?php foreach($select_colony as $row){ ?>
                                                                          
                                                                         <option value="<?php echo $row->colony_id; ?>"><?php echo $row->colony_name ?></option>
                                                                         
                                                                         <?php } ?>
                                                                    </select>
                                                                    
                                                                </div>
                                                                <!--
                                                                <div class="input-group">
                                                                    <input type="hidden" id="shift_selected" value="<?php if(isset($r_shift)){ echo $r_shift; }else{ echo ''; } ?>">
																    <span class="input-group-addon"><i class="ion-ios-location-outline" style="font-size:18px;"></i></span>
                                                                    <select name="shift" class="form-control" style="width:100%;" required>
                                                                        <option value="">Shift</option>
                                                                        <option value="1">Morning</option>
                                                                        <option value="2">Evening</option>
                                                                        <option value="3">Both</option>
                                                                       
                                                                    </select>
                                                                    
                                                                </div>
                                                                 -->
                                                                <!--
                                                                <div class="input-group">
																    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                                                    <input name="advance_payment" type="text" class="form-control" value="<?php if(isset($r_advance_payment)){ echo $r_advance_payment; } ?>" placeholder="Advance Payment" required autocomplete="new-password">
                                                                </div>
                                                               -->
                                                                <!--
																<div class="input-group">
																    <span class="input-group-addon"><i class="fa fa-money"></i></span>
                                                                    <input name="user_id" type="text" class="form-control" value="<?php if(isset($r_user_id)){ echo $r_user_id; } ?>" placeholder="User Id" required autocomplete="new-password">
                                                                </div>
                                                                -->
                                                                <div class="input-group">
																    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                                    <input name="weight" type="number" step="0.01" class="form-control" value="<?php if(isset($r_weight)){ echo $r_weight; } ?>" placeholder="Weight"  />
                                                                </div>
                                                                
                                                                <div class="input-group">
																    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                                    <input name="height" type="number" step="0.01" class="form-control" value="<?php if(isset($r_height)){ echo $r_height; } ?>" placeholder="Height"  />
                                                                </div>
                                                                
                                                                <div class="input-group">
																    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                                    <input name="allergy" type="text"  class="form-control" value="<?php if(isset($r_allergy)){ echo $r_allergy; } ?>" placeholder="Allergy from any edible." />
                                                                </div>
                                                                
                                                                 <div class="input-group">
																    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                                    <select name="refrence" class="form-control">
																	      <option value="Existing Client">Existing Client</option>
																		  <option value="Digital Platform">Digital Platform</option>
																		  <option value="Pamphlet Distribution">Pamphlet Distribution</option>
																	</select>
																</div>
                                                                
                                                                <div class="input-group">
																    <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                                    <input name="password" type="password" class="form-control" value="<?php if(isset($r_password)){ echo $r_password; } ?>" placeholder="Password" required autocomplete="new-password"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
																  
                                                                    <button type="submit" id="add_customer_bt" class="btn btn-primary waves-effect waves-light" style="background-color:#2c6be0;">Submit</button>
                                                                     
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
		function textInput(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
} 
        
		$(document).on('click','#add_customer_bt2',function(){
			$('#my_loader').show();
			var firstname = $('input[name=firstname]').val();
			var lastname = $('input[name=lastname]').val();
			var mobileno = $('input[name=mobileno]').val();
            var mobileno2 = $('input[name=mobileno2]').val();
			var email = $('input[name=email]').val();
			var address1 = $('input[name=address1]').val();
			var address2 = $('input[name=address2]').val();
			var postcode = $('input[name=postcode]').val();
			var colony = $('input[name=colony]').val();
			var city = $('input[name=city]').val();
            var delivery_type = $('input[name=delivery_type]:checked').val();
			var advance_payment = $('input[name=advance_payment]').val();
			var card_no = $('input[name=card_no]').val();
			
            if(firstname == "" || lastname == "" || mobileno == "" || email == "" || address1 == "" || colony == "" || card_no == ""){
                if(firstname == ""){
                    
                }
                
            }else{
			$.ajax({
				type: "POST",
				url: '<?php echo base_url(); ?>customer/form_submit',
				
				data:{
					
					firstname:firstname,
					lastname:lastname,
					mobileno:mobileno,
                    mobileno2:mobileno2,
					email:email,
					address1:address1,
					address2:address2,
					postcode:postcode,
					colony:colony,
					city:city,
                    delivery_type:delivery_type,
					advance_payment:advance_payment,
					card_no:card_no
					},
				success: function(data){
					
					if(data == "success"){
						$('#my_loader').hide();
						$('#success_alert').modal("toggle");
						
					}else if(data == "failed"){
                        $('#my_loader').hide();
                        $('#error_p').text('Sorry Card Number Is Not Valid');
						$('#failed_alert').modal("toggle");
						
					}else{
						
						$('#my_loader').hide();
                        $('#error_p').text('Something Wrong');
						$('#failed_alert').modal("toggle");
					}
					
				},
               error: function(XMLHttpRequest, textStatus, errorThrown) {
                     $('#my_loader').hide();
                     if (XMLHttpRequest.readyState == 4) {
                         $('#failed_alert').modal("toggle");
                         $('#error_p').text('Request is failed due to some reason try again!');
                         // HTTP error (can be checked by XMLHttpRequest.status and XMLHttpRequest.statusText)
                     }
                     else if (XMLHttpRequest.readyState == 0) {
                         $('#failed_alert').modal("toggle");
                         $('#error_p').text('Check Your Internet Connection');
                         // Network error (i.e. connection refused, access denied due to CORS, etc.)
                     }
                     else {
                         $('#error_p').text('Something Wrong');
                         $('#failed_alert').modal("toggle");
                         // something weird is happening
                     }
                 }
				
				
			});
            }
			/* alert(firstname+lastname+mobileno+email+address1+address2+postcode+colony+city+advance_payment+card_no);
			*/
		});
		
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
        
        $('#first_name').keyup(function(){
            var str = $(this).val();
            if(str.length === 1){
                var res = str.charAt(0)
                this.value = res.toUpperCase();
            }else{
                
            }
            
        });
        
         $('#last_name').keyup(function(){
            var str = $(this).val();
            if(str.length === 1){
                var res = str.charAt(0)
                this.value = res.toUpperCase();
            }else{
                
            }
            
        });
        
	});
	</script>
</body>
</html>