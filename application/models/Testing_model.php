<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing_model extends CI_Model
{
public function get_data($tabel)
{
    return $this->db->get($tabel);
}
public function insert_data($data, $tabel)
{
    $this->db->insert($tabel, $data);
}
public function update_data($data, $tabel)
{
    $this->db->where('id_peserta', $data['id_peserta']);
    $this->db->update($tabel, $data);
}
public function delete($where, $tabel)
{
    $this->db->where($where);
    $this->db->delete($tabel);
}

}
