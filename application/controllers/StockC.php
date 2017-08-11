<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockC extends CI_Controller {

	public function __construct(){
		parent::__construct();
		// Load database
		$this->load->model('stockm', 'stock');
		}
		public function index(){
			$data = array();
			$data['title'] = 'StockC';
			$config = array();
			$config["base_url"] = base_url().'stockc/index';
			$data["data"] = $this->item_monitoring->get_stocks();
			$this->template->load('default_layout', 'contents' , 'stockc', $data);
			$this->load->view('stockv');
		}
		// Add Item
		public function StockAdd(){
			$data = array();
 			$this->template->set('title', 'Add New Item');
		 	$this->load->helper('form');
    	$this->load->library('form_validation');
 			$this->form_validation->set_rules('item_name', 'item_name', 'required');
      $this->form_validation->set_rules('item_type', 'item_type', 'required');
			$this->form_validation->set_rules('item_quantity', 'item_quantity', 'required');
		 	$this->form_validation->set_rules('comment', 'comment', 'required');
 			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() === FALSE)
        {
 						$data["data"] = array();
            $this->template->load('default_layout', 'contents' , 'stockadd', $data);
        }
        else
        {
            $this->item_monitoring->addItem();
            redirect(base_url());
        }
		}

			// Item Edit
			public function ItemEdit($item_no){
				$data = array();
 				$this->load->helper('form');
        $this->load->library('form_validation');
				$this->form_validation->set_rules('item_name', 'item_name', 'required');
	      $this->form_validation->set_rules('item_type', 'item_type', 'required');
				$this->form_validation->set_rules('item_quantity', 'item_quantity', 'required');
			 	$this->form_validation->set_rules('comment', 'comment', 'required');
 				$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

        if ($this->form_validation->run() === FALSE)
        {
 					$data["data"] = $this->item_monitoring->get_item('', '', $item_no);
 					$this->template->set('title', 'Item edit - '.$data["data"]['item_name']);
          $this->template->load('default_layout', 'contents' , 'itemedit', $data);
        }
        else
        {
            $this->item_monitoring->saveItem($item_no);
            redirect( base_url());
        }
			}

			// Item delete

			public function ItemDelete($item_no){
				$item_no = $this->uri->segment(3);
			 if (empty($item_no))
			 {
					 show_404();
			 }

			 $news_item = $this->item_monitoring->get_item('', '', $item_no);;

			 if($this->item_monitoring->itemdelete($item_no)){
				 $this->session->set_flashdata('message', 'Deleted Sucessfully');
				 redirect( base_url());
			 	}
			}
}
