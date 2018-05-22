<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TechnicalSupport extends CI_Controller {

	public function __construct(){
		parent::__construct();	
		$this->load->model('ModelTechnicalSupport');
	}

	public function index()
	{
		

		$this->db->select('p.*, i.nama as instansi, k.nama as kategori, r.namaKerusakan as kerusakan')->from('tabelPengaduan p')
			->join('instansi i', 'i.id = p.idInstansi')
			->join('kategori k', 'k.id = p.idKategori')
			->join('kerusakan r', 'r.id = p.idKerusakan')
			->order_by('id','desc');
			
			$get_posting = $this->db->get();
			$data['posting'] = $get_posting->result();

		$this->load->view('technicalSupport', $data);
		
		
	}

	

	public function daftarKerusakan()
	{
		$this->db->select('k.*,kt.nama')->from('kerusakan k')
			->join('kategori kt', 'kt.id = k.idKategori');
			
		$get_posting = $this->db->get();
		$data['kerusakan'] = $get_posting->result();
		
		$this->load->view('technicalSupportDaftarKerusakan', $data);
	}

	public function tambahKerusakan()
	{
		$this->load->view('technicalSupportTambahKerusakan');
	}

	public function submitTambahKerusakan()
	{
		if(isset($_POST['submitTambahKerusakan']))
		{
			$data=$this->input->post();
			$this->db->set('idKategori', $this->input->post('kategori'));
			$this->db->set('namaKerusakan', $this->input->post('kerusakan'));
			$this->db->insert('kerusakan');
			
				$this->daftarKerusakan();
		}
	}
	
	public function editKerusakan($id)
	{
		$this->db->where('id',$id);
		$get_posting = $this->db->get('kerusakan');
		$data['posting'] = $get_posting->row();

		
		$get_kategori = $this->db->select('*')->from('kategori')->get();
		$data['kategori'] = $get_kategori->result();

		

		$this->load->view('technicalSupportEditKerusakan',$data);
	}

	public function update()
	{
		if(isset($_POST['submitTambahKerusakan']))
		{
			$id= $this->input->post('id');
			$data=$this->input->post();
			$this->db->set('idKategori', $this->input->post('kategori'));
			$this->db->set('namakerusakan', $this->input->post('kerusakan'));
			$this->db->where('id', $id);
			$this->db->update('kerusakan');

			redirect('TechnicalSupport/daftarKerusakan');
		}

		else{
			redirect('TechnicalSupport/daftarKerusakan');
		}
	}

	public function deleteKerusakan($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('kerusakan');

		redirect('TechnicalSupport/daftarKerusakan');
	
	}

	public function listSolusi()
	{
		$this->db->select('*')->from('tabelsolusi');
		$data['listSolusi'] = $this->db->get()->result();
		$this->load->view('technicalSupportListSolusi',$data);
	}

	
	public function tambahSolusi()
	{
		
		$this->load->view('technicalSupportTambahSolusi');

	}

	public function submit()
	{
		if(isset($_POST['submit']))
		{
			$data=$this->input->post();
			$this->db->set('gejala', $this->input->post('gejala'));
			$this->db->set('kemungkinanPenyebab', $this->input->post('penyebab'));
			$this->db->set('solusi', $this->input->post('solusi'));
			$this->db->insert('tabelSolusi');
			$idSolusi = $this->db->insert_id();

			$gejala = preg_replace("/[[:punct:]]+/", " ",  $this->input->post('gejala'));
			$gejala = strtolower($gejala);
			$gejala = explode(" ", $gejala);
			$fileStopword = base_url().'assets/preprocessing/stopword.txt';
			$stopwords = file($fileStopword, FILE_IGNORE_NEW_LINES);
			$stopword = array_values(array_diff($gejala, $stopwords));
			$tf = array_values(array_count_values($stopword));
			//$doubleTermRemove = menghilangkan kata double
			$doubleTermRemove = array_values(array_unique($stopword));
			$jumlahDoubleTermRemove = count($doubleTermRemove);

			$i = 0;
			while ($i<$jumlahDoubleTermRemove) {
				$this->load->library('stemmingg');
				$textAwal = $doubleTermRemove[$i];
				$stemming = $this->stemmingg->stemming($textAwal);
				if ($stemming=='') {
					$term[$i] = $doubleTermRemove[$i];
				}
				else{
					$term[$i] = $stemming;
				}

				$i++;
			}

			$this->indexing($term, $tf, $jumlahDoubleTermRemove, $idSolusi);

			// $data['hasil'] = $term;
			// $data['tf'] = $tf;
			// $data['jum'] = $jumlahDoubleTermRemove;


			
			// $this->listSolusi();
		}
	}

	public function indexing($term, $tf, $jumlahDoubleTermRemove, $idSolusi) {
		for ($i=0; $i<$jumlahDoubleTermRemove; $i++) { 
			//$termMerge = selesi kata yang double pada index
			$termMerge = $this->ModelTechnicalSupport->select_AlltermIndex($idSolusi);
			if (in_array($term[$i], $termMerge)) {
        		$this->ModelTechnicalSupport->countTFIndex($idSolusi,$term[$i],$tf[$i]);
        	} else {
        		$dataTerm = array(
        			'idSolusi'=>$idSolusi,
	                'term' => $term[$i],
	                'tf' => $tf[$i],
	            );
				$this->db->insert('indexing', $dataTerm);
        		
        	}

		}
		$this->listSolusi();
	}

	public function solusi($idPengaduan){
		
		$comment=$this->ModelTechnicalSupport->select_comment($idPengaduan); //nyarik komen
		$idKerusakan=$this->ModelTechnicalSupport->select_idKerusakan($idPengaduan);
		$namakerusakan=$this->ModelTechnicalSupport->select_namaKerusakan($idKerusakan);
		$query=$comment.' '.$namakerusakan;


			$namakerusakan = preg_replace("/[[:punct:]]+/", " ",  $query);// menghilangkan tanda baca
			$namakerusakan = strtolower($namakerusakan);// kecilin huruf
			$namakerusakan = explode(" ", $namakerusakan);// mengubah ke array
			$fileStopword = base_url().'assets/preprocessing/stopword.txt'; // variabel nampung alamat stopword.txt
			$stopwords = file($fileStopword, FILE_IGNORE_NEW_LINES); // buka file stopword.txt
			$stopword = array_values(array_diff($namakerusakan, $stopwords)); // membandingan antara query dgn stopword.txt
			$tf = array_values(array_count_values($stopword)); // jml TF perkata
			//$doubleTermRemove = menghilangkan kata double
			$doubleTermRemove = array_values(array_unique($stopword)); // menghilangkan kata double yang sama. aku aku makan menjadi aku makan
			$jumlahDoubleTermRemove = count($doubleTermRemove); // menghitung jumlah kata yang tidak double

			$i = 0;
			while ($i<$jumlahDoubleTermRemove) {
				$this->load->library('stemmingg');
				$textAwal = $doubleTermRemove[$i]; //$textAwal kata sebelum distemming
				$stemming = $this->stemmingg->stemming($textAwal);
				if ($stemming=='') { // jika kata setelah diproses stemming tidak ada di stopword.txt dan tidak bisa distemming seperti kata asing / sudah kata dasar, maka kata tsb ($doubleTermRemove) sama dgn $term
					$term[$i] = $doubleTermRemove[$i];
				}
				else{ //kalau tidak masuk ke proses stemming
					$term[$i] = $stemming;
				}

				$i++;
			}

			$x=0;
			//$x2=0;
			$bobotKuadratQuery=0;


			while ( $x< $jumlahDoubleTermRemove) {
				$df= $this->ModelTechnicalSupport->select_df(); // cari df
				$tf= $this->ModelTechnicalSupport->select_tf($term[$x]); // cari tf

				if ($tf==0) { // kalo kata yang dicari tidak ada disemua dokumen
					$x++; // maka kata tsb diabaikan (tidak dihitung)
				}else{
					$idf=log10(($df+1)/($tf+1)); // hitung idf, $df+1 = jumlah dokumen + query, $tf+1 =jumlah kata di semua dokumen + query
					$bobotQ[$term[$x]]=$tf*$idf; // perhitungan bobot pada setiap term

					//rumus cosin penyebut query
					$bobotKuadratQuery=$bobotKuadratQuery + pow($bobotQ[$term[$x]], 2);


					$bobotQuery[$x]= array( $term[$x]=>$bobotQ[$term[$x]], );

					$termTerseleksi[$x]=$term[$x];
					$x++;
					//$x2++;
					
				}
			
			}

			//menccari id dokumen
			$id=$this->ModelTechnicalSupport->select_id();
			$y=0;
			
			
			foreach ($id->result() as $id) {
				$idSolusi[$y]=$id->idSolusi;

				$term=$this->ModelTechnicalSupport->selecttermIndex($idSolusi[$y]);
				$z=0;
				$bobotKuadrat=0;
				$bobotKuadratSolusi=0;
				$atas=0;
				//$QuerykaliTerm=1;
				
				foreach ($term->result() as $term) {
					
					if (in_array($term->term, $termTerseleksi)) {
						 //$termTerseleksiSolusi[$z]=$term->term;
						$df= $this->ModelTechnicalSupport->select_df();
						$tf= $this->ModelTechnicalSupport->select_tf($term->term);
						$idfSolusi=log10(($df+1)/($tf+1));
						$bobot=$term->tf* $idfSolusi;
						
						$bobotKuadrat=$bobotKuadrat + pow($bobot, 2);
						$atas= $atas+ $bobot* $bobotQ[$term->term];

						//rumus cosin pembilang
						//$QuerykaliTerm[]=$QuerykaliTerm*($bobot*$bobotQ[$z]);
						

						$z++;
					}
					else{

					//penyebut solusi
					$df= $this->ModelTechnicalSupport->select_df();
					$tf= $this->ModelTechnicalSupport->select_tf($term->term);
					$idfSolusi=log10(($df+1)/($tf));
					$bobot=$term->tf*$idfSolusi;
					//rumus cosin penyebut
					$bobotKuadratSolusi=$bobotKuadratSolusi + pow($bobot, 2);
					}

					

				}

			if ($z==0) {
				$y++;
			} else{

				//penyebutSolusi
				$kuadratSolusi=$bobotKuadrat+$bobotKuadratSolusi;
				$jumDocKaliQuery[$idSolusi[$y]]=$atas;
				$jum_akarkuadrat[$idSolusi[$y]]=sqrt($kuadratSolusi);
				$jum_akarkuadratQuery=sqrt($bobotKuadratQuery);
				//unset($QuerykaliTerm);
				unset($bobotKuadrat);
				unset($bobotKuadratSolusi);

				$hasil[$idSolusi[$y]]=$jumDocKaliQuery[$idSolusi[$y]]/($jum_akarkuadrat[$idSolusi[$y]]*$jum_akarkuadratQuery);
				$y++;

				$max =max($hasil);
				$key = array_keys($hasil, $max);
				$keys =$key[0];
			}
							
			}


			
		//$data['nm']=$query;
		// 	$data['query']=$bobotQuery;
		// 	$data['terseleksi']=$termTerseleksi;
		// 	$data['idSolusi']=$jumDocKaliQuery;
		// 	$data['penyebutSolusi']=$jum_akarkuadrat;
		// 	$data['penyebutQuery']=$jum_akarkuadratQuery;
		// 	$data['hasil']=$hasil;
		// 	$data['max']=$keys;
		// 	// $data['tf']=$tf;

		//$this->load->view('contoh',$data);
			$this->selectSolusi($keys);
	}

	public function selectSolusi($keys)
	{
		$this->db->select('*');
		$this->db->where('idSolusi', $keys);
		$this->db->from('tabelsolusi');
		$data['listSolusi'] = $this->db->get()->result();
		$this->load->view('technicalSupportViewSolusi',$data);
	}


	public function listQuery()
	{
		$this->db->select('k.*, kt.nama ')->from('kerusakan k')
			->join('kategori kt', 'k.idKategori = kt.id');
			/*->order_by('id','desc')*/
			
			$get_posting = $this->db->get();
			$data['listQuery'] = $get_posting->result();

		$this->load->view('technicalSupportListQuery',$data);
	}
	public function tambahQuery()
	{
		$get_kategori = $this->db->select('*')->from('kategori')->get();
			     $data['kategori'] = $get_kategori->result();

		$this->load->view('technicalSupportTambahQuery',$data);

	}

	public function submitQuery()
	{
		if(isset($_POST['submit']))
		{
			$data=$this->input->post();
			$this->db->set('idKategori', $this->input->post('idKategori'));
			$this->db->set('namaKerusakan', $this->input->post('query'));
			$this->db->insert('kerusakan');

			
			redirect('TechnicalSupport/listQuery');
		}
	}



}

