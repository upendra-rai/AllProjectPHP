<!DOCTYPE html>
<html>
<head>
    <title>Category List</title>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 
</head>
<body>
         <div class ="container">
            <div class="clear-fix">
                <h3 style=>Category List</h3>
                 
                <a href="<?php echo base_url(); ?>demo_controller/insert/" class="btn btn-primary" style="float: right">Add Category</a>
                
                
            </div>
         <body>
         

          

            <table class= "table table-bordered table-striped" class="btn btn-info" >
                <thead>
                    <tr>
                       <th class=" btn-info">  Sr no </th>
                       <th class=" btn-info"> Image</th>
                       <th class=" btn-info">  Category Name</th>
                        <th class=" btn-info">Sub Category</th>
                        <th class=" btn-info">Status</th>
                        <th class=" btn-info">Edit</th>
                        <th class= "btn-info">Action</th>
                    </tr>
                </thead>
                <tbody>
                  
                 <?php foreach ($product_details as $products):?>
                <tr>
                  <td>
                    <?php echo $products->sr_no; ?>
                  </td>
                  <td>
                    <img src="<?php echo base_url('template/images'); ?>/<?php echo $products->image; ?>" alt="" class="img-responsive img-curve"  width="50" height="60">
                  </td>
                  <td>
                    <?php echo $products->category_name; ?>
                  </td>
                  <td>
                    <?php echo $products->sub_category; ?>
                  </td>
                  <td>
                    <?php echo $products->status; ?>
                  </td>



                      <td>
                    <a  href="<?php echo base_url(); ?>demo_controller/edit_ctg/<?php echo $products->sr_no;?>"class="btn btn-success">Edit</a>
                  </td>
                  <td>
                    <a  href="<?php echo base_url();?>/demo_controller/delete_ctg/<?php echo $products->sr_no?>" class="btn btn-success">Delete</a> 
                  </td>
                       </tr>
            
                      <?php  endforeach; ?>

                </tbody>
            </table>

            
          
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>       </div> 
</body>
</html>