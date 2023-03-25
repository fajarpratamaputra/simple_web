<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct()
	{

		parent ::__construct();
		//load model
	}

    public function login()
	{
		$this->load->view('be/auth/login');
	}

	function login_action(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => $password
			);			
		$cek = $this->db->get_where('admin',$where);
		if($cek->num_rows() > 0){
		foreach ($cek->result() as $row)
		{
			$data_session = array(
				'nama' => $username,
				'status' => "login",
				'type' => $row->type_user,
				'id' => $row->id
				);

			$this->session->set_userdata($data_session);

			redirect("dashboard/");
			}
		}else{
			redirect(base_url("auth/login"));
		}
	}


	function logout(){
		$this->session->sess_destroy();
		redirect('auth/login');
	}

}