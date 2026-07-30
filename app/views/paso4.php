<style>main { max-width: none !important; }
.preview-page {
    position: relative;
    width: 100%;
    aspect-ratio: 612 / 792;
    background: #fff;
    box-shadow: 0 4px 20px rgba(0,0,0,0.15);
    border-radius: 4px;
    overflow-y: auto;
    box-sizing: border-box;
}
.preview-page .page-bg {
    position: absolute; top: 0; left: 0;
    width: 100%; height: 100%;
    z-index: 0;
    display: block;
}
.preview-page .page-content {
    position: relative; z-index: 1;
    padding: 13.9% 7% 7.2% 13.9%;
    font-family: 'Times', 'Times New Roman', serif;
    font-size: 12pt;
    line-height: 1.5;
    color: #000;
}
.preview-page .pdf-date { text-align: right; font-size: 12pt; margin-bottom: 2pt; padding-top: 8pt; }
.preview-page .pdf-author { text-align: left; font-size: 12pt; margin-bottom: 14pt; }
.preview-page .pdf-data-line { text-align: center; font-size: 11pt; margin-bottom: 14pt; }
.preview-page .pdf-section { margin-bottom: 10pt; }
.preview-page .pdf-section h3 { font-size: 12pt; font-weight: bold; margin-bottom: 4pt; }
.preview-page .pdf-content { font-size: 12pt; text-align: justify; }
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
                <button type="button" class="btn-add-pieza bg-rosa border-b-4 border-pink-700 shadow-md p-4 rounded-xl text-white hover:shadow-lg hover:-translate-y-0.5 active:translate-y-0.5 transition-all duration-150 flex flex-col items-center col-span-2" data-type="collage">
                    <i class="fa-solid fa-images text-3xl text-crema opacity-80" style="text-shadow: 0 2px 3px rgba(0,0,0,0.25);"></i>
                    <span class="text-sm font-bold mt-1.5">Collage</span>
                </button>
            </div>
        </div>

        <div class="max-w-3xl bg-white p-8 rounded-2xl shadow-lg flex-1">
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

            <div id="lista-piezas" class="space-y-3 mb-4">
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
#chart-size-slider {
    -webkit-appearance: none;
    appearance: none;
    height: 8px;
    background: #e5e7eb;
    border-radius: 4px;
    outline: none;
}
#chart-size-slider::-webkit-slider-thumb {
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
#chart-size-slider::-webkit-slider-thumb:hover {
    transform: scale(1.15);
}
#chart-size-slider::-moz-range-thumb {
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
        <textarea name="content" rows="6" class="w-full p-4 text-lg border-2 border-gray-300 rounded-xl focus:outline-none focus:border-verdeOscuro" placeholder="Escribe aquí el texto..."></textarea></div>`,
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
                <input type="range" id="chart-size-slider" min="180" max="400" value="280" class="w-full">
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
        </select></div>`
};

