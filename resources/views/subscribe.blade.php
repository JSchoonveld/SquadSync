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
                 <livewire:subscriptions/>
                </main>
            </div>
        </div>
    </div>
@endsection
