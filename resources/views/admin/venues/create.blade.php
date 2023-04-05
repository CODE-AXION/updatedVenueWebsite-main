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
                    <form enctype="multipart/form-data" action="{{route('venue.store')}}" method="POST">
                        @csrf
                
                    <h1 class="text-3xl mt-4 mb-8"> Create Venue</h1>
                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Venue Name</label>
                        <input type="text" value="{{old('name')}}" name="name" id="email" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="Party Plot, Banquery Hall , Wedding Hall" >
                        @foreach ($errors->get('name') as $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <label for="text" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Image Name</label>
                        <input type="file" value="" name="image"  class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="Wedding, Kitty kat, parties, lol deaths haha" >
                        @foreach ($errors->get('image') as $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>


                    <div class="mb-6">
                        <label for="capacity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Venue Capacity</label>
                        <input type="text" value="{{old('capacity')}}" id="capacity" name="capacity" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="5000 to 1000" >
                        @foreach ($errors->get('capacity') as $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>
            
                    <div class="mb-5 ">
                        <label for="" class="my-2 block">Enter Your  Description</label>
                        <textarea class="rounded" name="description" id="" cols="30" rows="4">{{old('description')}}</textarea>
                        @foreach ($errors->get('description') as $error)
                            <p class="text-red-600" > {{$error}} </p>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                        <select id="countries" value="{{old('event')}}" name="event" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""> Choose Your Event </option>

                            @foreach ($events as $event)
                            
                            <option value="{{$event->id}}"> {{$event->name}} </option>
                            @endforeach
                        </select>
                        @foreach ($errors->get('event') as $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                        <select id="countries"  name="category" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""> Choose Your Category </option>

                            @foreach ($categories as $category)
                            
                            <option value="{{$category->id}}"> {{$category->name}} </option>
                            @endforeach
                        </select>
                        @foreach ($errors->get('category') as $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>


                    
                    <div class="mb-6">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an option</label>
                        <select id="countries"  name="location" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value=""> Choose Your Locations </option>

                            @foreach ($locations as $location)
                            
                            <option value="{{$location->id}}"> {{$location->name}} </option>
                            @endforeach
                        </select>
                        @foreach ($errors->get('location') as $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>

                    <div class="mb-6">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Venue Price (*per Day) </label>
                        <input type="number" value="{{old('price')}}" name="price" id="price" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="50000 " >
                        @foreach ($errors->get('price') as $error)
                            <p class="text-red-600">{{$error}}</p>
                        @endforeach
                    </div>

                    <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                        Create Venue
                    </button>

                </div>


            </form>
        </div>
    </body>
</html>
