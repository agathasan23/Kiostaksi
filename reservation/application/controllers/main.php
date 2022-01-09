<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function view($main = 'home'){
		if(!file_exists(APPPATH. 'views/guest/' .$main. '.php')){
			show_404();
		}

		$data['title'] = ucfirst($main);

		$this->load->view('templates/header');
		if($this->session->userdata('success')==1){
			$this->load->view('templates/input_success');
		}elseif($this->session->userdata('success')==2){
			$this->load->view('templates/failed');
		}elseif($this->session->userdata('success')==3){
			$this->load->view('templates/logout_sucess');
		}elseif($this->session->userdata('success')==4){
			$this->load->view('templates/register_success');
		}
		$this->load->view('guest/'.$main, $data);
		$this->load->view('templates/footer');

		$this->session->unset_userdata('success');
	}

	public function reservation(){
		$data['rooms'] = $this->data_model->get_category()->result();

		$this->load->view('templates/header');
		if($this->session->userdata('success')==1){
			$this->load->view('templates/reservation_success');
		}
		$this->load->view('guest/reservation',$data);
		$this->load->view('templates/footer');
		
		$this->session->unset_userdata('success');
	}

	public function room($slug = NULL){
		$data['room'] = $this->data_model->get_room($slug);

		$this->load->view('templates/header');
		$this->load->view('guest/room',$data);
		$this->load->view('templates/footer');
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
		$this->load->view('guest/cart');
		$this->load->view('templates/footer');
	}

	public function reservation_action(){
		$check_in = $this->session->userdata('check_in');
		$check_out = $this->session->userdata('check_out');
		$room = $this->session->userdata('room');
		$person = $this->session->userdata('person');
		$total_price = $this->input->post('total_price');
		$id_category = $this->session->userdata('id_category');

		$id = $this->db->get('tb_dtl_user')->num_rows();

		$id+=1;

		$user = array(
			'id_dtl_user' => $id,
			'id_user' => 0,
			'name' => $this->input->post('name'),
			'location' => "-",
			'phone' => $this->input->post('phone'),
			'e_mail' =>$this->input->post('e-mail')
		);
		$this->data_model->insert_data('tb_dtl_user',$user);

		for($i=1;$i<=$room;$i++){
			$get = $this->db->get_where('tb_room',array('id_category'=>$id_category, 'availability'=>0))->row_array();
			$data = array(
				'id_room' => $get['id_room'],
				'check_in' => $check_in,
				'check_out' => $check_out,
				'person' => $person,
				'id_dtl_user' => $id,
				'total_price' => $total_price,
				'record_date' => date('Y-m-d')
			);

			$where = array(
				'id_room' => $get['id_room']
			);

			$this->data_model->insert_data('tb_reservasi',$data);
			$this->data_model->update_data('tb_room',$where,array('availability' => 1));
		}

		$data_unset = array(
			'check_in','check_out','room','person','id_category','name','price'
		);
		$this->session->unset_userdata($data_unset);
		$this->session->set_userdata(array('success'=> 1));

		redirect('reservation');
	}
}

?>
