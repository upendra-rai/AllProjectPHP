<div class="container-fluid" id="top_titile">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
                    <div class="logo-pro" style="float:left;">
                        <img src="<?php echo base_url('catalogs'); ?>/img/logo.png" alt="" width="50" />
                    </div>
                    <div class="logo-pro" style="float:right;">
                        <button  type="button" id="my_nav" class="btn" style="background:transparent; border:none; "><i class="ion-android-apps" style="font-size:26px;"></i></button>
                    </div>
                </div>
            </div>
</div>
<div class="header-advance-area" style="min-height:55px;">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                       
                           <div class="search_engine ">
                                    <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12" >
                                        <div class="breadcome-heading" style=" padding: 0px; padding-top:3px;background:transparent; margin-bottom:15px;" >
                                            <h2 class="head_title">Fresh'o Meter</h2>
                                        </div>
                                    </div>
                                <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu" style="padding:10px 0px; ">
                                                
                                                <li class="nav-item" style=""><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle" style=""><i class="ion-ios-cart-outline" aria-hidden="true"></i><span class="new_order_span" style="position:absolute; margin-top:-8px; font-size:14px; font-weight:900; line-height:15px; padding:3px; border-radius:2px; background-color:#f13f0a; color:#ffffff;"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn" style="overflow:auto; padding-top:0px;">
                                                        <div class="notification-single-top" style="background-color: #46c7fe; color:#ffffff;">
                                                            <a href="<?php echo base_url(); ?>orders/orders"> <h1 style="padding:10px; color:#ffffff;">See All Orders</h1></a>
                                                        </div>
                                                        <ul class="notification-menu" id="order_notification" >
                                                            
                                                           
                                                        </ul>
                                                        <!--<div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>-->
                                                    </div>
                                                </li>
                                                
                                               
                                            </ul>
                                        </div>
                                   </div>
                                    <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu" style="padding:10px 0px; ">
                                                
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="ion-ios-bell-outline" aria-hidden="true"></i><span class="admin_noti_span" style="position:absolute; margin-top:-8px; font-size:14px; font-weight:900; line-height:15px; padding:3px; border-radius:2px; background-color:#f13f0a; color:#ffffff;"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn" style="overflow:auto; padding-top:0px;">
                                                        <div class="notification-single-top" style="background-color: #46c7fe; color:#ffffff;">
                                                            <a href="<?php echo base_url(); ?>notification/see_all_notification"> <h1 style="padding:10px; color:#ffffff;">See Full Notifications</h1></a>
                                                        </div>
                                                        <ul class="notification-menu" id="admin_notification" >
                                                            
                                                           
                                                        </ul>
                                                        <!--<div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>-->
                                                    </div>
                                                </li>
                                                
                                               
                                            </ul>
                                        </div>
                               </div>
                                 <div class="col-lg-1 col-md-1 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu" style="padding:10px 0px; float:left;">
                                                
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle"><i class="ion-ios-email-outline" aria-hidden="true" style="font-size:25px;"></i><span class="feedback_noti_span" style="position:absolute; margin-top:-8px; font-size:14px; font-weight:900; line-height:15px; padding:3px; border-radius:2px; background-color:#ecad1d; color:#ffffff;"></span></a>
                                                    <div role="menu" class="notification-author dropdown-menu animated zoomIn" style="overflow:auto; padding-top:0px;">
                                                        <div class="notification-single-top" style="background-color: #46c7fe; color:#ffffff;">
                                                            <a href="<?php echo base_url(); ?>report/feedback"> <h1 style="padding:10px; color:#ffffff;">See All Feedback</h1></a>
                                                        </div>
                                                        <ul class="notification-menu" id="feedback_notification" >
                                                            
                                                           
                                                        </ul>
                                                        <!--<div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>-->
                                                    </div>
                                                </li>
                                                
                                               
                                            </ul>
                                        </div>
                               </div>
                                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12" >
                                        <div class="breadcome-heading" style=" padding: 0px; padding-top:3px;background:transparent; margin-bottom:15px;" >
                                         <?php if($active_menu == 'home'){ ?> <?php if($genrate_order_date[0]->order_date != date('Y-m-d')){ ?> <button type="button" id="genrate_orders" class="btn btn-primary" style="float:right;">Genrate Orders </button>
                                            <?php }else{ ?>
                                            <button type="button"  class="btn btn-primary" style="float:right; background-color:#888888;">Genrate Orders </button>
                                            <?php } ?>
                                            <?php } ?>
                                        </div>
                                    </div>
                               
									<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12">
                                        <div class="breadcome-heading mycard" style=" padding: 0px;  padding-top:3px; background:transparent;">
                                            <div class="form-group-inner" style=" height:28px; ">
											<div class="row">
											    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" style=" padding-right:0px;">
                                                    <div class="chosen-select-single" style="width:100%;">
                                                        <select id="select_search" class="chosen-select" tabindex="-1" style="width:100%; height:35px; border: 1px solid #dddddd; padding-left:10px;">
												        		<option value="name">Name</option>
												        		<!--<option value="linked_no">Card No.</option>-->
												        		<option value="colony_id">Colony</option>
												        		<option value="mobile_no">Mobile No.</option>
												        
													    </select>
                                                    </div>
											    </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8"> 
                                                    <div class="input-group" style=" width:100%;">
                                                        <input type="text" name="search_section" data-card_no="" id="search_name_input" class="form-control" placeholder="Search By Customer Name" style="background-color:#ffffff;">
														<button type="button"   id="search_bt" class="search_bar_bt"><i class="fa fa-search"></i></button>
                                                    </div>
                                                      
                                                </div>
                                                
                                            </div>
                                               <div class="row" style="position:relative; ">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="position:absolute; "> 
                                                    <div id="match_result1" class="match_result" style="margin-top:-8px;">
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
            <!-- Mobile Menu start -->
           <!-- <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                    
                        <li class="active">
                            <a href="<?php echo base_url() ?>dashboard">
								   <span class="educate-icon educate-home icon-wrap"></span>
								   <span class="mini-click-non">Dashboard</span>
								</a>
                           
                        </li>
                        
                        <li>
                            <a class="has-arrow" href="all-professors.html" aria-expanded="false"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Customers</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="<?php echo base_url(); ?>customer/add_customer"><span class="mini-sub-pro">Add Customers</span></a></li>
                                <li><a title="Add Professor" href="<?php echo base_url(); ?>customer/list_customer"><span class="mini-sub-pro">Update Customers</span></a></li>
                           
                                
                            </ul>
                        </li>
                       
						
						<li>
                            <a href="<?php echo base_url(); ?>team" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Manage Team</span></a>
                            
                        </li>
                        <li>
                            <a class="has-arrow"  href="all-courses.html" aria-expanded="false"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Report</span></a>
                           <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="All Professors" href="<?php echo base_url(); ?>report/customer_report"><span class="mini-sub-pro">Customer Report</span></a></li>
                                <li><a title="Add Professor" href="<?php echo base_url(); ?>report/transaction_report"><span class="mini-sub-pro">Transaction Report</span></a></li>
                                <li><a title="Add Professor" href="<?php echo base_url(); ?>report/recharge_report"><span class="mini-sub-pro">Recharge Report</span></a></li>
                                <li><a title="Add Professor" href="<?php echo base_url(); ?>report/agent_report"><span class="mini-sub-pro">Agent Report</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>dashboard/profile" aria-expanded="false"><span class="educate-icon educate-department icon-wrap"></span> <span class="mini-click-non">Change Password</span></a>
                            
                        </li>
                       
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <!-- Mobile Menu end -->
    
          <nav class="mobo_menu">
                    <ul class="mobo_menu_box" class="nav navbar-nav menu">
					    <li><a href="<?php echo base_url() ?>dashboard">Home</a></li>
                        <li><a href="<?php echo base_url() ?>map_location">Track Location</a></li>
                        <li> <a href="<?php echo base_url() ?>orders/orders">Order List</a></li>
						 <li><a href="<?php echo base_url() ?>add_customer/add_customer">Add Customer</a></li>
						  <li><a href="<?php echo base_url() ?>plan/plan_list"></a></li>
						   <li> <a href="<?php echo base_url() ?>notification/notification">Notification</a></li>
                          <li><a href="<?php echo base_url(); ?>team">Team Management</a></li>	
                          <li><a href="<?php echo base_url(); ?>colony">Colony Management</a></li>						  
						   <li><a href="<?php echo base_url(); ?>qrcode/qrcode_list">QR Code</a></li>
						   <li><a href="<?php echo base_url(); ?>report/customer_report">Customer Report</a></li>
                        <li><a href="<?php echo base_url(); ?>report/transaction_report">Transaction Report</a></li>
                        <li><a href="<?php echo base_url(); ?>report/recharge_report">Recharge Report</a></li>
                        <li><a href="<?php echo base_url(); ?>report/order_report">Order Report</a></li>							
						<li><a href="<?php echo base_url(); ?>dashboard/backup">Backup</a></li>
                        <li><a href="<?php echo base_url(); ?>dashboard/logout">Logout</a></li>	
						
                      
                    </ul>
            </nav>
</div>	