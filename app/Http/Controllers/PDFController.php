<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use App\Models\Customer;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $customers = Customer::with('hobbies')->get();

        $logoUrl = asset('images/logo.png'); 

        // Creo el contenido que quiero mostrar
        $html = '
        <html>
        <head>
            <style>
                @page {
                    margin: 100px 25px;
                }
                header {
                    position: fixed;
                    top: -60px;
                    left: 0px;
                    right: 0px;
                    height: 50px;
                    background-color: #03a9f4;
                    color: white;
                    text-align: center;
                    line-height: 35px;
                }
                footer {
                    position: fixed;
                    bottom: -60px;
                    left: 0px;
                    right: 0px;
                    height: 50px;
                    background-color: #03a9f4;
                    color: white;
                    text-align: center;
                    line-height: 35px;
                }
                .page-break {
                    page-break-after: always;
                }
            </style>
        </head>
        <body>
            <header>
                <img src="'.$logoUrl.'" alt="Logo" height="50">
            </header>
            <footer>
                Página {PAGE_NUM} de {PAGE_COUNT}
            </footer>
            <main>
                <h1>Listado de Clientes y sus Hobbies</h1>
                <ul>';

        foreach ($customers as $customer) {
            $html .= '<li>' . $customer->name . ' ' . $customer->surname . ': ';
            $html .= implode(', ', $customer->hobbies->pluck('name')->toArray());
            $html .= '</li>';
        }

        $html .= '
                </ul>
                <div class="page-break"></div>
            </main>
        </body>
        </html>';

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        // Reemplaza los marcadores de posición por valores reales
        $canvas = $dompdf->getCanvas();
        $canvas->page_script(function ($pageNumber, $pageCount, $canvas, $fontMetrics) {
            $text = "Página $pageNumber de $pageCount";
            $font = $fontMetrics->getFont('Helvetica', 'normal');
            $size = 12;
            $width = $fontMetrics->getTextWidth($text, $font, $size);
            $canvas->text(270 - $width / 2, 820, $text, $font, $size);
        });

        // Salida del PDF generado al navegador
        return $dompdf->stream();
    }
}
