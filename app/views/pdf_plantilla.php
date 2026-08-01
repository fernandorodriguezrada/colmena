<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <style>
        @page { margin: 0; padding: 0; }
        body {
            margin: 0; padding: 0;
            font-family: 'Times', 'Times New Roman', serif;
            font-size: 12pt;
            color: #000;
            line-height: 1.5;
        }
        .page-wrap { position: relative; width: 612pt; min-height: 792pt; }
        .page-bg {
            position: absolute; top: 0; left: 0;
            width: 612pt; height: 792pt; z-index: -1;
        }
        .page-content {
            position: relative; z-index: 1;
            width: 612pt; min-height: 792pt;
        }
        .page-flow {
            position: relative;
            padding: 110pt 43pt 57pt 85pt;
        }
        .flujo-contenido { position: relative; z-index: 1; }
        .componente-wrapper.detras { z-index: 0; }
        .componente-wrapper.delante { z-index: 2; }
        .data-line {
            text-align: center; font-size: 11pt; margin-bottom: 14pt;
        }
        .section { margin-bottom: 10pt; }
        .section h3 {
            font-size: 12pt; font-weight: bold; margin-bottom: 4pt;
        }
        .section .content {
            font-size: 12pt; text-align: justify; text-indent: 2em;
        }
        .firma { margin-top: 32pt; text-align: center; }
        .firma .linea {
            border-top: 1px solid #000;
            width: 240pt; margin: 0 auto;
            padding-top: 4pt; font-size: 10pt; color: #555;
        }
        .componente-texto { margin-bottom: 10pt; }
        .componente-texto p { margin: 0 0 8pt 0; text-align: justify; }
        .componente-espacio { pointer-events: none; }
        .componente-tabla { margin: 15pt 0; }
        .componente-grafico { text-align: center; margin: 10pt 0; }
        .componente-grafico img,
        .componente-imagen img { max-width: 100%; height: auto; }
        .componente-imagen { text-align: center; margin: 10pt 0; }
        .componente-collage { text-align: center; margin: 10pt 0; }
        .componente-collage img { width: 30%; height: auto; margin: 2pt; }
        .componente-firma { margin-top: 32pt; text-align: center; }
    </style>
</head>
<body>
    <div class="page-wrap">
        <img class="page-bg" src="data:image/png;base64,<?= $bgB64 ?>" alt="">
        <div class="page-content">
            <div class="page-flow">
                <?= $componentesDetras ?>

                <div class="flujo-contenido">
                    <div class="data-line">
                        <b>Tipo:</b> <?= htmlspecialchars($informe['tipo_personalizado'] ?: $informe['tipo_nombre']) ?> &nbsp;|&nbsp;
                        <b>N&deg;:</b> <?= str_pad((string)$informe['id'], 4, '0', STR_PAD_LEFT) ?>
                    </div>

                    <?= $componentesFlujo ?>
                </div>

                <?= $componentesDelante ?>
            </div>
        </div>
    </div>
</body>
</html>
