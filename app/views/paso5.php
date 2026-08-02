<div class="pantalla h-full flex flex-col min-h-0">
    <a href="index.php?action=paso4" class="text-naranja font-bold mb-4 inline-block shrink-0"><i class="fa-solid fa-arrow-left"></i> Volver</a>
    <div class="tarjeta-compacta bg-white p-8 rounded-2xl shadow-lg flex-1 min-h-0 overflow-y-auto flex flex-col">
        <div class="encabezado-paso flex justify-between items-center mb-6 shrink-0">
            <h2 class="titulo-paso text-3xl font-bold text-verdeOscuro">Paso 5: Detalles Finales</h2>
            <div class="flex items-center gap-3 shrink-0">
                <?php require __DIR__ . '/partials/beneficiario_info.php'; ?>
                <span class="bg-naranja text-white px-4 py-1 rounded-full font-bold">5 of 5</span>
            </div>
        </div>

        <div class="flex-1 flex flex-col justify-center">
            <div class="text-center">
                <i class="fa-solid fa-circle-check text-6xl text-verdeOscuro mb-4 block"></i>
                <p class="text-2xl font-bold text-verdeOscuro mb-2">Informe listo</p>
                <p class="text-lg text-gray-600">El informe está listo para generarse. Haz clic en el botón para crear el PDF.</p>
            </div>
        </div>

        <button type="button" id="btn-finalizar-directo" class="mt-auto w-full bg-verdeOscuro hover:bg-green-800 text-white text-2xl font-bold py-4 rounded-xl shadow-md transition flex justify-center items-center gap-3 border-b-8 border-green-900 shrink-0">
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