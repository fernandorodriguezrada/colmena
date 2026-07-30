<?php

require_once __DIR__ . '/../database.php';

class Beneficiario
{
    public static function buscar(string $q): array
    {
        $db   = getDB();
        $stmt = $db->prepare(
            "SELECT id, nombre, cedula FROM beneficiarios
             WHERE nombre LIKE ? OR cedula LIKE ?
             ORDER BY nombre LIMIT 10"
        );
        $like = "%{$q}%";
        $stmt->execute([$like, $like]);
        return $stmt->fetchAll();
    }

    public static function findById(int $id): ?array
    {
        $db   = getDB();
        $stmt = $db->prepare("SELECT * FROM beneficiarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    public static function crear(string $nombre, string $cedula): int
    {
        $db   = getDB();
        $stmt = $db->prepare(
            "INSERT INTO beneficiarios (nombre, cedula) VALUES (?, ?)"
        );
        $stmt->execute([trim($nombre), trim($cedula)]);
        return (int) $db->lastInsertId();
    }
}