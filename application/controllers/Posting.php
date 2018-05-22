<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Posting extends CI_Controller {

	
	public function loadPosting()
	{
		$this->load->view('posting');
	}

	
}