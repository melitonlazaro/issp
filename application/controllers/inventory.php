<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends CI_Controller {
	
	public function __construct(){
		parent::__construct();	
		$this->load->model('Item_model');	
	}
	public function index(){
		$value = array();
		if($data = $this->Item_model->clinic_record())
		{
		$value['item'] = $data;
		}
		$this->load->view('inventory/first', $value);
	}
	public function add_item(){	
		$quantity_date = date('Y-m-d h:i A');
		$data = array(
		'item_no' => NULL,
		'item_name' => $this->input->post('item_name'),
		'item_type' => $this->input->post('item_type'),
		'item_quantity' =>$this->input->post('item_quantity'),
		'item_quantity_date' =>$quantity_date,
		'comment' => $this->input->post('comment'),
	);
	$insert_result = $this->Item_model->item_insert($data);
			if($insert_result)
			{
				
				$this->session->set_flashdata('successful', 'Insert Successfully!');
     			redirect('/Inventory', 'refresh');
			}	
			else{
				$error = $this->db->error();
			}		
	}

	public function edit_item(){
		$id = $this->input->post('item_id');
		$data = array(
		'item_name' => $this->input->post('itemname'),
		'item_type' => $this->input->post('itemtype'),
		'item_quantity' => $this->input->post('itemquantity'),
		'item_quantity_updated' => date('Y-m-d h:i A'),
		'comment' => $this->input->post('e_comment')
		);
        $this->Item_model->update_item($id,$data);
        $this->session->set_flashdata('edit', 'Edit Successfully!');
	    redirect('/Inventory', 'refresh');
		}

	public function delete_i($item_no)
	{
		$id = $item_no;
	    $this->Item_model->delete_item($id);
	    redirect('/Inventory', 'refresh');
	}
	    // loading views


}