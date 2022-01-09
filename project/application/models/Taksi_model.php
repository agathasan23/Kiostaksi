<?php
class Taksi_model extends CI_Model{
	public function trans(){
		$this->db->select('*');
		$this->db->from('transaksi');
		$this->db->join('taksi', 'transaksi.id_taksi = taksi.id_taksi');
		$this->db->join('operator', 'operator.id_operator = taksi.id_operator');
		$query = $this->db->get();
		return $query->result();
	}
	public function parkir(){
		$second_DB = $this->load->database('db2', TRUE);
		$query = $second_DB->get("transaksi");
		return $query->result();
	}
	public function log(){
		$this->db->select('*');
		$this->db->from('login');
	}
	public function get_member(){
		$second_DB = $this->load->database('db2', TRUE);
		$query = $second_DB->get("member");
		return $query->result();
	}
	public function update_data($table,$where,$data){
		$second_DB = $this->load->database('db2', TRUE);
		$second_DB->where($where);
		$second_DB->update($table,$data);
	}
	public function dayCount($from,$to){
		$first_date = strtotime($from);
		$second_date = strtotime($to);
		$days_diff = $second_date - $first_date;
		return date('d',$days_diff);
	}
}
