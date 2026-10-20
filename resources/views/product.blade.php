@extends('layouts.base')
@section('content')
    <div>
        <div class="max-w-screen-lg mx-auto p-5 sm:p-10 md:p-16">

            <div class="mb-10 rounded overflow-hidden flex flex-col mx-auto text-center">
                <a href="#"
                   class="max-w-3xl mx-auto text-xl sm:text-4xl font-semibold inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">The
                {{$product->name}}</a>

                <a href="#">
                    <img class="w-full my-4"
                         src="{{asset('storage/'.$product->picture)}}"
                         alt="Sunset in the mountains">
                </a>
                <p class="text-gray-700 text-base leading-8 max-w-2xl mx-auto">
                    {!! $product->description !!}
                </p>
                <div class="py-5 text-sm font-regular text-gray-900 flex items-center justify-center">
            <span class="mr-3 flex flex-row items-center">
                <span class="ml-1">{{$product->price}} руб.</span></span>
                    <a href="#" class="flex flex-row items-center hover:text-indigo-600">
                        <span class="ml-1">Купить</span></a>
                </div>
                <hr>

            </div>

        </div>
    </div>
@endsection
