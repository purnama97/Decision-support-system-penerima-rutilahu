<?php 
defined('BASEPATH') or exit ('No direct script access allowed');
Class Login extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->view('login');
	}

	function index()
	{
		
	}

	function auth()
	{
		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));

		$data = array(
			'userNames'=> $username,
			'userPassword'=> $password
		);

		$this->load->model('M_Login');
		$hasil = $this->M_Login->auth('as_admin',$data)->num_rows();
		$data = $this->M_Login->auth('as_admin',$data)->result();
		foreach($data as $data);
		if($hasil >= 1 AND $data->userBlocked != 'Y')
		{
			$session = array(
				'userID' => $data->userID,
				'userName' => $data->userName,
				'userLevel' => $data->userLevel,
				'status' => 'logged'
			);
			$this->session->set_userdata($session);
			redirect('home');
		}else{
			redirect('login?err=1');
		}
	}

	function logout(){
		$this->session->sess_destroy();
	}
}