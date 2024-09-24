@extends('layouts.app')

@section('title')
    {{ config('app.name') }}
@endsection

@section('content')
    <div class="max-w-5xl w-full mx-auto my-14">
        <div class="bg-[#D9D9D9] rounded-lg">
            <div class="flex-col py-6">
                <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" class="w-20  h-20 overflow-hidden rounded-full object-cover mx-auto"/>
                <h1 class="text-center text-black font-bold text-lg my-2">
                    Jessica Mandraguno
                </h1>
                <h1 class="text-center text-black text-sm my-4">
                    KETERANGAN APA INI KURTAW
                </h1>
            </div>
        </div>
        <div class="flex w-full my-5 border-b-2 border-black pb-4">
            <div class="flex-1">
                <div class="w-48 h-8 p-1 text-center rounded-xl bg-gray-200 mx-auto">
                    Following 1
                </div>
            </div>
            <div class="flex-1">
                <div class="w-48 h-8 p-1 text-center rounded-xl bg-gray-200 mx-auto">
                    Following 1
                </div>
            </div>
        </div>
        <div class="h-[32rem] max-h-[32rem] overflow-y-scroll max-w-5xl bg-white  my-5">
{{--            mulai dari sini untuk copasnya --}}
            <div class="bg-[#D9D9D9] h-[72px] rounded-md px-2 flex gap-6 mt-2">
                <img class="overflow-hidden rounded-lg object-cover my-auto w-[120px] h-[60px] flex-shrink" src="data:image/jpeg;base64,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">
                <div class="flex-1 flex flex-col my-[6px] gap-2">
                    <div class="w-full line-clamp-1 overflow-hidden text-black font-bold">
                        VIRAL!! CAK LONTONG MAKAN SATE LONTONG
                    </div>
                    <div class="flex gap-12 max-w-2xl">
                        <div class="flex flex-shrink gap-4 overflow-x-hidden">
                            <img class="h-[1.5rem] w-[1.5rem] rounded-full overflow-hidden object-fit" src="https://i.pinimg.com/736x/48/fa/72/48fa729b53e7faddb30a496323805607.jpg">
                            <h3 class="my-auto text-black">Shemeleketek osas</h3>
                        </div>
                        <div class="flex-shrink text-black">
                            2 hari lalu
                        </div>
                    </div>
                </div>
                <div class="w-[4rem] flex-shrink my-auto">
                    <a class="btn text-black btn-ghost my-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>
                </div>
            </div>
{{--            diatas ini penutup dari kontennya--}}
        </div>
    </div>
@endsection
