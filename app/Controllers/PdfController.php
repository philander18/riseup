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
        $options->set('defaultFont', 'Arial');
        $dompdf = new Dompdf($options);

        // Isi PDF (HTML)
        $html = '
            <h1>Judul Laporan</h1>
            <p>Ini adalah contoh laporan dalam bentuk PDF.</p>
        ';

        // Load HTML ke Dompdf
        $dompdf->loadHtml($html);

        // Atur ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render PDF
        $dompdf->render();

        // Set nama file
        $filename = 'laporan.pdf';

        // Output PDF ke browser (auto-download)
        return $this->response
            ->setHeader('Content-Type', 'application/pdf')
            ->setHeader('Content-Disposition', 'inline; filename="' . $filename . '"')
            ->setBody($dompdf->output());
    }
}
