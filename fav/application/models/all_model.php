<?php
class all_model extends CI_model{

  public function getstudenttable(){
$query=$this->db->get('student');
  
         if ($query) {
          return $query->result();
         }

  }
  
 
}
?>