<?php 

//error_reporting(0);
//ini_set('display_errors', 0);

  $name = $_GET["name"];
  $amount = $_GET["amount"];
  $otp_number = $_GET["otp_number"];
  $mobile = $_GET["mobile_no"]; 
  $template = $_GET["template"]; 
  
  $company = "freshometer";
  $ending_line = "Team freshometer";
  
  $msg = '';
  
  $start_date = $_GET["start_date"];
  $end_date = $_GET["end_date"];
  
  
  if($template == 'welcome'){
	 
	 $msg = "Dear ".$name.", Welcome to FreshoMeter. Your account has been created successfully, please subscribe the plan for home delivery of your diets. Team FreshoMeter";
  }
  
  if($template == 'subscribe'){
	  
	 $msg = "Dear ".$name.", You have been successfully subscribed for the diet plan Rs. ".$amount." , enjoy the diet with FreshoMeter. Team";
  }
  
  if($template == 'otp'){
	  
	 $date = date("d-M-Y"); 
	 $msg = "OTP for login Transaction on freshoMeter is ".$otp_number." & valid till 3 minut Don't share it.";
  }
  
  if($template == 'vacation'){
	  
	 $date = date("d-M-Y"); 
	 $msg = "Freshometer got new vacation by the customer ".$name." from date ".$start_date." to ".$end_date.". Thanks&Regards";
  }
  
  if($template == 'vacation_delete'){
	  
	 $date = date("d-M-Y"); 
	// $msg = "Freshometer got new vacation by the customer ".$name." from date ".$start_date." to ".$end_date.". Thanks&Regards";
	 
	 $msg = "Vacation has cancelled by ".$name." for the date ".$start_date." to ".$end_date.". Regards, Freshometer";
  }
  
        $user = "freshometer";
        $password = "Freshometer@123";
        $msisdn = '91'.$mobile, ;
        $sid = "AKKOTS";
        $name = "vivek";
        $OTP = "6765R";
        $msg = urlencode($msg);
        $fl = "0";
        $gwid = "2";
        $type = "txt";
        $cSession = curl_init(); 
        curl_setopt($cSession,CURLOPT_URL,"http://login.sms.ackko.com/vendorsms/pushsms.aspx?user=".$user."&password=".$password."&msisdn=".$msisdn."&sid=".$sid."&msg=".$msg."&fl=0&gwid=2"); 
        curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($cSession,CURLOPT_HEADER, false); 
        $result=curl_exec($cSession);
		//echo json_encode($result);
        curl_close($cSession);
        print_r($result);

 ?>
