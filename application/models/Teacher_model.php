<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teacher_model extends CI_Model {

	/**
	 * Add User
	 */
	public function addTeacher($data) {
		return $this->gdb->insert($this->common->getTeacherTable(), $data);
	}

	/**
	 * check existing
	 */
	public function checkExist($email) {
		$this->db->where('email', $email);
		return $this->gdb->get($this->common->getTeacherTable())->row();
	}

	/**
	 * check password
	 */
	public function checkPassword($id, $password) {
		$this->db->where('id', $user_id);
		$this->db->where('password', md5($password));
		return $this->gdb->get($this->common->getTeacherTable())->row();
	}

	/**
	 * delete User
	 */
	public function deleteTeacher($id) {
		$this->db->where('id', $id);
		return $this->gdb->delete($this->common->getTeacherTable());
	}

	/**
	 * Update User
	 * */
	public function updateTeacher($id, $data) {
		$this->db->where('id', $id);
		return $this->gdb->update($this->common->getTeacherTable(), $data);
	}

	/**
	 * get All User
	 */
	public function getAllTeacher() {

		// $this->gdb->select('u.*, t.name AS class_name');
		$varData = $this->mongo_db->aggregate($this->common->getTeacherTable(), array(
				[
					'$lookup' => array(
						'from' => $this->common->getClassesTable(),
						'localField' => 'id',
						'foreignField' => 'class_id',
						'as' => 'post_comments'
					),
				],
		));
var_dump($varData);
		// $this->gdb->join($this->common->getClassesTable() . ' AS t', 'u.class_id = t.id', 'LEFT');
		// $this->gdb->where('u.is_deleted', 0);
		return [];
	}

	/**
	 * get user
	 */
	public function getTeacher($id) {
		$this->db->select('u.*');
		$this->db->where('u.id', $id);
		return $this->gdb->get($this->common->getTeacherTable() . ' As u')->row();
	}

}
