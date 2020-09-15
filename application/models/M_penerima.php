<?php
class M_penerima extends CI_Model
{
    function show()
    {
        $query = $this->db->get('as_penerima');
        return $query;
    }
    
    function show2()
    {
        $query = $this->db->query('SELECT * FROM as_penerima WHERE penerimaID NOT IN(SELECT penerimaID FROM as_penilaian)');
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
        $sql = "SELECT * FROM as_penerima WHERE penerimaID='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function hapus($id)
    {
        $sql = "DELETE FROM as_penerima WHERE penerimaID='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
}