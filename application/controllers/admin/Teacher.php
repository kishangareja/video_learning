<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('teacher_model');
		$this->load->model('classes_model');
		$this->gdb->checkAdminLogin();

	}

	public function index() {
		$this->data['user_data'] = $this->teacher_model->getAllTeacher();
		$this->data['view'] = 'admin/teacher/view';
		$this->data['page_title'] = 'Teacher List';
		$this->load->view('admin/admin_master', $this->data);
	}

	public function add($id = 0) {
		$id = $id + 0;
		$this->data['page_title'] = 'Add Teacher';
		$this->data['view'] = 'admin/teacher/add';
		$this->data['tags_data'] = $this->classes_model->getClasses(1);

		$action = 'Add';
		if ($id) {
			$this->data['page_title'] = 'Edit Teacher';
			$action = 'Edit';
			$this->data['user_data'] = $this->teacher_model->getTeacher($id);
		}
		$this->form_validation->set_error_delimiters('<div id="alrt" class="alert alert-danger" style="padding:5px;margin-top:5px;">', '</div>');
		$this->form_validation->set_rules('username', 'Teacher Name', 'required');
		$this->form_validation->set_rules('class_id', 'Class', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Mobile', 'required|regex_match[/^[0-9]{10}$/]');
		$this->form_validation->set_rules('status', 'Status', 'required');
		if (!$id) {
			$this->form_validation->set_rules('password', 'Password', 'required');
		}

		if ($this->form_validation->run() == TRUE) {
			$user = array(
				'username' => trim($this->input->post('username')),
				'class_id' => trim($this->input->post('class_id')),
				'email' => trim($this->input->post('email')),
				'phone' => trim($this->input->post('phone')),
				'status' => $this->input->post('status'),
			);

			if (!empty($this->input->post('teacher_id'))) {
				$id = $this->input->post('teacher_id');
				if (!empty($this->input->post('password'))) {
					$user['password'] = md5($this->input->post('password'));
				}
				$result = $this->teacher_model->updateTeacher($id, $user);
				if ($result) {
					$this->session->set_flashdata('success', "Teacher Updated Successfully.");
				} else {
					$this->session->set_flashdata('error', "Error While Updateing Record.");
				}
			} else {
				$user['password'] = md5($this->input->post('password'));
				$result = $this->teacher_model->addTeacher($user);
				if ($result) {
					$id = $result;
					$this->session->set_flashdata('success', "Teacher Added Successfully.");
				} else {
					$this->session->set_flashdata('error', "Error While Inserting Record.");
				}
			}

			redirect(base_url('admin/teacher'));
		}

		$this->load->view('admin/admin_master', $this->data);
	}

	public function delete() {
		$id = $this->input->post('id');
		$result = $this->teacher_model->deleteTeacher($id);
		if ($result) {
			echo json_encode(array('success' => 1, 'title' => 'Teacher'));
			exit;
		}
		echo json_encode(array('success' => 0));
	}

}
