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
            padding: 110pt 43pt 57pt 85pt;
        }
        .doc-date {
            text-align: right; font-size: 12pt; margin-bottom: 2pt; padding-top: 8pt;
        }
        .doc-author {
            text-align: left; font-size: 12pt; margin-bottom: 14pt;
        }
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
    </style>
</head>
<body>
    <div class="page-wrap">
        <img class="page-bg" src="data:image/png;base64,<?= $bgB64 ?>" alt="">
        <div class="page-content">

            <div class="doc-date">Guatire, <?= date('d/m/Y') ?></div>
            <div class="doc-author"><?= nl2br(htmlspecialchars($informe['elaborado_por'])) ?></div>

            <div class="data-line">
                <b>Tipo:</b> <?= htmlspecialchars($informe['tipo_personalizado'] ?: $informe['tipo_nombre']) ?> &nbsp;|&nbsp;
                <b>Fecha:</b> <?= date('d/m/Y') ?> &nbsp;|&nbsp;
                <b>N&deg;:</b> <?= str_pad((string)$informe['id'], 4, '0', STR_PAD_LEFT) ?>
            </div>

            <div class="section">
                <h3>Motivo</h3>
                <div class="content"><?= nl2br(htmlspecialchars($informe['motivo'])) ?></div>
            </div>

            <div class="section">
                <h3>Observaciones</h3>
                <div class="content"><?= nl2br(htmlspecialchars($informe['observaciones'])) ?></div>
            </div>

            <div class="firma">
                <div class="linea">Firma del Responsable</div>
            </div>

        </div>
    </div>
</body>
</html>
