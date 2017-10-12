<?php 

class Prms_model extends CI_Model {
			
			public function __construct() {
				parent::__construct();
			}
			
 public function profiling($data)
  {
    $result = $this->db->insert('patient_info', $data);
    if($result)
    {
    return $this->db->insert_id();
    }
    else
    {
      return FALSE;
    }
  }

  public function get_patient_records()
  {
    $result = $this->db->get('patient_info');
    return $result->result();
  }

  public function physical_examination($data)
  {
    $result = $this->db->insert('physicalexamination', $data);
    return $result;
  }

  public function medical_history($data)
  {
    $result = $this->db->insert('medicalhistory', $data);
    return $result;
  }
  public function get_patient_profile($patient_ID)
  {
    $this->db->where('patient_ID', $patient_ID);
    $result = $this->db->get('patient_info');
    return $result->row();
  }

  public function get_patient_id($last_name, $first_name)
  {
    $this->db->select('patient_ID');
    $this->db->from('patient_info');
    $this->db->where('last_name', $last_name);
    $this->db->where('given_name', $first_name);
    $result = $this->db->get();
    return $result->row('patient_ID');
  }

  public function create_new_case($patient_ID, $physician)
  {
    $data = array(
                  'case_id' => NULL,
                  'patient_ID' => $patient_ID,
                  'physician_id' => $physician,
                  'date_start' => date('Y-m-d'),
                  'date_completed' => '',
                  'status' => 'Active'
                 );
    $result = $this->db->insert('case', $data);
    return $this->db->insert_id();
  }

 public function count_all()
 {
  $query = $this->db->get("case");
  return $query->num_rows();
 }

 public function fetch_details($limit, $start)
 {
  $output = '';
  $this->db->select("*");
  $this->db->from("case");
  $this->db->order_by("case_id", "ASC");
  $this->db->join('patient_info', 'patient_info.patient_ID = case.patient_ID');
  $this->db->limit($limit, $start);
  $query = $this->db->get();
  $output .= '
  <div class="container">
  <table class="table table-bordered">
   <tr>
    <th>Case ID</th>
    <th>Patient ID</th>
    <th>Last Name</th>
    <th>Given Name</th>
    <th>Physician ID</th>
    <th>Date Start</th>

    <th>Status</th>
    <th>Action</th>
   </tr>
  ';
  foreach($query->result() as $row)
  {
   $output .= '
   <tr>
    <td>'.$row->case_id.'</td>
    <td>'.$row->patient_id.'</td>
    <td>'.$row->last_name.'</td>
    <td>'.$row->last_name.'</td>
    <td>'.$row->physician_id.'</td>
    <td>'.$row->date_start.'</td>
    <td>'.$row->status.'</td> 
    <td>
      <button class="btn btn-success">Prenatal</button> 
      <button class="btn btn-success">Childbirth</button> 
      <button class="btn btn-danger">Drop Case</button> 
    </td>     
   </tr>
   ';
  }
  $output .= '</table></div>';
  return $output;
 }

}
?>