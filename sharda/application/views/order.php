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
  <?php $this->load->view('menu_bar');  ?>

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
                 <div  class="box_shadow">
                 <div class="heading">
             <h4><b>Order</b></h4>
                 </div>
                 <table class="table table-bordered">
                 <thead class="main_heading">
                     <tr>
                        <th>Date</th>
                         <th>Number</th>
                         <th>Amount</th>
                         <th>Status</th>
                         <th>Download Bills</th>
                         <th>View Details</th>
                     
                     </tr>
                </thead>
                 <tbody class="order_details">
                     <?php foreach($order_history as $row){ ?>
                     <tr>
                      <td><?php echo  date('d-M-Y h:i:a',strtotime($row->online_order_date)) ; ?></td>
                      <td><?php   echo $row->product_current_no; ?></td>
                      <td><?php   echo $row->paid_amount; ?></td>
                      <td><?php   echo $row->order_status; ?></td>
                      <td><button type="button" class="my_btn" style=" padding: 0px 10px; height:28px; font-size:13px; "><i class="fa fa-download"></i> Download</button></td>
                      <td><i class="fa fa-eye"></i></td>
                     </tr>
                    <?php }?>
                    
                     
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