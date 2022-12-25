<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class add_customer extends CI_Controller {
    
	function __construct(){

		parent::__construct();
		$this->load->library('session');
        $this->load->helper('form');
        $this->load->model('model_addcustomer');
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
	public function add_customer(){
        $data['active_menu'] = "customer";
        if($this->input->post('firstname') != ''){
            
            $firstname  =  $this->input->post("firstname");
			$mobileno  =  $this->input->post("mobileno");
            $mobileno2  =  $this->input->post("mobileno2");
            if($mobileno2 == ''){
                
                $mobileno2 = null;
            }
            
			//$email  =  $this->input->post("email");
			$address1  =  $this->input->post("address1");
            $address2  =  $this->input->post("address2");
			$colony  =  $this->input->post("colony");
            $shift  =  $this->input->post("shift");
            $advance_payment  =  $this->input->post("advance_payment");
            
			$gender  =  $this->input->post("gender");
            $dob  =  $this->input->post("dob");
			//$user_id  =  $this->input->post("user_id");
			$password  =  $this->input->post("password");
            
            $weight  =  $this->input->post("weight");
            $height  =  $this->input->post("height");
            $allergy  =  $this->input->post("allergy");
            $reffrence  =  $this->input->post("refrence");
            
            //echo $firstname.$mobileno.$mobileno2.$email.$address1.$colony.$gender.$dob.$user_id.$password;
           $data['message'] =  $this->model_addcustomer->add_customer_submit($firstname,$mobileno,$mobileno2,$address1,$address2,$colony,$gender,$dob,$weight,$height,$allergy,$reffrence,$password);
           if($data['message'] == "failed"){
               $data['r_first_name'] = $firstname;
               $data['r_mobileno'] = $mobileno;
               $data['r_mobileno2'] = $mobileno2;
               //$data['r_email'] = $email;
               $data['r_address1'] = $address1;
               $data['r_address2'] = $address2;
               $data['r_colony'] = $colony;
               //$data['r_shift'] = $shift;
               //$data['r_advance_payment'] = $advance_payment;
               $data['r_gender'] = $gender;
               $data['r_dob'] = $dob;
              // $data['r_user_id'] = $user_id;
               $data['r_password'] = $password;
                $data['r_weight'] = $weight;
               $data['r_height'] = $height;
               $data['r_allergy'] = $allergy;
               $data['r_refrence'] = $reffrence;
               
               $data['select_colony'] = $this->model_addcustomer->select_colony();
               $this->load->view('customer/add_customer',$data);
           }else if($data['message'] == "invalid_mobile"){
               $data['r_first_name'] = $firstname;
               $data['r_mobileno'] = $mobileno;
               $data['r_mobileno2'] = $mobileno2;
               //$data['r_email'] = $email;
               $data['r_address1'] = $address1;
               $data['r_address2'] = $address2;
               $data['r_colony'] = $colony;
               //$data['r_shift'] = $shift;
               //$data['r_advance_payment'] = $advance_payment;
               $data['r_gender'] = $gender;
               $data['r_dob'] = $dob;
              // $data['r_user_id'] = $user_id;
               $data['r_password'] = $password;
                $data['r_weight'] = $weight;
               $data['r_height'] = $height;
               $data['r_allergy'] = $allergy;
               $data['r_refrence'] = $reffrence;
               $data['select_colony'] = $this->model_addcustomer->select_colony();
               $this->load->view('customer/add_customer',$data);
               
           }else{
               $data['select_colony'] = $this->model_addcustomer->select_colony();
               $this->load->view('customer/add_customer',$data);
           }
           
        }else{
           $data['select_colony'] = $this->model_addcustomer->select_colony();
		   $this->load->view('customer/add_customer',$data);
        }
	}

}
