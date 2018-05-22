<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSubmitPengaduan extends CI_Model {

	public function add($data)
	{
		$this->db->insert('tabelpengaduan',$data);	//akan memanggil database sesuai dengan yangdikirim oleh controller
		return ($this->db->affected_rows() !=1) ? false : true;		
	}
}
