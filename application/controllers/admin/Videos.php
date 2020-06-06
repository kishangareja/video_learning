<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Videos extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('videos_model');
		$this->load->model('classes_model');
		// $this->gdb->checkAdminLogin();

	}

	public function index() {
		$this->data['user_data'] = $this->videos_model->getVideos();
		$this->data['view'] = 'admin/videos/view';
		$this->data['page_title'] = 'Video List';
		$this->load->view('admin/admin_master', $this->data);
	}

	public function add($id = 0) {
		$id = $id + 0;
		$this->data['page_title'] = 'Add Video';
		$this->data['view'] = 'admin/videos/add';
		$this->data['tags_data'] = $this->classes_model->getClasses(1);

		$action = 'Add';
		if ($id) {
			$this->data['page_title'] = 'Edit Video';
			$action = 'Edit';
			$this->data['user_data'] = $this->videos_model->getVideosById($id);
		}

		$this->form_validation->set_error_delimiters('<div id="alrt" class="alert alert-danger" style="padding:5px;margin-top:5px;">', '</div>');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('class_id', 'Class', 'required');
		// $this->form_validation->set_rules('video_file', 'File', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');

		if ($this->form_validation->run() == TRUE) {
			$videos = array(
				'title' => trim($this->input->post('title')),
				'class_id' => trim($this->input->post('class_id')),
				'status' => $this->input->post('status'),
			);
			$is_video = 0;
			if (isset($_FILES['video_file']['name']) && $_FILES['video_file']['name'][0]) {
				$allowedExts = array("webm", "mp4", "ogv");
				$extension = pathinfo($_FILES['video_file']['name'], PATHINFO_EXTENSION);

				if ((($_FILES["video_file"]["type"] == "video/mp4") || ($_FILES["video_file"]["type"] == "video/webm") || ($_FILES["video_file"]["type"] == "video/ogv")) && $_FILES['video_file']['error'] == 0 && in_array($extension, $allowedExts)) {

					$temp_file = $_FILES['video_file']['tmp_name'];
					$img_name = "video_" . mt_rand(10000, 999999999) . time();
					$path = $_FILES['video_file']['name'];
					$ext = pathinfo($path, PATHINFO_EXTENSION);
					$videos['video_file'] = $img_name . "." . $ext;
					$url = VIDEOS . $img_name . "." . $ext;
					move_uploaded_file($temp_file, $url);
					$is_video = 1;
				} else {
					$this->session->set_flashdata('error', "Please select valid video file or valid file size");
					redirect(base_url('admin/videos/add/' . $id));
				}
			}

			if (!empty($this->input->post('video_id'))) {
				$id = $this->input->post('video_id');
				$result = $this->videos_model->updateVideos($id, $videos);
				if ($result) {
					$this->session->set_flashdata('success', "Student Updated Successfully.");
				} else {
					$this->session->set_flashdata('error', "Error While Updateing Record.");
				}
			} else {
				$result = $this->videos_model->addVideos($videos);
				if ($result) {
					$id = $result;
					$this->session->set_flashdata('success', "Video Added Successfully.");
				} else {
					$this->session->set_flashdata('error', "Error While Inserting Record.");
				}
			}

			redirect(base_url('admin/videos'));
		}

		$this->load->view('admin/admin_master', $this->data);
	}

	public function delete() {
		$id = $this->input->post('id');
		$result = $this->videos_model->deleteVideos($id);
		if ($result) {
			echo json_encode(array('success' => 1, 'title' => 'Video'));
			exit;
		}
		echo json_encode(array('success' => 0));
	}

}
