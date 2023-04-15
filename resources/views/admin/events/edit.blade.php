<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            @include('layouts.sidebar')

                <div class="ml-4 mt-16 w-9/12">
                    <form action="{{route('event.update',$event->id)}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PUT')
                    <h1 class="text-3xl mt-4 mb-8"> Update Event: <br>
                    {{$event->name}}
                    </h1>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Your Event Name</label>
                        <input type="text" value="{{old('name',$event->name ?? null)}}" name="name" id="email" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="Wedding, Kitty kat, parties, lol deaths haha" >
                        @foreach ($errors->get('name') as $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 ">Your Image Name</label>
                        <input type="file" value="" name="image"  class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="Wedding, Kitty kat, parties, lol deaths haha" >
                        @foreach ($errors->get('image') as $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>



                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 shadow-lg shadow-blue-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                        Update Event
                    </button>

                </div>


            </form>
        </div>
    </body>
</html>
