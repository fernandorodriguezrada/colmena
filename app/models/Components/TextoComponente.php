<?php

class TextoComponente implements ComponenteInterface
{
    private string $content;
    
    public function __construct(string $content = '')
    {
        $this->content = $content;
    }
    
    public static function fromArray(array $data): self
    {
        return new self($data['content'] ?? '');
    }
    
    public function toArray(): array
    {
        return [
            'type' => 'text',
            'content' => $this->content,
        ];
    }
    
    public function render(): string
    {
        return "<div class='componente-texto'>" . $this->content . "</div>";
    }
    
    public function getType(): string
    {
        return 'text';
    }
    
    public function getContent(): string
    {
        return $this->content;
    }
}