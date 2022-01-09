<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('level') != 1){
			redirect(base_url("login"));
		}
		$id_user = $this->session->userdata('id_user');
		$get_dtl_user=$this->db->get_where("tb_dtl_user",array('id_user'=>$id_user))->row_array();
		$this->session->set_userdata(array('id_dtl_user'=> $get_dtl_user['id_dtl_user']));

		
	}
	public function index($main = 'index'){
		if(!file_exists(APPPATH. 'views/user/' .$main. '.php')){
			show_404();
		}

		$this->load->view('templates/header');
		if($this->session->userdata('success')==1){
			$this->load->view('templates/login_success');
		}
		$this->load->view('user/'.$main);
		$this->load->view('templates/footer');
		
		$this->session->unset_userdata('success');
	}

	public function reservation(){

		$data['rooms'] = $this->data_model->get_category()->result();

		$this->load->view('templates/header');
		if($this->session->userdata('success')==1){
			$this->load->view('templates/reservation_success');
		}
		$this->load->view('user/reservation',$data);
		$this->load->view('templates/footer');
		
		$this->session->unset_userdata('success');
	}

	public function room($slug = NULL){
		$data['room'] = $this->data_model->get_room($slug);

		$this->load->view('templates/header');
		if($this->session->userdata('success')==1){
			$this->load->view('templates/reservation_success');
		}
		$this->load->view('user/room',$data);
		$this->load->view('templates/footer');
		
		$this->session->unset_userdata('success');
	}

	public function reservation_table(){
		$check_in = $this->input->post('check_in');
		$check_out = $this->input->post('check_out');
		$room = $this->input->post('room');
		$person = $this->input->post('person');
		$id_category = $this->input->post('id');

		$data_room = $this->db->get_where('tb_category',array('id_category' => $id_category))->row_array();

		$data_session = array(
			'check_in' => $check_in,
			'check_out' => $check_out,
			'room' => $room,
			'person' => $person,
			'id_category' => $id_category,
			'name' => $data_room['name'],
			'price' => $data_room['price']
		);

		$this->session->set_userdata($data_session);


		$this->load->view('templates/header');
		$this->load->view('user/cart');
		$this->load->view('templates/footer');
	}

	public function fast_reservation_table(){
		$this->load->view('templates/header');
		$this->load->view('user/cart');
		$this->load->view('templates/footer');
	}
	
	public function reservation_action(){
		$check_in = $this->session->userdata('check_in');
		$check_out = $this->session->userdata('check_out');
		$room = $this->session->userdata('room');
		$person = $this->session->userdata('person');
		$total_price = $this->input->post('total_price');
		$id_category = $this->session->userdata('id_category');

		for($i=1;$i<=$room;$i++){
			$get = $this->db->get_where('tb_room',array('id_category'=>$id_category, 'availability'=>0))->row_array();
			$data = array(
				'id_room' => $get['id_room'],
				'check_in' => $check_in,
				'check_out' => $check_out,
				'person' => $person,
				'id_dtl_user' => $this->session->userdata('id_dtl_user'),
				'total_price' => $total_price,
				'record_date' => date('Y-m-d')
			);

			$where = array(
				'id_room' => $get['id_room']
			);

			$this->data_model->insert_data('tb_reservasi',$data);
			$this->data_model->update_data('tb_room',$where,array('availability' => 1));
		}

		$this->session->set_userdata(array('success'=> 1));
		redirect('user/reservation');
	}
}

?>