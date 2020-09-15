<?php
defined('BASEPATH') or exit ('No direct script access allowed');
Class Subkriteria extends CI_Controller
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
        $this->load->model('M_subkriteria');
		$data['log'] = $this->M_login->get_log('as_admin',$this->session->userdata('userID'))->result();
		$this->load->view("header",$data);
		$this->load->view("sidebar",$data);
    }
    
    function index()
    {
        $data['subkriteria'] = $this->M_subkriteria->show()->result();

        $this->load->view('subkriteria/index',$data);
        $this->load->view('footer');
    }

    function tambah()
    {
        $data['kriteria'] = $this->M_kriteria->show()->result();
        $this->load->view('subkriteria/tambah',$data);
        $this->load->view('footer');
    }

    function save()
    {
        $CriteriaID = $this->input->post('criteriaID');
        $subName = $this->input->post('nama');
        $subNilai = $this->input->post('nilai');
        
        $data = array(
            'criteriaID'=>$CriteriaID,
            'subName'=>$subName,
            'subNilai'=>$subNilai
        );
        $save = $this->M_subkriteria->save('as_subkriteria',$data);
        if(!isset($save))
        {
            redirect('subkriteria/tambah');
        }else{
            redirect('subkriteria');
        }
    }

    function edit($id)
    {
        $data['kriteria'] = $this->M_kriteria->show()->result();
        $data['subkriteria'] = $this->M_subkriteria->edit($id)->result();
        $this->load->view('subkriteria/edit',$data);
        $this->load->view('footer');
    }

    function update($id)
    {
        $CriteriaID = $this->input->post('criteriaID');
        $subName = $this->input->post('nama');
        $subNilai = $this->input->post('nilai');
        
        $data = array(
            'criteriaID'=>$CriteriaID,
            'subName'=>$subName,
            'subNilai'=>$subNilai
        );

        $where = array(
            'subID' => $id
        );

        $save = $this->M_subkriteria->update('as_subkriteria',$data,$where);
        if(!isset($save))
        {
            redirect('subkriteria/edit');
        }else{
            redirect('subkriteria');
        }
    }

    function hapus($id)
    {
        $status = $this->M_subkriteria->hapus($id);
        redirect('subkriteria');
    }
}