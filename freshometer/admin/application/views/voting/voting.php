<?php
header('Cache-Control: max-age=900');
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('common/header_link'); ?>
   <!-- touchspin CSS
		============================================ -->
	<link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/touchspin/jquery.bootstrap-touchspin.min.css">	
    
      <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.print.min.css">
    
    <!-- select2 CSS
		============================================ -->
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/select2/select2.min.css">
   		
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/chosen/bootstrap-chosen.css">
<style type="text/css">
     
        .form-control{
            height:32px;
          
        }
    
    
    .click_tr:hover{
        cursor: pointer;
    }
    
    .asset-inner{
        width:100%;
    }

    @media (max-width:720px) and (min-width:280px){
        .asset-inner{
        width:100%;
       }
    }
    
    .chosen-container .chosen-results{
        
        color: #555555;
    }
    
    .select2-container--default .select2-selection--multiple .select2-selection__choice{
        
        background-color: #eeeeee;
        border: 1px solid #ccc;
        padding-bottom:2px;
        padding-left: 6px;
        padding-right: 6px;
        border-radius: 4px;
        background-clip: padding-box;
        background-image: linear-gradient(to bottom, white 0%, #eeeeee 100%);
        background-repeat: repeat-x;
        color: #666363;
        box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
        
    }
    
    .select2-container--default .select2-results__option[aria-selected="true"]{
        
        background-color: #ffffff;
        color: #2e97f4;
    }
</style>
</head>

<body>
    <?php $this->load->view('common/sidemenu'); ?>
    <div class="all-content-wrapper">
        
        <?php $this->load->view('common/titlebar'); ?>
	
		
		<div class="container-fluid" style="margin-top:15px;">
            <div class="product-status-wrap mycard" style="padding-top:0px; border-top:2px solid #0099cc;">
                <div class="row" style="background-color:#f7f7f7; ">
				        <div class="search_engine" style="height:auto; min-height:60px; padding-top:15px;">
                            <div class="breadcome-heading" style="">
                                <form action=""  method="post">
                                
                                      <div class="col-md-8 col-sm-12 col-xs-12" style="margin-bottom:15px;">
                                           
                                          
                                               <div class="chosen-select-single" id="choose_menu_div">
                                                
                                                <select class="select2_demo_2 form-control" multiple="multiple" style="width:100%;" data-placeholder="Choose Menu" tabindex="-1" required>
                                                    <?php foreach($product as $row){ ?>
														<option value="<?php echo $row->menu_name ?>"><?php echo $row->menu_name ?></option>
												    <?php } ?>		
													</select>
                                            </div>
                                          
                                            <input type="hidden" value="" name="selected_menu" />
                                           
                                         </div>
                                     
                                     <div class="col-md-2 col-sm-12 col-xs-12" >
                                          
                                               <div class="form-group" id="data_5" style=" height:28px;">
                                                <select name="menu_id"  class="form-control" style="width:100%; border-radius: 0px;" required>
                                                    <option value="">Select Menu</option>
                                                    
                                                     <option value="1">Menu 1</option>
                                                     <option value="2">Menu 2</option>
                                                     <option value="3">Menu 3</option>
                                                     <option value="4">Menu 4</option>
                                                </select>
                                            </div>
                                     
                                           
                                         </div> 
                                    <div class="col-md-2 col-sm-12 col-xs-12" >
                                                <div class="form-group" id="data_5" style=" height:28px;">
                                                     <input type="submit" name="submit" class="btn" value="Search" style="background-color: #46c7fe; color:#ffffff; width: 100%;"/>
                                                    
                                                  </div>
                                          
                                      </div>   
  
                                </form>
                             </div>
				          </div>		
				 </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        
                         <div id="myheadtitle" style="margin:0px; height:55px; border-bottom:none; padding-top:15px; font-size: 15.5px; ">
                             Special Menu 
                        </div>
						<div class="asset-inner">
                                <table id="table" data-toggle="table" data-pagination="true" data-  data-key-events="true"  data-cookie="true"
                                        data-cookie-id-table="saveId"  data-click-to-select="true"  class="table-striped">
                                    <thead>
									<tr>
                                        <th>Special Menu</th>
								        <th>Voting</th>
                                        <th>No. of Voting</th>
                                        <th>Status</th>
                                        <th>Change Status</th>
                                       
                                    </tr>
								    </thead>
								  <tbody id="tran_table">
                                     <?php  foreach($select_special_menu as $row){ ?>
                                         <tr>
                                             <td><?php echo $row->menu; ?></td>
                                             <td>50%</td>
                                             <td>70</td>
                                             <td>Active</td>
                                            <td> <div class="switch_style"style="">
                                                            <span class="span1">Active</span>
                                                            <label class="switch">
                                                                <input type="checkbox" id="update_status" data-status_id="<?php echo $row->special_menu_id; ?>" <?php if($row->status == "blocked"){ echo "checked";}  ?>/>
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <span class="span2">Block</span>
                                                       </div></td>
                                             
                                        </tr>
                                       <?php } ?>
								  </tbody>
								</table>
                            </div>
                    </div>
                </div>
            </div>
	    </div>

	</div>

   <?php $this->load->view('common/footer_script'); ?>
    
	
	<!-- touchspin JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/touchspin/touchspin-active.js"></script>	
	
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/datepicker-active.js"></script>
   
    <!-- select2 JS
		============================================ -->
    <script src="<?php echo base_url('catalogs'); ?>/js/select2/select2.full.min.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/select2/select2-active.js"></script>
    <script type="text/javascript">
       $(document).ready(function(){
       
         $(document).on('click','.click_tr',function(){
             
            var href = $(this).data("date");
            var agent = $('select[name=agent_search]').val();
            
             
            if(agent === ''){
                window.location.href = '<?php echo base_url() ?>report/transaction_date_report/'+href;
                
            }else{
                
                window.location.href = '<?php echo base_url() ?>report/transaction_date_report/'+href+'/'+agent;
            } 
             
             
         });
           
        $(document).on('click','#search_date_bt',function(){ 
            
            var start_date =  $('input[name=start]').val();
            var end_date =  $('input[name=end]').val();
            
            $.ajax({
     				 type: 'POST',
     				 url: '<?php echo base_url(); ?>report/tranreport_section_searchbar',
     				 data:{start_date:start_date,end_date:end_date},
     				 success:function(noti){
     					 $('#tran_table').html(noti);
     				 }
            });
            
        });
           
        function select_take(){ 
            
             var select_agent = $('input[id=select_agent]').val();
            $('select[name=agent_search]').val(select_agent);
    
        } 
        select_take(); 
           
        $(document).on('click', '#tbl_refresh',function(){
            
           window.location.href =   window.location.href;
            
        });  //select2-selection__choice 
           
        $(document).on('blur', '#choose_menu_div',function(){
            var menu = [];
           $('.select2-selection__choice').each(function(){
              var val =  $(this).attr('title'); 
               menu.push(val);
           });
          
            if(menu !== ''){
                
                $('input[name=selected_menu]').val(menu);
            }
        });
           
        
        $(document).on('click','button[title=edit_bt]',function(){
            $('.select2-selection__rendered').prepend('<li class="select2-selection__choice" title="Daal"><span class="select2-selection__choice__remove" role="presentation">x</span>Daal</li>');
            
        });
           
       });
    </script>
</body>
</html>