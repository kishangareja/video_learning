<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

	/**
	 * Add User
	 */
	public function addUser($data) {
		return $this->gdb->insert($this->common->getUserTable(), $data);
	}

	/**
	 * check existing
	 */
	public function checkExist($email) {
		$this->db->where('email', $email);
		return $this->gdb->get($this->common->getUserTable())->row();
	}

	/**
	 * check password
	 */
	public function checkPassword($user_id, $password) {
		$this->db->where('user_id', $user_id);
		$this->db->where('password', md5($password));
		return $this->gdb->get($this->common->getUserTable())->row();
	}

	/**
	 * delete User
	 */
	public function deleteUser($id) {
		$this->db->where('user_id', $id);
		return $this->gdb->delete($this->common->getUserTable());
	}

	/**
	 * Update User
	 * */
	public function updateUser($id, $data) {
		$this->db->where('user_id', $id);
		return $this->gdb->update($this->common->getUserTable(), $data);
	}

	/**
	 * get All User
	 */
	public function getAllUser() {
		$this->gdb->select('u.*, t.name AS class_name');
		$this->gdb->join($this->common->getClassesTable() . ' AS t', 'u.class_id = t.id', 'LEFT');
		return $this->db->get($this->common->getUserTable() . ' AS  u ')->result();
	}

	/**
	 * get user
	 */
	public function getUser($id) {
		$this->db->select('u.*');
		$this->db->where('u.user_id', $id);
		// $this->db->where('u.status', $user_status);
		return $this->gdb->get($this->common->getUserTable() . ' As u')->row();
	}

}
