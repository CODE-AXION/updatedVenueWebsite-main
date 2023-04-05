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
                    <form action="{{route('service.update',$service->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                    <h1 class="text-3xl mt-4 mb-8"> Update Service: <br> {{$service->name}} </h1>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Service Name</label>
                        <input type="text" value="{{old('name',$service->name ?? null)}}" name="name" id="email" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="DJ Service, Catterine, Birthblocks" >
                        @foreach ($errors->get('name') as $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Capacity</label>
                        <input type="text" value="{{old('capacity',$service->capacity ?? null)}}" name="capacity" id="email" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="100 4000" >
                        @foreach ($errors->get('capacity') as $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="text" value="{{old('price',$service->price ?? null)}}" name="price" id="email" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="455" >
                        @foreach ($errors->get('price') as $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>


                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                        Update Service
                    </button>

                </div>


            </form>
        </div>
    </body>
</html>