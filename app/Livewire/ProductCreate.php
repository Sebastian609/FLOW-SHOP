<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductCreate extends Component
{
    public $name, $price, $discount_price, $description;

    protected $rules = [
        'name' => 'required|string|max:80',
        'price' => 'required|numeric|min:0',
        'discount_price' => 'nullable|numeric|min:0',
        'description' => 'nullable|string',
    ];

    public function save()
    {
        $this->validate();

        Product::create([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'description' => $this->description,
            'active' => true,
            'deleted' => false,
        ]);

        // Limpiar los campos
        $this->reset();

        // Emitir evento o cerrar modal
        $this->dispatch('close-modal', name: 'product-create');
        $this->dispatch('product-created');
    }

    public function render()
    {
        return view('livewire.product-create');
    }
}
