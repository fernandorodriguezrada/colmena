<?php

class EspacioComponente implements ComponenteInterface
{
    private int $height;

    public function __construct(int $height = 80)
    {
        $this->height = $height;
    }

    public static function fromArray(array $data): self
    {
        $config = $data['config'] ?? [];
        $height = (int)($config['height'] ?? $data['height'] ?? 80);
        return new self(max(1, $height));
    }

    public function render(): string
    {
        $h = max(1, $this->height);
        return "<div class='componente-espacio' style='height:{$h}px;'></div>";
    }

    public function toArray(): array
    {
        return [
            'type' => 'espacio',
            'config' => ['height' => $this->height],
        ];
    }

    public function getType(): string
    {
        return 'espacio';
    }
}
