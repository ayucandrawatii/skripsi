<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instansi extends CI_Controller {

	
	public function loadInstansi()
	{
		$data['data'] = $this->ModelInstansi->select($data);
	}

	
}
