<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	public function test(){
		echo $this->db->query("SELECT VERSION()")->row('version');
	}

	public function test_db()
	{
		$this->load->database();
		$query = $this->db->get("transaksi");
		echo "<pre>";
		print_r($query->result());

		$second_DB = $this->load->database('db2', TRUE);
		$query2 = $second_DB->get("transaksi");
		print_r($query2->result());
		exit;
	}


}
