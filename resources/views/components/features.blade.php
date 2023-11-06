@props(['features'])
@php
$feauterssplit=explode(',',$features)
@endphp

@foreach ($feauterssplit as $split)
<span class="bg-gradient-to-r from-cyan-500 to-cyan-900 rounded-full text-xs uppercase font-extrabold m-2 p-1.5">{{$split}}</span>
@endforeach