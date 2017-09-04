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

  public function online_appointment($data)
  {
    $this->db->insert('online_appointment', $data);
    
  }

  public function profiling($data)
  {
    $this->db->insert('patient_info', $data);
  }

  public function prenatal($data)
  {
    $result = $this->db->insert('physicalexamination', $data);
    return $result;
  }
}