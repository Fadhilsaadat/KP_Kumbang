<?php

namespace App\Models;

use CodeIgniter\Model;

class SaranaModel extends Model
{
    protected $table = 'sarana';
    protected $primaryKey           = 'id_sarana';
    protected $useAutoIncrement     = true;
    protected $allowedFields = ['nama_sarana'];
    
}
                