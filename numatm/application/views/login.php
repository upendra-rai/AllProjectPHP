<html>
<head>
   <title>signup page</title> 
     <?php  $this->load->view('header_link'); ?>
    
    </head>
<body>
       <!--head_bar section -->
     <!--head_bar section -->
    <!--head_bar section -->
     <!--head_bar section -->
  <?php  $this->load->view('menu_bar'); ?>
    
    <section class="signup" style="background-color: white;">
       <div class="container" style="width:100%; padding:0px;">
           <div class="row">
        <div class="col-md-6">
        <div class="loginimg">
        
            </div>
        </div>
        <div class="col-md-6" style="margin-top: 50px; text-align: center; padding-left: 100px; padding-right: 100px;" >
            <?php if (isset($msg)){if($msg=='wrong_user'){?> 
            <p style="width:100%; height:37px; background-color:red; color:white; text-align:center; padding:5px; font-size:18px; border-radius:20px;">wrong username or password</p>
           <?php
} }
            ?>
            <form action="" method="post">
                <div class="form-group">
                 <h1 class="signup_head"> Sign In </h1>
                </div>
                
                <div class="form-group">
                   <input class="form-control" type="number"  name="mobileno" placeholder="Mobile number">  
                </div>
                <div class="form-group">
                    <input class="form-control" type="password"  name="password" placeholder="Password"> <a herf="" style=" width:100%; color:red; text-align: right; float:right;">forgot password</a>  
                </div>
                
                <input type="submit" name="submit" class="my_btn" value="sign-in" style="text-align: center; margin-top: 30px; margin-bottom: 15px;">
                <p class="signup_para" style="padding:8px 40px; font-size: 14px;">not registered? &nbsp; <a href="<?php echo base_url(); ?>/customer/signup" style="color: red; ">sign up here</a></p>
                
                
                
                
                    
            </form>
            </div>
           </div>
       
        </div>
        
            </section>

    <!--footer section -->
     <!--footer section -->
     <!--footer section -->
     <!--footer section -->
     <?php $this->load->view('footer'); ?>
     <?php $this->load->view('footer_script') ; ?>
    </body>

</html>