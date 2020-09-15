<?php
class M_priode extends CI_Model
{
    function show()
    {
        $query = $this->db->get('as_priode');
        return $query;
    }
    
    function show1()
    {
        $query = $this->db->query('SELECT * FROM as_priode WHERE priodeID IN (SELECT priodeID FROM as_penilaian)');
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
        $sql = "SELECT * FROM as_priode WHERE priodeID='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
    
    function hapus($id)
    {
        $sql = "DELETE FROM as_priode WHERE priodeID='$id'";
        $query = $this->db->query($sql);
        return $query;
    }
}