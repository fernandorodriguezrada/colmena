<div class="pantalla h-full flex flex-col min-h-0">
    <a href="index.php?action=paso1" class="text-naranja font-bold mb-4 inline-block shrink-0"><i class="fa-solid fa-arrow-left"></i> Volver al Paso 1</a>
    <div class="tarjeta-compacta bg-white p-8 rounded-2xl shadow-lg flex-1 min-h-0 overflow-y-auto flex flex-col">
        <div class="encabezado-paso flex justify-between items-center mb-6">
            <h2 class="titulo-paso text-3xl font-bold text-verdeOscuro">Paso 2: ¿Qué tipo de informe es?</h2>
            <div class="flex items-center gap-3 shrink-0">
                <?php require __DIR__ . '/partials/beneficiario_info.php'; ?>
                <button type="button" id="btn-editar-plantillas" class="bg-gray-100 border border-gray-300 text-gris px-3 py-2 rounded-lg font-bold text-sm hover:bg-gray-200 transition flex items-center gap-2" title="Editar/Eliminar plantillas">
                    <i class="fa-solid fa-pen"></i> Editar
                </button>
                <span class="bg-naranja text-white px-4 py-1 rounded-full font-bold">2 of 5</span>
            </div>
        </div>

        <form method="POST" action="index.php?action=paso3" id="form-paso2" class="flex-1 flex flex-col">
            <input type="hidden" name="tipo_informe_id" id="plantilla-hidden-tipo" value="0">
            <input type="hidden" name="plantilla_id" id="plantilla-hidden-id" value="0">
            <?php
                $piezaColores = [
                    ['bg' => 'bg-verdeClaro', 'borde' => 'border-green-700'],
                    ['bg' => 'bg-azul',       'borde' => 'border-blue-800'],
                    ['bg' => 'bg-morado',     'borde' => 'border-purple-800'],
                    ['bg' => 'bg-rosa',       'borde' => 'border-pink-700'],
                    ['bg' => 'bg-naranja',    'borde' => 'border-orange-700'],
                ];
                $idx = 0;
            ?>
            <div class="grid grid-cols-2 md:grid-cols-5 gap-3 mb-6">
                <?php foreach ($tipos as $tipo): ?>
                    <?php if ($tipo['id'] != 4): ?>
                        <?php $c = $piezaColores[$idx % count($piezaColores)]; $idx++; ?>
                        <button type="submit" name="tipo_informe_id" value="<?= $tipo['id'] ?>"
                                class="w-full <?= $c['bg'] ?> border-b-4 <?= $c['borde'] ?> shadow-md p-4 rounded-xl text-white hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0.5 transition-all duration-150 flex flex-col items-center">
                            <i class="fa-solid <?= htmlspecialchars($tipo['icono']) ?> text-3xl text-crema opacity-80" style="text-shadow: 0 2px 3px rgba(0,0,0,0.25);"></i>
                            <span class="text-sm font-bold mt-1.5"><?= htmlspecialchars($tipo['nombre']) ?></span>
                        </button>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <div id="seccion-plantillas" class="mb-6">
                <h3 class="text-lg font-bold text-verdeOscuro mb-3 flex items-center gap-2">
                    <i class="fa-solid fa-file-circle-plus text-naranja"></i> Plantillas guardadas
                </h3>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-3" id="plantillas-grid">
                    <?php foreach ($plantillas as $p):
                        [$bg, $borde] = explode('|', $p['color']);
                        $esDefault = $p['scope'] === 'default';
                        $esGlobal  = $p['scope'] === 'global';
                        $deletable = !$esDefault && !$esGlobal;
                    ?>
                        <button type="button" class="plantilla-card relative w-full h-24 rounded-xl shadow-md border-b-4 flex flex-col items-center justify-center text-white transition hover:-translate-y-0.5 <?= $bg ?> border-<?= str_replace('border-', '', $borde) ?>"
                                data-id="<?= (int)$p['id'] ?>"
                                data-tipo="<?= (int)($p['tipo_informe_id'] ?? 4) ?>"
                                data-deletable="<?= $deletable ? '1' : '0' ?>">
                            <i class="fa-solid <?= htmlspecialchars($p['icono']) ?> text-3xl text-crema opacity-80"></i>
                            <span class="text-sm font-bold mt-1.5 text-center px-2"><?= htmlspecialchars($p['nombre']) ?></span>
                            <?php if ($deletable): ?>
                            <button type="button" class="plantilla-delete absolute top-1 right-1 w-6 h-6 rounded-full bg-red-500/80 text-white text-xs opacity-0 hover:opacity-100 transition"
                                    data-id="<?= (int)$p['id'] ?>" title="Eliminar">&times;</button>
                            <?php endif; ?>
                        </button>
                    <?php endforeach; ?>
                </div>
                <?php if (empty($plantillas)): ?>
                    <p class="text-gray-400 text-sm text-center py-4">No hay plantillas aún. Crea una en el Paso 4.</p>
                <?php endif; ?>
            </div>

            <div id="campo-personalizado" class="mt-auto mb-0 pt-4 p-4 bg-crema rounded-xl border-2 border-dashed border-naranja">
                <p class="text-lg font-bold text-verdeOscuro mb-2">
                    <i class="fa-solid fa-pen mr-2 text-naranja"></i>Informe personalizado
                </p>
                <label class="block text-sm font-semibold text-gray-600 mb-1">Escribe el nombre del tipo de informe:</label>
                <input type="text" name="tipo_personalizado" id="input-personalizado" placeholder="Ej: Informe de Contingencia"
                       class="w-full p-3 text-lg border-2 border-naranja rounded-xl focus:outline-none focus:ring-4 focus:ring-orange-200 mb-3">
                <button type="submit" name="tipo_informe_id" value="4"
                        class="w-full bg-naranja hover:bg-orange-600 text-white text-xl font-bold py-3 rounded-xl shadow-md transition">
                    Continuar con informe personalizado <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
