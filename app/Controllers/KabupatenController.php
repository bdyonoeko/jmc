<?php

namespace App\Controllers;

use App\Models\KabupatenModel;

class KabupatenController extends BaseController
{
  public function __construct()
  {
    $this->KabupatenModel = new KabupatenModel();
  }

  public function store()
  {
    $provinsi_id = $this->request->getVar('provinsi_id');

    // validasi
    $validation = $this->validate([
      'nama_kabupaten' => 'required',
      'jumlah_penduduk' => 'required',
    ]);

    if (!$validation) {
      session()->setFlashdata('pesan', 'Tidak boleh ada form yang kosong');
      return redirect()->to('provinsi/show/'. $provinsi_id);
    }

    // simpan data
    $data = [
      'nama_kabupaten' => $this->request->getVar('nama_kabupaten'),
      'jumlah_penduduk' => $this->request->getVar('jumlah_penduduk'),
      'provinsi_id' => $provinsi_id,
    ];

    $this->KabupatenModel->insert($data);

    session()->setFlashdata('success', 'Kabupaten berhasil ditambah');
    return redirect()->to('provinsi/show/'. $provinsi_id);
  }

  public function edit($id)
  {
    $data = [
      'detail_kabupaten' => $this->KabupatenModel->find($id),
    ];

    echo view('kabupaten/edit', $data);
  }

  public function update($id)
  {
    $provinsi_id = $this->request->getVar('provinsi_id');

    // validasi
    $validation = $this->validate([
      'nama_kabupaten' => 'required',
      'jumlah_penduduk' => 'required',
    ]);

    if (!$validation) {
      session()->setFlashdata('pesan', 'Tidak boleh ada form yang kosong');
      return redirect()->to('kabupaten/edit/'. $id)->withInput();
    }

    // simpan data
    $data = [
      'nama_kabupaten' => $this->request->getVar('nama_kabupaten'),
      'jumlah_penduduk' => $this->request->getVar('jumlah_penduduk'),
      'provinsi_id' => $provinsi_id,
      'is_ibukota' => $this->request->getVar('is_ibukota'),
    ];

    $this->KabupatenModel->update($id, $data);

    session()->setFlashdata('success', 'Kabupaten berhasil diubah');
    return redirect()->to('provinsi/show/'. $provinsi_id);
  }
  
  public function destroy($id)
  {
    $provinsi_id = $this->request->getVar('provinsi_id');

    $this->KabupatenModel->delete($id);

    session()->setFlashdata('success', 'Kabupaten berhasil dihapus');
    return redirect()->to('provinsi/show/'. $provinsi_id);
  }
}