<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {

	function __construct(){

		parent::__construct();
		$this->load->model('model_admin');		

		if($this->session->userdata('logged_in') == 'sharmadairy_in'){
			redirect('./dashboard');
		}		
	}	

	public function index(){

		redirect('./admin/login');
	}	

	public function login(){
		if($this->input->post('submit') != ''){
			$data['message'] = $this->model_admin->login();
			$this->load->view('my-details/login', $data);			
		} else {
			$this->load->view('my-details/login');
		}
	}
    
    public function update_pic($thumb_img, $uid){
		$arr = array(
				'image' => $thumb_img
			);

		$this->db->where('user_id', $uid);
		if($this->db->update('team_member', $arr)){
			return '<div id="notification" class="alert alert-success">Profile picture updated.</div>';
		} else {
			return '<div id="notification" class="alert alert-danger">Something went wrong.</div>';
		}
	}

	public function update_info($uid){
		$fname = ucfirst(strtolower($this->input->post('fname')));
		$lname = ucfirst(strtolower($this->input->post('lname')));
		$email = $this->input->post('email');
		$arr = array(
				'name' => $fname,
				'email' => $email
			);
		$this->db->where('user_id', $uid);
		if($this->db->update('team_member', $arr)){
			return '<div id="notification" class="alert alert-success">Profile successfully updated.</div>';
		} else {
			return '<div id="notification" class="alert alert-danger">Something went wrong.</div>';
		}
	}

	public function update_pass($uid){
		$password = $this->input->post('password');
		$arr = array(
				'password' => $password
			);
		$this->db->where('user_id', $uid);
		if($this->db->update('team_member', $arr)){
			return '<div id="notification" class="alert alert-success">Password successfully updated.</div>';
		} else {
			return '<div id="notification" class="alert alert-danger">Something went wrong.</div>';
		}

	} 
	
}