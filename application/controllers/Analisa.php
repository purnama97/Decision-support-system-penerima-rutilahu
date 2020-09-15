<?php
defined('BASEPATH') or exit ('No direct script access allowed');
Class Analisa extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'logged')
		{
			redirect(base_url('login'));
		}
		$this->load->model('M_login');
        $this->load->model('M_penilaian');
        $this->load->model('M_priode');
        $this->load->model('M_analisa');
        $this->load->model('M_kriteria');
		$data['log'] = $this->M_login->get_log('as_admin',$this->session->userdata('userID'))->result();
		$this->load->view("header",$data);
		$this->load->view("sidebar",$data);
    }
    
    function index()
    {
        $data['priode'] = $this->M_priode->show1()->result();

        $this->load->view('analisis/index',$data);
        $this->load->view('footer');
    }

    function hitung()
    {
        $id = $this->input->post('id');
        $data['kriteria'] = $this->M_kriteria->show()->result();
        $data['penilaian'] = $this->M_analisa->show2($id)->result();
        $this->load->view('analisis/analis',$data);
        $this->load->view('footer');
    }
}