<?php

require_once __DIR__ . '/../views/layout.php';

class InicioController
{
    public static function index(): void
    {
        renderLayout('inicio', [
            'title' => 'Inicio — La Colmena de la Vida',
        ]);
    }
}