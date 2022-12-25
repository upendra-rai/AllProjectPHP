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
     <section class="login_profile">
         <div class="container">
             <div class="row">
        <div class="col-md-12">
            <div class="col-md-3" style="text-align:center;">
          <?php $this->load->view('customer_sidebar'); ?> 
            </div>
       
        
             <form>
                 <div class="container">
                <div class="col-md-9">
                    <div  class="box_shadow" style="padding-left:25px; padding-right:25px; padding-top:25px;">
                <div class="form-group">
                     <p>NAME</p> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                    <input type="text" name="name" value="<?php  echo $selected_customer[0]->customer_name; ?>" class="form-control" placeholder="">
                 </div>
                 <div class="form-group">
                     <p>Email id</p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                     <input type="text" name="emailid" value="<?php  echo $selected_customer[0]->customer_email; ?>" class="form-control" placeholder="">
                 </div>
                <div class="form-group">
                     <p>Mobile No.</p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="text" name="name" value="<?php  echo $selected_customer[0]->customer_mobile; ?>" class="form-control" placeholder="">
                 </div>
                 <div class="form-group">
                     <p>Gender</p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                     <input type="radio" name="gender" value="male" placeholder="" style="display:inline-block;"  <?php if($selected_customer[0]->gender=='male'){echo 'checked';} ?> >Male
                     <input type="radio" name="gender" value="female" placeholder="" style="display:inline-block;" <?php if($selected_customer[0]->gender=='female'){echo 'checked';} ?> >Female
                     
                 </div>
                <div class="form-group">
                     <p>DOB</p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="date" name="name" value="<?php  echo $selected_customer[0]->dob; ?>" class="form-control" placeholder="">
                 </div>
                <div class="form-group">
                     <p>Address</p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="text" name="name" value="<?php  echo $selected_customer[0]->customer_address; ?>" class="form-control" placeholder="">
                 </div>
                <div class="form-group">
                     <p>City</p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <input type="text" name="name" value="<?php  echo $selected_customer[0]->city; ?>" class="form-control" placeholder="">
                 </div>
                 <div class="form-group">
                     <p>State</p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; 
                     <input type="text" name="name" value="<?php  echo $selected_customer[0]->state; ?>" class="form-control" placeholder="">
                 </div>
                 <div class="form-group">
                     <p>Country</p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                     <input type="text" name="name" value="<?php  echo $selected_customer[0]->country; ?>" class="form-control" placeholder="">
                 </div>
                 </div>
                 </div>
                 </div>
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
    
    