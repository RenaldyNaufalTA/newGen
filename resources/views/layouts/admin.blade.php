<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    @vite('resources/css/app.css')

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    {{-- Tiny Mce editor --}}
    <script src="https://cdn.tiny.cloud/1/z8qx04be5ew2o0fb1dca08b0r1y295lxali4pbkht2t0i3x9/tinymce/7/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#body', // Replace this CSS selector to match the placeholder element for TinyMCE
            plugins: 'code table lists',
            toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table'

        });
    </script>
</head>

<body class="bg-quaternary font-family-karla flex">

    <x-sidebar></x-sidebar>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        <x-header-admin>{{ $title }}</x-header-admin>

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow py-6 px-5">
                @yield('content')
            </main>

        </div>

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    @stack('script')
</body>

</html>
