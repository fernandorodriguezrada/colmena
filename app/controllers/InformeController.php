<?php

require_once __DIR__ . '/../views/layout.php';
require_once __DIR__ . '/../helpers/pdf_helper.php';
require_once __DIR__ . '/../models/Components/ComponenteFactory.php';

class InformeController
{
    public static function paso1(): void
    {
        renderLayout('paso1', [
            'title' => 'Paso 1 — Seleccionar Beneficiario',
            'paso'  => 1,
        ]);
    }

    public static function paso2(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $beneficiarioId = (int) ($_POST['beneficiario_id'] ?? 0);
            $nombre         = trim($_POST['nombre'] ?? '');
            $cedula         = trim($_POST['cedula'] ?? '');

            if ($beneficiarioId > 0) {
                $_SESSION['wizard']['beneficiario_id'] = $beneficiarioId;
            } elseif (mb_strlen($nombre) >= 3) {
                $_SESSION['wizard']['beneficiario_id'] = Beneficiario::crear($nombre, $cedula);
            } else {
                header('Location: index.php?action=paso1&error=1');
                exit;
            }

            $beneficiario = Beneficiario::findById($_SESSION['wizard']['beneficiario_id']);
            if (!$beneficiario) {
                header('Location: index.php?action=paso1&error=1');
                exit;
            }
            $_SESSION['wizard']['beneficiario'] = $beneficiario;
        }

        $beneficiario = $_SESSION['wizard']['beneficiario'] ?? null;
        if (!$beneficiario) {
            header('Location: index.php?action=paso1');
            exit;
        }

