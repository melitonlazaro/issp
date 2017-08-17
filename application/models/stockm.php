<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class stockm extends CI_Controller {

	public function clinic_record()
	{
		$query = $this->db->get('stock_monitoring');
		return $query->result();
	}

	public function item_insert($data){
		$this->db->insert('stock_monitoring', $data);
	}
	public function check_item_exists($item_name){
        $this->db->where('item_name',$item_name);
        $this->db->from('stock_monitoring');
        $query = $this->db->get();
        if($query->num_rows() >0){
            return $query->result();
        }else{
            return $query->result();
        }
    }

    public function item_delete_record(){
		$item_no = $_POST["item_no"];
    	$this->db->where('item_no', $item_no);
      	$this->db->delete('stock_monitoring');
      	return true;
    }
}
