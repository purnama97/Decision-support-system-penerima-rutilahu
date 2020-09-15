<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Home extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'logged')
		{
			redirect(base_url('login'));
		}
		$this->load->model('M_login');
		$data['log'] = $this->M_login->get_log('as_admin',$this->session->userdata('userID'))->result();
		$this->load->view("header",$data);
		$this->load->view("sidebar",$data);
	}
	function index()
	{
		$this->load->view("home/index");
		$this->load->view("footer");

	}
}