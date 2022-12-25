<html>
<head>
<title> Terms_conditions</title>
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
     <section class="login_profile" style="padding-top:20px;">
         <div class="container">
             <div class="row">
             
          <div class="col-md-12" style="background-color:white;">
            <div class="col-md-3">
          <?php $this->load->view('customer_sidebar') ;?>
            </div>
        
         <div class="col-md-9">
              <div class="box_shadow">
                  <div class="row">
                      
              <div class="col-md-12">
                  <div class="heading">
             <h4 style="text-align:left;"><b>Notifications</b></h4>
                 </div>
             </div>
                          
             <div>
                 <div class="col-md-12">
                 <div class="message">
                     <h3><?php  echo $selected_notification[0]->title; ?></h3>
                     <p style="font-size:16px;"><?php  echo $selected_notification[0]->message; ?></p>
                     
                     </div>
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