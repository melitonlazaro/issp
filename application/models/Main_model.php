<?php 

class Main_model extends CI_Model {
			
			public function __construct() {
				parent::__construct();
			}
			
	public function can_login($username, $password)
	{

		   $this->db->where('username', $username);  
           $this->db->where('password', $password);  
           $query = $this->db->get('user_admin');  
           //SELECT * FROM users WHERE username = '$username' AND password = '$password'  
           if($query->num_rows() > 0)  
           {  
                return true;  
           }  
           else  
           {  
                return false;       
           }  
	}
}