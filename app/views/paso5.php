<div class="pantalla">
    <a href="index.php?action=paso4" class="text-naranja font-bold mb-4 inline-block"><i class="fa-solid fa-arrow-left"></i> Volver</a>
    <div class="bg-white p-8 rounded-2xl shadow-lg">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-3xl font-bold text-verdeOscuro">Paso 5: Detalles Finales</h2>
            <span class="bg-naranja text-white px-4 py-1 rounded-full font-bold">5 of 5</span>
        </div>

        <div class="bg-crema p-4 rounded-lg border border-gray-200 mb-6">
            <p class="text-lg"><strong>Beneficiario:</strong> <span class="text-verdeOscuro font-bold"><?= htmlspecialchars($beneficiario['nombre']) ?></span></p>
            <?php if ($tipoPersonalizado): ?>
            <p class="text-lg"><strong>Tipo:</strong> <span class="text-naranja font-bold"><?= htmlspecialchars($tipoPersonalizado) ?></span></p>
            <?php endif; ?>
            <p class="text-lg"><strong>Piezas:</strong> <span class="font-bold"><?= count($piezas) ?></span> pieza(s) añadida(s)</p>
        </div>

        <div class="mb-6">
            <p class="text-lg text-gray-600 mb-4">El informe está listo para generarse. Haz clic en el botón para crear el PDF.</p>
        </div>

        <button type="button" id="btn-finalizar-directo" class="w-full bg-verdeOscuro hover:bg-green-800 text-white text-2xl font-bold py-4 rounded-xl shadow-md transition flex justify-center items-center gap-3 border-b-8 border-green-900">
            <i class="fa-solid fa-file-contract"></i> Generar PDF Final
        </button>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('btn-finalizar-directo').addEventListener('click', function() {
            if (!confirm('¿Generar PDF final del informe? Esta acción no se puede deshacer.')) return;
            window.location.href = 'index.php?action=finalizar';
        });
    });
</script>