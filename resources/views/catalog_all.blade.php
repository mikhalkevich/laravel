@extends('layouts.base')
@section('content')
    <div>
    <nav class="flex mb-5 w-full" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2">
            <li class="inline-flex items-center">
                <a href="#" class="text-gray-700 hover:text-gray-900 inline-flex items-center">
                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                        </path>
                    </svg>
                    Каталог
                </a>
            </li>

        </ol>
    </nav>
    <ul>
        @foreach($catalogs as $catalog)
        <li>
            <a href="{{asset('catalog/'.$catalog->id)}}">{{$catalog->name}}</a>
        </li>
        @endforeach
    </ul>
        <div class="flex px-3 py-3">
            @foreach($products as $product)
                <div class="max-w-sm rounded overflow-hidden shadow-lg">
                    <a href="{{asset('product/'.$product->id)}}">
                    <img class="w-full" src="{{asset('storage/'.$product->picture)}}" alt="{{$product->name}}">
                    </a>
                    <div class="px-6 py-4">
                        <div class="font-bold text-xl mb-2">
                            <a href="{{asset('product/'.$product->id)}}" class="btn btn-link hover:underline">
                            {{$product->name}}
                            </a>
                        </div>
                        <p class="text-gray-700 text-base">
                            {{$product->description}}
                        </p>
                    </div>
                    <div class="px-6 py-4">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2"> {{$product->price}} руб.</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
