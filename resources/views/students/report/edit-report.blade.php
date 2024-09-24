<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Report') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                <form method="post" enctype="multipart/form-data" action="{{route('student.report.update', ['id'=>$report->id])}}">
                    @csrf
                    <div class="my-2">
                        <x-input-label for="title" :value="__('title')" />
                        <x-text-input id="title" :value="$report->title" class="block mt-1 w-full" type="text" name="title"  required autofocus autocomplete="title" />
                        <x-input-error :messages="$errors->get('title')" class="mt-2" />
                    </div>
                    <div class="my-2">
                        <x-input-label for="category" :value="__('category')" />
                        <select class="select select-bordered mt-1 border-gray-300 focus:border-[#3A606E] focus:ring-[#3A606E] bg-white w-full max-w-full" required name="category_id" >
                            <option>Category</option>
                            @foreach($category as $c)
                                <option value="{{$c->id}}" @if($report->category_id == $c->id) selected @endif>{{$c->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('category_id')" class="mt-2" />
                    </div>
                    <x-input-label for="image" :value="__('image')" />
                    <div class="my-2 flex gap-2">
                        <div class="flex-shrink">
                            <img src="{{$report->image}}" height="100px" width="100px" class="object-cover">
                        </div>
                        <div class="flex-1 my-auto">
                            <input id="image" class="file-input file-input-bordered w-full max-w-full mt-1 focus:border-[#3A606E] focus:ring-[#3A606E] bg-white border-gray-300" type="file" name="image" :value="old('image')"  autofocus>
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>
                    </div>
                    <div class="my-2">
                        <x-input-label for="location" :value="__('location')" />
                        <textarea class="textarea mt-1 textarea-bordered bg-white w-full focus:border-[#3A606E] focus:ring-[#3A606E] border-gray-300" placeholder="location" required name="location">
                            {{$report->location}}
                        </textarea>
                        <x-input-error :messages="$errors->get('location')" class="mt-2" />
                    </div>
                    <div class="my-2">
                        <x-input-label for="description" :value="__('description')" />
                        <textarea class="textarea mt-1 textarea-bordered bg-white w-full focus:border-[#3A606E] focus:ring-[#3A606E] border-gray-300" placeholder="Description" required name="description">
                            {{$report->description}}
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