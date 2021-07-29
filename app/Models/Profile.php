<?php

namespace App\Models;

use CodeIgniter\Model;

class Profile extends Model
{
    public function updateProfile($data, $id)
    {
        $query = $this->db->table('tb_user')->update($data, array('userId' => $id));
        return $query;
    }
}
