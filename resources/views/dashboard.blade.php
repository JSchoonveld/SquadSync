@extends('layouts.app')

@section('content')
    <div class="py-6 sm:px-6 lg:px-8">
        <div class="px-4 py-6 sm:px-0">
            <div class="h-96 rounded-lg border-4 border-dashed border-gray-200">
                @include('components.tabs')
            </div>
        </div>
    </div>
@endsection
