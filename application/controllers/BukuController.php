<?php

class BukuController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth();
        $this->load->library('form_validation');
        $this->load->model('Buku');
        $this->load->model('Kategori');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Buku',
            'buku' => $this->Buku->get()
        ];

        $this->load->view('buku/index', $data);
    }

    public function create()
    {
        isAdmin();

        $data = [
            'title' => 'Add Buku',
            'action' => base_url('buku/store'),
            'buku' => null,
            'kategori' => $this->Kategori->get()
        ];

        $this->load->view('buku/form', $data);
    }

    public function store()
    {
        isAdmin();

        $this->form_validation->set_rules('nama_buku', 'Nama buku', 'required');

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = [
                'nama_buku' => $this->input->post('nama_buku', true),
                'kategori_id' => $this->input->post('kategori', true),
                'tersedia' => $this->input->post('jumlah', true),
            ];

            $create = $this->Buku->create($data);

            if ($create > 0) {
                $this->session->set_flashdata('success', 'buku berhasil ditambahkan');
                redirect(base_url('buku'));
            } else {
                $this->session->set_flashdata('error', 'buku gagal ditambahkan');
                redirect(base_url('buku'));
            }
        }
    }

    public function edit($id)
    {
        isAdmin();

        $data = [
            'title' => 'Add Buku',
            'action' => base_url('buku/update/' . $id),
            'buku' => $this->Buku->find($id),
            'kategori' => $this->Kategori->get()
        ];

        $this->load->view('buku/form', $data);
    }

    public function update($id)
    {
        isAdmin();

        $this->form_validation->set_rules('nama_buku', 'Nama buku', 'required');

        if ($this->form_validation->run() == false) {
            $this->update();
        } else {
            $data = [
                'nama_buku' => $this->input->post('nama_buku', true),
                'kategori_id' => $this->input->post('kategori', true),
                'tersedia' => $this->input->post('jumlah', true),
            ];

            $update = $this->Buku->update($data, $id);

            if ($update > 0) {
                $this->session->set_flashdata('success', 'buku berhasil ditambahkan');
                redirect(base_url('buku'));
            } else {
                $this->session->set_flashdata('error', 'buku gagal ditambahkan');
                redirect(base_url('buku'));
            }
        }
    }
}
