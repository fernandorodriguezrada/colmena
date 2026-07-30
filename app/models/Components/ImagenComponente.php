<?php

class ImagenComponente implements ComponenteInterface
{
    private string $imageBase64;
    private string $mimeType;
    private string $caption;
    
    public function __construct(string $imageBase64 = '', string $mimeType = 'png', string $caption = '')
    {
        $this->imageBase64 = $imageBase64;
        $this->mimeType = $mimeType;
        $this->caption = $caption;
    }
    
    public static function fromArray(array $data): self
    {
        $config = $data['config'] ?? [];
        return new self(
            $config['image_base64'] ?? '',
            $config['mime'] ?? 'png',
            $config['caption'] ?? ''
        );
    }
    
    public function toArray(): array
    {
        return [
            'type' => 'image',
            'config' => [
                'image_base64' => $this->imageBase64,
                'mime' => $this->mimeType,
                'caption' => $this->caption,
            ],
        ];
    }
    
    public function render(): string
    {
        if (empty($this->imageBase64)) {
            return '<div class="componente-imagen">Sin imagen</div>';
        }
        
        $imgSrc = 'data:' . $this->mimeType . ';base64,' . $this->imageBase64;
        $html = '<img src="' . $imgSrc . '" alt="Imagen" style="max-width:100%; height: auto; display: block; margin: 0 auto;">';
        
        if (!empty($this->caption)) {
            $html .= '<div style="text-align: center; font-size: 10pt; color: #666; margin-top: 5pt;">' . htmlspecialchars($this->caption) . '</div>';
        }
        
        return '<div class="componente-imagen">' . $html . '</div>';
    }
    
    public function getType(): string
    {
        return 'image';
    }
    
    public function getImageBase64(): string
    {
        return $this->imageBase64;
    }
    
    public function getCaption(): string
    {
        return $this->caption;
    }
}