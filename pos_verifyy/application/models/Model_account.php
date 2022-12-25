<?php
class model_account extends CI_Model{

	public  function get(){
		$data=$this->db->get('accounts');
		if ($data) {
         	return $data->result();
         }
	}
	public function add($account_no,$account_name,$initial_balance,$total_balance,$note){
		$data = array(
			'account_no' =>$account_no,
			'account_name'=>$account_name,
			'initial_balance'=>$initial_balance,
			'total_balance'=>$total_balance,
			'note'=>$note,
		);
		if($this->db->insert('accounts',$data)){
 				echo 'success';
          redirect(base_url().'/account/account_details');
          
       }else{
          echo 'Already Exist';

       };
	}
  public function select_account1(){
    $this->db->select('*');
      $this->db->from('accounts');
      $data=$this->db->get();
       return $data->result();
  }
	public function delete_data($id){
		$this->db->where('account_id',$id);
    if($this->db->delete('accounts')){
        echo 'success';

           }else{
              echo 'failed';
           }
  }
  public function edit($edit_id,$account_no,$account_name,$initial_balance,$total_balance,$note){
  	$data = array(
			'account_no' =>$account_no,
			'account_name'=>$account_name,
			'initial_balance'=>$initial_balance,
			'total_balance'=>$total_balance,
			'note'=>$note
		);
     	$this->db->where('account_id',$edit_id);
		if($this->db->update('accounts',$data)){
 				echo 'success';
          redirect(base_url().'/account/account_details');
          
       }else{
          echo 'failed';

       };
  }
  public function selected($edit_id){
      $this->db->select('*');
      $this->db->where('account_id',$edit_id);
      $this->db->from('accounts');
      $data=$this->db->get();

       return $data->result();

  }


  //****************************** Money Transfer*****************************

//*********************************************************************************
   public  function get_money(){
     $this->db->select('*, t1.account_name AS from_account_name , t2.account_name AS to_account_name, money_transfers.updated_at AS money_transfer_date');
         $this->db->from('money_transfers');
         $this->db->join('accounts t1','t1.account_id = money_transfers.from_account_id');
         $this->db->join('accounts t2','t2.account_id = money_transfers.to_account_id');
         $data = $this->db->get();
         return $data->result();
		
		
	}
	public function add_money($created_at,$reference_no,$from_account_id,$to_account_id,$amount){
			$date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');

        echo $to_account_id;
		$data = array(
			
			'reference_no'=>$reference_no,
			'from_account_id'=>$from_account_id,
			'to_account_id'=>$to_account_id,
			'amount'=>$amount,
			'created_at' =>$time_stamp,
			'updated_at'=>$time_stamp,
		);
		if($this->db->insert('money_transfers',$data)){
 		    $this->db->where('account_id',$from_account_id);
           $this->db->set('total_balance','total_balance -'.$amount, FALSE);
           if($this->db->update('accounts')){

           	    $this->db->where('account_id',$to_account_id);
           	    $this->db->set('total_balance','total_balance +'.$amount, FALSE);
           	    if($this->db->update('accounts')){
           	    	echo 'success';
           	    	redirect(base_url().'/account/money_transfer_details');
           	    }else{
           	    	echo 'failed';
           	    }

           }else{
           	echo 'failed';
           }
          
          
       }else{
          echo 'Failed';

       };


	}

   public function delete_money($id){
		$this->db->where('id',$id);
    if($this->db->delete('money_transfers')){
        echo 'success';

           }else{
              echo 'failed';
           }
    }


 public function edit_money($edit_id,$reference_no,$from_account_id,$to_account_id,$amount,$updated_at){

 	$date = new DateTime();
        $time_stamp = $date->format('Y-m-d H:i:s');
 	//echo $updated_at; 

   $get_last_transfer =  $this->db->get_where('money_transfers',array('money_transfer_id' => $edit_id ));

 if($get_last_transfer->num_rows() == 1){
   $last_transfer_amount = $get_last_transfer->result()[0]->amount;

 	$this->db->where('account_id',$from_account_id);
             $this->db->set('total_balance','total_balance +'.$last_transfer_amount, FALSE);
             if($this->db->update('accounts')){

           	    $this->db->where('account_id',$to_account_id);
           	    $this->db->set('total_balance','total_balance -'.$last_transfer_amount, FALSE);
           	    if($this->db->update('accounts')){
           	         	$data = array(
								'reference_no'=>$reference_no,
								'from_account_id'=>$from_account_id,
								'to_account_id'=>$to_account_id,
								'amount'=>$amount,
								'updated_at' =>$time_stamp

							);
					     	                $this->db->where('money_transfer_id',$edit_id);
						if($this->db->update('money_transfers',$data)){
				 				echo 'success';
				 			 $this->db->where('account_id',$from_account_id);
				             $this->db->set('total_balance','total_balance -'.$amount, FALSE);
				             if($this->db->update('accounts')){

				           	    $this->db->where('account_id',$to_account_id);
				           	    $this->db->set('total_balance','total_balance +'.$amount, FALSE);
				           	    if($this->db->update('accounts')){
				           	    	echo 'success';
				           	    	redirect(base_url().'/account/money_transfer_details');
				           	    }else{
				           	    	echo 'failed5';
				           	    }

				           }else{
				           	echo 'failed4';
				           }
				         redirect(base_url().'/account/money_transfer_details');
				          
				       }else{
				          echo 'failed3';

				       };
           	    	
           	    }else{
           	    	echo 'failed2';
           	    }

           }else{
           	echo 'failed1';
           }
 }
    




  }
  public function selected_money($edit_id){
      $this->db->select('*');
      $this->db->where('money_transfer_id',$edit_id);
      $this->db->from('money_transfers');
      $data=$this->db->get();

       return $data->result();

  }

  public function select_all_from_account(){
        
        $this->db->select('*');
        $this->db->from('accounts');
        
        $data = $this->db->get();
        return $data->result();
        
    }



  public function transfer_money($from_account_id, $to_account_id, $transfer_amount){

           $this->db->where('account_id',$from_account_id);
           $this->db->set('total_balance','total_balance -'.$transfer_amount, FALSE);
           if($this->db->update('accounts')){

           	    $this->db->where('account_id',$to_account_id);
           	    $this->db->set('total_balance','total_balance +'.$transfer_amount, FALSE);
           	    if($this->db->update('accounts')){
           	    	echo 'success';
           	    }else{
           	    	echo 'failed';
           	    }

           }else{
           	echo 'failed';
           }
  }
//********************************************************Account Statement***************************************************************************************************************************************

   public function select_account_statement($start_date,$end_date){
        $start_date = date('Y-m-d',strtotime($start_date));
        $end_date = date('Y-m-d',strtotime($end_date));
               echo $start_date.$end_date;

         $this->db->select('*');
         $this->db->from('payments');
         $this->db->where('payments.account_id',1);
         $this->db->where('date(payments.created_at) >=',$start_date);
         $this->db->where('date(payments.created_at) <=', $end_date);
         $this->db->join('accounts','accounts.account_id = payments.account_id');

         $data = $this->db->get();
         return $data->result();

   }


   public function get_balance_sheet(){
    
         $this->db->select('*, SUM(credit) AS total_credit , SUM(debit) AS total_debit');
         $this->db->from('payments');
         
         $this->db->join('accounts','accounts.account_id = payments.account_id');
         $this->db->group_by('payments.account_id');

         $data = $this->db->get();
         return $data->result();

   }
  
}
?>