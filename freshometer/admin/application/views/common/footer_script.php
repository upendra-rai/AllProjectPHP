 <!-- jquery
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/jquery.scrollUp.min.js"></script>
    <!-- counterup JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/counterup/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/counterup/waypoints.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/counterup/counterup-active.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/metisMenu/metisMenu.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/metisMenu/metisMenu-active.js"></script>
    <!-- morrisjs JS
		============================================ -->
   
    <!-- morrisjs JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/sparkline/jquery.sparkline.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/sparkline/jquery.charts-sparkline.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/sparkline/sparkline-active.js"></script>
    <!-- calendar JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/calendar/moment.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/calendar/fullcalendar.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/calendar/fullcalendar-active.js"></script>
	
	<!-- Charts JS
		============================================ -->
    	
    <!-- plugins JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
   
	
	<!-- data table JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/bootstrap-table.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/tableExport.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/data-table-active.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/bootstrap-table-editable.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/bootstrap-editable.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/bootstrap-table-resizable.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/colResizable-1.5.source.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/data-table/bootstrap-table-export.js"></script>


    
<script type="text/javascript">
$(document).ready(function(){
         $('#profile_div_bt').click(function(){
           window.location.href = '<?php echo base_url(); ?>/dashboard/profile';
        })   
         $('#logout_div_bt').click(function(){
           window.location.href = '<?php echo base_url(); ?>/dashboard/logout';
        }) 
    
         $(document).on('click','input[name=start]',function(){
             $('.match_result').hide();
         });
         $(document).on('click','input[name=end]',function(){
             $('.match_result').hide();
         });
         $(document).on('click','input[name=search_section]',function(){
             $('.match_result').hide();
         });    
         $('input[name=search_section]').keypress(function (e) {
               var key = e.which;
               if(key == 13)  // the enter key code
               {
               $('button[id=search_bt]').click();
               return false;  
               }
         });
    
         $('input[name=start]').keypress(function (e) {
               var key = e.which;
               if(key == 13)  // the enter key code
               {
               $('input[name=end]').focus();
               return false;  
               }
         });
        
        $('input[name=end]').keypress(function (e) {
               var key = e.which;
               if(key == 13)  // the enter key code
               {
               if($('input[name=start]').val() === '' || $('input[name=start]').val() == 'Start Date' ){
                   $('input[name=start]').focus();
               }else{
                  $('button[id=search_date_bt]').click();
                  return false;  
                   
               }   
              
               }
         });
		 $(document).on('click','button[id=search_bt]',function(){
             $('#my_loader').show();
             var search_by  = $('select[id=select_search]').val();
             var linked_id = $('input[name=search_section]').val();
			 if(search_by === "linked_no"){
                         $.ajax({
     		         		 type: 'POST',
     		         		 url: '<?php echo base_url(); ?>search_customer/searchbar_card_no',
         
              				 data:{search_by:search_by,linked_id:linked_id},
         
              				 success:function(noti){
         						 $('#my_loader').hide();
              					 $('#match_result1').html(noti).show();
                                 
              				 },
                             error: function(XMLHttpRequest, textStatus, errorThrown) {
                             $('#my_loader').hide();
                             if (XMLHttpRequest.readyState == 4) {
                                
                                 $('#failed_alert').modal("toggle");
                                
                                 // HTTP error (can be checked by XMLHttpRequest.status and XMLHttpRequest.statusText)
                             }
                             else if (XMLHttpRequest.readyState == 0) {
                                 $('#failed_alert').modal("toggle");
                                 
                                 // Network error (i.e. connection refused, access denied due to CORS, etc.)
                             }
                             else {
                                 
                                 $('#failed_alert').modal("toggle");
                                 // something weird is happening
                             }
                           }
              			 });
                    
                }else{
                    $('#my_loader').hide();
                }
         });
	   
	   
	   $(document).on('click','button[id=search_date_bt]',function(){
         $('#my_loader').show();   
         var from_date  = $('input[name=start]').val();
         var to_date  = $('input[name=end]').val();
		    $.ajax({
     				 type: 'POST',
     				 url: '<?php echo base_url(); ?>search_customer/search_by_date',
     				 data:{from_date:from_date,to_date:to_date},
     				 success:function(noti){
     					 $('#match_result_date').html(noti).show();
                          $('#my_loader').hide();
                         
     				 },
                     error: function(XMLHttpRequest, textStatus, errorThrown) {
                     $('#my_loader').hide();
                     if (XMLHttpRequest.readyState == 4) {
                        
                         $('#failed_alert').modal("toggle");
                        
                         // HTTP error (can be checked by XMLHttpRequest.status and XMLHttpRequest.statusText)
                     }
                     else if (XMLHttpRequest.readyState == 0) {
                         $('#failed_alert').modal("toggle");
                         
                         // Network error (i.e. connection refused, access denied due to CORS, etc.)
                     }
                     else {
                         
                         $('#failed_alert').modal("toggle");
                         // something weird is happening
                     }
                   }
                    
     	    });
	   });

         
        $(document).on('change','#select_search',function(){
			 var val = $('#select_search').val();
			 $('input[name=search_section]').val('');
             $('.match_result').hide();
            if(val === "name" || val === "colony_id" || val === "mobile_no"){
                
                $('input[name=search_section]').attr('id','search_name_input');
                if(val === "name"){
                    $('input[name=search_section]').attr('placeholder','Search by Customer Name').focus();
                }else if(val === "colony_id"){
                     $('input[name=search_section]').attr('placeholder','Search by Colony Name').focus();
                }else if(val === "mobile_no"){
                    $('input[name=search_section]').attr('placeholder','Search by Mobile no.').focus();
                }
                
            }else{
                $('input[name=search_section]').attr('id','search_input');
                $('input[name=search_section]').attr('placeholder','Search by Card No.').focus();
            }
		}); 
         
        $(document).on('keyup','#search_name_input',function(){
                var search_by  = $('select[id=select_search]').val();
			    var search_for = $('input[id=search_name_input]').val();
                if(search_by === "name"){
                       
                        var fullname = search_for.split(" ");
			        	var firstname = fullname[0];
			        	if(fullname[1] === undefined || fullname[1] === null){
			        		var lastname  = "";
			        	}else{
			        		var lastname  = fullname[1];
			        	}
                        if(search_for.length >= 3){
			        	 $.ajax({
     		         		 type: 'POST',
     		         		 url: '<?php echo base_url(); ?>search_customer/searchbar_list',
         
              				 data:{search_by:search_by,firstname:firstname,lastname:lastname},
         
              				 success:function(noti){
         						 
              					 $('#match_result1').html(noti).show();
                                 
              				 }
              			 });
                    
                       }
                }else if(search_by === "colony_id"){
                    
                    if(search_for.length >= 3){
                      $.ajax({
             				 type: 'POST',
             				 url: '<?php echo base_url(); ?>search_customer/searchbar_like_colony',
             				 data:{search_by:search_by,search_for:search_for},
     		        		 success:function(noti){
     		        			 $('#match_result1').html(noti).show();
                                
     		        		 }
     		        	 });
                    }
                }else if(search_by === "mobile_no"){
                    if(search_for.length >= 3){
                      $.ajax({
             				 type: 'POST',
             				 url: '<?php echo base_url(); ?>search_customer/searchbar_like_list_number',
             				 data:{search_by:search_by,search_for:search_for},
     		        		 success:function(noti){
     		        			 $('#match_result1').html(noti).show();
                                 
     		        		 }
     		        	 });
                    }
                }
            
        });
         
        $(document).on('keydown','#search_name_input',function(){
                var search_by  = $('select[id=select_search]').val();
			    var search_for = $('input[id=search_name_input]').val();
                if(search_by === "name"){
                        var fullname = search_for.split(" ");
			        	var firstname = fullname[0];
			        	if(fullname[1] === undefined || fullname[1] === null){
			        		var lastname  = "";
			        	}else{
			        		var lastname  = fullname[1];
			        	}
                        if(search_for.length >= 3){
			        	 $.ajax({
     		         		 type: 'POST',
     		         		 url: '<?php echo base_url(); ?>search_customer/searchbar_list',
         
              				 data:{search_by:search_by,firstname:firstname,lastname:lastname},
         
              				 success:function(noti){
         						 
              					 $('#match_result1').html(noti).show();
                                 
              				 }
              			 });
                    
                       }else{
                         
                         $('#match_result1').html("").hide();
                                
                      }
                }else if(search_by === "colony_id"){
                    if(search_for.length >= 3){
                      $.ajax({
             				 type: 'POST',
             				 url: '<?php echo base_url(); ?>search_customer/searchbar_like_list',
             				 data:{search_by:search_by,search_for:search_for},
     		        		 success:function(noti){
     		        			 $('#match_result1').html(noti).show();
                                
     		        		 }
     		        	 });
                    }else{
                    
                    $('#match_result1').html("").hide();
                   }
                }else if(search_by === "mobile_no"){
                    if(search_for.length >= 3){
                      $.ajax({
             				 type: 'POST',
             				 url: '<?php echo base_url(); ?>search_customer/searchbar_like_list_number',
             				 data:{search_by:search_by,search_for:search_for},
     		        		 success:function(noti){
     		        			 $('#match_result1').html(noti).show();
                                 
     		        		 }
     		        	 });
                    }else{
                    
                    $('#match_result1').html("").hide();
                    }
                }
        }); 
         
         
         $(document).on('click','.search_li',function(e){
             e.stopPropagation();
            $('#my_loader').show();
             var linked_id = $(this).data("li_link");
             window.location.href = '<?php echo base_url() ?>customer/view_customer/'+linked_id;
		 });
  
    
         $('body').click(function(){
             $('#match_result1').hide();
             $('#match_result_date').hide();
         })
    
         $('#loc_home').click(function(){
             window.location.href = '<?php echo base_url() ?>dashboard';
         });
         $('#loc_back').click(function(){
            window.history.back();
         });   
           
        $('#my_nav').click(function(){
		var sidemenu_width = $('.mobo_menu').width();
		if(sidemenu_width == "0"){
			$('.mobo_menu').show().animate({
                width: 250,
            });
		}else if(sidemenu_width == "220"){
			 $('.mobo_menu').hide(0).animate({
                width: 0,
            });
		}
	   });
    
    // print file
          $(document).on('click', '#print',function(){

            var divContents = $("#print_area").html();
            var printWindow = window.open('', '', 'height=500,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title><style type="text/css">.fixed-table-toolbar{display:none;} .fixed-table-loading{display:none;} .fixed-table-pagination{display:none;} p{line-height: 0px;} table tbody tr td{ border:1px solid #4d4d4d; padding:1px 5px; } #print{display:none;}</style>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
           });
           
});
</script>   