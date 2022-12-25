<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		
		 

		$this->load->library('session');
         $this->load->helper('form');
        
        $this->load->model('model_dashboard');
        $this->load->model('model_report');
       
       if($this->session->userdata('logged_in') !== 'messcafe_login'){
			redirect('./admin/login');
		}
		
	}

	public function init($active_menu){
        
		$uid = $this->session->userdata('uid');
		$data['user_data'] = $this->model_dashboard->user_data($uid);
		
		$data['active_menu'] = $active_menu;

		return $data;
	}

	public function index(){
       
		$data = $this->init('dashboard');
        
		
			 $this->load->helper('form');
		$this->load->view('home', $data);

	}
    
    public function customer_report(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "customer";
        if($this->input->post('submit') != ''){
           
            $name_search = $this->input->post('name_search');
            $colony_search = $this->input->post('colony_search');
            $status_search = $this->input->post('status_search');
            $plan = $this->input->post('plan');
            
            $data['return_name'] = $name_search;
            $data['return_colony'] = $colony_search;
            $data['return_status']  =   $status_search;
            $data['select_colony'] = $this->model_report->select_colony();
            $data['select_plan'] = $this->model_report->select_plan();
            $data['all_customer'] = $this->model_report->customer_report_multi_searchbar($name_search,$colony_search,$status_search,$plan);
            $this->load->view('report/customer_report',$data);		
            
        }else{
             $data['all_customer'] = $this->model_report->select_customer_report();
             $data['select_colony'] = $this->model_report->select_colony();
             $data['select_plan'] = $this->model_report->select_plan();
             $this->load->view('report/customer_report',$data);		
        }
    
       
		
	}    
    
    public function feedback(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "feedback";
        if($this->input->post('submit') != ''){
           
            $name_search = $this->input->post('name_search');
            $colony_search = $this->input->post('colony_search');
            $status_search = $this->input->post('status_search');
            $plan = $this->input->post('plan');
            
            $data['return_name'] = $name_search;
            $data['return_colony'] = $colony_search;
            $data['return_status']  =   $status_search;
            $data['select_colony'] = $this->model_report->select_colony();
            $data['select_plan'] = $this->model_report->select_plan();
            $data['all_customer'] = $this->model_report->select_feedback_filter($name_search,$colony_search,$status_search,$plan);
            $this->load->view('report/feedback',$data);		
            
        }else{
             $data['all_customer'] = $this->model_report->select_feedback();
             $data['select_colony'] = $this->model_report->select_colony();
             $data['select_plan'] = $this->model_report->select_plan();
             $this->load->view('report/feedback',$data);		
        }
    
       
		
	} 
    
    
    public function customer_full_recharge_report($id){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "customer";
         if($this->input->post('submit') != '' && $this->input->post('start') != "Start Date" && $this->input->post('end') != "End Date"){
             
             $start = $this->input->post('start');
             $end = $this->input->post('end');
             
              $data['return_start'] = $start;
              $data['return_end'] = $end;
              $data['customer_detail'] = $this->model_report->customer_report_list($id);
              $data['customer_recharge'] = $this->model_report->customer_full_report_rech_search($start,$end,$id);
              $this->load->view('report/customer_full_recharge_report',$data);	
         }else{
             
             $data['customer_detail'] = $this->model_report->customer_report_list($id);
             $data['customer_recharge'] = $this->model_report->customer_full_report_rech($id);
             $this->load->view('report/customer_full_recharge_report',$data);		
             
         }
        
    }
    
    public function customer_full_transaction_report($id){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "customer";
         if($this->input->post('submit') != '' && $this->input->post('start') != "Start Date" && $this->input->post('end') != "End Date"){
             
             $start = $this->input->post('start');
             $end = $this->input->post('end');
             
              $data['return_start'] = $start;
              $data['return_end'] = $end;
              $data['customer_detail'] = $this->model_report->customer_report_list($id);
             $data['customer_transaction'] = $this->model_report->customer_full_report_tran_search($start,$end,$id);
             $this->load->view('report/customer_full_transaction_report',$data);	
         }else{
             
             $data['customer_detail'] = $this->model_report->customer_report_list($id);
             $data['customer_transaction'] = $this->model_report->customer_full_report_tran($id);
             $this->load->view('report/customer_full_transaction_report',$data);		
             
         }
        
        
        
    }
        
	public function transaction_report(){
        
        $data['active_menu'] = "report";
        $data['active_submenu'] = "tran_report";
        
       
         if($this->input->post('submit') != '' && $this->input->post('start') != "" && $this->input->post('end') != ""){
             
             $start = $this->input->post('start');
             $end = $this->input->post('end');
              if($start != 'Start Date'){
                  $data['return_start'] = $start;
              }
             if($end != 'End Date'){
                  $data['return_end'] = $end;
              }
              
              $data['daily_transaction'] = $this->model_report->transaction_report_search($start,$end);
             
             
              $this->load->view('report/transaction_report',$data);	
         }else{
             
             
             $data['daily_transaction'] = $this->model_report->daily_transaction();
             $this->load->view('report/transaction_report',$data);	
             
         }
        
        	
		
	}
    
    public function transaction_date_report(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "tran_report";
        
        $date = $this->uri->segment(3);
       
        if($this->input->post('submit') != ''){
           
            $colony_search = $this->input->post('colony_search');
            $shift_search = $this->input->post('shift');
            $plan = $this->input->post('plan');
            
            $on_date = $date;
            $data['return_colony'] = $colony_search;
            $data['return_shift'] = $shift_search;
            $data['return_plan'] = $plan;
            $data['select_colony'] = $this->model_report->select_colony();
            $data['transaction_detail'] = $this->model_report->transaction_date_multi_searchbar($colony_search,$shift_search,$on_date,$plan);
            $data['select_shift'] = $this->model_report->select_shift();
            $data['select_plan'] = $this->model_report->select_plan();
            
            $this->load->view('report/transaction_date_report',$data);		
            
        }else{
            $data['transaction_detail'] = $this->model_report->transaction_date_report($date);
            $data['select_colony'] = $this->model_report->select_colony();
           $data['select_shift'] = $this->model_report->select_shift();
            $data['select_plan'] = $this->model_report->select_plan();
            $this->load->view('report/transaction_date_report',$data);	
            
        }
        
        
    }
    
    public function recharge_report(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "rech_report";
       
        if($this->input->post('submit') != "" && $this->input->post('start') != "" && $this->input->post('end') != ""){
             
             $start = $this->input->post('start');
             $end = $this->input->post('end');
             $agent_search = $this->input->post('agent_search');
              if($start != 'Start Date'){
                  $data['return_start'] = $start;
              }
             if($end != 'End Date'){
                  $data['return_end'] = $end;
              }
              $data['return_agent'] = $agent_search;
              $data['daily_recharge'] = $this->model_report->recharge_report_search($start,$end,$agent_search);
              $data['select_agent'] = $this->model_report->select_all_agent();
              $this->load->view('report/recharge_report',$data);	
         }else{
             $data['select_agent'] = $this->model_report->select_all_agent();
             $data['daily_recharge'] = $this->model_report->daily_recharge();
             $this->load->view('report/recharge_report',$data);		
             
         }

	}
    
    public function recharge_date_report(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "rech_report";
        
        $date = $this->uri->segment(3);
        $agent_id = $this->uri->segment(4);
        
        if(!isset($agent_id)){
            $agent_id = "";
        }
        
        if($this->input->post('submit') != ''){
           
            $colony_search = $this->input->post('colony_search');
            $delivery_search = $this->input->post('delivery_search');
            $agent_search = $this->input->post('agent_search');
            $plan = $this->input->post('plan');
            
            $on_date = $date;
            
            $data['return_colony'] = $colony_search;
            $data['return_delivery'] = $delivery_search;
            $data['return_agent'] = $agent_search;
            $data['return_plan'] = $plan;
            
            $data['select_colony'] = $this->model_report->select_colony();
            $data['select_agent'] = $this->model_report->select_all_agent();
            $data['select_plan'] = $this->model_report->select_plan();
            $data['recharge_detail'] = $this->model_report->recharge_date_multi_searchbar($colony_search,$on_date,$plan);
            $this->load->view('report/recharge_date_report',$data);		
            
        }else{
             $data['select_colony'] = $this->model_report->select_colony();
             $data['select_agent'] = $this->model_report->select_all_agent();
             $data['select_plan'] = $this->model_report->select_plan();
             $data['recharge_detail'] = $this->model_report->recharge_date_report($date,$agent_id);
             $this->load->view('report/recharge_date_report',$data);	
            
        }
        
        
       
    }
    
    public function agent_report(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "age_report";
        $data['daily_report'] = $this->model_report->daily_agent_report();
        $this->load->view('report/agent_report',$data);		
		
	}
    
    
    public function agent_daily_report($id){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "age_report";
        $data['select_agent'] = $this->model_report->select_agent($id);
        $data['agent_treansaction'] = $this->model_report->agent_treansaction($id);
        $data['agent_recharge'] = $this->model_report->agent_recharge($id);
        $this->load->view('report/agent_daily_report',$data);	
       
    }
    
    public function agent_daily_recharge_report($id){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "age_report";
        $data['select_agent'] = $this->model_report->select_agent($id);
        $data['agent_recharge'] = $this->model_report->agent_recharge($id);
        $this->load->view('report/agent_daily_recharge_report',$data);	
       
    }
    
    public function agent_daily_transaction_report($id){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "age_report";
        $data['select_agent'] = $this->model_report->select_agent($id);
        $data['agent_treansaction'] = $this->model_report->agent_treansaction($id);
        $this->load->view('report/agent_daily_transaction_report',$data);	
       
    }
    public function agent_details_transaction(){
         $data['active_menu'] = "report";
         $data['active_submenu'] = "age_report";
         $team_id =  $this->uri->segment(3);
         $date =  $this->uri->segment(4);
         $data['select_agent'] = $this->model_report->select_agent($team_id);
         $data['transaction'] = $this->model_report->team_detail_transaction($team_id,$date);
         $this->load->view('report/agent_details_transaction',$data);	
        
    }
    
    public function agent_details_recharge(){
         $data['active_menu'] = "report";
         $data['active_submenu'] = "age_report";
         $team_id =  $this->uri->segment(3);
         $date =  $this->uri->segment(4);
         $data['select_agent'] = $this->model_report->select_agent($team_id);
         $data['recharge'] = $this->model_report->team_detail_recharge($team_id,$date);
         $this->load->view('report/agent_details_recharge',$data);	
        
    }
    
    public function tranreport_section_searchbar(){
        
        if(isset($_POST['start_date'],$_POST['end_date'])){
            
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $this->model_report->tranreport_section_searchbar($start_date,$end_date);
        }else{
            
            echo "Something wrong";
        }
        
    }
    
    public function recharge_section_searchbar(){
        
        if(isset($_POST['start_date'],$_POST['end_date'])){
            
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $this->model_report->recharge_section_searchbar($start_date,$end_date);
        }else{
            
            echo "Something wrong";
        }
    }
    
    public function agent_transection_searchbar(){
        if(isset($_POST['start_date'],$_POST['end_date'],$_POST['team_id'])){
            
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $team_id = $_POST['team_id'];
            
            $this->model_report->agent_transection_searchbar($start_date,$end_date,$team_id);
        }else{
            
            echo "Something wrong";
        }
        
        
    }
    
    public function agent_recharge_searchbar(){
        if(isset($_POST['start_date'],$_POST['end_date'],$_POST['team_id'])){
            
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $team_id = $_POST['team_id'];
            
            $this->model_report->agent_recharge_searchbar($start_date,$end_date,$team_id);
        }else{
            
            echo "Something wrong";
        }
        
    }
    
    public function customerreport_recharge_searchbar(){
        if(isset($_POST['start_date'],$_POST['end_date'],$_POST['link_id'])){
            
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $link_id = $_POST['link_id'];
            
            $this->model_report->customerreport_recharge_searchbar($start_date,$end_date,$link_id);
        }else{
            
            echo "Something wrong";
        }
        
    }
    
    public function customerreport_tran_searchbar(){
        
        if(isset($_POST['start_date'],$_POST['end_date'],$_POST['link_id'])){
            
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $link_id = $_POST['link_id'];
            
            $this->model_report->customerreport_tran_searchbar($start_date,$end_date,$link_id);
        }else{
            
            echo "Something wrong";
        }
        
    }
    
	public function searchbar(){
					
		if(isset($_POST["search_by"],$_POST["search_for"])){
			
			$search_by  =  $_POST["search_by"];
			$search_for  =   $_POST["search_for"];
			$this->model_report->searchbar_result($search_by,$search_for);
		}else{
			echo "Something Wrong";
			
		}			
		
	}
	public function searchbar_like(){
					
		if(isset($_POST["search_by"],$_POST["search_for"])){
			
			$search_by  =  $_POST["search_by"];
			$search_for  =   $_POST["search_for"];
			
		    echo $search_by.$search_for;
			
			$this->model_report->searchbar_like_result($search_by,$search_for);
		}else{
			echo "Something Wrong";
			
		}			
		
	}
    
    public function searchbar_like_list(){
					
		if(isset($_POST["search_by"],$_POST["search_for"])){
			
			$search_by  =  $_POST["search_by"];
			$search_for  =   $_POST["search_for"];
			
		    echo $search_by.$search_for;
			
			$this->model_report->searchbar_like_list($search_by,$search_for);
		}else{
			echo "Something Wrong";
			
		}			
		
	}
	
     public function searchbar_like_list_number(){
					
		if(isset($_POST["search_by"],$_POST["search_for"])){
			
			$search_by  =  $_POST["search_by"];
			$search_for  =   $_POST["search_for"];
			
		    echo $search_by.$search_for;
			
			$this->model_report->searchbar_like_list_number($search_by,$search_for);
		}else{
			echo "Something Wrong";
			
		}			
		
	}        
        
	public function searchbar_name(){
					
		if(isset($_POST["search_by"])){
			
			$search_by  =  $_POST["search_by"];
			$firstname  =   $_POST["firstname"];
			$lastname  =   $_POST["lastname"];
			
		   
			
			$this->model_report->searchbar_name_result($search_by,$firstname,$lastname);
		}else{
			echo "Something Wrong";
			
		}			
		
	}
    
    public function searchbar_list(){
					
		if(isset($_POST["search_by"])){
			
			$search_by  =  $_POST["search_by"];
			$firstname  =   $_POST["firstname"];
			$lastname  =   $_POST["lastname"];
			
		   
			
			$this->model_report->searchbar_list_name($search_by,$firstname,$lastname);
		}else{
			echo "Something Wrong";
			
		}			
		
	}
	
	public function search_by_date(){
					
		if(isset($_POST["from_date"],$_POST["to_date"])){
			
			$from_date  =  $_POST["from_date"];
			$to_date  =  $_POST["to_date"];
		
			 $this->model_report->search_by_date_result($from_date,$to_date);
		}else{
			echo "Something Wrong";
			
		}			
		
	}
    
    
    public function atm_card_report(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "atm_card_report";
        if($this->input->post('submit') != ''){
           
            $card_search = $this->input->post('card_search');
            $status_search = $this->input->post('status_search');
           
            $data['return_card_search'] = $card_search;
            $data['return_status']  =   $status_search;
            
            $data['atm_card_report'] = $this->model_report->atm_card_report_searchbar($card_search,$status_search);
            $this->load->view('report/atm_card_report',$data);		
            
        }else{
             $data['atm_card_report'] = $this->model_report->atm_card_report();
             $this->load->view('report/atm_card_report',$data);		
        }
    
       
		
	} 

	public function change_atm_card_status(){
        $data['active_menu'] = "management";
        $data['active_submenu'] = "atm_card_status";
        if($this->input->post('submit') != ''){
           
            $card_search = $this->input->post('card_search');
            $status_search = $this->input->post('status_search');
           
            $data['return_card_search'] = $card_search;
            $data['return_status']  =   $status_search;
            
            $data['atm_card_status'] = $this->model_report->atm_card_status_searchbar($card_search,$status_search);
            $this->load->view('report/atm_card_status',$data);		
            
        }else if(isset($_POST['status'],$_POST['id'])){
            
            $status = $_POST['status'];
            $id = $_POST['id'];
            $this->model_report->atm_card_status_update($status,$id);
        }else{
            
             $this->load->view('report/atm_card_status',$data);		
        }
        
        
        
        
    }
    
//=========********===========********========******========//
// ************ Orders Reports Section ***********//
//=========********===========********========******========//    
     public function order_report(){
			$data['active_menu'] = "report";
			$data['active_submenu'] = "order_report";

		 if($this->input->post('submit') != '' && $this->input->post('start') != "Start Date" && $this->input->post('end') != "End Date"){

						$start = $this->input->post('start');
						$end = $this->input->post('end');
						$customer_id = $this->input->post('customer_id');


						 $data['return_start'] = $start;
						 $data['return_end'] = $end;
						 $data['return_card'] = $customer_id;
				$data['order_report'] = $this->model_report->order_report($start,$end,$customer_id);
				$data['all_customer_list'] = $this->model_report->select_all_customers_for_drop_down();
		        $this->load->view('report/order_report',$data);
      }else{
						$data['all_customer_list'] = $this->model_report->select_all_customers_for_drop_down();

						//echo json_encode($data);
						$this->load->view('report/order_report',$data);
      }

	 }
}
