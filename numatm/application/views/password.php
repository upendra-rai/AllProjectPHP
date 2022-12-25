<html>
<head>
<title> login</title>
     <?php $this->load->view('header_link'); ?>
    </head>
<body>
        <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
  <?php $this->load->view('menu_bar'); ?>

        <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
    
    <section class="login_profile" style="background-color:white; padding-top:30px;">
        <div class="container">
            <div class="row">
            
        <div class="col-md-12" style="background-color:white;">
            <div class="col-md-3" style="text-align:center;">
          <?php $this->load->view('customer_sidebar'); ?>
            </div>
        
        <div class="container">
    <div class="col-md-9">
        <div class="box_shadow">
            <div class="row">
                <div class="col-md-12">
                <div class="heading">
             <h4 style="text-align:left;"><b>Change password</b></h4>
        </div>
                </div>
                 <div class="col-md-12" style="padding-top:16px;">
                     <?php if (isset($msg)){if($msg=='wrong_password'){?> 
            <p style="width:100%; height:37px; background-color:red; color:white; text-align:center; padding:5px; font-size:18px; border-radius:20px;">current password is wrong</p>
           <?php
                }else if($msg=='success'){?>
                    <p style="width:100%; height:37px; background-color:#1ebd1a; color:white; text-align:center; padding:5px; font-size:18px; border-radius:20px;">password successfully updated</p>
               <?php } }?>
        <form action="" method="post">
           
          <div class="form-group">
            <input type="password" name="current_password" value="" class="form-control" placeholder="Current Password" style="border-radius:18px; padding-bottom:15px; padding-top:15px;">
            </div>
            <div class="form-group">
            <input type="password" name="new_password" value="" class="form-control"  placeholder="Change Password" style="border-radius:18px; padding-bottom:15px; padding-top:15px;">
            </div>
            <div class="form-group">
            <input type="submit" class="my_btn" name="submit" value="continue" style="border-radius:30px;">
            </div>
        
           
        </form>
                </div>
        </div>
            </div>
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
   <?php $this->load->view('footer'); ?>
     <?php $this->load->view('footer_script') ; ?>
</body>
</html>
        