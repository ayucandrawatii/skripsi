<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminNambahAlamatEmail extends CI_Controller {

	
	public function index()
	{
		// if (!$this->session->userdata('isLoggedIn')) redirect('LoginAdmin');
		$get_posting = $this->db->get('tb_alamat_kirim_email');
			$data['user'] = $get_posting->result();

		$this->load->view('adminNambahAlamatEmail', $data);
	}

	public function add()
	{
		$this->load->view('adminAddAlamatEmail');
	}
	
	public function submit()
	{
		if(isset($_POST['submit']))
			{
				$data=$this->input->post();
				$this->db->set('namaEmail', $this->input->post('namaEmail'));
				// $this->db->where('id', $id);
				$this->db->insert('tb_alamat_kirim_email');

				redirect('adminNambahAlamatEmail');
			}
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tb_alamat_kirim_email');

		redirect('adminNambahAlamatEmail');
	
	}

	public function edit($id)
	{
		$this->db->where('id',$id);
		$data['namaEmail'] = $this->db->get('tb_alamat_kirim_email')->row();
		$data['tb_alamat_kirim_email'] = $data;

		
		$this->load->view('adminEditAlamatEmail',$data);
	}

	public function submitEdit($id)
	{
		if(isset($_POST['submit']))
			{
				$data=$this->input->post();
				$this->db->set('namaEmail', $this->input->post('namaEmail'));
				$this->db->where('id', $id);
				$this->db->update('tb_alamat_kirim_email');

				redirect('adminNambahAlamatEmail');
			}
	}
}