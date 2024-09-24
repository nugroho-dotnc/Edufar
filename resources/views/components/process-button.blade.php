@props(['report'])

<?php
$processClasses = '';
$text = '';


switch ($report->progres_id) {
    case 1:
        $processClasses = 'btn border-none outline-none bg-[#008F81] text-[#ebfffd]';
        $text = 'process';
        break;
    case 2:
        $processClasses = 'btn border-none outline-none bg-[#C2AC0A] text-[#FDF8D8]';
        $text = 'finish';
        break;
    case 3:
        $processClasses = 'btn border-none outline-none bg-[#A30029] text-[#FFEBF0] disabled';
        $text = 'finished';
        break;
    default:
        $processClasses = 'btn border-none outline-none bg-[#A30029] text-[#FFEBF0]';
        $text = 'finished';
        break;
}
?>
<a {!! $attributes->merge(['class' => $processClasses]) !!} href="{{ route('admin.response.process', ['id' => $report->id]) }}">
    {{ $text }}
</a>
