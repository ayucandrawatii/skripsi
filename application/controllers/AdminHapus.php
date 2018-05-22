<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminHapus extends CI_Controller {

	
	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tabelPengaduan');

		redirect('adminPengaduan/pengaduan');
	
	}

	
}