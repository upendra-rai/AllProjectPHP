<div class="left-sidebar-pro" >
        <nav id="sidebar" class="" style="padding-top:0px;">
          
            <div class="left-custom-menu-adp-wrap comment-scrollbar" style="height: 100vh;">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                    <ul class="metismenu" id="menu1">
					    <li class="profile_li" >
						    
                            <div class="profile_head" style="width:180px;">
							<img src="<?php echo base_url('catalogs'); ?>/img/logo.png" alt="" style="width:63px; height:auto;"/>
							
							</div>
                            <p>Fresh'o Meter <button type="button" id="profile_bt" style="position:absolute; background:transparent; border:none;"><i class="ion-ios-arrow-down"></i></button><br><span>Admin</span></p>
							<div class="profile_menu">
                                
                                <div class="div_li" id="profile_div_bt">Profile</div>
                                <div class="div_li" id="logout_div_bt">Logout</div>
                                  
                            </div>    
                        </li>
                        <li class="<?php if($active_menu == 'home'){ echo 'active'; } ?>">
                            <a href="<?php echo base_url() ?>dashboard">
								   <span class="educate-icon educate-home icon-wrap"></span>
								   <span class="mini-click-non">Dashboard</span>
								</a>
                           
                        </li>
						<li class="<?php if($active_menu == 'map_location'){ echo 'active'; } ?>">
                            <a href="<?php echo base_url() ?>map_location">
								   <span class="educate-icon educate-home icon-wrap"></span>
								   <span class="mini-click-non">Track Location</span>
								</a>
                           
                        </li>
                        <li class="<?php if($active_menu == 'orders'){ echo 'active'; } ?>">
                            <a href="<?php echo base_url() ?>orders/orders">
								   <span class="educate-icon educate-home icon-wrap"></span>
								   <span class="mini-click-non">Order List</span>
								</a>
                           
                        </li>
                        
                        
                        <li class="<?php if($active_menu == 'customer_details'){ echo 'active'; } ?>">
                            <a class="has-arrow"  href="all-courses.html" aria-expanded="<?php if($active_menu == 'report'){ echo 'true'; }else{ echo 'false';} ?>"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Customer Details</span></a>
                           <ul class="submenu-angle <?php if($active_menu == 'customer_details'){ echo 'show'; }else{ echo '';} ?>" aria-expanded="false" style="padding:0px; margin:0px;">
                               
                              <!-- <li class="<?php if(isset($active_submenu) && $active_submenu == 'add_plan'){ echo 'active_submenu'; } ?>"><a title="All Professors" href="<?php echo base_url(); ?>add_plan/add_plan"><span class="mini-sub-pro">Add Plan</span></a></li>-->
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'details'){ echo 'active_submenu'; } ?>"><a title="All Professors" href="<?php echo base_url(); ?>customer_details/details"><span class="mini-sub-pro">Customer Details</span></a></li>
                               <!--
                               <li class="<?php if(isset($active_submenu) && $active_submenu == 'voting'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>voting"><span class="mini-sub-pro">Manage Special Menu</span></a></li> -->
                                <!--<li class="<?php if(isset($active_submenu) && $active_submenu == 'product'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>product"><span class="mini-sub-pro">Manage Products</span></a></li>-->
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'colony'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>colony"><span class="mini-sub-pro">Manage Colonies</span></a></li>
                                <!--
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'product'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>product"><span class="mini-sub-pro">Manage Product</span></a></li>
                               -->
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'qrcode'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>qrcode/qrcode_list"><span class="mini-sub-pro">Genrate Qrcode</span></a></li>
							<!--	<li class="<?php if(isset($active_submenu) && $active_submenu == 'product'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>report/change_atm_card_status"><span class="mini-sub-pro">Change Tifin Id status</span></a></li> -->
                            </ul>
                        </li>
                        
                        <li class="<?php if($active_menu == 'plan'){ echo 'active'; } ?>">
                            <a class="has-arrow"  href="all-courses.html" aria-expanded="<?php if($active_menu == 'plan'){ echo 'true'; }else{ echo 'false';} ?>"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Manage Plan</span></a>
                           <ul class="submenu-angle <?php if($active_menu == 'plan'){ echo 'show'; }else{ echo '';} ?>" aria-expanded="false" style="padding:0px; margin:0px;">
                               
                              <!-- <li class="<?php if(isset($active_submenu) && $active_submenu == 'add_plan'){ echo 'active_submenu'; } ?>"><a title="All Professors" href="<?php echo base_url(); ?>add_plan/add_plan"><span class="mini-sub-pro">Add Plan</span></a></li>-->
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'plan_list'){ echo 'active_submenu'; } ?>"><a title="All Professors" href="<?php echo base_url() ?>plan/plan_list"><span class="mini-sub-pro">Plan</span></a></li>
                               <!--
                               <li class="<?php if(isset($active_submenu) && $active_submenu == 'voting'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>voting"><span class="mini-sub-pro">Manage Special Menu</span></a></li> -->
                                <!--<li class="<?php if(isset($active_submenu) && $active_submenu == 'product'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>product"><span class="mini-sub-pro">Manage Products</span></a></li>-->
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'product_list'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>plan/product_list"><span class="mini-sub-pro">Product Master</span></a></li>
                                <!--
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'product'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>product"><span class="mini-sub-pro">Manage Product</span></a></li>
                               -->
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'unit_details'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>plan/unit_details"><span class="mini-sub-pro">Unit Master</span></a></li>
							<!--	<li class="<?php if(isset($active_submenu) && $active_submenu == 'product'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>report/change_atm_card_status"><span class="mini-sub-pro">Change Tifin Id status</span></a></li> -->
                            </ul>
                        </li>
                        
                        
                        
                        
                       
                       
                        <!--
