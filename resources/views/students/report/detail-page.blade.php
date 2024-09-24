<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex my-auto justify-start gap-4">
            <a class="btn btn-circle btn-ghost p-2 my-auto" href="{{url()->previous()}}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                </svg>
            </a>
            <span class="my-auto">
                {{ __('Detail Page') }}
            </span>
        </h2>
    </x-slot>
    <div class="h-[43rem] md:h-[38rem] overflow-y-scroll">
        <div class="max-w-7xl mx-auto md:my-6 grid grid-cols-3 md:h-[38rem] h-[45.15rem] overflow-y-scroll gap-2 md:gap-4 relative">
            <div class="absolute top-0 end-0 p-2">
                <x-progress-badge :id="$report->progres_id"/>
            </div>
            <div class="col-span-3 md:col-span-1 h-[16rem] md:h-[24rem] bg-gray-100">
                <img src="{{$report->image}}" class="h-full w-full object-cover ">
            </div>
            <div class="col-span-3 md:col-span-2 h-[16rem] md:h-[24rem] p-4 shadow-md shadow-gray-200 ">
                <ul>
                    <li class="md:text-[18px] text-[14px] text-gray-500 mb-2 flex">
                        Title: {{$report->title}} || by.{{$report->user->name}}
                    </li>
                    <li class="md:text-[18px] text-[14px] text-gray-500 mb-2">
                        Category: {{$report->category->name}}
                    </li>
                    <li class="md:text-[18px] text-[14px] text-gray-500 mb-2">
                        Location: {{$report->location}}
                    </li>
                    <li class="md:text-[18px] text-[14px] text-gray-500 mb-2 max-h-32 overflow-y-scroll">
                        Description:
                        <br>
                        {{$report->description}}
                    </li>
                </ul>
            </div>
            <div class="col-span-3 h-[12rem] shadow-md shadow-gray-200 p-4">
                <label class="form-control">
                    <div class="label">
                        <span class="label-text text-gray-500">Administrator response</span>
                    </div>
                    <textarea class="textarea outline-none border-gray-200 text-gray-500 md:h-24  md:max-h-24 h-32 max-h-32 overflow-y-scroll bg-white " placeholder="Bio" readonly>
                    {{count($report->response) == 0 ? "none of response here": $report->response[0]->description}}
                </textarea>
                </label>
            </div>
        </div>
    </div>
</x-app-layout>
