<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('level') != 4){
			redirect(base_url("login"));
		}
		
	}

	public function index(){
		$data['rooms'] = $this->data_model->get_category()->result();
		$data['users'] = $this->data_model->get_user()->result();

		$this->load->view('templates/header');
		$this->load->view('admin/index', $data);
		$this->load->view('templates/footer');
	}

	public function reservation_data(){
		$data['rooms'] = $this->data_model->get_category()->result();
		$data['reservations'] = $this->data_model->get_reservation()->result();

		$this->load->view('templates/header');
		if($this->session->userdata('success')==1){
			$this->load->view('templates/checkout_success');
		}
		$this->load->view('admin/r_data', $data);
		$this->load->view('templates/footer');

		$this->session->unset_userdata('success');
	}

	public function room_data($id_category){
		$data['rooms'] = $this->data_model->get_category()->result();
		$data['rom'] = $this->data_model->get_all_room($id_category);
		$data['detail'] = $this->data_model->get_data('tb_category',array('id_category'=>$id_category))->row_array();

		$this->session->set_userdata(array('id_category'=> $id_category));

		$this->load->view('templates/header');
		if($this->session->userdata('success')==1){
			$this->load->view('templates/input_success');
		}elseif($this->session->userdata('success')==2){
			$this->load->view('templates/delete_success');
		}
		$this->load->view('admin/room_data', $data);
		$this->load->view('templates/footer');

		$this->session->unset_userdata('success');
	}

	public function room_data_detail($id){
		$data['rooms'] = $this->data_model->get_category()->result();
		$category = $this->db->get_where('tb_room',array('id_room'=>$id))->row_array();
		$reserv = $this->db->get_where('tb_reservasi',array('id_room'=>$id))->row_array();
		$data['user'] = $this->data_model->get_data('tb_dtl_user',array('id_dtl_user'=>$reserv['id_dtl_user']))->row_array();
		$data['category'] = $this->data_model->get_data('tb_category',array('id_category'=>$category['id_category']))->row_array();

		$this->load->view('templates/header');
		$this->load->view('admin/room_detail', $data);
		$this->load->view('templates/footer');
	}

	public function add_new_room(){
		$id_category =$this->session->userdata('id_category');

		$input = array(
			'id_category' => $id_category,
			'availability' => 0
		);

		$this->data_model->insert_data('tb_room',$input);
		$this->session->set_userdata(array('success'=> 1));
		redirect('admin/room_data/'.$id_category);
	}

	public function edit_category(){
		$id_category =$this->session->userdata('id_category');

		$where = array(
			'id_category'=>$id_category
		);

		$input = array(
			'name' => $this->input->post('name'),
			'describe' => $this->input->post('describe'),
			'price' => $this->input->post('price')
		);

		$this->data_model->update_data('tb_category',$where,$input);
		$this->session->set_userdata(array('success'=> 1));
		redirect('admin/room_data/'.$id_category);
	}

	public function delete_room($delete){
		$id_category =$this->session->userdata('id_category');

		$where = array(
			'id_room'=>$delete
		);

		$this->data_model->delete_data('tb_room',$where);
		$this->session->set_userdata(array('success'=> 2));
		redirect('admin/room_data/'.$id_category);
	}

	public function check_out($id){
		$data = $this->db->get_where('tb_reservasi',array('id_reservation'=>$id))->row_array();
		$id_reservation = $data['id_reservation'];
		$id_room = $data['id_room'];
		$id_dtl_user = $data['id_dtl_user'];

		$query = $this->db->get_where('tb_dtl_user',array('id_dtl_user'=>$id_dtl_user))->row_array();

		if($query['id_user']==0){
			$this->data_model->delete_data('tb_dtl_user',array('id_dtl_user'=>$id_dtl_user));
		}
		$where = array(
			'id_room' => $id_room
		);
		$this->data_model->update_data('tb_room',$where,array('availability'=>0));
		$this->data_model->delete_data('tb_reservasi',array('id_reservation'=>$id_reservation));
		$this->session->set_userdata(array('success'=>1));
		redirect('admin/reservation_data');
	}
}

?>