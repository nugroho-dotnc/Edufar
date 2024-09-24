@props(['data'] )
<div class="card w-44 md:w-48 mx-auto bg-white shadow-xl col-span-1 rounded-md">
    <figure class=" bg-gray-100 max-h-32 min-h-32 relative">
        <img src="{{$data->image??"https://st3.depositphotos.com/23594922/31822/v/450/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg"}}" alt="{{$data->title??""}}" class="max-h-32 min-h-32 object-cover overflow-hidden"/>
        <div class="absolute top-0 start-0 p-2">
            <x-progress-badge :id="$data->progres_id??1" />
        </div>
    </figure>
    <div class="card-body text-gray-500 p-1 text-sm">
        <h2 class="card-title  text-sm md:text-md">{{$data->title??""}}</h2>
        <p>{{$data->location??""}}</p>
        <div class="card-actions justify-end">
            @if($data->user_id == Auth::user()->id && Auth::user()->role == 'student')
                <a class="btn bg-[#ebfffd] border-none  h-8 max-h-8 min-h-8 px-0.5 m-1 text-[12px] text-[#008F81]" href="{{route('student.report.edit', ['id'=>$data->id??0])}}">
                    <x-icon.edit/>
                </a>
            @endif
            <a class="btn bg-[#FDF8D8] border-none  h-8 max-h-8 min-h-8 px-0.5 m-1 text-[12px] text-[#C2AC0A]" href="{{Auth::user()->role == 'admin'?route('admin.report.detail', ['id'=>$data->id]):route('student.report.detail', ['id'=>$data->id??0])}}">
                <x-icon.open/>
            </a>
        </div>
    </div>
</div>
