<?php

class CollageComponente implements ComponenteInterface
{
    private array $images;
    private string $layout;
    
    public function __construct(array $images = [], string $layout = 'grid')
    {
        $this->images = $images;
        $this->layout = $layout;
    }
    
    public static function fromArray(array $data): self
    {
        $images = [];
        if (!empty($data['images'])) {
            foreach ($data['images'] as $img) {
                $images[] = [
                    'base64' => $img['base64'] ?? '',
                    'mime' => $img['mime'] ?? 'png',
                ];
            }
        }
        
        return new self($images, $data['layout'] ?? 'grid');
    }
    
    public function toArray(): array
    {
        return [
            'type' => 'collage',
            'images' => $this->images,
            'layout' => $this->layout,
        ];
    }
    
    public function render(): string
    {
        if (empty($this->images)) {
            return '<div class="componente-collage">Sin imágenes</div>';
        }
        
        $html = '<div class="componente-collage" style="display: ' . ($this->layout === 'grid' ? 'grid' : 'flex') . ';">';
        
        foreach ($this->images as $img) {
            $src = 'data:' . $img['mime'] . ';base64,' . $img['base64'];
            $style = $this->layout === 'grid' 
                ? 'width: 30%; height: auto; object-fit: cover; margin: 2pt;'
                : 'width: calc(50% - 4pt); height: auto; margin: 2pt;';
            $html .= '<img src="' . $src . '" style="' . $style . '">';
        }
        
        $html .= '</div>';
        return $html;
    }
    
    public function getType(): string
    {
        return 'collage';
    }
    
    public function getImages(): array
    {
        return $this->images;
    }
    
    public function getLayout(): string
    {
        return $this->layout;
    }
}