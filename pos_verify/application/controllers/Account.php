  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account extends CI_Controller {

	
  public function account_details(){
  	   $this->load->model('model_account');
		$data['list'] = $this->model_account->get();
		$this->load->view('accounting/account_list_view',$data);
	}

	public function add(){
		if($this->input->post('submit')){
  	   $account_no=$this->input->post('account_no');
       $account_name=$this->input->post('account_name');
       $initial_balance=$this->input->post('initial_balance');
       $total_balance=$this->input->post('total_balance');
       $note=$this->input->post('note');
       $this->load->model('model_account');
       $this->model_account->add($account_no,$account_name,$initial_balance,$total_balance,$note);
 
    }else{
       $this->load->model('model_account');
       $data["select_account"] = $this->model_account->select_account1();
      $this->load->view('accounting/add_account_list',$data);    
  }  
 	}
	public function delete(){  
    if(isset($_POST['vdelv'])){

      $del_id = $_POST['vdelv'];
      $this->load->model('model_account');
      $this->model_account->delete_data($del_id);
    }
    //echo $id;
   // 
  }
  public function edit(){
    $edit_id = $this->uri->segment(3);
   if($this->input->post('submit')){
  	   $account_no=$this->input->post('account_no');
       $account_name=$this->input->post('account_name');
       $initial_balance=$this->input->post('initial_balance');
       $total_balance=$this->input->post('total_balance');
       $note=$this->input->post('note');
       $this->load->model('model_account');
       $this->model_account->edit($edit_id,$account_no,$account_name,$initial_balance,$total_balance,$note);
 
    }else{
    	$this->load->model('model_account');
    	 $data['selected_list'] = $this->model_account->selected($edit_id);
      $this->load->view('accounting/edit_account_list',$data);    
  }  
}


//************************** ========================================================  //
//*************************Money Transfer********************************************//

   public function money_transfer_details(){
	  $this->load->model('model_account');
		$data['list'] = $this->model_account->get_money();
		$this->load->view('accounting/money_transfer_view',$data);

   }

   public function add_money(){
		if($this->input->post('submit')){
       $reference_no=$this->input->post('reference_no');
       $from_account_id=$this->input->post('from_account_id');
       $to_account_id=$this->input->post('to_account_id');
       $amount=$this->input->post('amount');
       $created_at=$this->input->post('created_at');
       $this->load->model('model_account');
       $this->model_account->add_money($created_at,$reference_no,$from_account_id,$to_account_id,$amount);
 
    }else{
      $this->load->view('accounting/add_money');    
  }  
 	}
 	public function delete_money(){  
    if(isset($_POST['vdelv'])){

      $del_id = $_POST['vdelv'];
      $this->load->model('model_account');
      $this->model_account->delete_money($del_id);
    }
    //echo $id;
   // 
  }

   public function edit_money(){
    $edit_id = $this->uri->segment(3);
   if($this->input->post('submit')){
       $reference_no=$this->input->post('reference_no');
       $from_account_id=$this->input->post('from_account_id');
       $to_account_id=$this->input->post('to_account_id');
       $amount=$this->input->post('amount');
       $updated_at=$this->input->post('updated_at');
       $this->load->model('model_account');
       $this->model_account->edit_money($edit_id,$reference_no,$from_account_id,$to_account_id,$amount,$updated_at);
 
    }else{
        $this->load->model('model_account');
        $data['from_account_list'] = $this->model_account->select_all_from_account();
    	 $data['selected_money'] = $this->model_account->selected_money($edit_id);
        
      $this->load->view('accounting/edit_money',$data);    
  }  
}
//*************************************Balance Sheet Details********************************************************************************************************************************************************

  Public function balance_sheet_details(){

    $this->load->model('model_account');
    $data['list'] = $this->model_account->get_balance_sheet();
    $this->load->view('accounting/balance_sheet',$data);
  }

  Public function account_statement(){

    $this->load->model('model_account');

    if($this->input->post('submit')){
           
            $start_date = $this->input->post('start');
             $end_date = $this->input->post('end');

         //echo  $start_date.$end_date;
          $data['list'] = $this->model_account->select_account_statement($start_date,$end_date);

        //  print_r($data);
            $this->load->view('accounting/account_statement',$data);

    }else{

       $this->load->view('accounting/account_statement');
    }

  
   
  }
   
}
?>