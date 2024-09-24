<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-start">
            {{ __('Information') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4">
                <a class="btn bg-[#008F81] text-[#ebfffd] border-none" href="{{route('admin.information.create')}}">
                    tambah
                </a>
            </div>
            <div class="bg-white shadow-sm shadow-gray-200 max-h-96 min-h-96  sm:rounded-lg p-4">
                <table class="table">
                    <tr class="border-none border-collapse text-center text-black">
                        <td>
                            No
                        </td>
                        <td>
                            image
                        </td>
                        <td>
                            title
                        </td>
                        <td>
                            action
                        </td>
                    </tr>
                    @forelse($information as $i)
                        <tr @class(['border-none border-collapse text-center text-black','bg-gray-100' => $loop->iteration % 2 == 1 ])>
                            <td>
                                {{$loop->iteration}}
                            </td>
                            <td class="flex justify-center">
                                <img src="{{$i->image}}" height="200" width="200">
                            </td>
                            <td>
                                {{$i->title}}
                            </td>
                            <td>
                                <a class="btn btn-warning text-white" href="{{ route('admin.information.edit', ['id'=>$i->id]) }}">
                                    <x-icon.edit/>
                                </a>
                                <a class="btn btn-error text-white" href="{{ route('admin.information.destroy', ['id'=>$i->id]) }}">
                                    <x-icon.trash/>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-black">
                                tidak ada data disini
                            </td>
                        </tr>
                    @endforelse
                </table>
            </div>
            <div class="text-black p-2 my-8">
                {!! $information->withQueryString()->links() !!}
            </div>
        </div>
    </div>
</x-app-layout>