document.querySelectorAll('.plantilla-card').forEach(function(card) {
    card.addEventListener('click', function(e) {
        if (e.target.closest('.plantilla-delete')) return;
        document.getElementById('plantilla-hidden-id').value = this.dataset.id;
        document.getElementById('plantilla-hidden-tipo').value = this.dataset.tipo;
        document.getElementById('form-paso2').submit();
    });
});

var editMode = false;
document.getElementById('btn-editar-plantillas').addEventListener('click', function() {
    editMode = !editMode;
    var btn = this;
    btn.classList.toggle('bg-naranja', editMode);
    btn.classList.toggle('text-white', editMode);
    btn.classList.toggle('border-naranja', editMode);
    btn.classList.toggle('bg-gray-100', !editMode);
    btn.classList.toggle('text-gris', !editMode);
    btn.classList.toggle('border-gray-300', !editMode);
    btn.innerHTML = editMode
        ? '<i class="fa-solid fa-check"></i> Listo'
        : '<i class="fa-solid fa-pen"></i> Editar';
    document.querySelectorAll('.plantilla-delete').forEach(function(d) {
        d.style.opacity = editMode ? '1' : '0';
        d.style.pointerEvents = editMode ? 'auto' : 'none';
    });
});

document.querySelectorAll('.plantilla-delete').forEach(function(d) {
    d.addEventListener('click', function(e) {
        e.stopPropagation();
        if (!confirm('¿Eliminar esta plantilla?')) return;
        var id = this.dataset.id;
        fetch('index.php?action=eliminar_plantilla', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'id=' + encodeURIComponent(id)
        })
        .then(function(r) { return r.json(); })
        .then(function(res) {
            if (res.success) {
                var card = document.querySelector('.plantilla-card[data-id="' + id + '"]');
                if (card) card.remove();
            } else {
                alert('Error: ' + (res.error || 'no permitido'));
            }
        });
    });
});
</script>
