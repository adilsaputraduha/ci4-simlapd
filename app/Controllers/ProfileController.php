<?php

namespace App\Controllers;

use App\Models\Login;
use App\Models\Profile;

class ProfileController extends BaseController
{
    public function index()
    {
        echo view('view_profile');
    }

    public function edit()
    {
        $model = new Login();
        $id = $this->request->getPost('id');
        $email = $this->request->getPost('email');
        $lama = $this->request->getPost('lama');
        $baru = $this->request->getPost('baru');
        $user = $model->cekLogin($email);
        if ($user) {
            if (password_verify($lama, $user['userPassword'])) {
                $model = new Profile();
                $data = array(
                    'userPassword' => password_hash($baru, PASSWORD_DEFAULT),
                );
                $model->updateProfile($data, $id);
                session()->remove('userId');
                session()->remove('userNama');
                session()->remove('userEmail');
                session()->remove('userLevel');
                session()->setFlashdata('success', 'Sukses! Silahkan login kembali');
                return redirect()->to('/login');
            } else {
                session()->setFlashdata('failed', 'Password lama salah!');
                return redirect()->to('/profile');
            }
        } else {
            session()->setFlashdata('failed', 'Session tidak ada, silahkan logout dahulu');
            return redirect()->to('/profile');
        }
    }
}
