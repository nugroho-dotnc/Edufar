@props(['data'])
<div class="carousel w-full">
    @forelse($data as $d)
        <div id="{{'slide'.$d->id}}" class="carousel-item relative w-full">
            <img src="{{$d->image}}" class="w-full h-44 md:h-80 object-cover" />
            <div class="md:flex justify-center absolute bottom-0 mx-auto w-full py-2 gap-2 hidden ">
                @forelse($data as $d)
                    <a href="{{'#slide'.$d->id}}" class="btn btn-xs">{{$loop->iteration}}</a>
                @empty
                    <a href="{{'#slide0'}}" class="btn btn-xs">1</a>
                @endforelse
            </div>
        </div>
    @empty
        <div id="{{'slide0'}}" class="carousel-item relative w-full">
            <img src="{{asset('image/common/Welcome.png')}}" class="w-full h-44 md:h-64" />
        </div>
    @endforelse

</div>
<div class="flex justify-center w-full py-2 gap-2 md:hidden">
    @forelse($data as $d)
        <a href="{{'#slide'.$d->id}}" class="btn btn-xs">{{$loop->iteration}}</a>
    @empty
        <a href="{{'#slide0'}}" class="btn btn-xs">1</a>
    @endforelse
</div>
