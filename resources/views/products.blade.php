<x-layouts.app :title="__('Products')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <!-- Botón para crear producto -->
        <div class="flex justify-between items-center">
            <h1 class="text-2xl font-bold">Productos</h1>
            <flux:modal.trigger name="product-create">
                <flux:button variant="primary">Crear producto</flux:button>
            </flux:modal.trigger>
        </div>

        <livewire:greeter>

        <!-- Modal para crear producto -->
       


        <!-- Lista de productos -->
        <div class="flex-1">
            @livewire('list-products')
        </div>

    </div>
</x-layouts.app>
