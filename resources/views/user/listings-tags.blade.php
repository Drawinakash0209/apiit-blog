@props(['tagsCsv'])
@php

$tags = explode(',',$tagsCsv);

@endphp

   @foreach ($tags as $tag)

   <div class="mr-2 mt-1 rounded-2xl bg-blue-100 py-1.5 px-4 text-xs text-gray-600">#<a href="/?tag={{$tag}}">{{$tag}}</a></div>

   @endforeach
