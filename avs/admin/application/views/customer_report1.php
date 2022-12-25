<!DOCTYPE html>
<html>
<head>
	<title>Customer Report</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
</head> 
<body>
         <div class ="container">
         	<div class="clear-fix">
         		<h3 style=>Customer Details</h3>
         		<a href="#"  style="float: left">Customer List</a>
         	</div>
        <!--  <form action="<?php echo base_url(); ?>crud/search_bar" method="post">
            <input type="text" name="search_bar"placeholder="serch by Name">
            <input type="submit" name="submit" value="submit" class="btn btn-info">
          </form>

           <form action="<?php echo base_url(); ?>crud/search_bar1" method="post">
            <input type="text" name="search_bar1"placeholder="serch by Quantity">
            <input type="submit" name="submit" value="submit" class="btn btn-info">
          </form>

          <form action="<?php echo base_url(); ?>crud/search_bar2" method="post">
            <input type="text" name="search_bar2"placeholder="serch by price">
            <input type="submit" name="submit" value="submit" class="btn btn-info">
          </form>-->
         	<table class= "table table-bordered table-striped">
         		<thead>
         			<tr>
                       <th class=" btn-info">Sr No</th>
                       <th class=" btn-info"> Customer Name</th>
                       <th class=" btn-info">Mobile Number</th>
                        <th class=" btn-info">Email Id</th>
                        <th class=" btn-info">Colony</th>
                        <th class=" btn-info">Balance</th>
                        <th class=" btn-info">Delivery Type</th>
                        <th class=" btn-info">Status</th>

         			</tr>
         		</thead>
         		<tbody>
                    
         			
         				<tr>
                            
         					<td>
         						1
         					</td>
         					<td>
         						Ram
         					</td>
         					<td>
         						9554118595
         					</td>
                            <td>
                                abc@gmail.com
                            </td>
                            <td>
                                bagpat
                            </td>
                            <td>
                               50
                            </td>
                            <td>
                               home
                            </td>
                            <td>
                               Active
                            </td>


                       
         					
         				</tr>

         			
         		</tbody>
         	</table>


         	
        
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
</body>
</html>