 <section class="head_bar">
    <div class="container" style="width: 100%; ">
    <div class="row">
        <div class="col-md-3">
        <img src="<?php echo base_url();  ?>/files/image/logo2.png" class="logo" alt="" style="height:42px; width:auto;">
 <button type="button" class="my_btn" id="sidebar_bt" style="float:right; background-color: transparent;"><i class="fa fa-bars"> </i></button>
        </div>
        
         <div class="col-md-6">
             <form action="" method="post">
             <div class="col-md-9 col-xs-9" style="padding-right: 10px;">
                 <select class="form-control" id="search_by" name="header_search_by">
                     <option value="Anywhere">Anywhere</option>
                     <option value="startwith">Start with</option>
                     <option value="endwith">End With</option>
                     <option value="advanced">Advanced</option>
                 </select>
                  <input type="text" class="form-control" name="header_searchbar" id="searchbar" placeholder="Eg. 11111,77777,44444">
             </div>
              <div class="col-md-3 col-xs-3" style="padding-left: 0px;">
                  <button type="button" class="my_btn">search</button>
             </div>
             </form>

        </div>
         <div class="col-md-3 cart_box" >
             <a href="<?php echo base_url(); ?>/cart"><i class="ion-ios-cart-outline"></i></a> &nbsp; &nbsp;
             <a href=""> <i class="ion-android-favorite-outline"></i></a> &nbsp; &nbsp; &nbsp;
             <p><a href="">Login</a> / <a href="<?php echo base_url(); ?>/signup">Signup</a> </p>

        </div>
        <div class="sidebar" >
            
        <ul style="padding-left:0px; float:left;">
            <li><a href="<?php echo base_url(); ?>/home">Home</a></li>
            <li><a href="<?php echo base_url(); ?>/store">Store</a></li>
            <li><a href="<?php echo base_url(); ?>/knowyournumber">Know your Number</a></li>
            <li><a href="<?php echo base_url(); ?>/aboutus">About_Us</a></li>
            <li><a href="<?php echo base_url(); ?>/enquirynow">Enquiry Now</a></li>
            <li><a href="<?php echo base_url(); ?>/home">Contact Us</a></li>
            
            </ul>
        
        
        </div>
        
        </div>
    </div>
</section>
<?php if(!isset($active)){$active='';} ?>
<section class="menu_bar">
<div class="menu">
<ul>
    <a href="<?php echo base_url(); ?>/home"><li class="<?php if($active == 'home'){ echo 'active';} ?>">Home  </li></a>
    <a href="<?php echo base_url(); ?>/store"><li class="<?php if($active == 'store'){ echo 'active';} ?>">Store</li></a>
    <a href="<?php echo base_url(); ?>/knowyournumber"><li class="<?php if($active == 'knowyournumber'){ echo 'active';} ?>">Know your Number</li></a>
    <a href="<?php echo base_url(); ?>/aboutus"><li class="<?php if($active == 'about'){ echo 'active';} ?>">About company</li></a>
    <a href="<?php echo base_url(); ?>/enquiry"><li class="<?php if($active == 'enquiry'){ echo 'active';} ?>">Enquiry Now</li></a>
    <a href=""><li class="<?php if($active == 'contact'){ echo 'active';} ?>">Contact Us</li></a>
    </ul>
</div>
   
</section>

<button type="button" class="chatbox_bt"><img src="<?php  echo base_url(); ?>/files/image/whatsapp.png" alt=""></button>