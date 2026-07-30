<?php

class ChartGenerator {
    public static function generate($kind, $labels, $data, $colors, $width = 600, $height = 400) {
        $svg = self::generateSVG($kind, $labels, $data, $colors, $width, $height);
        if (!$svg) return null;
        
        $uploadDir = __DIR__ . '/../../pdf/charts/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $filename = 'chart_' . uniqid() . '.jpg';
        $svgFile = $uploadDir . uniqid() . '.svg';
        file_put_contents($svgFile, $svg);
        
        $jpgFile = $uploadDir . $filename;
        exec("convert -background white $svgFile $jpgFile 2>&1");
        unlink($svgFile);
        
        if (file_exists($jpgFile)) {
            return 'pdf/charts/' . $filename;
        }
        
        return null;
    }
    
    public static function generateSVG($kind, $labels, $data, $colors, $width, $height) {
        $padding = 50;
        $innerW = $width - $padding * 2;
        $innerH = $height - $padding * 2;
        $usedColors = $colors ?: ['#EF7F31', '#7CB342', '#4D813F', '#E02C35', '#FDF9F3', '#424242'];
        
        $svg = "<svg xmlns='http://www.w3.org/2000/svg' width='$width' height='$height' viewBox='0 0 $width $height'>";
        $svg .= "<rect width='$width' height='$height' fill='#fff'/>";
        
        if ($kind === 'pie') {
            $angle = 0;
            $total = array_sum($data);
            $cx = $width / 2;
            $cy = $height / 2;
            $r = $innerW / 2;
            foreach ($data as $i => $val) {
                $a = ($val / $total) * 2 * M_PI;
                $x1 = $cx + 20 * cos($angle);
                $y1 = $cy + 20 * sin($angle);
                $x2 = $cx + $r * cos($angle + $a);
                $y2 = $cy + $r * sin($angle + $a);
                $large = $a > M_PI ? 1 : 0;
                $c = $usedColors[$i % count($usedColors)];
                $svg .= "<path d='M $cx $cy L $x1 $y1 A $r " . ($innerH/2) . " 0 $large 1 $x2 $y2 Z' fill='$c'/>";
                $angle += $a;
            }
        } else if ($kind === 'bar') {
            $maxVal = max($data);
            $barW = $innerW / count($data) * 0.7;
            foreach ($data as $i => $val) {
                $h = ($val / $maxVal) * $innerH;
                $x = $padding + $i * ($barW + $innerW/count($data)*0.3) + ($innerW/count($data)*0.3)/2;
                $y = $height - $padding - $h;
                $svg .= "<rect x='$x' y='$y' width='$barW' height='$h' fill='{$usedColors[$i % count($usedColors)]}'/>";
            }
        } else if ($kind === 'line') {
            if (count($data) < 2) return $svg;
            $maxVal = max($data);
            $step = $innerW / (count($data) - 1);
            $points = [];
            foreach ($data as $i => $v) {
                $points[] = ['x' => $padding + $i*$step, 'y' => $height - $padding - ($v/$maxVal)*$innerH];
            }
            $path = '';
            foreach ($points as $i => $p) {
                $path .= ($i === 0 ? "M {$p['x']} {$p['y']}" : "L {$p['x']} {$p['y']}") . ' ';
            }
            $svg .= "<path d='$path' fill='none' stroke='#333' stroke-width='2'/>";
            foreach ($points as $i => $p) {
                $svg .= "<circle cx='{$p['x']}' cy='{$p['y']}' r='3' fill='{$usedColors[$i % count($usedColors)]}'/>";
            }
        }
        $svg .= '</svg>';
        return $svg;
    }
}