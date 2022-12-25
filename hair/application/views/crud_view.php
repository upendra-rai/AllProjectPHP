<!DOCTYPE html>
<html>
<head>
	<title>crud operation</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
</head> 
<body>
         <div class ="container">
         	<div class="clear-fix">
         		<h3 style=> Log in</h3>
         		<a href="<?php echo base_url(); ?>/crud/add" class="btn btn-primary" style="float: right">Add Product</a>
         	</div>
          <form action="<?php echo base_url(); ?>crud/search_bar" method="post">
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
          </form>
         	<table class= "table table-bordered table-striped">
         		<thead>
         			<tr>
                       <th class=" btn-info">  Product Name</th>
                       <th class=" btn-info"> Product Price</th>
                       <th class=" btn-info">  Product Quantity</th>
                        <th class=" btn-info">     action</th>
         			</tr>
         		</thead>
         		<tbody>
         			<?php foreach ($product_details as $products):?>
         				<tr>
         					<td>
         						<?php echo $products->name; ?>
         					</td>
         					<td>
         						<?php echo $products->price; ?>
         					</td>
         					<td>
         						<?php echo $products->quantity; ?>
         					</td>
         					<td>
         						<a href="<?php echo base_url() ?>/crud/edit_crud/<?php echo $products->id; ?>" class="btn btn success">Edit</a>
         					
         						<a href="<?php echo base_url() ?>/crud/delete_crud/<?php echo $products->id; ?>" class="btn btn success" class="btn btn success">Delete</a>
         					</td>
         				</tr>

         			<?php  endforeach; ?>
         		</tbody>
         	</table>


         	
        
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
</body>
</html>