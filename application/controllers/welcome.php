<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('loginUser');
	}

	public function ceklogin()  //merupakan sebuah fungsi yg bekerja saat user sudah melakukan login
	{
		// if(isset($_POST['login']))
		// {
			$this->load->library('session');
			$username = $this->input->post('username',true);	//membuat variabel yg bernama username, untuk menerima kiriman dari form login yaitu username
			$password = md5($this->input->post('password',true));	//membuat variabel yg bernama password, untuk menerima kiriman dari form login yaitu password
			
			$q_cek1	= $this->db->query("SELECT * FROM tbuser WHERE username = '".$username."' AND password = '".$password."'");
			$j_cek1	= $q_cek1->num_rows();
			$d_cek1	= $q_cek1->row();

			$q_cek2	= $this->db->query("SELECT * FROM tbadmin WHERE username = '".$username."' AND password = '".$password."'");
			$j_cek2	= $q_cek2->num_rows();
			$d_cek2	= $q_cek2->row();

			$q_cek3	= $this->db->query("SELECT * FROM tb_technical_support WHERE username = '".$username."' AND password = '".$password."'");
			$j_cek3	= $q_cek3->num_rows();
			$d_cek3	= $q_cek3->row();

			$q_cek4	= $this->db->query("SELECT * FROM tb_kepala_dinas WHERE username = '".$username."' AND password = '".$password."'");
			$j_cek4	= $q_cek4->num_rows();
			$d_cek4	= $q_cek4->row();

			if($j_cek1 == 1) {
			$data = array(
				'username' => $d_cek1->username,
				'password' => $d_cek1->password,
				'id' => $d_cek1->id_user,
				'foto' => $d_cek1->foto,
				'email' => $d_cek1->email,
				'user_valid' => true
				);
			$this->session->set_userdata($data);
			redirect('pengaduan');
			}
				
			else if($j_cek2 == 1) {
			$data = array(
				'username' => $d_cek2->username,
				'password' => $d_cek2->password,
				'id' => $d_cek2->id,
				'foto' => $d_cek2->foto,
				'email' => $d_cek2->email,
				'user_valid' => true
				);
			$this->session->set_userdata($data);
			redirect('adminPengaduan/pengaduan');
			}

			else if($j_cek3 == 1) {
			$data = array(
				'username' => $d_cek3->username,
				'password' => $d_cek3->password,
				'foto' => $d_cek3->foto,
				'email' => $d_cek3->email,
				'id' => $d_cek3->id,
				'user_valid' => true
				);
			$this->session->set_userdata($data);
			redirect('TechnicalSupport');
			}
						
			else if($j_cek4 == 1) {
			$data = array(
				'username' => $d_cek4->username,
				'password' => $d_cek4->password,
				'email' => $d_cek4->email,
				'foto' => $d_cek4->foto,
				'id' => $d_cek4->id,
				'user_valid' => true
				);
			$this->session->set_userdata($data);
			redirect('KepalaDinas');
			}

			else{
				echo "<script>alert('User Name atau Password Salah!'); window.location='".base_url()."' </script>";
			}
			
		}	
		


	
	public function submit()
	{
		if(isset($_POST['submit']))
		{
			$data=$this->input->post();
			$this->db->set('idKategori', $this->input->post('idKategori'));
			$this->db->set('idInstansi', $this->input->post('idInstansi'));
			$this->db->set('idKerusakan', $this->input->post('idKerusakan'));
			$this->db->set('comment', $this->input->post('comment'));
			$this->db->insert('tabelPengaduan');

			redirect('welcome/posting');
		}

		else{
			redirect('welcome/home');
		}
	}

	public function posting()
	{
		$get_posting = $this->db->select('p.*, i.nama as instansi, k.nama as kategori, namaKerusakan')->from('tabelPengaduan p')
			->join('instansi i', 'i.id = p.idInstansi')
			->join('kategori k', 'k.id = p.idKategori')
			->join('kerusakan kr', 'kr.id = p.idKerusakan')
			->order_by('id','desc')
			->get();
			$data['posting'] = $get_posting->result();

			// var_dump($data);

		$this->load->view('posting', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome/index');
	}

	
	/*public function testStem(){
		require APPPATH.'third_party/sastrawi-master/src/Sastrawi/Stemmer/StemmerFactory.php';
		use Sastrawi\Stemmer\StemmerFactory;
		
		$stemmerFactory = new StemmerFactory();
		$stemmer  = $stemmerFactory->createStemmer();

		// stem
		$sentence = 'Perekonomian Indonesia sedang dalam pertumbuhan yang membanggakan';
		$output   = $stemmer->stem($sentence);

		echo $output . "\n";
		// ekonomi indonesia sedang dalam tumbuh yang bangga

		echo $stemmer->stem('Mereka meniru-nirukannya') . "\n";
		// mereka tiru
	}*/
}
