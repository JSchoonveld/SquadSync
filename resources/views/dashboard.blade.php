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
                            <div class="h-96 rounded-lg border-4 border-dashed border-gray-200"></div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
