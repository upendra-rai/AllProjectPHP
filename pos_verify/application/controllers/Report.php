<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class report extends CI_Controller {

	function __construct(){

		parent::__construct();

		     $this->load->library('session');
         $this->load->helper('form');
         $this->load->model('model_report');
         if($this->session->userdata('logged_in') !== 'verifysoft_pos'){
			        redirect('./admin/login');
	      	}
	}
	public function init_user(){
       $user_id = $this->session->userdata('uid');
			 $data["user_data"] = $this->model_parameter->select_userdata($user_id);
       return $data;
	}

	public function index(){

	}

    
//=========********===========********========******========//
// ************ Transaction Report section ***********//
//=========********===========********========******========//    
	public function transaction_report(){

        $data['active_menu'] = "report";
        $data['active_submenu'] = "transaction_report";


         if($this->input->post('submit') != ''){

             $start = $this->input->post('start');
             $end = $this->input->post('end');
             $payment_mode = $this->input->post('payment_mode');
             $order_status = $this->input->post('order_status');
             
              
              $data['return_start'] = $start;
              $data['return_end'] = $end;
              $data['return_payment_mode'] = $payment_mode;
              $data['return_order_status'] = $order_status;
             
              $data['daily_transaction'] = $this->model_report->transaction_report_search($start,$end,$payment_mode,$order_status);
              $this->load->view('report/transaction_report',$data);
         }else{
           //  $data['select_agent'] = $this->model_report->select_all_agent();
            // $data['select_product'] = $this->model_report->select_product();
             $data['daily_transaction'] = $this->model_report->daily_transaction();
           //  $data['select_shift'] = $this->model_report->select_shift();
             $this->load->view('report/transaction_report',$data);

         }

      

	}
    
    public function transaction_full_report(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "transaction_report";

        $date = $this->uri->segment(3);
       
         $data['return_date'] = $date;
        if($this->input->post('submit') != ''){

             $name = $this->input->post('name');
             $mobile_no = $this->input->post('mobile_no');
             $payment_mode = $this->input->post('payment_mode');
             $order_status = $this->input->post('order_status');
              
              $data['return_name'] = $name;
              $data['return_mobile_no'] = $mobile_no;
              $data['return_payment_mode'] = $payment_mode;
              $data['return_order_status'] = $order_status;
            $data['transaction_detail'] = $this->model_report->transaction_date_multi_searchbar($name,$mobile_no,$payment_mode,$order_status,$date);
            $this->load->view('report/transaction_full_report',$data);

        }else{


            $data['transaction_detail'] = $this->model_report->transaction_full_report($date);
           // $data['select_colony'] = $this->model_report->select_colony();
          //    $data['select_agent'] = $this->model_report->select_all_agent();
            //$data['select_shift'] = $this->model_report->select_shift();
            $this->load->view('report/transaction_full_report',$data);

        }


    }
    
//=========********===========********========******========//
// ************Recharge Report section ***********//
//=========********===========********========******========//    
   public function recharge_report(){

        $data['active_menu'] = "report";
        $data['active_submenu'] = "recharge_report";


         if($this->input->post('submit') != ''){

             $start = $this->input->post('start');
             $end = $this->input->post('end');
             $payment_mode = $this->input->post('payment_mode');
            
              
              $data['return_start'] = $start;
              $data['return_end'] = $end;
              $data['return_payment_mode'] = $payment_mode;
              
              $data['list'] = $this->model_report->recharge_report_search($start,$end,$payment_mode);
              $this->load->view('report/recharge_report',$data);
         }else{
           //  $data['select_agent'] = $this->model_report->select_all_agent();
            // $data['select_product'] = $this->model_report->select_product();
             $data['list'] = $this->model_report->daily_recharge();
           //  $data['select_shift'] = $this->model_report->select_shift();
             $this->load->view('report/recharge_report',$data);

         }
	}
    
    public function recharge_full_report(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "recharge_report";

        $date = $this->uri->segment(3);
        $data['return_date'] = $date;
        if($this->input->post('submit') != ''){

             $name = $this->input->post('name');
             $mobile_no = $this->input->post('mobile_no');
             $payment_mode = $this->input->post('payment_mode');
             
              $data['return_name'] = $name;
              $data['return_mobile_no'] = $mobile_no;
              $data['return_payment_mode'] = $payment_mode;
             
            $data['list'] = $this->model_report->recharge_date_multi_searchbar($name,$mobile_no,$payment_mode,$date);
            $this->load->view('report/recharge_full_report',$data);

        }else{


            $data['list'] = $this->model_report->recharge_full_report($date);
           // $data['select_colony'] = $this->model_report->select_colony();
          //    $data['select_agent'] = $this->model_report->select_all_agent();
            //$data['select_shift'] = $this->model_report->select_shift();
            $this->load->view('report/recharge_full_report',$data);

        }


    }
    
//=========********===========********========******========//
// ************Order Report section ***********//
//=========********===========********========******========//     
    public function order_report(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "order_report";

        $date = $this->uri->segment(3);
        $data['return_date'] = $date;
        if($this->input->post('submit') != ''){
             $start = $this->input->post('start');
             $end = $this->input->post('end');
             $name = $this->input->post('name');
             $mobile_no = $this->input->post('mobile_no');
             $order_status = $this->input->post('order_status');
             
              
              $data['return_start'] = $start;
              $data['return_end'] = $end;
              $data['return_name'] = $name;
              $data['return_mobile_no'] = $mobile_no;
              $data['return_order_status'] = $order_status;
              
            $data['list'] = $this->model_report->order_multi_searchbar($start,$end,$name,$mobile_no,$order_status);
            $this->load->view('report/order_report',$data);

        }else{


            $data['list'] = $this->model_report->order_full_report($date);
           // $data['select_colony'] = $this->model_report->select_colony();
          //    $data['select_agent'] = $this->model_report->select_all_agent();
            //$data['select_shift'] = $this->model_report->select_shift();
            $this->load->view('report/order_report',$data);

        }


    }
    
    
    public function product_report(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "product_report";

        $date = $this->uri->segment(3);
        $data['return_date'] = $date;
        if($this->input->post('submit') != ''){
             $start = $this->input->post('start');
             $end = $this->input->post('end');
             $name = $this->input->post('name');
             $mobile_no = $this->input->post('mobile_no');
             $order_status = $this->input->post('order_status');
             
              
              $data['return_start'] = $start;
              $data['return_end'] = $end;
              $data['return_name'] = $name;
              $data['return_mobile_no'] = $mobile_no;
              $data['return_order_status'] = $order_status;
              
            $data['list'] = $this->model_report->order_multi_searchbar($start,$end,$name,$mobile_no,$order_status);
            $this->load->view('report/product_report',$data);

        }else{


            $data['list'] = $this->model_report->order_full_report($date);
           // $data['select_colony'] = $this->model_report->select_colony();
          //    $data['select_agent'] = $this->model_report->select_all_agent();
            //$data['select_shift'] = $this->model_report->select_shift();
            $this->load->view('report/product_report',$data);

        }


    }
    
//=========********===========********========******========//
// ************Customer Report section ***********//
//=========********===========********========******========//     
     public function customer_report(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "customer_report";

        $date = $this->uri->segment(3);
        $data['return_date'] = $date;
        if($this->input->post('submit') != ''){
             $start = $this->input->post('start');
             $end = $this->input->post('end');
             $name = $this->input->post('name');
             $mobile_no = $this->input->post('mobile_no');
             $order_status = $this->input->post('order_status');
             
              
              $data['return_start'] = $start;
              $data['return_end'] = $end;
              $data['return_name'] = $name;
              $data['return_mobile_no'] = $mobile_no;
              $data['return_order_status'] = $order_status;
              
            $data['list'] = $this->model_report->order_multi_searchbar($start,$end,$name,$mobile_no,$order_status);
            $this->load->view('report/order_report',$data);

        }else{


            $data['list'] = $this->model_report->customer_report($date);
            $this->load->view('report/customer_report',$data);

        }


    }

//=========********===========********========******========//
// ************ product Sale Report***********//
//=========********===========********========******========// 
  public function product_sale(){
        $data['active_menu'] = "report";
        $data['active_submenu'] = "product_sale";

        $date = $this->uri->segment(3);
        $data['return_date'] = $date;
        if($this->input->post('submit') != ''){
             $start = $this->input->post('start');
             $end = $this->input->post('end');
             $product = $this->input->post('product');             
              //echo $start,$end;
              $data['return_start'] = $start;
              $data['return_end'] = $end;
              $data['product'] = $product;
            $data['product_list'] = $this->model_report->product_searchbar();
            $data['list'] = $this->model_report->product_sale_report($start,$end,$product);
           // print_r($data['list']);
           $this->load->view('report/product_sale_report',$data);

        }else{

            $start = '';
            $end = '';
            $product = '';

            $data['product_list'] = $this->model_report->product_searchbar();
            $data['list'] = $this->model_report->product_sale_report($start,$end,$product);
            $this->load->view('report/product_sale_report',$data);

        }
    } 

//=========********===========********========******========//
// ************ product Sale Report***********//
//=========********===========********========******========//
    public function sale_report(){


         $data['active_menu'] = "report";
        $data['active_submenu'] = "sale_report";

        $date = $this->uri->segment(3);
        $data['return_date'] = $date;
        if($this->input->post('submit') != ''){
             $start = $this->input->post('start');
             $end = $this->input->post('end');
             $outlet_name = $this->input->post('outlet_name');
             $user_name = $this->input->post('user_name');             
              //echo $start,$end;
              $data['return_start'] = $start;
              $data['return_end'] = $end;
              $data['outlet_name'] = $outlet_name;
              $data['user_name'] = $user_name;
            $data['sale_list1'] = $this->model_report->sale_searchbar1();
            $data['sale_list'] = $this->model_report->sale_searchbar();
            $data['list'] = $this->model_report->getsale($start,$end,$outlet_name,$user_name);
           // print_r($data['list']);
           $this->load->view('report/sale_report',$data);

        }else{

            $start = '';
            $end = '';
            $outlet_name = '';
            $user_name = '';
            $data['sale_list1'] = $this->model_report->sale_searchbar1();
            $data['sale_list'] = $this->model_report->sale_searchbar();
           $data['list'] = $this->model_report->getsale($start,$end,$outlet_name,$user_name);
           $this->load->view('report/sale_report',$data);

        }
  }
  public function summery_report(){
    $data['summery_details'] = $this->model_report->summery_report();
      $data['sale_details'] = $this->model_report->sale_report();
    $this->load->view('report/summery_report',$data);
  }
}
