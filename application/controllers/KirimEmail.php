<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kirimEmail extends CI_Controller {

	public function index($id)
	{
		$this->load->library('fpdf');
		define('FPDF_FONTPATH', $this->config->item('fonts_path'));

		$this->db->where('p.id',$id);
		$surat = $this->db->select('p.*, i.nama as instansi, k.nama as kategori')->from('tabelPengaduan p')
			->join('instansi i', 'i.id = p.idInstansi')
			->join('kategori k', 'k.id = p.idKategori')
			->get();
			$data['tabelpengaduan'] = $surat->row();


		$this->load->view('kirimEmail', $data);
		
	}

	public function send()
	{
		$this->load->library('email');

		$email = $this->db->get('tb_alamat_kirim_email')->result();

		foreach ($email as $key => $e) {
			$subject = 'This is a test ' .date('D, d M Y H:i:s');
			$message = '<p>This message has been sent for testing purposes.</p>';

			// Get full html:
			$body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
			<html xmlns="http://www.w3.org/1999/xhtml">
			<head>
			    <meta http-equiv="Content-Type" content="text/html; charset=' . strtolower(config_item('charset')) . '" />
			    <title>' . html_escape($subject) . '</title>
			    <style type="text/css">
			        body {
			            font-family: Arial, Verdana, Helvetica, sans-serif;
			            font-size: 16px;
			        }
			    </style>
			</head>
			<body>
			' . $message . '
			</body>
			</html>';
			// Also, for getting full html you may use the following internal method:
			//$body = $this->email->full_html($subject, $message);

			$result = $this->email
			        ->from('proyekkominfo.1@gmail.com')
			        /*->reply_to('yoursecondemail@somedomain.com')*/    // Optional, an account where a human being reads.
			        ->to($e->namaEmail)
			        ->subject($subject)
			        ->message($body)
			        ->attach(base_url('uploads/laporan.pdf'))
			        ->send();

			var_dump($result);
			echo '<br />';
			echo $this->email->print_debugger();
		}

		
		
		redirect(base_url('adminPengaduan/pengaduan'));

		exit;

	}	
}

