<div>
    @if ($overview)
        <div>
            <div class="flex justify-between">
                <h1 class="text-3xl font-bold mb-3">Unread</h1>
                <button class="bg-blue-500 hover:bg-blue-400 text-white p-3 rounded">Send a new message</button>
            </div>

            <div class="flex flex-col p-5">
                @foreach($messages as $message)
                    <span wire:click="getSingleMessage({{ $message->id }})"
                          class="text-xl cursor-pointer text-gray-200 hover:text-gray-500 transition border-b-2 border-gray-600 py-2">
                        {{ $message->title }}
                    </span>
                @endforeach
            </div>
        </div>
        <div class="">
            <h2 class="text-3xl font-bold mb-5">Read messages</h2>
            <div class="flex flex-col bg-slate-900 p-5">
                @foreach($readMessages as $message)
                    <span wire:click="getSingleMessage({{ $message->id }})"
                          class="text-xl cursor-pointer text-gray-400 hover:text-gray-200 transition border-b-2 border-gray-600 py-2">
                        {{ $message->title }}
                    </span>
                @endforeach
            </div>
        </div>
    @else
        <div>
            <h1 class="text-4xl font-bold mb-5">{{ $message->title }}</h1>
            <p>{{ $message->body }}</p>
            <button wire:click="setOverview()" class="rounded bg-blue-500 hover:bg-blue-700 text-white p-2 my-5">Back to
                Overview
            </button>
        </div>
    @endif
</div>
