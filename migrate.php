<?php

require_once __DIR__ . '/app/database.php';

$db = getDB();

echo "Verificando estructura de la tabla informes...\n";

$columns = $db->query("SHOW COLUMNS FROM informes")->fetchAll(PDO::FETCH_COLUMN);

$hasPiezasJson = in_array('piezas_json', $columns);
$hasElaboradoPor = in_array('elaborado_por', $columns);

if (!$hasPiezasJson || !$hasElaboradoPor) {
    echo "Agregando columnas faltantes...\n";
    
    if (!$hasPiezasJson) {
        $db->exec("ALTER TABLE informes ADD COLUMN piezas_json TEXT DEFAULT NULL AFTER observaciones");
        echo "- piezas_json agregada\n";
    }
    
    if (!$hasElaboradoPor) {
        $db->exec("ALTER TABLE informes ADD COLUMN elaborado_por VARCHAR(255) DEFAULT NULL AFTER piezas_json");
        echo "- elaborado_por agregada\n";
    }
    
    echo "Migración completada.\n";
} else {
    echo "La tabla ya tiene las columnas necesarias.\n";
}

echo "Listo.\n";