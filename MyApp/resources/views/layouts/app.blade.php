<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'AhmedApp') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


        {{-- bootstrap --}}
        <!-- Font Awesome -->
    <link
    href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css') }}"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="{{ asset('https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap') }}"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.css') }}"
    rel="stylesheet"
    />


    {{-- End of bootstrap--}}



    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                @include('components.post.message')
                {{ $slot }}
            </main>
            @include('components.footer')
        </div>

         <!-- Scripts -->
         <script
         type="text/javascript"
         src="{{ url('https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.2/mdb.min.js') }}"
       ></script>
        <script src="{{ asset('js/app.js') }}" defer></script>

    </body>
</html>
