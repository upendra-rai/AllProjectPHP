<!DOCTYPE html>
<html>
<head>
	<title>crud operation</title>

</head>
<body>
         <div class ="container">
         	<div class="clear-fix">
         		<h3 style=> All Product</h3>
         		<a href="#" class="btn btn-primary" style="float: right">Add Product</a>
         		
         	</div>
         	


          <form action="<?php echo base_url(); ?>crud/update_crud" method="post">
          	<label type="name">Name</label>
            <input type="hidden" name="id"  value="<?php  echo $selected_list[0]->id;  ?>" class="form-control">

          	<input type="text" name="name" placeholder="Enter your name" value="<?php  echo $selected_list[0]->name;  ?>" class="form-control">
          	<label type="name">Price</label>
          	<input type="text" name="price" placeholder="Enter your price" value="<?php  echo $selected_list[0]->price;  ?>" class="form-control">
          	<label type="name">Quantity</label>
          	<input type="text" name="quantity" placeholder="Enter your Quantity" value="<?php  echo $selected_list[0]->quantity;  ?>" class="form-control">
          	<input type="Submit" name="insert" value="Add Product" class="btn btn-info">


          </form>



         	
         </div>
       
</body>
</html>