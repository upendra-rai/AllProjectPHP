<!DOCTYPE html>
<html>
<head>
	<title>add Product</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<div class ="container">
         	<div class="clear-fix">
         		<h3 style=> All Product</h3>       		         		
         	</div>
	 <form action="<?php echo base_url(); ?>crudd/add" method="post">
          	
               
          	<label type="name">Name</label>
          	<input type="text" name="name" placeholder="Enter your price"  class="form-control">
          	<label type="name">Price</label>
          	<input type="text" name="price" placeholder="Enter your price"  class="form-control">
          	<label type="name">Quantity</label>
          	<input type="text" name="quantity" placeholder="Enter your Quantity" class="form-control">
          	<input type="Submit" name="insert" value="Add Product" class="btn btn-info">


          </form>
      </div>

</body>
</html>