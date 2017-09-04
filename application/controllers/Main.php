  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
		public function __construct() {
				parent::__construct();
				

					}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}

	public function home()
	{
		$this->load->view('online');
	}

	public function login()
	{
		   $this->load->library('form_validation');  
           $this->form_validation->set_rules('username', 'Username', 'required');  
           $this->form_validation->set_rules('password', 'Password', 'required');  
           if($this->form_validation->run())  
           {  
                //true  
                $username = $this->input->post('username');  
                $password = $this->input->post('password');  
                //model function  
                $this->load->model('Main_model');  
                if($this->Main_model->can_login($username, $password))  
                {  
                     $session_data = array(  
                          'username'     =>     $username  
                     );  
                     $this->session->set_userdata($session_data);  
                     redirect('main/home');  
                }  
                else  
                {  
                     $this->session->set_flashdata('error', 'Invalid Username and Password');  
                     redirect(base_url() . 'main');  
                }  
           }  
           else  
           {  
                //false  
                $this->login();  
           }  
      }  
      
    public function logout()
    {
    	$this->session->unset_userdata('username');
    	
    	redirect('Main');
    }	

    public function online_appointment()
    {
        if(isset($_POST["send"]))
        {
          include "smsGateway.php";
          $smsGateway = new SmsGateway('melitonlazaro1@gmail.com', '09153864099');

          $number = $this->input->post('contact_number');
          
          $number_code = mt_rand(10000, 99999);
          $deviceID = 56400;
          $number = $number;
          $message = $number_code;

          $result = $smsGateway->sendMessageToNumber($number, $message, $deviceID); 

          if($result)
          {
            $confirmation_code = $this->input->post('confirmation_code_user');
            if($confirmation_code === $number_code)
            {
               $data = array(
                    'ol_appointment_id' => NULL,
                    'patient_name'      => $this->input->post('name'),
                    'patient_surname'   => $this->input->post('surname') ,
                    'address'           => $this->input->post('address') ,
                    'date'              => $this->input->post('date') ,
                    'time'              => $this->input->post('time') ,
                    'procedure'         => $this->input->post('procedure') ,
                    'contact_number'    => $this->input->post('contact_number') 
                    );

               $add_appointment = $this->Main_model->online_appointment($data);
            }
          }
        }
    }

    public function profiling()
    {
      $this->load->view('profiling');
    }
    public function process_profiling()
    {
      $data = array(
                    'patient_ID'  => NULL,
                    'last_name'   => $this->input->post('surname'),
                    'given_name'   => $this->input->post('given_name'),
                    'middle_initial'   => $this->input->post('middle_initial'),
                    'occupation'   => $this->input->post('occupation'),
                    'date_of_birth'   => $this->input->post('date_of_birth'),
                    'contact_num'   => $this->input->post('contact_num'),
                    'street_no'   => $this->input->post('street_no'),
                    'brgy'   => $this->input->post('barangay'),
                    'city'   => $this->input->post('city'),
                    'emergency_contact_name'   => $this->input->post('emergency_contact'),
                    'emergency_contact_num'   => $this->input->post('emergency_num'),
                    'emergency_contact_address'   => $this->input->post('emergency_contact_address'),
                   );

      $profiling = $this->Main_model->profiling($data);
    }

    public function start_prenatal()
    {
      $this->load->view('physical_examination');
    }

    public function prenatal()
    {
      $data = array(
                    'Num' => NULL,
                    'Patient_ID' => $this->input->post('patient_id'),
                    'height' => $this->input->post('height'),
                    'weight' => $this->input->post('weight'),
                    'blood_pressure' => $this->input->post('blood_pressure'),
                    'blood_type' => $this->input->post('blood_type'),
                    'conjunctiva_pale' => $this->input->post('pale'),
                    'conjunctiva_yellowish' => $this->input->post('yellowish'),
                    'neck_enlarged_thyroid' => $this->input->post('enlargedthyroid'),
                    'neck_enlarged_lymph_nodes' => $this->input->post('enlargedlympnodes'),
                    'breast_mass' => $this->input->post('mass'),
                    'breast_nipple_discharge' => $this->input->post('nippledischarged'),
                    'breast_dimpling' => $this->input->post('skinorangepeel'),
                    'breast_enlarged_axillary_lymph_nodes' => $this->input->post('enlargedaxilarylympnodes'),
                    'thorax_abnormal_cardiac_rate' => $this->input->post('abnormalheartsound'),
                    'thorax_abnormal_respiratory_rate' => $this->input->post('abnormalbreathsounds'),
                    'abdomen_pe_fundic_height' => $this->input->post('abdomenheight'),
                    'abdomen_pe_fetal_movement' => $this->input->post('fetalmovement'),
                    'abdomen_pe_fetal_heart_tone' => $this->input->post('fetalhearttone'),
                    'lm_presenting_part' => $this->input->post('presentingpart'),
                    'lm_position_of_fetal_back' => $this->input->post('positionfetalback'),
                    'lm_uterine_activity' => $this->input->post('urineactivity'),
                    'lm_fetal_parts' => $this->input->post('fetalparts'),
                    'lm_presenting_part_status' => $this->input->post('statuspresenntingpart'),
                    'perineum_scars' => $this->input->post('scars'),
                    'perineum_warts_or_mass' => $this->input->post('wartsmass'),
                    'perineum_laceration' => $this->input->post('laceration'),
                    'perineum_severe_varicosities' => $this->input->post('severevaricosities'),
                    'vagina_bartholins_cyst' => $this->input->post('bartholinscyst'),
                    'vagina_warts_gland_discharge' => $this->input->post('wartsskenesgland'),
                    'vagina_cystocele_or_rectocoele' => $this->input->post('crystocoele'),
                    'vagina_purulant_discharge' => $this->input->post('purulentdischarged'),
                    'vagina_erosion_or_foreign_body' => $this->input->post('eroslon'),
                    'cervix_consistency' => $this->input->post('consistency'),
                    'cervix_dilatation' => $this->input->post('dilation'),
                    'cervix_palpable_presenting_part' => $this->input->post('palpablepresentingpart'),
                    'cervix_status_BagOfwater' => $this->input->post('statusofbagofwater'),
                    'impression' => $this->input->post('impression'),
                    'plans' => $this->input->post('plans'),
                   );
        $prenatal_result = $this->Main_model->prenatal($data);
        if($prenatal_result)
        {
          $this->index();
        }
        else
        {
          $error = $this->db->error();
        
        }
    }

}
?>