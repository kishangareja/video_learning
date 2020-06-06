<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index() {
		if ($this->session->userdata('admin_id')) {
			redirect('home');
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
				$this->session->set_userdata(array("admin_id" => $data->admin_id, "email" => $data->email_id));
				redirect('login');
			} else {
				$this->session->set_flashdata('msg', "Emailid or Password did not matched");
				$data['msg'] = 'Emailid or Password did not matched.';
			}
		}
		$this->load->view('login', $data);
	}

	public function check_login() {
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$success = 0;
		$message = 'Emailid or Password must be required field..!';
		$user_detail = '';
		if ($email && $password) {
			$data = $this->login_model->getUserLogin($email, $password);
			$success = 0;
			$message = 'EmailID or Password did not matched';
			$user_detail = '';
			if ($data) {
				$this->session->set_userdata('user_id', $data->user_id);
				$this->session->set_userdata('email', $data->email);
				$this->session->set_userdata('fname', $data->fname);
				$this->session->set_userdata('user_data', $data);
				$this->session->set_userdata(array("user_id" => $data->user_id, "email" => $data->email));
				$success = 1;
				$message = 'Login Successfully';
				$user_detail = $data;
			}
		}
		echo json_encode(array('success' => $success, 'message' => $message, 'response' => $user_detail));
	}

	public function teacher_login() {
		if ($this->session->userdata('teacher_id')) {
			redirect('teacher/home');
		}

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('pwd', 'Password', 'required');

		$this->form_validation->set_error_delimiters('', '');
		$data['msg'] = '';
		if ($this->form_validation->run() == TRUE) {
			$email = $_POST['email'];
			$password = md5($_POST['pwd']);
			$data = $this->login_model->getTeacherLogin($email, $password);
			if ($data) {
				$this->session->set_userdata('teacher_id', $data->id);
				$this->session->set_userdata('teacher_data', $data);
				$array = array("teacher_id" => $data->id, "teacher_email" => $data->email);
				$this->session->set_userdata($array);
				redirect('teacher/home');
			} else {
				$this->session->set_flashdata('msg', "Emailid or Password did not matched");
				$data['msg'] = 'Emailid or Password did not matched.';
				redirect('login/teacher_login', $data);
			}
		}
		$this->load->view('admin/login', $data);
	}

	public function logout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function change_password() {
		$data['page_title'] = "Change Password";

		if (isset($_POST) && !empty($_POST)) {
			$data = array('password' => md5($this->input->post('newpassword')));
			$id = $this->session->userdata('admin_id');
			$this->login_model->updatePassword($id, $data);
			$this->session->set_flashdata('success', "Password Change Successfully.");
			redirect('login/change_password');
		} else {
			$data['view'] = 'changepassword';
			$this->load->view('admin_master', $data);
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
				redirect('login');
			}
		} else {
			$this->load->view('login/forgotpassword');
		}
	}

}
