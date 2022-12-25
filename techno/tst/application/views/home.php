<!DOCTYPE html>
<html>
<head>
    <title>Demo</title>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
  #about{
    text-align: center;
    padding: 30px 50px;
  }

   #about .my_img{

    width:100%;
    height:auto;
    border:2px solid red;

   }

   #about .box{

      width: 100%;
      height: auto;
      background-color: pink;
      padding: 20px;
      text-align: center;

   }
</style>
</head>
<body>

    <section  id="about">
        <div class="container" style="background-color: blue; padding: 50px;">
            <div class="row">
                    <header class="section-header">
                    <h3>ABOUT US</h3>


                    <h5>We Welcome you to Ackko Technosoft Solutions.</h5>
                    <p>We are a truly worldwide, value driven, customer focussed, fast growing IT company located at Bhopal (MP), India. In service offering, we provide web designing and development, custom websites solutions, desktop and mobile application solutions with the range of organizations, from small consultancies and organisations to large companies
                    </p>
                    <button class="btn btn-primary">Read More</button>
                    </header><br><br>
            </div>
             
             <div class="row" style="background-color: green; padding: 20px;">
                   <div class="col-md-4" style=" background-color: red;  border:1px solid purple;">
                        <div class="box">
                                  <div class="image">
                                    <img src="<?php echo base_url();?>/images/burger.jpg" alt="Image" class="my_img">
                                  </div>
                                  <h2 class="title">
                                    <a href="">Our Mission</a>
                                  </h2>
                                  <p>Ackko Technosoft Pvt ltd was founded by an IT Professional with zeal to provide quality and prompt delivery to the customers of the local market at the Bhopal city</p>
                        </div>
                    </div>
                     <div class="col-md-4" style="background-color: red; border:1px solid purple;">
                            <div class="box">
                                  <div class="image">
                                    <img src="<?php echo base_url();?>/images/burger.jpg" alt="Image" class="my_img">
                                  </div>
                                  <h2 class="title">
                                    <a href="">Our Mission</a>
                                  </h2>
                                  <p>Ackko Technosoft Pvt ltd was founded by an IT Professional with zeal to provide quality and prompt delivery to the customers of the local market at the Bhopal city</p>
                        </div>
                   </div>
                    <div class="col-md-4" style=" background-color: red; border:1px solid purple;">
                           <div class="box">
                                  <div class="image">
                                    <img src="<?php echo base_url();?>/images/burger.jpg" alt="Image" class="my_img">
                                  </div>
                                  <h2 class="title">
                                    <a href="">Our Mission</a>
                                  </h2>
                                  <p>Ackko Technosoft Pvt ltd was founded by an IT Professional with zeal to provide quality and prompt delivery to the customers of the local market at the Bhopal city</p>
                        </div>
                   </div>
                  
                   


             </div>



        </div>
    </section>


   
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>