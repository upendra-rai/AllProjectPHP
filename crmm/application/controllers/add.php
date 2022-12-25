<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class add extends CI_Controller {

	public function add_product()
  {
		$this->load->view('add_view');
  }
}
