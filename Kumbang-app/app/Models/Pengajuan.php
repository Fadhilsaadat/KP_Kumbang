<?php

namespace App\Models;

use CodeIgniter\Model;

class Pengajuan extends Model
{
    protected $table                = 'pengajuan';
    protected $primaryKey           = 'id_pengajuan';
    protected $useAutoIncrement     = true;
    protected $allowedFields = [
        'penanggung_jawab',
        'orang_terlibat',
        'hari_tanggal',
        'waktu_awal',
        'waktu_akhir',
        'Tempat_yang_dipakai',
        'peralatan',
        'kegunaan',
        'status',
        'user_id'
    ];
}
