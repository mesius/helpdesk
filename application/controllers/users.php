<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Users extends CI_Controller {

	function __construct()
    {
        parent::__construct();

		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('M_users');
    }

	public function index()
	{

		$list['users'] = $this->M_users->get_all();

		$this->load->view('view_list_users', $list);

	}

	public function add()
	{


		if ($this->input->post()){


			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
			$this->form_validation->set_rules('status', 'Status', 'trim');

			$data=$this->input->post();

			if ($this->form_validation->run() == TRUE) {
				$inserted_id=$this->M_users->add($data);
				echo "ID: ".$inserted_id;
				print_r($this->input->post());
			} else {
				$this->load->view('view_form_add');
			}

		} else {
			$this->load->view('view_form_add');
		}



	}

	public function edit($id=null) {

		if ($id == null OR !is_numeric($id)) {
			echo "Error ID";
			return;

		}

		/* test push**/


		if ($this->input->post()){


			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('name', 'Name', 'required|min_length[3]');
			$this->form_validation->set_rules('status', 'Status', 'trim');


			if ($this->form_validation->run() == TRUE) {
				$data = $this->input->post();
				unset($data['btn_send']);

			} else {
				$this->load->view('view_form_add', $data);
			}

		} else {

			$data['users'] = $this->M_users->get_by_id($id);
			if (empty($data)){
				echo "Id invalid";
			} else {
				$this->load->view('view_form_add', $data);
			}


		}


	}
}
