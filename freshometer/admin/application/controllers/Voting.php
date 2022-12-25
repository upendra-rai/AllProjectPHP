<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class voting extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		$this->load->library('session');
        $this->load->helper('form');
        $this->load->model('model_voting');
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
        $data['active_menu'] = "voting";
        $this->load->helper('form');
        
        if($this->input->post('selected_menu')){
            
            $menu = $this->input->post('selected_menu');
            $menu_id = $this->input->post('menu_id');
            
            $data['message'] =  $this->model_voting->add_special_menu($menu,$menu_id);
            $data['select_special_menu'] =  $this->model_voting->select_special_menu();
            $data["product"] = $this->model_voting->select_product();
            $this->load->view('voting/voting', $data);
            
        }else{
             $data['select_special_menu'] =  $this->model_voting->select_special_menu();
            $data["product"] = $this->model_voting->select_product();
            $this->load->view('voting/voting', $data);
        }
        
		

	}
/*  //////// Add Customer /////// */
	public function add_plan(){
        $data['active_menu'] = "customer";
        if($this->input->post('duraction') != ''){
            
            $duraction  =  $this->input->post("duraction");
			$menu  =  $this->input->post("menu");
            $cost  =  $this->input->post("cost");
			$shift  =  $this->input->post("shift");
			
            
            //echo $firstname.$mobileno.$mobileno2.$email.$address1.$colony.$gender.$dob.$user_id.$password;
           $data['message'] =  $this->model_addplan->add_plan_submit($duraction,$menu,$cost,$shift);
           if($data['message'] == "failed"){
               $data['r_duraction'] = $duraction;
               $data['r_menu'] = $menu;
               $data['r_cost'] = $cost;
               $data['r_shift'] = $shift;
               $this->load->view('plan/add_plan',$data);
           }else{
              
               $this->load->view('plan/add_plan',$data);
           }
           
        }else{
           
		   $this->load->view('plan/add_plan',$data);
        }
	}

}
