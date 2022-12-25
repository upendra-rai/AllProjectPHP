<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class cart extends CI_Controller {

	function __construct(){

		parent::__construct();

        $this->load->model('model_home');
	}
    
    public function index(){
        
         $data['list']  = $this->model_home->selectcart();
        
       // echo json_encode($data);
        $this->load->view('cart',$data);
    }
    
	
}
