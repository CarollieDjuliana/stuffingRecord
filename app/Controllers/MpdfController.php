<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Mpdf\Mpdf;

class MpdfController extends BaseController
{
    public function generatePdf()
    {
        $requestData = json_decode(file_get_contents("php://input"), true);

        if (isset($requestData['html'])) {
            $html = $requestData['html'];

            $mpdf = new Mpdf(); // Inisialisasi mPDF

            $mpdf->WriteHTML($html);

            $pdfContent = $mpdf->Output('test.pdf', 'S');

            return $this->response->setHeader('Content-Type', 'application/pdf')
                ->setHeader('Content-Disposition', 'inline; filename="test.pdf"')
                ->setBody($pdfContent);
        } else {
            return $this->response->setHeader('Content-Type', 'text/plain')
                ->setBody('Missing "html" in the request data');
        }
    }
}
