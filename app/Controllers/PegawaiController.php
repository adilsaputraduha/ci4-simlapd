<?php

namespace App\Controllers;

use App\Models\Pegawai;

class PegawaiController extends BaseController
{
    public function index()
    {
        $model = new Pegawai();
        $data['pegawai'] = $model->getPegawai()->getResultArray();
        echo view('view_pegawai', $data);
    }

    public function tambah()
    {
        $data['validation'] = \Config\Services::validation();
        echo view('view_tambah_pegawai', $data);
    }

    public function save()
    {
        $rules = [
            'nip' => [
                'rules' => 'required|max_length[20]|is_unique[tb_pegawai.pegawaiNip]',
                'errors' => [
                    'is_unique' => 'Nip sudah ada',
                    'required' => 'Nip harus diisi',
                    'max_length' => 'Kolom Nip tidak boleh lebih dari 20 karakter'
                ]
            ],
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'jabatan' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Jabatan harus diisi',
                    'max_length' => 'Kolom jabatan tidak boleh lebih dari 100 karakter'
                ]
            ],
            'golongan' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Golongan harus diisi',
                    'max_length' => 'Kolom golongan tidak boleh lebih dari 100 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'max_length' => 'Kolom alamat tidak boleh lebih dari 255 karakter'
                ]
            ]
        ];

        if ($this->validate($rules)) {
            $model = new Pegawai();
            $data = array(
                'pegawaiNip' => $this->request->getPost('nip'),
                'pegawaiNama' => $this->request->getPost('nama'),
                'pegawaiJabatan' => $this->request->getPost('jabatan'),
                'pegawaiGolongan' => $this->request->getPost('golongan'),
                'pegawaiAlamat' => $this->request->getPost('alamat')
            );
            $model->savePegawai($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/pegawai');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/pegawai/tambah')->withInput()->with('validation', $validation);
        }
    }

    public function update($id)
    {
        $model = new Pegawai();
        $data = [
            'pegawai' => $model->getPegawaiDetail($id)->getResultArray(),
            'validation' => \Config\Services::validation()
        ];
        echo view('view_edit_pegawai', $data);
    }

    public function edit()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'jabatan' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Jabatan harus diisi',
                    'max_length' => 'Kolom jabatan tidak boleh lebih dari 100 karakter'
                ]
            ],
            'golongan' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Golongan harus diisi',
                    'max_length' => 'Kolom golongan tidak boleh lebih dari 100 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'max_length' => 'Kolom alamat tidak boleh lebih dari 255 karakter'
                ]
            ]
        ];

        $id = $this->request->getPost('nip');

        if ($this->validate($rules)) {
            $model = new Pegawai();
            $data = array(
                'pegawaiNama' => $this->request->getPost('nama'),
                'pegawaiJabatan' => $this->request->getPost('jabatan'),
                'pegawaiGolongan' => $this->request->getPost('golongan'),
                'pegawaiAlamat' => $this->request->getPost('alamat')
            );
            $model->updatePegawai($data, $id);
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('/pegawai');
        } else {
            $validation = \Config\Services::validation();
            return redirect()->to('/pegawai/update/' . $id)->withInput()->with('validation', $validation);
        }
    }

    public function delete()
    {
        $model = new Pegawai();
        $id = $this->request->getPost('id');
        $model->deletePegawai($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/pegawai');
    }

    public function laporan()
    {
        $model = new Pegawai();
        $data['pegawai'] = $model->getPegawai()->getResultArray();
        echo view('laporan/laporan_pegawai', $data);
    }
}
