<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('Item_model', 'model1');	

	}
	public function index()
	{
		$this->load->view('first');

	}
}
