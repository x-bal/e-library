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
        $iddev = $this->input->post('id_device', true);
        $rfid = $this->input->post('rfid', true);
        $secretkey = $this->input->post('secret_key', true);

        if (isset($secretkey) && isset($iddev) && isset($rfid)) {
            $key = $this->db->get_where('settings', ['name' => 'secret_key'])->row();

            if ($key->value == $secretkey) {

                $device = $this->Device->find($iddev);

                if (isset($device)) {

                    if ($device->status == 1) {
                        $siswa = $this->Siswa->where(['rfid' => $rfid]);

                        if (isset($siswa)) {
                            $data = [
                                'device_id' => $device->id_device,
                                'siswa_id' => $siswa->id_student,
                                'waktu' => date('Y-m-d H:i:s'),
                                'keterangan' => $device->use_for
                            ];

                            $create = $this->Log->create($data);

                            if ($create > 0) {
                                echo json_encode([
                                    'status' => 'success',
                                    'ket' => 'Berhasil tap ' . strtolower($device->use_for),
                                    'siswa' => $siswa,
                                    'waktu' => date('Y-m-d H:i:s'),
                                ], 200);
                            } else {
                                echo json_encode([
                                    'status' => 'error',
                                    'ket' => 'Gagal tap masuk'
                                ], 500);
                            }
                        } else {
                            echo json_encode([
                                'status' => 'error',
                                'ket' => 'Siswa tidak terdaftar'
                            ], 500);
                        }
                    } else {
                        echo json_encode([
                            'status' => 'error',
                            'ket' => 'Device nonaktif'
                        ], 500);
                    }
                } else {
                    echo json_encode([
                        'status' => 'error',
                        'ket' => 'Device tidak terdaftar'
                    ], 500);
                }
            } else {
                echo json_encode([
                    'status' => 'error',
                    'ket' => 'Salah secret key'
                ], 500);
            }
        } else {
            echo json_encode([
                'status' => 'error',
                'ket' => 'Salah parameter'
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
