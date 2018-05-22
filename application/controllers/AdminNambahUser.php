<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminNambahUser extends CI_Controller {

	
	public function index()
	{
		if (!$this->session->userdata('isLoggedIn')) redirect('LoginAdmin');
		$get_posting = $this->db->get('tbuser');
			$data['user'] = $get_posting->result();

		$this->load->view('adminNambahUser', $data);
	}

	public function add()
	{
		$this->load->view('adminAddUser');
	}
	
	public function submit()
	{
		if(isset($_POST['submit']))
			{
				$data=$this->input->post();
				$this->db->set('username', $this->input->post('username'));
				$this->db->where('id_user', $id);
				$this->db->insert('tbuser');

				redirect('adminNambahUser');
			}
	}

	public function delete($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('tbuser');

		redirect('adminNambahUser');
	
	}

	public function edit($id)
	{
		$this->db->where('id_user',$id);
		$get_posting = $this->db->get('tbuser');
		$data['user'] = $get_posting->row();

		
		$this->load->view('adminEditUser',$data);
	}

	public function submitEdit($id)
	{
		if(isset($_POST['submit']))
			{
				$data=$this->input->post();
				$this->db->set('username', $this->input->post('username'));
				$this->db->set('password', md5($this->input->post('password')));
				$this->db->where('id_user', $id);
				$this->db->update('tbuser');

				redirect('adminNambahUser');
			}
	}
}
