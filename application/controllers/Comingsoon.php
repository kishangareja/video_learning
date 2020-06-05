<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Comingsoon extends CI_Controller {

	function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->data['title'] = 'Coming Soon';
		$this->load->view('comingsoon', $this->data);
	}

}
