@extends('layouts.admin')
@section('content')
    <form class="w-full md:px-10 pt-5" id="myform" action="{{ route('mypost.store') }}" method="post"
        enctype="multipart/form-data">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Title
                </label>
                <input
                    class="appearance-none block w-full bg-gray-100 text-gray-700 border  @error('title') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white "
                    name="title" id="title" type="text" placeholder="Input title" value="{{ old('title') }}"
                    required autofocus>
                @error('title')
                    <p class="err-msg-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap justify-center -mx-3 mb-6">
            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Slug
                </label>
                <input
                    class="appearance-none block w-full bg-gray-100 text-gray-700 border 
                    @error('slug') border-red-500 @enderror rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white "
                    name="slug" id="slug" type="text" placeholder="slug" required value="{{ old('slug') }}">
                @error('slug')
                    <p class="err-msg-1">{{ $message }}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Category
                </label>
                <div class="relative">
                    <select
                        class="block appearance-none w-full bg-gray-100 border @error('category') border-red-500 @enderror text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                        name="category" id="category">
                        <option value="" selected>Select Category</option>
                        @foreach ($categories as $category)
                            <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </div>
                </div>
                @error('category')
                    <p class="err-msg-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <x-forms.upload-image></x-forms.upload-image>

        <div class="flex flex-wrap justify-center -mx-3 mb-6">
            <div class="w-full px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                    Body
                </label>
                <textarea name="body" id="body">{{ old('body') }}</textarea>

                @error('body')
                    <p class="err-msg-1">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div class="flex flex-wrap justify-center -mx-3 mb-6">
            <div class="w-full md:w-1/4 px-3 mb-6 md:mb-0">
                <button class="btn-1" type="submit">Submit</button>
            </div>
        </div>
    </form>
@endsection

@push('script')
    <script>
        function fileUploadComponent() {
            return {
                isDragging: false,
                file: null,
                imageUrl: null,
                handleFiles(event) {
                    const files = event.target.files || event.dataTransfer.files;
                    this.file = files[0];
                    this.imageUrl = URL.createObjectURL(this.file);
                },
                removeFile() {
                    if (this.imageUrl) {
                        URL.revokeObjectURL(this.imageUrl); // Clean up the object URL
                    }
                    this.file = null;
                    this.imageUrl = null;
                }
            };
        }
    </script>
@endpush
