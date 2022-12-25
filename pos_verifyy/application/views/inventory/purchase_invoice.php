
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
    			<h2>Purchase Details</h2><h3 class="pull-right"> <?php if(isset($bill_details[0]->bill_id)){ echo $bill_details[0]->bill_id; } ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
                        <strong>AVS PrimeTechnology LLP </strong><br>
    					1234 Main<br>
    					Apt. 4B<br>
    					Springfield, ST 54321
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Purchase Order:</strong><br>
    					PO Number : <?php if(isset($list[0]->purchase_order_id)){ echo $list[0]->purchase_order_id; } ?><br>
    					 <?php if(isset($list[0]->created_at)){ echo date('d-M-Y',strtotime($list[0]->created_at)); } ?><br>
    					 Status:  <?php if(isset($list[0]->status)){ echo $list[0]->status; } ?>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-4">
    				<address>
    					<strong>Supplier:</strong><br>
    					<?php if(isset($list[0]->supplier_name)){ echo $list[0]->supplier_name; } ?><br> Add:
                       <?php if(isset($list[0]->supplier_address)){ echo $list[0]->supplier_address; } ?><br> Contact:
                       <?php if(isset($list[0]->supplier_mobile_no)){ echo $list[0]->supplier_mobile_no; } ?>
    					
    				</address>
    			</div>
    			<div class="col-xs-6 text-left">
    				<address>
    					<strong>Ship To:</strong><br>
    					<?php if(isset($list[0]->outlet_name)){ echo $list[0]->outlet_name; } ?><br> Add:
                       <?php if(isset($list[0]->outlet_address)){ echo $list[0]->outlet_address; } ?>
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
        							<td><strong>Item</strong></td>
                                    <td class="text-center"><strong>Quantity</strong></td>
        							<td class="text-center"><strong>Price</strong></td>
                                    <td class="text-center"><strong>Tax</strong></td>
        							<td class="text-center"><strong>Discount</strong></td>
        							<td class="text-right"><strong>Totals</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
                                <?php $grand_totel = 0; $total_tax = 0; $total_discount = 0; foreach($list as $row){ ?>
                                
    							<tr>
    								<td><?php echo $row->product_name; ?></td>
                                    <td class="text-center"><?php echo +$row->qty; echo ' '.$row->unit_name; ?></td>
    								<td class="text-center"><?php echo $row->net_unit_cost; ?></td>
                                    <td class="text-center"><?php echo $row->tax.' ('.$row->tax_rate.' %)'; $total_tax += $row->tax;  ?></td>
    								<td class="text-center"><?php echo $row->discount; $total_discount += $row->discount;  ?></td>
    								<td class="text-right"><?php echo $row->total; $grand_totel += $row->total;  ?></td>
    							</tr>
                                
                                <?php } ?>
                                
                                 <tr>
                                    <td colspan="3">Total</td>
                                     <td class="text-center"><?php echo $total_tax; ?></td>
                                     <td class="text-center"><?php echo $total_discount; ?></td>
                                    <td class="text-right"><?php echo number_format($grand_totel, 2); ?></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="5">Order Tax</td>
                                    <td class="text-right"><?php if(isset($list[0])){ echo $list[0]->order_tax; } ?></td>
                                </tr>
                                 
                                <tr>
                                    <td colspan="5">Order Discount</td>
                                    <td class="text-right"><?php if(isset($list[0])){ echo $list[0]->order_discount; } ?></td>
                                </tr>
                                 
                                <tr>
                                    <td colspan="5">Shipping Cost</td>
                                    <td class="text-right"><?php if(isset($list[0])){ echo $list[0]->shipping_cost; } ?></td>
                                </tr>
                                 
                                <tr>
                                    <td colspan="5">Grand Total</td>
                                    <td class="text-right"><?php if(isset($list[0])){ echo $list[0]->grand_total; } ?></td>
                                </tr>
                                 
                                <tr>
                                    <td colspan="5">Paid Amount</td>
                                    <td class="text-right"><?php if(isset($list[0])){ echo $list[0]->paid_amount; } ?></td>
                                </tr>
                                <tr>
                                    <td colspan="5">Due</td>
                                    <td class="text-right"></td>
                                </tr>
                               <tr>
                                    <td colspan="5">Note</td>
                                    <td class="text-right"><?php if(isset($list[0])){ echo $list[0]->note; } ?></td>
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