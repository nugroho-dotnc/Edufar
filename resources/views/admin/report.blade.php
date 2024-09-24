<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
                <span class="my-auto">
                    {{ __('Search') }}
                </span>
            <form method="POST" enctype="multipart/form-data" class=" md:place-content-end my-2 md:mt-0 hidden md:block" action="{{ route('admin.report.search', ['id'=>$selected_progress]) }}">
                @csrf
                <div class="join">
                    <div>
                        <div>
                            <input class="input input-bordered join-item border-gray-300 bg-white max-w-max" placeholder="Search" value="{{old('query')}}" name="query"/>
                        </div>
                    </div>
                    <select class="select select-bordered border-gray-300 join-item bg-white" name="category">
                        <option  value="0" @if($category_id == 0) selected @endif>semua</option>
                        @foreach($category as $c)
                            <option value="{{$c->id}}" @if($category_id == $c->id) selected @endif >{{$c->name}}</option>
                        @endforeach
                    </select>
                    <div class="indicator">
                        <button class="btn join-item bg-[#3A606E] border-none text-white" type="submit">
                            <x-icon.search/>
                        </button>
                    </div>
                </div>
            </form>
        </h2>
    </x-slot>

    <div class="md:py-6 py-3 h-[45.15rem] md:h-[38rem] overflow-y-scroll">
        <div class="max-w-7xl py-1 grid grid-cols-2 md:grid-cols-6 gap-2  mx-auto px-2 md:px-8">
            <div class="col-span-2 md:hidden block my-4">
                <form method="POST" enctype="multipart/form-data" class="my-2" action="{{ route('admin.report.search', ['id'=>$selected_progress]) }}">
                    @csrf
                    <div class="join">
                        <div>
                            <div>
                                <input class="input input-bordered join-item border-gray-300 bg-white max-w-max" placeholder="Search" value="{{old('query')}}" name="query"/>
                            </div>
                        </div>
                        <select class="select select-bordered border-gray-300 join-item bg-white" name="category">
                            <option  value="0" @if($category_id == 0) selected @endif>semua</option>
                            @foreach($category as $c)
                                <option value="{{$c->id}}" @if($category_id == $c->id) selected @endif >{{$c->name}}</option>
                            @endforeach
                        </select>
                        <div class="indicator">
                            <button class="btn join-item bg-[#3A606E] border-none text-white" type="submit">
                                <x-icon.search/>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-span-2 md:col-span-6 flex justify-start gap-2 my-auto mb-4 mx-2">
                <x-progress-badge :id="0" :is_active="$selected_progress == 0"/>
                @foreach($progress as $c)
                    <x-progress-badge :id="$c->id" :is_active="$c->id == $selected_progress"/>
                @endforeach
            </div>

            @foreach($report as $r)
                <x-report-card :data="$r"/>
            @endforeach
            <div class="col-span-2 md:col-span-6 md:my-10 my-4 mx-2">
                {!! $report->withQueryString()->links() !!}
            </div>
        </div>
    </div>

</x-app-layout>
