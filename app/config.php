<?php

define('DB_HOST', getenv('DDEV_DB_HOST') ?: 'db');
define('DB_NAME', getenv('DDEV_DB_NAME') ?: 'db');
define('DB_USER', getenv('DDEV_DB_USER') ?: 'db');
define('DB_PASS', getenv('DDEV_DB_PASSWORD') ?: 'db');

define('PDF_DIR', __DIR__ . '/../pdf');
define('SITE_NAME', 'La Colmena de la Vida');