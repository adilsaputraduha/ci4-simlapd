<?php

namespace App\Controllers;

use App\Models\Tujuan;

class TujuanController extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->form_validation = \Config\Services::validation();
    }

    public function index()
    {
        $model = new Tujuan();
        $data['tujuan'] = $model->getTujuan()->getResultArray();
        echo view('view_tujuan', $data);
    }

    public function save()
    {
        $rules = [
            'nama' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Nama harus diisi',
                    'max_length' => 'Kolom nama tidak boleh lebih dari 100 karakter'
                ]
            ],
            'kota' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Kota harus diisi',
                    'max_length' => 'Kolom kota tidak boleh lebih dari 100 karakter'
                ]
            ],
            'provinsi' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Provinsi harus diisi',
                    'max_length' => 'Kolom provinsi tidak boleh lebih dari 100 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'max_length' => 'Kolom alamat tidak boleh lebih dari 255 karakter'
                ]
            ],
            'notelp' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Nomor Telepon harus diisi',
                    'max_length' => 'Kolom nomor telepon tidak boleh lebih dari 20 karakter'
                ]
            ],
            'pimpinan' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Pimpinan harus diisi',
                    'max_length' => 'Kolom pimpinan tidak boleh lebih dari 100 karakter'
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $model = new Tujuan();
            $data = array(
                'tujuanNamaTempat' => $this->request->getPost('nama'),
                'tujuanKota' => $this->request->getPost('kota'),
                'tujuanProvinsi' => $this->request->getPost('provinsi'),
                'tujuanAlamat' => $this->request->getPost('alamat'),
                'tujuanNoTelp' => $this->request->getPost('notelp'),
                'tujuanPimpinan' => $this->request->getPost('pimpinan'),
            );
            $model->saveTujuan($data);
            session()->setFlashdata('success', 'Berhasil menyimpan data');
            return redirect()->to('/tujuan');
        } else {
            session()->setFlashdata('failed', 'Gagal menyimpan, ada kesalahan pada inputan anda' . $this->validator->listErrors());
            return redirect()->to('/tujuan');
        }
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
            'kota' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Kota harus diisi',
                    'max_length' => 'Kolom kota tidak boleh lebih dari 100 karakter'
                ]
            ],
            'provinsi' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Provinsi harus diisi',
                    'max_length' => 'Kolom provinsi tidak boleh lebih dari 100 karakter'
                ]
            ],
            'alamat' => [
                'rules' => 'required|max_length[255]',
                'errors' => [
                    'required' => 'Alamat harus diisi',
                    'max_length' => 'Kolom alamat tidak boleh lebih dari 255 karakter'
                ]
            ],
            'notelp' => [
                'rules' => 'required|max_length[20]',
                'errors' => [
                    'required' => 'Nomor Telepon harus diisi',
                    'max_length' => 'Kolom nomor telepon tidak boleh lebih dari 20 karakter'
                ]
            ],
            'pimpinan' => [
                'rules' => 'required|max_length[100]',
                'errors' => [
                    'required' => 'Pimpinan harus diisi',
                    'max_length' => 'Kolom pimpinan tidak boleh lebih dari 100 karakter'
                ]
            ]
        ];
        if ($this->validate($rules)) {
            $model = new Tujuan();
            $id = $this->request->getPost('id');
            $data = array(
                'tujuanNamaTempat' => $this->request->getPost('nama'),
                'tujuanKota' => $this->request->getPost('kota'),
                'tujuanProvinsi' => $this->request->getPost('provinsi'),
                'tujuanAlamat' => $this->request->getPost('alamat'),
                'tujuanNoTelp' => $this->request->getPost('notelp'),
                'tujuanPimpinan' => $this->request->getPost('pimpinan'),
            );
            $model->updateTujuan($data, $id);
            session()->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('/tujuan');
        } else {
            session()->setFlashdata('failed', 'Gagal mengedit, ada kesalahan pada inputan anda' . $this->validator->listErrors());
            return redirect()->to('/tujuan');
        }
    }

    public function delete()
    {
        $model = new Tujuan();
        $id = $this->request->getPost('id');
        $model->deleteTujuan($id);
        session()->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/tujuan');
    }

    public function laporan()
    {
        $model = new Tujuan();
        $data['tujuan'] = $model->getTujuan()->getResultArray();
        echo view('laporan/laporan_tujuan', $data);
    }
}
