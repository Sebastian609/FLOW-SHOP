<?php

namespace App\Livewire;

use Livewire\Component;

class Greeter extends Component
{
    public $name = "Sebastian";
    public $newName = "";
    public function render()
    {
        return view('livewire.greeter', [
            'name' => $this->name
        ]);
    }

    public function save(): void{
        $this->name = $this->newName;
    }
}
