<?php

// PdfController.php
use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController
{
    public function generatePdf()
    {
        // Inisialisasi DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Render HTML to PDF
        $html = '<html><body><h1>Hello, World!</h1></body></html>';
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Output PDF to browser
        $dompdf->stream('document.pdf', array('Attachment' => 0));
    }

    public function generatePdfWithData()
    {
        // ... (kode untuk menampilkan data)

        // Inisialisasi DOMPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $dompdf = new Dompdf($options);

        // Render HTML to PDF
        $html = '<html><body><h1>Hello, World!</h1></body></html>'; // Ganti dengan HTML yang sesuai dengan data Anda
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Output PDF to browser
        $dompdf->stream('document.pdf', array('Attachment' => 0));
    }
}
