<?php
class M_admin extends CI_Model
{
    function show()
    {
        $query = $this->db->get('as_admin');
        return $query;
    }

    function save($table,$data)
    {
        $query = $this->db->insert($table,$data);
        return $query;
    }
    
    function update($table,$data,$where)
    {
        $this->db->where($where);
        $query = $this->db->update($table,$data);
        return $query;
    }


    function edit($id)
    {
        $sql = "SELECT * FROM as_admin WHERE userID='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function hapus($id)
    {
        $sql = "DELETE FROM as_admin WHERE userID='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
}