<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Incident extends CI_Model {
	
	function getData(){
		return $this->db->get('tbl_incident_list')->result();
	}

	function getDataLast(){
		$query = "SELECT * FROM tbl_incident_list ORDER BY incident_id DESC LIMIT 1";
		return $this->db->query($query)->row();
	}

	function deleteData($incident_id){
		$this->db->where('incident_id',$incident_id);
		$this->db->delete('tbl_incident_list');
	}

	function insertData($data){
		$this->db->insert('tbl_incident_list',$data);
	}

	function getDataByID($incident_id){
		$this->db->where('incident_id',$incident_id);
		return $this->db->get('tbl_incident_list')->result();
	}

	function getImageNameByID($incident_id){
		$this->db->where('incident_id',$incident_id);
		return $this->db->get('tbl_incident_list')->row();
	}

	function updateData($incident_id,$data){
		$this->db->where('incident_id',$incident_id);
		return $this->db->update('tbl_incident_list',$data);
	}

	function simpanUpload($img_name){
		$data = array(
			'incident_picture_name' => $img_name,
		);

		$result = $this->db->insert('tbl_incident_list',$data);
		return $result;
	}

}


