<?php
class M_penilaian extends CI_Model
{
    function show()
    {
        $sql = "SELECT * FROM as_penilaian As a INNER JOIN as_priode AS b on a.priodeID=b.priodeID INNER JOIN as_penerima AS c on a.penerimaID=c.penerimaID WHERE a.penilaianID NOT IN (SELECT penilaianID FROM as_nilai)";
        $query = $this->db->query($sql);
        return $query;
    }

    function save($table,$data)
    {
        $query = $this->db->insert($table,$data);
        return $query;
    }

    function savenilai($table,$data)
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
        $sql = "SELECT * FROM as_penilaian As a INNER JOIN as_priode AS b ON a.priodeID=b.priodeID INNER JOIN as_penerima AS c ON a.penerimaID=c.penerimaID WHERE a.penilaianID='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function hapus($id)
    {
        $sql = "DELETE FROM as_penilaian WHERE penilaianID='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
}