<html>
<head>
  
</head>
	<title>Edit product</title>
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<body>
<form action="<?php echo base_url(); ?>/demo_controller/addproduct"  style="float: right" method="post" enctype="multipart/form-data">
            <label type="name">Sr no</label>
            <input type="text" name="sr_no" placeholder="Enter Sr Number" value="">
            <label type="name">Image</label>
            <input type="file" name="userfile"  size="20" value="">
            <label type="name">Category Name</label>
            <input type="text" name="category_name" placeholder="Enter your Category Name" value="">
            <label type="name">Sub Category</label>
            <input type="text" name="sub_category" placeholder="Enter your Sub Category" value="">
            <label type="name">Status</label>
            <input type="text" name="status" placeholder="Enter your Status" value="" >
            <input type="Submit" name="insert" value="Add category" class="btn btn-info">
          </form>
      
        
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
      </body>
      </html>