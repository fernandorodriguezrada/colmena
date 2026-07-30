<?php

function renderLayout(string $view, array $data = []): void
{
    extract($data);

    require __DIR__ . '/layout_header.php';
    require __DIR__ . '/' . $view . '.php';
    require __DIR__ . '/layout_footer.php';
}