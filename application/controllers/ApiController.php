<?php
date_default_timezone_set('Asia/Jakarta');

class ApiController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Device');
        $this->load->model('Siswa');
        $this->load->model('Log');
    }

    public function tapin()
    {
        $iddev = $this->input->get('iddev', true);
        $rfid = $this->input->get('rfid', true);

        if (isset($iddev) && isset($rfid)) {
            $device = $this->Device->find($iddev);

            if (isset($device)) {
                $siswa = $this->Siswa->where(['rfid' => $rfid]);

                if (isset($siswa)) {
                    $data = [
                        'device_id' => $device->id,
                        'siswa_id' => $siswa->id,
                        'waktu' => date('Y-m-d H:i:s'),
                        'keterangan' => $device->use_for
                    ];

                    $create = $this->Log->create($data);

                    if ($create > 0) {
                        echo json_encode([
                            'status' => 'success',
                            'message' => 'Berhasil tap masuk'
                        ], 200);
                    } else {
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'Gagal tap masuk'
                        ], 500);
                    }
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Siswa tidak terdaftar'
                    ], 500);
                }
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Device tidak terdaftar'
                ], 500);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Salah parameter'
            ], 500);
        }
    }

    public function tapout()
    {
        $iddev = $this->input->get('iddev', true);
        $rfid = $this->input->get('rfid', true);

        if (isset($iddev) && isset($rfid)) {
            $device = $this->Device->find($iddev);

            if (isset($device)) {
                $siswa = $this->Siswa->where(['rfid' => $rfid]);

                if (isset($siswa)) {
                    $data = [
                        'device_id' => $device->id,
                        'siswa_id' => $siswa->id,
                        'waktu' => date('Y-m-d H:i:s'),
                        'keterangan' => $device->use_for
                    ];

                    $create = $this->Log->create($data);

                    if ($create > 0) {
                        echo json_encode([
                            'status' => 'success',
                            'message' => 'Berhasil tap keluar'
                        ], 200);
                    } else {
                        echo json_encode([
                            'status' => 'error',
                            'message' => 'Gagal tap keluar'
                        ], 500);
                    }
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'message' => 'Siswa tidak terdaftar'
                    ], 500);
                }
            } else {
                echo json_encode([
                    'status' => 'error',
                    'message' => 'Device tidak terdaftar'
                ], 500);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Salah parameter'
            ], 500);
        }
    }

    public function tap()
    {
        $rfid = $this->input->get('rfid', true);
        $where = ['rfid' => $rfid];

        $siswa = $this->Siswa->where($where);

        if (isset($siswa)) {
            echo json_encode([
                'status' => 'success',
                'siswa' => $siswa
            ], 200);
        } else {
            echo json_encode([
                'status' => 'error'
            ], 500);
        }
    }
}
