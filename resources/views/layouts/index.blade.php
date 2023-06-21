<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $company->name }}</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container-md">
            <h1 class="display-4 text-center">
                {{ $company->name }}
                <span class="badge bg-secondary">{{ $company->tag }}</span>
            </h1>
            <p class="lead text-center">
                {{ $company->slogan }}
            </p>
            {{-- <x-navbar :company="$company"/> --}}
            <hr />
            @yield('content')
        </div>
    </body>
</html>
