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
		$this->db->where('_id', $id);
		return $this->gdb->update($this->common->getTeacherTable(), $data);
	}

	/**
	 * get All User
	 */
	public function getAllTeacher() {

		// $this->gdb->select('u.*, t.name AS class_name');
		return  $this->gdb->aggregate($this->common->getTeacherTable(), array(
				array(
					'$lookup' => array(
						'localField' => 'class_id',
						'from' => $this->common->getClassesTable(),
						'foreignField' => 'cid',
						'as' => 'teacher_class'
					),
				)
			)
		);
	}

	/**
	 * get user
	 */
	public function getTeacher($id) {
		$this->db->where('_id', $id);
		return $this->gdb->find_one($this->common->getTeacherTable());
	}

}
