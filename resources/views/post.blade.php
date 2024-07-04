<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    {{-- <article class="py-8 max-w-screen-md border-b border-gray-300">
        
    </article> --}}

    <div class="pt-8 pb-16 lg:pt-16 lg:pb-24 mx-5 bg-white rounded-2xl shadow-md">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <div class="w-full mx-auto max-w-4xl px-6 md:px-10 sm:px-12">
                <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['title'] }}</h2>
                <div class="w-full mt-8 flex items-center">
                    <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                        alt="{{ $post->author->name }}" class=" h-[55px] w-[55px] rounded-full bg-gray-50">
                    <div class="flex flex-col ms-3 text-xs">

                        <a href="/posts?author={{ $post->author->username }}"
                            class="text-sm text-clip overflow-hidden  text-gray-500 hover:text-blue-400">
                            {{ $post->author->name }}
                        </a>
                        <div class="flex flex-row  gap-x-2 items-center">

                            in
                            <a href="/posts?category={{ $post->category->slug }}"
                                class="rounded-full bg-{{ $post->category->color }}-400 px-3 py-1.5  text-white hover:bg-{{ $post->category->color }}-300 ">
                                {{ $post->category->name }}
                            </a><span class="text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>


                </div>
                <p class="my-4 font-light">{{ $post['body'] }}
                </p>
                <a href="/posts" class="font-medium text-blue-500 hover:underline">&laquo; Back to posts </a>
            </div>
        </div>
    </div>
</x-layout>
