<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class join_model extends CI_Model {


	public function get_list($head_id){
        $this->db->select('*');
    $this->db->from('expanse_subhead');
    $this->db->join('expanse_head', 'expanse_head.expanse_head_id=expanse_subhead.expanse_head_id');
    if($head_id){
       $this->db->where('expanse_subhead.expanse_head_id',$head_id);
    }
    $data=$this->db->get();
    return $data->result();   
  }
  public function get_list1(){
        $this->db->select('*');
    $this->db->from('expanse_subhead');
    $this->db->join('expanse_head', 'expanse_head.expanse_head_id=expanse_subhead.expanse_head_id');
    $data=$this->db->get();
    return $data->result();   
  }
 public function head_filter($category){
   $this->db->select('*');
      $this->db->from('expanse_subhead');
      $this->db->join('expanse_head', 'expanse_head.expanse_head_id=expanse_subhead.expanse_head_id');
      $this->db->where('recharge_report.user_id',$category);
       $data=$this->db->get();

       return $data->result();
         }
 

  public function headlist(){
    $this->db->select('*');
    $this->db->from('expanse_subhead');
     $this->db->join('expanse_head', 'expanse_head.expanse_head_id=expanse_subhead.expanse_head_id');
    $data=$this->db->get();
    return $data->result();   
  }
  public function head__list(){
   $this->db->select('*');
      $this->db->from('expase_details');
      $data=$this->db->get();
       return $data->result();  
  }

 public function selecthead(){
        
        $this->db->select('*');
      $this->db->from('expanse_head');
      $data=$this->db->get();
       return $data->result();
         }

  public function add($expanse_head_id,$expanse_subhead_name){
       $arr = array(
             
                'expanse_head_id' => $expanse_head_id,
                'expanse_subhead_name' => $expanse_subhead_name,

       );
       print_r($arr);
       if($this->db->insert('expanse_subhead',$arr)){
           // redirect(base_url().'expanse_subhead/add');
            echo 'success';
       }else{
           echo 'failed';
       } 
  }

  public function edit($expanse_subhead_name,$expanse_subhead_id){
     $arr = array(
             'expanse_subhead_name' => $expanse_subhead_name,
       );   
       $this->db->where('expanse_subhead_id',$expanse_subhead_id);
       if($this->db->update('expanse_subhead',$arr)){
            redirect(base_url().'join/add');
            echo 'success';
       }else{
           echo 'failed';
       }
  }

  public function selected($expanse_subhead_id){
        $this->db->select('*');
        $this->db->from('expanse_subhead');
        $this->db->where('expanse_subhead_id',$expanse_subhead_id);
        $data=$this->db->get();
        return $data->result();
  }



  public function delete($expanse_subhead_id){
     //echo $id;
      $this->db->where('expanse_subhead_id',$expanse_subhead_id);
      if($this->db->delete('expanse_subhead')){
        redirect(base_url().'join/add');
      }
      else{
        echo "failed";
      }

    }
}
?>