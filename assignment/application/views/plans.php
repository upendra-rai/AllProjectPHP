<!DOCTYPE html>
<html>
<head>
	<title>crud operation</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
</head> 
<body>
         <div class ="container ">
         	<div class="clear-fix">
         		<h4>Hi,WelcomeBack</h4>
         		
         	</div>
         	<table class= "table table-bordered1 table-striped">
                
         		<thead>
         			<tr>
                      <h3>Basic</h3>
                       <th> <a href="<?php echo base_url(); ?>/assign/index" class="btn btn-info" >Details</a> <a href="<?php echo base_url(); ?>/assign/plans" class="btn btn-info" >Plans</a> <a href="<?php echo base_url(); ?>/assign/classes" class="btn btn-info" >Classes</a> </th>
                       
                        
         			</tr>
         		</thead>
         		<tbody>
         			
         				<tr>
         					
         					<td>
         						 <div class="col-md-6">
                                     <div class="detail_box first">
                                        
                                         <?php foreach ($plans_details as $row){ ?>
                                         <p style="font-weight:600; color:#0798dc;"><label>Duration:&nbsp;</label> <?php echo $row->plan_avg_duration; ?></p>
                                         
                                         <p  style="font-weight:600; color:#0798dc;"><label>Name:&nbsp;</label> <?php echo $row->plan_name; ?></p>
                                         
                                         <p style="font-weight:600; color:#0798dc;"><label>Description:&nbsp;</label> <?php echo $row->plan_description; ?></p>
                                         
                                         <p style="font-weight:600; color:#0798dc;"><label>Total workout:&nbsp;</label><?php echo $row->plan_total_workouts; ?></p>
                                         

                                         <p style="font-weight:600; color:#0798dc;"><label> workout Description:&nbsp;</label> <?php echo $row->plan_workouts_description; ?></p>
                                         
                                         <p style="font-weight:600; color:#0798dc;"><label>Status:&nbsp;</label> <?php echo $row->status; ?></p>
                                       
                                         <a href="<?php echo base_url() ?>/crud/edit_crud/<?php echo $row->id; ?>" class="btn btn-primary">Edit</a>
         					
         						       <a href="<?php echo base_url() ?>/crud/delete_crud/<?php echo $row->id; ?>"  class="btn btn-danger">Delete</a>
                                        <?php  } ?>
                                     </div>

                                 </div>
         					</td>
                           
                            
         				</tr>

         			
         		</tbody>
         	</table>


         	
    </div>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
</body>
</html>