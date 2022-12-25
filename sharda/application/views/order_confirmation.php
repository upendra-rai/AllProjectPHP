<html>
<head>
<title>add to cart</title>
   
  <?php  $this->load->view('header_link');?>
</head>
<body>
     <!--head_bar section -->
     <!--head_bar section -->
     <!--head_bar section -->
     <!--head_bar section -->
  <?php $this->load->view('menu_bar'); ?>
     <!--menu_bar section -->
     <!--menu_bar section -->
     <!--menu_bar section -->
     <!--menu_bar section -->

         <!--billing section -->
         <!--billing section -->
         <!--billing section -->
         <!--billing section -->
    <section class="order_confirmation" style="background-color:white;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <h1 style="background-color:aliceblue; padding:15px; border-radius:10px; width:100%;">Thankyou for your order</h1>
                <table class="table" style="margin-top:25px;">
                    <thead style="background-color:#ff7f42; color:white;">
                         <tr>
                             <td>Products</td>
                             <td>Quantity</td>
                             <td>Sub Total</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $sum_rate=0;  foreach($order as $row){ ?>
                        <tr>
                             <td><?php echo $row->product_current_no; ?></td>
                             <td>1</td>
                             <td><?php echo $row->product_rate; $sum_rate+= $row->product_rate; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                     <tfoot>
                    
                        <tr>
                             <td>Total</td>
                             <td></td>
                             <td><?php echo $sum_rate; ?></td>
                        </tr>
                   </tfoot>
                </table>
                <div style="text-align:center; padding:15px;">
                    <a href="<?php echo base_url(); ?>/home"><button type="button" class="my_btn" > Continue Shopping</button></a>
                </div>
            </div>
        </div>
        </div>
    </section>

     <?php $this->load->view('footer.php');?>
     <?php $this->load->view('footer_script.php');?>
     <script>
    var swiper = new Swiper('.swiper-container');
         var swiper = new Swiper('.swiper-container1', {
      slidesPerView: 3,
      slidesPerColumn: 1,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
         
       function check_cart(){
		var local_key = 'cart_items';
		var check_cart = localStorage.getItem(local_key);
        var product_array = [];   
           
		if(check_cart){
			 cart_data = JSON.parse(check_cart);
            
            var myitem_data = JSON.parse(cart_data[0].item_data);
            
            var cart_tatal = 0;
            var cart_item = 0;
            
            
            for(var i = 0; i < myitem_data.length; i++ ){
                
                var product_id = myitem_data[i].product_id;
                var product_rate = myitem_data[i].product_rate;
                cart_tatal += Math.abs(myitem_data[i].product_rate);
                cart_item += 1;
                
                product_array.push({'product_id':product_id,'product_qty': '1', 'product_price' :product_rate });

                $('#cart_item_tbody').append(' <tr><td><b>'+myitem_data[i].product_current_no+'</b><p class="total">Total 23 &nbsp;|&nbsp; Sum 05 &nbsp; <span class="r2p">R2P</span>&nbsp;&nbsp; | &nbsp;&nbsp; <span style="color:#a6a6a6;"> <i class="fa fa-eye"></i>&nbsp;&nbsp; '+myitem_data[i].user_like+' &nbsp;&nbsp;<i class="fa fa-heart"></i> '+myitem_data[i].user_view+' </span></p></td><td><b>Rs. '+myitem_data[i].product_rate+'</b></td></tr>');
                
                $('.count_cart_item').html(cart_item);
                $('.cart_tatal').html(cart_tatal);
            }
            
            $(('input[name=cart_total]')).val(cart_tatal);
            
		}
           
           $('input[name=product_array]').val(JSON.stringify(product_array));
           
           //console.log(product_array);
	}
     // check_cart();    
         
  </script>
    
</body>
</html>