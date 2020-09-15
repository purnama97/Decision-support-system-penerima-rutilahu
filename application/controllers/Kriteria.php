<?php
defined('BASEPATH') or exit ('No direct script access allowed');
Class Kriteria extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'logged')
		{
			redirect(base_url('login'));
		}
		$this->load->model('M_login');
        $this->load->model('M_kriteria');
		$data['log'] = $this->M_login->get_log('as_admin',$this->session->userdata('userID'))->result();
		$this->load->view("header",$data);
		$this->load->view("sidebar",$data);
    }
    
    function index()
    {
        $data['admin'] = $this->M_kriteria->show()->result();

        $this->load->view('kriteria/index',$data);
        $this->load->view('footer');
    }

    function tambah()
    {
        $this->load->view('kriteria/tambah');
        $this->load->view('footer');
    }

    function save()
    {
        $criteriaName = $this->input->post('nama');
        $criteriaWeight = $this->input->post('bobot');
        
        $data = array(
            'criteriaName'=>$criteriaName,
            'criteriaWeight'=>$criteriaWeight
        );
        $save = $this->M_kriteria->save('as_kriteria',$data);
        if(!isset($save))
        {
            redirect('kriteria/tambah');
        }else{
            redirect('kriteria');
        }
    }

    function edit($id)
    {
        $data['kriteria'] = $this->M_kriteria->edit($id)->result();
        $this->load->view('kriteria/edit',$data);
        $this->load->view('footer');
    }

    function update($id)
    {
        $criteriaName = $this->input->post('nama');
        $criteriaWeight = $this->input->post('bobot');
        
        $data = array(
            'criteriaName'=>$criteriaName,
            'criteriaWeight'=>$criteriaWeight
        );

        $where = array(
            'criteriaID' => $id
        );

        $save = $this->M_kriteria->update('as_kriteria',$data,$where);
        if(!isset($save))
        {
            redirect('kriteria/edit');
        }else{
            redirect('kriteria');
        }
    }

    function hapus($id)
    {
        $status = $this->M_kriteria->hapus($id);
        redirect('kriteria');
    }
}