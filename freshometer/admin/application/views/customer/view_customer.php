<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('common/header_link'); ?>
   <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/modals.css">
   <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/select2/select2.min.css">
   <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.print.min.css">
     <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/preloader/preloader-style.css">
    
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/notifications/Lobibox.min.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/notifications/notifications.css">
    
<style type="text/css">
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
                                <?php foreach($detail as $row){ ?>
							     <div class="col-md-6">
                                     <div class="detail_box first">
                                         <p class="box_title ">Customer Details</p>
                                         <img src="<?php echo base_url('catalogs') ?>/img/customer_img/<?php echo $row->customer_image; ?>" class="thumbnail" alt="" style="width:120px; height:120px; border-radius: 50%;" />
                                         <p style="font-weight:600; color:#0798dc;"><label>Name:</label> <?php echo $row->customer_name; ?></p>
                                         <p><label>DOB:</label> <?php echo date('d-M-Y',strtotime($row->dob)); ?></p>
                                         <p><label>Gender:</label> <?php echo $row->gender; ?></p>
                                         
                                         <p><label>Address 1:</label><?php echo $row->address_one; ?></p>
                                         <p><label>Address 2:</label><?php echo $row->address_two; ?></p>
                                         
                                         <p style="font-weight:600; color:#0798dc;"><label>Colony Name:</label> <?php echo $row->colony_name; ?></p>
                                         <p><label>Phone 1:</label> <?php echo $row->mobile_no; ?></p>
                                         
                                         <p><label>Weight:</label> <?php echo + $row->weight; ?> KG</p>
                                         <p><label>Height:</label> <?php echo + $row->height; ?> CM</p>
                                         
                                         <p><label>Allergy From Edible:</label> <?php echo $row->allergy; ?></p>
                                         
                                         <p><label>Reference:</label> <?php echo $row->reference; ?></p>
                                         
                                         <p><label>Password:&nbsp;</label><span><button type="button" class="btn" id="show_cus_pass" style="background-color:transparent; border:none;"><i class="ion-eye"></i></button></span> <input type="password" id="cus_pass" value="<?php if(isset($row->password)){  echo $row->password; } ?>" autocomplete="new-password" style="border:none; background-color:transparent;"> </p>
                                     </div>
                                 </div>
                                
                                <div class="col-md-6">
                                         <div class="detail_box second" style="border-right: 1px solid transparent;">
                                             <input type="hidden" id="current_balance_amount" value="<?php echo $row->balance_amount; ?>" />
                                         <p class="box_title ">Account Details</p>
                                             
                                              <p style="font-weight:600; color:#0798dc;"><label>Balance: Rs.</label> <?php echo number_format($row->balance_amount); ?></p>
                                              <p><label>Ragistration Date:</label> <?php echo date('d-M-y', strtotime($row->ragistration_date)); ?></p>
                                              <p><label>Status:</label> <?php echo $row->customer_status; ?> </p>
                                             <br>
                                              <p class="box_title ">Plan Details</p>
                                             <?php if(isset($row->subscribed_plan_status)) { if($row->subscribed_plan_status == 'active'){ ?>
                                              <p style="font-weight:600; color:#0798dc;"><label>Subscribed Plan: </label> <?php if(isset($row->plan_name)){ echo $row->plan_name.' '.$row->duraction; } ?> Days </p>
                                              <p><label>Start On:</label> <?php if(isset($row->start_date)){ echo date('d-M-Y', strtotime($row->start_date)); } ?></p>
                                              <p><label>Expire On:</label> <?php if(isset($row->end_date)){ echo date('d-M-Y', strtotime($row->end_date));} ?></p>
                                              <?php }}else{  ?>
                                              <p  style="font-weight:600; color:#f90f49;">No plans are active right now.</p>
                                              <?php } ?>
                                              <br>
                                         <p class="box_title ">Action Panel</p>
                                             
                                             <div class="row">
                                                       <form method="post" action="">
                                                      <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" >
                                                         <div class="form-group" id="data_5" style=" height:28px;">
                                                              <select name="plan" class="form-control" style="width:100%; height:34px;" required>
                                                                  <option value="" data-plan_duraction="" data-plan_shift="" data-plan_cost="">All Plan</option>
                                                                  <?php foreach($select_plan as $row1){ ?>
                                                                  <option <?php if(isset($return_plan)){ if($return_plan == $row1->plan_id ){ echo 'selected'; } } ?> value="<?php echo $row1->plan_id; ?>" data-plan_duraction="<?php echo $row1->duraction; ?>" data-plan_shift="<?php echo $row1->shift; ?>" data-plan_cost="<?php echo $row1->cost; ?>"><?php echo $row1->plan_name ?></option>
                                                                  <?php } ?>
                                                             </select>
                                                         </div>
                                                          <input type="hidden" name="plan_shift" id="plan_shift" value="" readonly>
                                                          <input type="hidden" name="plan_cost" id="plan_cost" value="" readonly>
                                                        </div>
                                                      
                                                      <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
                                                          <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                          
                                                              <div class="input-daterange input-group" id="datepicker" style=" width:100%;">
                                                                  <div class="form-group" id="data_5" style=" height:28px;">
                                                                    <input type="text" class="form-control" name="start_date" placeholder="Start Date" value="" required  style="text-align:left; height:34px;" autocomplete="off"/>
                                                                  </div>
                                                              </div>
                                                              <input type="hidden" name="end_date"  value="" readonly >
                                                          </div>
                                                        </div>
                                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
                                                            <input type="submit" class="btn btn-primary" value="submit" name="submit" style="width:100%;"/>
                                                       </div>    
                                                       </form>
                                                      </div>
                                               <div class="sparkline15-graph" style="padding-left:15px;">
                                                   
                                                   
                                                  <div class="row">
                                                       <!--
                                                        <p><label>Recarge Account:</label></p>
                                                        
                                                      
                                                        <div class="input-group custom-go-button">
				                                            <span class="input-group-addon" >Rs.</span>
                                                            <input type="text" class="form-control" id="recharge_input" value="" placeholder="0000" onkeydown="validateNumber(event);" style="height:43px;">
                                                            <span class="input-group-btn"><button type="button" id="recharge_bt" data-minimum_recharge="<?php if(isset($minimum_recharge[0])){ echo $minimum_recharge[0]->amount; }else{ echo '500'; } ?>" data-recharge_id="<?php echo $row->customer_id; ?>" data-status="<?php echo $row->customer_status; ?>" class="btn btn-primary" style="height:43px;">RECHARGE</button></span>
                                                            
                                                            
                                                        </div> 
                                                        <div id="recharge_msg" style="color:red; display:block; margin-top:-10px; margin-bottom:20px;"></div>-->
                                                         <a href="<?php echo base_url(); ?>customer/view_customer/<?php echo $row->customer_id; ?>/recharge"> <button data-toggle="tooltip" title="Recharge Detail" data-rech_linkid="<?php echo $row->customer_id; ?>"  class="btn btn-primary action_panel_bt" style="background-color:#44bffd;"><i class="ion-cash" ></i> Recharge  Detail</button></a>
                                                        <a href="<?php echo base_url(); ?>customer/view_customer/<?php echo $row->customer_id; ?>/transaction"><button data-toggle="tooltip" title="Transaction Detail"  class="btn btn-primary action_panel_bt" style="background-color:#673ab7; "><i class="ion-ios-loop" ></i> Transaction  Detail</button></a>
                                                       <a href=""><button data-toggle="tooltip" title="Edit" class="btn btn-primary action_panel_bt" style="background-color:#3f51b5; "><i class="fa fa-pencil-square" style="font-size:22px;"></i> Edit Profile</button></a>
                                                      
													  <!--
													  <a href="<?php echo base_url(); ?>customer/renew_plan/<?php echo $row->customer_id; ?>"><button data-toggle="tooltip" title="Transaction Detail"  class="btn btn-primary action_panel_bt" style="background-color:#673ab7; "><i class="ion-ios-loop" ></i> Renew Plan</button></a>
                                                      -->
                                                        
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
        
        <div id="terminate_msg" class="container-fluid" style="margin-top:15px; display:none;">
            <div class="product-status-wrap mycard" style="padding-top:10px; border-top:2px solid #0099cc;">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            
                           
                            <div class="asset-inner" style="text-align: center;">
                                <img src="<?php echo base_url(); ?>catalogs/img/succ4.png" alt="">
                                <p id="terminate_p" style="font-size:18px; padding:15px;">
                                </p>
                            </div>
                            
                    </div>
                </div>
            </div>
	    </div>
        
        <div id="2" class="container-fluid my_rech_report" style="margin-top:15px; display: <?php if($switch == "recharge"){ echo "block"; }else{ echo "none"; } ?>" id="rech_table">
            <div class="product-status-wrap mycard" style="padding-top:10px; border-top:2px solid #0099cc;">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div id="myheadtitle" style="margin:0px; height:60px; border-bottom:none; padding-top:15px; font-size: 15.1px;">
                                Recharge Detail
								
                            </div>
                           
                            <div class="asset-inner">
							      
                                <table id="table" data-toggle="table" data-pagination="true"  data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true"  data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead>
									<tr>
                                        <th>Sr. No.</th>
                                       
                                        <th>Recharge Date</th>
                                        <th>Amount</th>
                                        <th>Plan</th>
										
                                        <th>Plan Date</th>
                                        <th>Plan Duraction</th>
                                        
									    <th>Recharge By</th>
                                        <!--<th>Action</th>-->
                                    </tr>
									</thead>
									 <tbody id="rech_tbody">
                                        <?php $i = 1; foreach($detail_recharge as $row){ ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                 
                                                <td><?php echo date('d-M-Y', strtotime($row->recharge_date)); ?></td>
                                                 <td><span class="rs_span">&#8377 </span><?php echo number_format($row->recharge_amount); ?></td>
                                                 <td><?php echo $row->plan_name; ?></td>
                                                
                                                   <td><?php if(isset($row->start_date,$row->end_date)){ echo date('d-M-Y', strtotime($row->start_date)).' to '.date('d-M-Y', strtotime($row->end_date)); } ?></td>
                                                 <td><?php echo $row->duraction; ?> Diet</td>
                                                 <td><?php echo $row->name; ?></td>
                                                <!-- <td><?php if($row->recharge_date == $row->last_recharge_date){ ?>  <button type="button" title="myrecharge_delete" class="pd-setting-ed myedit" data-recharge_id="<?php echo $row->recharge_id; ?>" data-re_customer_id="<?php echo $row->customer_id; ?>" data-recharge_amount="<?php echo $row->recharge_amount; ?>" style="background-color:#e91e63;"><i class="fa fa-trash-o" aria-hidden="true" ></i></button>  <?php } ?> </td>-->
                                            </tr>
                                        <?php } ?> 
									</tbody>
								</table>
                            </div>
                            
                    </div>
                </div>
            </div>
	    </div>
        
        <div id="1" class="container-fluid my_tran_report" style="margin-top:15px; display: <?php if($switch == "transaction"){ echo "block"; }else{ echo "none"; } ?>" id="tran_table">
            <div class="product-status-wrap mycard" style="padding-top:10px; border-top:2px solid #0099cc;">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div id="myheadtitle" style="margin:0px; height:60px; border-bottom:none; padding-top:15px; font-size: 15.1px;">
                                Transaction Detail
								
                            </div>
                           
                            <div class="asset-inner">
							       
                                <table id="table" data-toggle="table" data-pagination="true"  data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true"  data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    <thead >
									<tr>
                                        <th>Sr. No.</th>
                                        <th>Transaction Date</th>
                                        <th>Tifin No</th>
                                        <th>Order</th>
										<th>Amount</th>
										<th>Ledger</th>
                                        <!--<th>Action</th>-->
                                    </tr>
									</thead>
									 <tbody id="tran_tbody">
                                            <?php $i = 1; foreach($detail_transaction as $row){ ?>
                                            <tr>
                                                <td><?php echo $i++; ?></td>
                                                <td><?php echo date('d-M-Y', strtotime($row->transaction_date)); ?></td>
                                                <td><?php echo $row->tifin_no; ?></td>
                                                <td><?php echo $row->order_detail; ?></td>
                                                <td><span class="rs_span">&#8377 </span> <?php echo number_format($row->transaction_amount); ?></td>
                                                <td><span class="rs_span">&#8377 </span><?php echo number_format($row->ledger); ?></td>
                                                 <!--<td><a href="<?php echo base_url(); ?>/customer/delete_transaction/<?php echo $row->transaction_id; ?>/<?php echo $row->customer_id; ?>"> <button data-toggle="tooltip" title="Edit" class="pd-setting-ed myedit" style="background-color:#e91e63;"><i class="fa fa-trash-o" aria-hidden="true" ></i></button></a></td>-->
                                            </tr>
                                        <?php } ?> 
									</tbody>
								</table>
                            </div>
                            
                    </div>
                </div>
            </div>
	    </div>
        <br>
        <br>
			
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
                                    <div class="modal-footer danger-md" style="text-align:center;">
                                       
                                        <a href="<?php echo base_url(); ?>customer/view_customer/<?php echo $detail[0]->customer_id;  ?>" style="padding:0px;"><button class="btn btn-primary" type="button" style="width:80px; height:40px; background-color:#2c6be0;">OK</button>
                                        </a>
									</div>
                                </div>
                            </div>
                        </div>
                         <div id="delete_recharge_failed" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                                        <h2>Error!</h2>
                                        <p>The recharge cannot be deleted because your account balance is not sufficient.</p>
                                    </div>
                                    <div class="modal-footer danger-md">
                                       
                                        <button class="btn btn-primary" type="button" data-dismiss="modal"  style="width:80px; background-color:#2c6be0;">OK</button>
                                    
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
                                        <p class="fail_model_p">You want to delete this account.</p>
                                    </div>
                                    <div class="modal-footer danger-md">
                                        <button class="btn btn-primary" type="button" data-dismiss="modal" style="width:80px; background-color:#2c6be0;">No</button>
                                        <button data-delete_id="" id="del_model_bt" class="btn btn-primary" type="button"  style="width:80px; background-color:#39ae60;">Yes</button>
                                    
									</div>
                                </div>
                            </div>
                        </div>
                     
                       
                        <div id="del_alert_action" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:460px; margin:auto;">
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
                                        <button data-del_href="" id="del_recharge_bt" class="btn btn-primary" type="button"  style="width:80px; background-color:#39ae60;">Yes</button>
                                    
									</div>
                                </div>
                            </div>
                        </div>
                      
                      <div id="block_alert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" data-backdrop="static" data-keyboard="false" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                                        <h2>Are You Sure!</h2>
                                        
                                    </div>
                                    <div class="modal-footer danger-md">
                                        <button class="btn btn-primary" type="button" id="block_cancel" style="width:80px; background-color:#2c6be0;">No</button>
                                        <button data-delete_id="" id="block_model_bt" class="btn btn-primary" type="button"  style="width:80px; background-color:#39ae60;">Yes</button>
                                    
									</div>
                                </div>
                            </div>
                        </div>
        
	</div>

   <?php $this->load->view('common/footer_script'); ?>
    <script src="<?php echo base_url('catalogs'); ?>/js/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/select2/select2-active.js"></script>
    <!-- datapicker JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/datepicker-active.js"></script>
    
    <!-- notification JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/notifications/Lobibox.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/notifications/notification-active.js"></script>
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
</script>
  <script type="text/javascript">
     $(document).ready(function(){
		  
	   
		 
        $(document).on('click','button[id=terminate]',function(){
			var link_id = $(this).data("del_id");
            var customer_name = $(this).data("del_name");
            var return_amount = $(this).data("del_return_amount");
            
            $('button[id=del_model_bt]').data("delete_id",link_id);
            $('button[id=del_model_bt]').data("del_name",customer_name);
            $('button[id=del_model_bt]').data("del_return_amount",return_amount);
            $('p[class=fail_model_p]').text('You want to delete this account.');
            $('#del_alert').modal("toggle");
            
        });   
         
         $(document).on('click','button[id=del_model_bt]',function(){
              $('#del_alert').modal("toggle");
            var link_id = $(this).data("delete_id");
            var customer_name = $(this).data("del_name");
            var return_amount = $(this).data("del_return_amount");
             
			$.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>customer/delete_customer',
				
				 data:{link_id:link_id},
				
				 success:function(del){
					 
					 if(del === "success"){
                         
                        $('#terminate_p').text("The account of Mr "+customer_name+" has got terminated successfully. Please return the balance amount of Rs "+return_amount+" to him.");
						$('#action_div').hide();
                         $('.my_rech_report').hide();
                         $('.my_tran_report').hide();
                         $('#terminate_msg').show();
						//window.location.href = window.location.href;
						
					}else{
						
						
						alert("something Wrong");
					}
					 
				 }
				 
				 
				 
			});
			
		}); 
		
        $(document).on('click','#recharge_bt',function(){
           
            $('#my_loader').show();
			var link_id = $(this).data("recharge_id");
            var card_status = $(this).data("status");
            
            var minimum_limit = $(this).data("minimum_recharge");
			var recharge_value = $('input[id=recharge_input]').val();
            
            if(card_status === "blocked"){
                $('#my_loader').hide();
                $('#recharge_msg').text('Recharge is not allowed on blocked customer.');
                
            }else{
            
            if(recharge_value < minimum_limit){
                $('#my_loader').hide();
                $('#recharge_msg').text('Minimum '+ minimum_limit +' Rs recharge allowed');
            }else{
            
            
            $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>customer/recharge_account',
				 data:{link_id:link_id,recharge_value:recharge_value},
				 success:function(data){
                     $('#my_loader').hide();
                    // alert(data);
                     
				   if(data == "success"){
                        $('p[class=success_model_p]').text("Recharge of "+recharge_value+ "Rs. is successfully done.");
						$('#success_alert').modal("toggle");
					}else{
						$('#failed_alert').modal("toggle");
					}
				 },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                     $('#my_loader').hide();
                     if (XMLHttpRequest.readyState == 4) {
                         $('#failed_alert').modal("toggle");
                         // HTTP error (can be checked by XMLHttpRequest.status and XMLHttpRequest.statusText)
                     }
                     else if (XMLHttpRequest.readyState == 0) {
                         $('#failed_alert').modal("toggle");
                         // Network error (i.e. connection refused, access denied due to CORS, etc.)
                     }
                     else {
                         $('#failed_alert').modal("toggle");
                         // something weird is happening
                     }
                   }
			});
            
          }
            }
		});
         
        $(document).on('click','input[id=update_status]',function(){ 
             $('#block_alert').modal("toggle");
        });   
        
        $(document).on('click','button[id=block_cancel]',function(){ 
             var url = window.location.href;
            var check_url = url.substring(url.lastIndexOf("/")+1);
            if(check_url === "transaction" || check_url === "recharge" || check_url === "001" || check_url === "002"){
                var trim_url = url.substring(0,url.lastIndexOf("/"));
                window.location.href =  trim_url;
                
            }else{
                
                window.location.href = window.location.href;
            }
		    
        });  
         
        $(document).on('click','button[id=error_ok]',function(){ 
             window.location.href =  window.location.href;
        });  
         
        $(document).on('click','button[id=block_model_bt]',function(){
            $('#block_alert').modal("toggle");
            var link_id = $('input[id=update_status]').data("status_id");
            
			if($('input[id=update_status]').is(':checked')){
                $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>customer/block_accout',
				 data:{link_id:link_id},
				 success:function(data){
                    
				   if(data == "success"){
                        $('p[class=success_model_p]').text("Atm card is successfully blocked ");
						$('#success_alert').modal("toggle");
					}else{
                        
						$('#failed_alert').modal("toggle");
					}
				 }
			    });
                
            }else{
                $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>customer/unblock_accout',
				 data:{link_id:link_id},
				 success:function(data){
				   if(data == "success"){
                        $('p[class=success_model_p]').text("Atm card is successfully unblocked ");
						$('#success_alert').modal("toggle");
					}else{
						$('#failed_alert').modal("toggle");
					}
				 }
			    });
            }
			
		}); 
         
      
           
         
		$(document).on('click','#success_ok',function(){
			var url = window.location.href;
            var check_url = url.substring(url.lastIndexOf("/")+1);
            var base_url = '<?php echo base_url();  ?>';
            
            if(check_url === "transaction" || check_url === "recharge" || check_url === "001" || check_url === "002"){
                var trim_url = url.substring(0,url.lastIndexOf("/"));
                window.location.href =  trim_url;
                
            }else{
                var new_url = url.substring(0, url.indexOf('?'));
                window.location.href = new_url;
            }
			
		});
		$(document).on('click','#fail_ok',function(){
			
			 window.location.href = window.location.href;
			
		});
         
      
         $(document).on('click','button[id=tran_bt]',function(){
             var link_id = $(this).data("tran_linkid");
				$.ajax({
     				 type: 'POST',
     				 url: '<?php echo base_url(); ?>customer/customer_tran_report/'+link_id,
     				 
     				 success:function(noti){
     					$('#tran_tbody').html(noti);
                        $('#tran_table').show();
                        $('#rech_table').hide(); 
                        $("html, body").animate({ scrollTop: $(document).height()-$(window).height() }); 
     				 }
     			 });
         });
         
         $(document).on('click','button[id=rech_bt]',function(){
             var link_id = $(this).data("rech_linkid");
             
             
				$.ajax({
     				 type: 'POST',
     				 url: '<?php echo base_url(); ?>customer/customer_rech_report/'+link_id,
     				 
     				 success:function(noti){
     					$('#rech_tbody').html(noti);
                        $('#rech_table').show();
                        $('#tran_table').hide(); 
                         $("html, body").animate({ scrollTop: $(document).height()-$(window).height() });
     				 }
     			 });
         });
         
        $(document).on('click','button[title=myrecharge_delete]',function(){
              var current_balance = $('input[id=current_balance_amount]').val();
              var recharge_amount = $(this).data("recharge_amount");
              var recharge_id = $(this).data("recharge_id"); 
              var customer_id = $(this).data("re_customer_id");
              if(current_balance <= recharge_amount){
                  
                  $('#delete_recharge_failed').modal("toggle");
              }else{
                  var href =  '<?php echo base_url(); ?>customer/delete_recharge/'+recharge_id+'/'+customer_id;
                  $('p[class=fail_model_p]').text('You want to delete this recharge.');
                  $('#del_alert_action').modal("toggle");
                  $('button[id=del_recharge_bt]').data("del_href",href);
              }
              
        }); 
         $(document).on('click','button[id=del_recharge_bt]',function(){ 
               var href = $(this).data("del_href"); 
               window.location.href = href;
        });  
         
        function scroll(){
              var url = window.location.href;
		      var trim_url = url.substring(url.lastIndexOf("/")+1 );
              if(trim_url === 'transaction' || trim_url === 'recharge'){
                    $('html,body').animate({ scrollTop: 300 }, 'slow');
              }
             
         }
         
         scroll();
         
         
          function show_alert() {
             var url = window.location.href;
		    var check = url.substring(url.lastIndexOf("/")+1); 
              
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
            $('.s_add').hide();
           $('.s_update').hide(); 
        }
        setTimeout(myhide_msg, 2000);
         
         
         $(document).on('change keyup','input[name=start_date]',function(){
             
             
             
            var order_start_date =  $('input[name=start_date]').val();
            var plan_duraction =  $('select[name=plan] option:selected').data('plan_duraction');

             // set plan end date
            function calculate_end_date(){
                   var duraction = parseInt(plan_duraction);
			
                   var get_input_date =  order_start_date;
                   var start_date = get_input_date.split("-").reverse().join("-");
                   var date = new Date(start_date);
                   var newdate = new Date(date);
            
                   newdate.setDate(newdate.getDate() + duraction);
             
                   var dd = newdate.getDate();
                   var mm = newdate.getMonth() + 1;
                   var y = newdate.getFullYear();
			
			       var someFormattedDate = dd + '-' + mm + '-' + y;
                   return someFormattedDate;
               }       
               var order_end_date = calculate_end_date(); 
             
               if(order_end_date){
                  
                  $('input[name=end_date]').val(order_end_date);
                }
         });
         
         $(document).on('change','select[name=plan]',function(){
              var plan_shift =  $('select[name=plan] option:selected').data('plan_shift');
              var plan_cost =   $('select[name=plan] option:selected').data('plan_cost');
             
              $('input[name=plan_shift]').val(plan_shift);
              $('input[name=plan_cost]').val(plan_cost);
             
              // set plan end date
             var order_start_date =  $('input[name=start_date]').val();
             var plan_duraction =  $('select[name=plan] option:selected').data('plan_duraction');
             
               function calculate_end_date(){
                   var duraction = parseInt(plan_duraction);
			
                   var get_input_date =  order_start_date;
                   var start_date = get_input_date.split("-").reverse().join("-");
                   var date = new Date(start_date);
                   var newdate = new Date(date);
            
                   newdate.setDate(newdate.getDate() + duraction);
             
                   var dd = newdate.getDate();
                   var mm = newdate.getMonth() + 1;
                   var y = newdate.getFullYear();
			
			       var someFormattedDate = dd + '-' + mm + '-' + y;
                   return someFormattedDate;
               }       
               var order_end_date = calculate_end_date(); 
             
               if(order_end_date){
                  
                  $('input[name=end_date]').val(order_end_date);
                }
         });  
         
         
         function check_msg(){
		    var trim_url = window.location.href;
			var url = new URL(trim_url);

            var msg = url.searchParams.get("msg");

            if(msg && msg === 'already_suscribed'){
               $('p[class=fail_model_p]').text("Customer have already subscribed plan.")
               $('#failed_alert').modal("toggle");
            }else if(msg && msg === 'subscription_success'){
                     
                 $('p[class=success_model_p]').text("Plan subscription successfully completed.");
				 $('#success_alert').modal("toggle");    
            }

		}

		check_msg();
         
        $(document).on('click','#show_cus_pass',function(){
            var check = $('#cus_pass').attr('type');

             if(check === 'password'){

                 $('#cus_pass').attr('type','text');

             }else if(check === 'text'){

                 $('#cus_pass').attr('type','password');
             }

         });
       
	 });  
   
   </script>
</body>
</html>