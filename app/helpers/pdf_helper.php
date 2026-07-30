<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfHelper
{
    public static function generar(array $informe, array $beneficiario): string
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isFontSubsettingEnabled', true);

        $dompdf = new Dompdf($options);
        $dompdf->loadHtml(self::renderTemplate($informe, $beneficiario));
        $dompdf->setPaper('letter', 'portrait');
        $dompdf->render();

        $dir      = __DIR__ . '/../../pdf/' . $beneficiario['id'];
        $filename = 'informe_' . $informe['id'] . '_' . date('Ymd') . '.pdf';
        $filepath = $dir . '/' . $filename;

        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        file_put_contents($filepath, $dompdf->output());

        return 'pdf/' . $beneficiario['id'] . '/' . $filename;
    }

    private static function renderTemplate(array $informe, array $beneficiario): string
    {
        $bgB64 = base64_encode(file_get_contents(__DIR__ . '/../../assets/img/pagina.png'));

        ob_start();
        require __DIR__ . '/../views/pdf_plantilla.php';
        return ob_get_clean();
    }
}