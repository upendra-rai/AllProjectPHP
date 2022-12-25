<html>
<head>
 
    
<?php  $this->load->view('header_link'); ?>
<style type="text/css">
    
    .ui-state-active, .ui-widget-content .ui-state-active, .ui-widget-header .ui-state-active, a.ui-button:active, .ui-button:active, .ui-button.ui-state-active:hover {
    border: 1px solid #003eff00;
    background: #ffffff;
    font-weight: normal;
    color: #6b6a6a;

}
   .ui-state-default, .ui-widget-content .ui-state-default, .ui-widget-header .ui-state-default, .ui-button, html .ui-button.ui-state-disabled:hover, html .ui-button.ui-state-disabled:active {
    border: 1px solid #c5c5c500;
    background: #f6f6f600;
    font-weight: normal;
       color: #454545;}
    .ui-widget-content {
    border-bottom: 1px solid #dddddd;
    background: #ffffff;
    color: #333333;
    }
    </style>
</head>
<body>
    <?php
    $active ='home';
    ?>
     <!--head_bar section -->
     <!--head_bar section -->
     <!--head_bar section -->
     <!--head_bar section -->

    <!--menu_bar section -->
     <!--menu_bar section -->
     <!--menu_bar section -->
     <!--menu_bar section -->
    <?php 
     $this->load->view('menu_bar.php');?>
    
    <section class="popup_box">
        <div class="col-md-12">
        <button type="button" class="my_btn" id="close_popup">x</button>
        </div>
       
        <div class="col-md-12">
        <form>
            <div class="col-md-12">
            <div class="form-group">
                <label>name</label>
                <input type="text" value="" name="" class="form-control" placeholder="">
                
                </div>
            </div>
             <div class="col-md-12">
            <div class="form-group">
                 <label>name</label>
                <input type="text" value="" name="" class="form-control" placeholder="">
                
                </div>
            </div>
             <div class="col-md-12">
            <div class="form-group">
                 <label>name</label>
                <input type="text" value="" name="" class="form-control" placeholder="">
                
                </div>
            </div>
             <div class="col-md-12">
            <div class="form-group">
                 <label>name</label>
                <input type="text" value="" name="" class="form-control" placeholder="">
                
                </div>
            </div>
            
            </form>
        
        
        </div>
        
</section>

    <section class="slider">
     <div class="container" style="width: 100%; ">
        <div class="row">
            <div class="col-md-12" style="padding: 0px;">
                      <div class="slider_notification" >
                         <p>No hidden chagres / No GST India’s first genuine sim store for VIP Numbers!</p>
                        </div>
                     <div class="swiper-container"  style="">
    <div class="swiper-wrapper">
        <?php foreach($banner as $row){ ?>
      <div class="swiper-slide"><img src="<?php echo base_url();  ?>/admin/uploads/app_banner_image/<?php echo $row->banner_img; ?>">
        <div class="slider_content">
          
            <p> Excellent &nbsp;<i class="fa fa-star greenstar"></i><i class="fa fa-star greenstar"></i><i class="fa fa-star greenstar"></i><i class="fa fa-star greenstar"></i><i class="fa fa-star greenstar"></i> &nbsp;<i class="fa fa-star star"></i> &nbsp;Trustpilot</p>
          <p style="font-size:30px;"><?php echo $row->banner_title; ?></p>
            
        
             <form action="" method="post" class="slider_form">
                 <div class="col-md-12 col-xs-12" style="padding-left: 0px;">
                     <ul class="search_by_ul">
                 <li>Anywhere</li>
                      <li>Start with</li>
                      <li>End with </li>
                      <li class="active" id="advance_bt">Advanced</li>
                 </ul></div>  
             <div class="col-md-9 col-xs-9" style="padding-left: 0px;">
                 
                  <input type="text" class="form-control" name="searchbar" id="searchbar" placeholder="Eg. 11111,77777,44444">
             </div>
              <div class="col-md-3 col-xs-3" style="padding-left: 0px;">
                  <button type="button" class="my_btn" style="width:100%">search</button>
             </div>
             </form>

            
          </div></div>
        <?php } ?>
            
     
     
     
    </div>
  </div>
                </div>
      
        </div>
        </div>
    </section>   
 
 
    <!--quick_feature section -->
     <!--quick_feature section -->
     <!--quick_feature section -->
     <!--quick_feature section -->
    <section class="quick_feature">
        <div class="container" style="width: 100%;  text-align: center;">
                <div class="row" style=" width:700px; background-color: #1bb57c; text-align:left; margin:auto; padding: 15px; border-radius: 10px;">
                <div class="col-md-4">
                 <img src="<?php echo base_url();  ?>/files/image/1.PNG" alt="">
                  <p>100% <br> Satisfaction</p>
                </div>    
                <div class="col-md-4">
                  <img src="<?php echo base_url();  ?>/files/image/2.PNG" alt="">
                    <p>India’s Trusted <br> Website</p>
                </div>
                <div class="col-md-4">
                   <img src="<?php echo base_url();  ?>/files/image/3.PNG" alt="">  
                   <p>Multiple Payment <br> Options</p>
                </div>
                </div>
        </div>
    </section>
     <!--vip_number section -->
     <!--vip_number section -->
     <!--vip_number section -->
     <!--vip_number section -->

    <section class="vip_number">
        <div class="container" style="">
    <div class="row">
        <div class="heading">
            <h3>Feature <b>VIP NUMBER</b></h3>
           
        </div>
        </div>
         <div class="row" >
              <?php function sum($num) { 
                        $sum = 0; 
                         for ($i = 0; $i < strlen($num); $i++){ 
                         $sum += $num[$i]; 
                        } 
                          return $sum; 
                   } 
             ?>
            <?php
             foreach($myproduct as $row)
             {
              
                 
                 ?>
                 <div class="col-md-4" style="display:none;">
            <div class="simcard" style="padding:0px;">
                <p class="pricing" style="padding: 5px 15px;"><span class="selling_price">INR <?php  echo $row->product_rate;   ?></span>&nbsp; <span class="mrp_price"> inr<?php echo $row->product_rate* $row->discount_percentage/100; ?> </span> &nbsp; <span class="discount">%<?php  echo $row->discount_percentage;   ?> off</span>
                </p>
                <p class="number" style="font-size:33px; text-align:center; letter-spaccing:2px; color:#89eadd;"><?php  echo $row->product_current_no;   ?><span style=" float: right; "><i class="ion-android-favorite-outline" style="color: white;"></i></span>
                </p>
                
                <p class="total" style="background-color:#222629; font-size:16px; padding:15px; text_align:center;">Total <?php $number_sum =  sum($row->product_current_no); echo $number_sum; ?>   &nbsp; &nbsp; sum <?php  $sum_value = sum(json_encode($number_sum)); echo $sum_value;  ?>  &nbsp;&nbsp;<span>R2P</span>&nbsp;&nbsp;<span style="background-color:#9da6ce;">COD</span>
                </p>
                
                
                
                <div class="action_box">
                    <button type="button" class="my_btn" ><i class="ion-ios-eye-outline" style="  color:#afb7af"></i>32</button>
                    <button type="button" class="my_btn" ><i class="ion-android-favorite-outline" style="  color:#afb7af"></i>32</button>
                    <button type="button" class="my_btn" ><i class="fa fa-shopping-cart"></i></button>
                    <button type="button" class="my_btn" > Buy now </button>
                </div>
                <div class="like_view" style="margin-top:0px; padding-top:0px; padding-left:15px; padding-right:15px; ">
                    <div class="box1" ><i class="ion-ios-eye-outline" style="  color:#afb7af"></i></div>
                    <div class="box2" >&nbsp;<?php  echo $row->user_like;   ?></div>
                    <div class="box3"><i class="ion-android-favorite-outline" style=" color:#afb7af"></i></div>
                    <div class="box4" >&nbsp;<?php  echo $row->user_view;   ?></div>
                </div>
                <div class="action"
                     style="margin-top:0px; padding-top:0px; padding-left:15px; padding-right:15px;">
                    <div class="col-md-6 col-xs-6" style="padding-left:0px; text-align:left;">
                     <a herf="">add to cart</a>
                    
                    </div>
                   <div class="col-md-6 col-xs-6">
                    <button type="button" class="my_btn">Buy now</button>
                    </div>
                </div>
            </div>
            </div>
              <div class="col-md-4" >
            <div class="simcard" >
                <p class="pricing" ><span class="selling_price">INR <?php  echo $row->product_rate;   ?></span>&nbsp; <span class="mrp_price"> inr<?php echo $row->product_rate* $row->discount_percentage/100; ?> </span> &nbsp; <span class="discount">%<?php  echo $row->discount_percentage;   ?> off</span>
                </p>
                <p class="number" ><?php  echo $row->product_current_no;   ?><span style=" float: right; "><i class="ion-android-favorite-outline" style="color: white;"></i></span>
                </p>
                
                <p class="total" >Total <?php $number_sum =  sum($row->product_current_no); echo $number_sum; ?>  &nbsp; &nbsp; sum <?php  $sum_value = sum(json_encode($number_sum)); echo $sum_value;  ?>  &nbsp;&nbsp;<span>R2P</span>&nbsp;&nbsp;<span style="background-color:#9da6ce;">COD</span>
                </p>
                 
                
                 <?php  if(isset($row->cart_item)){ ?>
                
                <div class="like_view"  style="display:block;">
                    <div class="box1" ><i class="ion-ios-eye-outline" style="  color:#afb7af"></i></div>
                    <div class="box2" >&nbsp;<?php  echo $row->user_like;   ?></div>
                    <div class="box3"><i class="ion-android-favorite-outline" style=" color:#afb7af"></i></div>
                    <div class="box4" >&nbsp;<?php  echo $row->user_view;   ?></div>
                </div>
                <?php }  ?>
                
                <?php  if(!isset($row->cart_item)){ ?>
                <div class="action" style="display:block;">
                    <div class="col-md-6 col-xs-6" style="padding-left:0px; text-align:left;">
                        <button type="button" name="add_to_cart" data-product_id="<?php  echo $row->my_product_id;  ?>" style="background-color:#9da6ce; color:black; border:1px solid #9da6ce; border-radius:30px; " >add to cart</button>
                       
                        <!--<a href="<?php echo base_url(); ?>/home/add_to_cart/<?php echo $row->my_product_id; ?>/<?php echo $row->product_rate; ?>">add to cart</a>-->
                    </div>
                   <div class="col-md-6 col-xs-6">
                    <button type="button" class="my_btn">Buy now</button>
                    </div>
                </div>
                
                <?php } ?>
            </div>
            </div>
           <?php  }
             
             
             ?>
           
            </div>
              <div class="box" style="text-align: center; width:100%;"> <button type="button" class="my_btn" style="text-align: center;">view all</button></div>
            
                </div>
           
    </section>
     <!--company_logo section -->
     <!--company_logo  section -->
     <!--company_logo section -->
     <!--company_logo section -->
    <section class="company_logo">
        <div class="sim_image">
        <img src="<?php echo base_url();  ?>/files/image/airtel.PNG" alt="">
        <img src="<?php echo base_url();  ?>/files/image/idea.PNG" alt="">
        <img src="<?php echo base_url();  ?>/files/image/bsnl.PNG" alt="">
        <img src="<?php echo base_url();  ?>/files/image/mtnl.PNG" alt="">
        <img src="<?php echo base_url();  ?>/files/image/vodafone.PNG" alt="">
        </div>
    </section>
     <!--process section -->
     <!--process  section -->
     <!--process section -->
     <!--process section -->
    
        <section class="process">
            <div class="container">
                <div class="row">
        <div class="heading">
            <h3>How to get your very own Exclusive Number</h3>
            <p>Buy an exclusive number in 4 simple steps</p>
        </div>
        </div>
                <div class="row">
        <h3></h3>
       
        <div class="col-md-6" style="">
            <div class="col-md-2 col-xs-2" style="padding-right: 0px;">
                <div class="img_box"> <img src="<?php echo base_url();  ?>/files/image/step1.png" alt=""></div>
           <div class="img_box">
                <img src="<?php echo base_url();  ?>/files/image/step2.png" alt="">
                </div>
                <div class="img_box">
                <img src="<?php echo base_url();  ?>/files/image/step4.png" alt="">
                </div>
                <div class="img_box">
                <img src="<?php echo base_url();  ?>/files/image/step3.png" alt="">
                </div>
            </div>
            <div class="col-md-10 col-xs-10" >
                <div class="steps">
                <ul>
    
                    <li>Pick a number</li>

                    <li>Complete Secure Payment</li>
                
                    <li>Get your unique MNP code</li>
            
                    <li>Get get your sim from any mobile shop</li>
               </ul>
                </div>
            </div>
            </div>

            <div class="col-md-6">
            <video style="width: 100%; height: auto; " controls>
 
  <source src="<?php echo base_url();  ?>/files/video/videoplayback.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
            </div>
                </div>
            </div>
    </section>
     <!--review section -->
     <!--review  section -->
     <!--review  section -->
     <!--review  section -->
    <section class="review">
        <div class="container">
            <div class="row">
       <div class="heading">
            <h3>See what people say about us</h3>
        </div>
            </div>
            <div class="row">
            <div class="col-md-4">
                <div class="rating">
                    <div class="col-md-12" style="margin-bottom: 45px;"><p>Good service,keeping in touch till things happen to<br> you.</p></div>
                
                <div class="col-md-4">
                    <div class="rating_box1">
                  <img src="<?php echo base_url();  ?>/files/image/google.png" alt="">
                </div>
                    </div>
                <div class="col-md-8">
                    <div class="rating_box2">
                     <p style="margin-bottom: 0px;">vetrival vishwanathan</p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <p>click on &nbsp;<a href="" style="color: blue;">Google</a>&nbsp; to verify review.</p>
                    </div>
                </div>
                    
                </div>
            </div>
            <div class="col-md-4">
                <div class="rating">
                    <div class="col-md-12" style="margin-bottom: 45px;"><p>Good service,keeping in touch till things happen to<br> you.</p></div>
                
                <div class="col-md-4">
                    <div class="rating_box1">
                  <img src="<?php echo base_url();  ?>/files/image/google.png" alt="">
                </div>
                    </div>
                <div class="col-md-8">
                    <div class="rating_box2">
                     <p style="margin-bottom: 0px;">vetrival vishwanathan</p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <p>click on &nbsp;<a href="" style="color: blue;">Google</a>&nbsp; to verify review.</p>
                    </div>
                </div>
                    
                </div>
            </div>
                <div class="col-md-4">
                <div class="rating">
                    <div class="col-md-12" style="margin-bottom: 45px;"><p>Good service,keeping in touch till things happen to<br> you.</p></div>
                
                <div class="col-md-4">
                    <div class="rating_box1">
                  <img src="<?php echo base_url();  ?>/files/image/google.png" alt="">
                </div>
                    </div>
                <div class="col-md-8">
                    <div class="rating_box2">
                     <p style="margin-bottom: 0px;">vetrival vishwanathan</p>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <p>click on &nbsp;<a href="" style="color: blue;">Google</a>&nbsp; to verify review.</p>
                    </div>
                </div>
                   </div>
                    </div>
                    <div class="col-md-12" style="padding: 0px 120px;">
                    
                        <div class="col-md-3">
                        <div class="app">
                         <div class="img2">                      
                         <img src="<?php echo base_url();  ?>/files/image/justdial.PNG" alt="">
                         </div>
                            <div class="i_tag" >      
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                           </div>
                           <div class="paragraph" >
                               <p>4.5/5</p>
                           </div>
                        </div>
                                        
                       </div>
                
                <div class="col-md-3">
                        <div class="app">
                         <div class="img2">                      
                         <img src="<?php echo base_url();  ?>/files/image/face.PNG" alt="">
                         </div>
                            <div class="i_tag" >      
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                           </div>
                           <div class="paragraph" >
                               <p>4.5/5</p>
                           </div>
                        </div>
                                        
                       </div>
                <div class="col-md-3">
                        <div class="app">
                         <div class="img2">                      
                         <img src="<?php echo base_url();  ?>/files/image/trustpilot.PNG" alt="">
                         </div>
                            <div class="i_tag" >      
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                           </div>
                           <div class="paragraph" >
                               <p>4.5/5</p>
                           </div>
                        </div>
                                        
                       </div>
                <div class="col-md-3">
                        <div class="app">
                         <div class="img2">                      
                         <img src="<?php echo base_url();  ?>/files/image/google2.PNG" alt="">
                         </div>
                            <div class="i_tag" >      
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                           </div>
                           <div class="paragraph" >
                               <p>4.5/5</p>
                           </div>
                        </div>
                                        
                       </div>
                </div>
            </div>
            </div>
    </section>
    <section class="faqs">
        <div class="container">
            <div class="row">
    <div id="accordion">
            <h3>Various Options and Features</h3>
            <div>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin
        literature from 45 BC, making it over 2000 years old this is the larger one. Phasellus viverra nulla ut metus
        varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper
        ultricies nisi. Nam eget dui. Etiam rhoncus.Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies
        nisi. Nam eget dui. Etiam rhoncus.
        </div>
	       <h3>Exclusive Documentation</h3>
	       <div>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latinliterature from 45 BC, making it over 2000 years old this is the larger one. Phasellus viverra nulla ut metusvarius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorperultricies nisi. Nam eget dui. Etiam rhoncus.Etiam ultricies nisi vel augue. Curabitur ullamcorper ultriciesnisi. Nam eget dui. Etiam rhoncus.</div>
        <h3>Exclusive Documentation</h3>
        <div>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latinliterature from 45 BC, making it over 2000 years old this is the larger one. Phasellus viverra nulla ut metusvarius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorperultricies nisi. Nam eget dui. Etiam rhoncus.Etiam ultricies nisi vel augue. Curabitur ullamcorper ultriciesnisi. Nam eget dui. Etiam rhoncus.</div>
    
                </div>   
            </div>
</div>
    
    
    
    
    </section>
    <!--client section -->
    <!--client section 
    <!--client section -->
    <!--client section -->
    <section class="our_client">
        <div class="container">
            <div class="row">
        <div class="heading">
            <h3>Our Client</h3>
        </div>
                 </div>
            <div class="row" style="overflow:hidden;">
            <div class="slider_notification">
                    <div class="swiper-container1" >
    <div class="swiper-wrapper">
      <div class="swiper-slide"> <img src="<?php echo base_url();  ?>/files/image/img1.png" alt=""></div>
      <div class="swiper-slide"><img src="<?php echo base_url();  ?>/files/image/img2.png" alt=""></div>
      <div class="swiper-slide"><img src="<?php echo base_url();  ?>/files/image/img3.png" alt=""></div>
      <div class="swiper-slide"><img src="<?php echo base_url();  ?>/files/image/img4.png" alt=""></div>
    
    </div>
    
  </div>
            
    </div>
            </div>
        </div>
    </section>
    
    <!--contact section -->
    <section class="contact_us" style="background-color: #ececec;">
       <div class="container">
             <div class="row">
       <div class="heading">
            <h3>Feel free contact us</h3>
        </div>
            </div>
        
            <div class="col-md-6" style="padding-top: 100px;">
      

        <form >
            <div class="col-md-6">
                <div class="form-group">
                   <input class="form-control" type="text"  name="NAME" placeholder="NAME"><br>  
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <input class="form-control" type="text"  name="NAME" placeholder="Mobile Number"><br>  
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <textarea class="form-control" name="" placeholder="Your choice - what does this mean?" style="height: 100px; "></textarea>
                   
                </div>
            </div>
            <div class="col-md-12" style="text-align: center;">
                <div class="form-group">
                       <button type="button" class="my_btn">submit</button>
                </div>
            </div>
        
     
        </form>
            
        </div>
    </div>
    </section>
    
     <!--footer section -->
     <!--footer section -->
     <!--footer section -->
     <!--footer section -->
    <?php  $this->load->view('footer.php'); ?>
     <?php  $this->load->view('footer_script.php'); ?>
<script>
    var swiper = new Swiper('.swiper-container');
         
     $( "#accordion" ).accordion();
        
         
         $(document).ready(function(){
             var window_width = $(window).width();
             if(window_width < 700){
                 var swiper = new Swiper('.swiper-container1', {
                  slidesPerView: 1,
                  slidesPerColumn: 1,
                  spaceBetween: 30,
                  pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                  },
                });
             }else{
                 var swiper = new Swiper('.swiper-container1', {
                  slidesPerView: 3,
                  slidesPerColumn: 1,
                  spaceBetween: 30,
                  pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                  },
                });
             }
             
             $('#sidebar_bt').click(function(){
                $('.sidebar').toggle(); 
             });
             
             $('#advance_bt').click(function(){
                    $('.popup_box').toggle();
         
                                    });
             $('#close_popup').click(function(){
                 $('.popup_box').hide();
             });
             $('input[name=header_searchbar]').click(function(){
                 
                 var selectedoptions= $('select[name=header_search_by]').val();
                
                 
                 if(selectedoptions ==='advanced') {
                      $('.popup_box').show();
                 }
                 
                
             });
             
             
    function count_cart(){
        
            $.ajax({
				type: "POST",
				url: '<?php echo base_url(); ?>/home/count_cart',

				success: function(data){
                    if(Number(data)){
                        
                        $('.count_cart_item').html(data);
                    }
				},
               error: function(XMLHttpRequest, textStatus, errorThrown) {
                 
                 }


			   });
        
     }   count_cart();      
             
     $(document).on('click','button[name=add_to_cart]',function(){
                 var product_id = $(this).data('product_id');
                
                 $.ajax({
				type: "POST",
				url: '<?php echo base_url(); ?>/home/add_to_cart',

				data:{
                       product_id:product_id,
					},
				success: function(data){

                    if(data === 'success'){
                        
                         $('.alert_cart').slideDown();
                        count_cart();     
                        setTimeout(function(){  $('.alert_cart').slideUp(); }, 1000);
                        
                    }
				},
               error: function(XMLHttpRequest, textStatus, errorThrown) {
                 
                 }


			   });
    
                
             });
             
         });
  </script>
</body>
            </html>