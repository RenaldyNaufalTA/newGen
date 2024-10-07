<div class="w-full flex justify-between items-center mb-4 mt-1 pl-3">
    <div>
        <h3 class="text-lg font-bold text-slate-800">Table of My Posts</h3>
        <p class="text-slate-500">Review your Posts.</p>
    </div>
    <div class="ml-3">
        <div class="w-full max-w-sm min-w-[200px] relative">
            <div class="relative inline-flex items-center">
                <a href="{{ route('mypost.create') }}" class="p-1.5 bg-primary text-white rounded-md z-10 mr-2">Create</a>
                <input
                    class="bg-white w-full pr-9 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-300 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                    placeholder="Search for invoice..." />
                <button class="absolute h-8 w-8 right-2 top-1 my-auto px-2 flex items-center bg-white rounded"
                    type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3"
                        stroke="currentColor" class="w-8 h-8 text-slate-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                    </svg>
                </button>

            </div>
        </div>
    </div>
</div>

<div
    class="relative flex flex-col w-full h-full md:overflow-hidden overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
    <table class="w-full text-left table-auto min-w-max ">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Category</th>
                <th>Created at</th>
                <th>Upadated at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
                <tr class="even:bg-tertiary/50">
                    <td class="p-4 py-5">
                        <p class="ms-2 block font-semibold text-sm text-slate-800">
                            {{ ($posts->currentpage() - 1) * $posts->perpage() + $loop->index + 1 }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="block text-sm text-slate-800">{{ $post->title }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="block text-sm text-slate-800">{{ $post->category->name }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="block text-sm text-slate-800">{{ $post->created_at->format('d M Y ') }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <p class="block text-sm text-slate-800">{{ $post->updated_at->format('d M Y ') }}</p>
                    </td>
                    <td class="p-4 py-5">
                        <div class="block text-left">
                            <a href="{{ route('mypost.edit', $post->slug) }}"
                                class="text-yellow-500 hover:text-yellow-400 inline-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor"
                                    class="w-4 h-4 me-1">
                                    <path
                                        d="M0 64C0 28.7 28.7 0 64 0L224 0l0 128c0 17.7 14.3 32 32 32l128 0 0 125.7-86.8 86.8c-10.3 10.3-17.5 23.1-21 37.2l-18.7 74.9c-2.3 9.2-1.8 18.8 1.3 27.5L64 512c-35.3 0-64-28.7-64-64L0 64zm384 64l-128 0L256 0 384 128zM549.8 235.7l14.4 14.4c15.6 15.6 15.6 40.9 0 56.6l-29.4 29.4-71-71 29.4-29.4c15.6-15.6 40.9-15.6 56.6 0zM311.9 417L441.1 287.8l71 71L382.9 487.9c-4.1 4.1-9.2 7-14.9 8.4l-60.1 15c-5.5 1.4-11.2-.2-15.2-4.2s-5.6-9.7-4.2-15.2l15-60.1c1.4-5.6 4.3-10.8 8.4-14.9z" />
                                </svg>
                            </a>
                            <form action="" method="post" class="inline">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-500 hover:text-red-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor"
                                        class="w-4 h-4">
                                        <path
                                            d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0L284.2 0c12.1 0 23.2 6.8 28.6 17.7L320 32l96 0c17.7 0 32 14.3 32 32s-14.3 32-32 32L32 96C14.3 96 0 81.7 0 64S14.3 32 32 32l96 0 7.2-14.3zM32 128l384 0 0 320c0 35.3-28.7 64-64 64L96 512c-35.3 0-64-28.7-64-64l0-320zm96 64c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16l0 224c0 8.8 7.2 16 16 16s16-7.2 16-16l0-224c0-8.8-7.2-16-16-16z" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center w-full">No Post</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>
