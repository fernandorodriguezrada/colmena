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

echo "Verificando tabla plantillas...\n";

$db->exec("CREATE TABLE IF NOT EXISTS plantillas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(150) NOT NULL,
    icono VARCHAR(60) NOT NULL DEFAULT 'fa-file',
    color VARCHAR(120) NOT NULL DEFAULT 'bg-naranja|border-orange-700',
    scope ENUM('default','global','private') NOT NULL DEFAULT 'private',
    tipo_informe_id INT NULL,
    piezas_json LONGTEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (tipo_informe_id) REFERENCES tipos_informe(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci");
echo "- tabla plantillas verificada\n";

echo "Listo.\n";