<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAdmin extends CI_Controller {

	public function index()
	{
		$this->load->view('LoginAdmin');
	}
	
	public function ceklogin()  //merupakan sebuah fungsi yg bekerja saat user sudah melakukan login
	{
		$this->load->model('ModelLoginAdmin');
		if(isset($_POST['login']))
		{
			$this->load->library('session');
			$username = $this->input->post('username',true);	//membuat variabel yg bernama username, untuk menerima kiriman dari form login yaitu username
			$password = md5($this->input->post('password',true));	//membuat variabel yg bernama password, untuk menerima kiriman dari form login yaitu password
			$cek = $this->ModelLoginAdmin->proses_login($username, $password);	//untuk pengecekannya menggunakan MODEL, dimana nama 
			
													//filenya app_model dan nama controllernya yaitu proses_login kemudian kedua variabel akan dikirim ke model
			$hasil = count($cek);
			if ($hasil > 0) 
			{
				$email=$this->ModelLoginAdmin->email($username);
				$cek['isLoggedIn'] = true;
				$cek['nama'] = $username;
				$cek['email'] =$email;
				$this->session->set_userdata($cek);
				redirect('adminPengaduan/pengaduan');
			}else{
				redirect('LoginAdmin');
			}
		}
	}
}