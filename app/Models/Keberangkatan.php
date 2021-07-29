<?php

namespace App\Models;

use CodeIgniter\Model;

class Keberangkatan extends Model
{
    public function getKeberangkatan()
    {
        $bulder = $this->db->table('tb_keberangkatan')
            ->join('tb_spt', 'sptKode = keberangkatanSpt')
            ->join('tb_tujuan', 'tujuanId = keberangkatanTujuan')
            ->join('tb_detail_spt', 'detailsptKodeSpt = sptKode')
            ->groupBy('keberangkatanKode');
        return $bulder->get();
    }

    public function getKeberangkatanDetail($id)
    {
        $bulder = $this->db->table('tb_keberangkatan')
            ->join('tb_spt', 'sptKode = keberangkatanSpt')
            ->join('tb_tujuan', 'tujuanId = keberangkatanTujuan')
            ->where(['keberangkatanKode' => $id]);
        return $bulder->get();
    }

    public function saveKeberangkatan($data)
    {
        $query = $this->db->table('tb_keberangkatan')->insert($data);
        return $query;
    }
    public function updateKeberangkatan($data, $id)
    {
        $query = $this->db->table('tb_keberangkatan')->update($data, array('keberangkatanKode' => $id));
        return $query;
    }
    public function deleteKeberangkatan($id)
    {
        $query = $this->db->table('tb_keberangkatan')->delete(array('keberangkatanKode' => $id));
        return $query;
    }
}
