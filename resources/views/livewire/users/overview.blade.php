<div class="flex flex-wrap">
    @foreach($users as $user)
        <div class="flex justify-between w-1/3 pr-10">
            <div>
                {{ $user->name }}
            </div>
            @if($adminOptions)
            <div wire:click="deleteUser({{ $user }})" class="cursor-pointer text-red-700 hover:text-red-500">
                Delete
            </div>
                @endif
        </div>
    @endforeach
</div>
