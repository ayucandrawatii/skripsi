<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelInstansi extends CI_Model {

	public function select($data)
	{
		$this->db->select('instansi',$data);	//akan memanggil database sesuai dengan yangdikirim oleh controller
		return ($this->db->affected_rows() !=1) ? false : true;		
	}
}
