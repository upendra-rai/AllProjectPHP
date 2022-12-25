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
        
        .unassigned{
            
            padding: 3px 0px;
            background-color: #e91e63;
            text-align: center;
            border-radius: 3px;
            color: #ffffff;
            text-transform: capitalize;
            padding-bottom: 5px;
        }
        
        .assigned{
            
            padding: 3px 0px;
            background-color: #1dba4b;
            text-align: center;
            border-radius: 3px;
            color: #ffffff;
            text-transform: capitalize;
             padding-bottom: 5px;
        }
        
        .delivered{
            
            padding: 3px 0px;
            background-color:#9c27b0;
            text-align: center;
            border-radius: 3px;
            color: #ffffff;
            text-transform: capitalize;
             padding-bottom: 5px;
        }
        
        .mystatus{

           width: 76px;
           text-align: center;
           padding: 2px;
           margin-bottom: 0px;
           font-size: 12px;
           font-weight: 800;
           line-height: 17px;
            border-radius: 30px;
        }
    </style>
</head>

<body>
    <?php $this->load->view('common/sidemenu'); ?>
    <div class="all-content-wrapper">
        
        <?php $this->load->view('common/titlebar'); ?>
		<div class="container-fluid" style="margin-top:20px;">
            <div class="product-status-wrap mycard" style="padding-top:0px; border-top:2px solid #0099cc;">
                 <div class="row" style="background-color:#f7f7f7; ">
				        <div class="search_engine" style="height:auto; min-height:60px; padding-top:15px;">
                            <div class="breadcome-heading" style="">
                                 <div class="input-group"  style=" width:100%;">
                                 <form action=""  method="post" id="order_search_form">
                                          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
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
                                          <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                                            <div class="form-group" id="data_5" style=" height:28px;">
                                                 <select name="shift" class="form-control" style="width:100%;">
                                                     <option  value="">All</option>
                                                     <option <?php if(isset($return_shift)){ if($return_shift == 1){ echo 'selected'; } } ?> value="1">Breakfast</option>
                                                     <option <?php if(isset($return_shift)){ if($return_shift == 2){ echo 'selected'; } } ?> value="2">Launch</option>
                                                     <option <?php if(isset($return_shift)){ if($return_shift == 3){ echo 'selected'; } } ?> value="3">Dinner</option>
                                                </select>
                                            </div>
                                           </div> 
                                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" >
                                            <div class="form-group" id="data_5" style=" height:28px;">
                                                 <select name="order_status" class="form-control" style="width:100%;">
                                                     <option value=""  > Order Status</option>
                                                     <option <?php if(isset($return_status)){ if($return_status == 'pending'){ echo 'selected'; } } ?> value="pending">Pending</option>
                                                     <option <?php if(isset($return_status)){ if($return_status == 'completed'){ echo 'selected'; } } ?> value="completed">Completed</option>
                                                </select>
                                            </div>
                                           </div>     
                                           <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12" >
                                            <div class="form-group" id="data_5" style=" height:28px;">
                                                      <input type="submit" name="submit" class="btn" value="Search" style="background-color: #46c7fe; color:#ffffff; width: calc(100% - 48px);"/>
                                                      <span><button type="button" id="tbl_refresh" class="btn" style="width:40px; border:1px solid #e8e8e8"><i class="ion-android-sync" style="color:#46c7fe; "></i></button></span>
                                                  </div>
                                           </div>
                                </form>
                                  </div>     
                             </div>
				          </div>		
				 </div>
               
                <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <input id="select_colony" type="hidden" value="<?php if(isset($return_colony)){ echo $return_colony; } ?>">
                        <input id="select_status" type="hidden"  value="<?php if(isset($return_status)){ echo $return_status; } ?>">
                       <input id="select_shift" type="hidden"   value="<?php if(isset($return_shift)){ echo $return_shift; } ?>">
                      
                        <div id="myheadtitle" style="margin:0px; height:55px; border-bottom:none; padding-top:15px; font-size: 15.5px; ">
                            Order List <span><i class="ion-android-arrow-dropright" style="color: #0099cc;"></i></span> <?php if(isset($transaction_detail[0]->transaction_date)){ echo date('d-M-Y',strtotime($transaction_detail[0]->transaction_date));}; ?>
                        </div>  
                        
						<div class="asset-inner">
							    
                                <table id="table" data-toggle="table" data-pagination="true"  data-show-columns="true" data-show-pagination-switch="true"  data-key-events="true" data-show-toggle="true"  data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    
                                    <thead style="background-color:#f2f3f7;">
                                     
									<tr>
                                        <th>Sr. No.</th>
                                        <th>Shift</th>
                                        
                                        <th>Customer name</th>
                                        <th>Plan</th>
                                        <th>Plan Expiry</th>
                                        <th>Colony</th>
								        <th>Mobile No.</th>
                                       
                                       
                                        <th>Balance</th>
                                        <th>Order Status</th>
                                       
                                        
                                    </tr>
                                    
									 </thead>
									 <tbody>
                                     <?php 
                                         $total = 0;
                                         $i = 1;
                                         foreach($order_list as $row){ ?>
                                       
                                         <tr >
                                             <td><?php echo $i++; ?> </td>
                                             <td><?php if(isset($row->shift_id)){ if($row->shift_id == '1'){ ?> Breakfast <?php }else if($row->shift_id == '2'){ ?> Launch <?php }else if($row->shift_id == '3'){ ?> Dinner <?php }} ?> </td>
                                            
                                             <td><?php echo $row->customer_name; ?></td>
                                             <td><?php echo $row->plan_name; ?></td>
                                             <td><?php echo date('d-M-Y',strtotime($row->end_date)); ?></td>
                                             <td><?php echo $row->colony_name; ?></td>
                                             <td><?php echo $row->mobile_no; ?></td>
                                             
                                             
                                             <td><?php echo $row->balance_amount; ?></td>
                                             <td><?php  if(isset($row->order_status)){ if($row->order_status == 'pending'){?> <p class="mystatus" style="background-color:#f90f49; color:#ffffff; ">Pending</p> <?php }else if($row->order_status == 'completed'){ ?> <p class="mystatus"  style="background-color:#2ebd4f; color:#ffffff; ">Complete</p> <?php } } ?></td>
                                             
                                           
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

   <?php $this->load->view('common/footer_script'); ?>
    
	
	<!-- touchspin JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/touchspin/touchspin-active.js"></script>	
		
    <script type="text/javascript">
    $(document).ready(function(){
          
        
    
        
        $(document).on('click', '#tbl_refresh',function(){
            
           window.location.href =   window.location.href;
            
        });    
        
        $(document).on('click', 'button[title = delete_order]',function(){
            
            var customer_id = $(this).data("del_order_id");
            var shift = $('input[id=select_shift]').val();
            //alert(customer_id);
            $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>orders/delete_assigned_order',
				
				 data:{customer_id:customer_id,shift:shift},
				
				 success:function(del){
					// alert(del);
                     
					if(del === "success"){
                     
						$('input[name=submit]').click();
						
					}else{
						
					}
					 
				 }
			});
            
        });  
        
    });
    </script>
</body>
</html>