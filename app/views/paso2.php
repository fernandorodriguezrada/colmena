<div class="pantalla">
    <a href="index.php?action=paso1" class="text-naranja font-bold mb-4 inline-block"><i class="fa-solid fa-arrow-left"></i> Volver al Paso 1</a>
    <div class="bg-white p-8 rounded-2xl shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-verdeOscuro">Paso 2: ¿Qué tipo de informe es?</h2>
            <span class="bg-naranja text-white px-4 py-1 rounded-full font-bold">2 de 3</span>
        </div>

        <div class="bg-crema p-4 rounded-lg border border-gray-200 mb-6">
            <p class="text-lg">
                <strong>Beneficiario:</strong>
                <span class="text-verdeOscuro font-bold"><?= htmlspecialchars($beneficiario['nombre']) ?></span>
                <?php if ($beneficiario['cedula']): ?>
                    <span class="text-gray-500 ml-2">(<?= htmlspecialchars($beneficiario['cedula']) ?>)</span>
                <?php endif; ?>
            </p>
        </div>

        <form method="POST" action="index.php?action=paso3" id="form-paso2">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <?php foreach ($tipos as $tipo): ?>
                    <?php if ($tipo['id'] != 4): ?>
                    <button type="submit" name="tipo_informe_id" value="<?= $tipo['id'] ?>"
                            class="bg-crema border-2 border-verdeClaro p-6 rounded-xl hover:bg-verdeClaro hover:text-white transition group text-center flex flex-col items-center gap-2">
                        <i class="fa-solid <?= htmlspecialchars($tipo['icono']) ?> text-4xl text-naranja group-hover:text-white"></i>
                        <span class="text-lg font-bold"><?= htmlspecialchars($tipo['nombre']) ?></span>
                    </button>
                    <?php endif; ?>
                <?php endforeach; ?>

                <button type="button" id="btn-personalizado"
                        class="bg-crema border-2 border-dashed border-naranja p-6 rounded-xl hover:bg-naranja hover:text-white transition group text-center flex flex-col items-center gap-2">
                    <i class="fa-solid fa-pen text-4xl text-naranja group-hover:text-white"></i>
                    <span class="text-lg font-bold">Otro tipo de informe</span>
                </button>
            </div>

            <div id="campo-personalizado" class="hidden mb-6 p-4 bg-gray-50 rounded-xl border border-gray-200">
                <label class="block text-lg font-bold mb-2">Escribe el nombre del tipo de informe:</label>
                <input type="text" name="tipo_personalizado" id="input-personalizado" placeholder="Ej: Informe de Contingencia"
                       class="w-full p-3 text-lg border-2 border-naranja rounded-xl focus:outline-none focus:ring-4 focus:ring-orange-200">
                <button type="submit" name="tipo_informe_id" value="4"
                        class="mt-4 w-full bg-naranja hover:bg-orange-600 text-white text-xl font-bold py-3 rounded-xl shadow-md transition">
                    Continuar <i class="fa-solid fa-arrow-right ml-2"></i>
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    document.getElementById('btn-personalizado').addEventListener('click', function() {
        document.getElementById('campo-personalizado').classList.remove('hidden');
        document.getElementById('input-personalizado').focus();
    });
</script>