<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class qrcode extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		$this->load->library('session');
        $this->load->helper('form');
        $this->load->model('model_qrcode');
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
        $this->load->helper('form');
		$this->load->view('customer/add_customer', $data);

	}
/*  //////// Add Customer /////// */
	public function add_plan(){
        $data['active_menu'] = "plan_list";
        if($this->input->post('duraction') != ''){
            
            $duraction  =  $this->input->post("duraction");
            $cost  =  $this->input->post("cost");
            $tifin_qty  =  $this->input->post("tifin_qty");
            $per_tifin_price  =  $this->input->post("per_tifin_price");
			$shift  =  $this->input->post("shift");
            $discription  =  $this->input->post("discription");
			
           $data['message'] =  $this->model_plan->add_plan_submit($duraction,$cost,$tifin_qty,$per_tifin_price,$shift,$discription);
           
        }else{
           
		   $this->load->view('plan/add_plan',$data);
        }
	}
    
    public function edit_plan($id){
        $data['active_menu'] = "plan_list";
        if($this->input->post('duraction') != ''){
            
            $duraction  =  $this->input->post("duraction");
            $cost  =  $this->input->post("cost");
            $tifin_qty  =  $this->input->post("tifin_qty");
            $per_tifin_price  =  $this->input->post("per_tifin_price");
			$shift  =  $this->input->post("shift");
            $discription  =  $this->input->post("discription");
			
           $data['message'] =  $this->model_plan->edit_plan_submit($duraction,$cost,$tifin_qty,$per_tifin_price,$shift,$id,$discription);
           
        }else{
           $data['selected_plan'] =  $this->model_plan->selected_plan($id);
		   $this->load->view('plan/add_plan',$data);
        }
	}
    
    public function qrcode_list(){
            $data['active_menu'] = "management";
        $data['active_submenu'] = "qrcode";
        if($this->input->post('submit') != ''){
           
            $name_search = $this->input->post('name_search');
            $colony_search = $this->input->post('colony_search');
            $plan = $this->input->post('plan');
            
            $data['return_name'] = $name_search;
            $data['return_colony'] = $colony_search;
           
            $data['return_plan'] = $plan;
            
            $data['select_colony'] = $this->model_qrcode->select_colony();
            $data['select_plan'] = $this->model_qrcode->select_plan();
            $data['all_customer'] = $this->model_qrcode->customer_report_multi_searchbar($name_search,$colony_search,$plan);
            $this->load->view('qrcode/qrcode',$data);		
            
        }else{
             $data['all_customer'] = $this->model_qrcode->select_customer_report();
             $data['select_plan'] = $this->model_qrcode->select_plan();
             $data['select_colony'] = $this->model_qrcode->select_colony();
             $this->load->view('qrcode/qrcode',$data);		
        }
    
    }
    
    public function delete_plan(){
                
          if(isset($_POST['del_id'])){
              
              $del_id = $_POST['del_id'];
              $this->model_plan->delete_plan($del_id);
          }
    }

}
