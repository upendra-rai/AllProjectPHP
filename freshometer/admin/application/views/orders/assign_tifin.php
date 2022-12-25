<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('common/header_link'); ?>
   <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/c3/c3.min.css">
   <!-- touchspin CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/touchspin/jquery.bootstrap-touchspin.min.css">	
    <style type="text/css">
        .form-control{
            height:32px;
        }
        
        .myheadtitle_box{
            
            width:270px;
            height:;
            padding:7px 15px;
            background-color:#46c7fe;
            color:#ffffff;
            box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.4);
        }
        
        button.pd-setting-ed.myedit{
            
              background-color: #46c7fe;
        }
        
        .pd-setting-ed.myedit:hover{
            
            background-color: #01a2e7;
        }
        
        .detail_box p label{
        
        font-weight: 400;
        color: #000000;
        /*color: #525252;*/
        font-size: 15px;
    }
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
    <?php $this->load->view('common/sidemenu'); ?>
    <div class="all-content-wrapper">
        
        <?php $this->load->view('common/titlebar'); ?>
        
        <div class="container-fluid" style="margin-top:15px; " id="action_div">
            <div class="product-status-wrap mycard" style="padding-top:5px; border-top:2px solid #0099cc;">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:7px; margin-bottom: 0px;">
                    <div class="message error" style="display:<?php if(isset($message) && $message === "failed"){ echo "block"; } ?>">
                                                          Process is Failed!
                                                          <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                                          <br>
                                                          <br>
                                                      </div>
                                                     <div class="message success s_add" style="display:<?php if(isset($message) && $message === "success"){ echo "block"; } ?>">
                                                          Customer profile is successfully added. 
                                                         <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                                         <br>
                                                          <br>
                                                      </div>
                                                     <div class="message success s_update" style="display:<?php if(isset($message) && $message === "updatesuccess"){ echo "block"; } ?>">
                                                         Customer profile is successfully updated. 
                                                          <button type="button" title="close" style="background-color:transparent; border:none; float:right;">X</button>
                                                        <br>
                                                      </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div id="myheadtitle" style="margin-bottom:0px; ">
                                <input type="hidden" id="msg_input" value="<?php if(isset($message)){ echo $message; }else{ echo ""; } ?>">
                                Customer Profile <span><i class="ion-android-arrow-dropright" style="color: #0099cc;"></i></span> Update 
                                <ul class="my_quick_bt" style="">
                                    <li>
                                        <a id="loc_home" href="javascript:void(0);">
                                            <i class="ion-ios-home-outline"></i>
                                        </a>
                                    </li>     
                                    <li>
                                        <a id="loc_back" href="javascript:void(0);">
                                            <i class="ion-ios-undo-outline"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row" id="my_table_body">
                                <?php foreach($order_list as $row){ ?>
							     <div class="col-md-6">
                                     <div class="detail_box first">
                                         <p class="box_title ">Customer Details</p>
                                         <img src="<?php echo base_url('catalogs') ?>/img/customer_img/<?php echo $row->customer_image; ?>" class="thumbnail" alt="" style="width:120px; height:120px; border-radius: 50%;" />
                                         <p style="font-weight:600; color:#0798dc;"><label>Name:</label> <?php echo $row->customer_name; ?></p>
                                         <p><label>Email Address:</label> <?php echo $row->email_address; ?></p>
                                         <p><label>Phone 1:</label> <?php echo $row->mobile_no; ?></p>
                                         <p><label>Phone 2:</label> <?php echo $row->mobile_no2; ?></p>
                                         <p><label>Address1:</label><?php echo $row->address; ?></p>
                                         
                                         
                                         <p style="font-weight:600; color:#0798dc;"><label>Colony Name:</label> <?php echo $row->colony_name; ?></p>
                                         
                                         <p><label>Delivery Shift:</label> <?php echo $row->shift_name; ?></p>
                                     </div>
                                 </div>
                                
                                <div class="col-md-6">
                                         <div class="detail_box second" style="border-right: 1px solid transparent;">
                                             <input type="hidden" id="current_balance_amount" value="<?php echo $row->balance_amount; ?>" />
                                         <p class="box_title ">Account Details</p>
                                              <p style="font-weight:600; color:#0798dc;"><label>Balance: Rs.</label> <?php echo number_format($row->balance_amount); ?></p>
                                              <p><label>Ragistration Date:</label> <?php echo date('d-M-y', strtotime($row->ragistration_date)); ?></p>
                                            
                                              <br>
                                         <p class="box_title ">Action Panel</p>
                                               <div class="sparkline15-graph" style="padding-left:15px;">
                                                  <div class="row">
                                                       
                                                        <p><label>Assign Tifin:</label></p>
                                                        <div class="input-group custom-go-button">
				                                            <span class="input-group-addon" ><i class="fa fa-credit-card" aria-hidden="true" ></i></span>
                                                            <input type="text" class="form-control" id="card_no_input" value="" placeholder="0000000" onkeydown="validateNumber(event);" maxlength="7"  style="width: 250px; height:43px;">
                                                            <span id="assign_tifin_span" style="color:red;"></span>
                                                        </div>
                                                        <div id="recharge_msg" style="color:red; display:block; margin-top:-10px; margin-bottom:20px;"></div>
                                                        
                                                      <button data-toggle="tooltip" title="Edit" id="assign_card_bt" class="btn btn-primary action_panel_bt" data-order_shift="<?php if(isset($return_shift)){ echo $return_shift; } ?>" data-customer_id="<?php echo $row->customer_id; ?>" style="background-color:#3f51b5; width:100px;"><i class="fa fa-credit-card" style="line-height:25px;"></i>Submit</button>
                                                        
                                                   </div>
                                               </div>        
				                         </div>			         
				               </div>
                                
                        <?php } ?>        
                            </div>
                    </div>
                </div>
            </div>
	    </div>
        
        
        
	</div>

   <?php $this->load->view('common/footer_script'); ?>
    
	
	<!-- touchspin JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/touchspin/touchspin-active.js"></script>	
		
    <script type="text/javascript">
    $(document).ready(function(){
       
      function select_take(){ 
             var select_colony = $('input[id=select_colony]').val();
             var select_agent = $('input[id=select_agent]').val();
             var select_delivery = $('input[id=select_delivery]').val();                 
             
            $('select[name=delivery_search]').val(select_delivery);
            $('select[name=colony_search]').val(select_colony);
            $('select[name=agent_search]').val(select_agent);
    
        } 
        select_take();
        
        $(document).on('click', '#tbl_refresh',function(){
            
           window.location.href =   window.location.href;
            
        });
        
        $(document).on('click','#assign_card_bt',function(){
             var card_no  = $('input[id=card_no_input]').val();
             var customer_id = $(this).data('customer_id');
             var order_status = $(this).data('order_shift');
            
            
            $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>orders/assign_card_submit',
				
				 data:{card_no:card_no,customer_id:customer_id,order_status:order_status},
				
				 success:function(data){
					 
                     //alert(data);
					 if(data === "success"){
                      
						window.location.href = '<?php echo base_url()  ?>orders/orders';
						
					 }else if(data === "broken"){
						     //alert("This tifin id is broken or lost");
                         $('#assign_tifin_span').text('This tifin id is broken or lost');
                     }else if(data === "assigned"){
                              //alert("This tifin id is already assigned");
                          $('#assign_tifin_span').text('This tifin id is already assigned');
                     }else if(data === "invalid"){
                             //alert("Tifin id is invalid");
                             $('#assign_tifin_span').text('Tifin id is invalid');
                     }else if(data === "order_assigned"){
                           // alert("Customer order is already assigned");
                              $('#assign_tifin_span').text('Customer order is already assigned');
                    }else if(data === "low_ballance"){
                           // alert("Customer order is already assigned");
                              $('#assign_tifin_span').text('Insufficent account ballance.');
                    }else{
                         
                         alert("Process is failed");
                     }
					 
				 }
				 
				 
				 
			});
            
        });
        
    });
    </script>
</body>
</html>