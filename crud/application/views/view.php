<!DOCTYPE html>
<html>
<head>
	<title>Crud Operations</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
	<table class= "table table-bordered table-striped">
		<a href="<?php echo base_url(); ?>crudd/add" class="btn btn success " >Add Product</a>	
		<thead>
			<tr>
				<th class=" btn-info">Product id</th>
				<th class=" btn-info">Product name</th>
				<th class=" btn-info">Product price</th>
				<th class=" btn-info">Product product Quantity</th>
				<th class=" btn-info">action</th>
			</tr>
		</thead>
		<tbody>
			
				
					<?php  foreach($list as $row) {?>
			<tr>
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->price; ?></td>
				<td><?php echo $row->quantity; ?></td>
				<td>
				<a href="" class="btn btn success">Edit</a>			
         		<a href="" class="btn btn success" >Delete</a>
         	</td>
			</tr>
			<?php  }?>
		</tbody>
	</table>

</body>
</html>