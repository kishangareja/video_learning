<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Videos_model extends CI_Model {

	/**
	 * Start Videos
	 */
	public function addVideos($data) {
		return $this->gdb->insert($this->common->getVideosTable(), $data);
	}

	public function getVideos($status = 0) {
		if ($status) {
			$this->gdb->where('v.status', $status);
		}
		$this->gdb->select('v.*, t.name AS class_name');
		$this->gdb->join($this->common->getClassesTable() . ' AS t', 'v.class_id = t.id', 'LEFT');
		$this->gdb->where('v.is_deleted', 0);
		return $this->db->get($this->common->getVideosTable() . ' AS  v ')->result();
	}

	public function getVideosById($id) {
		$this->gdb->where('id', $id);
		return $this->gdb->get($this->common->getVideosTable())->row();
	}
	public function updateVideos($id, $data) {
		$this->gdb->where('id', $id);
		return $this->gdb->update($this->common->getVideosTable(), $data);
	}

	public function deleteVideos($id) {
		$this->gdb->where('id', $id);
		return $this->gdb->delete($this->common->getVideosTable());
	}

	/**
	 * check existing
	 */
	public function checkExist($name) {
		$this->gdb->where('name', $name);
		return $this->gdb->get($this->common->getVideosTable())->row();
	}

}
