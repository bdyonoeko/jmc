<?php

namespace App\Models;

use CodeIgniter\Model;

class KabupatenModel extends Model
{
  protected $table = 'kabupaten';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nama_kabupaten', 'jumlah_penduduk', 'provinsi_id', 'is_ibukota'];
  protected $useTimeStamps = true;
}