<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Classes_model extends CI_Model {

	/**
	 * Start Classes
	 */
	public function addClasses($data) {
		return $this->gdb->insert($this->common->getClassesTable(), $data);
	}

	public function getClasses($status = 0) {
		if ($status) {
			$this->gdb->where('status', $status);
		}
		return $this->gdb->get($this->common->getClassesTable())->result();
	}

	public function getClassesById($id) {
		$this->gdb->where('id', $id);
		return $this->gdb->get($this->common->getClassesTable())->row();
	}
	public function updateClasses($id, $data) {
		$this->gdb->where('id', $id);
		return $this->gdb->update($this->common->getClassesTable(), $data);
	}

	public function deleteClasses($id) {
		$this->gdb->where('id', $id);
		return $this->gdb->delete($this->common->getClassesTable());
	}

	/**
	 * check existing
	 */
	public function checkExist($name) {
		$this->gdb->where('name', $name);
		return $this->gdb->get($this->common->getClassesTable())->row();
	}

}
