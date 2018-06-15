<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminNambahInstansi extends CI_Controller {

	
	public function index()
	{
		if (!$this->session->userdata('isLoggedIn')) redirect('LoginAdmin');
		$get_posting = $this->db->get('instansi');
			$data['instansi'] = $get_posting->result();

		$this->load->view('adminNambahInstansi', $data);
	}

	public function add()
	{
		$this->load->view('adminAddInstansi');
	}
	
	public function submit()
	{
		if(isset($_POST['submit']))
			{
				$data=$this->input->post();
				$this->db->set('nama', $this->input->post('nama'));
				$this->db->where('id', $id);
				$this->db->insert('instansi');

				redirect('adminNambahInstansi');
			}
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('instansi');

		redirect('adminNambahInstansi');
	
	}

	public function edit($id)
	{
		$this->db->where('id',$id);
		$get_posting = $this->db->get('instansi');
		$data['instansi'] = $get_posting->row();

		
		$this->load->view('adminEditInstansi',$data);
	}

	public function submitEdit($id)
	{
		if(isset($_POST['submit']))
			{
				$data=$this->input->post();
				$this->db->set('nama', $this->input->post('nama'));
				$this->db->where('id', $id);
				$this->db->update('instansi');

				redirect('adminNambahInstansi');
			}
	}
}
