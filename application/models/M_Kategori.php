<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Kategori extends CI_Model {
	function get_kategori(){
		$data = $this->db->query("SELECT * FROM tbl_kategori");
		return $data;
	}

	function get_subkategori($id){
		$data = $this->db->query("SELECT * FROM tbl_subkategori WHERE subkategori_kategori_id = '$id'");
		return $data->result();
	}
}