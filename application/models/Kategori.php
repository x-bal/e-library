<?php

class Kategori extends CI_Model
{
    public function get()
    {
        return $this->db->get('kategori')->result();
    }

    public function create($data)
    {
        $this->db->insert('kategori', $data);
        return $this->db->affected_rows();
    }

    public function find($id)
    {
        return $this->db->get_where('kategori', ['id_kategori' => $id])->row();
    }

    public function update($data, $id)
    {
        $this->db->update('kategori', $data, ['id_kategori' => $id]);
        return true;
    }

    public function delete($id)
    {
        $this->db->delete('kategori', ['id_kategori' => $id]);
        return $this->db->affected_rows();
    }
}
