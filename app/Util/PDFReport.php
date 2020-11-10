<?php 

namespace App\Util;

use App\Interfaces\Report;
use Dompdf\Dompdf;

class PDFReport implements Report {
    public function generateReport($html){
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream();
    }
}