function generateSimpleChartSVG(kind, labels, data, colors, width, height) {
    const padding = 50;
    const fontSize = Math.max(8, Math.round(width * 0.04));
    const legendH = labels.length ? Math.round(fontSize * 2) : 0;
    const chartH = height - legendH;
    const innerW = width - padding * 2;
    const innerH = chartH - padding;
    const usedColors = colors.length ? colors : ['#EF7F31', '#7CB342', '#4D813F', '#E02C35', '#FDF9F3', '#424242'];

    let svg = `<svg xmlns="http://www.w3.org/2000/svg" width="${width}" height="${height}" viewBox="0 0 ${width} ${height}">`;
    svg += `<rect width="${width}" height="${height}" fill="#fff"/>`;

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
    if (piezas.length === 0) {
        lista.innerHTML = '<div class="text-center py-12 bg-gray-50 rounded-xl border-2 border-dashed border-gray-300"><i class="fa-solid fa-puzzle-piece text-5xl text-gray-300 mb-3 block"></i><p class="text-xl text-gray-500 mb-4">No hay piezas aún. Añade la primera pieza abajo.</p></div>';
        renderPDFPreview();
        return;
    }
    const typeColors = { text: 'border-l-naranja', table: 'border-l-verdeClaro', chart: 'border-l-azul', image: 'border-l-morado', collage: 'border-l-rosa' };
    lista.innerHTML = piezas.map((p, i) => `
        <div class="pieza-item bg-white border-2 border-gray-200 border-l-8 ${typeColors[p.type] || 'border-l-naranja'} rounded-xl shadow-md p-4 flex items-center gap-4 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200" data-idx="${i}">
            <span class="text-gray-400 text-2xl cursor-move select-none" title="Arrastrar">⋮⋮</span>
            <div class="flex-1">
                <div class="flex items-center gap-2">
                    <span class="bg-naranja text-white px-2 py-1 rounded text-sm font-bold">${p.type.charAt(0).toUpperCase() + p.type.slice(1)}</span>
                    <span class="text-gray-700 font-medium">${getResumen(p)}</span>
                </div>
                <div class="text-xs text-gray-400 mt-1">${getDetalle(p)}</div>
            </div>
            <div class="flex items-center gap-2">
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
    renderPDFPreview();
}

function renderPDFPreview() {
    const container = document.getElementById('pdf-preview');
    if (!container) return;
    const piezas = JSON.parse(piezasInput.value || '[]');
    let innerHtml;
    if (!INFORME_DATA) {
        innerHtml = '<div class="text-center text-gray-400" style="padding:20pt">Primero debes crear el informe en el paso 3</div>';
    } else if (piezas.length === 0) {
        innerHtml = '<div class="text-center text-gray-400" style="padding:20pt">Añade piezas para ver la previsualización</div>';
    } else {
        const dateStr = new Date().toLocaleDateString('es-ES', { day: 'numeric', month: 'long', year: 'numeric' });
        innerHtml = '<div class="pdf-date">Guatire, ' + dateStr + '</div>';
        innerHtml += '<div class="pdf-author">' + escHtml(INFORME_DATA.elaborado_por || '') + '</div>';
        innerHtml += '<div class="pdf-data-line"><b>Tipo:</b> ' + escHtml(INFORME_DATA.tipo_personalizado || INFORME_DATA.tipo_nombre || '') + ' &nbsp;|&nbsp; <b>N&deg;:</b> ' + String(INFORME_DATA.id || '').padStart(4, '0') + '</div>';
        innerHtml += '<div class="pdf-section"><h3>Motivo</h3><div class="pdf-content">' + escHtml(INFORME_DATA.motivo || '') + '</div></div>';
        innerHtml += '<div class="pdf-section"><h3>Observaciones</h3><div class="pdf-content">' + escHtml(INFORME_DATA.observaciones || '') + '</div></div>';
        piezas.forEach(function(p) { innerHtml += renderPiezaPreview(p); });
        innerHtml += '<div class="pdf-firma"><div class="pdf-linea">Firma del Responsable</div></div>';
    }
    container.innerHTML = '<img class="page-bg" src="assets/img/pagina.png" alt=""><div class="page-content">' + innerHtml + '</div>';
}

function renderPiezaPreview(p) {
    switch (p.type) {
        case 'text':
            return '<div class="pdf-section"><div class="pdf-content">' + (p.content || '') + '</div></div>';
        case 'table': {
            const headers = (p.headers || '').split(',').map(s => s.trim()).filter(Boolean);
            const rows = (p.rows || '').split('\n').filter(Boolean).map(r => r.split(',').map(s => s.trim()));
            let table = '<table class="pdf-table"><thead><tr>';
            headers.forEach(h => table += '<th>' + escHtml(h) + '</th>');
            table += '</tr></thead><tbody>';
            rows.forEach(row => {
                table += '<tr>';
                row.forEach(cell => table += '<td>' + escHtml(cell) + '</td>');
                table += '</tr>';
            });
            table += '</tbody></table>';
            return table;
        }
        case 'chart': {
            const config = p.config || {};
            if (config.image_base64) {
                return '<div class="pdf-chart"><img src="data:image/svg+xml;base64,' + config.image_base64 + '" style="display:block; margin:0 auto; max-width:100%"></div>';
            }
            const svg = generateSimpleChartSVG(config.kind || 'pie', config.labels || [], config.data || [], config.colors || [], 280, 280);
            return '<div class="pdf-chart" style="text-align:center">' + svg + '</div>';
        }
        case 'image': {
            const config = p.config || {};
            if (config.image_base64) {
                let img = '<img src="data:' + (config.mime || 'image/png') + ';base64,' + config.image_base64 + '" style="max-width:100%">';
                let cap = config.caption ? '<div class="pdf-caption">' + escHtml(config.caption) + '</div>' : '';
                return '<div class="pdf-image">' + img + cap + '</div>';
            }
            return '';
        }
        case 'collage': {
            const imgs = (p.images || []).map(function(img) {
                return '<img src="data:' + (img.mime || 'image/png') + ';base64,' + (img.base64 || '') + '">';
            }).join('');
            return imgs ? '<div class="pdf-collage">' + imgs + '</div>' : '';
        }
        default:
            return '';
    }
}

function escHtml(str) {
    if (!str) return '';
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

function getResumen(p) {
    if (p.type === 'text') return p.content?.slice(0, 50) + '...';
    if (p.type === 'table') return `${(p.headers?.split(',').length || 0)} columnas × ${(p.rows?.split('\n').length || 0)} filas`;
    if (p.type === 'chart') return `${p.kind} · ${(p.labels?.split(',').length || 0)} series`;
    if (p.type === 'image') return p.caption || 'Imagen';
    if (p.type === 'collage') return `${p.images?.length || 0} imágenes · ${p.layout}`;
    return '';
}

function getDetalle(p) {
    if (p.type === 'text') return 'Texto libre';
    if (p.type === 'table') return 'Tabla de datos';
    if (p.type === 'chart') return `${p.kind} chart`;
    if (p.type === 'image') return 'Imagen única';
    if (p.type === 'collage') return 'Collage de imágenes';
    return '';
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
    if (type === 'image') setupImageUpload();
    if (type === 'collage') setupCollageUpload();
}

function closeModal() {
    document.getElementById('modal-pieza').classList.add('hidden');
    document.getElementById('modal-pieza').classList.remove('flex');
}

document.addEventListener('DOMContentLoaded', function() {
    renderLista();
    renderPaletaColores();

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

    let piezas = JSON.parse(piezasInput.value || '[]');
    if (idx !== '') piezas[idx] = pieza;
    else piezas.push(pieza);

    document.getElementById('piezas-json').value = JSON.stringify(piezas);
    renderLista();
    closeModal();
    });
});

['chart-kind', 'chart-labels', 'chart-data', 'chart-colors-input'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.addEventListener('input', initChartPreview);
});
</script>
