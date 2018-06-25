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
  $start_awal=$this->fpdf->GetX(); 
  $get_xxx = $this->fpdf->GetX();
  $get_yyy = $this->fpdf->GetY();

  $width_cell = 4;  
  $height_cell = 0.6;  

  $this->fpdf->SetFont('Times','B',10);

  $this->fpdf->MultiCell(1,$height_cell,'NO',1,'C'); 
  $get_xxx+=1;                           
  $this->fpdf->SetXY($get_xxx, $get_yyy);   

  $this->fpdf->MultiCell(6,$height_cell,'INSTANSI',1,'C'); 
  $get_xxx+=6;                           
  $this->fpdf->SetXY($get_xxx, $get_yyy);  

  $this->fpdf->MultiCell(3,$height_cell,'KATEGORI',1,'C'); 
  $get_xxx+=3;                           
  $this->fpdf->SetXY($get_xxx, $get_yyy);

  $this->fpdf->MultiCell(9,$height_cell,'KERUSAKAN',1,'C'); 
  $get_xxx+=9;                           
  $this->fpdf->SetXY($get_xxx, $get_yyy);

  $this->fpdf->MultiCell(4,$height_cell,'STATUS',1,'C'); 
  $get_xxx+=4;                           
  $this->fpdf->SetXY($get_xxx, $get_yyy);

  $this->fpdf->MultiCell(3,$height_cell,'NO SURAT',1,'C'); 
  $get_xxx+=3;                           
  $this->fpdf->SetXY($get_xxx, $get_yyy);
  // Data
  $bulan= $this->uri->segment('3');

    $query1 = $this->db->query("SELECT * FROM tabelpengaduan WHERE idKategori='1' AND YEAR(timestamp)='2018' AND MONTH(timestamp)='$bulan'");
    $hardware = $query1->num_rows();


    $query2 = $this->db->query("SELECT * FROM tabelpengaduan WHERE idKategori='2' AND YEAR(timestamp)='2018' AND MONTH(timestamp)='$bulan'");
    $software = $query2->num_rows();


    $query3 = $this->db->query("SELECT * FROM tabelpengaduan WHERE idKategori='3' AND YEAR(timestamp)='2018' AND MONTH(timestamp)='$bulan'");
    $jaringan = $query3->num_rows();


  $this->fpdf->SetFont('Times','',10);
  foreach($posting as $key => $row)
  {
      $get_xxx=$start_awal;                      
      $get_yyy+=$height_cell;
      $get_xxx=$start_awal;                      
      $get_yyy+=$height_cell;                  
      $this->fpdf->SetXY($get_xxx, $get_yyy);
      $this->fpdf->MultiCell(1,$height_cell,$key+1,1,'C');
      $get_xxx+=1;
      $this->fpdf->SetXY($get_xxx, $get_yyy);
      
      $this->fpdf->MultiCell(6,$height_cell,$row->instansi,1);
      $get_xxx+=6;
      $this->fpdf->SetXY($get_xxx, $get_yyy);
      
      $this->fpdf->MultiCell(3,$height_cell,$row->kategori,1);
      $get_xxx+=3;
      $this->fpdf->SetXY($get_xxx, $get_yyy);
      
      $this->fpdf->MultiCell(9,$height_cell,$row->kerusakan,1);
      $get_xxx+=9;
      $this->fpdf->SetXY($get_xxx, $get_yyy);

      $this->fpdf->MultiCell(4,$height_cell,$row->status,1);
      $get_xxx+=4;
      $this->fpdf->SetXY($get_xxx, $get_yyy);

      $this->fpdf->MultiCell(3,$height_cell,$row->nomorSurat,1);
      $get_xxx+=3;
      $this->fpdf->SetXY($get_xxx, $get_yyy);
      $this->fpdf->Ln();
  }
  $this->fpdf->Ln();
  $this->fpdf->Cell(5,0.6,'KATEGORI KERUSAKAN',1,'C'); 
  $this->fpdf->Ln();
  $this->fpdf->Cell(4,0.6,'HARDWARE',1,'C'); 
  $this->fpdf->Cell(1,0.6,$hardware,1,'C'); 
  $this->fpdf->Ln();
  $this->fpdf->Cell(4,0.6,'SOFTWARE',1,'C'); 
  $this->fpdf->Cell(1,0.6,$software,1,'C'); 
  $this->fpdf->Ln();
  $this->fpdf->Cell(4,0.6,'JARINGAN',1,'C'); 
  $this->fpdf->Cell(1,0.6,$jaringan,1,'C'); 
  $this->fpdf->Ln();







 $this->fpdf->Output();
 // Insert a logo in the top-left corner at 300 dpi

