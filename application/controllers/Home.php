<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->session->sess_destroy();

		$this->data['view'] = 'home';
		$this->load->view('template', $this->data);
	}

	public function contact() {
		$this->data['page_title'] = 'Contact Us';
		$this->data['view'] = 'contacts';
		$this->load->view('template', $this->data);
	}

	public function submitcontact() {
		$this->data['page_title'] = 'Contact Us';

		$this->data['view'] = 'contact';
		$this->form_validation->set_error_delimiters('<div id="alrt" class="alert alert-danger" style="padding:5px;margin-top:5px;">', '</div>');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('message', 'Message', 'required');

		if ($this->form_validation->run() == TRUE) {

			$contact_data = array(
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'message' => $this->input->post('message'),
			);
			$result = $this->common->addContact($contact_data);

			$toEmail = "info@capstonemc-llc.com";
			$subject = "Get New Inquiry From CMC";
			$name = $this->input->post('name');
			$email = $this->input->post('email');
			$message = $this->input->post('message');
			$this->data['message'] = "<table>
				<tr>
				<td><th>Name</th></td><td>" . $name . "</td>
				</tr>
				<tr>
				<td><th>Email</th></td><td>" . $email . "</td>
				</tr>
				<tr>
				<td><th>Message</th></td><td>" . $message . "</td>
				</tr>
				</table>";
			$this->data['content'] = "content";
			$mail_body = $this->load->view('mail/email_template', $this->data, true);
			// $this->common->sendMail($toEmail, $subject, $mail_body, $email);
			$this->common->sendMailOld($toEmail, $subject, $mail_body, $email);

			if ($result) {
				$this->session->set_flashdata('success', "Message Sent Successfully.");
				redirect(base_url('contact'));
			} else {
				$this->session->set_flashdata('error', "Error While Inserting Record.");
				redirect(base_url('contact'));
			}
		}
		$this->load->view('template', $this->data);

	}

}
