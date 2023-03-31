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
        $this->form_validation->set_rules('no_rak', 'No Rak', 'required');

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $config['upload_path']          = './uploads/buku/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = date('dmYHis') . '-' . str_replace(' ', '-', $this->input->post('nama_buku', true));

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());

                var_dump($error);
                die;
                $this->create($error);
            } else {
                $foto = $this->upload->data();

                $data = [
                    'nama_buku' => $this->input->post('nama_buku', true),
                    'kategori_id' => $this->input->post('kategori', true),
                    // 'tersedia' => $this->input->post('jumlah', true),
                    'no_rak' => $this->input->post('no_rak', true),
                    'foto' => $foto['file_name']
                ];

                $create = $this->Buku->create($data);

                if ($create > 0) {
                    $this->session->set_flashdata('success', 'Buku berhasil ditambahkan');
                    redirect(base_url('buku'));
                } else {
                    $this->session->set_flashdata('error', 'Buku gagal ditambahkan');
                    redirect(base_url('buku'));
                }
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
            $config['upload_path']          = './uploads/buku/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = date('dmYHis') . '-' . str_replace(' ', '-', $this->input->post('nama_buku', true));

            $this->load->library('upload', $config);

            $buku = $this->Buku->find($id);

            if (isset($_FILES['foto'])) {
                if (!$this->upload->do_upload('foto')) {
                    $error = array('error' => $this->upload->display_errors());

                    var_dump($error);
                    die;
                } else {

                    unlink('./uploads/buku/' . $buku->foto);

                    $foto =  $this->upload->data();
                    $fotoBuku = $foto['file_name'];
                }
            } else {
                $fotoBuku = $buku->foto;
            }

            $data = [
                'nama_buku' => $this->input->post('nama_buku', true),
                'kategori_id' => $this->input->post('kategori', true),
                // 'tersedia' => $this->input->post('jumlah', true),
                'no_rak' => $this->input->post('no_rak', true),
                'foto' => $fotoBuku
            ];

            $update = $this->Buku->update($data, $id);

            if ($update > 0) {
                $this->session->set_flashdata('success', 'Buku berhasil ditambahkan');
                redirect(base_url('buku'));
            } else {
                $this->session->set_flashdata('error', 'Buku gagal ditambahkan');
                redirect(base_url('buku'));
            }
        }
    }
}
