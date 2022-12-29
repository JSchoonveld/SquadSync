<div>
    <input wire:model="name" type="text">
    <button wire:click="submit" class="text-white bg-blue-500 hover:bg-blue-700 rounded p-2">Submit</button>
    @if($success)
    <div>
        Saved
    </div>
    @endif
</div>
