<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add new information') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <form method="post" enctype="multipart/form-data" action="{{route('admin.information.update', ['id'=>$information->id])}}">
                    @csrf
                    <div class="my-2">
                        <x-input-label for="title" :value="__('title')" />
                        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="$information->title" required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div class="my-2">
                        <img src="{{$information->image}}" width="200" height="200">
                    </div>
                    <div class="my-2">
                        <x-input-label for="image" :value="__('image')" />
                        <input id="image" class="file-input file-input-bordered w-full max-w-full mt-1 focus:border-[#3A606E] focus:ring-[#3A606E] bg-white border-gray-300" type="file" name="image" :value="old('image')" autofocus>
                        <x-input-error :messages="$errors->get('image')" class="mt-2" />
                    </div>
                    <div class="my-2">
                        <x-input-label for="description" :value="__('description')" />
                        <textarea class="textarea mt-1 textarea-bordered bg-white w-full focus:border-[#3A606E] focus:ring-[#3A606E] border-gray-300" placeholder="Description" required name="description">
                            {{$information->description}}
                        </textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>
                    <div class="flex justify-end">
                        <button class="btn bg-[#3A606E] border-none text-white">
                            submit
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

</x-app-layout>
