<?php

class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        auth();
        $this->load->library('form_validation');
        $this->load->model('User');
    }

    public function index()
    {
        $data = [
            'title' => 'Data User',
            'users' => $this->User->get()
        ];

        $this->load->view('users/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create User',
            'action' => base_url('users/store'),
            'user' => null
        ];

        $this->load->view('users/form', $data);
    }

    public function store()
    {
        $rules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->create();
        } else {
            $config['upload_path']          = './uploads/users/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = date('dmY') . '-' . $this->input->post('username', true);

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());

                $this->create($error);
            } else {
                $foto =  $this->upload->data();

                $data = [
                    'username' => $this->input->post('username', true),
                    'nama' => $this->input->post('nama', true),
                    'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                    'foto' => $foto['file_name']
                ];

                $create = $this->User->create($data);

                if ($create > 0) {
                    $this->session->set_flashdata('success', 'User berhasil ditambahkan');
                    redirect(base_url('users'));
                } else {
                    $this->session->set_flashdata('error', 'User gagal ditambahkan');
                    $this->create();
                }
            }
        }
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'action' => base_url('users/update/' . $id),
            'user' => $this->User->find($id)
        ];

        $this->load->view('users/form', $data);
    }

    public function update($id)
    {
        $user = $this->User->find($id);

        if ($this->input->post('username', true) != $user->username) {
            $is_unique =  '|is_unique[users.username]';
        } else {
            $is_unique =  '';
        }

        $rules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required' . $is_unique
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'required'
            ],
        ];

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == false) {
            $this->edit($id);
        } else {
            $config['upload_path']          = './uploads/users/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = date('dmY') . '-' . $this->input->post('username', true);

            $this->load->library('upload', $config);

            if (isset($_FILES['foto']['file_name'])) {
                if (!$this->upload->do_upload('foto')) {
                    $error = array('error' => $this->upload->display_errors());

                    var_dump($error);
                    // die;
                    // $this->create($error);
                } else {

                    unlink('./uploads/users/' . $user->foto);

                    $foto =  $this->upload->data();
                    $fotoUser = $foto['file_name'];
                }
            } else {
                $fotoUser = $user->foto;
            }


            if ($this->input->post('password', true) != null) {
                $password  = password_hash($this->input->post('password', true), PASSWORD_DEFAULT);
            } else {
                $password = $user->password;
            }

            $data = [
                'username' => $this->input->post('username', true),
                'nama' => $this->input->post('nama', true),
                'password' => $password,
                'foto' => $fotoUser
            ];

            $update = $this->User->update($data, $id);

            if ($update > 0) {
                $this->session->set_flashdata('success', 'User berhasil diupdate');
                redirect(base_url('users'));
            } else {
                $this->session->set_flashdata('error', 'User gagal diupdate');
                $this->edit($id);
            }
        }
    }

    public function destroy($id)
    {
        $user = $this->User->find($id);

        unlink('./uploads/users/' . $user->foto);
        $delete = $this->User->delete($id);

        if ($delete > 0) {
            $this->session->set_flashdata('success', 'User berhasil dihapus');
            redirect(base_url('users'));
        } else {
            $this->session->set_flashdata('error', 'User gagal dihapus');
            redirect(base_url('users'));
        }
    }
}
