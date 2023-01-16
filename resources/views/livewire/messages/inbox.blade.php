<div x-data="{ showCreateModal: false }">
    @if ($mode == 1)
        <div>
            <div class="flex justify-between text-black">
                <h1 class="text-3xl font-bold mb-3">Unread</h1>
                <button @click="showCreateModal = true" class="bg-blue-500 hover:bg-blue-400 text-white p-3 rounded" data-modal-target="defaultModal" data-modal-toggle="defaultModal">Send a new message</button>
            </div>

            <div class="flex flex-col p-5">
                @foreach($messages as $message)
                    <span wire:click="getSingleMessage({{ $message->id }})"
                          class="text-xl cursor-pointer text-gray-800 hover:text-gray-500 transition border-b-2 border-gray-600 py-2">
                        {{ $message->title }}
                    </span>
                @endforeach
            </div>
        </div>
        <div class="text-black">
            @if($readMessages)
            <h2 class="text-3xl font-bold mb-5">Read messages</h2>
            <div class="flex flex-col bg-slate-700 rounded px-5 py-6">
                @foreach($readMessages as $message)
                    <span wire:click="getSingleMessage({{ $message->id }})"
                          class="text-xl cursor-pointer text-white hover:text-gray-200 transition border-b-2 border-gray-600 py-2">
                        {{ $message->title }}
                    </span>
                @endforeach
            </div>
                @endif
        </div>
    @elseif($mode == 2)
        <div class="text-black">
            <h1 class="text-4xl font-bold mb-5">{{ $message->title }}</h1>
            <p>{{ $message->body }}</p>
            <button wire:click="setOverview()" class="rounded bg-blue-500 hover:bg-blue-700 text-white p-2 my-5">Back to
                Overview
            </button>
        </div>
    @endif
        @include('components.inbox.create-message-form')
</div>
