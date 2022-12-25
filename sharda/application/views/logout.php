<html>
<head>
<title> login</title>
     <?php  $this->load->view('header_link');?>
    </head>
<body>
        <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
  <?php  $this->load->view('menu_bar'); ?>

        <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
    
    <section class="login_profile" style=background-color:white;>
        <div class="container">
            <div class="row">
           
        <div class="col-md-12" style="background-color:white;">
            <div class="col-md-3">
           <?php $this->load->view('customer_sidebar'); ?>
            </div>
            <div class="col-md-9" style="background-color:#e2e3e2; padding:200px; height:500px;">
                 <p style="font-size:16px;"><b>you have been log out</b></p>
                <button type="button" style="background-color:#2765b1; width:90px; border-radius:10px; color:white;">Logout</button>
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