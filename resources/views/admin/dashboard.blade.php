<x-app-layout>
    <div class="max-w-7xl py-6 md:mx-auto">
        <div class="bg-white shadow-sm shadow-gray-200 mb-10 p-2 md:p-4">
            <div class="text-xl text-black font-bold">
                Welcome, {{Auth::user()->name}}
            </div>
            <div class="text-gray-500 font-bold">
                Berikut adalah progress laporan sejauh ini
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4  gap-1 md:gap-4 p-2 my-2">
                <div class="col-span-1 h-20 bg-[#3A606E] text-[#D7E5EA] flex p-2 gap-4 rounded-md">
                    <a class="btn bg-[#D7E5EA] border-none text-[#3A606E] my-auto" href="{{route('admin.report', ['id'=>1])}}">
                        <x-icon.time/>
                    </a>
                    <div class="flex-auto my-auto">
                        <ul class="text-[#D7E5EA] font-bold text-center">
                            <li>
                                {{count($data['pending'])}}
                            </li>
                            <li>
                                pending
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-1 h-20 bg-[#C2AC0A] text-[#FDF8D8] flex p-2 gap-4 rounded-md">
                    <a class="btn bg-[#FDF8D8] border-none text-[#C2AC0A] my-auto" href="{{route('admin.report', ['id'=>2])}}">
                        <x-icon.process/>
                    </a>
                    <div class="flex-auto my-auto">
                        <ul class="text-[#FDF8D8] font-bold text-center">
                            <li>
                                {{count($data['process'])}}
                            </li>
                            <li>
                                processing
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-1 h-20 bg-[#008F81] text-[#ebfffd] flex p-2 gap-4 rounded-md">
                    <a class="btn bg-[#ebfffd] border-none text-[#008F81] my-auto" href="{{route('admin.report', ['id'=>3])}}">
                        <x-icon.check/>
                    </a>
                    <div class="flex-auto my-auto">
                        <ul class="text-[#ebfffd] font-bold text-center">
                            <li>
                                {{count($data['done'])}}
                            </li>
                            <li>
                                done
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-span-1 h-20 bg-[#A30029] text-[ #FFEBF0] flex p-2 md:gap-4 rounded-md">
                    <a class="btn bg-[#FFEBF0] border-none text-[#A30029] my-auto">
                        <x-icon.response/>
                    </a>
                    <div class="flex-auto my-auto">
                        <ul class="text-[#FFEBF0] font-bold text-center">
                            <li>
                                {{count($data['response'])}}
                            </li>
                            <li>
                                response
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-start text-black font-bold text-lg p-2 border-b-2 border-gray-300">
            Laporan terbaru
        </div>
        <div class="max-w-full py-4 mx-1 grid grid-cols-2 md:grid-cols-6 gap-2">
            @foreach($report as $r)
                <x-report-card :data="$r"/>
            @endforeach
        </div>
        <div class=" text-black p-2 my-8 pb-8">
            {!! $report->withQueryString()->links() !!}
        </div>
    </div>

</x-app-layout>
