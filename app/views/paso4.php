<style>main { max-width: none !important; }
.preview-page {
    position: relative;
    width: 100%;
    background: #fff;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    border-radius: 4px;
    overflow: hidden;
    box-sizing: border-box;
}
.preview-page .preview-scaler {
    position: relative;
    width: 816px;
    height: 1056px;
    transform-origin: 0 0;
}
.preview-page .page-bg {
    position: absolute; top: 0; left: 0;
    width: 816px; height: 1056px;
    z-index: 0;
    display: block;
}
.preview-page .page-content {
    position: relative; z-index: 1;
    padding: 110pt 43pt 57pt 85pt;
    box-sizing: border-box;
    width: 816px;
    min-height: 1056px;
    font-family: 'Times', 'Times New Roman', serif;
    font-size: 13.5pt;
    line-height: 1.5;
    color: #000;
}
.preview-page .pdf-data-line { text-align: center; font-size: 13.5pt; margin-bottom: 14pt; }
.preview-page .pdf-section { margin-bottom: 10pt; }
.preview-page .pdf-section h3 { font-size: 13.5pt; font-weight: bold; margin-bottom: 4pt; }
.preview-page .pdf-content { font-size: 13.5pt; text-align: justify; overflow-wrap: break-word; word-wrap: break-word; }
.preview-page .pdf-firma { margin-top: 32pt; text-align: center; }
.preview-page .pdf-linea { border-top: 1px solid #000; width: 240pt; margin: 0 auto; padding-top: 4pt; font-size: 10pt; color: #555; }
.preview-page .pdf-table { width:100%; border-collapse: collapse; margin: 10pt 0; }
.preview-page .pdf-table th,
.preview-page .pdf-table td { border: 1px solid #ccc; padding: 6pt 8pt; text-align: left; font-size: 11pt; }
.preview-page .pdf-table th { background: #f0f0f0; font-weight: bold; }
.preview-page .pdf-chart { text-align: center; margin: 10pt 0; }
.preview-page .pdf-chart img,
.preview-page .pdf-chart svg { max-width: 100%; height: auto; }
.preview-page .pdf-image { text-align: center; margin: 10pt 0; }
.preview-page .pdf-image img { max-width: 100%; height: auto; }
.preview-page .pdf-caption { text-align: center; font-size: 10pt; color: #666; margin-top: 5pt; }
.preview-page .pdf-collage { display: flex; flex-wrap: wrap; justify-content: center; gap: 4pt; margin: 10pt 0; }
.preview-page .pdf-collage img { width: calc(50% - 4pt); height: auto; object-fit: cover; }
.pieza-draggable { position: absolute; cursor: grab; min-height: 20px; box-sizing: border-box; overflow-wrap: break-word; word-wrap: break-word; }
.pieza-draggable.detras { z-index: 0; }
.pieza-draggable.delante { z-index: 2; }
.pieza-texto, .pieza-espacio, .pieza-inline, .pdf-data-line { position: relative; z-index: 1; }
.pieza-texto { margin-bottom: 10pt; }
.pieza-espacio { pointer-events: none; border: 1px dashed #d6d6d6; }
.pieza-inline { width: 100%; margin: 10pt 0; }
.pieza-inline img, .pieza-inline svg { max-width: 100%; height: auto; }
.pieza-draggable:hover { outline: 2px dashed #EF7F31; outline-offset: 2px; }
.pieza-draggable.dragging { cursor: grabbing; outline: 2px solid #EF7F31; z-index: 999; opacity: 0.85; }
.pieza-draggable .drag-label { position: absolute; top: -18px; left: 0; font-size: 8pt; background: #EF7F31; color: #fff; padding: 1px 6px; border-radius: 3px; opacity: 0; transition: opacity 0.2s; white-space: nowrap; pointer-events: none; }
.pieza-draggable:hover .drag-label { opacity: 1; }
.toolbar-btn.active { background: #EF7F31 !important; color: #fff !important; }
</style>
<div class="pantalla px-8">
    <a href="index.php?action=paso3" class="text-naranja font-bold mb-4 inline-block"><i class="fa-solid fa-arrow-left"></i> Volver</a>

    <div class="flex gap-8 items-start">
        <div class="w-80 flex-shrink-0">
            <p class="text-xl text-gray-700 font-bold mb-4">Añadir piezas</p>
            <div class="grid grid-cols-2 gap-4">
                <button type="button" class="btn-add-pieza bg-naranja border-b-4 border-orange-700 shadow-md p-4 rounded-xl text-white hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0.5 transition-all duration-150 flex flex-col items-center" data-type="text">
                    <i class="fa-solid fa-font text-3xl text-crema opacity-80" style="text-shadow: 0 2px 3px rgba(0,0,0,0.25);"></i>
                    <span class="text-sm font-bold mt-1.5">Texto</span>
                </button>
                <button type="button" class="btn-add-pieza bg-verdeClaro border-b-4 border-green-700 shadow-md p-4 rounded-xl text-white hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0.5 transition-all duration-150 flex flex-col items-center" data-type="table">
                    <i class="fa-solid fa-table text-3xl text-crema opacity-80" style="text-shadow: 0 2px 3px rgba(0,0,0,0.25);"></i>
                    <span class="text-sm font-bold mt-1.5">Tabla</span>
                </button>
                <button type="button" class="btn-add-pieza bg-azul border-b-4 border-blue-800 shadow-md p-4 rounded-xl text-white hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0.5 transition-all duration-150 flex flex-col items-center" data-type="chart">
                    <i class="fa-solid fa-chart-pie text-3xl text-crema opacity-80" style="text-shadow: 0 2px 3px rgba(0,0,0,0.25);"></i>
                    <span class="text-sm font-bold mt-1.5">Gráfico</span>
                </button>
                <button type="button" class="btn-add-pieza bg-morado border-b-4 border-purple-800 shadow-md p-4 rounded-xl text-white hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0.5 transition-all duration-150 flex flex-col items-center" data-type="image">
                    <i class="fa-solid fa-image text-3xl text-crema opacity-80" style="text-shadow: 0 2px 3px rgba(0,0,0,0.25);"></i>
                    <span class="text-sm font-bold mt-1.5">Imagen</span>
                </button>
                <button type="button" class="btn-add-pieza bg-rosa border-b-4 border-pink-700 shadow-md p-4 rounded-xl text-white hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0.5 transition-all duration-150 flex flex-col items-center" data-type="collage">
                    <i class="fa-solid fa-images text-3xl text-crema opacity-80" style="text-shadow: 0 2px 3px rgba(0,0,0,0.25);"></i>
                    <span class="text-sm font-bold mt-1.5">Collage</span>
                </button>
                <button type="button" class="btn-add-pieza bg-verdeOscuro border-b-4 border-green-900 shadow-md p-4 rounded-xl text-white hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0.5 transition-all duration-150 flex flex-col items-center" data-type="firma">
                    <i class="fa-solid fa-pen text-3xl text-crema opacity-80" style="text-shadow: 0 2px 3px rgba(0,0,0,0.25);"></i>
                    <span class="text-sm font-bold mt-1.5">Firma</span>
                </button>
                <button type="button" class="btn-add-pieza bg-gray-500 border-b-4 border-gray-700 shadow-md p-4 rounded-xl text-white hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0.5 transition-all duration-150 flex flex-col items-center" data-type="espacio">
                    <i class="fa-solid fa-arrows-v text-3xl text-crema opacity-80" style="text-shadow: 0 2px 3px rgba(0,0,0,0.25);"></i>
                    <span class="text-sm font-bold mt-1.5">Espacio</span>
                </button>
            </div>
        </div>

        <div class="max-w-3xl bg-white p-8 rounded-2xl shadow-lg flex-1 min-w-0">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-3xl font-bold text-verdeOscuro">Paso 4: Componer Informe</h2>
                <span class="bg-naranja text-white px-4 py-1 rounded-full font-bold">4 of 5</span>
            </div>

            <div class="bg-crema p-4 rounded-lg border border-gray-200 mb-6">
                <p class="text-lg"><strong>Beneficiario:</strong> <span class="text-verdeOscuro font-bold"><?= htmlspecialchars($beneficiario['nombre']) ?></span></p>
                <?php if ($tipoPersonalizado): ?>
                <p class="text-lg"><strong>Tipo:</strong> <span class="text-naranja font-bold"><?= htmlspecialchars($tipoPersonalizado) ?></span></p>
                <?php endif; ?>
            </div>

            <input type="hidden" name="informe_id" id="informe-id" value="<?= $informeId ?? '' ?>">
            <input type="hidden" name="piezas_json" id="piezas-json" value='<?= htmlspecialchars(json_encode($piezas)) ?>'>

            <?php if (empty($informeId)): ?>
            <div class="bg-red-50 border border-red-300 text-rojo p-4 rounded-xl mb-6 flex items-center gap-3">
                <i class="fa-solid fa-exclamation-circle text-xl"></i>
                <span>El informe no está creado. Vuelve al paso 3 para continuar.</span>
            </div>
            <a href="index.php?action=paso3" class="w-full bg-naranja hover:bg-orange-600 text-white text-xl font-bold py-3 px-6 rounded-xl text-center inline-block mb-4">
                Volver al Paso 3
            </a>
            <?php endif; ?>

            <div class="flex items-center gap-3 mb-3">
                <p class="text-lg font-bold text-gray-700">Piezas añadidas <span id="piezas-count" class="bg-naranja text-white px-2 py-0.5 rounded-full text-sm align-middle">0</span></p>
                <div class="flex-1"></div>
                <div class="relative">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                    <input type="text" id="buscar-pieza" placeholder="Buscar pieza..." class="w-52 pl-8 pr-3 py-2 border-2 border-gray-300 rounded-lg text-sm focus:border-naranja focus:outline-none">
                </div>
            </div>
            <div id="lista-piezas" class="space-y-3 max-h-80 overflow-y-auto pr-1 mb-4">
                <div class="text-center py-8 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300">
                    <i class="fa-solid fa-puzzle-piece text-4xl text-gray-300 mb-2 block"></i>
                    <p class="text-lg text-gray-500">No hay piezas aún.</p>
                </div>
            </div>

            <form id="guardar-piezas-form" method="POST" action="index.php?action=guardar_piezas" class="mb-3">
                <input type="hidden" name="informe_id" value="<?= $informeId ?? '' ?>">
                <input type="hidden" name="piezas_json" id="piezas-json-guardar" value='<?= htmlspecialchars(json_encode($piezas)) ?>'>
                <button type="button" id="btn-guardar-piezas" class="w-full bg-azul hover:bg-blue-800 text-white text-lg font-bold py-3 rounded-xl shadow-md transition flex justify-center items-center gap-2 border-b-8 border-blue-900">
                    <i class="fa-solid fa-save"></i> Guardar Piezas
                </button>
            </form>

            <form id="finalizar-form" method="POST" action="index.php?action=finalizar">
                <input type="hidden" name="informe_id" value="<?= $informeId ?? '' ?>">
                <input type="hidden" name="piezas_json" id="piezas-json-finalizar" value='<?= htmlspecialchars(json_encode($piezas)) ?>'>
                <button type="button" id="btn-finalizar" class="w-full bg-verdeOscuro hover:bg-green-800 text-white text-lg font-bold py-3 rounded-xl shadow-md transition flex justify-center items-center gap-2 border-b-8 border-green-900">
                    <i class="fa-solid fa-file-contract"></i> Generar PDF Final
                </button>
            </form>
        </div>

        <div class="flex-1 min-w-0 hidden lg:flex flex-col">
            <div id="pdf-preview" class="preview-page">
                <img class="page-bg" src="assets/img/pagina.png" alt="">
                <div class="page-content">
                    <div class="text-center text-gray-400">Añade piezas para ver la previsualización</div>
                </div>
            </div>
        </div>
    </div>

<!-- Modal genérico -->
<div id="modal-pieza" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl p-8 w-full max-w-2xl max-h-[90vh] overflow-y-auto">
        <div class="flex justify-between items-center mb-6">
            <h3 id="modal-titulo" class="text-2xl font-bold text-verdeOscuro">Configurar Pieza</h3>
            <button onclick="closeModal()" class="text-gray-500 hover:text-rojo text-3xl">&times;</button>
        </div>
        <form id="form-pieza-modal">
            <input type="hidden" name="type" id="modal-type">
            <input type="hidden" name="idx" id="modal-idx">
            <div id="modal-campos"></div>
            <div class="flex justify-end gap-4 mt-6">
                <button type="button" id="btn-cancelar" class="bg-gray-300 hover:bg-gray-400 text-gris px-6 py-2 rounded-lg font-bold">Cancelar</button>
                <button type="submit" class="bg-verdeOscuro hover:bg-green-800 text-white px-6 py-2 rounded-lg font-bold">Guardar Pieza</button>
            </div>
        </form>
    </div>
</div>

<style>
.slider-naranja {
    -webkit-appearance: none;
    appearance: none;
    height: 8px;
    background: #e5e7eb;
    border-radius: 4px;
    outline: none;
}
.slider-naranja::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #EF7F31;
    cursor: pointer;
    border: 3px solid #fff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.3);
    transition: transform 0.15s;
}
.slider-naranja::-webkit-slider-thumb:hover {
    transform: scale(1.15);
}
.slider-naranja::-moz-range-thumb {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    background: #EF7F31;
    cursor: pointer;
    border: 3px solid #fff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.3);
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<script>
const INFORME_DATA = <?= json_encode($informe ? [
    'id' => $informe['id'],
    'elaborado_por' => $informe['elaborado_por'],
    'motivo' => $informe['motivo'],
    'observaciones' => $informe['observaciones'],
    'fecha_creacion' => $informe['fecha_creacion'],
    'tipo_nombre' => $informe['tipo_nombre'],
    'tipo_personalizado' => $tipoPersonalizado,
] : null) ?>;
const BENEFICIARIO_NOMBRE = <?= json_encode($beneficiario['nombre']) ?>;

window.onerror = function(msg, url, line, col, error) {
    console.error('JS Error:', msg, 'at', url, line + ':' + col, error);
    return false;
};

const modal = document.getElementById('modal-pieza');
const piezasInput = document.getElementById('piezas-json');

const templates = {
    text: `<div class="mb-4"><label class="block text-lg font-bold mb-1">Contenido del texto</label>
        <div class="toolbar border-2 border-b-0 border-gray-300 rounded-t-xl bg-gray-100 p-2 flex flex-wrap gap-1 items-center select-none">
            <button type="button" data-cmd="bold" class="toolbar-btn w-8 h-8 rounded hover:bg-gray-300 font-bold text-sm" title="Negrita">B</button>
            <button type="button" data-cmd="italic" class="toolbar-btn w-8 h-8 rounded hover:bg-gray-300 italic text-sm" title="Cursiva">I</button>
            <button type="button" data-cmd="underline" class="toolbar-btn w-8 h-8 rounded hover:bg-gray-300 underline text-sm" title="Subrayado">U</button>
            <span class="w-px h-6 bg-gray-400 mx-1"></span>
            <select data-cmd="fontSize" class="toolbar-select text-xs border border-gray-300 rounded px-1 py-1 bg-white">
                <option value="">Tamaño</option>
                <option value="10">10px</option>
                <option value="12">12px</option>
                <option value="14">14px</option>
                <option value="16">16px</option>
                <option value="18">18px</option>
                <option value="20">20px</option>
                <option value="22">22px</option>
                <option value="24">24px</option>
                <option value="32">32px</option>
                <option value="48">48px</option>
            </select>
            <span class="w-px h-6 bg-gray-400 mx-1"></span>
            <button type="button" data-cmd="left" class="toolbar-btn w-8 h-8 rounded hover:bg-gray-300 text-xs" title="Izquierda"><i class="fa-solid fa-align-left"></i></button>
            <button type="button" data-cmd="center" class="toolbar-btn w-8 h-8 rounded hover:bg-gray-300 text-xs" title="Centrado"><i class="fa-solid fa-align-center"></i></button>
            <button type="button" data-cmd="right" class="toolbar-btn w-8 h-8 rounded hover:bg-gray-300 text-xs" title="Derecha"><i class="fa-solid fa-align-right"></i></button>
            <button type="button" data-cmd="justify" class="toolbar-btn w-8 h-8 rounded hover:bg-gray-300 text-xs" title="Justificado"><i class="fa-solid fa-align-justify"></i></button>
            <span class="w-px h-6 bg-gray-400 mx-1"></span>
            <button type="button" data-cmd="insertUnorderedList" class="toolbar-btn w-8 h-8 rounded hover:bg-gray-300 text-xs" title="Lista"><i class="fa-solid fa-list"></i></button>
            <button type="button" data-cmd="insertOrderedList" class="toolbar-btn w-8 h-8 rounded hover:bg-gray-300 text-xs" title="Lista numerada"><i class="fa-solid fa-list-ol"></i></button>
        </div>
        <div id="text-editor" contenteditable="true" class="w-full p-4 text-base border-2 border-gray-300 rounded-b-xl focus:outline-none focus:border-verdeOscuro min-h-[200px] bg-white" style="white-space:pre-wrap; overflow-wrap:break-word"></div></div>`,
    table: `<div class="mb-4"><label class="block text-lg font-bold mb-1">Cabeceras (separadas por coma)</label>
        <input name="headers" class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl" placeholder="Nombre, Edad, Diagnóstico"></div>
        <div class="mb-4"><label class="block text-lg font-bold mb-1">Filas (una por línea, valores separados por coma)</label>
        <textarea name="rows" rows="6" class="w-full p-4 text-lg border-2 border-gray-300 rounded-xl" placeholder="María, 45, Hipertensión&#10;Juan, 32, Diabetes"></textarea></div>`,
    chart: `<div class="grid grid-cols-2 gap-6">
        <div>
            <div class="mb-4"><label class="block text-lg font-bold mb-1">Tipo de gráfico</label>
            <select name="kind" id="chart-kind" class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl">
                <option value="pie">Torta</option>
                <option value="bar">Barras</option>
                <option value="line">Líneas</option>
            </select></div>
            <div class="mb-4"><label class="block text-lg font-bold mb-1">Etiquetas (separadas por coma)</label>
            <input name="labels" id="chart-labels" class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl" placeholder="Enero, Febrero, Marzo"></div>
            <div class="mb-4"><label class="block text-lg font-bold mb-1">Datos (separados por coma)</label>
            <input name="data" id="chart-data" class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl" placeholder="10, 20, 15"></div>
            <div class="mb-4">
                <label class="block text-lg font-bold mb-2">Paleta de colores</label>
                <input type="hidden" name="colors" id="chart-colors-hidden" value="#EF7F31, #7CB342, #4D813F, #FFCE56, #36A2EB, #FF6384, #9966FF, #FF9F40">
                <div class="mb-2 text-sm text-gray-600">Haz clic en una paleta para seleccionarla:</div>
                <div id="paleta-colores" class="grid grid-cols-3 gap-2"></div>
                <div class="mt-2">
                    <label class="block text-sm text-gray-500 mb-1">O personaliza (hex separados por coma):</label>
                    <input name="colors" id="chart-colors-input" class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl" placeholder="#EF7F31, #7CB342, #4D813F">
                </div>
            </div>
        </div>
        <div class="flex flex-col">
            <label class="block text-lg font-bold mb-2">Vista previa</label>
            <div class="mb-2 flex items-center gap-2">
                <input type="range" id="chart-size-slider" min="180" max="400" value="280" class="w-full slider-naranja">
                <span id="chart-size-label" class="text-sm text-gray-600 w-12 text-right">280px</span>
            </div>
            <div class="flex-1 w-full bg-white rounded-xl border border-gray-200 p-4 flex items-center justify-center min-h-[300px]">
                <div id="chart-preview" class="w-full flex items-center justify-center"></div>
            </div>
        </div>
    </div>`,
    image: `<div class="mb-4"><label class="block text-lg font-bold mb-1">Imagen (arrastra o selecciona)</label>
        <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center" id="drop-zone">
            <i class="fa-solid fa-cloud-upload-alt text-4xl text-gray-400 mb-2 block"></i>
            <input type="file" name="image" id="file-input" accept="image/*" class="hidden">
            <button type="button" id="btn-select-img" class="bg-naranja text-white px-4 py-2 rounded-lg font-bold">Seleccionar archivo</button>
        </div>
        <div id="img-preview" class="hidden mt-4"><img id="preview-img" class="max-h-48 mx-auto"></div>
        <div class="mb-4 mt-4"><label class="block text-lg font-bold mb-1">Pie de foto</label>
        <input name="caption" class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl"></div>`,
    collage: `<div class="mb-4"><label class="block text-lg font-bold mb-1">Imágenes (múltiples)</label>
        <div class="border-2 border-dashed border-gray-300 rounded-xl p-8 text-center" id="drop-zone-collage">
            <i class="fa-solid fa-images text-4xl text-gray-400 mb-2 block"></i>
            <input type="file" name="images[]" id="file-input-collage" accept="image/*" multiple class="hidden">
            <button type="button" id="btn-select-collage" class="bg-rosa text-white px-4 py-2 rounded-lg font-bold">Seleccionar varias</button>
        </div>
        <div id="collage-preview" class="grid grid-cols-3 gap-2 mt-4"></div>
        <div class="mb-4 mt-4"><label class="block text-lg font-bold mb-1">Layout</label>
        <select name="layout" class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl">
            <option value="grid">Cuadrícula</option>
            <option value="masonry">Mosaico</option>
        </select></div>`,
    firma: `<div class="mb-4"><label class="block text-lg font-bold mb-1">Nombre del firmante</label>
        <input name="nombre" class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl" placeholder="Lic. María Pérez"></div>
        <div class="mb-4"><label class="block text-lg font-bold mb-1">Cargo (opcional)</label>
        <input name="titulo" class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl" placeholder="Directora Ejecutiva"></div>`,
    espacio: `<div class="mb-4"><label class="block text-lg font-bold mb-1">Altura del espacio</label>
        <div class="mb-2 flex items-center gap-2">
            <input type="range" name="height" min="20" max="400" value="80" class="w-full slider-naranja" id="espacio-height-range">
            <span id="espacio-height-label" class="text-sm text-gray-600 w-12 text-right">80px</span>
        </div></div>`
};

function generateSimpleChartSVG(kind, labels, data, colors, width, height) {
    const padding = Math.max(10, Math.round(width * 0.05));
    const fontSize = Math.max(8, Math.round(width * 0.04));
    const legendH = labels.length ? Math.round(fontSize * 2) : 0;
    const chartH = height - legendH;
    const innerW = width - padding * 2;
    const innerH = chartH - padding;
    const usedColors = colors.length ? colors : ['#EF7F31', '#7CB342', '#4D813F', '#E02C35', '#FDF9F3', '#424242'];

    let svg = `<svg xmlns="http://www.w3.org/2000/svg" width="${width}" height="${height}" viewBox="0 0 ${width} ${height}">`;

    if (kind === 'pie') {
        const cx = width / 2, cy = (chartH + padding) / 2;
        const r = Math.min(innerW, chartH - padding) / 2;
        let angle = 0;
        const total = data.reduce((s, v) => s + v, 0);
        if (total === 0) return svg;
        data.forEach((val, i) => {
            const a = (val / total) * 2 * Math.PI;
            const x1 = cx + r * Math.cos(angle);
            const y1 = cy + r * Math.sin(angle);
            const x2 = cx + r * Math.cos(angle + a);
            const y2 = cy + r * Math.sin(angle + a);
            const large = a > Math.PI ? 1 : 0;
            svg += `<path d="M ${cx} ${cy} L ${x1} ${y1} A ${r} ${r} 0 ${large} 1 ${x2} ${y2} Z" fill="${usedColors[i % usedColors.length]}"/>`;
            angle += a;
        });
    } else if (kind === 'bar') {
        const maxVal = Math.max(...data);
        if (maxVal === 0) return svg;
        const n = data.length;
        const gap = innerW * 0.15 / n;
        const barW = (innerW - gap * (n + 1)) / n;
        data.forEach((val, i) => {
            const h = (val / maxVal) * innerH;
            const x = padding + gap + i * (barW + gap);
            const y = chartH - h;
            svg += `<rect x="${x}" y="${y}" width="${barW}" height="${h}" fill="${usedColors[i % usedColors.length]}"/>`;
        });
    } else if (kind === 'line') {
        if (data.length < 2) return svg;
        const maxVal = Math.max(...data);
        const step = innerW / (data.length - 1);
        const points = data.map((v, i) => ({x: padding + i*step, y: chartH - (v/maxVal)*innerH}));
        const path = points.map((p, i) => i === 0 ? `M ${p.x} ${p.y}` : `L ${p.x} ${p.y}`).join(' ');
        const sw = Math.max(1, Math.round(width * 0.007));
        svg += `<path d="${path}" fill="none" stroke="#333" stroke-width="${sw}"/>`;
        const cr = Math.max(2, Math.round(width * 0.01));
        points.forEach((p, i) => svg += `<circle cx="${p.x}" cy="${p.y}" r="${cr}" fill="${usedColors[i % usedColors.length]}"/>`);
    }

    if (labels.length) {
        const legendY = chartH + Math.round(fontSize * 1.8);
        const n = labels.length;
        const sectionW = width / n;
        const swatchSize = fontSize - 1;
        const swatchOffset = Math.round(swatchSize * 0.7);
        labels.forEach((label, i) => {
            const ly = legendY;
            const val = data[i] !== undefined ? data[i] : '';
            const textStr = `${label}: ${val}`;
            const textW = textStr.length * fontSize * 0.6;
            const totalW = swatchSize + 4 + textW;
            const centerX = sectionW / 2 + i * sectionW;
            const startX = centerX - totalW / 2;
            svg += `<rect x="${startX}" y="${ly - swatchOffset}" width="${swatchSize}" height="${swatchSize}" fill="${usedColors[i % usedColors.length]}"/>`;
            svg += `<text x="${startX + swatchSize + 4}" y="${ly + 1}" font-size="${fontSize}" fill="#333">${textStr}</text>`;
        });
    }

    svg += '</svg>';
    return svg;
}

function initChartPreview() {
    const labels = document.getElementById('chart-labels').value.split(',').map(s => s.trim()).filter(Boolean);
    const data = document.getElementById('chart-data').value.split(',').map(s => parseFloat(s.trim())).filter(n => !isNaN(n));
    const colors = document.getElementById('chart-colors-input').value.split(',').map(s => s.trim()).filter(Boolean);
    const kind = document.getElementById('chart-kind').value;
    const size = parseInt(document.getElementById('chart-size-slider').value) || 280;
    const svg = generateSimpleChartSVG(kind, labels, data, colors, size, size);
    const preview = document.getElementById('chart-preview');
    if (preview) preview.innerHTML = svg;
    const label = document.getElementById('chart-size-label');
    if (label) label.textContent = size + 'px';
}

const PALETAS = [
    { nombre: 'Institucional', colores: ['#EF7F31', '#7CB342', '#4D813F', '#E02C35', '#FDF9F3', '#424242'] },
    { nombre: 'Pastel', colores: ['#FFB3BA', '#FFDFBA', '#FFFFBA', '#BAFFC9', '#BAE1FF', '#E0BBE4'] },
    { nombre: 'Vibrante', colores: ['#FF6B6B', '#4ECDC4', '#45B7D1', '#FFBE0B', '#FB5607', '#8338EC'] },
    { nombre: 'Tierra', colores: ['#8B4513', '#DEB887', '#8FBC8F', '#CD853F', '#A0522D', '#D2691E'] },
    { nombre: 'Océano', colores: ['#0077BE', '#0096C7', '#00B4D8', '#90E0EF', '#CAF0F8', '#03045E'] },
    { nombre: 'Atardecer', colores: ['#FF9F1C', '#FFBF69', '#FFEE93', '#C7EF99', '#A8E6CF', '#FF6B6B'] }
];

function renderPaletaColores() {
    const cont = document.getElementById('paleta-colores');
    if (!cont) return;
    cont.innerHTML = PALETAS.map((p, i) => `
        <button type="button" class="paleta-btn p-2 rounded-lg border-2 ${i === 0 ? 'border-naranja' : 'border-transparent'} hover:border-naranja transition"
                data-colores="${p.colores.join(',')}" title="${p.nombre}">
            <div class="flex gap-1 justify-center" style="height: 24px;">
                ${p.colores.map(c => `<span class="flex-1 rounded" style="background:${c}"></span>`).join('')}
            </div>
            <span class="text-xs text-center block mt-1 text-gray-600">${p.nombre}</span>
        </button>
    `).join('');

    cont.querySelectorAll('.paleta-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            cont.querySelectorAll('.paleta-btn').forEach(b => b.classList.replace('border-naranja', 'border-transparent'));
            btn.classList.replace('border-transparent', 'border-naranja');
            document.getElementById('chart-colors-hidden').value = btn.dataset.colores;
            document.getElementById('chart-colors-input').value = btn.dataset.colores;
            initChartPreview();
        });
    });
}

function renderLista() {
    const lista = document.getElementById('lista-piezas');
    const piezas = JSON.parse(piezasInput.value || '[]');
    const countEl = document.getElementById('piezas-count');
    const filtro = ((document.getElementById('buscar-pieza') || {}).value || '').trim().toLowerCase();

    if (piezas.length === 0) {
        lista.innerHTML = '<div class="text-center py-12 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300"><i class="fa-solid fa-puzzle-piece text-5xl text-gray-300 mb-3 block"></i><p class="text-xl text-gray-500 mb-4">No hay piezas aún. Añade la primera pieza abajo.</p></div>';
        if (countEl) countEl.textContent = '0';
        renderPDFPreview();
        return;
    }

    const visibles = piezas
        .map((p, i) => ({ p, i }))
        .filter(({ p }) => !filtro ||
            p.type.toLowerCase().includes(filtro) ||
            getResumen(p).toLowerCase().includes(filtro) ||
            getDetalle(p).toLowerCase().includes(filtro));

    if (countEl) countEl.textContent = filtro ? visibles.length + ' de ' + piezas.length : String(piezas.length);

    if (visibles.length === 0) {
        lista.innerHTML = '<div class="text-center py-12 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300"><i class="fa-solid fa-magnifying-glass text-5xl text-gray-300 mb-3 block"></i><p class="text-xl text-gray-500">Sin resultados para "<span class="font-bold">' + escHtml(filtro) + '</span>".</p></div>';
        renderPDFPreview();
        return;
    }

    const typeColors = { text: 'border-l-naranja', table: 'border-l-verdeClaro', chart: 'border-l-azul', image: 'border-l-morado', collage: 'border-l-rosa', firma: 'border-l-verdeOscuro', espacio: 'border-l-gray-500' };
    lista.innerHTML = visibles.map(({ p, i }) => `
        <div class="pieza-item bg-white border-2 border-gray-200 border-l-8 ${typeColors[p.type] || 'border-l-naranja'} rounded-xl shadow-md p-4 flex items-center gap-4 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200" data-idx="${i}">
            <span class="text-gray-400 text-2xl cursor-move select-none flex-shrink-0" title="Arrastrar">⋮⋮</span>
            <div class="flex-1 min-w-0">
                <div class="flex items-center gap-2 min-w-0">
                    <span class="bg-naranja text-white px-2 py-1 rounded text-sm font-bold flex-shrink-0">${p.type.charAt(0).toUpperCase() + p.type.slice(1)}</span>
                    <span class="text-gray-700 font-medium truncate">${getResumen(p)}</span>
                </div>
                <div class="text-xs text-gray-400 mt-1 truncate">${getDetalle(p)}</div>
            </div>
            <div class="flex items-center gap-2 flex-shrink-0">
                <button type="button" class="btn-editar bg-verdeClaro hover:bg-green-600 text-white px-4 py-2 rounded-xl text-sm font-bold shadow border-b-4 border-green-700 transition-all hover:brightness-110" data-idx="${i}">Editar</button>
                <button type="button" class="btn-eliminar bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl text-sm font-bold shadow border-b-4 border-red-700 transition-all hover:brightness-110" data-idx="${i}">Eliminar</button>
            </div>
        </div>
    `).join('');

    lista.querySelectorAll('.btn-editar').forEach(b => b.addEventListener('click', () => {
        const piezas = JSON.parse(piezasInput.value || '[]');
        openModal(piezas[b.dataset.idx].type, b.dataset.idx);
    }));
    lista.querySelectorAll('.btn-eliminar').forEach(b => b.addEventListener('click', () => {
        if (confirm('¿Eliminar esta pieza?')) {
            const piezas = JSON.parse(piezasInput.value);
            piezas.splice(b.dataset.idx, 1);
            piezasInput.value = JSON.stringify(piezas);
            renderLista();
        }
    }));

    var dragIdx = null;
    var overIdx = null;

    function dragEndCleanup() {
        lista.querySelectorAll('.pieza-item').forEach(function(el) {
            el.classList.remove('opacity-50', 'border-t-4', 'border-b-4', 'border-naranja');
        });
        dragIdx = null;
        overIdx = null;
    }

    lista.querySelectorAll('.pieza-item').forEach(function(el) {
        el.setAttribute('draggable', 'true');
        el.addEventListener('dragstart', function(e) {
            dragIdx = parseInt(this.dataset.idx);
            try { e.dataTransfer.setData('text/plain', String(dragIdx)); } catch (err) {}
            e.dataTransfer.effectAllowed = 'move';
            this.classList.add('opacity-50');
        });
        el.addEventListener('dragover', function(e) {
            e.preventDefault();
            e.dataTransfer.dropEffect = 'move';
            var tIdx = parseInt(this.dataset.idx);
            if (tIdx === dragIdx) return;
            var rect = this.getBoundingClientRect();
            var after = e.clientY > rect.top + rect.height / 2;
            this.classList.remove('border-t-4', 'border-b-4', 'border-naranja');
            this.classList.add(after ? 'border-b-4' : 'border-t-4', 'border-naranja');
            overIdx = { tIdx: tIdx, after: after };
        });
        el.addEventListener('dragleave', function(e) {
            this.classList.remove('border-t-4', 'border-b-4', 'border-naranja');
        });
        el.addEventListener('drop', function(e) {
            e.preventDefault();
            if (dragIdx === null || !overIdx || overIdx.tIdx === dragIdx) { dragEndCleanup(); return; }
            var piezas = JSON.parse(piezasInput.value || '[]');
            var from = dragIdx;
            var moved = piezas.splice(from, 1)[0];
            var targetPos = overIdx.tIdx > from ? overIdx.tIdx - 1 : overIdx.tIdx;
            var insertPos = overIdx.after ? targetPos + 1 : targetPos;
            insertPos = Math.max(0, Math.min(piezas.length, insertPos));
            piezas.splice(insertPos, 0, moved);
            piezasInput.value = JSON.stringify(piezas);
            dragEndCleanup();
            renderLista();
        });
        el.addEventListener('dragend', dragEndCleanup);
    });
    renderPDFPreview();
}

function renderPDFPreview() {
    const container = document.getElementById('pdf-preview');
    if (!container) return;
    const piezas = JSON.parse(piezasInput.value || '[]');
    let innerHtml;
    if (!INFORME_DATA) {
        innerHtml = '<div class="text-center text-gray-400" style="padding:20pt">Primero debes crear el informe en el paso 3</div>';
    } else {
        var dataLine = '<div class="pdf-data-line"><b>Tipo:</b> ' + escHtml(INFORME_DATA.tipo_personalizado || INFORME_DATA.tipo_nombre || '') + ' &nbsp;|&nbsp; <b>N&deg;:</b> ' + String(INFORME_DATA.id || '').padStart(4, '0') + '</div>';
        var detrasHtml = '';
        var flujoHtml = '';
        var delanteHtml = '';
        piezas.forEach(function(p, i) {
            var r = renderPiezaPreview(p, i);
            if ((p.layout || 'inline') === 'detras') detrasHtml += r;
            else if ((p.layout || 'inline') === 'delante') delanteHtml += r;
            else flujoHtml += r;
        });
        innerHtml = dataLine + detrasHtml + flujoHtml + delanteHtml;
    }
    container.innerHTML = '<div class="preview-scaler"><img class="page-bg" src="assets/img/pagina.png" alt=""><div class="page-content" style="position:relative">' + innerHtml + '</div></div>';
    container.style.height = (container.clientWidth * 792 / 612) + 'px';
    var scaler = container.querySelector('.preview-scaler');
    if (scaler) {
        scaler.style.transform = 'scale(' + (container.clientWidth / 816) + ')';
    }
    container.querySelectorAll('.pieza-draggable').forEach(function(el) {
        el.addEventListener('mousedown', startDrag);
    });
}

function renderPiezaPreview(p, idx) {
    var inner;
    switch (p.type) {
        case 'text':
            var content = p.content || '';
            content = content.replace(/&nbsp;|&#160;|&#xa0;|\u00a0/g, ' ');
            return '<div class="pieza-texto">' + content + '</div>';
        case 'espacio':
            var espH = (p.config && p.config.height) || p.height || 80;
            return '<div class="pieza-espacio" style="height:' + espH + 'px"></div>';
        case 'table': {
            var headers = (p.headers || '').split(',').map(function(s) { return s.trim(); }).filter(Boolean);
            var rows = (p.rows || '').split('\n').filter(Boolean).map(function(r) { return r.split(',').map(function(s) { return s.trim(); }); });
            var table = '<table class="pdf-table"><thead><tr>';
            headers.forEach(function(h) { table += '<th>' + escHtml(h) + '</th>'; });
            table += '</tr></thead><tbody>';
            rows.forEach(function(row) {
                table += '<tr>';
                row.forEach(function(cell) { table += '<td>' + escHtml(cell) + '</td>'; });
                table += '</tr>';
            });
            table += '</tbody></table>';
            inner = table;
            break;
        }
        case 'chart': {
            var config = p.config || {};
            if (config.image_base64) {
                inner = '<div class="pdf-chart"><img src="data:image/svg+xml;base64,' + config.image_base64 + '" style="display:block; margin:0 auto; max-width:100%"></div>';
            } else {
                var svg = generateSimpleChartSVG(config.kind || 'pie', config.labels || [], config.data || [], config.colors || [], 280, 280);
                inner = '<div class="pdf-chart" style="text-align:center">' + svg + '</div>';
            }
            break;
        }
        case 'image': {
            var cfg = p.config || {};
            if (cfg.image_base64) {
                var img = '<img src="data:' + (cfg.mime || 'image/png') + ';base64,' + cfg.image_base64 + '" style="max-width:100%">';
                var cap = cfg.caption ? '<div class="pdf-caption">' + escHtml(cfg.caption) + '</div>' : '';
                inner = '<div class="pdf-image">' + img + cap + '</div>';
            } else {
                inner = '';
            }
            break;
        }
        case 'collage': {
            var imgs = (p.images || []).map(function(img) {
                return '<img src="data:' + (img.mime || 'image/png') + ';base64,' + (img.base64 || '') + '">';
            }).join('');
            inner = imgs ? '<div class="pdf-collage">' + imgs + '</div>' : '';
            break;
        }
        case 'firma': {
            var cfg = p.config || {};
            var nombre = cfg.nombre || p.nombre || '';
            var titulo = cfg.titulo || p.titulo || '';
            inner = '<div class="pdf-firma" style="margin-top:0"><div class="pdf-linea">' + escHtml(nombre) + (titulo ? '<br><span style="font-size:10pt;color:#555">' + escHtml(titulo) + '</span>' : '') + '</div></div>';
            break;
        }
        default:
            inner = '';
    }
    var layout = p.layout || 'inline';
    if (layout === 'inline') {
        return '<div class="pieza-inline">' + inner + '</div>';
    }
    var px = p.posX !== undefined ? p.posX : 5;
    var py = p.posY !== undefined ? Math.min(Math.max(p.posY, 0), 90) : 10;
    var pw = p.width || 90;
    var label = p.type + (layout === 'detras' ? ' · detrás' : ' · delante');
    return '<div class="pieza-draggable ' + layout + '" data-idx="' + idx + '" style="left:' + px + '%; top:' + py + '%; width:' + pw + '%"><span class="drag-label">' + label + '</span>' + inner + '</div>';
}

var dragState = null;

function startDrag(e) {
    if (e.button !== 0) return;
    var el = e.currentTarget;
    var pageEl = document.querySelector('.preview-page');
    var pageRect = pageEl.getBoundingClientRect();
    var pctX = ((e.clientX - pageRect.left) / pageRect.width) * 100;
    var pctY = ((e.clientY - pageRect.top) / pageRect.height) * 100;
    var curLeft = parseFloat(el.style.left) || 0;
    var curTop = parseFloat(el.style.top) || 0;
    var maxPctY = Math.min(92, ((pageRect.bottom - pageRect.top) / pageRect.height) * 100);
    dragState = {
        el: el,
        idx: parseInt(el.dataset.idx),
        pageRect: pageRect,
        maxPctY: maxPctY,
        offsetPctX: pctX - curLeft,
        offsetPctY: pctY - curTop
    };
    el.classList.add('dragging');
    document.addEventListener('mousemove', doDrag);
    document.addEventListener('mouseup', stopDrag);
    e.preventDefault();
}

function doDrag(e) {
    if (!dragState) return;
    var w = parseFloat(dragState.el.style.width) || 90;
    var pctX = ((e.clientX - dragState.pageRect.left) / dragState.pageRect.width) * 100;
    var pctY = ((e.clientY - dragState.pageRect.top) / dragState.pageRect.height) * 100;
    var newX = Math.max(0, Math.min(100 - w, pctX - dragState.offsetPctX));
    var newY = Math.max(0, Math.min(dragState.maxPctY, pctY - dragState.offsetPctY));
    dragState.el.style.left = newX + '%';
    dragState.el.style.top = newY + '%';
}

function stopDrag(e) {
    if (!dragState) return;
    dragState.el.classList.remove('dragging');
    document.removeEventListener('mousemove', doDrag);
    document.removeEventListener('mouseup', stopDrag);
    var newLeft = parseFloat(dragState.el.style.left);
    var newTop = parseFloat(dragState.el.style.top);
    if (isNaN(newLeft)) newLeft = 5;
    if (isNaN(newTop)) newTop = 10;
    var piezas = JSON.parse(piezasInput.value || '[]');
    if (piezas[dragState.idx]) {
        piezas[dragState.idx].posX = Math.round(newLeft * 10) / 10;
        piezas[dragState.idx].posY = Math.round(newTop * 10) / 10;
        piezasInput.value = JSON.stringify(piezas);
    }
    dragState = null;
}

function escHtml(str) {
    if (!str) return '';
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function stripHtml(html) {
    if (!html) return '';
    var div = document.createElement('div');
    div.innerHTML = String(html);
    return div.textContent || '';
}

function getResumen(p) {
    if (p.type === 'text') {
        var txt = stripHtml(p.content).replace(/\s+/g, ' ').trim();
        return txt ? txt.slice(0, 50) + (txt.length > 50 ? '…' : '') : 'Texto vacío';
    }
    if (p.type === 'table') return `${(p.headers?.split(',').length || 0)} columnas × ${(p.rows?.split('\n').length || 0)} filas`;
    if (p.type === 'chart') {
        var cfg = p.config || {};
        return (cfg.kind || 'pie') + ' · ' + (cfg.labels?.length || 0) + ' series';
    }
    if (p.type === 'image') return (p.config && p.config.caption) || 'Imagen';
    if (p.type === 'collage') return (p.images ? p.images.length : 0) + ' imágenes · ' + (p.layout || 'grid');
    if (p.type === 'firma') {
        var cfg = p.config || {};
        return (cfg.nombre || p.nombre || '') + ' — ' + (cfg.titulo || p.titulo || 'sin cargo');
    }
    if (p.type === 'espacio') return ((p.config && p.config.height) || 80) + 'px de espacio';
    return '';
}

function getDetalle(p) {
    var detalles = {
        text: 'Texto libre',
        table: 'Tabla de datos',
        image: 'Imagen única',
        collage: 'Collage de imágenes',
        firma: 'Bloque de firma',
        espacio: 'Espacio en blanco'
    };
    var base;
    if (p.type === 'chart') {
        var cfg = p.config || {};
        base = (cfg.kind || 'pie') + ' chart';
    } else {
        base = detalles[p.type] || '';
    }
    if (p.type === 'text' || p.type === 'espacio') return base;
    var layout = p.layout || 'inline';
    var modo = layout === 'inline' ? 'En línea' : (layout === 'detras' ? 'Detrás' : 'Delante');
    return base + ' · ' + modo;
}

function setupImageUpload() {
    const drop = document.getElementById('drop-zone');
    const input = document.getElementById('file-input');
    const btn = document.getElementById('btn-select-img');
    const preview = document.getElementById('img-preview');
    const img = document.getElementById('preview-img');

    window.previewImg = img;

    btn.onclick = () => input.click();
    drop.onclick = () => input.click();
    drop.ondragover = e => { e.preventDefault(); drop.classList.add('border-naranja'); };
    drop.ondragleave = e => { e.preventDefault(); drop.classList.remove('border-naranja'); };
    drop.ondrop = e => { e.preventDefault(); drop.classList.remove('border-naranja'); input.files = e.dataTransfer.files; handleFile(input.files[0]); };
    input.onchange = () => handleFile(input.files[0]);

    function handleFile(file) {
        if (!file || !file.type.startsWith('image/')) return;
        const reader = new FileReader();
        reader.onload = e => {
            document.getElementById('preview-img').src = e.target.result;
            document.getElementById('img-preview').classList.remove('hidden');
            window.previewImg = document.getElementById('preview-img');
        };
        reader.readAsDataURL(file);
    }
}

function setupCollageUpload() {
    const drop = document.getElementById('drop-zone-collage');
    const input = document.getElementById('file-input-collage');
    const btn = document.getElementById('btn-select-collage');
    const preview = document.getElementById('collage-preview');

    btn.onclick = () => input.click();
    drop.onclick = () => input.click();
    drop.ondragover = e => { e.preventDefault(); drop.classList.add('border-naranja'); };
    drop.ondragleave = e => { e.preventDefault(); drop.classList.remove('border-naranja'); };
    drop.ondrop = e => { e.preventDefault(); drop.classList.remove('border-naranja'); input.files = e.dataTransfer.files; handleFiles(input.files); };
    input.onchange = () => handleFiles(input.files);

    function handleFiles(files) {
        const preview = document.getElementById('collage-preview');
        preview.innerHTML = '';
        Array.from(files).forEach(f => {
            if (!f.type.startsWith('image/')) return;
            const reader = new FileReader();
            reader.onload = e => {
                const div = document.createElement('div');
                div.className = 'relative';
                div.innerHTML = `<img src="${e.target.result}" class="h-20 w-auto rounded"><button type="button" class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 text-xs">×</button>`;
                preview.appendChild(div);
            };
            reader.readAsDataURL(f);
        });
    }
}

function openModal(type, idx = null) {
    const modalBox = document.querySelector('#modal-pieza > div');
    if (type === 'chart') {
        modalBox.classList.remove('max-w-2xl');
        modalBox.classList.add('max-w-5xl');
    } else {
        modalBox.classList.remove('max-w-5xl');
        modalBox.classList.add('max-w-2xl');
    }
    document.getElementById('modal-titulo').textContent = idx !== null ? 'Editar Pieza' : 'Añadir Pieza';
    document.getElementById('modal-type').value = type;
    document.getElementById('modal-idx').value = idx !== null ? idx : '';
    document.getElementById('modal-campos').innerHTML = templates[type];
    if (type !== 'text' && type !== 'espacio') {
        var layoutWrap = document.createElement('div');
        layoutWrap.className = 'mb-4';
        layoutWrap.innerHTML = '<label class="block text-lg font-bold mb-1">Ajuste de texto</label>' +
            '<select name="layout" id="pieza-layout" class="w-full p-3 text-lg border-2 border-gray-300 rounded-xl">' +
            '<option value="inline">En línea</option>' +
            '<option value="detras">Detrás del texto</option>' +
            '<option value="delante">Delante del texto</option>' +
            '</select>' +
            '<p class="text-xs text-gray-500 mt-1">En línea: ocupa su lugar en el documento, en orden. Detrás/Delante: flota y se arrastra en el preview.</p>';
        document.getElementById('modal-campos').appendChild(layoutWrap);
        var idxVal = document.getElementById('modal-idx').value;
        if (idxVal !== '') {
            var piezasArr = JSON.parse(piezasInput.value || '[]');
            var pEdit = piezasArr[parseInt(idxVal)];
            if (pEdit && pEdit.layout) document.getElementById('pieza-layout').value = pEdit.layout;
        }
    }
    document.getElementById('modal-pieza').classList.remove('hidden');
    document.getElementById('modal-pieza').classList.add('flex');

    if (type === 'chart') {
        if (document.getElementById('modal-idx').value !== '') {
            const piezas = JSON.parse(piezasInput.value || '[]');
            const idxVal = parseInt(document.getElementById('modal-idx').value);
            const p = piezas[idxVal];
            if (p && p.config) {
                document.getElementById('chart-kind').value = p.config.kind || 'pie';
                document.getElementById('chart-labels').value = (p.config.labels || []).join(', ');
                document.getElementById('chart-data').value = (p.config.data || []).join(', ');
                document.getElementById('chart-colors-input').value = (p.config.colors || []).join(', ');
            }
        }
        renderPaletaColores();
        initChartPreview();
        ['chart-kind', 'chart-labels', 'chart-data', 'chart-colors-input', 'chart-size-slider'].forEach(id => {
            const el = document.getElementById(id);
            if (el) el.addEventListener('input', initChartPreview);
        });
    }
    if (type === 'text') {
        initTextToolbar();
        if (document.getElementById('modal-idx').value !== '') {
            const piezas = JSON.parse(piezasInput.value || '[]');
            const idxVal = parseInt(document.getElementById('modal-idx').value);
            const p = piezas[idxVal];
            if (p && p.content) {
                document.getElementById('text-editor').innerHTML = cleanOfficeContent(p.content);
            }
        }
        setTimeout(updateToolbarActive, 50);
    }
    if (type === 'image') setupImageUpload();
    if (type === 'collage') setupCollageUpload();
    if (type === 'espacio') {
        if (document.getElementById('modal-idx').value !== '') {
            const piezas = JSON.parse(piezasInput.value || '[]');
            const idxVal = parseInt(document.getElementById('modal-idx').value);
            const p = piezas[idxVal];
            if (p) {
                const h = (p.config && p.config.height) || p.height || 80;
                document.getElementById('espacio-height-range').value = h;
                document.getElementById('espacio-height-label').textContent = h + 'px';
            }
        }
    }
}

function closeModal() {
    document.getElementById('modal-pieza').classList.add('hidden');
    document.getElementById('modal-pieza').classList.remove('flex');
}

function initTextToolbar() {
    var toolbar = document.querySelector('.toolbar');
    if (!toolbar) return;

    toolbar.querySelectorAll('.toolbar-btn, .toolbar-select').forEach(function(ctl) {
        ctl.addEventListener('mousedown', function(e) {
            if (ctl.tagName === 'SELECT') {
                saveSelection();
            } else {
                e.preventDefault();
            }
        });
    });

    toolbar.addEventListener('click', function(e) {
        var btn = e.target.closest('.toolbar-btn');
        if (!btn) return;
        var editor = document.getElementById('text-editor');
        if (editor) editor.focus();
        document.execCommand('styleWithCSS', false, true);
        var cmd = btn.dataset.cmd;
        if (cmd === 'left' || cmd === 'center' || cmd === 'right' || cmd === 'justify') {
            var ALIGN_CMD = { left: 'justifyLeft', center: 'justifyCenter', right: 'justifyRight', justify: 'justifyFull' };
            document.execCommand(ALIGN_CMD[cmd]);
            updateToolbarActive(cmd);
        } else if (cmd) {
            document.execCommand(cmd, false, null);
            updateToolbarActive();
        }
    });

    toolbar.addEventListener('change', function(e) {
        var sel = e.target;
        if (!sel.classList || !sel.classList.contains('toolbar-select')) return;
        restoreSelection();
        var cmd = sel.dataset.cmd;
        var val = sel.value;
        if (cmd === 'fontSize' && val) {
            applyFontSize(parseInt(val));
        } else if (cmd && val) {
            document.execCommand(cmd, false, val);
        }
        sel.value = '';
    });

    var editor = document.getElementById('text-editor');
    if (editor) {
        editor.addEventListener('mouseup', updateToolbarActive);
        editor.addEventListener('keyup', updateToolbarActive);
        editor.addEventListener('paste', handleEditorPaste);
    }
}

function cleanOfficeContent(s) {
    return String(s || '').replace(/&nbsp;|&#160;|&#xa0;|\u00a0/g, ' ');
}

function handleEditorPaste(e) {
    var cd = e.clipboardData || window.clipboardData;
    if (!cd) return;
    e.preventDefault();
    var html = cd.getData('text/html');
    if (html) {
        document.execCommand('insertHTML', false, cleanOfficeContent(html));
    } else {
        document.execCommand('insertText', false, cd.getData('text/plain'));
    }
}

var savedRange = null;

function saveSelection() {
    var sel = window.getSelection();
    savedRange = (sel.rangeCount > 0) ? sel.getRangeAt(0).cloneRange() : null;
}

function restoreSelection() {
    var editor = document.getElementById('text-editor');
    if (!editor) return;
    editor.focus();
    var sel = window.getSelection();
    sel.removeAllRanges();
    if (savedRange) {
        try { sel.addRange(savedRange); } catch(e) {}
    }
}

function updateToolbarActive(lastAlign) {
    document.querySelectorAll('.toolbar-btn').forEach(function(btn) {
        var cmd = btn.dataset.cmd;
        if (cmd === 'left' || cmd === 'center' || cmd === 'right' || cmd === 'justify') {
            btn.classList.toggle('active', cmd === (lastAlign || 'left'));
        }
        if (cmd === 'bold') btn.classList.toggle('active', document.queryCommandState('bold'));
        if (cmd === 'italic') btn.classList.toggle('active', document.queryCommandState('italic'));
        if (cmd === 'underline') btn.classList.toggle('active', document.queryCommandState('underline'));
    });
}

function applyFontSize(px) {
    var editor = document.getElementById('text-editor');
    if (!editor) return;
    document.execCommand('styleWithCSS', false, false);
    document.execCommand('fontSize', false, '7');
    editor.querySelectorAll('font[size="7"]').forEach(function(f) {
        var span = document.createElement('span');
        span.style.fontSize = px + 'px';
        while (f.firstChild) span.appendChild(f.firstChild);
        if (f.parentNode) f.parentNode.replaceChild(span, f);
    });
}

document.addEventListener('DOMContentLoaded', function() {
    renderLista();
    renderPaletaColores();

    const buscarPieza = document.getElementById('buscar-pieza');
    if (buscarPieza) buscarPieza.addEventListener('input', renderLista);

    document.getElementById('btn-cancelar').addEventListener('click', closeModal);
    document.getElementById('btn-guardar-piezas').addEventListener('click', function() {
        document.getElementById('piezas-json-guardar').value = document.getElementById('piezas-json').value;
        document.getElementById('guardar-piezas-form').submit();
    });
    document.getElementById('btn-finalizar').addEventListener('click', function() {
        if (confirm('¿Finalizar el informe? Ya no podrás editarlo.')) {
            document.getElementById('piezas-json-finalizar').value = document.getElementById('piezas-json').value;
            document.getElementById('finalizar-form').submit();
        }
    });

    document.querySelectorAll('.btn-add-pieza').forEach(btn => {
        btn.addEventListener('click', function() {
            openModal(this.dataset.type);
        });
    });

    document.getElementById('form-pieza-modal').addEventListener('submit', function(e) {
    e.preventDefault();
    const form = new FormData(this);
    const type = form.get('type');
    const idx = form.get('idx');
    let pieza = { type };

    for (const [k, v] of form.entries()) {
        if (k !== 'type' && k !== 'idx') pieza[k] = v;
    }

    if (type === 'text') {
        var editor = document.getElementById('text-editor');
        if (editor) pieza.content = cleanOfficeContent(editor.innerHTML);
    }

    if (type === 'chart') {
        const labels = (pieza.labels || '').split(',').map(s => s.trim()).filter(Boolean);
        const data = (pieza.data || '').split(',').map(s => parseFloat(s.trim())).filter(n => !isNaN(n));
        const colors = (pieza.colors || '').split(',').map(s => s.trim()).filter(Boolean);
        const kind = pieza.kind || 'pie';

        const config = {
            kind: kind,
            labels: labels,
            data: data,
            colors: colors
        };

        const svgSize = parseInt(document.getElementById('chart-size-slider').value) || 280;
        const svg = generateSimpleChartSVG(kind, labels, data, colors, svgSize, svgSize);
        config.image_base64 = btoa(svg);
        config.mime = 'svg';

        delete pieza.kind;
        delete pieza.labels;
        delete pieza.data;
        delete pieza.colors;
        pieza.config = config;
    }

    if (type === 'image') {
        pieza.config = pieza.config || {};
        if (window.previewImg && window.previewImg.src && window.previewImg.src.startsWith('data:')) {
            pieza.config.image_base64 = window.previewImg.src.split(',')[1];
            pieza.config.mime = 'png';
        }
    }

    if (type === 'espacio') {
        var espH = parseInt(document.getElementById('espacio-height-range').value) || 80;
        pieza.config = { height: espH };
        delete pieza.height;
    }

    var layout = form.get('layout') || 'inline';
    pieza.layout = layout;
    var isInFlow = layout === 'inline';
    var defaultX = isInFlow ? 0 : 5;
    var defaultW = isInFlow ? 100 : 90;
    let piezas = JSON.parse(piezasInput.value || '[]');
    if (idx !== '' && piezas[idx]) {
        pieza.posX = piezas[idx].posX !== undefined ? piezas[idx].posX : defaultX;
        pieza.posY = piezas[idx].posY !== undefined ? piezas[idx].posY : Math.min(70, 10 + piezas.length * 18);
        pieza.width = piezas[idx].width || defaultW;
        piezas[idx] = pieza;
    } else {
        pieza.posX = defaultX;
        const pCount = piezas.length;
        pieza.posY = Math.min(70, 10 + pCount * 18);
        pieza.width = defaultW;
        piezas.push(pieza);
    }

    document.getElementById('piezas-json').value = JSON.stringify(piezas);
    renderLista();
    closeModal();
    });
});

['chart-kind', 'chart-labels', 'chart-data', 'chart-colors-input'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.addEventListener('input', initChartPreview);
});

document.addEventListener('input', function(e) {
    if (e.target.id === 'espacio-height-range') {
        document.getElementById('espacio-height-label').textContent = e.target.value + 'px';
    }
});
</script>
