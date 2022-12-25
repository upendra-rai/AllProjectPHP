<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class footer extends CI_Controller {

	function __construct(){

		parent::__construct();

	}
    
    public function index(){
        echo  'ssss';
    }
    
     public function footer(){
        $this->load->view('footer');
    }
	
}
