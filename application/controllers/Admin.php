<?php
defined('BASEPATH') or exit ('No direct script access allowed');
Class Admin extends CI_Controller
{
    function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != 'logged')
		{
			redirect(base_url('login'));
		}
		$this->load->model('M_login');
        $this->load->model('M_admin');
		$data['log'] = $this->M_login->get_log('as_admin',$this->session->userdata('userID'))->result();
		$this->load->view("header",$data);
		$this->load->view("sidebar",$data);
    }
    
    function index()
    {
        $data['admin'] = $this->M_admin->show()->result();

        $this->load->view('admin/index',$data);
        $this->load->view('footer');
    }

    function tambah()
    {
        $this->load->view('admin/tambah');
        $this->load->view('footer');
    }

    function save()
    {
        $nip = $this->input->post('nip');
        $nama = $this->input->post('namad').' '.$this->input->post('namab');
        $notelp = $this->input->post('Notelp');
        $level = $this->input->post('level');
        $blok = $this->input->post('blok');
        $username =$this->input->post('username');
        $password = md5($this->input->post('password'));
        $updatec = $this->input->post('update');
        $updateu = date('Y-m-d');
        $userID = $this->session->userdata('userID');

        $data = array(
            'userNIP'=>$nip,
            'userFullName'=>$nama,
            'userPhone'=>$notelp,
            'userLevel'=>$level,
            'userBlocked'=>$blok,
            'userName'=>$username,
            'userPassword'=>$password,
            'createDate'=>$updatec,
            'modifiedDate'=>$updateu,
            'modifiedUserID'=>$userID
        );
        $save = $this->M_admin->save('as_admin',$data,$id);
        if(!isset($save))
        {
            redirect('admin/tambah');
        }else{
            redirect('admin');
        }
    }

    function edit($id)
    {
        $data['admin'] = $this->M_admin->edit($id)->result();
        $this->load->view('admin/edit',$data);
        $this->load->view('footer');
    }

    function update($id)
    {
        $nip = $this->input->post('nip');
        $nama = $this->input->post('namad').' '.$this->input->post('namab');
        $notelp = $this->input->post('Notelp');
        $level = $this->input->post('level');
        $blok = $this->input->post('blok');
        $username =$this->input->post('username');
        $password = md5($this->input->post('password'));
        $updatec = $this->input->post('update');
        $updateu = date('Y-m-d');
        $userID = $this->session->userdata('userID');

        $data = array(
            'userNIP'=>$nip,
            'userFullName'=>$nama,
            'userPhone'=>$notelp,
            'userLevel'=>$level,
            'userBlocked'=>$blok,
            'userName'=>$username,
            'userPassword'=>$password,
            'createDate'=>$updatec,
            'modifiedDate'=>$updateu,
            'modifiedUserID'=>$userID
        );
        $where = array(
            'userID' => $id
        );

        $save = $this->M_admin->update('as_admin',$data,$where);
        if(!isset($save))
        {
            redirect('admin/edit');
        }else{
            redirect('admin');
        }
    }

    function hapus($id)
    {
        $status = $this->M_admin->hapus($id);
        redirect('admin');
    }
}