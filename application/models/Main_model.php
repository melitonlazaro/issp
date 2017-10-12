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

  public function count_latest_patients()
  {
    $query = $this->db->query("SELECT `last_name`, `given_name`, `date_registered` FROM `patient_info` ORDER BY `patient_ID` LIMIT 5");
    return $query->result();
  }

  public function count_latest_infants()
  {
    $query = $this->db->query("SELECT `infant_id` `last_name`, `first_name`, `date_of_birth` FROM `infant_info` ORDER BY `infant_id` DESC LIMIT 5");
    return $query->result();
  }

  public function count_active_cases()
  {
    $query = $this->db->query("SELECT * FROM `case` WHERE `status` = 'Active' ORDER BY `case_id` DESC LIMIT 5 "  );
    return $query->result();
  }

  public function get_first_names()
  {
    $query = $this->db->query("SELECT `given_name` FROM patient_info");
    return $query->result();
  }

  public function get_last_names()
  {
    $query = $this->db->query("SELECT `last_name` FROM patient_info");
    return $query->result();
  }
  
  public function get_physician_id()
  {
    $query = $this->db->query("SELECT `physician_id` FROM physician ");
    return $query->result();
  }
}