<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_model extends CI_Model
{
    public function update($data, $tabel)
    {
      
        $this->db->update($tabel, $data);
    }
}