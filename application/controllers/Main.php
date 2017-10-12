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
                $password = md5($this->input->post('password'));  
                //model function  
                $this->load->model('Main_model');  
                if($this->Main_model->can_login($username, $password))  
                {  
                     $session_data = array(  
                          'username'     =>     $username  
                     );  
                     $this->session->set_userdata($session_data);  
                     redirect('Main/dashboard');  
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
               $add_appointment = $this->Main_model->online_appointment($data);
            }
          }
    }

    public function send_confirmation_code($num)
    {
      $this->load->view('home', $num); 

    }

    public function dashboard()
    {
      $this->load->model('Main_model');
      $data['latest_patients'] = $this->Main_model->count_latest_patients();
      $data['latest_infants'] = $this->Main_model->count_latest_infants();
      $data['active_cases'] = $this->Main_model->count_active_cases();
      $data['first_names'] = $this->Main_model->get_first_names();
      $data['last_names'] = $this->Main_model->get_last_names();
      $data['physician_id'] = $this->Main_model->get_physician_id();
      $this->load->view('dashboard', $data);
    }

    public function chart()
    {
      $this->load->view('chart');
    }

}
?>