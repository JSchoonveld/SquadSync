<div
    x-show="showCreateModal"
    x-cloak
    id="defaultModal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div @click.away="showCreateModal = false" class="fixed right-10 bottom-10 w-full h-full max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-white">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-black">
                    Terms of Service
                </h3>
                <button @click="showCreateModal = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6 text-black">
                <form @submit.prevent>
                    <div class="flex flex-col">
                        <label for="">Recipient</label>
                        <select wire:model="recipient" class="min-w-92 rounded my-2" name="" id="">
                            <option value="">Select a user</option>
                            @if(count($users) == 0)
                                <option value="">No users in your organization</option>
                            @else
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('recipient')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                        <label>Title </label>
                        <input class="rounded" wire:model="messageTitle" type="text">
                        @error('messageTitle')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                        <label for="">Your message</label>
                        <textarea wire:model="messageBody" class="min-w-92 rounded" name="" id="" cols="30" rows="10"></textarea>
                        @error('messageBody')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button wire:click="sendMessage" data-modal-hide="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Send message</button>
                <button
                    @click="showCreateModal = false"
                    data-modal-hide="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
            </div>
        </div>
    </div>
</div>
