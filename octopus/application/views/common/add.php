<html>
<head>
  
</head>
	<title>Edit product</title>
  
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<body>
<form action="<?php echo base_url(); ?>/demo_controller/update_ctg/<?php echo $sproduct->sr_no?>"  style="float: right" method="post" enctype="multipart/form-data">
            <label type="name">Srrr no</label>
            <input type="text" name="sr_no" placeholder="Enter Sr Number" value="<?php echo $sproduct->sr_no; ?>">

            <label type="name">Image</label>
            <input type="file" name="userfile" size="20"  value="">
            <label type="name">Category Name</label>
            <input type="text" name="category_name" placeholder="Enter your Category Name" value="<?php echo $sproduct->category_name; ?>">
            <label type="name">Sub Category</label>
            <input type="text" name="sub_category" placeholder="Enter your Sub Category" value="<?php echo $sproduct->sub_category; ?>">
            <label type="name">Status</label>
            <input type="text" name="status" placeholder="Enter your Status" value="<?php echo $sproduct->status; ?>" >
            <input type="submit" name="insert" value="Add category" class="btn btn-info">
          </form>
      
        
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>   
      </body>
      </html>