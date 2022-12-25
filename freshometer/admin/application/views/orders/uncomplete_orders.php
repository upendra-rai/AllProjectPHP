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
    </style>
</head>

<body>
    <?php $this->load->view('common/sidemenu'); ?>
    <div class="all-content-wrapper">
        
        <?php $this->load->view('common/titlebar'); ?>
		<div class="container-fluid" style="margin-top:20px;">
            <div class="product-status-wrap mycard" style="padding-top:0px; border-top:2px solid #0099cc;">
                 
               
                <div class="row">
                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                       <input id="select_colony" type="hidden" value="<?php if(isset($return_colony)){ echo $return_colony; } ?>">
                        <input id="select_status" type="hidden"  value="<?php if(isset($return_status)){ echo $return_status; } ?>">
                       <input id="select_shift" type="hidden"   value="<?php if(isset($return_shift)){ echo $return_shift; } ?>">
                      
                        <div id="myheadtitle" style="margin:0px; height:55px; border-bottom:none; padding-top:15px; font-size: 15.5px; ">
                            Incomplete Order List <span><i class="ion-android-arrow-dropright" style="color: #0099cc;"></i></span> <?php if(isset($transaction_detail[0]->transaction_date)){ echo date('d-M-Y',strtotime($transaction_detail[0]->transaction_date));}; ?>
                        </div>  
                        
						<div class="asset-inner">
							    
                                <table id="table" data-toggle="table" data-pagination="true"  data-show-columns="true" data-show-pagination-switch="true"  data-key-events="true" data-show-toggle="true"  data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                    
                                    <thead style="background-color:#f2f3f7;">
                                     
									<tr>
                                        <th>Sr. No.</th>
                                        <th>Customer Id</th>
                                        <th>Customer name</th>
                                        <th>Colony</th>
								        <th>Mobile No.</th>
                                        <th>Tifin No</th>
                                        <th>Order Shift</th>
                                        <th>Balance</th>
                                        <th>Order Status</th>
                                        <th>Order Assign Time</th>
                                        <th>Action</th>
                                        
                                    </tr>
                                    
									 </thead>
									 <tbody>
                                     <?php 
                                         $total = 0;
                                         $i = 1;
                                         foreach($order_list as $row){ ?>
                                       
                                         <tr >
                                             <td><?php echo $i++; ?> <?php if(isset($return_shift)){ if($return_shift == '1'){ ?> <i class="fa fa-sun-o" style="color:#ffca28;"></i> <?php }else if($return_shift == '2'){ ?> <i class="fa fa-moon-o" style="color:#53a7d5;"></i> <?php }  } ?> </td>
                                             <td><?php echo $row->customer_id; ?></td>
                                             <td><?php echo $row->customer_name; ?></td>
                                             
                                             <td><?php echo $row->colony_name; ?></td>
                                             <td><?php echo $row->mobile_no; ?></td>
                                             <td><?php echo $row->tifin_card_no; ?></td>
                                             <td><?php echo $row->tifin_status; ?></td>
                                             <td><?php echo $row->balance_amount; ?></td>
                                             <td>Assigned</td>
                                             <td><?php echo date('d-M-Y h:i a',strtotime($row->tifin_assign_time)); ?></td>
                                             <td>
                                                 <button type="button" title="reset_order" data-reset_order_id="<?php echo $row->customer_id; ?>" data-tifin_id="<?php echo $row->tifin_card_no; ?>" data-order_shift="<?php echo $row->tifin_status; ?>" class="pd-setting-ed mydelete">Reset</button> </td>
                                           
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
          
        
      function select_take(){ 
             var select_colony = $('input[id=select_colony]').val();
             var select_shift = $('input[id=select_shift]').val();
             var select_status = $('input[id=select_status]').val();                 
             
            $('select[name=shift]').val(select_shift);
            $('select[name=colony_search]').val(select_colony);
          
            if(select_status === ''){
                 $('select[name=order_status]').val('unassigned');
            }else{
            $('select[name=order_status]').val(select_status);
            }
        } 
        select_take();
        
        $(document).on('click', '#tbl_refresh',function(){
            
           window.location.href =   window.location.href;
            
        });    
        
        $(document).on('click', 'button[title = reset_order]',function(){
            $(this).prop('disabled', true);
            
            var customer_id = $(this).data("reset_order_id");
            var tifin_id = $(this).data("tifin_id");
            var order_shift = $(this).data("order_shift");
            
            //alert(customer_id);
            $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>orders/reset_incomplete_orders',
				
				 data:{customer_id:customer_id,tifin_id:tifin_id,order_shift},
				
				 success:function(del){
					if(del === 'success'){
                        
                        window.location.href = window.location.href ;
                    }else{
                        $(this).prop('enable', true);
                        alert("process is failed");
                        window.location.href = window.location.href ;
                    }
                   
				 }
			});
            
        });  
        
    });
    </script>
</body>
</html>