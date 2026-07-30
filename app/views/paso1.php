<div class="pantalla">
    <a href="index.php" class="text-naranja font-bold mb-4 inline-block"><i class="fa-solid fa-arrow-left"></i> Cancelar y volver</a>
    <div class="bg-white p-8 rounded-2xl shadow-lg">
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold text-verdeOscuro">Paso 1: ¿De quién es el informe?</h2>
            <span class="bg-naranja text-white px-4 py-1 rounded-full font-bold">1 de 3</span>
        </div>

        <?php if (isset($_GET['error'])): ?>
            <div class="bg-red-50 border border-red-300 text-rojo p-4 rounded-xl mb-6 flex items-center gap-3">
                <i class="fa-solid fa-circle-exclamation text-xl"></i>
                <span>Debes seleccionar o registrar un beneficiario para continuar.</span>
            </div>
        <?php endif; ?>

        <label class="block text-xl mb-2 font-bold">Buscar beneficiario por nombre o cédula:</label>
        <input type="text" id="buscador-beneficiario" placeholder="Escribe para buscar..." autocomplete="off"
               class="w-full p-4 text-xl border-2 border-gray-300 rounded-xl mb-6 focus:outline-none focus:border-verdeOscuro">

        <div id="resultados-beneficiarios" class="mb-6">
            <p class="text-center text-gray-400 italic py-6">
                <i class="fa-solid fa-user-search text-3xl block mb-2"></i>
                Escribe al menos 2 letras para buscar...
            </p>
        </div>

        <form id="form-paso1" method="POST" action="index.php?action=paso2">
            <input type="hidden" name="beneficiario_id" id="beneficiario-id" value="0">

            <div id="nuevo-beneficiario-form" class="hidden border-t-2 border-gray-200 pt-6 mt-4">
                <p class="text-xl font-bold text-verdeOscuro mb-4">
                    <i class="fa-solid fa-user-plus"></i> Registrar nuevo beneficiario
                </p>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-lg mb-1 font-bold">Nombre completo:</label>
                        <input type="text" name="nombre" id="nuevo-nombre" placeholder="Ej: María Silva"
                               class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl focus:outline-none focus:border-verdeOscuro">
                    </div>
                    <div>
                        <label class="block text-lg mb-1 font-bold">Cédula (opcional):</label>
                        <input type="text" name="cedula" id="nuevo-cedula" placeholder="Ej: V-12.345.678"
                               class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl focus:outline-none focus:border-verdeOscuro">
                    </div>
                </div>
            </div>

            <button type="submit" id="btn-continuar" disabled
                    class="w-full bg-gray-300 text-gray-500 text-2xl font-bold py-4 rounded-xl shadow-md cursor-not-allowed transition">
                Continuar <i class="fa-solid fa-arrow-right ml-2"></i>
            </button>
        </form>
    </div>
</div>

<script>
(function () {
    const input       = document.getElementById('buscador-beneficiario');
    const resultados  = document.getElementById('resultados-beneficiarios');
    const hiddenId    = document.getElementById('beneficiario-id');
    const btnCont     = document.getElementById('btn-continuar');
    const nuevoForm   = document.getElementById('nuevo-beneficiario-form');
    const nuevoNombre = document.getElementById('nuevo-nombre');
    const nuevoCedula = document.getElementById('nuevo-cedula');

    let timeout   = null;
    let selectedId = 0;

    function actualizarBoton() {
        const ok = selectedId > 0 || nuevoNombre.value.trim().length >= 3;
        btnCont.disabled = !ok;
        btnCont.className = ok
            ? 'w-full bg-verdeOscuro hover:bg-green-800 text-white text-2xl font-bold py-4 rounded-xl shadow-md transition'
            : 'w-full bg-gray-300 text-gray-500 text-2xl font-bold py-4 rounded-xl shadow-md cursor-not-allowed transition';
    }

    window.seleccionarBeneficiario = function (id, nombre) {
        selectedId    = id;
        hiddenId.value = id;
        input.value   = nombre;
        resultados.innerHTML =
            '<div class="bg-green-50 border border-verdeClaro text-verdeOscuro p-4 rounded-xl text-center text-lg font-bold">' +
            '<i class="fa-solid fa-check-circle mr-2"></i> Seleccionado: ' + nombre + '</div>';
        nuevoForm.classList.add('hidden');
        actualizarBoton();
    };

    function buscar(query) {
        if (query.length < 2) {
            resultados.innerHTML =
                '<p class="text-center text-gray-400 italic py-6"><i class="fa-solid fa-user-search text-3xl block mb-2"></i> Escribe al menos 2 letras para buscar...</p>';
            return;
        }

        fetch('index.php?action=api_beneficiarios&q=' + encodeURIComponent(query))
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.length === 0) {
                    resultados.innerHTML =
                        '<div class="text-center p-6 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300">' +
                        '<i class="fa-solid fa-user-slash text-4xl text-gray-400 mb-3 block"></i>' +
                        '<p class="text-xl text-gray-500 mb-4">No se encontró ningún beneficiario con ese nombre.</p>' +
                        '<button type="button" onclick="' +
                        "document.getElementById('nuevo-beneficiario-form').classList.remove('hidden');" +
                        "document.getElementById('nuevo-nombre').focus();" +
                        '" class="bg-naranja hover:bg-orange-600 text-white text-xl font-bold py-3 px-6 rounded-xl shadow-md transition">' +
                        '<i class="fa-solid fa-user-plus mr-2"></i> No se encontró. Registrar como nuevo beneficiario' +
                        '</button></div>';
                    selectedId = 0;
                    hiddenId.value = '0';
                    nuevoForm.classList.remove('hidden');
                } else {
                    var html = '<div class="grid gap-3">';
                    data.forEach(function (b) {
                        var safeName = b.nombre.replace(/'/g, "\\'");
                        html +=
                            '<button type="button" onclick="seleccionarBeneficiario(' + b.id + ",'" + safeName + "')\"" +
                            ' class="text-left bg-crema border-2 border-gray-200 hover:border-verdeClaro hover:bg-white p-4 rounded-xl transition flex justify-between items-center w-full">' +
                            '<div><span class="text-xl font-bold block">' + b.nombre + '</span>' +
                            (b.cedula ? '<span class="text-gray-500">' + b.cedula + '</span>' : '') +
                            '</div><i class="fa-solid fa-chevron-right text-verdeClaro text-xl"></i></button>';
                    });
                    html += '</div>';
                    resultados.innerHTML = html;
                    nuevoForm.classList.add('hidden');
                }
            });
    }

    input.addEventListener('input', function () {
        selectedId    = 0;
        hiddenId.value = '0';
        clearTimeout(timeout);
        var val = this.value.trim();
        if (val.length >= 2) {
            timeout = setTimeout(function () { buscar(val); }, 300);
        } else {
            resultados.innerHTML =
                '<p class="text-center text-gray-400 italic py-6"><i class="fa-solid fa-user-search text-3xl block mb-2"></i> Escribe al menos 2 letras para buscar...</p>';
            nuevoForm.classList.add('hidden');
        }
        actualizarBoton();
    });

    nuevoNombre.addEventListener('input', actualizarBoton);
    nuevoCedula.addEventListener('input', actualizarBoton);

    document.getElementById('form-paso1').addEventListener('submit', function (e) {
        if (selectedId === 0 && nuevoNombre.value.trim().length < 3) {
            e.preventDefault();
            nuevoForm.classList.remove('hidden');
            nuevoNombre.focus();
        }
    });
})();
</script>