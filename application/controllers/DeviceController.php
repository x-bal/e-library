<?php

class DeviceController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth();
        $this->load->library('form_validation');
        $this->load->model('Device');
    }

    public function index()
    {
        $data = [
            'title' => 'Data Device',
            'device' => $this->Device->get()
        ];

        $this->load->view('device/index', $data);
    }

    public function create()
    {
        isAdmin();

        $data = [
            'title' => 'Add Device',
            'action' => base_url('device/store'),
            'device' => null
        ];

        $this->load->view('device/form', $data);
    }

    public function store()
    {
        isAdmin();

        $this->form_validation->set_rules('nama_device', 'Nama device', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $data = [
                'nama_device' => $this->input->post('nama_device', true),
                'use_for' => $this->input->post('tempat', true),
            ];

            $create = $this->Device->create($data);

            if ($create > 0) {
                $this->session->set_flashdata('success', 'Device berhasil ditambahkan');
                redirect(base_url('device'));
            } else {
                $this->session->set_flashdata('error', 'Device gagal ditambahkan');
                redirect(base_url('device'));
            }
        }
    }

    public function edit($id)
    {
        isAdmin();

        $data = [
            'title' => 'Add Device',
            'action' => base_url('device/update/' . $id),
            'device' => $this->Device->find($id)
        ];

        $this->load->view('device/form', $data);
    }

    public function update($id)
    {
        isAdmin();

        $this->form_validation->set_rules('nama_device', 'Nama device', 'required');
        $this->form_validation->set_rules('tempat', 'Tempat', 'required');

        if ($this->form_validation->run() == false) {
            $this->update();
        } else {
            $data = [
                'nama_device' => $this->input->post('nama_device', true),
                'use_for' => $this->input->post('tempat', true),
            ];

            $update = $this->Device->update($data, $id);

            if ($update > 0) {
                $this->session->set_flashdata('success', 'Device berhasil ditambahkan');
                redirect(base_url('device'));
            } else {
                $this->session->set_flashdata('error', 'Device gagal ditambahkan');
                redirect(base_url('device'));
            }
        }
    }

    public function change($id)
    {
        isAdmin();

        $update = $this->Device->update(['status' => $this->input->get('status', true)], $id);

        if ($update > 0) {
            echo json_encode([
                'status' => 'success',
                'ket' => 'Status device berhasil diubah'
            ], 200);
        } else {
            echo json_encode([
                'status' => 'success',
                'ket' => 'Status device gagal diubah'
            ], 500);
        }
    }
}
