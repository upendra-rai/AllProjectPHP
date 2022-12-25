<html>
<head>
<title> order</title>
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
     <section class="login_profile">
         <div class="container">
         <div class="row">
         <div class="col-md-12" style="background-color:white;">
        <div class="col-md-3" style="text-align:center;">
<?php $this->load->view('customer_sidebar'); ?>
        </div>
             <div class="col-md-9">
                 <div  class="box_shadow">
                 <div class="heading">
             <h4><b>My Wallet</b></h4>
                 </div>
                 <table class="table table-bordered">
                 <thead>
                     <tr>
                        <th>Wallet Balance</th>
                         <th><?php echo $selected_customer[0]->balance_amount; ?></th>
                         <td><button type="button" class="my_btn" style="background-color:#faad46; border-radius:20px; width:auto;">+Add Money</button></td>
                    </tr>
                </thead>
                 <tbody>
                     <tr>
                      <th>Date</th>
                      <th>payment id</th>
                      <th>payment method</th>
                      <th>Amount</th>
                     </tr>
                     <?php
                     foreach($payments as $row){
                     ?>
                     <tr>
                      <td><?php echo $row->payment_create_at;  ?></td>
                      <td><?php echo $row->payment_id;  ?> </td>
                      <td><?php echo $row->payment_method_name;  ?></td>
                      <td><?php echo $row->amount;  ?></td>
                     </tr>
                     <?php } ?>
                     
                 </tbody>
                 </table>
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