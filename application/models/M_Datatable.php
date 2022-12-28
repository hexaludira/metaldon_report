<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Datatable extends CI_Model {
	var $table = 'tbl_metaldon_problem';
	var $column_order = array(null,'problem_date','problem_location','problem_name','problem_detail','problem_status','problem_repair_date','problem_remark');
	var $column_search = array('problem_date','problem_location','problem_name','problem_detail','problem_status','problem_repair_date','problem_remark');

	var $order = array('problem_id' => 'asc');

	//Untuk menampilkan datatabel sesuai search
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