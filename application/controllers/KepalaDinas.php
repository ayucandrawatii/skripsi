<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KepalaDinas extends CI_Controller {

	
	public function index()
	{
		// if (!$this->session->userdata('isLoggedIn')) redirect('LoginAdmin');
		$search = $data['search'] = $this->input->post('search');
		if ($this->input->get()) {
			$tahun = $this->input->get('tahun');
			$bulan = $this->input->get('bulan');
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
		$this->db->select('p.*, i.nama as instansi, k.nama as kategori, r.namaKerusakan as kerusakan')->from('tabelPengaduan p')
			->join('instansi i', 'i.id = p.idInstansi')
			->join('kategori k', 'k.id = p.idKategori')
			->join('kerusakan r', 'r.id = p.idKerusakan');
			$this->db->where('year(timestamp)', $tahun);
			$this->db->where('month(timestamp)', $bulan);
			$get_posting = $this->db->get();
			$data['posting'] = $get_posting->result();

		$this->load->library('fpdf');
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));
			
		$this->load->view('cetakPengaduan', $data);
	} 

	public function profile()
	{
		// if (!$this->session->userdata('isLoggedIn')) redirect('LoginAdmin');
		$this->load->view('kepalaDinasProfile');
	}

	public function kepalaDinasProfileEdit()
	{
		$config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('foto'))
                {
                        $error = array('error' => $this->upload->display_errors());

                        $this->load->view('upload_form', $error);
                }
                else
                {
                        $data = $this->upload->data();

                        $data = array(
				        'username' => $this->input->post('nama'),
				        'email'  => $this->input->post('email'),
				        'foto'  => "uploads/".$data['file_name']
						);

						$this->db->update('tb_kepala_dinas', $data);
                }
        $this->load->library('session');
        $this->session->set_userdata($data);       
        redirect('KepalaDinas/profile');
	}
}
