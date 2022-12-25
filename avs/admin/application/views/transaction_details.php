<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Admin Panel</title>
		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="JSOFT Admin - Responsive HTML5 Template">
		<meta name="author" content="JSOFT.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/bootstrap/css/bootstrap.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/font-awesome/css/font-awesome.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/magnific-popup/magnific-popup.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/bootstrap-datepicker/css/datepicker3.css" />

		<!-- Specific Page Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/vendor/morris/morris.css" />

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/stylesheets/theme.css" />

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/stylesheets/skins/default.css" />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url();?>/assets/stylesheets/theme-custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url();?>/assets/vendor/modernizr/modernizr.js"></script>

	</head>
	<body>
		<section class="body">

			<!-- start: header -->
			<?php  $this->load->view('common/header');?>

			
			<!-- end: header -->

			<div class="inner-wrapper">
				<!-- start: sidebar -->
				<?php $this->load->view('common/sidebar');?>
				
				<!-- end: sidebar -->

				<section role="main" class="content-body">
					<header class="page-header">
						<h2>Dashboard</h2>
					
						<div class="right-wrapper pull-right">
							<ol class="breadcrumbs">
								<li>
									<a href="index.html">
										<i class="fa fa-home"></i>
									</a>
								</li>
								<li><span>Dashboard</span></li>
							</ol>
					
							<a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
						</div>
					</header>

						

					<!-- start: page -->
					<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">	
								</div>
						
								<h2 class="panel-title">Transaction Details </h2>
								<!--<form action="" method="post">
							    <input type="text" name="search_bar"  value="" placeholder="serch by Name">	
							    <input type="text" name="search_bar1" value="" placeholder="serch by Mobile no">	
							    <input type="text" name="search_bar2" value="" placeholder="serch by colony">	
							    <input type="submit" name="submit" value="submitc" class="btn btn-info">
		                         </form>-->
							</header>
							<div class="panel-body">
								<form action="" method="post" >
									<div class="row">

							   <div class="col-md-3">
 								<div class="form-group">

									 <select class="form-control" name="shift">
									 	 <option value="">Select shift</option> 
									 	<?php foreach($user_shift as $row){ ?>
                                           <option value="<?php echo $row->shift_id; ?>" <?php if(isset($return_shift)){ if($row->shift_id == $return_shift){ echo 'selected'; } } ?>   ><?php echo $row->shift_name; ?></option>                                      
                                           <?php }?>
									 </select>
                                 </div>
                                 <div class="form-group">
                                 	<select class="form-control" name="user">
									 	 <option value="">Select Username Name</option> 
									 	<?php foreach($user_list as $row){ ?>
                                           <option value="<?php echo $row->user_id; ?>" <?php if(isset($return_user)){ if($row->user_id == $return_user){ echo 'selected'; } } ?>   ><?php echo $row->username; ?></option>                                      
                                           <?php }?>
									 </select>
									 
                                 </div>
                               </div>

                               <div class="col-md-3">
 								<div class="form-group">
									 <select class="form-control" name="customer_name">\
									 	 <option value="">Select Customer Name</option>
									 	<?php foreach($customer_list as $row){ ?>
                                           <option value="<?php echo $row->sr_no; ?>"  <?php if(isset($return_customer)){ if($return_customer == $row->sr_no){ echo 'selected'; }}?> ><?php echo $row->customer_name; ?></option>
                                           <?php }?>
									 </select>
                                 </div>
                               </div>

                                <div class="col-md-3">
 								<div class="form-group">
									 <input type="submit" name="submit" value="submit" class="btn ">
                                 </div>
                               </div>
                                     </div>



								</form>
								<table class="table table-bordered table-striped mb-none" id="datatable-details">
									<h2 class="panel-title">Transaction List </h2>
									<thead>
										<tr>
									    	
										   <th class=" btn-info">Transaction Id</th>
					                       <th class=" btn-info">Customer Name</th>
					                       <th class=" btn-info">Transaction Amount</th>
					                        <th class=" btn-info">Ledger Balance</th>
					                        <th class=" btn-info">Product Id</th>
					                        <th class=" btn-info">Product Qunatity</th>
					                        <th class=" btn-info">User Name</th>
					                        <th class=" btn-info">Shift Id</th>
					                        <th class=" btn-info">Customer type</th>
					                        <th class=" btn-info">Transaction Date</th>
					                        				
										</tr>
									</thead>
									<tbody>
										
									 
									<?php foreach($list as $row) {?>
										<tr class="gradeX">
											   
					         					<td>
					         						<?php echo $row->transaction_id; ?>
					         					</td>
					         					<td>
					         						<?php echo $row->customer_name; ?>
					         					</td>
					                            <td>
					                               <?php echo $row->transaction_amount; ?>
					                            </td>
					                            <td>
					                                <?php echo $row->ledger_balance; ?>
					                            </td>
					                            <td>
					                               <?php echo $row->product_id; ?>
					                            </td>
					                            <td>
					                            	<?php echo $row->product_quantity; ?>
					                            </td>
					                            <td>
					                               <?php echo $row->username; ?>
					                            </td>

					                            <td>
					                               <?php echo $row->shift_name; ?>
					                            </td>
					                            <td>
					                               <?php echo $row->customer_type; ?>
					                            </td>
					                            <td>
					                               <?php echo $row->transaction_date; ?>
					                            </td>

										</tr>
										<?php }?>
									</tbody>
								</table>
							</div>
						</section>
					
					<!-- end: page -->
				</section>
			</div>

			<aside id="sidebar-right" class="sidebar-right">
				<div class="nano">
					<div class="nano-content">
						<a href="#" class="mobile-close visible-xs">
							Collapse <i class="fa fa-chevron-right"></i>
						</a>
			
						<div class="sidebar-right-wrapper">
			
							<div class="sidebar-widget widget-calendar">
								<h6>Upcoming Tasks</h6>
								<div data-plugin-datepicker data-plugin-skin="dark" ></div>
			
								<ul>
									<li>
										<time datetime="2014-04-19T00:00+00:00">04/19/2014</time>
										<span>Company Meeting</span>
									</li>
								</ul>
							</div>
			
							<div class="sidebar-widget widget-friends">
								<h6>Friends</h6>
								<ul>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-online">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
									<li class="status-offline">
										<figure class="profile-picture">
											<img src="assets/images/!sample-user.jpg" alt="Joseph Doe" class="img-circle">
										</figure>
										<div class="profile-info">
											<span class="name">Joseph Doe Junior</span>
											<span class="title">Hey, how are you?</span>
										</div>
									</li>
								</ul>
							</div>
			
						</div>
					</div>
				</div>
			</aside>
		</section>

		<!-- script Area -->

		<?php $this->load->view('common/script')?>
	</body>
</html>