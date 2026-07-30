<?php
require_once __DIR__ . '/../database.php';
class Informe
{
    public static function crear(int $beneficiarioId, int $tipoInformeId, string $motivo, string $observaciones, ?string $tipoPersonalizado = null, ?string $elaboradoPor = null): int
    {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO informes (beneficiario_id, tipo_informe_id, tipo_personalizado, motivo, observaciones, elaborado_por) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$beneficiarioId, $tipoInformeId, $tipoPersonalizado, trim($motivo), trim($observaciones), $elaboradoPor]);
        return (int) $db->lastInsertId();
    }
    public static function actualizarRutaPdf(int $id, string $ruta): void
    {
        $db = getDB();
        $stmt = $db->prepare("UPDATE informes SET pdf_ruta = ? WHERE id = ?");
        $stmt->execute([$ruta, $id]);
    }
    public static function findById(int $id): ?array
    {
        $db = getDB();
        $stmt = $db->prepare("SELECT i.*, b.nombre AS beneficiario_nombre, b.cedula, t.nombre AS tipo_nombre, t.icono FROM informes i JOIN beneficiarios b ON i.beneficiario_id = b.id JOIN tipos_informe t ON i.tipo_informe_id = t.id WHERE i.id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }
    public static function buscarPorBeneficiario(int $beneficiarioId): array
    {
        $db = getDB();
        $stmt = $db->prepare("SELECT i.*, t.nombre AS tipo_nombre, t.icono FROM informes i JOIN tipos_informe t ON i.tipo_informe_id = t.id WHERE i.beneficiario_id = ? ORDER BY i.fecha_creacion DESC");
        $stmt->execute([$beneficiarioId]);
        return $stmt->fetchAll();
    }
    public static function buscar(string $q): array
    {
        $db = getDB();
        $stmt = $db->prepare("SELECT i.id, i.motivo, i.fecha_creacion, i.pdf_ruta, b.nombre AS beneficiario_nombre, b.cedula, t.nombre AS tipo_nombre FROM informes i JOIN beneficiarios b ON i.beneficiario_id = b.id JOIN tipos_informe t ON i.tipo_informe_id = t.id WHERE b.nombre LIKE ? OR b.cedula LIKE ? OR i.motivo LIKE ? ORDER BY i.fecha_creacion DESC LIMIT 20");
        $like = "%{$q}%";
        $stmt->execute([$like, $like, $like]);
        return $stmt->fetchAll();
    }
    public static function tipos(): array
    {
        $db = getDB();
        return $db->query("SELECT * FROM tipos_informe")->fetchAll();
    }
}
