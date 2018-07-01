<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminEdit extends CI_Controller {

	
	public function edit($id)
	{
		$this->db->where('id',$id);
		$get_posting = $this->db->get('tabelPengaduan');
		$data['posting'] = $get_posting->row();

		$get_instansi = $this->db->select('*')->from('instansi')->get();
			$data['instansi'] = $get_instansi->result();

		$get_kategori = $this->db->select('*')->from('kategori')->get();
			$data['kategori'] = $get_kategori->result();

		$get_kerusakan = $this->db->select('*')->from('kerusakan')->get();
			$data['kerusakan'] = $get_kerusakan->result();

		$this->load->view('adminEdit',$data);
	}

	public function update($id)
	{
		if(isset($_POST['submit']))
		{
			$data=$this->input->post();
			$this->db->set('idKategori', $this->input->post('idKategori'));
			$this->db->set('idInstansi', $this->input->post('idInstansi'));
			$this->db->set('idKerusakan', $this->input->post('idKerusakan'));
			$this->db->set('comment', $this->input->post('comment'));
			$this->db->set('status', $this->input->post('status'));
			$this->db->set('nomorSurat', $this->input->post('nomorSurat'));
			$this->db->where('id', $id);
			$this->db->update('tabelPengaduan');

			redirect('adminPengaduan/pengaduan');
		}

		else{
			redirect('adminPengaduan/pengaduan');
		}
	}

	
}