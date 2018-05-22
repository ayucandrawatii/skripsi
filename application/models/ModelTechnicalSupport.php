<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelTechnicalSupport extends CI_Model {

	public function select_AlltermIndex($idSolusi){
		$this->db->select('term');
		$this->db->where('idSolusi', $idSolusi);
		$query = $this->db->get('indexing');
		$array = $query->result_array();
		$arr = array_map (function($value){
		    return $value['term'];
		} , $array);
		return $arr;
	}
	public function countTFIndex($idSolusi,$term,$tf){

		$curr_TF= $this->select_termIndex($idSolusi,$term);
		$new_TF=$curr_TF+$tf;

        $dataTerm = array(
	          'tf' => $new_TF,
	    );
	    $this->db->where('idSolusi', $idSolusi);
	    $this->db->where('term', $term);
	    $this->db->update('indexing', $dataTerm);	


	}
	public function select_termIndex($idSolusi,$term){
		$this->db->select('tf');
		$this->db->where('idSolusi', $idSolusi);
		$this->db->where('term', $term);
		$query= $this->db->get('indexing');
		return $query->row()->tf;
	}
	public function select_namaKerusakan($idKerusakan){
		$this->db->select('namaKerusakan');
		$this->db->where('id', $idKerusakan);
		$query= $this->db->get('kerusakan');
		return $query->row()->namaKerusakan;
	}
	public function select_comment($idPengaduan){
		$this->db->select('comment');
		$this->db->where('id', $idPengaduan);
		$query= $this->db->get('tabelpengaduan');
		return $query->row()->comment;
	}
	public function select_idKerusakan($idPengaduan){
		$this->db->select('idKerusakan');
		$this->db->where('id', $idPengaduan);
		$query= $this->db->get('tabelpengaduan');
		return $query->row()->idKerusakan;
	}
	public function select_df(){

		$query = $this->db->query("SELECT COUNT(idSolusi) AS num  FROM tabelsolusi ");
		return $query->row()->num;

	}
	public function select_tf($term){

		$query = $this->db->query("SELECT COUNT(id) AS num  FROM indexing WHERE term='$term'");
		return $query->row()->num;

	}

	public function select_id(){
		$this->db->select('idSolusi');
		$this->db->from('tabelsolusi');
		return $this->db->get();
	}
	public function selecttermIndex($idSolusi){
		$this->db->select('term,tf');
		$this->db->where('idSolusi', $idSolusi);
		$this->db->from('indexing');
		return $this->db->get();
	}
}