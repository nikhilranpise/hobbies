<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class AuthenticationModal extends CI_Model {
    
    

	public function check( $username, $password)
	  {	
	  $query =	
	  $this->db->query("select * from user_table  where email='$username' and password='$password'");	
      return $query->row();
	  }

	public function check_admin( $username, $password)
	{	
		$query = $this->db->query("select * from admin  where email='$username' and password='$password'");	
		return $query->row();
	}

	 public function check_client($username, $password)
	  {	
	  $query =	
	  $this->db->query("select id,username from admin_table  where username='$username' and password='$password'");	
      return $query->row();
	  }
	  
	   public function change_pass($id,$n_pass)
    {
        $this->db->where('finance_id', $id);
        $this->db->update('finance_login', $n_pass);
        return $this->db->affected_rows();
    }

    public function insert_user($array)
    {
    	$this->db->insert('user_table',$array);
    }
	  


}