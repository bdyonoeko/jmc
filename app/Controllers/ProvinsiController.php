<?php

namespace App\Controllers;

use App\Models\ProvinsiModel;

class ProvinsiController extends BaseController
{
  public function __construct()
  {
    $this->ProvinsiModel = new ProvinsiModel();
  }

  public function index()
  {
    $data = [
      'provinsi' => $this->ProvinsiModel->orderBy('nama_provinsi')->findAll(),
    ];

    echo view('provinsi/index', $data);
  }

  public function store()
  {
    // validasi
    $validation = $this->validate([
      'nama_provinsi' => 'required'
    ]);

    if (!$validation) {
      session()->setFlashdata('pesan', 'Nama provinsi tidak boleh kosong');
      return redirect()->to('/');
    }

    // simpan data
    $data = [
      'nama_provinsi' => $this->request->getVar('nama_provinsi')
    ];

    $this->ProvinsiModel->insert($data);

    session()->setFlashdata('success', 'Provinsi berhasil ditambah');
    return redirect()->to('/');
  }

  public function show($id)
  {
    $data = [
      'detail_provinsi' => $this->ProvinsiModel->find($id),
      'daftar_kabupaten' => $this->ProvinsiModel->daftarKabupaten($id),
      'ibukota' => $this->ProvinsiModel->ibukota($id),
      'penduduk' => $this->ProvinsiModel->penduduk($id),
    ];

    echo view('provinsi/show', $data);
  }

  public function destroy($id)
  {
    $this->ProvinsiModel->delete($id);

    session()->setFlashdata('success', 'Provinsi berhasil dihapus');
    return redirect()->to('/');
  }
}