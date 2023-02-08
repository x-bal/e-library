<?php

class LogController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth();
        $this->load->library('form_validation');
        $this->load->model('Log');
    }

    public function index()
    {
        $data = [
            'title' => 'Data log',
            'logs' => $this->Log->get()
        ];

        $this->load->view('log/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Add log',
            'action' => base_url('log/store'),
            'log' => null
        ];

        $this->load->view('log/form', $data);
    }

    public function store()
    {
        $this->form_validation->set_rules('nama_log', 'Nama log', 'required');

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = ['nama_log' => $this->input->post('nama_log', true)];

            $create = $this->Log->create($data);

            if ($create > 0) {
                $this->session->set_flashdata('success', 'log berhasil ditambahkan');
                redirect(base_url('log'));
            } else {
                $this->session->set_flashdata('error', 'log gagal ditambahkan');
                redirect(base_url('log'));
            }
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Add log',
            'action' => base_url('log/update/' . $id),
            'log' => $this->Log->find($id)
        ];

        $this->load->view('log/form', $data);
    }

    public function update($id)
    {
        $this->form_validation->set_rules('nama_log', 'Nama log', 'required');

        if ($this->form_validation->run() == false) {
            $this->update();
        } else {
            $data = ['nama_log' => $this->input->post('nama_log', true)];

            $update = $this->Log->update($data, $id);

            if ($update > 0) {
                $this->session->set_flashdata('success', 'log berhasil ditambahkan');
                redirect(base_url('log'));
            } else {
                $this->session->set_flashdata('error', 'log gagal ditambahkan');
                redirect(base_url('log'));
            }
        }
    }
}
