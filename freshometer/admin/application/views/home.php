<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('common/header_link'); ?>
   
     <!-- Preloader CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/preloader/preloader-style.css">
    
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/datepicker-active.js"></script>
   <style type="text/css">
       .analysis-progrebar .analysis-progrebar-content h5{
           color:red;
           font-size: 18px;
       }
       .analysis-progrebar .analysis-progrebar-content h5 span{
          
           font-size: 20px;
       }
       
       .analysis-progrebar{
           padding: 20px 15px;
       }
       .box_head_bard{
           
           width:100%;
           height:30px;
           padding: 6px 15px;
           
           color:#5f5f5f;
           background-color: #ffffff;
          border-radius: 5px;
           box-shadow: 0px 2px 6px 0px rgba(0,0,0,0.4);
           
          
       }
       .box_head_bard h5{
           font-size: 14px;
           display: inline-block;
           font-weight: 500;
       }
       .box_head_bard span{
           display: inline-block;
           float: right;
           font-size: 20px;
           margin-top: -4px;
       }
       .box_head_bard span i{
           color:#5f5f5f;
           
       }
       .stackcard_ul{
           padding: 0;
           margin: 0;
           
       }
       .stackcard_ul li{
           padding: 0px 5px;
           width: 19.7%;
           display: inline-block;
       }
       
       .vacation_a{
		margin: 0;
        color:red;	
	  }
	  
	  .analysis-progrebar .analysis-progrebar-content .vacation_a h5{
		  color:#ffffff;	
		  transform: scale(1);
	  }
	  
	  .analysis-progrebar .analysis-progrebar-content .vacation_a h5:hover{
		 
		  font-weight:900;
		  transform: scale(1.1);
	  }
       
       @media (max-width:600px){
           
           .stackcard_ul li{
           padding: 0px 5px;
           width: 100%;
           display: inline-block;
          }
           
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
        
        <div class="container-fluid" style="margin-top:10px;">
            <div class="row">
				<div class="col-md-12">
						    <div id="myheadtitle" style="border-bottom:none; margin-bottom:0px; ">
                              Order Status
                            </div>
							<div class="row">
                                <div class="col-md-12">
                                <ul class="stackcard_ul">
                                   <!-- <li>
                                         <div class="box_head_bard">
                                                <h5>Total Orders</h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#3f51b5; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                 <h5 style="color:#ffffff;  width:100%;">Morning <span style="float:right;"><?php echo ($morning_order[0]->morning_order+$morning_assigned_order[0]->morning_assigned_order+$morning_delivered_order[0]->morning_delivered_order+$today_morning_vac[0]->total_vac); ?></span></h5>
                                                 <h5 style="color:#ffffff;  width:100%;">Evening <span style="float:right;"><?php echo($evening_order[0]->evening_order+$evening_assigned_order[0]->evening_assigned_order+$evening_delivered_order[0]->evening_delivered_order+$today_evening_vac[0]->total_vac); ?></span></h5>
                                            </div>
                                        </div>
                                    </li> -->
                                    
                                    <li>
                                        <div class="box_head_bard">
                                                <h5>Brekfast</h5>
                                                <span ><i class="ion-calendar"></i></span>
                                          
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#673ab7; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="width:100%; color:#ffffff;">Total <span style="float:right;"><?php echo $pending_brekfast[0]->brekfast+$completed_brekfast[0]->brekfast; ?></span> </h5>
                                               <h5 style="width:100%; color:#ffffff;">Pending <span style="float:right;"><?php echo $pending_brekfast[0]->brekfast; ?></span> </h5>
                                                <h5 style="color:#ffffff;  width:100%;">Completed &nbsp <span style="float:right;"><?php echo $completed_brekfast[0]->brekfast; ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>Launch</h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#9c27b0; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                              <div class="analysis-progrebar-content" >
                                            <h5 style="width:100%; color:#ffffff;">Total <span style="float:right;"><?php echo $pending_launch[0]->launch + $completed_launch[0]->launch; ?></span> </h5>      
                                            <h5 style="color:#ffffff;  width:100%;">Pending <span style="float:right;"><?php echo $pending_launch[0]->launch; ?></span></h5>
                                            <h5 style="color:#ffffff;  width:100%;">Completed <span style="float:right;"><?php echo $completed_launch[0]->launch; ?></span></h5>
                                             </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>Dinner</h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#e91e63; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="width:100%; color:#ffffff;">Total <span style="float:right;"><?php echo $pending_dinner[0]->dinner + $completed_dinner[0]->dinner; ?></span> </h5> 
                                                
                                                <h5 style="color:#ffffff;  width:100%;">Pending <span style="float:right;"><?php echo $pending_dinner[0]->dinner; ?></span></h5>
                                                <h5 style="color:#ffffff;  width:100%;">Completed <span style="float:right;"><?php echo $completed_dinner[0]->dinner; ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                  
                                   <!-- <li>
                                        <div class="box_head_bard">
                                                <h5>Order Vacation</h5>
                                                <span ><i class="ion-calendar"></i></span>
                                           <?php echo $morning_order[0]->morning_order; ?>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#3f51b5; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="width:100%; color:#ffffff;">Morning <span style="float:right;"><?php echo $today_morning_vac[0]->total_vac; ?></span> </h5>
                                                <h5 style="color:#ffffff;  width:100%;">Evening &nbsp <span style="float:right;"><?php echo $today_evening_vac[0]->total_vac; ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                   --> 
                                </ul>
                              </div>
                              </div>    
                </div>
            </div>
        </div>
          
        
        
        
        <div class="container-fluid" style="margin-top:10px;">
            <div class="row">
				<div class="col-md-12">
						    <div id="myheadtitle" style="border-bottom:none; margin-bottom:0px; ">
                               Recharges
                            </div>
							<div class="row">
                                <div class="col-md-12">
                                <ul class="stackcard_ul">
                                    <li>
                                        <div class="box_head_bard">
                                                <h5 >Today</h5>
                                                <span ><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#0b73c8; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Recharge <span style="float:right;">&#8377 <?php echo number_format($today_recharge[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>Yesterday</h5>
                                                <span><i class="ion-chatbubbles"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#2196f3; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Recharge <span style="float:right;">&#8377 <?php echo number_format($yesterday_recharge[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>This Month</h5>
                                                <span><i class="ion-clipboard"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#03a9f4; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Recharge <span style="float:right;">&#8377 <?php echo number_format($month_recharge[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>Last Month</h5>
                                                <span><i class="ion-clock"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#00bcd4; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Recharge <span style="float:right;">&#8377 <?php echo number_format($lastmonth_recharge[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>This Year</h5>
                                                <span><i class="ion-contrast"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#04e0ff; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Recharge <span style="float:right;">&#8377 <?php echo number_format($thisyear_recharge[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                              </div>
                              </div>    
                </div>
            </div>
        </div>
        
        
        <div class="container-fluid" style="margin-top:10px;">
            <div class="row">
				<div class="col-md-12">
						    <div id="myheadtitle" style="border-bottom:none; margin-bottom:0px; ">
                                Sales
                            </div>
							<div class="row">
                                <div class="col-md-12">
                                <ul class="stackcard_ul">
                                    <li>
                                        <div class="box_head_bard">
                                                <h5 >Today</h5>
                                                <span ><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#0b73c8; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Sale <span style="float:right;">&#8377 <?php echo number_format($today_sell[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>Yesterday</h5>
                                                <span><i class="ion-chatbubbles"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#2196f3; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Sale <span style="float:right;">&#8377 <?php echo number_format($yesterday_sell[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>This Month</h5>
                                                <span><i class="ion-clipboard"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#03a9f4; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Sale <span style="float:right;">&#8377 <?php echo number_format($month_sell[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>Last Month</h5>
                                                <span><i class="ion-clock"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#00bcd4; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Sale <span style="float:right;">&#8377 <?php echo number_format($lastmonth_sell[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>This Year</h5>
                                                <span><i class="ion-contrast"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#04e0ff; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Sale <span style="float:right;">&#8377 <?php echo number_format($thisyear_sell[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                              </div>
                              </div>    
                </div>
            </div>
        </div>
        
        <div class="container-fluid" style="margin-top:10px;">
            <div class="row">
				<div class="col-md-12">
						    <div id="myheadtitle" style="border-bottom:none; margin-bottom:0px; ">
                              Vacation
                            </div>
							<div class="row">
                                <div class="col-md-12">
                                <ul class="stackcard_ul">
                                    <li>
                                        <div class="box_head_bard">
                                                <h5><?php echo date('d-M-Y'); ?></h5>
                                                <span ><i class="ion-calendar"></i></span>
                                       
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#3f51b5; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d'); ?>/1" class="vacation_a"><h5 style="width:100%;">Breakfast <span style="float:right;"><?php echo $today_morning_vac[0]->total_vac; ?></span> </h5></a>
                                                <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d'); ?>/2" class="vacation_a"> <h5 style="color:#ffffff;  width:100%;">Launch &nbsp <span style="float:right;"><?php echo $today_evening_vac[0]->total_vac; ?></span></h5></a>
												
												<a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d'); ?>/3" class="vacation_a"> <h5 style="color:#ffffff;  width:100%;">Dinner &nbsp <span style="float:right;"><?php echo $today_night_vac[0]->total_vac; ?></span></h5></a>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5><?php echo date('d-M-Y', strtotime('+1 day')); ?></h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#673ab7; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                              <div class="analysis-progrebar-content" >
                                            <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+1 day')); ?>/1" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Breakfast <span style="float:right;"><?php echo $tommrow_morning_vac[0]->total_vac; ?></span></h5></a>
                                            <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+1 day')); ?>/2" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Launch <span style="float:right;"><?php echo $tommrow_evening_vac[0]->total_vac; ?></span></h5></a>
											
											<a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+1 day')); ?>/3" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Dinner <span style="float:right;"><?php echo $tommrow_night_vac[0]->total_vac; ?></span></h5></a>
                                             </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5><?php echo date('d-M-Y', strtotime('+2 day')); ?></h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#9c27b0; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+2 day')); ?>/1" class="vacation_a"> <h5 style="color:#ffffff;  width:100%;">Breakfast <span style="float:right;"><?php echo $after_tommrow_morning_vac[0]->total_vac; ?></span></h5></a>
                                                <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+2 day')); ?>/2" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Launch <span style="float:right;"><?php echo $after_tommrow_evening_vac[0]->total_vac; ?></span></h5></a>
												
												<a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+2 day')); ?>/3" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Dinner <span style="float:right;"><?php echo $after_tommrow_night_vac[0]->total_vac; ?></span></h5></a>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                         <div class="box_head_bard">
                                                <h5><?php echo date('d-M-Y', strtotime('+3 day')); ?></h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#e91e63; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                  <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+3 day')); ?>/1" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Breakfast <span style="float:right;"><?php echo $after_tommrow_tommrow_morning_vac[0]->total_vac; ?></span></h5></a>
                                                 <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+3 day')); ?>/2" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Launch <span style="float:right;"><?php echo $after_tommrow_tommrow_evening_vac[0]->total_vac; ?></span></h5></a>
												 
												 <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+3 day')); ?>/3" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Dinner <span style="float:right;"><?php echo $after_tommrow_tommrow_night_vac[0]->total_vac; ?></span></h5></a>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5><?php echo date('d-M-Y', strtotime('+4 day')); ?></h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#e91e63; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+4 day')); ?>/1" class="vacation_a"> <h5 style="color:#ffffff;  width:100%;">Breakfast <span style="float:right;"><?php echo $after_fifth_day_morning_vac[0]->total_vac; ?></span></h5></a>
                                                <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+4 day')); ?>/2" class="vacation_a"> <h5 style="color:#ffffff;  width:100%;">Launch <span style="float:right;"><?php echo $after_fifth_day_evening_vac[0]->total_vac; ?></span></h5></a>
												
												<a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+4 day')); ?>/3" class="vacation_a"> <h5 style="color:#ffffff;  width:100%;">Dinner <span style="float:right;"><?php echo $after_fifth_day_night_vac[0]->total_vac; ?></span></h5></a>
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                              </div>
                              </div>    
                </div>
            </div>
        </div>
        
        <div class="container-fluid" style="margin-top:10px;">
            <div class="row">
				<div class="col-md-12">
						    <div id="myheadtitle" style="border-bottom:none; margin-bottom:0px; ">
                              User Ragistration
                            </div>
							<div class="row">
                                <div class="col-md-12">
                                <ul class="stackcard_ul">
                                    <li>
                                        <div class="box_head_bard" >
                                                <h5>Today</h5>
                                                <span ><i class="ion-android-contacts"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#3f51b5; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">User <span style="float:right;"><?php echo number_format($today_registration[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard" >
                                                <h5>Yesterday</h5>
                                                <span><i class="ion-android-contacts"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#673ab7; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">User <span style="float:right;"><?php echo number_format($yesterday_registration[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard" >
                                                <h5>This Month</h5>
                                                <span><i class="ion-android-contacts"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#9c27b0; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">User <span style="float:right;"><?php echo number_format($month_registration[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>Last Month</h5>
                                                <span><i class="ion-android-contacts"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#e91e63; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">User <span style="float:right;"><?php echo number_format($lastmonth_registration[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>This Year</h5>
                                                <span><i class="ion-android-contacts"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#ec427d; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">User <span style="float:right;"><?php echo number_format($thisyear_registration[0]->total); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                    
                                </ul>
                              </div>
                              </div>    
                </div>
            </div>
        </div>
        
        <!--
         <div class="container-fluid" style="margin-top:10px;">
            <div class="row">
				<div class="col-md-12">
						    <div id="myheadtitle" style="border-bottom:none; margin-bottom:0px; ">
                              Vacation
                            </div>
							<div class="row">
                                <div class="col-md-2" style="padding:0;">
                               
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="box_head_bard">
                                                <h5><?php echo date('d-M-Y'); ?></h5>
                                                <span ><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#3f51b5; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d'); ?>/morning" class="vacation_a"><h5 style="width:100%;">Morning <span style="float:right;"><?php echo $today_morning_vac[0]->total_vac; ?></span> </h5></a>
                                                <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d'); ?>/evening" class="vacation_a"> <h5 style="color:#ffffff;  width:100%;">Evening &nbsp <span style="float:right;"><?php echo $today_evening_vac[0]->total_vac; ?></span></h5></a>
                                            </div>
                                        </div>
                                    </div>
								</div>	
								<div class="col-md-10" style="padding:0;">	
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="box_head_bard">
                                                <h5><?php echo date('d-M-Y', strtotime('+1 day')); ?></h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#673ab7; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                              <div class="analysis-progrebar-content" >
                                            <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+1 day')); ?>/morning" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Morning <span style="float:right;"><?php echo $tommrow_morning_vac[0]->total_vac; ?></span></h5></a>
                                            <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+1 day')); ?>/evening" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Evening <span style="float:right;"><?php echo $tommrow_evening_vac[0]->total_vac; ?></span></h5></a>
                                             </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="box_head_bard">
                                                <h5><?php echo date('d-M-Y', strtotime('+2 day')); ?></h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#9c27b0; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+2 day')); ?>/morning" class="vacation_a"> <h5 style="color:#ffffff;  width:100%;">Morning <span style="float:right;"><?php echo $after_tommrow_morning_vac[0]->total_vac; ?></span></h5></a>
                                                <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+2 day')); ?>/evening" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Evening <span style="float:right;"><?php echo $after_tommrow_evening_vac[0]->total_vac; ?></span></h5></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="box_head_bard">
                                                <h5><?php echo date('d-M-Y', strtotime('+3 day')); ?></h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#e91e63; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                  <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+3 day')); ?>/morning" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Morning <span style="float:right;"><?php echo $after_tommrow_tommrow_morning_vac[0]->total_vac; ?></span></h5></a>
                                                 <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+3 day')); ?>/evening" class="vacation_a"><h5 style="color:#ffffff;  width:100%;">Evening <span style="float:right;"><?php echo $after_tommrow_tommrow_evening_vac[0]->total_vac; ?></span></h5></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                                        <div class="box_head_bard">
                                                <h5><?php echo date('d-M-Y', strtotime('+4 day')); ?></h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#e91e63; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+4 day')); ?>/morning" class="vacation_a"> <h5 style="color:#ffffff;  width:100%;">Morning <span style="float:right;"><?php echo $after_tommrow_tommrow_morning_vac[0]->total_vac; ?></span></h5></a>
                                                <a href="<?php echo base_url(); ?>dashboard/view_vacation/<?php echo date('Y-m-d', strtotime('+4 day')); ?>/evening" class="vacation_a"> <h5 style="color:#ffffff;  width:100%;">Evening <span style="float:right;"><?php echo $after_tommrow_tommrow_evening_vac[0]->total_vac; ?></span></h5></a>
                                            </div>
                                        </div>
                                    </div>
                                   
                              </div>
                              </div>    
                </div>
            </div>
        </div>
        
		-->
      
       
        
        <div class="container-fluid" style="margin-top:10px;">
            <div class="row">
				<div class="col-md-12">
						    <div id="myheadtitle" style="border-bottom:none; margin-bottom:0px; ">
                              Customer Status
                            </div>
							<div class="row">
                                <div class="col-md-12">
                                <ul class="stackcard_ul">
                                    <li>
                                        <div class="box_head_bard">
                                                <h5>Customer</h5>
                                                <span ><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#3f51b5; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Total <span style="float:right;"> <?php echo number_format($total_customer); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>Customer</h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#673ab7; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Active <span style="float:right;"> <?php echo number_format($active_customer); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>Customer</h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#9c27b0; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Blocked <span style="float:right;"> <?php echo number_format($blocked_customer); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     <li>
                                        <div class="box_head_bard">
                                                <h5>Customer</h5>
                                                <span><i class="ion-calendar"></i></span>
                                        </div>  
                                        <div class="analysis-progrebar reso-mg-b-30" style="background-color:#e91e63; box-shadow: 0px 3px 8px -1px rgba(0,0,0,0.5); ">
                                            <div class="analysis-progrebar-content" >
                                                <h5 style="color:#ffffff; width:100%;">Terminated <span style="float:right;"> <?php echo number_format($total_terminate); ?></span></h5>
                                            </div>
                                        </div>
                                    </li>
                                     
                                    
                                </ul>
                              </div>
                              </div>    
                </div>
            </div>
        </div>
        
        
		
		<div class="pie-bar-line-area" style="margin-top:25px;">
            <div class="container-fluid">
               
                <div class="row" >
                    
                    <ul style="display:none;">
                       
                        <li class="bar_tran_li"><input id="<?php if(isset($bar[0]->transaction_date)){ echo 'transaction_input'.date('m',strtotime($bar[0]->transaction_date)); } ?>" value="<?php if(isset($bar[0]->bar_tran)){ echo $bar[0]->bar_tran; } ?>"></li>
                        <li class="bar_tran_li"><input id="<?php if(isset($bar[1]->transaction_date)){ echo 'transaction_input'.date('m',strtotime($bar[1]->transaction_date)); } ?>" value="<?php if(isset($bar[1]->bar_tran)){ echo $bar[1]->bar_tran; } ?>"></li>
                        <li class="bar_tran_li"><input id="<?php if(isset($bar[2]->transaction_date)){ echo 'transaction_input'.date('m',strtotime($bar[2]->transaction_date)); } ?>" value="<?php if(isset($bar[2]->bar_tran)){ echo $bar[2]->bar_tran; } ?>"></li>
                        <li class="bar_tran_li"><input id="<?php if(isset($bar[3]->transaction_date)){ echo 'transaction_input'.date('m',strtotime($bar[3]->transaction_date)); } ?>" value="<?php if(isset($bar[3]->bar_tran)){ echo $bar[3]->bar_tran; } ?>"></li>
                        <li class="bar_tran_li"><input id="<?php if(isset($bar[4]->transaction_date)){ echo 'transaction_input'.date('m',strtotime($bar[4]->transaction_date)); } ?>" value="<?php if(isset($bar[4]->bar_tran)){ echo $bar[4]->bar_tran; } ?>"></li>
                        <li class="bar_tran_li"><input id="<?php if(isset($bar[5]->transaction_date)){ echo 'transaction_input'.date('m',strtotime($bar[5]->transaction_date)); } ?>" value="<?php if(isset($bar[5]->bar_tran)){ echo $bar[5]->bar_tran; } ?>"></li>
                        <li class="bar_tran_li"><input id="<?php if(isset($bar[6]->transaction_date)){ echo 'transaction_input'.date('m',strtotime($bar[6]->transaction_date)); } ?>" value="<?php if(isset($bar[6]->bar_tran)){ echo $bar[6]->bar_tran; } ?>"></li>
                        <li class="bar_tran_li"><input id="<?php if(isset($bar[7]->transaction_date)){ echo 'transaction_input'.date('m',strtotime($bar[7]->transaction_date)); } ?>" value="<?php if(isset($bar[7]->bar_tran)){ echo $bar[7]->bar_tran; } ?>"></li>
                        <li class="bar_tran_li"><input id="<?php if(isset($bar[8]->transaction_date)){ echo 'transaction_input'.date('m',strtotime($bar[8]->transaction_date)); } ?>" value="<?php if(isset($bar[8]->bar_tran)){ echo $bar[8]->bar_tran; } ?>"></li>
                        <li class="bar_tran_li"><input id="<?php if(isset($bar[9]->transaction_date)){ echo 'transaction_input'.date('m',strtotime($bar[9]->transaction_date)); } ?>" value="<?php if(isset($bar[9]->bar_tran)){ echo $bar[9]->bar_tran; } ?>"></li>
                        <li class="bar_tran_li"><input id="<?php if(isset($bar[10]->transaction_date)){ echo 'transaction_input'.date('m',strtotime($bar[10]->transaction_date)); } ?>" value="<?php if(isset($bar[10]->bar_tran)){ echo $bar[10]->bar_tran; } ?>"></li>
                        <li class="bar_tran_li"><input id="<?php if(isset($bar[11]->transaction_date)){ echo 'transaction_input'.date('m',strtotime($bar[11]->transaction_date)); } ?>" value="<?php if(isset($bar[11]->bar_tran)){ echo $bar[11]->bar_tran; } ?>"></li>
                        
                    </ul>
                    
                       
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="charts-single-pro mg-t-30 table-mg-btm-0-pro dk-mg-b-0-desk">
                            <div class="main-sparkline9-hd">
                                <h1>Month Wise Sales Chart</h1>
                                </div>
                            <div id="bar4-chart">
                                <canvas id="barchart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		
	</div>

   <?php $this->load->view('common/footer_script'); ?>
    
    
     <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/datepicker-active.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
    
    <script type="text/javascript">
        
        
      $(document).ready(function(){

       $(document).on('click','#genrate_orders',function(){
           
           $.ajax({
				 type: 'POST',
				 url: '<?php echo base_url(); ?>dashboard/genrate_orders',
				
				 success:function(del){
					
					if(del === "success"){
                         window.location.href = '<?php echo base_url(); ?>orders/orders';
                     }else if(del === 'order_already_genrated'){
                         window.location.href = '<?php echo base_url(); ?>orders/orders';
                         
                     }
					 
				 }
				 
				 
				 
			}); 
           
       });   
          
         function bar(){
 "use strict";
	 /*----------------------------------------*/
	/*  1.  Bar Chart
	/*----------------------------------------*/

	
	
	/*----------------------------------------*/
	/*  4.  Bar Chart Multi axis
	/*----------------------------------------*/
	var ctx = document.getElementById("barchart4");
    
    var tr_jan = $('input[id=transaction_input01]').val();
    if(tr_jan === undefined){
        tr_jan = 0;
    }
    var tr_feb = $('input[id=transaction_input02]').val();
    if(tr_feb === undefined){
        tr_feb = 0;
    }
    var tr_mar = $('input[id=transaction_input03]').val();
    if(tr_mar === undefined){
        tr_mar = 0;
    }
    var tr_apr = $('input[id=transaction_input04]').val();
    if(tr_apr === undefined){
        tr_apr = 0;
    }
    var tr_may = $('input[id=transaction_input05]').val();
    if(tr_may === undefined){
        tr_may = 0;
    }
    var tr_jun = $('input[id=transaction_input06]').val();
    if(tr_jun === undefined){
        tr_jun = 0;
    }
    var tr_jul = $('input[id=transaction_input07]').val();
    if(tr_jul === undefined){
        tr_jul = 0;
    }
    var tr_aug = $('input[id=transaction_input08]').val();
    if(tr_aug === undefined){
        tr_aug = 0;
    }
    var tr_sep = $('input[id=transaction_input09]').val();
    if(tr_sep === undefined){
        tr_sep = 0;
    }
    var tr_oct = $('input[id=transaction_input10]').val();
    if(tr_oct === undefined){
        tr_oct = 0;
    }
    var tr_nov = $('input[id=transaction_input11]').val();
    if(tr_nov === undefined){
        tr_nov = 0;
    }
    var tr_dec = $('input[id=transaction_input12]').val();
    if(tr_dec === undefined){
        tr_dec = 0;
    }
	var barchart4 = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug","Sep","Oct","Nov","Dec"],
			datasets: [{
                label: 'Sales',
				data: [tr_jan, tr_feb, tr_mar, tr_apr, tr_may, tr_jun, tr_jul,tr_aug,tr_sep,tr_oct,tr_nov,tr_dec],
				borderWidth: 1,
				yAxisID: "y-axis-1",
                backgroundColor: [
                    
					'#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                   
                    
				],
				borderColor: [
					'#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
                    '#9c27b0',
				],
            }]
		},
		options: {
            
			responsive: true,
            
			title:{
				display:false,
				text:"Bar Chart Multi Axis"
			},
			tooltips: {
				mode: 'index',
				intersect: true
			},
			scales: {
				yAxes: [{
					type: "linear",
					display: true,
					position: "left",
					id: "y-axis-1",
				}, {
					type: "linear",
					display: false,
					position: "right",
					id: "y-axis-2",
					gridLines: {
						drawOnChartArea: false
					}
				}],
			}
		}
	});
	
	
	var ctx = document.getElementById("barchart44");
    
    var re_jan = $('input[id=recharge_input01]').val();
    if(re_jan === undefined){
        re_jan = 0;
    }
    var re_feb = $('input[id=recharge_input02]').val();
    if(re_feb === undefined){
        re_feb = 0;
    }
    var re_mar = $('input[id=recharge_input03]').val();
    if(re_mar === undefined){
        re_mar = 0;
    }
    var re_apr = $('input[id=recharge_input04]').val();
    if(re_apr === undefined){
        re_apr = 0;
    }
    var re_may = $('input[id=recharge_input05]').val();
    if(re_may === undefined){
        re_may = 0;
    }
    var re_jun = $('input[id=recharge_input06]').val();
    if(re_jun === undefined){
        re_jun = 0;
    }
    var re_jul = $('input[id=recharge_input07]').val();
    if(re_jul === undefined){
        re_jul = 0;
    }
    var re_aug = $('input[id=recharge_input08]').val();
    if(re_aug === undefined){
        re_aug = 0;
    }
    var re_sep = $('input[id=recharge_input09]').val();
    if(re_sep === undefined){
        re_sep = 0;
    }
    var re_oct = $('input[id=recharge_input10]').val();
    if(re_oct === undefined){
        re_oct = 0;
    }
    var re_nov = $('input[id=recharge_input11]').val();
    if(re_nov === undefined){
        re_nov = 0;
    }
    var re_dec = $('input[id=recharge_input12]').val();
    if(re_dec === undefined){
        re_dec = 0;
    }
	var barchart44 = new Chart(ctx, {
		type: 'bar',
		data: {
			labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul","Aug","Sep","Oct","Nov","Dec"],
			datasets: [{
                label: 'Recharges',
				data: [re_jan, re_feb, re_mar, re_apr, re_may, re_jun, re_jul,re_aug,re_sep,re_oct,re_nov,re_dec],
				borderWidth: 1,
				yAxisID: "y-axis-1",
                backgroundColor: [
					'#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    
                    
				],
				borderColor: [
					'#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
                    '#03a9f4',
				],
            }]
		},
		options: {
            
			responsive: true,
			title:{
				display:false,
				text:"Bar Chart Multi Axis"
			},
			tooltips: {
				mode: 'index',
				intersect: true
			},
			scales: {
				yAxes: [{
					type: "linear",
					display: true,
					position: "left",
					id: "y-axis-1",
				}, {
					type: "linear",
					display: false,
					position: "right",
					id: "y-axis-2",
					gridLines: {
						drawOnChartArea: false
					}
				}],
			}
		}
	});
	
		
		
};
bar();
      });
  
    </script>
    
    </body>
</html>