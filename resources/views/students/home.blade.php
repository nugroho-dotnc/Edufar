<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex my-auto justify-between">
            <span class="my-auto">
                {{ 'welcome, '.Auth::user()->name }}
            </span>
            <a class="btn bg-[#ebfffd] border-none text-[#008F81] " href="{{route('student.report.find')}}">
                <x-icon.search/>
            </a>
        </h2>
    </x-slot>

        <div class="max-w-7xl md:py-2 h-[40rem] md:h-[38rem] overflow-y-scroll mx-auto sm:px-6 lg:px-8">
            <x-home.home-carousel :data="$information"/>
            <div class="flex justify-start text-black font-bold text-lg p-2 border-b-2 border-gray-300">
                Laporan terbaru
            </div>
            <div class="max-w-full py-2 mx-1 grid grid-cols-2 md:grid-cols-6 gap-2">
                @foreach($report as $r)
                    <x-report-card :data="$r"/>
                @endforeach
            </div>
            <div class=" text-black p-2 mb-8">
                {!! $report->withQueryString()->links() !!}
            </div>
        </div>

</x-app-layout>
