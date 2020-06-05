<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index() {
		$this->data['view'] = 'user_profile';
		$this->load->view('template', $this->data);
	}

	public function add($id = 0) {
		$id = $id + 0;
		$this->data['page_title'] = 'Add User';
		$this->data['view'] = 'users/add';
		$action = 'Add';
		if ($id) {
			$this->data['page_title'] = 'Edit User';
			$action = 'Edit';
		}

		if ($id) {
			$this->data['user_data'] = $this->common->getUserById($id);
		}

		$this->form_validation->set_error_delimiters('<div id="alrt" class="alert alert-danger" style="padding:5px;margin-top:5px;">', '</div>');
		$this->form_validation->set_rules('fname', 'Full Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		if ($this->form_validation->run() == TRUE) {
			$user = array(
				'fname' => trim($this->input->post('fname')),
				'address' => trim($this->input->post('address')),
				'status' => $this->input->post('status'),
			);

			if (isset($_FILES['user_image']['name']) && $_FILES['user_image']['error'] == 0) {
				$temp_file = $_FILES['user_image']['tmp_name'];

				$img_name = "profile_" . mt_rand(10000, 999999999) . time();
				$path = $_FILES['user_image']['name'];

				$ext = pathinfo($path, PATHINFO_EXTENSION);

				$user['user_image'] = $img_name . "." . $ext;
				$url = PROFILEPIC . $user['user_image'];
				$this->gdb->compress_image($temp_file, $url, 80);
			}

			if ($id) {
				if ($this->user_model->updateUser($user, $id)) {
					$this->session->set_flashdata('success', "User Updated Successfully.");
				} else {
					$this->session->set_flashdata('error', "Error While Updateing Record.");
				}
			} else {
				if ($this->user_model->addUser($user)) {
					$this->session->set_flashdata('success', "User Added Successfully.");
				} else {
					$this->session->set_flashdata('error', "Error While Adding Record.");
				}
			}
			redirect('user');
		}
		$this->load->view('admin_master', $this->data);
	}

	public function delete() {
		$id = $this->input->post('id');
		$result = $this->user_model->deleteUser($id);
		if ($result) {
			echo json_encode(array('success' => 1, 'title' => 'User'));
			exit;
		}
		echo json_encode(array('success' => 0));
	}

	public function check_mobile($input) {

		$check_phone = $this->user_model->checkExistMobile($input);
		if ($check_phone) {
			$this->form_validation->set_message('check_mobile', 'Mobile number is already exists.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

}
