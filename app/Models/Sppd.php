<?php

namespace App\Models;

use CodeIgniter\Model;

class Sppd extends Model
{
    public function getSppd()
    {
        $bulder = $this->db->table('tb_sppd')
            ->join('tb_spt', 'sptKode = sppdSpt');
        return $bulder->get();
    }
    public function getSppdDetail($id)
    {
        $bulder = $this->db->table('tb_sppd')
            ->join('tb_spt', 'sptKode = sppdSpt')
            ->where(['sppdKode' => $id]);
        return $bulder->get();
    }

    public function getSppdDetailSurat($id)
    {
        $bulder = $this->db->table('tb_detail_spt')
            ->join('tb_spt', 'sptKode = detailsptKodeSpt')
            ->join('tb_sppd', 'sppdSpt = sptKode')
            ->join('tb_pegawai', 'detailsptNip = pegawaiNip')
            ->where(['sppdKode' => $id]);
        return $bulder->get();
    }

    public function getSppdDetailTujuan($id)
    {
        $bulder = $this->db->table('tb_tujuan')
            ->join('tb_keberangkatan', 'keberangkatanTujuan = tujuanId')
            ->join('tb_spt', 'sptKode = keberangkatanSpt')
            ->join('tb_sppd', 'sppdSpt = sptKode')
            ->where(['sppdKode' => $id]);
        return $bulder->get();
    }

    public function saveSppd($data)
    {
        $query = $this->db->table('tb_sppd')->insert($data);
        return $query;
    }
    public function updateSppd($data, $id)
    {
        $query = $this->db->table('tb_sppd')->update($data, array('sppdKode' => $id));
        return $query;
    }
    public function deleteSppd($id)
    {
        $query = $this->db->table('tb_sppd')->delete(array('sppdKode' => $id));
        return $query;
    }
}
