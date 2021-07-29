<?php

namespace App\Models;

use CodeIgniter\Model;

class Spt extends Model
{
    public function getSpt()
    {
        $bulder = $this->db->table('tb_spt');
        return $bulder->get();
    }

    public function getSptDetail($id)
    {
        $bulder = $this->db->table('tb_spt')
            ->where(['sptKode' => $id]);
        return $bulder->get();
    }

    public function getDetailSpt($id)
    {
        $bulder = $this->db->table('tb_detail_spt')
            ->join('tb_spt', 'sptKode = detailsptKodeSpt')
            ->join('tb_pegawai', 'pegawaiNip = detailsptNip')
            ->where(['detailsptKodeSpt' => $id]);
        return $bulder->get();
    }

    public function getTemp($id)
    {
        $bulder = $this->db->table('tb_temp')
            ->join('tb_pegawai', 'pegawaiNip = tempNip')
            ->join('tb_user', 'userId = tempuserId')
            ->where(['tempUserId' => $id]);
        return $bulder->get();
    }
    public function saveSpt($data)
    {
        $query = $this->db->table('tb_spt')->insert($data);
        return $query;
    }
    public function saveApiSpt($data)
    {
        $query = $this->db->table('tb_temp')->insert($data);
        return $query;
    }

    public function saveApiSptDetail($data)
    {
        $query = $this->db->table('tb_detail_spt')->insert($data);
        return $query;
    }
    public function updateSpt($data, $spt)
    {
        $query = $this->db->table('tb_spt')->update($data, array('sptKode' => $spt));
        return $query;
    }
    public function deleteSpt($id)
    {
        $query = $this->db->table('tb_spt')->delete(array('sptKode' => $id));
        return $query;
    }
    public function deleteApiSpt($idtemp, $id)
    {
        $query = $this->db->table('tb_temp')->delete(array('tempId' => $idtemp, 'tempUserId' => $id));
        return $query;
    }
    public function deleteApiSptDetail($nip, $spt)
    {
        $query = $this->db->table('tb_detail_spt')->delete(array('detailsptKodeSpt' => $spt, 'detailsptNip' => $nip));
        return $query;
    }
}