<li class="<?php if($active_menu == 'customer'){ echo 'active'; } ?>">
                            <a href="<?php echo base_url() ?>add_customer/add_customer">
								   <span class="educate-icon educate-professor icon-wrap"></span>
								   <span class="mini-click-non">Add Customer</span>
								</a>
                           
                        </li>

\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
                        <li class="<?php if($active_menu == 'orders'){ echo 'active'; } ?>">
                            <a class="has-arrow"  href="all-courses.html" aria-expanded="<?php if($active_menu == 'report'){ echo 'true'; }else{ echo 'false';} ?>"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Orders</span></a>
                           <ul class="submenu-angle <?php if($active_menu == 'orders'){ echo 'show'; }else{ echo '';} ?>" aria-expanded="false" style="padding:0px; margin:0px;">
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'orders_list'){ echo 'active_submenu'; } ?>"><a title="All Professors" href="<?php echo base_url(); ?>orders/orders"><span class="mini-sub-pro">Orders List</span></a></li>
                              
                               <li class="<?php if(isset($active_submenu) && $active_submenu == 'incomplete_orders'){ echo 'active_submenu'; } ?>"><a title="All Professors" href="<?php echo base_url(); ?>orders/incomplete_orders"><span class="mini-sub-pro">Incomplete Orders</span></a></li>
                            </ul>
                        </li>
                        -->
                        
                        <li class="<?php if($active_menu == 'notification'){ echo 'active'; } ?>">
                            <a href="<?php echo base_url() ?>notification/notification">
								   <span class="educate-icon educate-professor icon-wrap"></span>
								   <span class="mini-click-non">Notification</span>
								</a>
                           
                        </li>
                        
                        <li class="<?php if($active_menu == 'management'){ echo 'active'; } ?>">
                            <a class="has-arrow"  href="all-courses.html" aria-expanded="<?php if($active_menu == 'report'){ echo 'true'; }else{ echo 'false';} ?>"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Mgt options</span></a>
                           <ul class="submenu-angle <?php if($active_menu == 'management'){ echo 'show'; }else{ echo '';} ?>" aria-expanded="false" style="padding:0px; margin:0px;">
                               
                              <!-- <li class="<?php if(isset($active_submenu) && $active_submenu == 'add_plan'){ echo 'active_submenu'; } ?>"><a title="All Professors" href="<?php echo base_url(); ?>add_plan/add_plan"><span class="mini-sub-pro">Add Plan</span></a></li>-->
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'team'){ echo 'active_submenu'; } ?>"><a title="All Professors" href="<?php echo base_url(); ?>team"><span class="mini-sub-pro">Manage Team</span></a></li>
                               <!--
                               <li class="<?php if(isset($active_submenu) && $active_submenu == 'voting'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>voting"><span class="mini-sub-pro">Manage Special Menu</span></a></li> -->
                                <!--<li class="<?php if(isset($active_submenu) && $active_submenu == 'product'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>product"><span class="mini-sub-pro">Manage Products</span></a></li>-->
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'colony'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>colony"><span class="mini-sub-pro">Manage Colonies</span></a></li>
                                <!--
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'product'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>product"><span class="mini-sub-pro">Manage Product</span></a></li>
                               -->
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'qrcode'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>qrcode/qrcode_list"><span class="mini-sub-pro">Genrate Qrcode</span></a></li>
							<!--	<li class="<?php if(isset($active_submenu) && $active_submenu == 'product'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>report/change_atm_card_status"><span class="mini-sub-pro">Change Tifin Id status</span></a></li> -->
                            </ul>
                        </li>
                        <!--<li class="<?php if($active_menu == 'customer'){ echo 'active'; } ?>">
                            <a class="has-arrow" href="all-professors.html" aria-expanded="<?php if($active_menu == 'customer'){ echo 'true'; }else{ echo 'false';} ?>"><span class="educate-icon educate-professor icon-wrap"></span> <span class="mini-click-non">Customers</span></a>
                            <ul class="submenu-angle <?php if($active_menu == 'customer'){ echo 'show'; }else{ echo '';} ?>" aria-expanded="false">
                                <li><a title="All Professors" href="<?php echo base_url(); ?>customer/add_customer"><span class="mini-sub-pro">Add Customers</span></a></li>
                                <li><a title="Add Professor" href="<?php echo base_url(); ?>customer/list_customer"><span class="mini-sub-pro">Update Customers</span></a></li>
                           
                                
                            </ul>
                        </li>-->
                        <!--<li>
                            <a href="<?php echo base_url(); ?>limit/recharge_limit" aria-expanded="false"><span class="educate-icon educate-student icon-wrap"></span> <span class="mini-click-non">Recharge Limit</span></a>
                       
                        </li>-->
                        <!--<li>
                            <a href="<?php echo base_url(); ?>recharge/recharge_search" aria-expanded="false"><span class="educate-icon educate-course icon-wrap"></span> <span class="mini-click-non">Recharge</span></a>
                            
                        </li>-->

                        <li class="<?php if($active_menu == 'report'){ echo 'active'; } ?>">
                            <a class="has-arrow"  href="all-courses.html" aria-expanded="<?php if($active_menu == 'report'){ echo 'true'; }else{ echo 'false';} ?>"><span class="educate-icon educate-library icon-wrap"></span> <span class="mini-click-non">Reports</span></a>
                           <ul class="submenu-angle <?php if($active_menu == 'report'){ echo 'show'; }else{ echo '';} ?>" aria-expanded="false" style="padding:0px; margin:0px;">
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'customer'){ echo 'active_submenu'; } ?>"><a title="All Professors" href="<?php echo base_url(); ?>report/customer_report"><span class="mini-sub-pro">Customer Report</span></a></li>
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'tran_report'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>report/transaction_report"><span class="mini-sub-pro">Sales Report</span></a></li>
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'rech_report'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>report/recharge_report"><span class="mini-sub-pro">Recharge Report</span></a></li>
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'order_report'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>report/order_report"><span class="mini-sub-pro">Order Report</span></a></li>
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'feedback'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>report/feedback"><span class="mini-sub-pro">FeedBack</span></a></li>
                               <!--
                                <li class="<?php if(isset($active_submenu) && $active_submenu == 'atm_card_report'){ echo 'active_submenu'; } ?>"><a title="Add Professor" href="<?php echo base_url(); ?>report/atm_card_report"><span class="mini-sub-pro">Tifin Id Report</span></a></li>
                                -->
                            </ul>
                        </li>
                        
                        <li class="<?php if($active_menu == 'backup'){ echo 'active'; } ?>">
                            <a href="<?php echo base_url(); ?>dashboard/backup" aria-expanded="false"><span class="educate-icon educate-department icon-wrap"></span> <span class="mini-click-non">BackUp</span></a>
                            
                        </li>
                      
                        <li style="height:100px; box-shadow:none;">
                             
                        </li>
                       
                       
                    </ul>
                </nav>
            </div>
        </nav>
    </div>