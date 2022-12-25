
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<style type="text/css">
    .invoice-title h2, .invoice-title h3 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 2px solid;
}
    
</style>
<div id="print_area">
<div class="container" >
   <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Payment Details</h2><h3 class="pull-right"> </h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
                        <strong>Purchase Id: <?php if(isset($list[0]->purchase_id)){ echo $list[0]->purchase_id; } ?> </strong><br>
    					Total Purchase Amount : <?php if(isset($list[0]->grand_total)){ echo $list[0]->grand_total; } ?><br>
    					Paid Amount :  <?php if(isset($list[0]->paid_amount)){ echo $list[0]->paid_amount; } ?><br>
                     
    					Payment Status : <?php if(isset($list[0]->payment_status)){ if($list[0]->payment_status == 0){ echo 'Due'; }else if($list[0]->payment_status == 1){ echo 'Paid'; } } ?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				
    				<address>
    					<strong>Supplier:</strong><br>
    					<?php if(isset($list[0]->supplier_name)){ echo $list[0]->supplier_name; } ?><br> Add:
                       <?php if(isset($list[0]->supplier_address)){ echo $list[0]->supplier_address; } ?><br> Contact:
                       <?php if(isset($list[0]->supplier_mobile_no)){ echo $list[0]->supplier_mobile_no; } ?>
    					
    				</address>
    			</div>
    			
    		</div>
    		
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Date</strong></td>
                                    <td class="text-center"><strong>Account</strong></td>
        							<td class="text-center"><strong>Paid amount</strong></td>
                                    <td class="text-center"><strong>Paid By</strong></td>
        							<td class="text-center"><strong>Edit</strong></td>
        							<td class="text-right"><strong>Delete</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <?php $grand_totel = 0; $total_tax = 0; $total_discount = 0; foreach($list as $row){ ?>
                                
    							<tr>
    								<td><?php echo $row->created_at; ?></td>
                                    <td class="text-center"><?php echo +$row->account_name; ?></td>
    								<td class="text-center"><?php echo $row->amount; $grand_totel += $row->amount;  ?></td>
                                    <td class="text-center"><?php echo $row->name;  ?></td>
    								<td class="text-center"></td>
    								<td class="text-right"></td>
    							</tr>
                                
                                <?php } ?>
                                
                                 <tr>
                                    <td colspan="3">Total</td>
                                     <td class="text-center"></td>
                                     <td class="text-center"></td>
                                    <td class="text-right"><?php echo number_format($grand_totel, 2); ?></td>
                                    	<td class="text-center"></td>
    								<td class="text-right"></td>
                                </tr>
                                
                                
    						</tbody>
                                 
                            <tfoot>
                                
                                
                            </tfoot>
    					</table>
                        
                        <div class="col-md-12">
                            <a href="<?php echo base_url(); ?>/billing/add_billing">Back</a>
                            
                            <button type="button" id="print" class="btn">Print</button>
                        </div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>
</div>
<script>
    // print file
          $(document).on('click', '#print',function(){

            var divContents = $("#print_area").html();
            var printWindow = window.open('', '', 'height=500,width=800');
           printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
           });
    
   
</script>