<?php

class Device extends CI_Model
{
    public function get()
    {
        return $this->db->get('device_library')->result();
    }

    public function create($data)
    {
        $this->db->insert('device_library', $data);
        return $this->db->affected_rows();
    }

    public function find($id)
    {
        return $this->db->get_where('device_library', ['id_device' => $id])->row();
    }

    public function update($data, $id)
    {
        $this->db->update('device_library', $data, ['id_device' => $id]);
        return true;
    }

    public function delete($id)
    {
        $this->db->delete('device_library', ['id_device' => $id]);
        return $this->db->affected_rows();
    }
}
