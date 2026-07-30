<div class="pantalla">
    <a href="index.php" class="text-naranja font-bold mb-4 inline-block"><i class="fa-solid fa-arrow-left"></i> Volver al inicio</a>
    <div class="bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-3xl font-bold mb-6 text-verdeOscuro">Buscar Informe</h2>

        <input type="text" id="buscador-informes" placeholder="Escribe el nombre o cédula del beneficiario..." autocomplete="off"
               class="w-full p-4 text-xl border-2 border-verdeClaro rounded-xl mb-6 focus:outline-none focus:ring-4 focus:ring-verdeClaro focus:border-verdeOscuro">

        <div id="resultados-informes">
            <div class="bg-crema p-8 rounded-lg border border-gray-200 text-center">
                <i class="fa-solid fa-folder-open text-5xl text-gray-300 block mb-3"></i>
                <p class="text-gray-500 italic">Escribe el nombre o cédula para buscar informes...</p>
            </div>
        </div>
    </div>
</div>

<script>
(function () {
    var input      = document.getElementById('buscador-informes');
    var resultados = document.getElementById('resultados-informes');
    var timeout    = null;

    input.addEventListener('input', function () {
        clearTimeout(timeout);
        var val = this.value.trim();

        if (val.length < 2) {
            resultados.innerHTML =
                '<div class="bg-crema p-8 rounded-lg border border-gray-200 text-center">' +
                '<i class="fa-solid fa-folder-open text-5xl text-gray-300 block mb-3"></i>' +
                '<p class="text-gray-500 italic">Escribe al menos 2 letras para buscar...</p></div>';
            return;
        }

        timeout = setTimeout(function () {
            fetch('index.php?action=api_buscar_informes&q=' + encodeURIComponent(val))
                .then(function (r) { return r.json(); })
                .then(function (data) {
                    if (data.length === 0) {
                        resultados.innerHTML =
                            '<div class="bg-crema p-8 rounded-lg border border-gray-200 text-center">' +
                            '<i class="fa-solid fa-search-minus text-5xl text-gray-300 block mb-3"></i>' +
                            '<p class="text-gray-500 italic">No se encontraron informes con ese criterio.</p></div>';
                    } else {
                        var html = '<div class="grid gap-4">';
                        data.forEach(function (info) {
                            var fecha = new Date(info.fecha_creacion + 'Z').toLocaleDateString('es-VE');
                            html +=
                                '<div class="bg-crema border border-gray-200 rounded-xl p-4 flex justify-between items-center hover:shadow-md transition">' +
                                '<div>' +
                                '<p class="text-xl font-bold">' + info.beneficiario_nombre + '</p>' +
                                '<p class="text-gray-600">' + info.tipo_nombre + ' &middot; ' + info.motivo + '</p>' +
                                '<p class="text-gray-400 text-sm">' + fecha +
                                (info.cedula ? ' &middot; ' + info.cedula : '') + '</p>' +
                                '</div>';
                            if (info.pdf_ruta) {
                                html +=
                                    '<a href="index.php?action=ver_pdf&id=' + info.id + '" target="_blank"' +
                                    ' class="bg-naranja hover:bg-orange-600 text-white px-4 py-2 rounded-lg font-bold transition flex items-center gap-2 shrink-0">' +
                                    '<i class="fa-solid fa-file-pdf"></i> Ver PDF</a>';
                            } else {
                                html += '<span class="text-gray-400 italic shrink-0">Sin PDF</span>';
                            }
                            html += '</div>';
                        });
                        html += '</div>';
                        resultados.innerHTML = html;
                    }
                });
        }, 300);
    });
})();
</script>