<?php

namespace App\Controllers;

use App\Models\Spt;
use App\Models\Keberangkatan;
use App\Models\Tujuan;

class KeberangkatanController extends BaseController
{
    public function index()
    {
        $model = new Keberangkatan();
        $data['keberangkatan'] = $model->getKeberangkatan()->getResultArray();
        echo view('view_keberangkatan', $data);
    }

    public function tambah()
    {
        // Nomor otomatis
        $db = \Config\Database::connect();
        $query = $db->query("SELECT max(keberangkatanKode) as biggerCode FROM tb_keberangkatan");
        $row = $query->getRowArray();
        $kodeTerbesar = $row['biggerCode'];
        $urutan = (int) substr($kodeTerbesar, 3, 1);
        $urutan++;
        $huruf = "K";
        $kodekeberangkatan = $huruf . sprintf("%03s", $urutan);
        $model = new Spt();
        $model1 = new Tujuan();
        $data = [
            'validation' => \Config\Services::validation(),
            'spt' => $model->getSpt()->getResultArray(),
            'tujuan' => $model1->getTujuan()->getResultArray(),
            'kode' => $kodekeberangkatan
        ];
        echo view('view_tambah_keberangkatan', $data);
    }

    public function update($id)
    {
        $model = new Spt();
        $model1 = new Tujuan();
        $model2 = new Keberangkatan();
        $data = [
            'validation' => \Config\Services::validation(),
            'spt' => $model->getSpt()->getResultArray(),
            'tujuan' => $model1->getTujuan()->getResultArray(),
            'keberangkatan' => $model2->getKeberangkatanDetail($id)->getResultArray()
        ];
        echo view('view_edit_keberangkatan', $data);
    }

    public function save()
    {
        $rules = [
            'kode' => [
                'rules' => 'required|max_length[20]|is_unique[tb_keberangkatan.keberangkatanKode]',
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
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan harus diisi'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new Keberangkatan();
            $data = array(
                'keberangkatanKode' => $this->request->getPost('kode'),
                'keberangkatanSpt' => $this->request->getPost('spt'),
                'keberangkatanTujuan' => $this->request->getPost('idtujuan'),
                'keberangkatanJangkaWaktu' => $this->request->getPost('lama'),
                'keberangkatanTanggalMulai' => $this->request->getPost('tglberangkat'),
                'keberangkatanTanggalSelesai' => $this->request->getPost('tglselesai')
            );
            $model->saveKeberangkatan($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/keberangkatan');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/keberangkatan/tambah')->withInput()->with('validation', $validation);
        }
    }

    public function edit()
    {
        $rules = [
            'spt' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Spt harus diisi',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tujuan harus diisi'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $id = $this->request->getPost('kode');
            $model = new Keberangkatan();
            $data = array(
                'keberangkatanSpt' => $this->request->getPost('spt'),
                'keberangkatanTujuan' => $this->request->getPost('idtujuan'),
                'keberangkatanJangkaWaktu' => $this->request->getPost('lama'),
                'keberangkatanTanggalMulai' => $this->request->getPost('tglberangkat'),
                'keberangkatanTanggalSelesai' => $this->request->getPost('tglselesai')
            );
            $model->updateKeberangkatan($data, $id);
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('/keberangkatan');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/keberangkatan/tambah')->withInput()->with('validation', $validation);
        }
    }

    public function delete()
    {
        $model = new Keberangkatan();
        $id = $this->request->getPost('id');
        $model->deleteKeberangkatan($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/keberangkatan');
    }

    public function laporan()
    {
        $model = new Keberangkatan();
        $data['keberangkatan'] = $model->getKeberangkatan()->getResultArray();
        echo view('laporan/laporan_keberangkatan', $data);
    }
}
