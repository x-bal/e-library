<?php

class User extends CI_Model
{
    public function get()
    {
        return $this->db->get('users')->result();
    }

    public function where($where)
    {
        return $this->db->get_where('users', $where)->row();
    }

    public function create($data)
    {
        $this->db->insert('users', $data);
        return $this->db->affected_rows();
    }

    public function find($id)
    {
        return $this->db->get_where('users', ['id_user' => $id])->row();
    }

    public function update($data, $id)
    {
        $this->db->update('users', $data, ['id_user' => $id]);
        return 1;
    }
}
