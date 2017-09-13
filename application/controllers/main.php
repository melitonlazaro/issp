<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->model('Item_model');	
	}
	public function index(){
		$value = array();
		if($data = $this->Item_model->clinic_record()){
		$value['item'] = $data;
		}
		$this->load->view('first', $value);
	}
	public function add_item(){	
	$data = array(
	'item_no' => NULL,
	'item_name' => $this->input->post('item_name'),
	'item_type' => $this->input->post('item_type'),
	'item_quantity' =>$this->input->post('item_quantity'),
	'item_quantity_date' =>$this->input->post('item_quantity_date'),
	'comment' => $this->input->post('comment'),
	);

	$insert_result = $this->Item_model->item_insert($data);
			if($insert_result)
			{
			$this->index();
			}
			else{
				$error = $this->db->error();
			}
$this->load->view('first');
	}
  
    // loading views
	public function view_add(){
	$this->load->view('add');
	}
	public function view_edit(){
	$this->load->view('edit');
	}

}

