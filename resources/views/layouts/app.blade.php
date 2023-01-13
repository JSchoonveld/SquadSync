@extends('layouts.base')

@section('body')
    <header>
        @include('components.auth-navigation')
    </header>
    <div class="mt-16"></div>
    <div class="flex">
        <livewire:sidebar/>
        <div class="min-h-full w-full bg-gray">
                <div>
                    <main>
                        @yield('content')
                    </main>
                </div>
        </div>
    </div>

@endsection
