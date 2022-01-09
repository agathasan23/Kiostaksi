<?php 

class Login extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->model('login_model');

	}

	function login_action(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->login_model->login_check("tb_user",$where)->num_rows();
		if($cek > 0){

			$get_user=$this->db->get_where("tb_user",$where);
			$data=$get_user->row_array();

			$data_session = array(
				'id_user' => $data['id_user'],
				'username' => $username,
				'level' => $data['level'],
				'success' => 1
				);

			$this->session->set_userdata($data_session);

			if($this->session->userdata('level') == 1){
				redirect(base_url("user"));
			}elseif($this->session->userdata('level') == 2){
				show_404();
			}elseif($this->session->userdata('level') == 3){
				show_404();
			}elseif($this->session->userdata('level') == 4){
				redirect(base_url("admin"));
			}

		}else{
			$this->session->set_userdata(array('success'=> 2));
			redirect(base_url('login'));
		}
	}

	function register_action(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$name = $this->input->post('name');
		$location = $this->input->post('location');
		$phone = $this->input->post('phone');
		$e_mail = $this->input->post('e_mail');

		$id = $this->db->get('tb_user')->num_rows();

		$id+=1;

		$input_user = array(
			'id_user' => $id,
			'username' => $username,
			'password' => md5($password),
			'level' => 1
		);

		$this->data_model->insert_data('tb_user',$input_user);
		$id_dtl_user = $this->db->get('tb_dtl_user')->num_rows();
		$id_dtl_user+=1;

		$input_dtl_user = array(
			'id_dtl_user'=>$id_dtl_user,
			'id_user'=>$id,
			'name'=>$name,
			'location'=>$location,
			'phone'=>$phone,
			'e_mail'=>$e_mail
		);
		$this->data_model->insert_data('tb_dtl_user',$input_dtl_user);
		$this->session->set_userdata(array('success'=> 4));
		redirect(base_url('login'));
	}

	function fast_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
			);
		$cek = $this->login_model->login_check("tb_user",$where)->num_rows();
		if($cek > 0){

			$get_user=$this->db->get_where("tb_user",$where);

			$data=$get_user->row_array();

			$data_session = array(
				'id_user' => $data['id_user'],
				'nama' => $username,
				'level' => $data['level']
				);

			$this->session->set_userdata($data_session);

			redirect(base_url("user/fast_reservation_table"));
		}else{
			echo "Username dan Password salah!";
		}
	}

	function logout(){
		$this->session->sess_destroy();
		$this->session->set_userdata(array('success'=> 3));
		redirect(base_url());
	}
}

?>