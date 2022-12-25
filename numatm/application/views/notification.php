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
            <div class="col-md-3" style="text-align:center;">
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
                 <table class="table table-bordered">
                     <?php foreach($notification as $row){
                 
                 ?>
             <tr style="border-bottom:1px solid black; padding-bottom:20px;">
                 
             <td><i class="ion-android-mail" style="color:<?php if($row->notification_status=='read'){echo 'green';} else{echo 'red'; }?>;"></i></td>
                 <td><a href="<?php echo base_url(); ?>/customer/read_notification/<?php echo $row->notification_id;  ?>" style="color:blue;"><?php echo $row->title; ?></a></td>
             <td><?php echo $row->notification_date; ?></td>
                </tr>
                    
                     <?php
              }  
                     ?>
                 </table>
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