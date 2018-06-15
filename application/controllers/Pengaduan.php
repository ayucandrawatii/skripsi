<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pengaduan extends CI_Controller {

	
	public function index()
	{
		if (!$this->session->userdata('isLoggedIn')) redirect('welcome/index');
		$get_instansi = $this->db->select('*')->from('instansi')->get();
			     $data['instansi'] = $get_instansi->result();

		$get_kategori = $this->db->select('*')->from('kategori')->get();
			     $data['kategori'] = $get_kategori->result();

		$get_kerusakan = $this->db->select('*')->from('kerusakan')->get();
				$data['kerusakan'] = $get_kerusakan->result();

		$this->load->view('pengaduan', $data);
	}

	public function cariKategori($idKategori)
	{
		$this->db->select('*');
	  	$this->db->where('idKategori', $idKategori);
	  	$sql_kategori= $this->db->get('kerusakan');
	  	if($sql_kategori->num_rows()>0){
	   		$data['kerusakan']=$sql_kategori;
	  	} else{
	   	$data['kerusakan']=0;
	  	}	

	  	$this->load->view('isiKategori',$data);
	}

	public function signOut()
	{
		$this->session->sess_destroy();

		redirect('welcome/index');
	}
}
