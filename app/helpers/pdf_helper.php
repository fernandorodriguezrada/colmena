<?php

require_once __DIR__ . '/../models/Informe.php';
require_once __DIR__ . '/../models/Components/ComponenteFactory.php';

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
        
        $piezas = Informe::getPiezas($informe['id']);
        
        $paginas = self::renderComponentes($piezas);

        ob_start();
        require __DIR__ . '/../views/pdf_plantilla.php';
        return ob_get_clean();
    }
    
    private static function renderComponentes(array $piezas): array
    {
        if (empty($piezas)) {
            return [[
                'detras' => '',
                'flujo' => '<div class="section"><div class="content">El informe se elaborará con el contenido estándar.</div></div>',
                'delante' => '',
            ]];
        }

        $paginas = [];
        $grupos = ['detras' => [], 'flujo' => [], 'delante' => []];
        $flush = function () use (&$paginas, &$grupos) {
            $flujoHtml = '';
            foreach ($grupos['flujo'] as $pieza) {
                $componente = ComponenteFactory::createFromArray($pieza);
                if ($componente) {
                    $flujoHtml .= $componente->render();
                }
            }

            $detrasHtml = '';
            if (!empty($grupos['detras'])) {
                $detrasHtml = '<div class="componentes-informe">' . ComponenteFactory::renderComponents($grupos['detras']) . '</div>';
            }

            $delanteHtml = '';
            if (!empty($grupos['delante'])) {
                $delanteHtml = '<div class="componentes-informe">' . ComponenteFactory::renderComponents($grupos['delante']) . '</div>';
            }

            $paginas[] = ['detras' => $detrasHtml, 'flujo' => $flujoHtml, 'delante' => $delanteHtml];
            $grupos = ['detras' => [], 'flujo' => [], 'delante' => []];
        };

        foreach ($piezas as $pieza) {
            if (($pieza['type'] ?? null) === 'pagina') {
                $flush();
                continue;
            }
            $layout = $pieza['layout'] ?? 'inline';
            if ($layout === 'detras') {
                $grupos['detras'][] = $pieza;
            } elseif ($layout === 'delante') {
                $grupos['delante'][] = $pieza;
            } else {
                $grupos['flujo'][] = $pieza;
            }
        }
        $flush();

        return $paginas;
    }
}