<?php

namespace App\Controllers;

use App\Models\Pegawai;
use App\Models\Spt;

class SptController extends BaseController
{
    public function index()
    {
        $model = new Spt();
        $data['spt'] = $model->getSpt()->getResultArray();
        echo view('view_spt', $data);
    }

    public function tambah()
    {
        // Nomor otomatis
        $db = \Config\Database::connect();
        $query = $db->query("SELECT max(sptKode) as biggerCode FROM tb_spt");
        $row = $query->getRowArray();
        $kodeTerbesar = $row['biggerCode'];
        $urutan = (int) substr($kodeTerbesar, 17, 3);
        $urutan++;
        $huruf = "SPT";
        $tanggal = date("Ymdhis");
        $kodespt = $huruf . $tanggal . sprintf("%03s", $urutan);
        // Tampil
        $id = session()->get('userId');
        $model = new Pegawai();
        $model1 = new Spt();
        $data = [
            'temp' => $model1->getTemp($id)->getResultArray(),
            'pegawai' => $model->getPegawai()->getResultArray(),
            'validation' => \Config\Services::validation(),
            'kode' => $kodespt
        ];
        echo view('view_tambah_spt', $data);
    }

    public function update($id)
    {
        $model1 = new Spt();
        $model2 = new Pegawai();
        $data = [
            'pegawai' => $model2->getPegawai()->getResultArray(),
            'spt' => $model1->getSptDetail($id)->getResultArray(),
            'detail' => $model1->getDetailSpt($id)->getResultArray(),
            'validation' => \Config\Services::validation(),
        ];
        echo view('view_edit_spt', $data);
    }

    public function apiindex()
    {;
        $id = session()->get('userId');
        $model = new Spt();
        $data = [
            'temp' => $model->getTemp($id)->getresultArray()
        ];
        echo view('ajax/table_spt', $data);
    }

    public function apiindexdetail($id)
    {;
        $model = new Spt();
        $data = [
            'detail' => $model->getDetailSpt($id)->getresultArray()
        ];
        echo view('ajax/table_spt_edit', $data);
    }

    public function apisave()
    {
        $model = new Spt();
        $data = array(
            'tempKodeSpt' => $this->request->getPost('kode'),
            'tempNip' => $this->request->getPost('nip'),
            'tempUserId' => session()->get('userId'),
        );
        $model->saveApiSpt($data);
    }

    public function apisavedetail()
    {
        $model = new Spt();
        $data = array(
            'detailsptKodeSpt' => $this->request->getPost('kode'),
            'detailsptNip' => $this->request->getPost('nip'),
        );
        $model->saveApiSptDetail($data);
    }

    public function apidelete()
    {
        $idtemp = $this->request->getPost('idtemp');
        $id = session()->get('userId');
        $model = new Spt();
        $model->deleteApiSpt($idtemp, $id);
    }

    public function apideletedetail()
    {
        $nip = $this->request->getPost('nip');
        $spt = $this->request->getPost('spt');
        $model = new Spt();
        $model->deleteApiSptDetail($nip, $spt);
    }

    public function save()
    {
        $rules = [
            'kode' => [
                'rules' => 'required|max_length[20]|is_unique[tb_spt.sptKode]',
                'errors' => [
                    'is_unique' => 'Kode sudah ada',
                    'required' => 'Kode harus diisi',
                    'max_length' => 'Kolom kode tidak boleh lebih dari 20 karakter'
                ]
            ],
            'tanggalkegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
            'agenda' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Agenda harus diisi',
                    'max_length' => 'Kolom agenda tidak boleh lebih dari 255 karakter'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new Spt();
            $id = session()->get('userId');
            date_default_timezone_set('Asia/Jakarta');
            $data = array(
                'sptKode' => $this->request->getPost('kode'),
                'sptTanggal' => date('Y-m-d H:i:s'),
                'sptAgenda' => $this->request->getPost('agenda'),
                'sptTanggalKegiatan' => $this->request->getPost('tanggalkegiatan'),
            );
            $model->saveSpt($data);
            // Simpan detail
            $db = \Config\Database::connect();
            $sql = "INSERT INTO tb_detail_spt (detailsptKodeSpt, detailsptNip) SELECT tempKodeSpt, tempNip FROM tb_temp";
            $db->query($sql);
            $sql2 = "DELETE FROM tb_temp WHERE tempUserId='$id'";
            $db->query($sql2);
            // Akhir
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/spt');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/spt/tambah')->withInput()->with('validation', $validation);
        }
    }

    public function edit()
    {
        $rules = [
            'kode' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Kode harus diisi',
                    'max_length' => 'Kolom kode tidak boleh lebih dari 20 karakter'
                ]
            ],
            'tanggalkegiatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama harus diisi',
                ]
            ],
            'agenda' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Agenda harus diisi',
                    'max_length' => 'Kolom agenda tidak boleh lebih dari 255 karakter'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new Spt();
            $id = session()->get('userId');
            $spt = $this->request->getPost('kode');
            date_default_timezone_set('Asia/Jakarta');
            $data = array(
                'sptKode' => $spt,
                'sptTanggal' => date('Y-m-d H:i:s'),
                'sptAgenda' => $this->request->getPost('agenda'),
                'sptTanggalKegiatan' => $this->request->getPost('tanggalkegiatan'),
            );
            $model->updateSpt($data, $spt);
            // Simpan detail
            $db = \Config\Database::connect();
            $sql2 = "DELETE FROM tb_temp WHERE tempUserId='$id'";
            $db->query($sql2);
            // Akhir
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('/spt');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/spt/tambah')->withInput()->with('validation', $validation);
        }
    }

    public function delete()
    {
        $model = new Spt();
        $id = $this->request->getPost('id');
        $model->deleteSpt($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/spt');
    }

    public function surat($id)
    {
        $model = new Spt();
        $data = [
            'spt' => $model->getSptDetail($id)->getResultArray(),
            'detail' => $model->getDetailSpt($id)->getResultArray()
        ];
        echo view('laporan/surat_perintah_tugas', $data);
    }
}
