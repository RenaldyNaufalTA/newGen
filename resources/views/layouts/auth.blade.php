<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full">
    <div class="min-h-screen bg-tertiary">
        <main>
            <div class="mx-auto max-w-xl py-6 sm:px-6 lg:px-8">
                <div class="flex min-h-screen overflow-hidden flex-col justify-center px-6 py-12 lg:px-8">
                    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
                        <x-logo height="h-20"></x-logo>
                        <h2 class="mt-5 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
                            @yield('titlePage')</h2>
                        @session('error')
                            <h4 class="mt-2 text-center font-bold mb-0 tracking-tight text-red-600">{{ session('error') }}
                            </h4>
                        @endsession
                    </div>
                    @yield('content')
                </div>
            </div>
        </main>
    </div>

</body>

</html>
