<?php

class AuthController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User');
    }

    public function index()
    {
        $this->load->view('auth/login');
    }

    public function login()
    {
        $this->form_validation->set_rules([
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ]
        ]);

        if ($this->form_validation->run() != false) {
            $where = ['username' => $this->input->post('username', true)];

            $user = $this->User->where($where);

            if ($user) {
                if (password_verify($this->input->post('password', true), $user->password)) {
                    $this->session->set_userdata([
                        'login' => true,
                        'username' => $user->username,
                        'nama' => $user->nama,
                        'foto' => $user->foto,
                        'level' => $user->role_id
                    ]);

                    redirect(base_url('dashboard'));
                } else {
                    $this->session->set_flashdata('error', 'Password salah');
                    redirect(base_url());
                }
            } else {
                $this->session->set_flashdata('error', 'User tidak ditemukan');
                redirect(base_url());
            }
        } else {
            redirect(base_url());
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();

        redirect(base_url());
    }
}
