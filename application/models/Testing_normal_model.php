<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing_normal_model extends CI_Model
{
public function get_data($table)
{
    return $this->db->get($table);
}

public function create( $testing )
{
    return $this->db->insert_batch('testing_normal', $testing);
}
public function read( $id = -1, $mode = "object" )
{
    $sql = "
        SELECT * from testing_normal
    ";
    if( $id != -1 ){
        $sql .= "
            where id = '$id'
        ";  
    }
    if( $mode == "array" )
        return $query = $this->db->query($sql)->result_array();
    else
        return $query = $this->db->query($sql)->result();
}

public function clear(   )
{
    return $query = $this->db->query( " TRUNCATE testing_normal " );
}

}
