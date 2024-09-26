<div
    class="cursor-pointer group relative flex flex-col my-10 bg-white shadow-sm border-b-[6px] border-slate-300 rounded-xl w-full hover:border-x-2 hover:border-t-2 hover:border-primary  hover:transition hover:ease-in hover:duration-300">
    <a href="/post/{{ $posts[0]->slug }}"
        class="relative h-96 overflow-hidden text-white rounded-t-xl flex justify-center items-center">
        @if ($posts[0]->image)
            <img class="bg-cover bg-no-repeat blur-sm h-full w-full absolute"
                src="{{ asset('storage/images/' . $posts[0]->image) }}" alt="{{ $posts[0]->image }}" />
            <img class="object-contain h-full w-full transition-transform duration-500 ease-in[cubic-bezier(0.25, 1, 0.5, 1)] transform group-hover:scale-110"
                src="{{ asset('storage/images/' . $posts[0]->image) }}" alt="{{ $posts[0]->image }}" />
        @else
            <img class="bg-cover bg-no-repeat blur-sm h-full w-full absolute"
                src="https://picsum.photos/seed/{{ $posts[0]->category->name }}/1200/400"
                alt="{{ $posts[0]->image }}" />
            <img class=" object-contain h-full w-full transition-transform duration-500 ease-in [cubic-bezier(0.25, 1, 0.5, 1)] transform group-hover:scale-110"
                src="https://picsum.photos/seed/{{ $posts[0]->category->name }}/1200/400"
                alt="{{ $posts[0]->image }}" />
        @endif

    </a>
    <div class="p-4 text-center">
        <h6 class="mb-2 text-slate-800 text-xl font-semibold cursor-text">
            {{ $posts[0]->title }}
        </h6>
        <p class="text-slate-600 leading-normal font-light inline">{{ $posts[0]->excerpt }}&nbsp;
        </p>
        <a href="/post/{{ $posts[0]->slug }}"
            class="text-slate-800 font-semibold text-sm hover:underline inline-flex items-center">
            Read More
            <svg xmlns="http://www.w3.org/2000/svg" class="ml-2 h-4 w-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
        </a>
    </div>
    <div class="flex items-center justify-center p-4">
        <div class="flex items-center pb-2">
            <img alt="John" src="https://picsum.photos/seed/john/500/400"
                class="relative inline-block h-10 w-10 rounded-full" />
            <div class="flex flex-col ml-3 text-sm">
                <a href="/posts?author={{ $posts[0]->author->name }}">
                    <span class="text-slate-800 font-semibold">{{ $posts[0]->author->name }}</span>
                </a>
                <span class="text-slate-600">
                    {{ $posts[0]->created_at->diffForHumans() }}
                </span>
            </div>
        </div>
    </div>
</div>
