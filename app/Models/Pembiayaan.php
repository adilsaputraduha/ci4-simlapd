<?php

namespace App\Models;

use CodeIgniter\Model;

class Pembiayaan extends Model
{
    public function getPembiayaan()
    {
        $bulder = $this->db->table('tb_pembiayaan')
            ->join('tb_keberangkatan', 'keberangkatanKode = pembiayaanKodeBerangkat')
            ->join('tb_tujuan', 'keberangkatanTujuan = tujuanId')
            ->join('tb_spt', 'keberangkatanSpt = sptKode');
        return $bulder->get();
    }
    public function getPembiayaanDetail($id)
    {
        $bulder = $this->db->table('tb_pembiayaan')
            ->join('tb_keberangkatan', 'keberangkatanKode = pembiayaanKodeBerangkat')
            ->join('tb_tujuan', 'keberangkatanTujuan = tujuanId')
            ->join('tb_spt', 'keberangkatanSpt = sptKode')
            ->where(['pembiayaanKode' => $id]);
        return $bulder->get();
    }
    public function getPembiayaanDetailPegawai($id)
    {
        $bulder = $this->db->table('tb_detail_spt')
            ->join('tb_spt', 'sptKode = detailsptKodeSpt')
            ->join('tb_keberangkatan', 'keberangkatanSpt = sptKode')
            ->join('tb_pembiayaan', 'keberangkatanKode = pembiayaanKodeBerangkat')
            ->join('tb_sppd', 'sppdSpt = sptKode')
            ->join('tb_pegawai', 'detailsptNip = pegawaiNip')
            ->where(['pembiayaanKode' => $id]);
        return $bulder->get();
    }
    public function getPembiayaanDetailSatuPegawai($id)
    {
        $bulder = $this->db->table('tb_detail_spt')
            ->join('tb_spt', 'sptKode = detailsptKodeSpt')
            ->join('tb_keberangkatan', 'keberangkatanSpt = sptKode')
            ->join('tb_pembiayaan', 'keberangkatanKode = pembiayaanKodeBerangkat')
            ->join('tb_sppd', 'sppdSpt = sptKode')
            ->join('tb_pegawai', 'detailsptNip = pegawaiNip')
            ->where(['pembiayaanKode' => $id]);
        return $bulder->get()->getRowArray();
    }
    public function savePembiayaan($data)
    {
        $query = $this->db->table('tb_pembiayaan')->insert($data);
        return $query;
    }
    public function updatePembiayaan($data, $id)
    {
        $query = $this->db->table('tb_pembiayaan')->update($data, array('pembiayaanKode' => $id));
        return $query;
    }
    public function deletePembiayaan($id)
    {
        $query = $this->db->table('tb_pembiayaan')->delete(array('pembiayaanKode' => $id));
        return $query;
    }
}
