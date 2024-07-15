<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    {{-- Search --}}
    <div class="w-full max-w-screen-xl p-1 mb-4">
        <div class="relative w-2/3 mx-auto text-[#2d2d2d]">
            <form>
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif
                @if (request('author'))
                    <input type="hidden" name="author" value="{{ request('author') }}">
                @endif
                <input type="text" name="search"
                    class="w-full backdrop-blur-3xl bg-white/20 focus:bg-white/20  py-2 pl-10 pr-4 rounded-lg focus:outline-none border-4 border-gray-100 focus:border-[#F8EDE3]  transition-colors duration-300"
                    placeholder="Search..." value="{{ request('search') }}" autocomplete="off">
                <div
                    class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none focus:border-[#FFC0CB]">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
            </form>
        </div>
    </div>
    {{-- End Search --}}
    {{-- Pagination --}}
    <div class="mt-7">
        {{ $posts->onEachSide(1)->links() }}
    </div>
    {{-- End Pagination --}}
    <div class="mx-auto max-w-7xl">
        <div
            class="mx-auto mt-2 grid max-w-2xl grid-cols-1 gap-x-1 gap-y-8 border-gray-200 pt-2 sm:mt-4 sm:pt-4 lg:mx-0 lg:max-w-none lg:grid-cols-3 md:grid-cols-2 ">
            @forelse ($posts as $post)
                <article
                    class="bg-white p-8 flex max-w-xl flex-col items-start justify-between mx-4 rounded-2xl shadow-lg">
                    <div class="w-full flex items-center text-xs">

                        <a href="/posts?category={{ $post->category->slug }}"
                            class="relative z-10 rounded-full bg-{{ $post->category->color }}-400 px-3 py-1.5 font-medium text-white hover:bg-{{ $post->category->color }}-300 me-auto">{{ $post->category->name }}</a>
                        <span class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                    </div>
                    <div class="group relative">
                        <h3 class="mt-4 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                            <a href="/post/{{ $post->slug }}" class="hover:text-blue-400">
                                <span class="absolute inset-0 truncate"></span>
                                {{ $post->title }}
                            </a>
                        </h3>
                        <p class="mt-5 line-clamp-3 text-sm leading-6 text-gray-600">{{ $post->body }}</p>
                    </div>
                    <div class="relative mt-8 flex items-center gap-x-4">
                        <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                            alt="{{ $post->author->name }}" class="h-10 w-10 rounded-full bg-gray-50">
                        <div class="text-sm leading-6">
                            <p class="font-semibold text-gray-900">
                                <a href="/posts?author={{ $post->author->username }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->author->username }}
                                </a>
                            </p>
                            <p class="text-gray-600">Member</p>
                        </div>
                    </div>
                </article>
            @empty
                <div class="absolute left-1/2 -translate-x-1/2">

                    <p class="text-2xl text-red-500 text-center">Article Not Found!</p>
                </div>
            @endforelse
        </div>
    </div>
</x-layout>
