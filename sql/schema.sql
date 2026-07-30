CREATE TABLE IF NOT EXISTS beneficiarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    cedula VARCHAR(20) DEFAULT '',
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_nombre (nombre),
    INDEX idx_cedula (cedula)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE IF NOT EXISTS tipos_informe (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    icono VARCHAR(50) NOT NULL DEFAULT 'fa-file'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO tipos_informe (nombre, icono) VALUES
    ('Seguimiento Social', 'fa-users'),
    ('Evaluación Médica', 'fa-heart-pulse'),
    ('Reporte de Incidencia', 'fa-triangle-exclamation');

CREATE TABLE IF NOT EXISTS informes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    beneficiario_id INT NOT NULL,
    tipo_informe_id INT NOT NULL,
    tipo_personalizado VARCHAR(255) DEFAULT NULL,
    motivo VARCHAR(500) NOT NULL,
    observaciones TEXT NOT NULL,
    piezas_json LONGTEXT DEFAULT NULL,
    pdf_ruta VARCHAR(500) DEFAULT NULL,
    elaborado_por VARCHAR(255) DEFAULT NULL,
    fecha_creacion DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (beneficiario_id) REFERENCES beneficiarios(id) ON DELETE CASCADE,
    FOREIGN KEY (tipo_informe_id) REFERENCES tipos_informe(id),
    INDEX idx_beneficiario (beneficiario_id),
    INDEX idx_fecha (fecha_creacion)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;