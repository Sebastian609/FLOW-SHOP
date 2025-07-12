<form wire:submit.prevent="save" class="space-y-6">
    <div>
        <flux:heading size="lg">Crear Producto</flux:heading>
        <flux:text class="mt-2">Ingresa todos los datos.</flux:text>
    </div>

    <flux:input label="Nombre" placeholder="Nombre" wire:model.defer="name" />

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <flux:input label="Precio" placeholder="Precio" type="number" wire:model.defer="price" />
        <flux:input label="Precio Descuento" placeholder="Precio Descuento" type="number" wire:model.defer="discount_price" />
    </div>
    
    <flux:textarea label="Descripción" placeholder="Detalles sobre el producto" wire:model.defer="description" />
    <flux:button variant="primary" class="w-full" type="submit">Guardar</flux:button>
</form>
