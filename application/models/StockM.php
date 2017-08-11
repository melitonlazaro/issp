item_no<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockM extends CI_Model {
	var $table = 'stock_monitoring';
	//set column field database for datatable orderable
	var $column_order = array(null, 'item_name','item_type','item_quantity','item_quantity_date','comment');
	//set column field database for datatable searchable
	var $column_search = array('item_name','item_type','item_quantity');
	// default order
	var $order = array('id' => 'asc');

	    public function __construct()
	    {
	        parent::__construct();
	        $this->load->db();
	    }
	    function get_stocks($item_no=0)
	    {
	                        if(empty($item_no)){
	                                    $query = $this->db->get('item_monitoring');
	                                    if ($query->num_rows() > 0) {
	                                    foreach ($query->result() as $row) {
	                                    $data[] = $row;
	                                    }
	                                    return $data;
	                                    }
	                                    return false;
	                        } else {
	                                    $query = $this->db->get_where('item_monitoring', array('item_no' => $item_no));
	                                    return $query->row_array();
	                        }
	            }

				public function addItem($item_no = 0){

				$data = array(
						'item_no' => $item_no
            'item_name' => $this->input->post('item_name'),
            'item_type' => $this->input->post('item_type'),
						'item_quantity' => $this->input->post('item_quantity'),
						'item_quantity_date' => $this->input->post('item_quantity_date'),
						'item_stock' => $this->input->post('item_stock'),
 						'comment' => $this->input->post('comment')
        );

        if ($item_no == 0) {
            return $this->db->insert('inventory', $data);
        } else {
            $this->db->where('item_no', $item_no);
            return $this->db->update('inventory', $data);
        }

			}

			public function saveItem($item_no = 0){

			$data = array(
					'item_no' => $item_no
					'item_name' => $this->input->post('item_name'),
					'item_type' => $this->input->post('item_type'),
					'item_quantity' => $this->input->post('item_quantity'),
					'item_quantity_date' => $this->input->post('item_quantity_date'),
					'item_stock' => $this->input->post('item_stock'),
					'comment' => $this->input->post('comment')
			);

			if ($item_no == 0) {
					return $this->db->insert('inventory', $data);
			} else {
					$this->db->where('item_no', $item_no);
					return $this->db->update('inventory', $data);
			}
		}
		public function itemDelete($item_no){
			$this->db->where('item_no', $item_no);
      return $this->db->delete('inventory');
		}
}
