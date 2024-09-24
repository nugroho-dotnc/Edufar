<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Education Facility Report</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-white">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-12xl mx-auto md:py-6 py-4 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                @if(session('success') || session('error') || session('info'))
                    <div class="py-6">
                        <div class="max-w-12xl toast toast-end toast-top mx-auto sm:px-6 lg:px-8">
                            @if(session('success'))
                                <div class="alert-success alert">
                                    {{session('success')}}
                                </div>
                            @elseif (session('info'))
                                <div class="alert-info alert">
                                    {{session('info')}}
                                </div>
                            @elseif (session('error'))
                                <div class="alert-info alert">
                                    {{session('error')}}
                                </div>
                            @endif
                            @if(count($errors->all()) > 0)
                                <div class="alert alert-error">
                                    <ul>
                                        @foreach ($errors->all() as $e)
                                            <li>
                                                {{$e}}
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
                {{ $slot }}
                @if(request()->routeIs('student.home') || request()->routeIs('student.report.create') || request()->routeIs('student.history'))
                    <div class="h-20 bg-white shadow-sm border-t-2 border-gray-200 fixed bottom-0 w-full flex justify-center gap-16 md:hidden px-4">
                        <x-bottom-nav-link :active="request()->routeIs('student.home')" href="{{route('student.home')}}">
                            <x-icon.home/>
                        </x-bottom-nav-link>
                        <x-bottom-nav-link :active="request()->routeIs('student.report.create')" href="{{route('student.report.create')}}">
                            <x-icon.plus/>
                        </x-bottom-nav-link>
                        <x-bottom-nav-link :active="request()->routeIs('student.history')" href="{{route('student.history')}}">
                            <x-icon.clip-board/>
                        </x-bottom-nav-link>
                    </div>
                @endif
                @if(request()->routeIs('admin.dashboard') || request()->routeIs('admin.category') || request()->routeIs('admin.report') || request()->routeIs('admin.information'))
                        <div class="h-20 bg-white shadow-sm border-t-2 border-gray-200 fixed bottom-0 w-full flex justify-center gap-8 md:hidden px-4">
                            <x-bottom-nav-link :active="request()->routeIs('admin.dashboard')" href="{{route('admin.dashboard')}}">
                                <x-icon.home/>
                            </x-bottom-nav-link>
                            <x-bottom-nav-link :active="request()->routeIs('admin.report')" href="{{route('admin.report')}}">
                                <x-icon.report/>
                            </x-bottom-nav-link>
                            <x-bottom-nav-link :active="request()->routeIs('admin.category')" href="{{route('admin.category')}}">
                                <x-icon.category/>
                            </x-bottom-nav-link> <x-bottom-nav-link :active="request()->routeIs('admin.information')" href="{{route('admin.information')}}">
                                <x-icon.information/>
                            </x-bottom-nav-link>
                        </div>
                @endif
            </main>
        </div>
        <style>
            ::-webkit-scrollbar{
                display: none;
            }
        </style>
    </body>
</html>
{{--    <!DOCTYPE html>--}}
{{--<html lang="en" data-theme="dark">--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>@yield('title')</title>--}}
{{--    @vite('resources/css/app.css')--}}
{{--</head>--}}

{{--<body class="h-screen overflow-y-hidden bg-white">--}}
{{--@if (session()->has('success') || session()->has('error'))--}}
{{--    <div class="toast toast-end" id="toast">--}}
{{--        @if (session('success'))--}}
{{--            <div class="alert alert-success">--}}
{{--                <span>{{ session('success') }}</span>--}}
{{--            </div>--}}
{{--        @else--}}
{{--            <div class="alert alert-error">--}}
{{--                <span>{{ session('error') }}</span>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--    <script>--}}
{{--        setTimeout(function() {--}}
{{--            document.getElementById('toast').style.display = 'none';--}}
{{--        }, 2000);--}}
{{--    </script>--}}
{{--@endif--}}

{{--@include('components.navbar')--}}

{{--@yield('content')--}}

{{--<div class="bottom-0 absolute w-full">--}}
{{--    @include('components.footer')--}}
{{--</div>--}}
{{--</body>--}}
{{--        <style>--}}
{{--            ::-webkit-scrollbar{--}}
{{--                display: none;--}}
{{--            }--}}
{{--        </style>--}}
{{--</html>--}}
