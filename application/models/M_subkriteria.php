<?php
class M_subkriteria extends CI_Model
{
    function show()
    {
        $sql = "SELECT * FROM as_subkriteria As a INNER JOIN as_kriteria AS b ON a.criteriaID=b.criteriaID";
        $query = $this->db->query($sql);
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
        $sql = "SELECT * FROM as_subkriteria As a INNER JOIN as_kriteria AS b ON a.criteriaID=b.criteriaID WHERE a.subID='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function hapus($id)
    {
        $sql = "DELETE FROM as_kriteria WHERE criteriaID='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
}