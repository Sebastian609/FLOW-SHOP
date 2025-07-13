<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Product;
use Str;

class ListProducts extends Component
{
    use WithPagination;
    public $newProduct;
    public $name, $price, $discount_price, $description;


    public $sortBy = 'created_at';
    public $sortDirection = 'desc';

    public function sort($column)
    {
        if ($this->sortBy === $column) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function getProducts()
    {
        return Product::query()
            ->with('productImages')
            ->where('deleted', false)
            ->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(10);
    }

    public function getProductsProperty()
    {
        return $this->getProducts();
    }

    public function save()
    {
        Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'description' => $this->description,
            'slug'=> Str::slug($this->name),
            'active' => true,
            'deleted' => false,
        ]);
        $this->getProducts();
        $this->reset();
    }

    public function showUpdate($productId){
        $this->product = Product::findOrFail($productId);
        $this->name = $this->product->name;
        $this->price = $this->product->price;
        $this->discount_price = $this->product->discount_price;
        $this->description = $this->product->description;
    }

    public function update($id){
        $product = Product::find($id);
        $product->name = $this->name;
        $product->price = $this->price;
        $product->discount_price = $this->discount_price;
        $product->description = $this->description;
        $product->slug = Str::slug($this->name);
        $product->save();
        $this->getProducts();
    }

    public function render()
    {
        return view('livewire.list-products');
    }
}
