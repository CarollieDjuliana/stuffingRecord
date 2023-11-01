<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends BaseController
{
    public function generatePdf()
    {
        // Konfigurasi Dompdf
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);

        $dompdf = new Dompdf($options);

        // HTML yang akan dijadikan PDF
        $data = [
            'dynamicContent' => 'Konten dinamis disini', // Gantilah ini dengan konten dinamis Anda
        ];

        $html = view('pages\showData', $data); // Gantilah 'pdf_template' dengan nama view HTML Anda

        // Muat HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Render PDF
        $dompdf->render();

        // Simpan PDF ke file atau tampilkan langsung
        $dompdf->stream('output.pdf');
    }
}
