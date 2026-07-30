<?php

session_start();
require_once __DIR__ . '/app/database.php';
require_once __DIR__ . '/app/router.php';

routeRequest();