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

  <section class="billing">
      <div class="container">
          <div class="row" style="margin-top: 20px">
    <div class="col-md-8" style=" margin-bottom: 10px; ">
         <div class="box" >     
               <div class="heading" style="text-align: left; padding: 6px;">
            <h3 style="">your favourites</h3>
           
        </div>
             <?php function sum($num) { 
                        $sum = 0; 
                         for ($i = 0; $i < strlen($num); $i++){ 
                         $sum += $num[$i]; 
                        } 
                          return $sum; 
                   } 
             ?>
        <table class="table">
            <thead>
                <tr>
                    <td>Numbers</td>
                     <td>Price</td>
                </tr>
            
            </thead>
           <tbody id="cart_item_tbody">
               
                <?php $cart_total = 0; $total = 0; foreach($list as $row){ ?>
                 <?php
                 
                   $cart_total += $row->product_rate;
                   $total += 1;
                                                                          
                   ?>                                                          
               
                    <tr>
                        <td>
                            <a href="<?php echo base_url(); ?>/customer/remove_cart/<?php echo $row->cart_id; ?>"><span ><i class='fa fa-window-close' style="color:red;"></i></span></a>
                            <b><?php echo $row->product_current_no; ?></b><p class="total">Total <?php $number_sum =  sum($row->product_current_no); echo $number_sum; ?>  &nbsp;|&nbsp; Sum <?php  $sum_value = sum(json_encode($number_sum)); echo $sum_value;  ?> &nbsp; <span class="r2p">R2P</span>&nbsp;&nbsp; | &nbsp;&nbsp; <span style="color:#a6a6a6;"> <i class="fa fa-eye"></i>&nbsp;&nbsp; <?php echo $row->user_like; ?> &nbsp;&nbsp;<i class="fa fa-heart"></i> <?php echo $row->user_view; ?> </span></p></td>
                        <td><b>Rs. <?php echo $row->product_rate; ?></b></td>
                    </tr>
               
               <?php } ?>
     
               
              
            </tbody>
        
        
        
        
        </table>
        
        </div>
              </div>
          <div class="col-md-4"style="padding-left: 0px;">
              <div class="box" style="padding: 10px;">
               
        <table class="table">
            <thead>
                <tr>
                    <td>Summary</td>
                     <td></td>
                </tr>
            
            </thead>
           <tbody>
               
              
                <tr>
                    <td style="font-size: 14px; border-bottom: 1px solid transparent;">
                        Total (<span class="count_cart_item"><?php echo $total; ?></span> items)
                        
                    </td>
                    
                     <td  style="font-size: 14px; border-bottom: 1px solid transparent; ">
                          Rs. <span class="cart_tatal" ><?php echo $cart_total; ?></span>
                    </td>
               
               </tr>
               
               
                <tr>
                    <td  style="font-size: 14px; ">
                       Tax
                        
                    </td>
                    
                     <td  style="font-size: 14px;">
                          0
                    </td>
               
               </tr>
              
            </tbody>
        
        <tfoot>
            <tr>
                    <td  style="font-size: 14px;">
                        Subtotal (<span class="count_cart_item"><?php echo $total; ?></span> items)
                        
                    </td>
                    
                     <td  style="font-size: 14px;">
                         Rs. <span class="cart_tatal" > <?php echo $cart_total; ?> </span>
                    </td>
               
               </tr>
             
              
            </tfoot>
        
        
        </table>
                  
                  <div>
                       <?php if(!$this->session->userdata('customerlogin_id')){ ?>
                      <a href="<?php echo base_url(); ?>/customer/login"><button type="button" class="my_btn">Proceed To Checkout</button></a>
                      <?php } ?>
                  </div>
        
              </div>
              </div>
              </div>
          </div>
       
        
    
     
    
        </section>
    <!--contact section -->
     <!--contact section -->
     <!--contact section -->
    
    
     <!--contact section -->
    
    <?php if($this->session->userdata('customerlogin_id')){ ?>
    
    <section class="contact"   >
        <div class="container">
             <div class="box">
            <div class="row">
            
             <div class="heading" style="">
            <h3>Please fill checkout the details</h3>
        </div>
            </div>
            <div class="row">
        <div class="col-md-12">
           
            
        
            <div class="col-md-12" >
      

        <form action="<?php  echo base_url(); ?>/home/checkout" method="post">
            <div class="col-md-6" style="display:none;">
                <div class="form-group">
                   <input class="form-control" type="text"  name="cart_total" value="<?php echo $cart_total; ?>" placeholder="NAME" readonly ><br>  
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                   <input class="form-control" type="text"  name="name" placeholder="NAME"><br>  
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" type="text"  name="mobilenumber" placeholder="Mobile Number"><br>  
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                   <input class="form-control" type="text"  name="email" placeholder="Email"><br>  
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                   <input class="form-control" type="text"  name="city" placeholder="City"><br>  
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                   <input class="form-control" type="text"  name="state" placeholder="State"><br>  
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                   <input class="form-control" type="text"  name="pincode" placeholder="Pincode"><br>  
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea class="form-control" name="address" placeholder="Address" style="height: 100px; "></textarea>
                   
                </div>
            </div>
            <div class="col-md-12" style="text-align: center;">
                <div class="form-group">
                    <input type="submit" name="submit" value="Pay now Rs. <?php echo $cart_total; ?> " class="my_btn" style="font-size: 14px;">
                     
                </div>
            </div>
        
        
     
        </form>
                <p style="color:#999999; padding-top: 15px; margin-top: 65px; margin-bottom: 35px;">* By clicking on the pay now button means that you are agreeing to our terms and conditions</p>
            </div>
                </div>
            </div>
                </div>
            </div>
    </section>
    
    <?php } ?>
    <!--yourfav section -->
     <!--yourfav section -->
     <!--yourfav section -->
     <!--yourfav section -->
    <section class="yourfav">
        <div class="container"  >
            <div class="box">
          <div class="row">
        <div class="heading">
            <h3 style="">your favourites</h3>
           
        </div>
        </div>
         <div class="row" >
                 <div class="swiper-container1" style="padding-left: 50px; padding-right: 50px;height: 250px; ">
    <div class="swiper-wrapper" style="overflow: hidden;">
      <div class="swiper-slide"> <div class="simcard">
                <p class="number">99-88-99-88-99<span style=" float: right; "><i class="ion-android-favorite-outline" style="color: white;"></i></span>
                </p>
                <p class="pricing"><span class="selling_price">INR 37,500</span>&nbsp; <span class="mrp_price"> inr44,000 </span> &nbsp; <span class="discount">%15 off</span>
                </p>
                <p class="total">Total 23  &nbsp; &nbsp; sum05 &nbsp;&nbsp;<span>R2P</span>
                </p>
                <div class="like_view" >
                <div class="box1" ><i class="ion-ios-eye-outline" style="  color:#afb7af"></i></div>
                    <div class="box2" >&nbsp;321</div>
                    <div class="box3"><i class="ion-android-favorite-outline" style=" color:#afb7af"></i></div>
                    <div class="box4" >&nbsp;321</div>
                </div>
                <div class="action">
                    <div class="col-md-6" style="padding-left:0px; text-align:left;">
                     <a herf="">add to cart</a>
                    
                    </div>
                   <div class="col-md-6">
                    <button type="button" class="my_btn">Buy now</button>
                    </div>
                </div>
            </div></div>
      <div class="swiper-slide"><div class="simcard">
                <p class="number">99-88-99-88-99<span style=" float: right; "><i class="ion-android-favorite-outline" style="color: white;"></i></span>
                </p>
                <p class="pricing"><span class="selling_price">INR 37,500</span>&nbsp; <span class="mrp_price"> inr44,000 </span> &nbsp; <span class="discount">%15 off</span>
                </p>
                <p class="total">Total 23  &nbsp; &nbsp; sum05 &nbsp;&nbsp;<span>R2P</span>
                </p>
                <div class="like_view" >
                <div class="box1" ><i class="ion-ios-eye-outline" style="  color:#afb7af"></i></div>
                    <div class="box2" >&nbsp;321</div>
                    <div class="box3"><i class="ion-android-favorite-outline" style=" color:#afb7af"></i></div>
                    <div class="box4" >&nbsp;321</div>
                </div>
                <div class="action">
                    <div class="col-md-6" style="padding-left:0px; text-align:left;">
                     <a herf="">add to cart</a>
                    
                    </div>
                   <div class="col-md-6">
                    <button type="button" class="my_btn">Buy now</button>
                    </div>
                </div>
            </div></div>
      <div class="swiper-slide"><div class="simcard">
                <p class="number">99-88-99-88-99<span style=" float: right; "><i class="ion-android-favorite-outline" style="color: white;"></i></span>
                </p>
                <p class="pricing"><span class="selling_price">INR 37,500</span>&nbsp; <span class="mrp_price"> inr44,000 </span> &nbsp; <span class="discount">%15 off</span>
                </p>
                <p class="total">Total 23  &nbsp; &nbsp; sum05 &nbsp;&nbsp;<span>R2P</span>
                </p>
                <div class="like_view" >
                <div class="box1" ><i class="ion-ios-eye-outline" style="  color:#afb7af"></i></div>
                    <div class="box2" >&nbsp;321</div>
                    <div class="box3"><i class="ion-android-favorite-outline" style=" color:#afb7af"></i></div>
                    <div class="box4" >&nbsp;321</div>
                </div>
                <div class="action">
                    <div class="col-md-6" style="padding-left:0px; text-align:left;">
                     <a herf="">add to cart</a>
                    
                    </div>
                   <div class="col-md-6">
                    <button type="button" class="my_btn">Buy now</button>
                    </div>
                </div>
            </div></div>
      <div class="swiper-slide"><div class="simcard">
                <p class="number">99-88-99-88-99<span style=" float: right; "><i class="ion-android-favorite-outline" style="color: white;"></i></span>
                </p>
                <p class="pricing"><span class="selling_price">INR 37,500</span>&nbsp; <span class="mrp_price"> inr44,000 </span> &nbsp; <span class="discount">%15 off</span>
                </p>
                <p class="total">Total 23  &nbsp; &nbsp; sum05 &nbsp;&nbsp;<span>R2P</span>
                </p>
                <div class="like_view" >
                <div class="box1" ><i class="ion-ios-eye-outline" style="  color:#afb7af"></i></div>
                    <div class="box2" >&nbsp;321</div>
                    <div class="box3"><i class="ion-android-favorite-outline" style=" color:#afb7af"></i></div>
                    <div class="box4" >&nbsp;321</div>
                </div>
                <div class="action">
                    <div class="col-md-6" style="padding-left:0px; text-align:left;">
                     <a herf="">add to cart</a>
                    
                    </div>
                   <div class="col-md-6">
                    <button type="button" class="my_btn">Buy now</button>
                    </div>
                </div>
            </div></div>
    
    </div>
   
  </div>
          
    
    
    
            </div>
    </div>
        </div>
    </section>
     <!--footer section -->
     <!--footer section -->
     <!--footer section -->
     <!--footer section -->
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