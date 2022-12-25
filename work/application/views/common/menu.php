<section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>


          <?php  foreach($list1 as $row) {?>

            <div class="food-menu-box">
                <div class="food-menu-img">

                    <img src="<?php echo base_url(); ?>template/images/<?php echo $row->food_image; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h4><?php echo $row->food_type; ?></h4>
                    <p class="food-price"><?php echo $row->food_price; ?></p>
                    <p class="food-detail">
                      <?php echo $row->food_descripation; ?>
                    </p>
                    <br>
               
                    <a href="order.html" class="btn btn-primary">Order Now</a>
                </div>
            </div>
                   <?php }?>

            


            <div class="clearfix"></div>

            

        </div>

        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>