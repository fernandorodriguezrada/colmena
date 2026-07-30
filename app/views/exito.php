<div class="pantalla text-center pt-10">
    <i class="fa-solid fa-circle-check text-8xl text-verdeClaro mb-6"></i>
    <h2 class="text-4xl font-bold text-verdeOscuro mb-4">¡Informe Guardado con Éxito!</h2>
    <p class="text-xl mb-2">
        El informe de <strong><?= htmlspecialchars($informe['beneficiario_nombre']) ?></strong> se ha generado correctamente.
    </p>
    <p class="text-lg text-gray-500 mb-8">Tipo: <?= htmlspecialchars($informe['tipo_nombre']) ?></p>

    <div class="flex flex-col md:flex-row gap-4 justify-center items-center">
        <?php if ($informe['pdf_ruta']): ?>
            <a href="index.php?action=ver_pdf&id=<?= $informe['id'] ?>" target="_blank"
               class="bg-naranja hover:bg-orange-600 text-white text-xl font-bold py-3 px-8 rounded-xl shadow-md transition flex items-center gap-2">
                <i class="fa-solid fa-file-pdf"></i> Ver PDF
            </a>
        <?php endif; ?>

        <a href="index.php"
           class="bg-verdeOscuro hover:bg-green-800 text-white text-xl font-bold py-3 px-8 rounded-xl shadow-md transition flex items-center gap-2">
            <i class="fa-solid fa-house"></i> Volver al Inicio
        </a>
    </div>
</div>