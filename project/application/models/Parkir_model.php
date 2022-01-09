<?php
class Taksi_model extends CI_Model{

	public function __construct()
	{
		parent::__construct();
		$second_DB = $this->load->database('db2', TRUE);
	}

	public function getSettingArray()
	{
		$query = $this->multipledb->query(“Select * from test_tbl;”);
		return $query->result();
	}

}

