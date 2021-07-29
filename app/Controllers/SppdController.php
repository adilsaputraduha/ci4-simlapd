<?php

namespace App\Controllers;

use App\Models\Sppd;
use App\Models\Spt;

class SppdController extends BaseController
{
    public function index()
    {
        $model = new Sppd();
        $data['sppd'] = $model->getSppd()->getResultArray();
        echo view('view_sppd', $data);
    }

    public function tambah()
    {
        // Nomor otomatis
        $db = \Config\Database::connect();
        $query = $db->query("SELECT max(sppdKode) as biggerCode FROM tb_sppd");
        $row = $query->getRowArray();
        $kodeTerbesar = $row['biggerCode'];
        $urutan = (int) substr($kodeTerbesar, 12, 3);
        $urutan++;
        $huruf = "SPPD-";
        $tahun = date("Y");
        $tanggal = date("d");
        $kodesppd = $huruf . $tahun . '-' . $tanggal . sprintf("%03s", $urutan);
        $model = new Sppd();
        $model1 = new Spt();
        $data = [
            'validation' => \Config\Services::validation(),
            'sppd' => $model->getSppd()->getResultArray(),
            'spt' => $model1->getSpt()->getResultArray(),
            'kode' => $kodesppd
        ];
        echo view('view_tambah_sppd', $data);
    }

    public function update($id)
    {
        $model = new Sppd();
        $model1 = new Spt();
        $data = [
            'sppd' => $model->getSppdDetail($id)->getResultArray(),
            'spt' => $model1->getSpt()->getResultArray(),
            'validation' => \Config\Services::validation(),
        ];
        echo view('view_edit_sppd', $data);
    }

    public function save()
    {
        $rules = [
            'kode' => [
                'rules' => 'required|max_length[20]|is_unique[tb_sppd.sppdKode]',
                'errors' => [
                    'is_unique' => 'Kode sudah ada',
                    'required' => 'Kode harus diisi',
                    'max_length' => 'Kolom kode tidak boleh lebih dari 20 karakter'
                ]
            ],
            'spt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Spt harus diisi',
                ]
            ],
            'kendaraan' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Tujuan harus diisi',
                    'max_length' => 'Kolom kode tidak boleh lebih dari 100 karakter'
                ]
            ],
            'keterangan' => [
                'rules' => 'max_length[100]',
                'errors' => [
                    'max_length' => 'Kolom kode tidak boleh lebih dari 100 karakter'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new Sppd();
            $data = array(
                'sppdKode' => $this->request->getPost('kode'),
                'sppdSpt' => $this->request->getPost('spt'),
                'sppdKendaraan' => $this->request->getPost('kendaraan'),
                'sppdLainLain' => $this->request->getPost('keterangan')
            );
            $model->saveSppd($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/sppd');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/sppd/tambah')->withInput()->with('validation', $validation);
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
            'spt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Spt harus diisi',
                ]
            ],
            'kendaraan' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Tujuan harus diisi',
                    'max_length' => 'Kolom kode tidak boleh lebih dari 100 karakter'
                ]
            ],
            'keterangan' => [
                'rules' => 'max_length[100]',
                'errors' => [
                    'max_length' => 'Kolom kode tidak boleh lebih dari 100 karakter'
                ]
            ]
        ];

        $id = $this->request->getPost('kode');

        if ($this->validate($rules)) {
            $model = new Sppd();
            $data = array(
                'sppdSpt' => $this->request->getPost('spt'),
                'sppdKendaraan' => $this->request->getPost('kendaraan'),
                'sppdLainLain' => $this->request->getPost('keterangan')
            );
            $model->updateSppd($data, $id);
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('/sppd');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/sppd/tambah')->withInput()->with('validation', $validation);
        }
    }

    public function delete()
    {
        $model = new Sppd();
        $id = $this->request->getPost('id');
        $model->deleteSppd($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/sppd');
    }

    public function surat($id)
    {
        $model = new Sppd();
        $data = [
            'sppd' => $model->getSppdDetailSurat($id)->getResultArray(),
            'tujuan' => $model->getSppdDetailTujuan($id)->getResultArray()
        ];
        echo view('laporan/sppd', $data);
    }
}
