@extends('layouts.base')
@section('content')
<div class="text-center max-w-6xl mx-10">
    <h1 class="my-3 text-3xl font-bold tracking-tight text-gray-800 md:text-5xl">
       {{$maintext->name}}
    </h1>
    <div>
        <p class="max-w-2xl mx-auto my-2 text-base text-gray-500 md:leading-relaxed md:text-xl">
            {!! $maintext->body !!}
        </p>
    </div>
</div>
@endsection
