@extends('layouts.base')

@section('body')
    <header>

    </header>
    <div class="flex">
        <div class="min-h-full w-full bg-gray">
            <div>
                <main>
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

@endsection
