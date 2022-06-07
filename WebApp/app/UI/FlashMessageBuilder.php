<?php

namespace App\UI;

class FlashMessageBuilder
{
    private array $data = [];

    private function __construct()
    {
    }

    public static function newInstance(): self
    {
        return new self();
    }

    public function setIcon(string $icon): self
    {
        $this->data['icon'] = $icon;
        return $this;
    }

    public function setColour(string $icon): self
    {
        $this->data['colour'] = $icon;
        return $this;
    }

    public function setText(string $icon): self
    {
        $this->data['text'] = $icon;
        return $this;
    }

    public function build(): array
    {
        return $this->data;
    }
}
