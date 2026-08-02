<?php
// Partial reutilizable: botón de información que abre una burbuja con los datos
// del beneficiario y del informe. Variables opcionales:
//   $beneficiario (requerido), $tipoPersonalizado, $tipoNombre, $piezasCount, $infoExtra
$nombreB  = $beneficiario['nombre'] ?? '';
$cedulaB  = trim($beneficiario['cedula'] ?? '');
$tipoTxt  = ($tipoPersonalizado ?? '') ?: ($tipoNombre ?? '');
$infoItems = [];
if ($nombreB !== '') {
    $infoItems[] = [
        'icono' => 'fa-user',
        'label' => 'Beneficiario',
        'valor' => $nombreB . ($cedulaB !== '' ? ' (' . $cedulaB . ')' : ''),
    ];
}
if ($tipoTxt !== '') {
    $infoItems[] = ['icono' => 'fa-file-lines', 'label' => 'Tipo de Informe', 'valor' => $tipoTxt];
}
if (isset($piezasCount)) {
    $infoItems[] = [
        'icono' => 'fa-puzzle-piece',
        'label' => 'Piezas',
        'valor' => $piezasCount . ' pieza' . ($piezasCount === 1 ? '' : 's'),
    ];
}
if (!empty($infoExtra)) {
    $infoItems[] = $infoExtra;
}
?>
<span class="relative inline-block info-burbuja-wrap">
    <button type="button"
            class="info-burbuja-btn w-9 h-9 rounded-full bg-verdeOscuro text-white shadow-md hover:bg-green-800 hover:shadow-lg transition flex items-center justify-center"
            title="Información del beneficiario"
            aria-label="Información del beneficiario">
        <i class="fa-solid fa-circle-info text-lg"></i>
    </button>
    <span class="info-burbuja absolute right-0 top-full mt-2 z-40 w-80 max-w-[80vw] bg-white rounded-2xl shadow-xl border border-gray-200 p-4">
        <p class="font-bold text-verdeOscuro mb-3 text-sm border-b border-gray-100 pb-2">
            <i class="fa-solid fa-circle-info mr-1 text-naranja"></i>Información del informe
        </p>
        <div class="space-y-2.5">
            <?php foreach ($infoItems as $item): ?>
            <div class="flex items-start gap-3">
                <i class="fa-solid <?= htmlspecialchars($item['icono']) ?> text-naranja mt-0.5 w-4 text-center"></i>
                <div class="min-w-0">
                    <p class="text-[10px] text-gray-400 uppercase tracking-wider leading-tight"><?= htmlspecialchars($item['label']) ?></p>
                    <p class="text-sm font-semibold text-gris break-words"><?= htmlspecialchars($item['valor']) ?></p>
                </div>
            </div>
            <?php endforeach; ?>
            <div class="flex items-start gap-3">
                <i class="fa-solid fa-calendar-day text-naranja mt-0.5 w-4 text-center"></i>
                <div class="min-w-0">
                    <p class="text-[10px] text-gray-400 uppercase tracking-wider leading-tight">Fecha</p>
                    <p class="text-sm font-semibold text-gris info-burbuja-fecha">—</p>
                </div>
            </div>
        </div>
    </span>
</span>
<style>
    .info-burbuja {
        visibility: hidden;
        opacity: 0;
        transform: translateY(6px);
        transition: opacity .18s ease, transform .18s ease, visibility .18s;
        pointer-events: none;
    }
    .info-burbuja.open {
        visibility: visible;
        opacity: 1;
        transform: translateY(0);
        pointer-events: auto;
    }
</style>
<script>
(function () {
    if (window.__infoBurbujaInit) return;
    window.__infoBurbujaInit = true;
    function closeAll() {
        document.querySelectorAll('.info-burbuja').forEach(function (x) { x.classList.remove('open'); });
    }
    document.addEventListener('click', function (e) {
        var wrap = e.target.closest('.info-burbuja-wrap');
        if (wrap) {
            e.stopPropagation();
            var b = wrap.querySelector('.info-burbuja');
            if (b) {
                var wasOpen = b.classList.contains('open');
                closeAll();
                if (!wasOpen) b.classList.add('open');
            }
            return;
        }
        closeAll();
    });
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') closeAll();
    });
    var f = document.querySelector('.info-burbuja-fecha');
    if (f) f.textContent = new Date().toLocaleDateString('es-VE', { year: 'numeric', month: 'long', day: 'numeric' });
})();
</script>
