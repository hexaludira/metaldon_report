<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Metal_Problem extends CI_Model {
	
	function getData(){
		return $this->db->get('tbl_metaldon_problem')->result();
	}

	function getDataLast(){
		$query = "SELECT * FROM tbl_metaldon_problem ORDER BY problem_id DESC LIMIT 1";
		return $this->db->query($query)->row();
	}

	function deleteData($problem_id){
		$this->db->where('problem_id',$problem_id);
		$this->db->delete('tbl_metaldon_problem');
	}

	function insertData($data){
		$this->db->insert('tbl_metaldon_problem',$data);
	}

	function getDataByID($problem_id){
		$this->db->where('problem_id',$problem_id);
		return $this->db->get('tbl_metaldon_problem')->result();
	}

	function getImageNameByID($problem_id){
		$this->db->where('problem_id',$problem_id);
		return $this->db->get('tbl_metaldon_problem')->row();
	}

	function updateData($problem_id,$data){
		$this->db->where('problem_id',$problem_id);
		return $this->db->update('tbl_metaldon_problem',$data);
	}

	// function simpanUpload($img_name){
	// 	$data = array(
	// 		'incident_picture_name' => $img_name,
	// 	);

	// 	$result = $this->db->insert('tbl_incident_list',$data);
	// 	return $result;
	// }

}


