<div class="pantalla h-full flex flex-col min-h-0">
    <a href="index.php?action=paso2" class="text-naranja font-bold mb-4 inline-block shrink-0"><i class="fa-solid fa-arrow-left"></i> Volver al Paso 2</a>
    <div class="tarjeta-compacta bg-white p-8 rounded-2xl shadow-lg flex-1 min-h-0 overflow-y-auto flex flex-col">
        <div class="encabezado-paso flex justify-between items-center mb-6 shrink-0">
            <h2 class="titulo-paso text-3xl font-bold text-verdeOscuro">Paso 3: Detalles del Informe</h2>
            <div class="flex items-center gap-3 shrink-0">
                <?php require __DIR__ . '/partials/beneficiario_info.php'; ?>
                <span class="bg-naranja text-white px-4 py-1 rounded-full font-bold">3 of 5</span>
            </div>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-50 border border-red-300 text-rojo p-4 rounded-xl mb-6 flex items-center gap-3 shrink-0">
                <i class="fa-solid fa-circle-exclamation text-xl"></i>
                <span>Todos los campos son obligatorios. Por favor, completa la información.</span>
            </div>
        <?php endif; ?>

        <form method="POST" action="index.php?action=guardar_informe" class="flex-1 flex flex-col min-h-0">
            <input type="hidden" name="beneficiario_id" value="<?= $beneficiario['id'] ?>">
            <input type="hidden" name="tipo_informe_id" value="<?= $tipoId ?>">
            <input type="hidden" name="tipo_personalizado" value="<?= htmlspecialchars($tipoPersonalizado) ?>">

            <div class="mb-6">
                <label class="block text-lg mb-2 font-bold">Elaborado por:</label>
                <input type="text" name="elaborado_por" value="Dirección y servicio comunitario IUTECP Guatire." required
                       class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl focus:outline-none focus:border-verdeOscuro">
            </div>

            <div class="mb-6">
                <label class="block text-lg mb-2 font-bold">Motivo principal:</label>
                <input type="text" name="motivo" placeholder="Resumen corto del motivo..." required
                       class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl focus:outline-none focus:border-verdeOscuro">
            </div>

            <label class="block text-lg mb-2 font-bold shrink-0">Observaciones detalladas:</label>
            <textarea name="observaciones" rows="5" placeholder="Escribe aquí los detalles del seguimiento..." required
                      class="w-full p-4 text-lg border-2 border-gray-300 rounded-xl mb-8 resize-none focus:outline-none focus:border-verdeOscuro flex-1 min-h-0"></textarea>

            <button type="submit"
                    class="mt-auto w-full bg-verdeOscuro hover:bg-green-800 text-white text-2xl font-bold py-4 rounded-xl shadow-md transition flex justify-center items-center gap-3 border-b-8 border-green-900 shrink-0">
                <i class="fa-solid fa-arrow-right"></i> Continuar a Componer Informe
            </button>
        </form>
    </div>
</div>
