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
		// if ($status) {
		// 	$this->gdb->where('status', $status);
		// }
		// $this->gdb->where('is_deleted', 0);
		return $this->gdb->find($this->common->getClassesTable());
		if ($status) {
			$this->gdb->where('status', $status);
		}
		$this->gdb->where('is_deleted', 0);
		return $this->gdb->get($this->common->getClassesTable());
	}

	public function getClassesById($id) {
		$this->mongo_db->where(array('_id' => new Mongo_db($id)));
		$resutl = $this->mongo_db->find_one($this->common->getClassesTable());
		echo "<pre>";
		print_r($resutl);
		die;
		// return
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
		return $this->gdb->get($this->common->getClassesTable());
	}

}
