<div>
    <p> Hola {{ $name }}</p>

    <form wire:submit.prevent="save"><input type="text" wire:model="newName" name="nombre" id="nombre" class="bg-gray-700" />
        <button type="submit" class="bg-white text-gray-700 px-4 py-2 rounded-lg">Save</button>
    </form>

</div>