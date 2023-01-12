@extends('layouts.app')

@section('content')
    <div class="min-h-full bg-gray">
        <div class="flex">
            <div class="w-1/6 h-screen">
                @component('components.sidebar')
                @endcomponent
            </div>
            <div class="w-5/6">
                <header class="bg-white shadow">
                    @component('components.auth-navigation')
                    @endcomponent
                </header>
                <main>
                    <div class="py-6 sm:px-6 lg:px-8">
                        <div class="px-4 py-6 sm:px-0">
                            <div class="h-96 rounded-lg border-4 border-dashed border-gray-200">
                                <div x-data="{ tab: '#tab1' }" class="">

                                    <div class="flex flex-row mb-3">

                                        <a  class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
                                           href="#" x-on:click.prevent="tab='#tab1'">Tab1</a>

                                        <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
                                           href="#" x-on:click.prevent="tab='#tab2'">Tab2</a>

                                        <a class="px-4 border-b-2 border-gray-900 hover:border-teal-300"
                                           href="#" x-on:click.prevent="tab='#tab3'">Tab3</a>

                                    </div>
                                    <div x-show="tab == '#tab1'" x-cloak
                                         x-transition:enter="duration-100 ease-out"
                                         x-transition:enter-start="opacity-0"
                                         x-transition:enter-end="opacity-100"
                                         class="bg-blue-400 text-white p-2">
                                        <p>This is the content of Tab 1</p>
                                    </div>

                                    <div x-show="tab == '#tab2'" x-cloak
                                         x-transition:enter="duration-100 ease-out"
                                         x-transition:enter-start="opacity-0"
                                         x-transition:enter-end="opacity-100"
                                         class="bg-red-400 text-white">
                                        <p>This is the content of Tab 2</p>
                                    </div>

                                    <div x-show="tab == '#tab3'" x-cloak
                                         x-transition:enter="duration-100 ease-out"
                                         x-transition:enter-start="opacity-0"
                                         x-transition:enter-end="opacity-100"
                                         class="bg-green-400 text-white">
                                        <p>This is the content of Tab 3</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
