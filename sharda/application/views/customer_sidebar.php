 <div class="user"><i class="fa fa-user-circle "></i></div>
               <p style=""><?php  echo $selected_customer[0]->customer_name; ?></p>
            <ul class="menu_bar" >
                <li class="<?php if($active_cus == 'my_profile'){ echo 'active';} ?>"><a href="<?php echo base_url(); ?>/customer/my_profile">My Profile</a></li>
               <li class="<?php if($active_cus=='order'){ echo 'active';} ?>"><a href="<?php echo base_url(); ?>/customer/order_history">Order History</a></li>
               <li class="<?php if($active_cus=='wallet'){ echo 'active';} ?>"><a href="<?php echo base_url(); ?>/customer/my_wallet">My Wallet</a></li>
               <li class="<?php if($active_cus=='points'){ echo 'active';} ?>"><a href="<?php echo base_url(); ?>/customer/my_points">My Points</a></li>
               <li class="<?php if($active_cus=='coupans'){ echo 'active';} ?>"><a href="<?php echo base_url(); ?>/customer/coupans">Coupans</a></li>
               <li class="<?php if($active_cus=='notification'){ echo 'active';} ?>"><a href="<?php echo base_url(); ?>/customer/notifications">Notification</a><span class="noti_alert"><?php  echo count($noti_unread); ?></span></li>
               <li class="<?php if($active_cus=='password'){ echo 'active';} ?>"><a href="<?php echo base_url(); ?>/customer/change_password">Change Password</a></li>
               <li><a href="<?php echo base_url(); ?>/customer/logout">Log Out</a></li>
            </ul>