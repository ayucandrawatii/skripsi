<?php 
 
class Stemmingg{
 
	function cekKamus($kata){ 
	
	include 'connect.php';
	$sql = mysqli_query($koneksi, "SELECT * from tb_stopword where word ='$kata' LIMIT 1") or die (mysqli_error($koneksi));
	$result = mysqli_num_rows($sql);
	
	if($result==1){
		return true; // True jika ada
	}else{
		return false; // jika tidak ada FALSE
	}
	
}

	//fungsi pencarian akar kata
	function stemming($kata){ 

		$kataAsal = $kata;

		$cekKata = $this->cekKamus($kata);
		if($cekKata == true){ // Cek Kamus
			return $kata; // Jika Ada maka kata tersebut adalah kata dasar
		}else{ //jika tidak ada dalam kamus maka dilakukan stemming
			$kata = $this->Del_Inflection_Suffixes($kata);
			if($this->cekKamus($kata)){
			return $kata;
			}
			
			$kata = $this->Del_Derivation_Suffixes($kata);
			if($this->cekKamus($kata)){
			return $kata;
			}
			
			$kata = $this->Del_Derivation_Prefix($kata);
			if($this->cekKamus($kata)){
			return $kata;
			}
			
		}
	}

	//fungsi untuk menghapus suffix seperti -ku, -mu, -kah, dsb
	function Del_Inflection_Suffixes($kata){ 
		$kataAsal = $kata;
		
		if(preg_match('/([km]u|nya|[kl]ah|pun)\z/i',$kata)){ // Cek Inflection Suffixes
			$__kata = preg_replace('/([km]u|nya|[kl]ah|pun)\z/i','',$kata);

			return $__kata;
		}
		return $kataAsal;
	}


	// Hapus Derivation Suffixes ("-i", "-an" atau "-kan")
	function Del_Derivation_Suffixes($kata){
		$kataAsal = $kata;
		if(preg_match('/(i|an)\z/i',$kata)){ // Cek Suffixes
			$__kata = preg_replace('/(i|an)\z/i','',$kata);
			if($this->cekKamus($__kata)){ // Cek Kamus
				return $__kata;
			}else if(preg_match('/(kan)\z/i',$kata)){
				$__kata = preg_replace('/(kan)\z/i','',$kata);
				if($this->cekKamus($__kata)){
					return $__kata;
				}
			}
	/*– Jika Tidak ditemukan di kamus –*/
		}
		return $kataAsal;
	}

