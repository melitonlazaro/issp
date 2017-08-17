<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stockc extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('stockm');
	}

	public function index()
	{
		$value = array();
		if($data = $this->stockm->clinic_record()){
			$value['item_record'] = $data;
		}

		$this->load->view('stockv', $value);
	}

	public function add() {

	$this->load->library('form_validation');

	$this->form_validation->set_rules('item_name', 'Item Name', 'trim|required|is_unique[stock_monitoring.item_name]|xss_clean');
	$this->form_validation->set_rules('item_type', 'Item Type', 'trim|required|xss_clean');
	$this->form_validation->set_rules('item_quantity', 'Item Quantity', 'trim|required|xss_clean');
	$this->form_validation->set_rules('item_stock', 'Item Stock', 'trim|required|xss_clean');
	$this->form_validation->set_rules('comment', 'Comment', 'trim|required|xss_clean');
	if ($this->form_validation->run() == FALSE) {
	$this->index();
	} 
	else {
		$data = array(
	'item_name' => $this->input->post('item_name'),
	'item_type' => $this->input->post('item_type'),
	'item_quantity' => $this->input->post('item_quantity'),
	'item_quantity_date' => $this->input->post('item_quantity_date'),
	'item_stock' => $this->input->post('item_stock'),
	'comment' => $this->input->post('comment'),
		);

	if($this->stockm->check_item_exists($data['item_name'])){
		$data['exist'] = "The item already exists";
		$this->load->view('itemexist', $data);
	}else{
		$result = $this->stockm->item_insert($data);
	if ($result == TRUE) {
	$this->load->view('itemsuccess', $data);
	} else {
	echo 'Item already exist!';
	$this->load->view('itemexist', $data);
	}
	}
	}
}

	public function view_add()
{
   $this->load->view('stockadd');
}
	public function item_delete(){
		$result = $this->stockm->item_delete_record();
    	if($result) {
    	$data["item_record"] = $this->stockm->clinic_record();	
		$this->load->view('stockv', $data);
		}
		else
			{
			die("Error");
		}
    }	
}
