<html>
<head> 
    
<title>store page</title>
    <link href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    
 <?php include('header_link.php');?>
    </head>
    <body>
        <?php
    $active ='store';
    ?>
          <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
          <!--head_bar section -->
  <?php include('menu_bar.php'); ?>
         <!--main_img section -->
          <!--main_img section -->
          <!--main_img section -->
          <!--main_img section -->
        <section>
        <div class="container" style="width:100%; padding:0px;">
            <div class="main_img">
           <img src="<?php echo base_url(); ?>files/image/main1.png" style="width:100%;"> 
            </div>
        </div>
        </section>
          <!--price_range section -->
          <!--price_range section -->
         <!--price_range section -->
          <!--price_range section -->
        <div class="filter" style=" ">
                <button type="button" class="my_btn">filter</button>
                </div>
        <section class="price_range">
        <div class="container" style="width:100%; padding:10px; ">
            <div class="col-md-12 mobo_side_filter" >
                    
                <div class="form-group"> 
                    <select class="form-control">
                         <option>anywhere</option>
                         <option>anywhere</option>
                    </select>
                
                </div>
                <div class="form-group" style="position: relative;">
                <input type="text" value="" name="" class="form-control" placeholder="type here to search">
                    <span  style="position: absolute; top:10px; right:18px; "><i class="fa fa-search"></i></span>
                
                </div>
                <div class="sort">
                <p style="font-size:15px;">sort by  | price low to high | price high to low</p>
                
                
                </div>
                
            </div>
            
            <div class="col-md-3 side_filter" >
              <div class="content">
                  <div class="image_box">
                   <img src="<?php echo base_url(); ?>files/image/gurantee.png" alt="">
                  </div>
                  <div class="box">
                      <p>Total / sum </p>
                      <div class="col-md-7" style="padding-left:0px; ">
                      <div class="form-group">
                        <input class="form-control" type="text"  name="NAME" placeholder="total"> 

                      </div>
                      </div>
                       <div class="col-md-5" style="padding:0px; ">
                           <button type="button" class="my_btn">submit</button>
                      </div>
                      <div class="col-md-7" style="padding-left:0px; ">
                      <div class="form-group">
                        <input class="form-control" type="text"  name="NAME" placeholder="total"> 

                      </div>
                      </div>
                       <div class="col-md-5" style="padding:0px; ">
                           <button type="button" class="my_btn">submit</button>
                      </div>
                      <div>
                          
                      </div>
                  </div>
                  <div class="box" style="height:100px;">
                      <p>price range </p>
                      <div class="col-md-6" style="padding-left:0px; ">
                      <div class="form-group">
                        <input class="form-control" type="text"  name="NAME" placeholder="total"> 

                      </div>
                      </div>
                       <div class="col-md-6" style="padding:0px; ">
                            <input class="form-control" type="text"  name="NAME" placeholder="total"> 
                      </div>
                      
                  </div>
                  <div class="box" style="height:130px;">
                      <p>Extra </p>
                      <div class="col-md-12" style="padding-left:0px; ">
                      <div class="form-group" style="margin-bottom: 2px;">
                        <input class="my_checkbox" type="checkbox"  name="NAME" placeholder="total" checked> 
                        <label>best seller</label>
                      </div>
                          <div class="form-group" style="margin-bottom: 2px;">
                        <input class="my_checkbox" type="checkbox"  name="NAME" placeholder="total"> 
                        <label>Coming soon</label>
                      </div>
                          <div class="form-group" style="margin-bottom: 2px;">
                        <input class="my_checkbox" type="checkbox"  name="NAME" placeholder="total"> 
                        <label>COD</label>
                      </div>
                      </div>
                       
                      
                  </div>
                  <div class="box" style="height:150px;">
                      <p>Extra </p>
                      <div class="col-md-12" style="padding-left:0px; ">
                      <div class="form-group" style="margin-bottom: 2px;">
                        <input class="my_checkbox" type="checkbox"  name="NAME" placeholder="total"> 
                        <label>6</label>
                      </div>
                          <div class="form-group" style="margin-bottom: 2px;">
                        <input class="my_checkbox" type="checkbox"  name="NAME" placeholder="total"> 
                        <label>7</label>
                      </div>
                          <div class="form-group" style="margin-bottom: 2px;">
                        <input class="my_checkbox" type="checkbox"  name="NAME" placeholder="total"> 
                        <label>8</label>
                      </div>
                          <div class="form-group" style="margin-bottom: 2px;">
                        <input class="my_checkbox" type="checkbox"  name="NAME" placeholder="total"> 
                        <label>9</label>
                      </div>
                      </div>
                       
                      
                  </div>
                  <div class="box" style="height:372px;">
                      <p>Extra </p>
                      <div class="col-md-12" style="padding-left:0px; ">
                          <?php foreach($category_list as $row){
                            ?>
                          
                          <div class="form-group" style="margin-bottom: 2px;">
                          
                          
                          <label class="red_checkbox" name="category_check" for="cat<?php echo $row->category_id; ?>" data-cat_id="<?php echo $row->category_id; ?>"  ><i class="fa fa-check"></i></label>
                          <input class="my_checkbox" value="<?php echo $row->category_id; ?>"  id="cat<?php echo $row->category_id; ?>" type ="checkbox"  name="NAME" placeholder="total" > 
                           <label><?php echo $row->category_name; ?></label>
                              
                              <div class="sub_menu" style="padding-left:15px; display:none; ">
                                  <?php  foreach(json_decode($row->sub_cat) as $cat_row ){  ?>
                                  <div class="form-group" style="margin-bottom:0px;">
                                       <label class="red_checkbox" name="subcategory_check" for="subcat<?php echo $cat_row->sub_category_id; ?>" data-sub_cat_id="<?php echo $cat_row->sub_category_id; ?>" ><i class="fa fa-check"></i></label>
                                     <input class="my_checkbox" id="subcat<?php echo $cat_row->sub_category_id; ?>" type ="checkbox"  name="subcategory"  style=""> 
                                     <label><?php echo $cat_row->sub_category_name; ?></label>
                                  </div>
                                  
                                  <?php } ?>
                                  
                              </div>
                          </div>
                          
                         <?php  }
                          
                          ?>
                    
                        
                      </div>
                       
                      
                  </div>
                  <div class="box" style="height:150px;">
                      <p>number </p>
                      <div class="col-md-12" style="padding-left:0px; ">
                      <div class="form-group" style="margin-bottom: 2px;">
                        <input class="my_checkbox" type="checkbox"  name="NAME" placeholder="total"> 
                        <label>5%</label>
                      </div>
                          <div class="form-group" style="margin-bottom: 2px;">
                        <input class="my_checkbox" type="checkbox"  name="NAME" placeholder="total"> 
                        <label>10%</label>
                      </div>
                          <div class="form-group" style="margin-bottom: 2px;">
                        <input class="my_checkbox" type="checkbox"  name="NAME" placeholder="total"> 
                        <label>15%</label>
                      </div>
                          <div class="form-group" style="margin-bottom: 2px;">
                        <input class="my_checkbox" type="checkbox"  name="NAME" placeholder="total"> 
                        <label>20%</label>
                      </div>
                      </div>
                       
                      
                  </div>
                  </div>
                </div>
            <div class="col-md-9 numbers_box"  >
                <div class="col-md-12">
                <div class="offers">
                  <div class="swiper-container1" >
                        <div class="swiper-wrapper">
                          <div class="swiper-slide"> <img src="<?php echo base_url(); ?>files/image/offer2.jpg" alt=""></div>
                          <div class="swiper-slide"><img src="<?php echo base_url(); ?>files/image/offer2.jpg" alt=""></div>
                          <div class="swiper-slide"><img src="<?php echo base_url(); ?>files/image/offer2.jpg" alt=""></div>
                          <div class="swiper-slide"><img src="<?php echo base_url(); ?>files/image/offer2.jpg" alt=""></div>

                        </div>
                      </div>
                       
                      </div>
                    </div>
                <div class="col-md-12">
                
                   <select class="form-control" style="width:220px; height:30px; margin-bottom:25px; border-radius:5px;" id="filter_searchby">
                    <option>sort by</option>
                    <option>sort by</option>
                       <option>sort by</option>
                       <option>sort by</option>
                    
                    </select>
                </div>
                 
                <div class="number_box">
                <?php
                foreach($product_list as $row){
                    ?>
                    <div class="col-md-4">
         
            <div class="simcard">
                <p class="number">99-88-99-88-99<span style=" float: right; "><i class="ion-android-favorite-outline" style="color: white;"></i></span>
                </p>
                <p class="pricing"><span class="selling_price">INR 37,500</span>&nbsp; <span class="mrp_price"> inr44,000 </span> &nbsp; <span class="discount">%15 off</span>
                </p>
                <p class="total">Total 23  &nbsp; &nbsp; sum05 &nbsp;&nbsp;<span>R2P</span>
                </p>
                <div class="like_view" >
                    <div class="box1" ><i class="ion-ios-eye-outline" style="  color:#afb7af"></i></div>
                    <div class="box2" >&nbsp;321</div>
                    <div class="box3"><i class="ion-android-favorite-outline" style=" color:#afb7af"></i></div>
                    <div class="box4" >&nbsp;321</div>
                </div>
                <div class="action">
                    <div class="col-md-6" style="padding-left:0px; text-align:left;">
                     <a herf="">add to cart</a>
                    
                    </div>
                   <div class="col-md-6">
                    <button type="button" class="my_btn">Buy now</button>
                    </div>
                </div>
            </div>
            </div>
             <?php   }
                ?>
                </div>
            </div>
            
            </div>
        </section>
         
       
            
               <!--footer section -->
               <!--footer section -->
               <!--footer section -->
               <!--footer section -->
        
         <?php include('footer.php');?>
     <?php include('footer_script.php');?>
        
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
     <script>
    var swiper = new Swiper('.swiper-container');
         var swiper = new Swiper('.swiper-container1', {
      slidesPerView: 3,
      slidesPerColumn: 1,
      spaceBetween: 30,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
    });
         $(document).ready( function () {
    //$('#myTable').DataTable();
             
          $('label[name=category_check]').click( function(){
             
              // $('.red_checkbox').removeClass('active');
              
              $(this).toggleClass('active'); 
              $(this).parent().find('.sub_menu').toggle();
              
              var cat_id = $(this).data("cat_id");
              var sub_cat_id = '';
              
              
              $check_status = $(this).attr('class').split(' ')[1];
              
              if($check_status == 'active'){
              
               $.ajax({
		    	url: '<?php echo base_url(); ?>/store/filter_store',
		    	method:"POST",
		    	data:{catgory_id:cat_id,sub_cat_id:sub_cat_id},
		    	beforeSend:function(){
		    	//	$('#loading_img').text('loading...');
		    	},
		    	success:function(data)
		    	{
                    
                    var list_data = JSON.parse(data).list;
                    //alert(json_encode(json_decode(data).list));
                    
                   // console.log(list_data);
                    
                    $('.number_box').html('');
                    
                    for(var i = 0; i <= list_data.length; i++ ){
                        
                         $('.number_box').append('<div class="col-md-4"><div class="simcard"><p class="number">99-88-99-88-99<span style=" float: right; "><i class="ion-android-favorite-outline" style="color: white;"></i></span></p><p class="pricing"><span class="selling_price">INR 37,500</span>&nbsp; <span class="mrp_price"> inr44,000 </span> &nbsp; <span class="discount">%15 off</span></p><p class="total">Total 23  &nbsp; &nbsp; sum05 &nbsp;&nbsp;<span>R2P</span></p><div class="like_view" ><div class="box1" ><i class="ion-ios-eye-outline" style="  color:#afb7af"></i></div><div class="box2" >&nbsp;321</div><div class="box3"><i class="ion-android-favorite-outline" style=" color:#afb7af"></i></div><div class="box4" >&nbsp;321</div></div><div class="action"><div class="col-md-6" style="padding-left:0px; text-align:left;"><a herf="">add to cart</a></div><div class="col-md-6"><button type="button" class="my_btn">Buy now</button></div></div></div></div>');
                        
                    }
                    
                    //for()
		    		//$('#img_label').html(data);
		    		//$('#loading_img').text('');
		    	}
		         });
            
              }
              //$('.my_checkbox').attr('checked','true');
              
              
          });   
             
             
             
        $('label[name=subcategory_check]').click( function(){
             
              // $('.red_checkbox').removeClass('active');
              
              $(this).toggleClass('active'); 
              $(this).parent().find('.sub_menu').toggle();
              
              var cat_id = $(this).data("cat_id");
              var sub_cat_id = $(this).data("sub_cat_id");
            
              
              $check_status = $(this).attr('class').split(' ')[1];
              
              if($check_status == 'active'){
              
               $.ajax({
		    	url: '<?php echo base_url(); ?>/store/filter_store',
		    	method:"POST",
		    	data:{catgory_id:cat_id,sub_cat_id:sub_cat_id},
		    	beforeSend:function(){
		    	//	$('#loading_img').text('loading...');
		    	},
		    	success:function(data)
		    	{
                    
                    var list_data = JSON.parse(data).list;
                    //alert(json_encode(json_decode(data).list));
                    
                   // console.log(list_data);
                    
                    $('.number_box').html('');
                    
                    for(var i = 0; i <= list_data.length; i++ ){
                        
                         $('.number_box').append('<div class="col-md-4"><div class="simcard"><p class="number">99-88-99-88-99<span style=" float: right; "><i class="ion-android-favorite-outline" style="color: white;"></i></span></p><p class="pricing"><span class="selling_price">INR 37,500</span>&nbsp; <span class="mrp_price"> inr44,000 </span> &nbsp; <span class="discount">%15 off</span></p><p class="total">Total 23  &nbsp; &nbsp; sum05 &nbsp;&nbsp;<span>R2P</span></p><div class="like_view" ><div class="box1" ><i class="ion-ios-eye-outline" style="  color:#afb7af"></i></div><div class="box2" >&nbsp;321</div><div class="box3"><i class="ion-android-favorite-outline" style=" color:#afb7af"></i></div><div class="box4" >&nbsp;321</div></div><div class="action"><div class="col-md-6" style="padding-left:0px; text-align:left;"><a herf="">add to cart</a></div><div class="col-md-6"><button type="button" class="my_btn">Buy now</button></div></div></div></div>');
                        
                    }
                    
                    //for()
		    		//$('#img_label').html(data);
		    		//$('#loading_img').text('');
		    	}
		         });
            
              }
              //$('.my_checkbox').attr('checked','true');
              
              
          });  
             
            
} );
        
  </script>
    </body>
</html>

