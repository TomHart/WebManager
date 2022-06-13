<?php

namespace App\Http\Livewire\Frontend\Component;

use Illuminate\View\View;
use Livewire\Component;

class Carousel extends Component
{
    public string $loadFrom;
    public int $offset = 0;
    public array $files;

    public function render(): View
    {
        $this->files = $this->getFiles();
        return view('livewire.frontend.component.carousel', ['files' => $this->files]);
    }

    private function getFiles(): array
    {
        switch ($this->loadFrom) {
            case 'carousel':
                return array_map(static function (string $file) {
                    return str_replace(public_path(), '', $file);
                }, glob(public_path('/img/carousel/*')));

            default:
                return [];
        }
    }

    public function move(string $direction): void
    {
        switch ($direction) {
            case 'left':
                if ($this->offset === 0) {
                    $this->offset = (count($this->files) - 1) * -100;
                    break;
                }
                $this->offset += 100;
                break;
            case 'right':
                if ($this->offset <= (count($this->files) - 1) * -100) {
                    $this->offset = 0;
                    break;
                }
                $this->offset += -100;
                break;
        }
    }
}
