<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ $company->name }}</title>
        <link rel="icon" type="image/png" href="/icons/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/icons/favicon-16x16.png" sizes="16x16" />


        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container-md">
            <x-header :company="$company"/>
            {{-- Navbar component --}}
            {{-- <x-navbar :company="$company"/> --}}
            <hr />
            @yield('content')
            <hr >
            <small>
                <p class="text-center">
                    {{ $company->name }} &copy; 2023
                </p>
            </small>
        </div>
    </body>
</html>
