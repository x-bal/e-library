<?php

class Buku extends CI_Model
{
    public function get()
    {
        $this->db->select("buku.*, kategori.*");
        $this->db->from('buku');
        $this->db->join('kategori', 'kategori.id_kategori=buku.kategori_id');
        return $this->db->get()->result();
    }

    public function create($data)
    {
        $this->db->insert('buku', $data);
        return $this->db->affected_rows();
    }

    public function find($id)
    {
        return $this->db->get_where('buku', ['id_buku' => $id])->row();
    }

    public function update($data, $id)
    {
        $this->db->update('buku', $data, ['id_buku' => $id]);
        return true;
    }

    public function delete($id)
    {
        $this->db->delete('buku', ['id_buku' => $id]);
        return $this->db->affected_rows();
    }
}
