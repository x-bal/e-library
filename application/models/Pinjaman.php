<?php

class Pinjaman extends CI_Model
{
    public function get($where)
    {
        $this->db->select("pinjaman.*, buku.*, students.*");
        $this->db->from('pinjaman');
        $this->db->join('buku', 'buku.id_buku=pinjaman.buku_id');
        $this->db->join('students', 'students.id_student=pinjaman.siswa_id');
        $this->db->where($where);
        $this->db->order_by('id_pinjaman', 'DESC');
        return $this->db->get()->result();
    }

    public function create($data)
    {
        $this->db->insert('pinjaman', $data);
        return $this->db->affected_rows();
    }

    public function find($id)
    {
        return $this->db->get_where('pinjaman', ['id_pinjaman' => $id])->row();
    }

    public function update($data, $id)
    {
        $this->db->update('pinjaman', $data, ['id_pinjaman' => $id]);
        return true;
    }

    public function delete($id)
    {
        $this->db->delete('pinjaman', ['id_pinjaman' => $id]);
        return $this->db->affected_rows();
    }
}
