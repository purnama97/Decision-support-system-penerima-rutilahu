<?php
defined('BASEPATH') or exit ('No direct script access allowed');
Class Priode extends CI_Controller
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
		$data['log'] = $this->M_login->get_log('as_admin',$this->session->userdata('userID'))->result();
		$this->load->view("header",$data);
		$this->load->view("sidebar",$data);
    }
    
    function index()
    {
        $data['priode'] = $this->M_priode->show()->result();

        $this->load->view('priode/index',$data);
        $this->load->view('footer');
    }

    function tambah()
    {
        $this->load->view('priode/tambah');
        $this->load->view('footer');
    }

    function save()
    {
        $priodeName = $this->input->post('nama');
        $priodeYear = $this->input->post('tahun');
        
        $data = array(
            'priodeName'=>$priodeName,
            'priodeYear'=>$priodeYear
        );
        $save = $this->M_priode->save('as_priode',$data);
        if(!isset($save))
        {
            redirect('priode/tambah');
        }else{
            redirect('priode');
        }
    }

    function edit($id)
    {
        $data['priode'] = $this->M_priode->edit($id)->result();
        $this->load->view('priode/edit',$data);
        $this->load->view('footer');
    }

    function update($id)
    {
        $priodeName = $this->input->post('nama');
        $priodeYear = $this->input->post('tahun');
        
        $data = array(
            'priodeName'=>$priodeName,
            'priodeYear'=>$priodeYear
        );

        $where = array(
            'priodeID' => $id
        );

        $save = $this->M_priode->update('as_priode',$data,$where);
        if(!isset($save))
        {
            redirect('priode/edit');
        }else{
            redirect('priode');
        }
    }

    function hapus($id)
    {
        $status = $this->M_priode->hapus($id);
        redirect('priode');
    }
}