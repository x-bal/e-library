<?php

class KategoriController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth();
        $this->load->library('form_validation');
        $this->load->model('Kategori');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Kategori',
            'kategori' => $this->Kategori->get()
        ];

        $this->load->view('kategori/index', $data);
    }

    public function create()
    {
        isAdmin();

        $data = [
            'title' => 'Add Kategori',
            'action' => base_url('kategori/store'),
            'kategori' => null
        ];

        $this->load->view('kategori/form', $data);
    }

    public function store()
    {
        isAdmin();

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = ['nama_kategori' => $this->input->post('nama_kategori', true)];

            $create = $this->Kategori->create($data);

            if ($create > 0) {
                $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
                redirect(base_url('kategori'));
            } else {
                $this->session->set_flashdata('error', 'Kategori gagal ditambahkan');
                redirect(base_url('kategori'));
            }
        }
    }

    public function edit($id)
    {
        isAdmin();

        $data = [
            'title' => 'Add Kategori',
            'action' => base_url('kategori/update/' . $id),
            'kategori' => $this->Kategori->find($id)
        ];

        $this->load->view('kategori/form', $data);
    }

    public function update($id)
    {
        isAdmin();

        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'required');

        if ($this->form_validation->run() == false) {
            $this->update();
        } else {
            $data = ['nama_kategori' => $this->input->post('nama_kategori', true)];

            $update = $this->Kategori->update($data, $id);

            if ($update > 0) {
                $this->session->set_flashdata('success', 'Kategori berhasil ditambahkan');
                redirect(base_url('kategori'));
            } else {
                $this->session->set_flashdata('error', 'Kategori gagal ditambahkan');
                redirect(base_url('kategori'));
            }
        }
    }
}
