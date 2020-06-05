<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classes extends CI_Controller {

	function __construct() {

		parent::__construct();
		$this->load->model(array('classes_model'));
		$this->gdb->checkAdminLogin();

	}

	public function index() {
		$data['tags_data'] = $this->classes_model->getClasses();
		$data['view'] = 'admin/classes/view';
		$data['page_title'] = 'Class List';
		$this->load->view('admin/admin_master', $data);
	}

	public function add($id = 0) {
		$id = $id + 0;
		$data['page_title'] = 'Add Class';
		$data['view'] = 'admin/classes/add';
		$action = 'Add';
		if ($id) {
			$this->data['page_title'] = 'Edit Class';
			$action = 'Edit';
			$data['tags_data'] = $this->classes_model->getClassesById($id);
		}

		$this->form_validation->set_error_delimiters('<div id="alrt" class="alert alert-danger" style="padding:5px;margin-top:5px;">', '</div>');
		if (!empty($this->input->post('tag_id'))) {
			$this->form_validation->set_rules('name', 'Name', 'required');
		} else {
			$this->form_validation->set_rules('name', 'Name', 'required|callback_tag_check');

		}
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == TRUE) {
			$package = array(
				'name' => trim($this->input->post('name')),
				'status' => $this->input->post('status'),
			);

			if (!empty($this->input->post('tag_id'))) {
				$id = $this->input->post('tag_id');
				$result = $this->classes_model->updateClasses($id, $package);
				if ($result) {
					$this->session->set_flashdata('success', "Class Updated Successfully.");
				} else {
					$this->session->set_flashdata('error', "Error While Updateing Record.");
				}
			} else {
				$result = $this->classes_model->addClasses($package);
				if ($result) {
					$id = $result;
					$this->session->set_flashdata('success', "Class Added Successfully.");
				} else {
					$this->session->set_flashdata('error', "Error While Inserting Record.");
				}
			}
			redirect(base_url('admin/classes'));
		}
		$this->load->view('admin/admin_master', $data);
	}

	public function delete() {
		$id = $this->input->post('id');
		$result = $this->classes_model->deleteClasses($id);
		if ($result) {
			echo json_encode(array('success' => 1, 'title' => 'Tags'));
			exit;
		}
		echo json_encode(array('success' => 0));
	}

	public function tag_check() {
		$check_tag = $this->classes_model->checkExist($this->input->post('name'));
		if ($check_tag) {
			$this->form_validation->set_message('tag_check', 'Class name is already exists.');
			return FALSE;
		} else {
			return TRUE;
		}
	}

}
