<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="mx-auto max-w-7xl">
        <div
            class="mx-auto mt-2 grid max-w-2xl grid-cols-1 gap-x-1 gap-y-8 border-gray-200 pt-2 sm:mt-4 sm:pt-4 lg:mx-0 lg:max-w-none lg:grid-cols-3 md:grid-cols-2 ">
            @foreach ($posts as $post)
                <article
                    class="bg-white p-8 flex max-w-xl flex-col items-start justify-between mx-4 rounded-2xl shadow-lg">
                    <div class="w-full flex items-center text-xs">

                        <a href="/categories/{{ $post->category->slug }}"
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
                                <a href="/authors/{{ $post->author->username }}">
                                    <span class="absolute inset-0"></span>
                                    {{ $post->author->username }}
                                </a>
                            </p>
                            <p class="text-gray-600">Member</p>
                        </div>
                    </div>
                </article>
            @endforeach
        </div>
    </div>
</x-layout>
