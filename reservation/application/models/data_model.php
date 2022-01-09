<?php 
	class Data_model extends CI_model{
		public function __construct(){
			$this->load->database();
		}

		public function get_room($slug = FALSE){
			if($slug == FALSE){
				$query = $this->db->get('tb_category');
				return $query->result_array();
			}

			$query=$this->db->get_where('tb_category',array('slug' => $slug));

			return $query->row_array();
		}

		public function get_all_room($data){

			$query=$this->db->get_where('tb_room',array('id_category' => $data));

			return $query->result();
		}

		public function get_category(){
			return $this->db->get('tb_category');
		}

		public function get_user(){
			$this->db->select('tb_dtl_user.name,tb_dtl_user.location,tb_user.username,tb_user.level');
			$this->db->select('tb_dtl_user.phone,tb_dtl_user.e_mail');
			$this->db->from('tb_dtl_user,tb_user');
			$this->db->where('tb_dtl_user.id_user=tb_user.id_user');
			$this->db->where('tb_user.level=1');

			return $this->db->get();
		}

		public function get_reservation(){
			$this->db->select('tb_reservasi.id_reservation,tb_reservasi.id_room,tb_reservasi.check_in,tb_reservasi.check_out');
			$this->db->select('tb_dtl_user.name,tb_reservasi.total_price,tb_reservasi.record_date,tb_reservasi.person');
			$this->db->from('tb_reservasi,tb_dtl_user');
			$this->db->where('tb_reservasi.id_dtl_user=tb_dtl_user.id_dtl_user');

			return $this->db->get();
		}

		public function get_room_detail($id){
			$this->db->select('tb_reservasi.id_reservation,tb_reservasi.id_room,tb_reservasi.check_in,tb_reservasi.check_out');
			$this->db->select('tb_dtl_user.name,tb_reservasi.record_date,tb_reservasi.person');
			$this->db->from('tb_reservasi,tb_dtl_user');
			$this->db->where('tb_reservasi.id_dtl_user=tb_dtl_user.id_dtl_user');
			$this->db->where('tb_reservasi.id_room',$id);

			return $this->db->get();
		}

		public function count_room($where){
			$this->db->select('*');
			$this->db->from('tb_room');
			$this->db->where('availability=0');
			$this->db->where('id_category',$where);

			return $this->db->get();
		}

		public function get_data($table,$where){
			return $this->db->get_where($table,$where);
		}

		public function insert_data($table,$data){
			$this->db->insert($table,$data);
		}

		public function update_data($table,$where,$data){
			$this->db->where($where);
			$this->db->update($table,$data);
		}

		public function delete_data($table,$where){
			$this->db->where($where);
			$this->db->delete($table);
		}
	}
?>