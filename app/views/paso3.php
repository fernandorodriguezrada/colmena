<div class="pantalla">
    <a href="index.php?action=paso2" class="text-naranja font-bold mb-4 inline-block"><i class="fa-solid fa-arrow-left"></i> Volver al Paso 2</a>
    <div class="bg-white p-8 rounded-2xl shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-verdeOscuro">Paso 3: Detalles del Informe</h2>
            <span class="bg-naranja text-white px-4 py-1 rounded-full font-bold">3 de 3</span>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-50 border border-red-300 text-rojo p-4 rounded-xl mb-6 flex items-center gap-3">
                <i class="fa-solid fa-circle-exclamation text-xl"></i>
                <span>Todos los campos son obligatorios. Por favor, completa la información.</span>
            </div>
        <?php endif; ?>

        <div class="mb-6 bg-crema p-4 rounded-lg border border-gray-200">
            <p class="text-lg">
                <strong>Beneficiario:</strong>
                <span class="text-verdeOscuro font-bold"><?= htmlspecialchars($beneficiario['nombre']) ?></span>
            </p>
            <?php if ($tipoPersonalizado): ?>
            <p class="text-lg">
                <strong>Tipo de Informe:</strong>
                <span class="text-naranja font-bold"><?= htmlspecialchars($tipoPersonalizado) ?></span>
            </p>
            <?php endif; ?>
            <p class="text-lg"><strong>Fecha:</strong> <span id="fechaActual"></span></p>
        </div>

        <form method="POST" action="index.php?action=guardar_informe">
            <input type="hidden" name="beneficiario_id" value="<?= $beneficiario['id'] ?>">
            <input type="hidden" name="tipo_informe_id" value="<?= $tipoId ?>">
            <input type="hidden" name="tipo_personalizado" value="<?= htmlspecialchars($tipoPersonalizado) ?>">

            <label class="block text-xl mb-2 font-bold">Elaborado por:</label>
            <input type="text" name="elaborado_por" value="Dirección y servicio comunitario IUTECP Guatire." required
                   class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl mb-6 focus:outline-none focus:border-verdeOscuro">

            <label class="block text-xl mb-2 font-bold">Motivo principal:</label>
            <input type="text" name="motivo" placeholder="Resumen corto del motivo..." required
                   class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl mb-6 focus:outline-none focus:border-verdeOscuro">

            <label class="block text-xl mb-2 font-bold">Observaciones detalladas:</label>
            <textarea name="observaciones" rows="5" placeholder="Escribe aquí los detalles del seguimiento..." required
                      class="w-full p-4 text-lg border-2 border-gray-300 rounded-xl mb-8 resize-none focus:outline-none focus:border-verdeOscuro"></textarea>

            <button type="submit"
                    class="w-full bg-verdeOscuro hover:bg-green-800 text-white text-2xl font-bold py-4 rounded-xl shadow-md transition flex justify-center items-center gap-3 border-b-8 border-green-900">
                <i class="fa-solid fa-print"></i> Guardar y Generar PDF
            </button>
        </form>
    </div>
</div>

<script>
    document.getElementById('fechaActual').textContent =
        new Date().toLocaleDateString('es-VE', { year: 'numeric', month: 'long', day: 'numeric' });
</script>
