<?php

class Siswa extends CI_Model
{
    public function get()
    {
        return $this->db->get('students')->result();
    }

    public function create($data)
    {
        $this->db->insert('students', $data);
        return $this->db->affected_rows();
    }

    public function where($where)
    {
        return $this->db->get_where('students', $where)->row();
    }

    public function find($id)
    {
        return $this->db->get_where('students', ['id_device' => $id])->row();
    }

    public function update($data, $id)
    {
        $this->db->update('students', $data, ['id_device' => $id]);
        return true;
    }

    public function delete($id)
    {
        $this->db->delete('students', ['id_device' => $id]);
        return $this->db->affected_rows();
    }
}
