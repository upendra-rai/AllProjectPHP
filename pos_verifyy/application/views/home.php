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
                  
                  <div class="row" style="display:none;">
							<div class="col-md-6" >
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Basic Chart</h2>
										<p class="panel-subtitle">You don't have to do much to get an attractive plot. Create a placeholder, make sure it has dimensions (so Flot knows at what size to draw the plot), then call the plot function with your data.</p>
									</header>
									<div class="panel-body">
						
										<!-- Flot: Basic -->
										<div class="chart chart-md" id="flotBasic"></div>
										<script type="text/javascript">
						
											var flotBasicData = [{
												data: [
													[0, 170],
													[1, 169],
													[2, 173],
													[3, 188],
													[4, 147],
													[5, 113],
													[6, 128],
													[7, 169],
													[8, 173],
													[9, 128],
													[10, 128]
												],
												label: "Series 1",
												color: "#0088cc"
											}, {
												data: [
													[0, 115],
													[1, 124],
													[2, 114],
													[3, 121],
													[4, 115],
													[5, 83],
													[6, 102],
													[7, 148],
													[8, 147],
													[9, 103],
													[10, 113]
												],
												label: "Series 2",
												color: "#2baab1"
											}, {
												data: [
													[0, 70],
													[1, 69],
													[2, 73],
													[3, 88],
													[4, 47],
													[5, 13],
													[6, 28],
													[7, 69],
													[8, 73],
													[9, 28],
													[10, 28]
												],
												label: "Series 3",
												color: "#734ba9"
											}];
						
											// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
						
										</script>
						
									</div>
								</section>
							</div>
							<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Real-Time Chart</h2>
										<p class="panel-subtitle">You can update a chart periodically to get a real-time effect by using a timer to insert the new data in the plot and redraw it.</p>
									</header>
									<div class="panel-body">
						
										<!-- Flot: Curves -->
										<div class="chart chart-md" id="flotRealTime"></div>
						
									</div>
								</section>
							</div>
						</div>
                  
                     
						<div class="row">
							<div class="col-md-6" style="display:none;">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Bars Chart</h2>
										<p class="panel-subtitle">With the categories plugin you can plot categories/textual data easily.</p>
									</header>
									<div class="panel-body">
						
										<!-- Flot: Bars -->
										<div class="chart chart-md" id="flotBars"></div>
										<script type="text/javascript">
						
											var flotBarsData = [
												["Jan", 28],
												["Feb", 42],
												["Mar", 25],
												["Apr", 23],
												["May", 37],
												["Jun", 33],
												["Jul", 18],
												["Aug", 14],
												["Sep", 18],
												["Oct", 15],
												["Nov", 4],
												["Dec", 7]
											];
						
											// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
						
										</script>
						
									</div>
								</section>
							</div>
                            
                            <div class="col-md-4">
								<section class="panel">
									<header class="panel-heading">
										
										<p class="panel-subtitle">A style of chart that is created .</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Line -->
										<div class="chart chart-md" id="morrisLine"></div>
										<script type="text/javascript">
						
											var morrisLineData = [{
												y: '2006',
												a: 100,
												b: 90
											}, {
												y: '2007',
												a: 75,
												b: 65
											}, {
												y: '2008',
												a: 50,
												b: 40
											}, {
												y: '2009',
												a: 75,
												b: 65
											}, {
												y: '2010',
												a: 50,
												b: 40
											}, {
												y: '2011',
												a: 75,
												b: 65
											}, {
												y: '2012',
												a: 100,
												b: 90
											}, {
												y: '2013',
												a: 75,
												b: 65
											}, {
												y: '2014',
												a: 100,
												b: 90
											}];
						
											// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
						
										</script>
						
									</div>
								</section>
							</div>
                            
							<div class="col-md-4" style="padding:0px;">
								<section class="panel">
									<header class="panel-heading">
									
										<p class="panel-subtitle">Default Pie Chart</p>
									</header>
									<div class="panel-body">
						
										<!-- Flot: Pie -->
										<div class="chart chart-md" id="flotPie"></div>
										<script type="text/javascript">
						
											var flotPieData = [{
												label: "Series 1",
												data: [
													[1, 60]
												],
												color: '#0088cc'
											}, {
												label: "Series 2",
												data: [
													[1, 10]
												],
												color: '#2baab1'
											}, {
												label: "Series 3",
												data: [
													[1, 15]
												],
												color: '#734ba9'
											}, {
												label: "Series 4",
												data: [
													[1, 15]
												],
												color: '#E36159'
											}];
						
											// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
						
										</script>
						
									</div>
								</section>
							</div>
                            
                            <div class="col-md-4">
								<section class="panel">
									<header class="panel-heading">
										
										<p class="panel-subtitle">Donut Chart are functionally identical to pie charts.</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Donut -->
										<div class="chart chart-md" id="morrisDonut"></div>
										<script type="text/javascript">
						
											var morrisDonutData = [{
												label: "Porto Template",
												value: 32
											}, {
												label: "Tucson Template",
												value: 18
											}, {
												label: "Porto Admin",
												value: 20
											}];
						
											// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
						
										</script>
						
									</div>
								</section>
							</div>
						</div>
						
						
                  
                  <div class="row" >
							
                      
                            <div class="col-md-12">
                                
                                <div class="quick_report">
                  
                        <table class="table table-border">
                            <thead>
                               <tr>
                                    <th></th>
                                   <th>Sales</th>
                                   <th>GST</th>
                                   <th>Discount</th>
                                   <th>Customers</th>
                                   <th>Profit</th>
                                   <th>Credit</th>
                                   <th>Purchase</th>
                                   <th>Wallet</th>
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
                                        <td>0</td>
                                        <td>0</td>
                                    </tr>
                                </tbody>
                           </table>
                  
                    </div>
                            </div>
                      
                      
                             <div class="col-md-12">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Bar Chart</h2>
										<p class="panel-subtitle">A bar chart is a way of summarizing a set of categorical data.</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Bar -->
										<div class="chart chart-md" id="morrisBar"></div>
										<script type="text/javascript">
						
											var morrisBarData = [{
												y: '2004',
												a: 10,
												b: 30
											}, {
												y: '2005',
												a: 100,
												b: 25
											}, {
												y: '2006',
												a: 60,
												b: 25
											}, {
												y: '2007',
												a: 75,
												b: 35
											}, {
												y: '2008',
												a: 90,
												b: 20
											}, {
												y: '2009',
												a: 75,
												b: 15
											}, {
												y: '2010',
												a: 50,
												b: 10
											}, {
												y: '2011',
												a: 75,
												b: 25
											}, {
												y: '2012',
												a: 30,
												b: 10
											}, {
												y: '2013',
												a: 75,
												b: 5
											}, {
												y: '2014',
												a: 60,
												b: 8
											}];
						
											// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
						
										</script>
						
									</div>
								</section>
							</div>
						</div>
                  
                  <div class="row" style="display:none;">
							<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Stacked Chart</h2>
										<p class="panel-subtitle">Stacked Bar Chart.</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Area -->
										<div class="chart chart-md" id="morrisStacked"></div>
										<script type="text/javascript">
						
											var morrisStackedData = [{
												y: '2004',
												a: 10,
												b: 30
											}, {
												y: '2005',
												a: 100,
												b: 25
											}, {
												y: '2006',
												a: 60,
												b: 25
											}, {
												y: '2007',
												a: 75,
												b: 35
											}, {
												y: '2008',
												a: 90,
												b: 20
											}, {
												y: '2009',
												a: 75,
												b: 15
											}, {
												y: '2010',
												a: 50,
												b: 10
											}, {
												y: '2011',
												a: 75,
												b: 25
											}, {
												y: '2012',
												a: 30,
												b: 10
											}, {
												y: '2013',
												a: 75,
												b: 5
											}, {
												y: '2014',
												a: 60,
												b: 8
											}];
						
											// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
						
										</script>
						
									</div>
								</section>
							</div>
							<div class="col-md-6">
								<section class="panel">
									<header class="panel-heading">
										<div class="panel-actions">
											<a href="#" class="fa fa-caret-down"></a>
											<a href="#" class="fa fa-times"></a>
										</div>
						
										<h2 class="panel-title">Area Chart</h2>
										<p class="panel-subtitle">An area chart or area graph displays graphically quantitive data.</p>
									</header>
									<div class="panel-body">
						
										<!-- Morris: Area -->
										<div class="chart chart-md" id="morrisArea"></div>
										<script type="text/javascript">
						
											var morrisAreaData = [{
												y: '2004',
												a: 10,
												b: 30
											}, {
												y: '2005',
												a: 100,
												b: 25
											}, {
												y: '2006',
												a: 60,
												b: 25
											}, {
												y: '2007',
												a: 75,
												b: 35
											}, {
												y: '2008',
												a: 90,
												b: 20
											}, {
												y: '2009',
												a: 75,
												b: 15
											}, {
												y: '2010',
												a: 50,
												b: 10
											}, {
												y: '2011',
												a: 75,
												b: 25
											}, {
												y: '2012',
												a: 30,
												b: 10
											}, {
												y: '2013',
												a: 75,
												b: 5
											}, {
												y: '2014',
												a: 60,
												b: 8
											}];
						
											// See: assets/javascripts/ui-elements/examples.charts.js for more settings.
						
										</script>
						
									</div>
								</section>
							</div>
						</div>
                  
                  
                  
                  
                   

			</div></div>

		  <?php $this->load->view('common/sidebar_right'); ?>

		</section>
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
