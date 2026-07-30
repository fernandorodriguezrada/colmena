<?php

class TablaComponente implements ComponenteInterface
{
    private array $headers;
    private array $rows;
    
    public function __construct(array $headers = [], array $rows = [])
    {
        $this->headers = $headers;
        $this->rows = $rows;
    }
    
    public static function fromArray(array $data): self
    {
        $headers = [];
        if (!empty($data['headers'])) {
            $headers = array_map('trim', explode(',', $data['headers']));
        }
        
        $rows = [];
        if (!empty($data['rows'])) {
            foreach (explode("\n", $data['rows']) as $line) {
                $line = trim($line);
                if ($line) {
                    $rows[] = array_map('trim', explode(',', $line));
                }
            }
        }
        
        return new self($headers, $rows);
    }
    
    public function toArray(): array
    {
        return [
            'type' => 'table',
            'headers' => implode(',', $this->headers),
            'rows' => implode("\n", array_map(function($row) {
                return implode(',', $row);
            }, $this->rows)),
        ];
    }
    
    public function render(): string
    {
        $html = '<table class="componente-tabla" style="width:100%; border-collapse: collapse; margin: 15pt 0;">';
        
        if (!empty($this->headers)) {
            $html .= '<thead><tr>';
            foreach ($this->headers as $header) {
                $html .= '<th style="border: 1px solid #ddd; padding: 8pt; background: #f5f5f5; font-weight: bold;">' . htmlspecialchars($header) . '</th>';
            }
            $html .= '</tr></thead>';
        }
        
        if (!empty($this->rows)) {
            $html .= '<tbody>';
            foreach ($this->rows as $row) {
                $html .= '<tr>';
                foreach ($row as $cell) {
                    $html .= '<td style="border: 1px solid #ddd; padding: 8pt;">' . htmlspecialchars($cell) . '</td>';
                }
                $html .= '</tr>';
            }
            $html .= '</tbody>';
        }
        
        $html .= '</table>';
        return $html;
    }
    
    public function getType(): string
    {
        return 'table';
    }
    
    public function getHeaders(): array
    {
        return $this->headers;
    }
    
    public function getRows(): array
    {
        return $this->rows;
    }
}