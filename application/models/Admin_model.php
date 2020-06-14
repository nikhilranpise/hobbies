<?php

class Admin_model extends CI_Model{

	/*public function get_users()
	{

	}*/

	public function get_all_users()
	{
		$query = $this->db->select('user_table.*, count(hobby.hobby_id) as hobbies_count')
		                  ->from('user_table')
		                  ->join('hobby','hobby.user_id=user_table.user_id','left')
		                  ->group_by('user_table.user_id')
		                  ->get();
        return $query->result();
	}

	public function get_all_hobbies($id)
    {
        $query = $this->db->select('*')
                          ->from('user_table')
                          ->join('hobby','hobby.user_id=user_table.user_id','left')
                          ->join('sub_hobby','sub_hobby.hobby_id=hobby.hobby_id','left')
                          ->where('user_table.user_id',$id)
                          ->get();
        return $query->result();
    }
}


?>