<div
    class="relative group flex flex-col my-3 bg-white shadow-sm rounded-lg border-b-[6px] hover:border-x-2 hover:border-t-2 hover:border-primary  hover:transition hover:ease-in hover:duration-300">
    <a href="/post/{{ $post->slug }}" class="relative h-56 overflow-hidden text-white rounded-t-lg">
        @if ($post->image)
            <img class="object-cover h-full w-full transition-transform duration-500 ease-[cubic-bezier(0.25, 1, 0.5, 1)] transform group-hover:scale-110"
                src="{{ asset('storage/images/' . $post->image) }}" alt="post-image" />
        @else
            <img class="object-cover h-full w-full transition-transform duration-500 ease-[cubic-bezier(0.25, 1, 0.5, 1)] transform group-hover:scale-110"
                src="https://picsum.photos/seed/{{ $post->category->name }}/500/400" alt="card-image" />
        @endif
    </a>
    <div class="p-4">
        <a href="/posts?category={{ $post->category->slug }}"
            class=" rounded-full bg-{{ $post->category->color }}-400 hover:bg-{{ $post->category->color }}-300 py-1 px-3 border border-transparent text-xs text-white transition-all shadow-sm w-20 text-center">
            {{ $post->category->name }}
        </a>
        <a href="/post/{{ $post->slug }}">
            <h6 class="my-4 text-slate-800 text-lg font-semibold">
                {{ $post->title }}
            </h6>
        </a>
        <p class="inline text-slate-600 text-sm leading-normal font-light indent-8">{{ $post->excerpt }}&nbsp;</p>
        <a href="/post/{{ $post->slug }}"
            class="text-slate-800 font-semibold text-sm hover:underline inline-flex items-center">
            Read More
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-1 h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>

    <div class="flex items-center justify-between mt-auto p-4">
        <a href="/posts?author={{ $post->author->username }}">
            <div class="flex items-center pb-2">
                <img alt="{{ $post->author->username }}"
                    src="https://picsum.photos/seed/{{ $post->category->name }}/500/400"
                    class="relative inline-block h-10 w-10 rounded-full" />
                <div class="flex flex-col ml-3 text-sm">
                    <span
                        class="text-slate-800 font-semibold hover:text-primary hover:underline">{{ $post->author->username }}</span>
                    <span class="text-slate-600 text-xs">
                        {{ $post->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>
        </a>
    </div>
</div>
