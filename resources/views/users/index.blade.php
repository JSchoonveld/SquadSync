@extends('layouts.app')

@section('content')
    <div class="py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="h-96 rounded-lg">
                <h1 class="text-3xl font-bold">Users</h1>
                <livewire:users.overview/>
            </div>
        </div>
    </div>
@endsection
