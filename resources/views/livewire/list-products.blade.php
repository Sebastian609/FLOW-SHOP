<div>

 <flux:modal name="product-create" class="w-full" 
                   x-data
                   @close-modal.window="if ($event.detail.name === 'product-create') $dispatch('close')">
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
                
        </flux:modal>

    <!-- Tabla de productos -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Producto
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700" wire:click="sort('name')">
                        Descripción
                        @if($sortBy === 'name')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700" wire:click="sort('price')">
                        Precio
                        @if($sortBy === 'price')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700" wire:click="sort('active')">
                        Estado
                        @if($sortBy === 'active')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700" wire:click="sort('created_at')">
                        Fecha
                        @if($sortBy === 'created_at')
                            <span class="ml-1">{{ $sortDirection === 'asc' ? '↑' : '↓' }}</span>
                        @endif
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-700">
                @foreach ($this->products as $product)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-800">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                @if($product->productImages && $product->productImages->count())
                                    <img class="h-10 w-10 rounded-full object-cover" src="{{ asset('storage/' . $product->productImages->first()->url) }}" alt="{{ $product->name }}">
                                @else
                                    <div class="h-10 w-10 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                        <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12z"></path>
                                        </svg>
                                    </div>
                                @endif
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900 dark:text-white">{{ $product->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $product->description }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            @if($product->discount_price && $product->discount_price < $product->price)
                                <div class="flex flex-col">
                                    <span class="text-green-600 dark:text-green-400 font-bold">${{ number_format($product->discount_price, 2) }}</span>
                                    <span class="text-sm line-through text-gray-500 dark:text-gray-400">${{ number_format($product->price, 2) }}</span>
                                </div>
                            @else
                                <span class="font-bold">${{ number_format($product->price, 2) }}</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="inline-flex px-2 py-1 text-xs font-semibold rounded-full {{ $product->active ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300' }}">
                                {{ $product->active ? 'Activo' : 'Inactivo' }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                            {{ $product->created_at->format('d/m/Y') }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2">
                                <flux:modal.trigger name="product-edit">
                                    <button class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300" wire:click="showUpdate({{$product->id}})" title="Editar">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                        </svg>
                                    </button>
                                </flux:modal.trigger>
                                <button class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300" title="Eliminar">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $this->products->links() }}
    </div>

    <flux:modal name="product-edit" class="w-full">

        <form wire:submit.prevent="update" class="space-y-6">
         <div>
             <flux:heading size="lg">Editar Producto</flux:heading>
             <flux:text class="mt-2">Modifica los datos del producto.</flux:text>
         </div>
     
         <flux:input label="Nombre" placeholder="Nombre" wire:model.defer="name" />
     
         <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
             <flux:input label="Precio" placeholder="Precio" type="number" wire:model.defer="price" />
             <flux:input label="Precio Descuento" placeholder="Precio Descuento" type="number" wire:model.defer="discount_price" />
         </div>
         
         <flux:textarea label="Descripción" placeholder="Detalles sobre el producto" wire:model.defer="description" />
         
         <div class="flex gap-3">
             <flux:modal.close>
                 <flux:button variant="filled" class="flex-1">Cancelar</flux:button>
             </flux:modal.close>
             <flux:button variant="primary" class="flex-1" type="submit">Guardar Cambios</flux:button>
         </div>
     </form> 
</flux:modal>
</div>
