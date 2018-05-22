<?php

function cosine($query = [], $documents = []){
	$result = [];

	// starting proces per doc
	foreach ($documents as $q) {
		// declarative var. per doc
		$pembilang = 0;
		$pPenyebut = 0;
		$qPenyebut = 0;
		foreach ($query as $i => $p) {
				$pembilang += $p*$q[$i];
				$pPenyebut += pow($p, 2);
				$qPenyebut += pow($q[$i], 2);
		}

		$penyebut = sqrt($pPenyebut*$qPenyebut);
		
		// avoid division by zero
		if($penyebut == 0){
			$result[] = 0;
		} else {
			$result[] = $pembilang/$penyebut;	
		}
	}

	return $result;
}
