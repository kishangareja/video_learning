<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index() {
		if ($this->session->userdata('admin_id')) {
			redirect('admin/home');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('pwd', 'Password', 'required');

		$this->form_validation->set_error_delimiters('', '');
		$data['msg'] = '';
		if ($this->form_validation->run() == TRUE) {
			$email = $_POST['email'];
			$password = md5($_POST['pwd']);
			$data = $this->login_model->getAdminLogin($email, $password);
			if ($data) {
				$this->session->set_userdata('admin_id', $data->admin_id);
				$this->session->set_userdata('admin_data', $data);

				$array = array("admin_id" => $data->admin_id, "email" => $data->email_id);
				$this->session->set_userdata($array);
				redirect('admin/login');
			} else {
				$this->session->set_flashdata('msg', "Emailid or Password did not matched");
				$data['msg'] = 'Emailid or Password did not matched.';
			}
		}
		$this->load->view('admin/login', $data);
	}

	public function logout() {
		//$this->session->sess_destroy();
		unset($_SESSION['admin_id']);
		unset($_SESSION['admin_data']);
		// redirect('admin/login');
		redirect(base_url());
	}

	public function change_password() {
		$data['page_title'] = "Change Password";

		if (isset($_POST) && !empty($_POST)) {
			$data = array(
				'password' => md5($this->input->post('newpassword')),
			);
			$id = $this->session->userdata('admin_id');
			$this->login_model->updatePassword($id, $data);
			$this->session->set_flashdata('success', "Password Change Successfully.");
			redirect('admin/login/change_password');
		} else {
			$data['view'] = 'admin/changepassword';
			$this->load->view('admin/admin_master', $data);
		}
	}

	public function change_pass() {
		$data['page_title'] = "Change Password";

		if (isset($_POST) && !empty($_POST)) {
			$data = array('password' => md5($this->input->post('newpassword')));
			$id = $this->session->userdata('beautician_id');
			$this->login_model->updateBeauticianPassword($id, $data);
			$this->session->set_flashdata('success', "Password Change Successfully.");
			redirect('admin/login/change_pass');
		} else {
			$data['view'] = 'admin/changepassword';
			$this->load->view('admin/admin_master', $data);
		}
	}

	public function forgot_pass() {
		if (isset($_POST) && !empty($_POST)) {
			$mailid = $_POST['email'];
			if ($beautician = $this->updateBeauticianPasswordByEmail($mailid)) {
				$new_password = $this->common->generatePassword();
				$message = 'New Password : ' . $new_password;

				$data = array('password' => md5($new_password));
				$this->login_model->updateBeauticianPassword($beautician->id, $data);

				$this->common->sendMail($mailid, PROJECT_NAME . ' | New Password', $message);
				redirect('beautician');
			}
		} else {
			$this->load->view('admin/login/forgotpassword');
		}
	}

}
