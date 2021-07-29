<?php

namespace App\Models;

use CodeIgniter\Model;

class Tujuan extends Model
{
    public function getTujuan()
    {
        $bulder = $this->db->table('tb_tujuan');
        return $bulder->get();
    }
    public function saveTujuan($data)
    {
        $query = $this->db->table('tb_tujuan')->insert($data);
        return $query;
    }
    public function updateTujuan($data, $id)
    {
        $query = $this->db->table('tb_tujuan')->update($data, array('tujuanId' => $id));
        return $query;
    }
    public function deleteTujuan($id)
    {
        $query = $this->db->table('tb_tujuan')->delete(array('tujuanId' => $id));
        return $query;
    }
}
