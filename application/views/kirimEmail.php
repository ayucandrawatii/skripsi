<?php
		$this->load->library('fpdf');
   $this->fpdf->FPDF("P","cm","A4");
   // kita set marginnya dimulai dari kiri, atas, kanan. jika tidak diset, defaultnya 1 cm
   $this->fpdf->SetMargins(2,1,1);
   /* AliasNbPages() merupakan fungsi untuk menampilkan total halaman
   di footer, nanti kita akan membuat page number dengan format : number page / total page
   */
   $this->fpdf->AliasNbPages();
   // AddPage merupakan fungsi untuk membuat halaman baru
  $this->fpdf->AddPage();
  // Setting Font : String Family, String Style, Font size
  $this->fpdf->SetFont('Times','B',12);
  $this->fpdf->Ln();
 $this->fpdf->Cell(20,0.7,'PEMERITAH KOTA DENPASAR',0,'C','C');
 $this->fpdf->Ln();
 $this->fpdf->Cell(20,0.7,'DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK',0,'C','C');
 $this->fpdf->Ln();
 $this->fpdf->SetFont('Times','B',10);
 $this->fpdf->Cell(20,0.7,'Jalan Majapahit No. 1 Denpasar, Tlp (0361) 431229 Fax No : (0361) 895716',0,'C','C');
 $this->fpdf->Ln();
 $this->fpdf->Cell(20,0.7,'web site:www.denpasarkota.g.id         e-mail: kominfo@denpasarkota.go.id',0,'C','C');
 $this->fpdf->Line(2,4,19,4);
 $this->fpdf->Image('assets/img/logoDenpasar.png',2.5,1.2,-1100);
 $this->fpdf->Ln();
 $this->fpdf->Ln();
 $this->fpdf->SetFont('Times','',12);
 $this->fpdf->Cell(32,0.7,date('d/m/Y'),0,'C','C');
 $this->fpdf->Ln();
 $this->fpdf->Cell(6,0.7,'Nomor : '.$tabelpengaduan->nomorSurat,0,'L','L');
 $this->fpdf->Ln();
 $this->fpdf->Cell(6,0.7,'Hal : Pengaduan Kerusakan Barang',0,'L','L');
 $this->fpdf->Ln();
 $this->fpdf->Ln();
 $this->fpdf->Cell(6,0.7,'Kepada',0,'L','L');
 $this->fpdf->Ln();
 $this->fpdf->Cell(6,0.7,'Dinas Pusat Jakarta',0,'L','L');
 $this->fpdf->Ln();
 $this->fpdf->Cell(6,0.7,'Jalan blabla no. xxx',0,'L','L');
 $this->fpdf->Ln();
 $this->fpdf->Cell(6,0.7,'Jakarta',0,'L','L');
 $this->fpdf->Ln();
 $this->fpdf->Ln();
 $this->fpdf->Cell(6,0.7,'Dengan hormat,',0,'L','L');
 $this->fpdf->Ln();
 $this->fpdf->MultiCell(17,0.7,'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
 $this->fpdf->Ln();
 $this->fpdf->Cell(6,0.7,'Instansi     : '.$tabelpengaduan->instansi);
 $this->fpdf->Ln();
 $this->fpdf->Cell(6,0.7,'Kategori    : '.$tabelpengaduan->kategori);
 $this->fpdf->Ln();
 $this->fpdf->MultiCell(17,0.7,'Comment  : '.$tabelpengaduan->comment);
 $this->fpdf->Ln();
 $this->fpdf->Cell(6,0.7,'Atas perhatiannnya, terima kasih',0,'L','L');
 $this->fpdf->Ln();
 $this->fpdf->Ln();
 $this->fpdf->Ln();
 $this->fpdf->Cell(22.2,0.7,'Denpasar, '.date('d/m/Y'),0,'C','C');
 $this->fpdf->Ln();
 $this->fpdf->Cell(26.2,0.7,'Dinas Komunikasi, Informatika Dan Statistik',0,'C','C');
 $this->fpdf->Ln();
 $this->fpdf->Cell(26.2,0.7,'Sekretaris',0,'C','C');
 $this->fpdf->Ln();
 $this->fpdf->Ln();
 $this->fpdf->Ln();
 $this->fpdf->Ln();
 $this->fpdf->SetFont('Times','U',12);
 $this->fpdf->Cell(26.2,0.7,'Ida Bagus Gde Agung Sutha Wijaya, SE, MM',0,'C','C');
 $this->fpdf->Ln();
 $this->fpdf->SetFont('Times','',12);
 $this->fpdf->Cell(26.2,0.7,'NIP. 19700429 19950 1 003',0,'C','C');




 $this->fpdf->Output("../skripsi/uploads/laporan.pdf","F");

 redirect(base_url('KirimEmail/send'));
 // Insert a logo in the top-left corner at 300 dpi
