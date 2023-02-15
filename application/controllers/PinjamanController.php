<?php

class PinjamanController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pinjaman');
        $this->load->model('Buku');
        $this->load->model('Siswa');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $where = ['pinjaman.status' => 'Dipinjam'];

        $data = [
            'title' => 'Data Pinjaman',
            'pinjaman' => $this->Pinjaman->get($where)
        ];

        $this->load->view('pinjaman/index', $data);
    }

    public function getKembali()
    {
        $where = ['pinjaman.status !=' => 'Dipinjam'];

        $data = [
            'title' => 'Data Pengembalian',
            'pinjaman' => $this->Pinjaman->get($where)
        ];

        $this->load->view('pinjaman/index', $data);
    }

    public function create()
    {
        isAdmin();

        $data = [
            'title' => 'Add Pinjaman',
            'action' => base_url('pinjaman/store'),
            'pinjaman' => null,
            'buku' => $this->Buku->get()
        ];

        $this->load->view('pinjaman/form', $data);
    }

    public function store()
    {
        isAdmin();

        $this->form_validation->set_rules('siswa', 'Siswa id', 'required');
        // $this->form_validation->set_rules('buku', 'Buku', 'required');
        // $this->form_validation->set_rules('jumlah', 'Jumlah pinjam', 'required');
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal pinjam', 'required');
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal kembali', 'required');

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $siswa = $this->db->get_where('students', ['rfid' => $this->input->post('siswa', true)])->row();

            foreach ($this->input->post('buku', true) as $key => $buku) {
                $data = [
                    'siswa_id' => $siswa->id_student,
                    'buku_id' => $this->input->post('buku', true)[$key],
                    'tanggal_pinjam' => $this->input->post('tanggal_pinjam', true),
                    'tanggal_kembali' => $this->input->post('tanggal_kembali', true),
                    'status' => 'Dipinjam'
                ];

                $create = $this->Pinjaman->create($data);
            }

            if ($create > 0) {
                $this->session->set_flashdata('success', 'Pinjaman berhasil ditambahkan');
                redirect(base_url('pinjaman'));
            } else {
                $this->session->set_flashdata('error', 'Pinjaman gagal ditambahkan');
                redirect(base_url('pinjaman'));
            }
        }
    }

    public function show($id)
    {
        isAdmin();

        $pinjaman = $this->Pinjaman->find($id);

        echo json_encode($pinjaman);
    }

    public function kembali($id)
    {
        isAdmin();

        $data = [
            'kembali' => $this->input->post('kembali', true),
            'status' => $this->input->post('status', true),
        ];

        $update = $this->Pinjaman->update($data, $id);

        if ($update > 0) {
            $this->session->set_flashdata('success', 'Pengembalian berhasil');
            redirect(base_url('pinjaman'));
        } else {
            $this->session->set_flashdata('error', 'Pengembalian gagal');
            redirect(base_url('pinjaman'));
        }
    }
}
