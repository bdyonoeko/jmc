<?php

namespace App\Models;

use CodeIgniter\Model;

class ProvinsiModel extends Model
{
  protected $table = 'provinsi';
  protected $primaryKey = 'id';
  protected $allowedFields = ['nama_provinsi'];
  protected $useTimestamps = true;

  public function daftarKabupaten($id){
    $db = \Config\Database::connect();

    $builder = $db->table('provinsi');
    $builder->select('*');
    $builder->join('kabupaten', 'kabupaten.provinsi_id = provinsi.id');
    $builder->where('provinsi.id', $id);
    $builder->orderBy('kabupaten.nama_kabupaten');
    $query = $builder->get();

    return $query->getResultArray();
  }

  public function ibukota($id) {
    $db = \Config\Database::connect();

    $builder = $db->table('provinsi');
    $builder->select('kabupaten.nama_kabupaten');
    $builder->join('kabupaten', 'kabupaten.provinsi_id = provinsi.id');
    $builder->where('provinsi.id', $id);
    $builder->where('kabupaten.is_ibukota', true);
    $query = $builder->get();

    return $query->getRowArray();
  }

  public function penduduk($id){
    $db = \Config\Database::connect();

    $builder = $db->table('provinsi');
    $builder->selectSum('kabupaten.jumlah_penduduk');
    $builder->join('kabupaten', 'kabupaten.provinsi_id = provinsi.id');
    $builder->where('provinsi.id', $id);
    $query = $builder->get();

    return $query->getRowArray();
  }

  public function provinsiDanPenduduk(){
    $db = \Config\Database::connect();

    $builder = $db->table('provinsi');
    $builder->select('provinsi.id, provinsi.nama_provinsi');
    $builder->selectSum('kabupaten.jumlah_penduduk');
    $builder->join('kabupaten', 'kabupaten.provinsi_id = provinsi.id');
    $builder->groupBy('provinsi.id');
    $builder->orderBy('provinsi.nama_provinsi');
    $query = $builder->get();

    return $query->getResultArray();
  }
}