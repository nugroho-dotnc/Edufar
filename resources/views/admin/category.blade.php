<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between">
            {{ __('Category') }}
            <form method="POST" enctype="multipart/form-data" class=" md:place-content-end my-2 md:mt-0 hidden md:block" action="{{ route('admin.category.search') }}">
                @csrf
                <div class="join">
                    <div>
                        <div>
                            <input class="input input-bordered join-item border-gray-300 bg-white max-w-max" placeholder="Search" value="{{old('query')}}" name="query"/>
                        </div>
                    </div>
                    <div class="indicator">
                        <button class="btn join-item bg-[#3A606E] border-none text-white" type="submit">
                            <x-icon.search/>
                        </button>
                    </div>
                </div>
            </form>
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex my-auto justify-between mb-4">
                <form method="POST" enctype="multipart/form-data" class=" md:place-content-end md:mt-0 block md:hidden" action="{{ route('admin.category.search') }}">
                    @csrf
                    <div class="join">
                        <div>
                            <div>
                                <input class="input input-bordered join-item border-gray-300 bg-white max-w-44" placeholder="Search" value="{{old('query')}}" name="query"/>
                            </div>
                        </div>
                        <div class="indicator">
                            <button class="btn join-item bg-[#3A606E] border-none text-white" type="submit">
                                <x-icon.search/>
                            </button>
                        </div>
                    </div>
                </form>
                <a class="btn bg-[#008F81] text-[#ebfffd] border-none" href="{{route('admin.category.create')}}">
                    tambah
                </a>
            </div>
            <div class="bg-white overflow-y-scroll shadow-sm shadow-gray-200 max-h-96  sm:rounded-lg p-4">
                <table class="table">
                    <tr class="border-none border-collapse text-center text-black">
                        <td>
                            No
                        </td>
                        <td>
                            Name
                        </td>
                        <td>
                            report
                        </td>
                        <td>
                            action
                        </td>
                    </tr>
                    @foreach($category as $c)
                        <tr @class(['border-none border-collapse text-center text-black','bg-gray-100' => $loop->iteration % 2 == 1 ])>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td>
                                {{$c->name}}
                            </td>
                            <td>
                                {{count($c->reports)}}
                            </td>
                            <td>
                                <a class="btn btn-warning text-white" href="{{ route('admin.category.edit', ['id'=>$c->id]) }}">
                                    <x-icon.edit/>
                                </a>
                                <a class="btn btn-error text-white" href="{{ route('admin.category.delete', ['id'=>$c->id]) }}">
                                    <x-icon.trash/>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div class="text-black p-2 my-8">
                {!! $category->withQueryString()->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
