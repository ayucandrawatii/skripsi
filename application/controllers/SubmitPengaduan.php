<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SubmitPengaduan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
		$this->load->model('ModelSubmitPengaduan');
    }

	public function submit()
	{
		$post=$this->input->post();
		if($this->ModelSubmitPengaduan->add($post)){
			echo"berhasil";
		}
	}

	
}
