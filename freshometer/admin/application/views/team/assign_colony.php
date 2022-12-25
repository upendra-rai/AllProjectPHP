<!doctype html>
<html class="no-js" lang="en">

<head>
   <?php $this->load->view('common/header_link'); ?>
   
   <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/modals.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/preloader/preloader-style.css">
   <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="<?php echo base_url('catalogs'); ?>/css/calendar/fullcalendar.print.min.css">
    
<style type="text/css">
        .message{
            width:100%;
            height:40px;
           
            padding-top:8px;
            text-align:center; color:red;
            box-shadow: 0px 3px 7px -1px rgba(0,0,0,0.6);
            display: none;
           
        }
        .message.error{
              color: #ffffff;
             background-color: #e91e63;
             border:1px solid #e91e63;
        }
        .message.success{
             color: #ffffff;
             background-color: #4caf50;
             border:1px solid green;
        }
        .message.card{
             color: #ffffff;
             background-color: #ff9600;
             border:1px solid #ff9600;
        }
    
    
    .span_div{
        position: relative;
        width:100%;
       
        color:#353535; padding:2px; margin:2px;
        padding-right: 20px;
        margin-bottom: 5px;
    }
    .span_div button{
        position: absolute;
        width:22px; height:22px; padding:0px; top:0; right: 0; background-color:#0099cc; color:#ffffff;
    }
    
    label{
        font-weight: 400;
    }
    </style>
</head>

<body>
    <div class="preloader-single shadow-inner mg-b-30" id="my_loader" style="position:fixed; background: rgba(0,0,0,0.8); width:100%; height:100vh; z-index: 9999; display:none;">
        <div class="ts_preloading_box" style="">
            <div id="ts-preloader-absolute09" style="position:fixed; margin:auto;   border-radius:70px;">
                <div class="tsperloader9" id="tsperloader9_one"></div>
                <div class="tsperloader9" id="tsperloader9_two"></div>
                <div class="tsperloader9" id="tsperloader9_three"></div>
                <div class="tsperloader9" id="tsperloader9_four"></div>
            </div>
        </div>
    </div>
    
    <?php $this->load->view('common/sidemenu'); ?>
    <div class="all-content-wrapper">
        
        <?php $this->load->view('common/titlebar'); ?>
		
			<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12" style="padding:0px;">
            <div class="container-fluid" style="margin-top:15px;">
               <div class="product-status-wrap mycard">
			    <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div id="myheadtitle" style="margin-bottom:0px; ">
                                Assign Colony > <?php if(isset($agent_name)){ echo $agent_name; } ?>
                               <ul class="my_quick_bt" style="">
                                    
                                    <li>
                                        <a href="<?php echo base_url(); ?>team">
                                            <i class="ion-ios-undo-outline"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                     
                                                    <form action="" method="post" class="dropzone dropzone-custom needsclick add-professors" id="myForm">
                                                        <div class="row" style="padding-left:15px;">
                                                            <div style="width: 250px;  display:inline-block; margin-right:30px;  float:left;">
                                                            <div style="width:100%; height:40xp;  padding:10px; background-color:#232323; color:#ffffff;">
                                                                    Assigned Colony
                                                                <input type="hidden" value="" name="assign_colony" style="color:black;">
                                                                </div>
                                                            <div  style="border:1px solid #0099cc; padding:10px; width:100%; height:350px; overflow:auto;" class="assigned_colony_list">
                                                                
                                                                
                                                                <?php foreach($agent_selected_colony as $row){ ?>
                                                                <div class="span_div" id="span<?php echo $row->colony_id;  ?>" data-assigned_colony_id="<?php echo $row->colony_id; ?>">
                                                                <?php echo $row->colony_name;  ?>
                                                                    <button type="button" name="del_bt"  data-del_colony_id="<?php echo $row->colony_id;  ?>" class="btn" >X</button>
                                                                </div>    
                                                                <?php } ?>
                                                            </div>
                                                            
                                                            </div>
                                                            <div  style="width:250px; display:inline-block;">
                                                                <div style="width:100%; height:40xp; float:right;  padding:10px; float:right; background-color:#232323; color:#ffffff;">
                                                                    Available Colony
                                                                </div>
                                                                <div style="width:100%; height:350px; overflow:auto; float:right; border:1px solid #0099cc; padding:10px; ">
                                                                <?php foreach($select_colony as $row){ ?>
                                                                   
                                                                    <?php if(isset($row->agent_id)){ if($row->agent_id == $selected_agent){ ?>
                                                                    <input type="checkbox" id="check<?php echo $row->my_colony_id;  ?>" name="check_colony" value="<?php echo $row->colony_name ?>" data-colony_id="<?php echo $row->my_colony_id ?>" <?php if(isset($row->agent_id)){ echo 'checked'; } ?>  > <label for="check<?php echo $row->my_colony_id;  ?>"> <?php echo $row->colony_name; ?></label><br>
                                                                <?php }}else{ ?>
    
                                                                      <input type="checkbox" name="check_colony" id="check<?php echo $row->my_colony_id;  ?>" value="<?php echo $row->colony_name ?>" data-colony_id="<?php echo $row->my_colony_id ?>" <?php if(isset($row->agent_id)){ echo 'checked'; } ?>  > <label for="check<?php echo $row->my_colony_id;  ?>"> <?php echo $row->colony_name; ?></label><br>
    
                                                               <?php }} ?>
                                                                     
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="div_foot">
                                                                  <input type="submit" class="btn btn-primary" name="submit" value="submit" id="submit" disabled>
                                                                    <button type="button" class="btn btn-primary" name="cancel" style="background-color:#ff4d39; border:1px solid #ff4d39;">Remove All</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        
                                                    </form>
													
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
					</div>
                </div>
               </div>
            </div>
            </div>    
			           <div id="success_alert" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    <!--<div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>-->
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <i class="educate-icon educate-checked modal-check-pro"></i>
                                        <h2>Awesome!</h2>
                                        <p>Team Member Is Successfully Added</p>
                                    </div>
                                    <div class="modal-footer">
                                        
                                       <button class="btn btn-primary" type="button" id="success_ok" style="width:80px; background-color:#2c6be0;">OK</button>
                                    
                                    </div>
                                </div>
                            </div>
                       </div>
			           <div id="failed_alert" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog" style="width:460px; margin:auto;">
                            <div class="modal-dialog" style="width:90%;">
                                <div class="modal-content">
                                    <div class="modal-close-area modal-close-df">
                                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="modal-body" style="padding: 30px 30px;">
                                        <span class="educate-icon educate-danger modal-check-pro information-icon-pro"></span>
                                        <h2>Error!</h2>
                                        <p>Sorry Process Is failed</p>
                                    </div>
                                    <div class="modal-footer danger-md">
                                       
                                        <button class="btn btn-primary" type="button" data-dismiss="modal" style="width:80px; background-color:#2c6be0;">OK</button>
                                    
									</div>
                                </div>
                            </div>
                        </div>

	</div>

   <?php $this->load->view('common/footer_script'); ?>
   <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="<?php echo base_url('catalogs'); ?>/js/datapicker/datepicker-active.js"></script> 
  