	// Hapus Derivation Prefix ("di-", "ke-", "se-", "te-", "be-", "me-", atau "pe-")
	function Del_Derivation_Prefix($kata){
		$kataAsal = $kata;

		/* —— Tentukan Tipe Awalan ————*/
		if(preg_match('/^(di|[ks]e)/',$kata)){ // Jika di-,ke-,se-
			$__kata = preg_replace('/^(di|[ks]e)/','',$kata);
			
			if($this->cekKamus($__kata)){
				return $__kata;
			}
			
			$__kata__ = $this->Del_Derivation_Suffixes($__kata);
				
			if($this->cekKamus($__kata__)){
				return $__kata__;
			}
			
			if(preg_match('/^(diper)/',$kata)){ //diper-
				$__kata = preg_replace('/^(diper)/','',$kata);
				$__kata__ = $this->Del_Derivation_Suffixes($__kata);
			
				if($this->cekKamus($__kata__)){
					return $__kata__;
				}
				
			}
			
			if(preg_match('/^(ke[bt]er)/',$kata)){  //keber- dan keter-
				$__kata = preg_replace('/^(ke[bt]er)/','',$kata);
				$__kata__ = $this->Del_Derivation_Suffixes($__kata);
			
				if($this->cekKamus($__kata__)){
					return $__kata__;
				}
			}
				
		}
		
		if(preg_match('/^([bt]e)/',$kata)){ //Jika awalannya adalah "te-","ter-", "be-","ber-"
			
			$__kata = preg_replace('/^([bt]e)/','',$kata);
			if($this->cekKamus($__kata)){
				return $__kata; // Jika ada balik
			}
			
			$__kata = preg_replace('/^([bt]e[lr])/','',$kata);	
			if($this->cekKamus($__kata)){
				return $__kata; // Jika ada balik
			}	
			
			$__kata__ = $this->Del_Derivation_Suffixes($__kata);
			if($this->cekKamus($__kata__)){
				return $__kata__;
			}
		}
		
		if(preg_match('/^([mp]e)/',$kata)){
			$__kata = preg_replace('/^([mp]e)/','',$kata);
			if($this->cekKamus($__kata)){
				return $__kata; // Jika ada balik
			}
			$__kata__ = $this->Del_Derivation_Suffixes($__kata);
			if($this->cekKamus($__kata__)){
				return $__kata__;
			}
			
			if(preg_match('/^(memper)/',$kata)){
				$__kata = preg_replace('/^(memper)/','',$kata);
				if($this->cekKamus($kata)){
					return $__kata;
				}
				$__kata__ = $this->Del_Derivation_Suffixes($__kata);
				if($this->cekKamus($__kata__)){
					return $__kata__;
				}
			}
			
			if(preg_match('/^([mp]eng)/',$kata)){
				$__kata = preg_replace('/^([mp]eng)/','',$kata);
				if($this->cekKamus($__kata)){
					return $__kata; // Jika ada balik
				}
				$__kata__ = $this->Del_Derivation_Suffixes($__kata);
				if($this->cekKamus($__kata__)){
					return $__kata__;
				}
				
				$__kata = preg_replace('/^([mp]eng)/','k',$kata);
				if($this->cekKamus($__kata)){
					return $__kata; // Jika ada balik
				}
				$__kata__ = $this->Del_Derivation_Suffixes($__kata);
				if($this->cekKamus($__kata__)){
					return $__kata__;
				}
			}
			
			if(preg_match('/^([mp]eny)/',$kata)){
				$__kata = preg_replace('/^([mp]eny)/','s',$kata);
				if($this->cekKamus($__kata)){
					return $__kata; // Jika ada balik
				}
				$__kata__ = $this->Del_Derivation_Suffixes($__kata);
				if($this->cekKamus($__kata__)){
					return $__kata__;
				}
			}
			
			if(preg_match('/^([mp]e[lr])/',$kata)){
				$__kata = preg_replace('/^([mp]e[lr])/','',$kata);
				if($this->cekKamus($__kata)){
					return $__kata; // Jika ada balik
				}
				$__kata__ = $this->Del_Derivation_Suffixes($__kata);
				if($this->cekKamus($__kata__)){
					return $__kata__;
				}
			}
			
			if(preg_match('/^([mp]en)/',$kata)){
				$__kata = preg_replace('/^([mp]en)/','t',$kata);
				if($this->cekKamus($__kata)){
					return $__kata; // Jika ada balik
				}
				$__kata__ = $this->Del_Derivation_Suffixes($__kata);
				if($this->cekKamus($__kata__)){
					return $__kata__;
				}
				
				$__kata = preg_replace('/^([mp]en)/','',$kata);
				if($this->cekKamus($__kata)){
					return $__kata; // Jika ada balik
				}
				$__kata__ = $this->Del_Derivation_Suffixes($__kata);
				if($this->cekKamus($__kata__)){
					return $__kata__;
				}
			}
				
			if(preg_match('/^([mp]em)/',$kata)){
				$__kata = preg_replace('/^([mp]em)/','',$kata);
				if($this->cekKamus($__kata)){
					return $__kata; // Jika ada balik
				}
				$__kata__ = $this->Del_Derivation_Suffixes($__kata);
				if($this->cekKamus($__kata__)){
					return $__kata__;
				}
				
				$__kata = preg_replace('/^([mp]em)/','p',$kata);
				if($this->cekKamus($__kata)){
					return $__kata; // Jika ada balik
				}
				
				$__kata__ = $this->Del_Derivation_Suffixes($__kata);
				if($this->cekKamus($__kata__)){
					return $__kata__;
				}
			}	
		}
		return $kataAsal;
	}

}