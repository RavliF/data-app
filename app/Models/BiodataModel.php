<?php

namespace App\Models;

use CodeIgniter\Model;

class BiodataModel extends Model
{
    protected $table = 'biodata';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 'tempat_lahir', 'tanggal_lahir', 'alamat', 
        'no_telepon', 'jenis_kelamin', 'pendidikan'
    ];
}
