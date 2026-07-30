<?php

require_once __DIR__ . '/../views/layout.php';

class BusquedaController
{
    public static function index(): void
    {
        renderLayout('buscar', [
            'title' => 'Buscar Informes',
        ]);
    }

    public static function apiBeneficiarios(): void
    {
        $q = trim($_GET['q'] ?? '');
        if (mb_strlen($q) < 2) {
            header('Content-Type: application/json');
            echo json_encode([]);
            exit;
        }

        $resultados = Beneficiario::buscar($q);
        header('Content-Type: application/json');
        echo json_encode($resultados);
        exit;
    }

    public static function apiBuscarInformes(): void
    {
        $q = trim($_GET['q'] ?? '');
        if (mb_strlen($q) < 2) {
            header('Content-Type: application/json');
            echo json_encode([]);
            exit;
        }

        $resultados = Informe::buscar($q);
        header('Content-Type: application/json');
        echo json_encode($resultados);
        exit;
    }
}