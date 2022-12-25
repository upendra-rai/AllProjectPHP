 <section class="head_bar">
    <div class="container" style="width: 100%; ">
    <div class="row">
        <div class="col-md-3">
        <img src="image/logo2.png" class="logo" alt="" style="height:48px; width:auto;">
 <button type="button" class="my_btn" id="sidebar_bt" style="float:right; background-color: transparent;"><i class="fa fa-bars"> </i></button>
        </div>
        
         <div class="col-md-6">
             <form action="" method="post">
             <div class="col-md-9 col-xs-9" style="padding-right: 10px;">
                 <select class="form-control" id="search_by" name="search_by">
                     <option value="Anywhere">Anywhere</option>
                     <option value="Anywhere1">Anywhere1</option>
                     <option value="Anywhere2">Anywhere2</option>
                     <option value="Anywhere3">Anywhere3</option>
                 </select>
                  <input type="text" class="form-control" name="searchbar" id="searchbar" placeholder="Eg. 11111,77777,44444">
             </div>
              <div class="col-md-3 col-xs-3" style="padding-left: 0px;">
                  <button type="button" class="my_btn">search</button>
             </div>
             </form>

        </div>
         <div class="col-md-3 cart_box" >
             <a href="cart.php"><i class="ion-ios-cart-outline"></i></a> &nbsp; &nbsp;
             <a href=""> <i class="ion-android-favorite-outline"></i></a> &nbsp; &nbsp; &nbsp;
             <p><a href="">Login</a> / <a href="signup.php">Signup</a></p>

        </div>
        <div class="sidebar">
            
        <ul>
            <li>Home</li>
            <li>Store</li>
            <li>Know your Number</li>
            <li>About_Us</li>
            <li>Enquiry Now</li>
            <li>Contact Us</li>
            
            </ul>
        
        
        </div>
        
        </div>
    </div>
</section>
<?php if(!isset($active)){$active='';} ?>
<section class="menu_bar">
<div class="menu">
<ul>
    <a href="index.php"><li class="<?php if($active == 'home'){ echo 'active';} ?>">Home</li></a>
    <a href="store.php"><li class="<?php if($active == 'store'){ echo 'active';} ?>">Store</li></a>
    <a href="knownum.php"><li class="<?php if($active == 'about'){ echo 'active';} ?>">Know your Number</li></a>
    <a href="aboutus.php"><li class="<?php if($active == 'about'){ echo 'active';} ?>">About company</li></a>
    <a href="enquirynow.php"><li class="<?php if($active == 'enquiry'){ echo 'active';} ?>">Enquiry Now</li></a>
    <a href=""><li class="<?php if($active == 'contact'){ echo 'active';} ?>">Contact Us</li></a>
    </ul>
</div>
   
</section>