<?php

interface ComponenteInterface
{
    public static function fromArray(array $data): self;
    
    public function toArray(): array;
    
    public function render(): string;
    
    public function getType(): string;
}