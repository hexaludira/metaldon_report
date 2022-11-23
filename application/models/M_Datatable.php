<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Datatable extends CI_Model {
	var $table = 'tbl_incident_list';
	var $column_order = array(null,'incident_name','incident_date','incident_time_begin','incident_time_end','incident_location','incident_detail','incident_affected','incident_remark','incident_status');
	var $column_search = array('incident_name','incident_date','incident_time_begin','incident_time_end','incident_location','incident_detail','incident_affected','incident_remark','incident_status');

	var $order = array('incident_id' => 'asc');

	function _get_datatables_query()
	{
		$this->db->from($this->table);

		$i = 0;

		foreach ($this->column_search as $item)
		{
			if($this->input->post('search')['value']) // if datatable send POST for search
			{
			
				if($i===0)
				{
					$this->db->group_start(); //open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $this->input->post('search')['value']);
				}
				else
				{
					$this->db->or_like($item, $this->input->post('search')['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
				{
					$this->db->group_end();
				}
			}
			$i++;		
		}

		if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } 
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
		
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($this->input->post('length') != -1)
		{
			$this->db->limit($_POST['length'],$_POST['start']);
		}
		$query = $this->db->get();
      return $query->result();
	}

	function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
 
    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }















}