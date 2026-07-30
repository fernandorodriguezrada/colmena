<?php
require_once "/var/www/html/app/database.php";
require_once "/var/www/html/app/models/Informe.php";
$i = \Informe::findById(66);
echo "type: " . gettype($i["piezas"]) . "\n";
echo "val: " . $i["piezas"] . "\n";
