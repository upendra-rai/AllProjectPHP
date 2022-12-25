<?php  
  class controller extends CI_Controller{
public function index()
  {
  	 $this->load->model('model');

  	$data['list'] = $this->model->getAllProducts();
  	$data['list1'] = $this->model->getjoinProducts();
  	$data['list2'] = $this->model->getjointProducts();
  	$data['list3'] = $this->model->getabout();
  	$data['list4'] = $this->model->getfuture();
  	$data['list5'] = $this->model->getservice();
  	$data['list6'] = $this->model->getmain();
    $data['list7'] = $this->model->gettestmonial();


    $this->load->view('home',$data);
   
  }
  
  }
?>