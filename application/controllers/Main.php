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
		$this->load->view('home');
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



}
?>