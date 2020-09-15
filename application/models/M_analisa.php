<?php
class M_analisa extends CI_Model
{
    function show()
    {
        $query = $this->db->get('as_kriteria');
        return $query;
    }
    
    function show2($id)
    {
        $query = $this->db->query("SELECT * FROM as_nilai As a INNER JOIN as_penilaian As b ON a.penilaianID=b.penilaianID INNER JOIN as_penerima AS d ON b.penerimaID=d.penerimaID INNER JOIN as_priode AS c ON b.priodeID=c.priodeID WHERE b.priodeID='$id'");
        return $query;
    }
}