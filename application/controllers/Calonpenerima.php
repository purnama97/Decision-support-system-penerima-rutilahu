<?php
defined('BASEPATH') or exit ('No direct script access allowed');
Class Calonpenerima extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'logged')
		{
			redirect(base_url('login'));
		}
		$this->load->model('M_login');
        $this->load->model('M_penerima');
		$data['log'] = $this->M_login->get_log('as_admin',$this->session->userdata('userID'))->result();
		$this->load->view("header",$data);
		$this->load->view("sidebar",$data);
    }
    
    function index()
    {
        $data['penerima'] = $this->M_penerima->show()->result();

        $this->load->view('penerima/index',$data);
        $this->load->view('footer');
    }

    function tambah()
    {
        $this->load->view('penerima/tambah');
        $this->load->view('footer');
    }

    function save()
    {
        $nokk = $this->input->post('nokk');
        $nama = $this->input->post('namad').' '.$this->input->post('namab');
        $namadusun = $this->input->post('namadusun');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $priodeID =$this->input->post('priodeID');
        $ket =$this->input->post('ket');
        $userID = $this->session->userdata('userID');

        $data = array(
            'penerimaNoKK'=>$nokk,
            'penerimaName'=>$nama,
            'penerimaDusun'=>$namadusun,
            'penerimaRT'=>$rt,
            'penerimaRW'=>$rw,
            'penerimaKet'=>$ket,
            'modifiedUserID'=>$userID
        );
        $save = $this->M_penerima->save('as_penerima',$data);
        if(!isset($save))
        {
            redirect('calonpenerima/tambah');
        }else{
            redirect('calonpenerima');
        }
    }

    function edit($id)
    {
        $data['penerima'] = $this->M_penerima->edit($id)->result();
        $this->load->view('penerima/edit',$data);
        $this->load->view('footer');
    }

    function update($id)
    {
        $nokk = $this->input->post('nokk');
        $nama = $this->input->post('namad').' '.$this->input->post('namab');
        $namadusun = $this->input->post('namadusun');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $ket =$this->input->post('ket');
        $userID = $this->session->userdata('userID');

        $data = array(
            'penerimaNoKK'=>$nokk,
            'penerimaName'=>$nama,
            'penerimaDusun'=>$namadusun,
            'penerimaRT'=>$rt,
            'penerimaRW'=>$rw,
            'penerimaKet'=>$ket,
            'modifiedUserID'=>$userID
        );
        $where = array(
            'penerimaID' => $id
        );

        $save = $this->M_penerima->update('as_penerima',$data,$where);
        if(!isset($save))
        {
            redirect('calonpenerima/edit');
        }else{
            redirect('calonpenerima');
        }
    }

    function hapus($id)
    {
        $status = $this->M_penerima->hapus($id);
        redirect('calonpenerima');
    }
}