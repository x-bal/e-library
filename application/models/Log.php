<?php
date_default_timezone_set('Asia/Jakarta');

class Log extends CI_Model
{
    public function get()
    {
        $this->db->select("log_library.*, students.*, device_library.*");
        $this->db->from('log_library');
        $this->db->join('students', 'students.id_student=log_library.siswa_id');
        $this->db->join('device_library', 'device_library.id_device=log_library.device_id');
        return $this->db->get()->result();
    }

    public function create($data)
    {
        $this->db->insert('log_library', $data);
        return $this->db->affected_rows();
    }

    public function find($id)
    {
        return $this->db->get_where('log_library', ['id_log' => $id])->row();
    }

    public function update($data, $id)
    {
        $this->db->update('log_library', $data, ['id_log' => $id]);
        return true;
    }

    public function delete($id)
    {
        $this->db->delete('log_library', ['id_log' => $id]);
        return $this->db->affected_rows();
    }

    public function today()
    {
        $today = date('Y-m-d');
        return $this->db->query("SELECT * FROM log_library WHERE DATE(waktu) = '$today'")->result();
    }

    public function month()
    {
        $month = date('m');
        return $this->db->query("SELECT * FROM log_library WHERE MONTH(waktu) = '$month'")->result();
    }
}
