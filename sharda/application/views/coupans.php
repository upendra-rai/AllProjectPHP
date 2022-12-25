<html>
<head>
<title> order</title>
     <?php $this->load->view('header_link');  ?>
    </head>
<body>
        <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
  <?php include('menu_bar.php'); ?>

        <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
      <section class="login_profile" style=background-color:white;>
          <div class="container">
          <div class="row">
        <div class="col-md-12" style="background-color:white;">
            <div class="col-md-3" style="text-align:center;">
            <?php $this->load->view('customer_sidebar'); ?>
            </div>
        
          <div class="col-md-9">
               <div class="box_shadow"> 
              <div class="row">
             <div class="col-md-12">
                  <div class="heading">
             <h4 style="text-align:left;"><b>coupans</b></h4>
                 </div>
             </div>
                  <?php foreach($coupans as $row){?>
              <div class="col-md-4">
                  <div class="coupans">
                      <p><b style="font-size:18px;"><?php if(json_decode($row->promo_discount)->type == 'rupee'){ echo json_decode($row->promo_discount)->value.' rs';  }else if(json_decode($row->promo_discount)->type == 'percent'){echo json_decode($row->promo_discount)->value.' %';} ?> off</b><br><?php echo $row->promo_detail; ?> </p>
                     <button type="button" class="my_btn" style="border-radius:30px;">Apply</button>
                  </div>
              </div><?php } ?>
               
                 
              </div>
              </div>
              
              
              
              
              </div>
          
        
          
          </div>
              </div></div>
    </section>
            <!--footer section -->
          <!--footer section -->
          <!--footer section -->
          <!--footer section -->
    
    <?php $this->load->view('footer'); ?>
     <?php $this->load->view('footer_script') ; ?>
</body>
</html>