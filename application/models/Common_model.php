<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	private $admin = 'admin';
	private $users = 'users';
	private $user_session = 'user_session';
	private $domains = 'domains';
	private $contact = 'contact';
	private $classes = 'classes';
	private $project = 'projects';
	private $videos = 'videos';

	public function getUserTable() {
		return $this->users;
	}

	public function getClassesTable() {
		return $this->classes;
	}

	public function getVideosTable() {
		return $this->videos;
	}

	public function getUserSessionTable() {
		return $this->user_session;
	}

	public function getAdminTable() {
		return $this->admin;
	}

	public function addUsers($data) {
		return $this->gdb->insert($this->users, $data);
	}

	public function getDomainTable() {
		return $this->domains;
	}

	/**
	 * Get secure key
	 */
	public function getSecureKey() {
		$string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$stamp = time();
		$secure_key = $pre = $post = '';
		for ($p = 0; $p <= 10; $p++) {
			$pre .= substr($string, rand(0, strlen($string) - 1), 1);
		}

		for ($i = 0; $i < strlen($stamp); $i++) {
			$key = substr($string, substr($stamp, $i, 1), 1);
			$secure_key .= (rand(0, 1) == 0 ? $key : (rand(0, 1) == 1 ? strtoupper($key) : rand(0, 9)));
		}

		for ($p = 0; $p <= 10; $p++) {
			$post .= substr($string, rand(0, strlen($string) - 1), 1);
		}
		return $pre . '-' . $secure_key . $post;
	}

	public function generatePassword() {
		$post = '';
		$string = 'abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		for ($p = 0; $p <= 7; $p++) {
			$post .= substr($string, rand(0, strlen($string) - 1), 1);
		}
		return $post;
	}

	public function getAdmin() {
		return $this->db->get($this->admin)->row();
	}

	/**
	 * Add user session data
	 */
	public function insertUserSession($data) {
		$this->db->insert($this->user_session, $data);
		return $this->db->insert_id();
	}

	public function getUserSession($user_id, $token) {
		$this->db->where('is_active', 1);
		$this->db->where('user_id', $user_id);
		$this->db->where('token', $token);
		return $this->db->get($this->user_session)->row();
	}

	public function getSessionInfo($secret_log_id) {
		$this->db->where('is_active', 1);
		$this->db->where('session_id', $secret_log_id);
		return $this->db->get($this->user_session)->row();
	}

	public function logoutUser($secret_log_id) {
		$data = array('is_active' => 0, 'end_date' => DATETIME);
		$this->db->where('session_id', $secret_log_id);
		$this->db->update($this->user_session, $data);
	}

	public function getUserById($user_id) {
		$this->db->where('user_id', $user_id);
		return $this->gdb->get($this->users)->row();
	}

	/**
	 * Send Email
	 */
	function sendMailOld($toEmail, $subject, $mail_body, $fromEmail = '', $fromName = '', $ccEmails = '', $replyTo = '') {
		$this->load->library('email');
		$to = 'info@capstonemc-llc.com';
		$subject = $subject;
		$message = $mail_body;

// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
		$headers .= 'From:' . $fromEmail . "\r\n";
		$headers .= 'Cc: ' . "\r\n";

		mail($to, $subject, $message, $headers);
		return true;
	}

	/**
	 * Send Email
	 */
	function sendMail($toEmail, $subject, $mail_body, $fromEmail, $fromName = '') {

		if (!$fromName) {
			$fromName = PROJECT_NAME;
		}

		$smtp_host = 'exchange.cyw.net.au';
		$smtp_user = 'outbound@cyw.net.au';
		$smtp_pass = 'outbound@cyw';
		$smtp_port = '587';
		$crypto_type = 'TLS';

		require_once APPPATH . "third_party/mailer/class.phpmailer.php";
		$mail = new PHPMailer;

		// $mail->SMTPDebug = SMTP::DEBUG_SERVER;
		$mail->isSMTP(); // Set mailer to use SMTP
		$mail->Host = $smtp_host; // Specify main and backup server
		$mail->SMTPAuth = true; // Enable SMTP authentication
		$mail->Username = $smtp_user; // SMTP username suratrealestate2015@gmail.com
		$mail->Password = $smtp_pass; // SMTP password suratrealestate
		$mail->SMTPSecure = $crypto_type; // Enable encryption, 'ssl' also accepted
		$mail->Port = $smtp_port; //Port Number

		// $mail->From = $send_as_address; //From Email Id
		// $mail->FromName = $fromName; //From Email Id Display Name

		// $mail->setFrom('outbound@cyw.net.au', $subject);
		$mail->setFrom('outbound@cyw.net.au', $subject);
		$mail->addAddress($toEmail, $subject);

		// $mail->addReplyTo('info@example.com', 'CodexWorld');

		// Add a recipient
		// $mail->addAddress('support@computeyourworld.com.au');

		// print_r($attachment);die;
		// $mail->addAttachment($attachment); // Add attachments
		$mail->isHTML(true); // Set email format to HTML

		$mail->Subject = $subject;
		$mail->Body = $mail_body;

		if ($mail->send()) {
			// echo "send";
			return TRUE;
		} else {
			return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
		}

		// return $mail->send();
	}

}
