<?php

require_once __DIR__ . '/../views/layout.php';
require_once __DIR__ . '/../helpers/pdf_helper.php';

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

        $beneficiario = Beneficiario::findById($beneficiarioId);
        $informe      = Informe::findById($informeId);

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
