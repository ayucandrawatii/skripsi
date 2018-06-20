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
		if(isset($_POST['login']))
		{
			$this->load->library('session');
			$username = $this->input->post('username',true);	//membuat variabel yg bernama username, untuk menerima kiriman dari form login yaitu username
			$password = md5($this->input->post('password',true));	//membuat variabel yg bernama password, untuk menerima kiriman dari form login yaitu password
			$cek = $this->modellogin->proses_login($username, $password);	//untuk pengecekannya menggunakan MODEL, dimana nama 					
			$cek['isLoggedIn'] = true;
								
								//filenya app_model dan nama controllernya yaitu proses_login kemudian kedua variabel akan dikirim ke model
			$hasil = count($cek);
			if ($hasil > 0) 
			{
				$this->session->set_userdata($cek);
				redirect('Pengaduan/index');
			}else{
				redirect('welcome/index');
			}
			
		}
	}

	
	public function submit()
	{
		if(isset($_POST['submit']))
		{
			if ($_POST['idKategori']!=''||$_POST['idInstansi']!=''||$_POST['idKerusakan']!='') {
				$data=$this->input->post();
				$this->db->set('idKategori', $this->input->post('idKategori'));
				$this->db->set('idInstansi', $this->input->post('idInstansi'));
				$this->db->set('idKerusakan', $this->input->post('idKerusakan'));
				$this->db->set('comment', $this->input->post('comment'));
				$this->db->insert('tabelPengaduan');

				redirect('welcome/posting');
			}else{
			redirect('welcome/home');
		}
			
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
