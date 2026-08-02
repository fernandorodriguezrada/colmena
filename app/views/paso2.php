<div class="pantalla h-full flex flex-col min-h-0">
    <a href="index.php?action=paso1" class="text-naranja font-bold mb-4 inline-block shrink-0"><i class="fa-solid fa-arrow-left"></i> Volver al Paso 1</a>
    <div class="tarjeta-compacta bg-white p-8 rounded-2xl shadow-lg flex-1 min-h-0 overflow-y-auto flex flex-col">
        <div class="encabezado-paso flex justify-between items-center mb-6">
            <h2 class="titulo-paso text-3xl font-bold text-verdeOscuro">Paso 2: ¿Qué tipo de informe es?</h2>
            <div class="flex items-center gap-3 shrink-0">
                <?php require __DIR__ . '/partials/beneficiario_info.php'; ?>
                <span class="bg-naranja text-white px-4 py-1 rounded-full font-bold">2 of 5</span>
            </div>
        </div>

        <form method="POST" action="index.php?action=paso3" id="form-paso2" class="flex-1 flex flex-col">
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
