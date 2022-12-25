<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		
		 ini_set('max_execution_time', 0); 
         ini_set('memory_limit','2048M');

		$this->load->library('session');
         $this->load->helper('form');
        
        $this->load->model('model_dashboard');
        if($this->session->userdata('logged_in') !== 'messcafe_login'){
			redirect('./admin/login');
		}	

		
	}

	public function init($active_menu){
        
		$uid = $this->session->userdata('uid');
		$data['active_menu'] = $active_menu;
		return $data;
	}

	public function index(){
        date_default_timezone_set('Asia/Kolkata');
        $data['active_menu'] = "home";
		
        $this->load->helper('form');
        
        
         $data['today_recharge'] = $this->model_dashboard->select_today_recharge();
        $data['yesterday_recharge'] = $this->model_dashboard->select_yesterday_recharge();
		$data['month_recharge'] = $this->model_dashboard->select_month_recharge();
        $data['lastmonth_recharge'] = $this->model_dashboard->select_lastmonth_recharge();
        $data['thisyear_recharge'] = $this->model_dashboard->select_year_recharge();
        
        $data['total_customer'] = $this->model_dashboard->total_customer();
        $data['active_customer'] = $this->model_dashboard->total_active_customer();
        $data['blocked_customer'] = $this->model_dashboard->total_blocked_customer();
        $data['total_terminate'] = $this->model_dashboard->total_terminate();
        
        $data['today_sell'] = $this->model_dashboard->select_today_sell();
        $data['yesterday_sell'] = $this->model_dashboard->select_yesterday_sell();
		$data['month_sell'] = $this->model_dashboard->select_month_sell();
        $data['lastmonth_sell'] = $this->model_dashboard->select_lastmonth_sell();
        $data['thisyear_sell'] = $this->model_dashboard->select_year_sell();
        $data['bar'] = $this->model_dashboard->select_barchart_transaction();
        
        $data['today_registration'] = $this->model_dashboard->select_today_registration();
        $data['yesterday_registration'] = $this->model_dashboard->select_yesterday_registration();
		$data['month_registration'] = $this->model_dashboard->select_month_registration();
        $data['lastmonth_registration'] = $this->model_dashboard->select_lastmonth_registration();
        $data['thisyear_registration'] = $this->model_dashboard->select_year_registration();
       
        $today_vaction = $this->model_dashboard->today_vacation();
        $data['today_morning_vac'] = $today_vaction['morning'];
        $data['today_evening_vac'] = $today_vaction['evening'];
		$data['today_night_vac'] = $today_vaction['night'];
        
        $tommrow_vacation = $this->model_dashboard->tommrow_vacation();
        $data['tommrow_morning_vac'] = $tommrow_vacation['morning'];
        $data['tommrow_evening_vac'] = $tommrow_vacation['evening'];
		$data['tommrow_night_vac'] = $tommrow_vacation['night'];
        
        $after_tommrow_vacation = $this->model_dashboard->after_tommrow_vacation();
        $data['after_tommrow_morning_vac'] = $after_tommrow_vacation['morning'];
        $data['after_tommrow_evening_vac'] = $after_tommrow_vacation['evening'];
		$data['after_tommrow_night_vac'] = $after_tommrow_vacation['night'];
        
        $after_tommrow_tommrow_vacation = $this->model_dashboard->after_tommrow_tommrow_vacation();
        $data['after_tommrow_tommrow_morning_vac'] = $after_tommrow_tommrow_vacation['morning'];
        $data['after_tommrow_tommrow_evening_vac'] = $after_tommrow_tommrow_vacation['evening'];
		$data['after_tommrow_tommrow_night_vac'] = $after_tommrow_tommrow_vacation['night'];
		
		
		
		$after_fifth_day_vacation = $this->model_dashboard->after_fifth_day_vacation();
        $data['after_fifth_day_morning_vac'] = $after_fifth_day_vacation['morning'];
        $data['after_fifth_day_evening_vac'] = $after_fifth_day_vacation['evening'];
		$data['after_fifth_day_night_vac'] = $after_fifth_day_vacation['night'];
		
        
      
        $count_order = $this->model_dashboard->count_order();
         
        
        $data['pending_brekfast'] = $count_order['pending_brekfast'];
        $data['pending_launch'] = $count_order['pending_launch'];
        $data['pending_dinner'] = $count_order['pending_dinner'];
        
        $data['completed_brekfast'] = $count_order['completed_brekfast'];
        $data['completed_launch'] = $count_order['completed_launch'];
        $data['completed_dinner'] = $count_order['completed_dinner'];

        $data['genrate_order_date'] = $this->model_dashboard->get_genrate_order_date();
        
        $this->load->view('home', $data);

	}

   
    public function demo_chart(){
        // $data['bar2'] = $this->model_dashboard->select_barchart_recharge();
        //$data['menu_a'] = $this->model_dashboard->menu_a();
        $data['thisyear_registration'] = $this->model_dashboard->select_year_registration();
        echo json_encode($data['thisyear_registration']);
    }
    
    public function lastmonthsell(){
         $data['bar2'] = $this->model_dashboard->select_lastmonth_sell();
        echo json_encode($data['bar2']);
    }
    
    public function blocked_customer(){
        $data['active_menu'] = "home";
        $data['blocked'] = $this->model_dashboard->total_blocked_customer_detail();
        //echo json_encode($data['blocked_customer']);
        $this->load->view('customer/total_blocked', $data);
    }
    
    public function terminate_customer_select(){
        $data['active_menu'] = "home";
        $data['terminate'] = $this->model_dashboard->terminate_customer_select();
        //echo json_encode($data['blocked_customer']);
        $this->load->view('customer/total_terminated', $data);
    }
    
    
    public function uniq(){
       
        $str = openssl_random_pseudo_bytes(6);
        $value = bin2hex($str);
         echo uniqid($value.date('ymd'));
        //echo date('ymd');
    }

	public function profile(){
        
		$this->load->helper('form');

		$data = $this->init('profile');

		if($this->input->post('submit') == 'update-pic'){

			$config['upload_path'] = './uploads/profile/';
			$config['allowed_types'] = 'jpg|png|jpeg';
			$config['max_size']	= '1024';
			$config['max_width']  = '0';
			$config['max_height']  = '0';
			$new_name = 'original-'.$_FILES["userfile"]['name'];
			$config['file_name'] = $new_name;

			$this->load->library('upload', $config);

			if (!$this->upload->do_upload()){

				$data['message'] = '<div id="notification" class="alert alert-warning">'.$this->upload->display_errors().'</div>';
				$this->load->view('my-details/profile', $data);
			} else {

				$image_data = $this->upload->data();
				$data['message'] = $this->resize($image_data);
				$this->load->view('my-details/profile', $data);
			}

		} else if($this->input->post('submit') == 'update-info'){

			$uid = $this->session->userdata('uid');
			$data['message'] = $this->model_dashboard->update_info($uid);
			$this->load->view('my-details/profile', $data);

		} else if($this->input->post('submit') == 'update-pass'){

			$uid = $this->session->userdata('uid');
			$data['message'] = $this->model_dashboard->update_pass($uid);
			$this->load->view('my-details/profile', $data);

		} else {
            
			$this->load->view('my-details/profile', $data);
		}
	}

	public function resize($image_data){

		$this->load->library('image_lib');
		$thumb_img = 'thumbnail-'.$image_data['client_name'];

		$config['image_library'] = 'gd2';
		$config['source_image'] = $image_data['full_path'];
		$config['new_image'] = './uploads/profile/thumbnail/'.$thumb_img;
		$config['width'] = 160;
		$config['height'] = 160;

		$this->image_lib->initialize($config);

		if($this->image_lib->resize()){

			$uid = $this->session->userdata('uid');
			$data2 = $this->model_dashboard->update_pic($thumb_img, $uid);
			return $data2;
		} else {

			return '<div id="notification" class="alert alert-danger">Something went wrong.</div>';
		}
	}

	public function logout(){

		$this->session->sess_destroy();
		redirect('./admin/login');
	}
	
	public function angular_crud(){

		echo "Message for Angular";
	}
	

    public function update_my_profile(){
        
        if(isset($_POST['first_name'],$_POST['email'])){
            
            $fname = $_POST['first_name'];
            $email = $_POST['email'];
            
            $this->model_dashboard->update_my_profile($fname,$email);
            
            
        }
        
        
    }
    
     public function change_pass(){
        
        if(isset($_POST['n_pass'],$_POST['r_pass'])){
            
            $n_pass = $_POST['n_pass'];
            $r_pass = $_POST['r_pass'];
            
            
            $this->model_dashboard->change_pass($n_pass);
            
            
        }
        
        
    }
    
    public function data_cleaner(){
        
        //$before_year = date('Y-m-d', strtotime('-1 year'));
        //echo $before_year;
        date_default_timezone_set('Asia/Kolkata');
        $cookie_name = "sharma_dairy_data_cleaner";
        $cookie_value = date('Y-m-d');
        if(isset($_COOKIE[$cookie_name])) {
             
            echo "data cleanup is already done";
         }else{
            
             $before_year = date('Y-m-d', strtotime('-1 year'));
             $this->model_dashboard->my_data_cleaner($before_year);
            
        }
    }
    
    public function block_transaction(){
        
        $cookie_name = "sharma_dairy_card_blocker";
        
        if(!isset($_COOKIE[$cookie_name])) {
             date_default_timezone_set('Asia/Kolkata');
             $before_tenday = date('Y-m-d', strtotime('-10 days'));
             $this->model_dashboard->my_block_transaction($before_tenday);
         }else{
             echo "card bolcker is already done";
        }
    }
    
    public function backup()
    {  $data['active_menu'] = "backup";
       $this->load->view('backup',$data);
    }
    
    public function db_backup()
    {
       date_default_timezone_set('Asia/Kolkata');
       $date = new DateTime();
       $time_stamp = $date->format('d-M-Y, g-i a');
        
       $this->load->dbutil();   
       $backup =& $this->dbutil->backup();  
       $this->load->helper('file');
       write_file('<?php echo base_url();?>/downloads', $backup);
       $this->load->helper('download');
       force_download('Freshometer-'.$time_stamp.'.sql', $backup);
    }
   
  
    public function enter_card()
    {
       $this->model_dashboard->enter_code();
    }
    
    public function view_vacation()
    {  
        $data['active_menu'] = "home";
       $date = $this->uri->segment(3);
       $shift = $this->uri->segment(4);
        
         $data['genrate_order_date'] = $this->model_dashboard->get_genrate_order_date();
        $data['vacation_list'] =$this->model_dashboard->view_vacation($date,$shift);    
        $this->load->view('vacation_list', $data);
    }
    
     public function view_order()
    {  
         
        $this->model_dashboard->view_order();    
     
    }
    
    
    public function genrate_orders(){
        
        
        $data['my_orders'] = $this->model_dashboard->genrate_orders(); 
        
    }
	
	public function test_sms(){
		
		 $mobile_no = 7067428075;
        $otp = 122222;
        
                                    //***************************//
                                    // ******** send sms *******//
									//**************************//
					
									$url = base_url()."send_msg.php?mobile_no=".$mobile_no."&otp_number=".$otp."&template=otp"; 
		                            $cSession = curl_init(); 
                                    curl_setopt($cSession,CURLOPT_URL,$url); 
                                    curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
                                    curl_setopt($cSession,CURLOPT_HEADER, false); 
                                    $result=curl_exec($cSession);
                                    curl_close($cSession);
		                            print_r($result);
							        //***************************//
                                    // ******** send sms *******//
									//**************************//
	}
}
