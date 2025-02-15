<?php

namespace App\Models;

use CodeIgniter\Model;

class RiseupModel extends Model
{
    protected $table = 'peserta';
    protected $allowedFields = ['nama', 'hp', 'umur', 'gender', 'gereja', 'harapan', 'verified'];
    public function list_gereja()
    {
        return $this->db->table('list_gereja')->select('nama')->orderBy('nama', 'asc')->get()->getResultArray();
    }

    function input_peserta($data)
    {
        return $this->db->table('peserta')->insert($data);
    }
}
