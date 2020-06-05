<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function getAdminLogin($email, $pwd) {
		$this->db->where('email_id', $email);
		$this->db->where('password', $pwd);
		return $this->gdb->get($this->common->getAdminTable())->row();
	}

	public function getUserLogin($email, $pwd) {
		$this->db->where('email', $email);
		$this->db->where('password', $pwd);
		return $this->gdb->get($this->common->getUserTable())->row();
	}

	public function updatePassword($id, $data) {
		$this->db->where('admin_id', $id);
		$this->db->update($this->common->getAdminTable(), $data);
	}
}
