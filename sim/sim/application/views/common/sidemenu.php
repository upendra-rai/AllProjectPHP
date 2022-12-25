<aside id="sidebar-left" class="sidebar-left" style="padding-bottom:0px;">

  
  <div class="nano">
    <div class="nano-content">
      <nav id="menu" class="nav-main" role="navigation">
        <ul class="nav nav-main">

        
          <li class="<?php if(isset($active_menu)){ if($active_menu == 'dashboard'){ echo 'nav-active'; } } ?>" name="dashboard">
            <a href="<?php echo base_url(); ?>/dashboard">
              <i class="fa fa-home" aria-hidden="true"></i>
              <span>Dashboard</span>
            </a>
          </li>
       
          <li name="user" class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'management'){ echo 'nav-expanded nav-active'; } } ?>">
            <a>
              <i class="fa fa-tasks" aria-hidden="true"></i>
              <span>Management</span>
            </a>
            <ul class="nav nav-children active">
                        
              <li name="restorent" class="<?php if(isset($active_submenu)){ if($active_submenu == 'manage_category'){ echo 'nav-active'; } } ?>" >
                <a href="<?php echo base_url(); ?>management/manage_category">
                   Category
                </a>
              </li>
                
                <li name="restorent" class="<?php if(isset($active_submenu)){ if($active_submenu == 'manage_subcategory'){ echo 'nav-active'; } } ?>" >
                <a href="<?php echo base_url(); ?>management/manage_subcategory">
                   Sub Category
                </a>
              </li>
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'number_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>management/number_details">
                   Product
                </a>
              </li>

                <?php // if($this->session->userdata('outlet_type') == 'restorent' || $this->session->userdata('outlet_type') == 'branch' ){ ?>   
                  <li name="add_branch" class="<?php if(isset($active_submenu)){ if($active_submenu == 'brand'){ echo 'nav-active'; } } ?>">
                    <a href="<?php echo base_url(); ?>management/brand">
                        Number Status
                    </a>
                  </li>
                
                <li name="add_branch" class="<?php if(isset($active_submenu)){ if($active_submenu == 'banner'){ echo 'nav-active'; } } ?>">
                    <a href="<?php echo base_url(); ?>management/banner">
                        Banner
                    </a>
                  </li>
                
                <li name="add_branch" class="<?php if(isset($active_submenu)){ if($active_submenu == 'client_logo'){ echo 'nav-active'; } } ?>">
                    <a href="<?php echo base_url(); ?>management/client_logo">
                        Clients
                    </a>
                  </li>
                
                <?php // } ?>
                 <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'payment_method'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>management/payment_method">
                   Payment Method
                </a>
              </li>

                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'product_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>management/product_details">
                  product Type
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'vendor_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>management/vendor_details">
                   Vendor Details
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'vendor_pirority'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>management/vendor_pirority">
                   Vendor Priority
                </a>
              </li>
            </ul>
          </li>  
          
            

          <!--  
         
          <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'vendor'){ echo 'nav-expanded nav-active'; } } ?>" name="paremeter">
            <a>
              <i class="fa fa-tasks" aria-hidden="true"></i>
              <span>Manage Vendor</span>
            </a>
            <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'vendor_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>vendor/vendor_details">
                   Vendor Details
                </a>
              </li>
                
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'vendor_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>vendor/vendor_details">
                   Payment Details
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'vendor_number_delete'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>vendor/vendor_number_delete">
                 Number Delete
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'vendor_pirority'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>vendor/vendor_pirority">
                   Vendor Priority
                </a>
              </li>
            </ul>
          </li>
-->
       <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'master'){ echo 'nav-expanded nav-active'; } } ?>" name="master">
            <a>
              <i class="fa fa-medkit" aria-hidden="true"></i>
              <span>Master</span>
            </a>
            <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'customer_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/master/customer_details">
                   Customer 
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'employee_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>master/employee_details">
                   User
                </a>
              </li>
                 <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'profile_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>master/profile_details">
                   Role
                </a>
              </li>
                
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'commission'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>master/commission">
                   Commission
                </a>
              </li>
                 <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'service_provider'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>master/service_provider">
                   Service Provider
                </a>
              </li>
                 <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'service_area_code'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>master/service_area_code">
                   Service Area Code
                </a>
              </li>
             
            </ul>
          </li>
            <li name="notification" class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'status'){ echo 'nav-expanded nav-active'; } } ?>">
            <a>
              <!--<span class="pull-right label label-primary">182</span>-->
              <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
              <span>Manage Number</span>
            </a>
              <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'pending_upload'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>status/pending_upload">
                   Pending Upload
                </a>
              </li>
                  <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'profit_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>profit/profit_details">
                   Update Number
                </a>
              </li>
                   <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'profit_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>status/upc_details">
                   UPC
                </a>
              </li>
                  
                
              </ul>
              
          </li>
<!--
          <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'employee'){ echo 'nav-expanded nav-active'; } } ?>" name="paremeter">
            <a>
              <i class="fa fa-medkit" aria-hidden="true"></i>
              <span>Manage Employee</span>
            </a>
            <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'employee_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>employee/employee_details">
                   Employee List
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'employee_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>employee/employee_details">
                   History/Report
                </a>
              </li>
             
            </ul>
          </li>
            

            <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'product_number'){ echo 'nav-expanded nav-active'; } } ?>" name="product_number">
            <a>
              <i class='fas fa-users' aria-hidden="true"></i>
              <span>Manage Number</span>
            </a>
            <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'number_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>product_number/number_details">
                   Number List
                </a>
              </li>
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'add_unit'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>department/employee_details">
                   Pending Upload
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'add_unit'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>department/employee_details">
                   Update Number Status
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'add_unit'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>department/employee_details">
                   Search Number
                </a>
              </li>
            
            </ul>
          </li>
        -->
