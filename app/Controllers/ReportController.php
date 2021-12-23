<?php

namespace App\Controllers;

use App\Models\KabupatenModel;
use App\Models\ProvinsiModel;

class ReportController extends BaseController
{
    public function __construct()
    {
        $this->ProvinsiModel = new ProvinsiModel();
        $this->KabupatenModel = new KabupatenModel();
    }

    public function provinsi()
    {
        $data = [
            'provinsi' => $this->ProvinsiModel->provinsiDanPenduduk(),
        ];

        $filename = date('j-n-Y'). "-provinsi-report";

        $dompdf = new \Dompdf\Dompdf();

        $dompdf->loadHtml(view('provinsi/report', $data));

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream($filename);
    }

    public function kabupaten($id){
        $data = [
            'detail_provinsi' => $this->ProvinsiModel->find($id),
            'daftar_kabupaten' => $this->ProvinsiModel->daftarKabupaten($id),
            'ibukota' => $this->ProvinsiModel->ibukota($id),
            'penduduk' => $this->ProvinsiModel->penduduk($id),
        ];

        $filename = date('j-n-Y'). "-kabupaten-report";

        $dompdf = new \Dompdf\Dompdf();

        $dompdf->loadHtml(view('kabupaten/report', $data));

        $dompdf->setPaper('A4', 'portrait');

        $dompdf->render();

        $dompdf->stream($filename);
    }
}
