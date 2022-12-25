<html>
<head></head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<body>
<form action="<?php echo base_url(); ?>crud/addProduct" method="post">
            <label type="name">Name</label>
            <input type="text" name="name" placeholder="Enter your name" value="<?php if(isset($selected_list[0]->name)){ echo $selected_list[0]->name; }  ?>" class="form-control">
            <label type="name">Price</label>
            <input type="text" name="price" placeholder="Enter your price" value="<?php if(isset($selected_list[0]->price)){ echo $selected_list[0]->price; } ?>" class="form-control">
            <label type="name">Quantity</label>
            <input type="text" name="quantity" placeholder="Enter your Quantity" value="<?php if(isset($selected_list[0]->quantity)){ echo $selected_list[0]->quantity; } ?>" class="form-control">
            <input type="Submit" name="insert" value="Add Product" class="btn btn-info">


          </form>
      
        
        
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
      </body>
      </html>