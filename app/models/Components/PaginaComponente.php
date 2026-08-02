<?php

class PaginaComponente implements ComponenteInterface
{
    public function __construct()
    {
    }

    public static function fromArray(array $data): self
    {
        return new self();
    }

    public function render(): string
    {
        return '';
    }

    public function toArray(): array
    {
        return [
            'type' => 'pagina',
            'config' => [],
        ];
    }

    public function getType(): string
    {
        return 'pagina';
    }
}
