<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
		// $this->gdb->checkAdminLogin();
	}

	public function index() {
		$this->data['view'] = 'admin/dashboard';
		$this->load->view('admin/admin_master', $this->data);
	}

	public function inquiry() {
		$this->data['page_title'] = 'Contacts List';
		$this->data['sent_data'] = $this->common->getAllContactData();
		$this->data['view'] = 'admin/contact/view';
		$this->load->view('admin/admin_master', $this->data);
	}

	public function delete_contact() {
		$id = $this->input->post('id');
		$result = $this->common->deleteContact($id);
		if ($result) {
			echo json_encode(array('success' => 1, 'title' => 'Contacts'));
			exit;
		}
		echo json_encode(array('success' => 0));
	}

	public function general_info() {
		$data['page_title'] = 'Update General Information';
		$data['view'] = 'admin/general_info';
		$data['general_data'] = $this->common->getGeneralInfo();

		$this->form_validation->set_error_delimiters('<div id="alrt" class="alert alert-danger" style="padding:5px;margin-top:5px;">', '</div>');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');

		if ($this->form_validation->run() == TRUE) {
			$package = array(
				'address' => trim($this->input->post('address')),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'linkedin' => $this->input->post('linkedin'),
			);

			$result = $this->common->updateGeneralInfo(1, $package);
			if ($result) {
				$this->session->set_flashdata('success', "Information Updated Successfully.");
			} else {
				$this->session->set_flashdata('error', "Error While Updateing Record.");
			}
			redirect(base_url('admin/home/general_info'));
		}
		$this->load->view('admin/admin_master', $data);
	}

	public function subscribe() {
		$this->data['page_title'] = 'Subscriber List';
		$this->data['sent_data'] = $this->common->getAllSubscriberData();
		$this->data['view'] = 'admin/subscribe';
		$this->load->view('admin/admin_master', $this->data);
	}
}
