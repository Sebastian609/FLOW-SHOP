<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductEdit extends Component
{
    public $product;
    public $name, $price, $discount_price, $description;

    protected $rules = [
        'name' => 'required|string|max:80',
        'price' => 'required|numeric|min:0',
        'discount_price' => 'nullable|numeric|min:0',
        'description' => 'nullable|string',
    ];

    public function mount($productId)
    {
        $this->product = Product::findOrFail($productId);
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->discount_price = $this->product->discount_price;
        $this->description = $this->product->description;
    }

    public function save()
    {
        $this->validate();

        $this->product->update([
            'name' => $this->name,
            'slug' => Str::slug($this->name),
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'description' => $this->description,
        ]);

        $this->dispatch('close-modal', 'product-edit');
        $this->dispatch('product-updated');
       
    }

    public function render()
    {
        return view('livewire.product-edit');
    }
} 