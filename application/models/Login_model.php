<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function getAdminLogin($email, $pwd) {
		$this->mongo_db->where('email_id', $email);
		$this->mongo_db->where('password', $pwd);
		return $this->mongo_db->select($this->common->getAdminTable())->row();
	}

	public function getTeacherLogin($email, $pwd) {
		$this->db->where('email', $email);
		$this->db->where('password', $pwd);
		return $this->gdb->get($this->common->getTeacherTable())->row();
	}

	public function getUserLogin($email, $pwd) {
		$this->mongo_db->where('email_id', $email);
		$this->mongo_db->where('password', $pwd);
		return $this->mongo_db->get($this->common->getAdminTable());
		// $this->mongo_db->where('email', $email);
		// $this->mongo_db->where('password', $pwd);
		// return $this->gdb->get($this->common->getUserTable())->row();
	}

	public function updatePassword($id, $data) {
		$this->mongo_db->where('admin_id', $id);
		$this->mongo_db->update($this->common->getAdminTable(), $data);
	}
}
