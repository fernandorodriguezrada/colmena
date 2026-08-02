<?php

require_once __DIR__ . '/models/Beneficiario.php';
require_once __DIR__ . '/models/Informe.php';
require_once __DIR__ . '/models/Plantilla.php';
require_once __DIR__ . '/controllers/InicioController.php';
require_once __DIR__ . '/controllers/InformeController.php';
require_once __DIR__ . '/controllers/BusquedaController.php';

function routeRequest(): void
{
    $action = str_replace('.php', '', $_GET['action'] ?? 'inicio');

    switch ($action) {
        case 'inicio':
            InicioController::index();
            break;
        case 'paso1':
            InformeController::paso1();
            break;
        case 'paso2':
            InformeController::paso2();
            break;
        case 'paso3':
            InformeController::paso3();
            break;
        case 'paso4':
            InformeController::paso4();
            break;
        case 'paso5':
            InformeController::paso5();
            break;
        case 'guardar_informe':
            InformeController::guardar();
            break;
        case 'guardar_piezas':
            InformeController::guardarPiezas();
            break;
        case 'guardar_plantilla':
            InformeController::guardarPlantilla();
            break;
        case 'eliminar_plantilla':
            InformeController::eliminarPlantilla();
            break;
        case 'finalizar':
            InformeController::finalizar();
            break;
        case 'exito':
            InformeController::exito();
            break;
        case 'buscar':
            BusquedaController::index();
            break;
        case 'api_beneficiarios':
            BusquedaController::apiBeneficiarios();
            break;
        case 'api_buscar_informes':
            BusquedaController::apiBuscarInformes();
            break;
        case 'ver_pdf':
            InformeController::verPdf();
            break;
        default:
            http_response_code(404);
            echo "<h1 class='text-center mt-20 text-4xl text-gris'>404 — Página no encontrada</h1>";
            echo "<p class='text-center mt-4'><a href='index.php' class='text-naranja font-bold'>Volver al inicio</a></p>";
            break;
    }
}