<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Your Report') }}
        </h2>
    </x-slot>

    <div class="md:py-6 py-3">
        <div class="max-w-7xl py-1 grid grid-cols-2 md:grid-cols-6 gap-2  mx-auto px-2 md:px-8">
            @foreach($report as $r)
                <x-report-card :data="$r"/>
            @endforeach
        </div>
    </div>

</x-app-layout>