<script type="text/javascript">
 $(document).ready(function(){
     
    function each_assigned_colony(){
        
        var assigned_colony_array = [];
        
        $('div[class=span_div]').each(function(){
            
          var colony_id =  $(this).data('assigned_colony_id');
           assigned_colony_array.push(colony_id);
          
        });
        
        var assigned_colony_array_encode = JSON.stringify(assigned_colony_array);
        
        $('input[name=assign_colony]').val(assigned_colony_array_encode);
    } 
     
    //each_assigned_colony(); 
     
    $(document).on('click','input[name=check_colony]',function(){
        var colony_id = $(this).data('colony_id');  
        var colony_name = $(this).val();
       
        if($(this).is(':checked')){
            
            $('.assigned_colony_list').append('<div class="span_div" id="span'+colony_id+'" data-assigned_colony_id="'+colony_id+'">'+colony_name+'<button type="button" name="del_bt" data-del_colony_id="'+colony_id+'" class="btn" >X</button></div>');
            
            each_assigned_colony();
            
        }else{
            var span_id = 'span'+colony_id;
            
            
            $('div[id='+span_id+']').remove();
            
            each_assigned_colony();
        }
        
        $('input[name=submit]').attr('disabled',false);
        
    });
     
     $(document).on('click','button[name=del_bt]',function(){
        
         var colony_id = $(this).data('del_colony_id');
         
         var check = 'check'+colony_id;
         //alert(colony_id);
         
         $(this).parent().remove();
         
         $('input[id='+check+']').prop('checked',false);
         each_assigned_colony();
         
         $('input[name=submit]').attr('disabled',false);
     });
        
     $(document).on('click','button[name=cancel]',function(){
                  
                    
            $('.assigned_colony_list').html('');
            $('input[name=check_colony]').prop('checked',false);
            each_assigned_colony();
            $('input[name=submit]').attr('disabled',false);
                    
    });
 }); 
</script>
</body>
</html>