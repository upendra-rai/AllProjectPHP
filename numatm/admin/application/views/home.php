<!doctype html>
<html class="fixed">
	<head>
		<?php $this->load->view('common/header_link'); ?>
        
        <!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/vendor/morris/morris.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/catalogs/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/modernizr/modernizr.js"></script>
        
        <style type="text/css">
            .chart.chart-md {
                height:200px;
            }
        </style>
	</head>
	<body>
		<section class="body">
      <?php $this->load->view("common/titlebar"); ?>

			<div class="inner-wrapper">
			  <?php $this->load->view('common/sidemenu'); ?>

				<section role="main" class="content-body" style="">
              <section class="my_cards">
                  
                 
                  
                     
						
                        <div class="col-md-12">
                        <div class="quick_report">
                        <table class="table table-border" >
                            <thead>
                               <tr>
                                    <th></th>
                                   <th>Sales</th>
                                   <th>Sattlement</th>
                                   <th>Profit</th>
                                   <th>Refund</th>
                                   <th>Order</th>
                                   <th>Customer Registration</th>
                                   
                                </tr>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td>Today</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        
                                    </tr>
                                    
                                    <tr>
                                        <td>Yesterday</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                     
                                    </tr>
                                    
                                    <tr>
                                        <td>This Month</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                       
                                    </tr>
                                    
                                    <tr>
                                        <td>Last Month</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                       
                                    </tr>
                                    
                                    <tr>
                                        <td>This Year</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                        <td>0</td>
                                       
                                    </tr>
                                </tbody>
                           </table>
                  
                    </div>
                            </div>
                            <div>
                        <section>       
                            <div class="col-md-2">
								<section class="panel">
									<header class="panel-heading">
										
										<p>Total No in Stocks</p>
									</header>
									<div class="panel-body">
						
										
						
									</div>
								</section>
							</div>
          
						
                  
								 <div class="col-md-2">
								<section class="panel">
									<header class="panel-heading">
										
										<p>Total Sold No</p>
									</header>
									<div class="panel-body">
						
										
						
									</div>
								</section>
							</div>
                            <div class="col-md-2">
								<section class="panel">
									<header class="panel-heading">
										
										<p>Total Vendors</p>
									</header>
									<div class="panel-body">
						
										
						
									</div>
								</section>
							</div>
                              <div class="col-md-2">
								<section class="panel">
									<header class="panel-heading">
										
										<p>Active/Deactive Vendor</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Donut -->
										
						
									</div>
								</section>
							</div>
                            <div class="col-md-2" >
								<section class="panel">
									<header class="panel-heading">
										
										<p>Vendor's Due Payment</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Donut -->
										
						
									</div>
								</section>
							</div>
                            <div class="col-md-2">
								<section class="panel">
									<header class="panel-heading">
										
										<p>Pending UPC</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Donut -->
										
						
									</div>
								</section>
							</div>
                  </section>
                    
                  <section >      
                      
                      <div class="col-md-12">
                          <h4>Order Status</h4>
                          </div>
						<div class="col-md-2">
								<section class="panel">
									<header class="panel-heading">
										
										<p>Pending</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Donut -->
										
						
									</div>
								</section>
							</div>
                            <div class="col-md-2">
								<section class="panel">
									<header class="panel-heading">
										
										<p>Confrimed</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Donut -->
										
						
									</div>
								</section>
							</div>
                           <div class="col-md-2">
								<section class="panel">
									<header class="panel-heading">
										
										<p>Dispatched</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Donut -->
										
						
									</div>
								</section>
							</div>
                            <div class="col-md-2">
								<section class="panel">
									<header class="panel-heading">
										
										<p>Delivered</p>
									</header>
									<div class="panel-body">
						
									</div>
								</section>
							</div>
                           
                      </section> 
                 
                             
		  <?php $this->load->view('common/sidebar_right'); ?>

		
         <?php $this->load->view('common/footer_script'); ?>
        
         <!-- Specific Page Vendor -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/jquery-appear/jquery.appear.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/jquery-easypiechart/jquery.easypiechart.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/flot/jquery.flot.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/flot-tooltip/jquery.flot.tooltip.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/flot/jquery.flot.pie.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/flot/jquery.flot.categories.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/flot/jquery.flot.resize.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/jquery-sparkline/jquery.sparkline.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/raphael/raphael.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/morris/morris.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/gauge/gauge.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/snap-svg/snap.svg.js"></script>
		<script src="<?php echo base_url(); ?>/catalogs/assets/vendor/liquid-meter/liquid.meter.js"></script>
        
        <!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/theme.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/theme.custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/theme.init.js"></script>
        
         <script src="<?php echo base_url(); ?>/catalogs/assets/javascripts/ui-elements/examples.charts.js"></script>
	</body>
</html>
