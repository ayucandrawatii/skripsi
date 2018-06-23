<?php
		$this->load->library('fpdf');
   $this->fpdf->FPDF("L","cm","A4");
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
 $this->fpdf->Cell(27,0.7,'PEMERITAH KOTA DENPASAR',0,'C','C');
  $this->fpdf->Ln();
 $this->fpdf->Cell(27,0.7,'DINAS KOMUNIKASI, INFORMATIKA DAN STATISTIK',0,'C','C');
 $this->fpdf->Ln();
 $this->fpdf->SetFont('Times','B',10);
 $this->fpdf->Cell(27,0.7,'Jalan Majapahit No. 1 Denpasar, Tlp (0361) 431229 Fax No : (0361) 895716',0,'C','C');
 $this->fpdf->Ln();
 $this->fpdf->Cell(27,0.7,'web site:www.denpasarkota.g.id         e-mail: kominfo@denpasarkota.go.id',0,'C','C');
 $this->fpdf->Line(5,4,25,4);
 $this->fpdf->Image('assets/img/logoDenpasar.png',6.5,1.2,-1100);
 $this->fpdf->Ln();
 $this->fpdf->Ln();

 // Header
  $this->fpdf->SetFont('Times','B',10);

 $this->fpdf->Cell(1,0.6,'NO',1,'C','C');
 $this->fpdf->Cell(10,0.6,'INSTANSI',1,'C','C'); 
 $this->fpdf->Cell(4,0.6,'KATEGORI',1,'C','C');
 $this->fpdf->Cell(4,0.6,'KERUSAKAN',1,'C','C'); 
 $this->fpdf->Cell(4,0.6,'STATUS',1,'C','C');
 $this->fpdf->Cell(4,0.6,'NOMOR SURAT',1,'C','C');
  $this->fpdf->Ln();  
  // Data
  $this->fpdf->SetFont('Times','',10);
  foreach($posting as $key => $row)
  {
      $this->fpdf->Cell(1,0.6,$key+1,1,'C','C');
      $this->fpdf->Cell(10,0.6,$row->instansi,1);
      $this->fpdf->Cell(4,0.6,$row->kategori,1);
      $this->fpdf->Cell(4,0.6,$row->kerusakan,1);
      $this->fpdf->Cell(4,0.6,$row->status,1);
      $this->fpdf->Cell(4,0.6,$row->nomorSurat,1);
      $this->fpdf->Ln();
  }





 $this->fpdf->Output();
 // Insert a logo in the top-left corner at 300 dpi

