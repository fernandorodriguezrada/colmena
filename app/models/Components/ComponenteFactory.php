<?php

require_once __DIR__ . '/ComponenteInterface.php';
require_once __DIR__ . '/TextoComponente.php';
require_once __DIR__ . '/TablaComponente.php';
require_once __DIR__ . '/GraficoComponente.php';
require_once __DIR__ . '/ImagenComponente.php';
require_once __DIR__ . '/CollageComponente.php';
require_once __DIR__ . '/FirmaComponente.php';

class ComponenteFactory
{
    private static array $map = [
        'text' => TextoComponente::class,
        'table' => TablaComponente::class,
        'chart' => GraficoComponente::class,
        'image' => ImagenComponente::class,
        'collage' => CollageComponente::class,
        'firma' => FirmaComponente::class,
    ];
    
    public static function createFromArray(array $data): ?ComponenteInterface
    {
        $type = $data['type'] ?? null;
        if (!isset(self::$map[$type])) {
            return null;
        }
        
        $class = self::$map[$type];
        return $class::fromArray($data);
    }
    
    public static function create(string $type, array $config = []): ?ComponenteInterface
    {
        if (!isset(self::$map[$type])) {
            return null;
        }
        
        $class = self::$map[$type];
        return $class::fromArray($config);
    }
    
    public static function renderComponents(array $components): string
    {
        $html = '';
        foreach ($components as $componentData) {
            $componente = self::createFromArray($componentData);
            if ($componente) {
                $posX = $componentData['posX'] ?? 5;
                $posY = $componentData['posY'] ?? null;
                $width = $componentData['width'] ?? 90;
                $style = "position: absolute; left: {$posX}%; width: {$width}%;";
                if ($posY !== null) {
                    $style .= " top: {$posY}%;";
                }
                $html .= '<div class="componente-wrapper" style="' . $style . '">';
                $html .= $componente->render();
                $html .= '</div>';
            }
        }
        return $html;
    }
    
    public static function getSupportedTypes(): array
    {
        return array_keys(self::$map);
    }
}