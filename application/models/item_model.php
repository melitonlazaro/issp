<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_model extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}

	public function item_insert($data){
	$this->db->insert('stock_monitoring', $data);
	RETURN TRUE;
	}
	public function clinic_record()
	{
		$query = $this->db->get('stock_monitoring');
		return $query->result();
	}
}