<?php

namespace App\Models;

use CodeIgniter\Model;

class Login extends Model
{
    public function cekLogin($email)
    {
        return $this->db->table('tb_user')
            ->where(array('userEmail' => $email))
            ->get()->getRowArray();
    }
}
