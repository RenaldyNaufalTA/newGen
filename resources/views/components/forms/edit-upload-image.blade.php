{{-- Upload Image --}}
<div x-data="fileUploadComponent()" class="col-span-full group mb-6">
    <label for="cover-photo" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">Image</label>
    <label x-on:dragover.prevent="isDragging = true" x-on:dragleave.prevent="isDragging = false"
        x-on:drop.prevent="isDragging = false; handleFiles($event)" x-bind:class="{ 'border-primary': isDragging }"
        class="mt-2 flex justify-center rounded-lg border border-dashed border-gray-900/25 group-hover:border-primary px-6 py-16 transition-colors duration-300 cursor-pointer">

        <input id="image" name="image" type="file" class="sr-only" accept="image/*"
            @change="handleFiles($event)">

        <input type="hidden" name="image" x-bind:name="!file ? 'image' : ''" value="{{ $post->image }}">

        <template x-if="file || '{{ $post->image }}'">
            <div class="text-center -my-5">
                <img :src="file ? imageUrl : '{{ asset('storage/images/' . $post->image) }}'" alt="Uploaded Image"
                    class="mx-auto h-48 w-48 object-cover rounded-lg">
                <p class="mt-2 text-sm font-medium text-gray-900" x-text="file ? file.name : '{{ $post->image }}'"></p>
                <p class="text-xs leading-5 text-gray-600"
                    x-text="file ? (file.size / 1024).toFixed(2) + ' KB' : '{{ number_format(filesize(storage_path('app/public/images/' . $post->image)) / 1024, 2) }} KB'">
                </p>
                <div class="w-full flex justify-center items-center">
                    <button type="button" @click="removeFile" :class="!file ? 'hidden' : 'block'"
                        class="w-20 rounded-md bg-primary px-3 py-1 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-primary/80 mt-2">Remove</button>
                </div>
            </div>
        </template>

        <div class="text-center" x-show="!file && !'{{ $post->image }}'">
            <svg class="mx-auto h-12 w-12 text-gray-300 group-hover:text-primary transition-colors duration-200 ease-in-out"
                viewBox="0 0 24 24" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd"
                    d="M1.5 6a2.25 2.25 0 012.25-2.25h16.5A2.25 2.25 0 0122.5 6v12a2.25 2.25 0 01-2.25 2.25H3.75A2.25 2.25 0 011.5 18V6zM3 16.06V18c0 .414.336.75.75.75h16.5A.75.75 0 0021 18v-1.94l-2.69-2.689a1.5 1.5 0 00-2.12 0l-.88.879.97.97a.75.75 0 11-1.06 1.06l-5.16-5.159a1.5 1.5 0 00-2.12 0L3 16.061zm10.125-7.81a1.125 1.125 0 112.25 0 1.125 1.125 0 01-2.25 0z"
                    clip-rule="evenodd" />
            </svg>
            <div class="mt-4 flex text-sm leading-6 text-gray-600">
                <span class="relative cursor-pointer font-semibold group-hover:text-primary">
                    Upload a file
                </span>
                <p class="pl-1">or drag and drop</p>
            </div>
            <p class="text-xs leading-5 text-gray-600">PNG, JPG, GIF up to 10MB</p>
        </div>
    </label>

    @error('image')
        <p class="err-msg-1">{{ $message }}</p>
    @enderror
</div>
{{-- End Upload image --}}

<script>
    function fileUploadComponent() {
        return {
            file: null,
            imageUrl: '',
            isDragging: false,
            buttonText: 'Upload a file',
            handleFiles(event) {
                const files = event.target.files || event.dataTransfer.files;
                if (files.length) {
                    this.file = files[0];
                    this.imageUrl = URL.createObjectURL(this.file);
                    this.buttonText = 'Change file';
                }
            },
            removeFile() {
                this.file = null;
                this.imageUrl = '';
                document.getElementById('image').value = '';
                this.buttonText = 'Upload a file';
            }
        };
    }
</script>
