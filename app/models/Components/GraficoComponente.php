<?php

class GraficoComponente implements ComponenteInterface
{
    private string $kind;
    private array $labels;
    private array $data;
    private array $colors;
    private ?string $svgBase64 = null;

    public function __construct(string $kind = 'pie', array $labels = [], array $data = [], array $colors = [], ?string $svgBase64 = null)
    {
        $this->kind = $kind;
        $this->labels = $labels;
        $this->data = $data;
        $this->colors = $colors ?: ['#EF7F31', '#7CB342', '#4D813F', '#E02C35', '#FDF9F3', '#424242'];
        $this->svgBase64 = $svgBase64;
    }

    public static function fromArray(array $data): self
    {
        $config = $data['config'] ?? [];
        return new self(
            $config['kind'] ?? 'pie',
            $config['labels'] ?? [],
            $config['data'] ?? [],
            $config['colors'] ?? [],
            $config['image_base64'] ?? null
        );
    }

    public function toArray(): array
    {
        return [
            'type' => 'chart',
            'config' => [
                'kind' => $this->kind,
                'labels' => $this->labels,
                'data' => $this->data,
                'colors' => $this->colors,
            ],
        ];
    }

    public function render(): string
    {
        $svgBase64 = $this->svgBase64;
        if (!$svgBase64) {
            $svg = $this->generateSVG();
            if (!$svg) {
                return '<div class="componente-grafico">Error al generar gráfico</div>';
            }
            $svgBase64 = base64_encode($svg);
        }

        $mime = 'svg+xml';
        $imgSrc = 'data:image/' . $mime . ';base64,' . $svgBase64;
        $imgTag = '<img src="' . $imgSrc . '" alt="Gráfico" style="max-width:100%; height: auto; display: block; margin: 0 auto;">';

        return '<div class="componente-grafico" style="text-align: center;">' . $imgTag . '</div>';
    }

    public function getType(): string
    {
        return 'chart';
    }

    private function generateSVG(): string
    {
        $padding = 50;
        $width = 600;
        $height = 600;
        $legendH = !empty($this->labels) ? 22 : 0;
        $chartH = $height - $legendH;
        $innerW = min($width - $padding * 2, $width * 0.75);
        $innerH = min($chartH - $padding, $width * 0.65);

        $svg = "<svg xmlns='http://www.w3.org/2000/svg' width='$width' height='$height' viewBox='0 0 $width $height'>";
        $svg .= "<rect width='$width' height='$height' fill='#fff'/>";

        if ($this->kind === 'pie') {
            $svg .= $this->renderPieChart($padding, $innerW, $innerH, $width, $chartH);
        } elseif ($this->kind === 'bar') {
            $svg .= $this->renderBarChart($padding, $innerW, $innerH, $width, $chartH);
        } elseif ($this->kind === 'line') {
            $svg .= $this->renderLineChart($padding, $innerW, $innerH, $width, $chartH);
        }

        if (!empty($this->labels)) {
            $legendY = $chartH + 20;
            $n = count($this->labels);
            $sectionW = $width / $n;
            foreach ($this->labels as $i => $label) {
                $ly = $legendY;
                $val = $this->data[$i] ?? '';
                $c = $this->colors[$i % count($this->colors)];
                $textStr = "$label: $val";
                $textW = strlen($textStr) * 6.5;
                $totalW = 14 + $textW;
                $centerX = $sectionW / 2 + $i * $sectionW;
                $startX = $centerX - $totalW / 2;
                $svg .= "<rect x='$startX' y='" . ($ly - 7) . "' width='10' height='10' fill='$c'/>";
                $svg .= "<text x='" . ($startX + 14) . "' y='" . ($ly + 1) . "' font-size='11' fill='#333'>$textStr</text>";
            }
        }

        $svg .= '</svg>';
        return $svg;
    }

    private function renderPieChart($padding, $innerW, $innerH, $width, $height): string
    {
        $svg = '';
        $angle = 0;
        $total = array_sum($this->data);
        $cx = $width / 2;
        $cy = ($height + $padding) / 2;
        $r = min($innerW, $height - $padding, $width * 0.5) / 2;

        foreach ($this->data as $i => $val) {
            $a = ($val / $total) * 2 * M_PI;
            $x1 = $cx + $r * cos($angle);
            $y1 = $cy + $r * sin($angle);
            $x2 = $cx + $r * cos($angle + $a);
            $y2 = $cy + $r * sin($angle + $a);
            $large = $a > M_PI ? 1 : 0;
            $c = $this->colors[$i % count($this->colors)];
            $svg .= "<path d='M $cx $cy L $x1 $y1 A $r $r 0 $large 1 $x2 $y2 Z' fill='$c'/>";
            $angle += $a;
        }

        return $svg;
    }

    private function renderBarChart($padding, $innerW, $innerH, $width, $height): string
    {
        $svg = '';
        $maxVal = max($this->data);
        if ($maxVal == 0) return $svg;
        $n = count($this->data);
        $gap = $innerW * 0.15 / $n;
        $barW = ($innerW - $gap * ($n + 1)) / $n;

        foreach ($this->data as $i => $val) {
            $h = ($val / $maxVal) * $innerH;
            $x = $padding + $gap + $i * ($barW + $gap);
            $y = $height - $h;
            $svg .= "<rect x='$x' y='$y' width='$barW' height='$h' fill='{$this->colors[$i % count($this->colors)]}'/>";
        }

        return $svg;
    }

    private function renderLineChart($padding, $innerW, $innerH, $width, $height): string
    {
        $svg = '';
        if (count($this->data) < 2) return $svg;

        $maxVal = max($this->data);
        $step = $innerW / (count($this->data) - 1);
        $points = [];

        foreach ($this->data as $i => $v) {
            $points[] = ['x' => $padding + $i*$step, 'y' => $height - ($v/$maxVal)*$innerH];
        }

        $path = '';
        foreach ($points as $i => $p) {
            $path .= ($i === 0 ? "M {$p['x']} {$p['y']}" : "L {$p['x']} {$p['y']}") . ' ';
        }
        $svg .= "<path d='$path' fill='none' stroke='#333' stroke-width='2'/>";

        foreach ($points as $i => $p) {
            $svg .= "<circle cx='{$p['x']}' cy='{$p['y']}' r='3' fill='{$this->colors[$i % count($this->colors)]}'/>";
        }

        return $svg;
    }

    public function getKind(): string
    {
        return $this->kind;
    }

    public function getLabels(): array
    {
        return $this->labels;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
