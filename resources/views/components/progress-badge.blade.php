@props(['id', 'is_active' => false])

@php
    switch ($id) {
        case 0:
            $badgeClasses = $is_active ? 'badge-neutral' : 'badge-outline text-black';
            break;
        case 1:
            $badgeClasses = $is_active ? 'bg-[#3A606E] text-[#D7E5EA] border-[#D7E5EA]' : 'bg-[#D7E5EA] text-[#3A606E] border-[#3A606E]';
            break;
        case 2:
            $badgeClasses = $is_active ? 'bg-[#C2AC0A] text-[#FDF8D8] border-[#FDF8D8]' : 'bg-[#FDF8D8] text-[#C2AC0A] border-[#C2AC0A]';
            break;
        case 3:
        default:
            $badgeClasses = $is_active ? 'bg-[#008F81] text-[#ebfffd] border-[#ebfffd]' : 'bg-[#ebfffd] text-[#008F81] border-[#008F81]';
            break;
    }
@endphp

<a {!! $attributes->merge(['class' => 'badge cursor-default md:py-3 md:px-4 '.$badgeClasses]) !!} href="{{ Auth::user()->role == 'admin'?($id == 0?route('admin.report'):route('admin.report',  ['id' => $id])):($id==0?route('student.report.find'):route('student.report.find', ['id' => $id])) }}">
    @if($id == 0)
        Semua
    @elseif($id == 1)
        Pending
    @elseif ($id == 2)
        Process
    @else
        Done
    @endif
</a>
