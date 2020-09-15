<?php
class M_kriteria extends CI_Model
{
    function show()
    {
        $query = $this->db->get('as_kriteria');
        return $query;
    }
    
    function show2()
    {
        $query = $this->db->query('SELECT * FROM as_kriteria As a INNER JOIN as_subkriteria As b ON a.criteriaID=b.criteriaID');
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
        $sql = "SELECT * FROM as_kriteria WHERE criteriaID='$id'";
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