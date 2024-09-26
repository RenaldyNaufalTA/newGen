@extends('layouts.admin')
@section('content')
    @if (session('success'))
        <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
            <p class="font-bold">Success</p>
            <p class="text-sm">{{ session('success') }}</p>
        </div>
    @endif
    <div class="md:px-5">
        <x-post.table></x-post.table>
    </div>
@endsection
