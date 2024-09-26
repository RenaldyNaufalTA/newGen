@extends('layouts.main')
@section('content')
    {{-- Search --}}
    <div class="w-full max-w-screen-xl p-1 md:px-2 px-4 mt-3">
        <div class="relative w-2/3 mx-auto text-[#2d2d2d]">
            <form>
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <input type="text" name="search"
                    class="w-full backdrop-blur-3xl bg-white/20 focus:bg-white/20  py-2 pl-10 pr-4 rounded-lg focus:outline-none border-2 border-gray-100 focus:border-[#F8EDE3]  transition-colors duration-300"
                    placeholder="Search..." value="{{ request('search') }}" autocomplete="off">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none focus:border-[#FFC0CB]">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
            </form>
        </div>
    </div>
    {{-- End Search --}}

    {{-- Main Card --}}
    @if ($posts->isNotEmpty())
        <x-post.main-card :posts="$posts"></x-post.main-card>
    @endif
    {{-- End Main Card --}}
    {{-- Pagination --}}
    <div class="mt-7">
        {{ $posts->onEachSide(1)->links() }}
    </div>
    {{-- End Pagination --}}
    <div class="mx-auto max-w-7xl">
        <div
            class="mx-auto mt-2 grid max-w-2xl grid-cols-1 gap-x-5 gap-y-0 border-gray-200 pt-2 sm:mt-4 sm:pt-4 lg:mx-0 lg:max-w-none lg:grid-cols-3 md:grid-cols-2">
            @foreach ($posts->skip(1) as $post)
                <x-post.card :post="$post"></x-post.card>
            @endforeach
            @if ($posts->isEmpty())
                <div class="absolute left-1/2 -translate-x-1/2">
                    <p class="text-2xl text-red-500 text-center">Article Not Found!</p>
                </div>
            @endif
        </div>
    </div>
    {{-- Pagination --}}
    @if ($posts->count() > 3)
        <div class="mt-7">
            {{ $posts->onEachSide(1)->links() }}
        </div>
    @endif

    {{-- End Pagination --}}
@endsection
