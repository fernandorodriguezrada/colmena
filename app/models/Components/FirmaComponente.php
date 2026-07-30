<?php

class FirmaComponente implements ComponenteInterface
{
    private string $nombre;
    private string $titulo;

    public function __construct(string $nombre = '', string $titulo = '')
    {
        $this->nombre = $nombre;
        $this->titulo = $titulo;
    }

    public static function fromArray(array $data): self
    {
        $config = $data['config'] ?? [];
        return new self(
            $config['nombre'] ?? $data['nombre'] ?? '',
            $config['titulo'] ?? $data['titulo'] ?? ''
        );
    }

    public function toArray(): array
    {
        return [
            'type' => 'firma',
            'config' => [
                'nombre' => $this->nombre,
                'titulo' => $this->titulo,
            ],
        ];
    }

    public function render(): string
    {
        $nombre = htmlspecialchars($this->nombre);
        $titulo = htmlspecialchars($this->titulo);
        $html = '<div class="componente-firma" style="margin-top: 32pt; text-align: center;">';
        $html .= '<div style="border-top: 1px solid #000; width: 240pt; margin: 0 auto; padding-top: 4pt;">';
        if ($nombre) {
            $html .= $nombre;
        }
        if ($titulo) {
            $html .= '<br><span style="font-size: 10pt; color: #555;">' . $titulo . '</span>';
        }
        $html .= '</div></div>';
        return $html;
    }

    public function getType(): string
    {
        return 'firma';
    }

    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }
}