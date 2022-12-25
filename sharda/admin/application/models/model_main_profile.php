
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class model_main_profile extends CI_Model {
	function __construct(){
    date_default_timezone_set("Asia/Calcutta");
		parent::__construct();
	}

	// select user data
	public function select_userdata($user_id)
	{
		$this->db->select('*');
		$this->db->from('staff_member');
		$this->db->where('staff_member.staff_id',$user_id);
		$this->db->join('user_permission','user_permission.staff_id = staff_member.staff_id');
		$data = $this->db->get();
		return $data->result();
	}
    
    
    
    public function getprofile(){
        $this->db->select('*');
		$this->db->from('main_profile');
		$data = $this->db->get();
		return $data->result();
    }
    public function add($img_name){
        $data = array(
      'profile_image' =>$img_name,
      
     );
      if($this->db->insert('main_profile',$data)){
        echo 'success';
          redirect(base_url().'/main_profile/main_profile_detail');
          
       }else{
          echo 'failed';

       };
    }
     public function edit($edit_id,$img_name){
         //echo $edit_id."jj".$img_name; die;
  	$this->db->where('profile_id',$edit_id);
         //echo $img_name; die;

  	$data = array(
			
			 'profile_image' =>$img_name,
			
		 );
         
		if($this->db->update('main_profile',$data)){
 			echo 'success';
          redirect(base_url().'/main_profile/main_profile_detail');
       }else{
          echo 'failed';
       };
  }
    
    public function selected_profile($edit_id){
        
        $this->db->select('*');
		$this->db->from('main_profile');
		$this->db->where('profile_id',$edit_id);
		$data = $this->db->get();
		return $data->result();
        
    }
 // select user data

    
    
  public function delete_data($id){
		$this->db->where('profile_id',$id);
    if($this->db->delete('main_profile')){
        echo 'success';

           }else{
              echo 'failed';
           }

  }
 
// ******************** Service Charge Section****************//    
// ******************** Service Charge Section****************//
// ******************** Service Charge Section****************//     
    
  public function select_app_setting(){
      
        $this->db->select('*');
		$this->db->from('delivery_app_settings');
		
		$data = $this->db->get();
		return $data->result();
      
  }    
    
   public function manage_service_charge($packaging_charge,$delivery_charge){
       
       $this->db->set('packaging_charge',$packaging_charge);
       $this->db->set('delivery_charge',$delivery_charge);
       if($this->db->update('delivery_app_settings')){
            redirect('./parameter/manage_service_charge');
          }else{
              redirect('./parameter/manage_service_charge');
          };
       
       
   } 
// ******************** GST Section****************//    
// ******************** GST Section****************//
// ******************** GST Section****************//   
    public function select_gst(){
        
        $this->db->select('*');
		$this->db->from('gst');
		
		$data = $this->db->get();
		return $data->result();
        
    }
    
    public function selected_gst($id){
        
        $this->db->select('*');
		$this->db->from('gst');
		$this->db->where('gst_id',$id);
		$data = $this->db->get();
		return $data->result();
        
    }    
    
   public function add_gst($unit){
    $check_unit  = $this->db->get_where('gst',array('gst_value' =>$unit ));
    
       if($check_unit->num_rows() > 0){
          
            redirect('./parameter/add_gst?alert=This gst value is alredy exist.');
           
       }else{
       
          $arr =  array(
            'gst_value' =>  $unit,
          );
          if($this->db->insert('gst',$arr)){
              redirect('./parameter/add_gst');
          }else{
              redirect('./parameter/add_gst');
          };
       }
   }
    
   public function edit_gst($unit,$id){
       
       $this->db->where('gst_id',$id);
       $this->db->set('gst_value',$unit);
          if($this->db->update('gst')){
            redirect('./parameter/add_gst');
          }else{
              redirect('./parameter/add_gst');
          };
       
   }   
    
   public function del_gst($del_id){
        $this->db->where('gst_id',$del_id);
         if($this->db->delete('gst')){
            echo 'success';
          }else{
              echo 'failed';
          };
       
   }
}
