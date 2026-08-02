<?php
require_once __DIR__ . '/../database.php';

class Plantilla
{
    private static function defaultsSeed(string $name): string
    {
        $seeds = [
            'social' => json_encode([
                ['type' => 'text', 'layout' => 'inline', 'content' => '<p>El presente informe corresponde al seguimiento social realizado al beneficiario durante el periodo señalado. Durante la visita se observaron las condiciones del entorno familiar y comunitario, así como la canalización ante las instituciones correspondientes.</p>'],
                ['type' => 'table', 'layout' => 'inline', 'headers' => 'Actividad,Fecha,Observaciones',
                    'rows' => "Visita domiciliaria,Semana 1,Revisión general\nEntrega de orientación,Semana 2,Buen estado\nSeguimiento institucional,Semana 3,En proceso"],
                ['type' => 'firma', 'layout' => 'inline', 'config' => ['nombre' => '', 'titulo' => 'Trabajador Social']],
            ]),
            'medica' => json_encode([
                ['type' => 'text', 'layout' => 'inline', 'content' => '<p>Informe de evaluación médica del paciente. Se describen los hallazgos clínicos relevantes, signos vitales y las recomendaciones terapéuticas a seguir.</p>'],
                ['type' => 'table', 'layout' => 'inline', 'headers' => 'Indicador,Resultado,Ref.',
                    'rows' => 'Presión arterial,120/80 mmHg,Normal\nFrecuencia cardiaca,72 lpm,Normal\nTemperatura,36.8 °C,Normal'],
                ['type' => 'firma', 'layout' => 'inline', 'config' => ['nombre' => '', 'titulo' => 'Médico Evaluador']],
            ]),
            'incidencia' => json_encode([
                ['type' => 'text', 'layout' => 'inline', 'content' => '<p>Se reporta la incidencia ocurrida, describiendo el contexto, las partes involucradas y las acciones tomadas para su atención y prevención futura.</p>'],
                ['type' => 'table', 'layout' => 'inline', 'headers' => 'Fecha del hecho,Hora,Detalle',
                    'rows' => 'dd/mm/aaaa,00:00,Descripción del incidente\ndd/mm/aaaa,00:00,Acciones realizadas'],
                ['type' => 'firma', 'layout' => 'inline', 'config' => ['nombre' => '', 'titulo' => 'Responsable']],
            ]),
        ];
        return $seeds[$name] ?? $seeds['social'];
    }

    public static function defaults(): array
    {
        return [
            [
                'id' => -1, 'nombre' => 'Seguimiento Social', 'icono' => 'fa-users',
                'color' => 'bg-verdeClaro|border-green-700', 'scope' => 'default',
                'tipo_informe_id' => 1, 'piezas_json' => self::defaultsSeed('social'),
            ],
            [
                'id' => -2, 'nombre' => 'Evaluación Médica', 'icono' => 'fa-heart-pulse',
                'color' => 'bg-azul|border-blue-800', 'scope' => 'default',
                'tipo_informe_id' => 2, 'piezas_json' => self::defaultsSeed('medica'),
            ],
            [
                'id' => -3, 'nombre' => 'Reporte de Incidencia', 'icono' => 'fa-triangle-exclamation',
                'color' => 'bg-naranja|border-orange-700', 'scope' => 'default',
                'tipo_informe_id' => 3, 'piezas_json' => self::defaultsSeed('incidencia'),
            ],
        ];
    }

    public static function listar(): array
    {
        $db = getDB();
        $rows = $db->query("SELECT * FROM plantillas ORDER BY created_at DESC")->fetchAll();
        return array_merge(self::defaults(), $rows);
    }

    public static function findById(int $id): ?array
    {
        foreach (self::defaults() as $d) {
            if ((int) $d['id'] === $id) {
                return $d;
            }
        }
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM plantillas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function crear(string $nombre, string $icono, string $color, string $piezasJson, ?int $tipoInformeId, string $scope = 'private'): int
    {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO plantillas (nombre, icono, color, scope, tipo_informe_id, piezas_json) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([trim($nombre), $icono, $color, $scope, $tipoInformeId ?: null, $piezasJson]);
        return (int) $db->lastInsertId();
    }

    public static function eliminar(int $id): bool
    {
        $p = self::findById($id);
        if (!$p || in_array($p['scope'], ['default', 'global'], true)) {
            return false;
        }
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM plantillas WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount() > 0;
    }
}