        renderLayout('paso2', [
            'title'        => 'Paso 2 — Tipo de Informe',
            'paso'         => 2,
            'beneficiario' => $beneficiario,
            'tipos'        => Informe::tipos(),
        ]);
    }

    public static function paso3(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipoId = (int) ($_POST['tipo_informe_id'] ?? 0);
            if ($tipoId <= 0) {
                header('Location: index.php?action=paso2');
                exit;
            }
            $_SESSION['wizard']['tipo_informe_id'] = $tipoId;
            $_SESSION['wizard']['tipo_personalizado'] = trim($_POST['tipo_personalizado'] ?? '');
        }

        $beneficiario = $_SESSION['wizard']['beneficiario'] ?? null;
        $tipoId       = $_SESSION['wizard']['tipo_informe_id'] ?? 0;

        if (!$beneficiario || !$tipoId) {
            header('Location: index.php?action=paso1');
            exit;
        }

        renderLayout('paso3', [
            'title'             => 'Paso 3 — Detalles del Informe',
            'paso'              => 3,
            'beneficiario'      => $beneficiario,
            'tipoId'            => $tipoId,
            'tipoPersonalizado' => $_SESSION['wizard']['tipo_personalizado'] ?? '',
        ]);
    }
    
    public static function paso4(): void
    {
        $beneficiario = $_SESSION['wizard']['beneficiario'] ?? null;
        $tipoId       = $_SESSION['wizard']['tipo_informe_id'] ?? 0;
        $tipoPersonalizado = $_SESSION['wizard']['tipo_personalizado'] ?? '';
        
        if (!$beneficiario || !$tipoId) {
            header('Location: index.php?action=paso1');
            exit;
        }
        
        $informeId = $_SESSION['wizard']['informe_id'] ?? null;
        $informe = null;
        $piezas = [];
        
        if ($informeId) {
            $informe = Informe::findById($informeId);
            if ($informe && !empty($informe['piezas_json'])) {
                $piezas = json_decode($informe['piezas_json'], true) ?? [];
            }
        }
        
        renderLayout('paso4', [
            'title'          => 'Paso 4 — Componer Informe',
            'paso'           => 4,
            'beneficiario'   => $beneficiario,
            'tipoId'         => $tipoId,
            'tipoPersonalizado' => $tipoPersonalizado,
            'piezas'         => $piezas,
            'informeId'      => $informeId,
            'informe'        => $informe,
        ]);
    }
    
    public static function paso5(): void
    {
        $beneficiario = $_SESSION['wizard']['beneficiario'] ?? null;
        $tipoId       = $_SESSION['wizard']['tipo_informe_id'] ?? 0;
        $tipoPersonalizado = $_SESSION['wizard']['tipo_personalizado'] ?? '';
        $informeId = $_SESSION['wizard']['informe_id'] ?? null;
        
        if (!$beneficiario || !$tipoId) {
            header('Location: index.php?action=paso1');
            exit;
        }
        
        $piezas = [];
        if ($informeId) {
            $informe = Informe::findById($informeId);
            if ($informe && !empty($informe['piezas_json'])) {
                $piezas = json_decode($informe['piezas_json'], true) ?? [];
            }
        }
        
        renderLayout('paso5', [
            'title'          => 'Paso 5 — Detalles Finales',
            'paso'           => 5,
            'beneficiario'   => $beneficiario,
            'tipoId'         => $tipoId,
            'tipoPersonalizado' => $tipoPersonalizado,
            'piezas'         => $piezas,
        ]);
    }

    public static function guardar(): void
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php');
            exit;
        }

        $beneficiarioId    = (int) ($_POST['beneficiario_id'] ?? 0);
        $tipoInformeId     = (int) ($_POST['tipo_informe_id'] ?? 0);
        $motivo            = trim($_POST['motivo'] ?? '');
        $observaciones     = trim($_POST['observaciones'] ?? '');
        $tipoPersonalizado = trim($_POST['tipo_personalizado'] ?? '');
        $elaboradoPor      = trim($_POST['elaborado_por'] ?? '');

        if ($beneficiarioId <= 0 || $tipoInformeId <= 0 || empty($motivo) || empty($observaciones) || empty($elaboradoPor)) {
            header('Location: index.php?action=paso3&error=1');
            exit;
        }

        $informeId = Informe::crear($beneficiarioId, $tipoInformeId, $motivo, $observaciones, $tipoPersonalizado ?: null, $elaboradoPor);
        
        $_SESSION['wizard']['informe_id'] = $informeId;

        header("Location: index.php?action=paso4");
        exit;
    }
    
    public static function guardarPiezas(): void
    {
        header('Content-Type: application/json');
        
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            echo json_encode(['success' => false, 'error' => 'Método no permitido']);
            exit;
        }
        
        $informeId = (int) ($_POST['informe_id'] ?? 0);
        $piezasJson = $_POST['piezas_json'] ?? '[]';
        
        if (!$informeId) {
            echo json_encode(['success' => false, 'error' => 'ID de informe inválido']);
            exit;
        }
        
        $piezas = json_decode($piezasJson, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            echo json_encode(['success' => false, 'error' => 'JSON inválido']);
            exit;
        }
        
        Informe::actualizarPiezas($informeId, $piezasJson);
        
        echo json_encode(['success' => true, 'piezas' => count($piezas)]);
        exit;
    }
    
    public static function finalizar(): void
    {
        $informeId = $_SESSION['wizard']['informe_id'] ?? 0;
        
        if (!$informeId) {
            header('Location: index.php');
            exit;
        }
        
        $informe = Informe::findById($informeId);
        $beneficiario = $_SESSION['wizard']['beneficiario'] ?? null;
        
        if (!$informe || !$beneficiario) {
            header('Location: index.php?action=paso1');
            exit;
        }
        
        if (!empty($_POST['piezas_json'])) {
            Informe::actualizarPiezas($informeId, $_POST['piezas_json']);
        }
        
        $pdfPath = PdfHelper::generar($informe, $beneficiario);
        Informe::actualizarRutaPdf($informeId, $pdfPath);
        
        unset($_SESSION['wizard']);
        
        header("Location: index.php?action=exito&id={$informeId}");
        exit;
    }

    public static function exito(): void
    {
        $id      = (int) ($_GET['id'] ?? 0);
        $informe = Informe::findById($id);

        if (!$informe) {
            header('Location: index.php');
            exit;
        }

        renderLayout('exito', [
            'title'   => 'Informe Guardado',
            'informe' => $informe,
        ]);
    }

    public static function verPdf(): void
    {
        $id      = (int) ($_GET['id'] ?? 0);
        $informe = Informe::findById($id);

        if (!$informe || !$informe['pdf_ruta']) {
            http_response_code(404);
            echo "PDF no encontrado.";
            exit;
        }

        $pdfFile = __DIR__ . '/../../' . $informe['pdf_ruta'];
        if (!file_exists($pdfFile)) {
            http_response_code(404);
            echo "El archivo PDF no está disponible en el servidor.";
            exit;
        }

        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="' . basename($pdfFile) . '"');
        header('Content-Length: ' . filesize($pdfFile));
        readfile($pdfFile);
        exit;
    }
}
