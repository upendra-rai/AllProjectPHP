<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<title>Join-Admin</title>
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

						<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">	
								</div>
						
								<h2 class="panel-title"> Edit Expanse </h2>
							</header>
								<div class="panel-body">
								<form action="" method="post" >
									<div class="row">

							   <div class="col-md-3">
 								<div class="form-group">
									 <select class="form-control" name="expanse_head">
									 	 <option value="">Expanse Head</option> 
									 	<?php foreach($selectexpanse as $row){ ?>
                                           <option value="<?php echo $row->expanse_head_id; ?>"><?php echo $row->expanse_head_name; ?></option>                                      
                                           <?php }?>
									 </select>
                                 </div>
                                 <div class="form-group">
                                 	<select class="form-control" name="expanse_subhead">
									 	 <option value="">Expanse Sub Head</option> 
									 	<?php foreach($selectsubexpanse as $row){ ?>
                                           <option value="<?php echo $row->expanse_subhead_id; ?>"><?php echo $row->expanse_subhead_name; ?></option>                                      
                                           <?php }?>
									 </select>
									 
                                 </div>
                               </div>
                               <div class="panel-body">
									<div class="row">
                               <div class="col-md-3">
 								<div class="form-group">
									 <input type="date" name="mydate">
                                 </div>
                               </div>

                         <div class="col-md-3">
 					     <div class="form-group">					 
                          <input type="text" name="expanse_amount"  value="" placeholder="Expanse Amount">
                      </div>
                  </div>
                          <div class="col-md-3"  >
                        <div class="form-group">
          	             <input type="text" name="expanse_note"  value="" placeholder="Note">
            	          </div>
                          </div>

                                <div class="col-md-3">
 								<div class="form-group">
									 <input type="submit" name="submit" value="submit" class="btn btn-info ">
                                 </div>
                               </div>
                                     </div>



								</form>
									
        <!--  <form action="" method="post">
          	<label type="id">Sr No</label>
            <input type="text" name="expanse_subhead_id"  value="<?php  echo $selected_list[0]->expanse_subhead_id;  ?>" class="form-control">

          	<input type="text" name="expanse_subhead_name" placeholder="Enter your name" value="<?php  echo $selected_list[0]->expanse_subhead_name;  ?>" class="form-control">
          	<input type="Submit" name="submit" value="Edit Expanse" class="btn btn-info">
			</form>	-->			
								</table>
							</div>
						</section>

					<!-- start: page -->

					<section class="panel">
							<header class="panel-heading">
								<div class="panel-actions">	
								</div>
						
								<h2 class="panel-title">Expanse Details </h2>
							</header>
							<div class="panel-body">
								
								<table class="table table-bordered table-striped mb-none" id="datatable-details">
									<h2 class="panel-title">Expanse List</h2>
								

									<thead>
										<tr>
									    	
										   <th class=" btn-info">Sr No</th>
					                       <th class=" btn-info">Date</th>
					                       <th class=" btn-info">Expanse Head</th>
					                       <th class=" btn-info">Expanse Sub Head</th>
					                       <th class=" btn-info">Expanse Amount</th>
					                       <th class=" btn-info">Note</th>
					                       <th class=" btn-info">Edit</th>
					                       <th class=" btn-info">Action</th>
					                        				
										</tr>
									</thead>
									<tbody>
										<?php $i = 1; foreach($list as $row) {?>
										<tr>
											  <td>
					         						<?php echo $i++; ?>

					         					</td>
					         					<td>
					         						<?php echo $row->expanse_date; ?>
					         					</td>
					         					<td>
					         						<?php echo $row->expanse_head_name; ?>
					         					</td>
					         					<td>
					         						<?php echo $row->expanse_subhead_name; ?>
					         					</td>
					         					<td>
					         						<?php echo $row->expanse_amount; ?>
					         					</td>
					         					<td>
					         						<?php echo $row->expanse_note; ?>
					         					</td>
					                            <td>
					                              <a href="" class="btn btn success">Edit</a>
					                            </td>
					                            <td>
					                            	<a href="<?php echo base_url() ?>/expanse/delete_expanse/<?php echo $row->expanse_head_id; ?>" class="btn btn success" class="btn btn success">Action</a>
					                            </td>
										</tr>
										<?php } ?>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

		<script type="text/javascript">

               $(document).ready(function(){
                          $('select[name=expanse_head]').change(function(){

                                    var expanse_head_id = $('select[name=expanse_head]').val();
                                    if(!expanse_head_id){
                                    	expanse_head_id = 0;
                                    }
                                    var expanse_subhead_id = $('select[name=expanse_subhead]').val();
                                        if(!expanse_subhead_id){
                                    	expanse_subhead_id = 0;
                                    }
                                    window.location.href = '<?php echo base_url(); ?>/add_expanse/add/'+expanse_head_id+'/'+expanse_subhead_id;
                         });
                          
                          $('select[name=expanse_subhead]').change(function(){

                                    var expanse_head_id = $('select[name=expanse_head]').val();
                                           if(!expanse_head_id){
                                    	expanse_head_id = 0;
                                    }
                                    var expanse_subhead_id = $('select[name=expanse_subhead]').val();
                                          if(!expanse_subhead_id){
                                    	expanse_subhead_id = 0;
                                    }
                                    window.location.href = '<?php echo base_url(); ?>/add_expanse/add/'+expanse_head_id+'/'+expanse_subhead_id;
                         });
                 });

		</script>
	</body>
</html>