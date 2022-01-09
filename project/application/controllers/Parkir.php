<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parkir extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Taksi_model');
		$this->load->model('Login_model');
	}

	public function index() {
		$data['log'] = $this->Taksi_model->log();
		$this->load->view('login', $data);
	}
	public function tabel(){
		$actban = $this->Taksi_model->get_member();
		$today = date("Y-m-d");
		$count = $this->Taksi_model->dayCount($actban['tanggal'],$today);
		if($count>4){
			$d = array(
				'status' =>	1,
				'tanggal' => $today
			);
		}
		$data['trans'] = $this->Taksi_model->trans();
		$data['sql'] = $this->Taksi_model->parkir();
		$this->load->view('home', $data);
	}
	public function banning($get){
		$data['get_member']=$this->Taksi_model->get_member();
		$data = array(
			'status' => 0,
			'tanggal' =>date("Y-m-d")
		);

		$where = array(
			'id_member' => $get
		);
		$this->Taksi_model->update_data('member',$where,$data);
		redirect('tabel');
	}

	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$where = array(
			'email' => $email,
			'password' => $password
		);
		$cek = $this->Login_model->login_check('login',$where)->num_rows();
		if($cek > 0){

			$data_session=$this->db->get_where('login',$where)->row_array();
			$this->session->set_userdata(array('email'=> $data_session['email']));
			redirect('tabel');

		}else{
			redirect(base_url());
		}
	}
	function logout(){
		redirect(base_url());
	}


}
?>
