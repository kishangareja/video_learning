<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('user_model');
		$this->load->model('classes_model');
		// $this->gdb->checkAdminLogin();

	}

	public function index() {
		$this->data['user_data'] = $this->user_model->getAllUser();
		$this->data['view'] = 'admin/users/view';
		$this->data['page_title'] = 'Student List';
		$this->load->view('admin/admin_master', $this->data);
	}

	public function add($id = 0) {
		$id = $id + 0;
		$this->data['page_title'] = 'Add Student';
		$this->data['view'] = 'admin/users/add';
		$this->data['tags_data'] = $this->classes_model->getClasses(1);

		$action = 'Add';
		if ($id) {
			$this->data['page_title'] = 'Edit Student';
			$action = 'Edit';
			$this->data['user_data'] = $this->user_model->getUser($id);
		}

		$this->form_validation->set_error_delimiters('<div id="alrt" class="alert alert-danger" style="padding:5px;margin-top:5px;">', '</div>');
		$this->form_validation->set_rules('fname', 'First Name', 'required');
		$this->form_validation->set_rules('lname', 'Last Name', 'required');
		$this->form_validation->set_rules('class_id', 'Class', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if (!$id) {
			$this->form_validation->set_rules('password', 'Password', 'required');
		}

		if ($this->form_validation->run() == TRUE) {
			$user = array(
				'fname' => trim($this->input->post('fname')),
				'lname' => trim($this->input->post('lname')),
				'class_id' => trim($this->input->post('class_id')),
				'email' => trim($this->input->post('email')),
				'phone' => trim($this->input->post('mobile')),
				'address' => trim($this->input->post('address')),
				'status' => $this->input->post('status'),
				'video_permission' => $this->input->post('video_permission'),
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

			if (!empty($this->input->post('user_id'))) {
				$id = $this->input->post('user_id');
				if (!empty($this->input->post('password'))) {
					$user['password'] = md5($this->input->post('password'));
				}
				$result = $this->user_model->updateUser($id, $user);
				if ($result) {
					$this->session->set_flashdata('success', "Student Updated Successfully.");
				} else {
					$this->session->set_flashdata('error', "Error While Updateing Record.");
				}
			} else {
				$user['password'] = md5($this->input->post('password'));

				$result = $this->user_model->addUser($user);
				if ($result) {
					$id = $result;
					$this->session->set_flashdata('success', "Student Added Successfully.");
				} else {
					$this->session->set_flashdata('error', "Error While Inserting Record.");
				}
			}

			redirect(base_url('admin/users'));
		}

		$this->load->view('admin/admin_master', $this->data);
	}

	public function delete() {
		$id = $this->input->post('id');
		$result = $this->user_model->deleteUser($id);
		if ($result) {
			echo json_encode(array('success' => 1, 'title' => 'Student'));
			exit;
		}
		echo json_encode(array('success' => 0));
	}

}
