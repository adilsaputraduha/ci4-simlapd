<?php

namespace App\Controllers;

use App\Models\Keberangkatan;
use App\Models\Pembiayaan;
use App\Models\Spt;
use App\Models\Tujuan;

class PembiayaanController extends BaseController
{
    public function index()
    {
        $model = new Pembiayaan();
        $data['pembiayaan'] = $model->getPembiayaan()->getResultArray();
        echo view('view_pembiayaan', $data);
    }

    public function tambah()
    {
        // Nomor otomatis
        $db = \Config\Database::connect();
        $query = $db->query("SELECT max(pembiayaanKode) as biggerCode FROM tb_pembiayaan");
        $row = $query->getRowArray();
        $kodeTerbesar = $row['biggerCode'];
        $urutan = (int) substr($kodeTerbesar, 3, 1);
        $urutan++;
        $huruf = "P";
        $kodepembiayaan = $huruf . sprintf("%03s", $urutan);
        $model = new Keberangkatan();
        $data = [
            'validation' => \Config\Services::validation(),
            'keberangkatan' => $model->getKeberangkatan()->getResultArray(),
            'kode' => $kodepembiayaan
        ];
        echo view('view_tambah_pembiayaan', $data);
    }

    public function update($id)
    {
        $model = new Spt();
        $model1 = new Tujuan();
        $model2 = new Pembiayaan();
        $model3 = new Keberangkatan();
        $data = [
            'validation' => \Config\Services::validation(),
            'spt' => $model->getSpt()->getResultArray(),
            'tujuan' => $model1->getTujuan()->getResultArray(),
            'pembiayaan' => $model2->getPembiayaanDetail($id)->getResultArray(),
            'keberangkatan' => $model3->getKeberangkatan()->getResultArray()
        ];
        echo view('view_edit_pembiayaan', $data);
    }

    public function save()
    {
        $rules = [
            'kode' => [
                'rules' => 'required|max_length[20]|is_unique[tb_pembiayaan.pembiayaanKode]',
                'errors' => [
                    'is_unique' => 'Kode sudah ada',
                    'required' => 'Kode harus diisi',
                    'max_length' => 'Kolom kode tidak boleh lebih dari 20 karakter'
                ]
            ],
            'keberangkatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keberangkatan harus diisi',
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new Pembiayaan();
            $data = array(
                'pembiayaanKode' => $this->request->getPost('kode'),
                'pembiayaanKodeBerangkat' => $this->request->getPost('keberangkatan'),
                'pembiayaanPokok' => $this->request->getPost('pokok'),
                'pembiayaanTransportasi' => $this->request->getPost('transportasi'),
                'pembiayaanPenginapan' => $this->request->getPost('penginapan'),
                'pembiayaanLainLain' => $this->request->getPost('lainlain'),
                'pembiayaanTotal' => $this->request->getPost('total')
            );
            $model->savePembiayaan($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/pembiayaan');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/pembiayaan/tambah')->withInput()->with('validation', $validation);
        }
    }

    public function edit()
    {
        $rules = [
            'keberangkatan' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Keberangkatan harus diisi',
                ]
            ]
        ];

        $id = $this->request->getPost('kode');

        if ($this->validate($rules)) {
            $model = new Pembiayaan();
            $data = array(
                'pembiayaanKodeBerangkat' => $this->request->getPost('keberangkatan'),
                'pembiayaanPokok' => $this->request->getPost('pokok'),
                'pembiayaanTransportasi' => $this->request->getPost('transportasi'),
                'pembiayaanPenginapan' => $this->request->getPost('penginapan'),
                'pembiayaanLainLain' => $this->request->getPost('lainlain'),
                'pembiayaanTotal' => $this->request->getPost('total')
            );
            $model->updatePembiayaan($data, $id);
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('/pembiayaan');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/pembiayaan/tambah')->withInput()->with('validation', $validation);
        }
    }

    public function delete()
    {
        $model = new Pembiayaan();
        $id = $this->request->getPost('id');
        $model->deletePembiayaan($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/pembiayaan');
    }

    public function rincianpembiayaan($id)
    {
        $model = new Pembiayaan();
        $data = [
            'detail' => $model->getPembiayaanDetailPegawai($id)->getResultArray(),
            'pembiayaan' => $model->getPembiayaanDetail($id)->getResultArray()
        ];
        echo view('laporan/rincian_pembiayaan', $data);
    }

    public function kwitansi($id)
    {
        $model = new Pembiayaan();
        $data = [
            'pembiayaan' => $model->getPembiayaanDetail($id)->getResultArray(),
            'pegawai' => $model->getPembiayaanDetailPegawai($id)->getResultArray(),
            'namaterang' => $model->getPembiayaanDetailSatuPegawai($id)
        ];
        echo view('laporan/kwitansi', $data);
    }
}
