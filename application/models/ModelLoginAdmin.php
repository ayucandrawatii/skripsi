<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelLoginAdmin extends CI_Model {

	public function proses_login($username, $password)
	{
		$this->db->where('username',$username);	//akan memanggil database sesuai dengan yangdikirim oleh controller
		$this->db->where('password',$password);
		return $this->db->get('tbadmin')->row_array();
	}

	public function email($username)
	{
		$query = $this->db->query('SELECT email FROM tbadmin WHERE username="'.$username.'"');
		return $query->row()->email;
	}
}
