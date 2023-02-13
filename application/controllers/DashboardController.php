<?php

class DashboardController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth();
        $this->load->model('Log');
        $this->load->model('Pinjaman');
    }

    public function index()
    {
        $data = [
            'today' => count($this->Log->today()),
            'month' => count($this->Log->month()),
            'pinjam' => count($this->Pinjaman->pinjam()),
            'kembali' => count($this->Pinjaman->kembali()),
        ];

        $this->load->view('dashboard/index', $data);
    }
}
