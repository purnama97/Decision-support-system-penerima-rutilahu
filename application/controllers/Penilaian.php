<?php
defined('BASEPATH') or exit ('No direct script access allowed');
Class Penilaian extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'logged')
		{
			redirect(base_url('login'));
		}
		$this->load->model('M_login');
        $this->load->model('M_priode');
        $this->load->model('M_kriteria');
        $this->load->model('M_penilaian');
        $this->load->model('M_penerima');
		$data['log'] = $this->M_login->get_log('as_admin',$this->session->userdata('userID'))->result();
		$this->load->view("header",$data);
		$this->load->view("sidebar",$data);
    }
    
    function index()
    {
        $data['penilaian'] = $this->M_penilaian->show()->result();

        $this->load->view('penilaian/index',$data);
        $this->load->view('footer');
    }

    function tambah()
    {
        $data['penerima'] = $this->M_penerima->show2()->result();
        $data['priode'] = $this->M_priode->show()->result();
        $this->load->view('penilaian/tambah',$data);
        $this->load->view('footer');
    }

    function save()
    {
        $penerimaID = $this->input->post('penerimaID');
        $priodeID = $this->input->post('priodeID');
        
        $data = array(
            'penerimaID'=>$penerimaID,
            'priodeID'=>$priodeID,
            'modifiedUserID'=>$this->session->userdata('userID')
        );
        $save = $this->M_penilaian->save('as_penilaian',$data);
        if(!isset($save))
        {
            redirect('penilaian/tambah');
        }else{
            redirect('penilaian');
        }
    }

    function edit($id)
    {
        $data['penerima'] = $this->M_penerima->show2()->result();
        $data['priode'] = $this->M_priode->show()->result();
        $data['penilaian'] = $this->M_penilaian->edit($id)->result();
        $this->load->view('penilaian/edit',$data);
        $this->load->view('footer');
    }

    function update($id)
    {
        $penerimaID = $this->input->post('penerimaID');
        $priodeID = $this->input->post('priodeID');
        
        $data = array(
            'penerimaID'=>$penerimaID,
            'priodeID'=>$priodeID,
            'modifiedUserID'=>$this->session->userdata('userID')
        );

        $where = array(
            'penilaianID' => $id
        );

        $save = $this->M_penilaian->update('as_penilaian',$data,$where);
        if(!isset($save))
        {
            redirect('penilaian/edit');
        }else{
            redirect('penilaian');
        }
    }

    function hapus($id)
    {
        $status = $this->M_penilaian->hapus($id);
        redirect('penilaian');
    }


    function nilai($id)
    {
        
        $data['kriteria'] = $this->M_kriteria->show()->result();
        $data['penilaian'] = $this->M_penilaian->edit($id)->result();
        $this->load->view('penilaian/nilai',$data);
        $this->load->view('footer');
    }
    function savenilai()
    {
        
        $penilaianID = $this->input->post('penilaianID');
        $c1 = $this->input->post('C1');
        $c2 = $this->input->post('C2');
        $c3 = $this->input->post('C3');
        $c4 = $this->input->post('C4');
        $c5 = $this->input->post('C5');
        $c6 = $this->input->post('C6');
        $c7 = $this->input->post('C7');
        
        $data = array(
            'penilaianID'=>$penilaianID,
            'C1'=>$c1,
            'C2'=>$c2,
            'C3'=>$c3,
            'C4'=>$c4,
            'C5'=>$c5,
            'C6'=>$c6,
            'C7'=>$c7,
            'modifiedUserID'=>$this->session->userdata('userID')
        );
        $save = $this->M_penilaian->savenilai('as_nilai',$data);
        if(!isset($save))
        {
            redirect('penilaian/tambah');
        }else{
            redirect('penilaian');
        }
    }
}