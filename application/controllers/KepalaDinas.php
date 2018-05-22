<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KepalaDinas extends CI_Controller {

	
	public function index()
	{
		// if (!$this->session->userdata('isLoggedIn')) redirect('LoginAdmin');
		$search = $data['search'] = $this->input->post('search');
		if ($this->input->post()) {
			$tahun = $this->input->post('tahun');
			$bulan = $this->input->post('bulan');
		} else {
			$tahun = 0;
			$bulan = 0;
		}
		
		$this->db->select('p.*, i.nama as instansi, k.nama as kategori, r.namaKerusakan as kerusakan')->from('tabelPengaduan p')
			->join('instansi i', 'i.id = p.idInstansi')
			->join('kategori k', 'k.id = p.idKategori')
			->join('kerusakan r', 'r.id = p.idKerusakan')
			->order_by('id','desc');
			if ($tahun != 0) $this->db->where('year(timestamp)', $tahun);
			if ($bulan != 0) $this->db->where('month(timestamp)', $bulan);
			if ($search != "") $this->db->where("nomorSurat like '%$search%' or i.nama like '%$search%'");
			$get_posting = $this->db->get();
			$data['posting'] = $get_posting->result();

		$data['grafik'] = $this->db->query('SELECT MONTH(`timestamp`) bulan, COUNT(`timestamp`) total FROM tabelpengaduan WHERE YEAR(`timestamp`) = YEAR(NOW()) GROUP BY MONTH(`timestamp`)')->result();

		$data['tahun'] = $tahun;
		$data['bulan'] = $bulan;
		$this->load->view('kepalaDinas', $data);
		
	}

	public function posting()
	{
		$get_posting = $this->db->select('p.*, i.nama as instansi, k.nama as kategori')->from('tabelPengaduan p')
			->join('instansi i', 'i.id = p.idInstansi')
			->join('kategori k', 'k.id = p.idKategori')
			/*->order_by('id','desc')*/
			->get();
			$data['posting'] = $get_posting->result();

			// var_dump($data);

		$this->load->view('posting', $data);
	}

	public function cetak($bulan, $tahun)
	{
		$this->db->select('p.*, i.nama as instansi, k.nama as kategori')->from('tabelPengaduan p')
			->join('instansi i', 'i.id = p.idInstansi')
			->join('kategori k', 'k.id = p.idKategori');
			$this->db->where('year(timestamp)', $tahun);
			$this->db->where('month(timestamp)', $bulan);
			$get_posting = $this->db->get();
			$data['posting'] = $get_posting->result();

		$this->load->library('fpdf');
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
			
		$this->load->view('cetakPengaduan', $data);
	}

}