<!--
          <li name="notification" class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'profit'){ echo 'nav-expanded nav-active'; } } ?>">
            <a>
             
              <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
              <span>Manage Profit</span>
            </a>
              <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'profit_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>profit/profit_details">
                   profit
                </a>
              </li>
                
              </ul>
              
          </li>
         

 
            
          <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'customer'){ echo 'nav-expanded nav-active'; } } ?>" name="customer">
            <a>
              <i class="fa fa-barcode" aria-hidden="true"></i>
              <span>Manage Customer</span>
            </a>
              
              
              
            <ul class="nav nav-children">
             
             <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'customer_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/customer/customer_details">
                   Customer Details
                </a>
              </li>
              

            </ul>
          </li>
            
            -->
            <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'inventory'){ echo 'nav-expanded nav-active'; } } ?>"  name="inventory">
            <a>
              <i class="fa fa-barcode" aria-hidden="true"></i>
              <span>Manage Order</span>
            </a>
              
              
              
            <ul class="nav nav-children">
           
             
                <li name="placed_orders" class="<?php if(isset($active_submenu)){ if($active_submenu == 'placed_orders'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>orders/placed_orders">
                   Add New <span id="placed_order_span" style="float:right;"></span>
                </a>
              </li>
                <li name="placed_orders" class="<?php if(isset($active_submenu)){ if($active_submenu == 'placed_orders'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>orders/orders">
                   Order List <span id="placed_order_span" style="float:right;"></span>
                </a>
            </ul>
          </li>
            <!--
               <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'payment'){ echo 'nav-expanded nav-active'; } } ?>"  name="inventory">
            <a>
              <i class="fa fa-barcode" aria-hidden="true"></i>
              <span>Manage Payment</span>
            </a>
              
              
              
            <ul class="nav nav-children">
           
             <li name="pending_orders" class="<?php if(isset($active_submenu)){ if($active_submenu == 'payment_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>payment/payment_details">
                  
                    Payment Status  <span id="new_order_span" style="float:right;"></span>
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'commission'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>master/commission">
                   Manage Commission
                </a>
              </li>
              
                 

            </ul>
          </li>
            
              <?php if($this->session->userdata('outlet_type') == 'restorent' || $this->session->userdata('outlet_type') == 'branch'){ ?>    
          <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'management'){ echo 'nav-expanded nav-active'; } } ?>" name="management">
            <a>
              <i class="fa fa-th" aria-hidden="true"></i>
              <span>Manage Payment</span>
            </a>
            <ul class="nav nav-children">
              <li name="banner" class="<?php if(isset($active_submenu)){ if($active_submenu == 'banner'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/app_banner/add">
                   Banner
                </a>
              </li>
              <li name="offer_banner" class="<?php if(isset($active_submenu)){ if($active_submenu == 'offer_banner'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/offer_banner/add">
                   Offer Banner
                </a>
              </li>
                
                
                
                <li name="app_background" class="<?php if(isset($active_submenu)){ if($active_submenu == 'app_background'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>/app_background/add">
                  App Background
                </a>
              </li>
              

            </ul>
          </li>
          <?php } ?> 
            
            <li name="notification" class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'profit'){ echo 'nav-expanded nav-active'; } } ?>">
            <a>
              
              <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
              <span>Manage Expense</span>
            </a>
              <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'profit_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>profit/profit_details">
                   Expense Details
                </a>
              </li>
                
              </ul>
              
          </li>
               -->  
          <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'enquires'){ echo 'nav-expanded nav-active'; } } ?>" name="enquires" >
            <a>
              <i class="fa fa-columns" aria-hidden="true"></i>
              <span>Manage Enquires</span>
            </a>
            <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'enquires_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>enquires/enquires_details">
                   Online 
                </a>
              </li>
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'contactus'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>enquires/contactus">
                   ContactUS
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'chat'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>enquires/chat">
                   Chat 
                </a>
              </li>
              
              
            </ul>
          </li>
            
             <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'discount'){ echo 'nav-expanded nav-active'; } } ?>" name="discount" >
            <a>
              <i class="fa fa-columns" aria-hidden="true"></i>
              <span>Discount Master</span>
            </a>
            <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'enquires_details'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>discount/promo_code_details">
                   Promo Code
                </a>
              </li>
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'contactus'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>enquires/contactus">
                   Cashback
                </a>
              </li>
              
              
            </ul>
          </li>
                     <li class="nav-parent <?php if(isset($active_menu)){ if($active_menu == 'report'){ echo 'nav-expanded nav-active'; } } ?>" name="report">
            <a>
              <i class="fa fa-medkit" aria-hidden="true"></i>
              <span>Report</span>
            </a>
            <ul class="nav nav-children">
              <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'sales_report'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>report/sales_report">
                   Sales Report
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'customer_report'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>report/customer_report">
                   Customer Report
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'profit_report'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>employee/employee_details">
                   Profit Report
                </a>
              </li>
                <li class="<?php if(isset($active_submenu)){ if($active_submenu == 'vendor_report'){ echo 'nav-active'; } } ?>">
                <a href="<?php echo base_url(); ?>report/vendor_report">
                   Vendor Report
                </a>
              </li>
             
            </ul>
          </li>

        </ul>
      </nav>

      <hr class="separator" />


      <hr class="separator" />


    </div>

  </div>
  <!--<div class="sidebar-widget widget-stats" style="position: absolute; bottom:0px; padding-bottom:20px; ">
    <div class="widget-header">
      <h6 style="color:#0088cc;">All right reserved</h6>

    </div>

  </div>-->
</aside>
