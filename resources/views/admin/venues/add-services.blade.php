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
        <div class="min-h-screen bg-gray-100 flex ">
            @include('layouts.sidebar')

                <div class="ml-4 mt-16 w-9/12 flex items-start gap-4">


                    <form action="{{route('venue.store.services',['venue_id' => $venue->id])}}" method="POST">
                        @csrf
                        <h1 class="text-3xl mt-4 mb-8">Add Services Venue: <br>{{$venue->name}}</h1>
          


                        <div class="mb-6">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Choose Your Plan</label>
                            <select id="countries" value="{{old('plan_id')}}" name="plan_id" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5 ">
                                <option value=""> Choose Your Plan </option>

                                @foreach ($plans as $plan)
                                
                                    <option value="{{$plan->id}}"> {{$plan->name}} </option>

                                @endforeach
                            </select>
                            @foreach ($errors->get('plan_id') as $error)
                                  <p class="text-red-600" > {{$error}} </p>
                            @endforeach
                        </div>
        
                        <div class="mb-6">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 e">Choose Your Service</label>
                            <select id="countries"  name="service_id" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block  p-2.5  ">
                                <option value=""> Choose Your Service </option>

                                @foreach ($services as $service)
                                
                                    <option value="{{$service->id}}"> {{$service->name}} </option>

                                @endforeach
                            </select>
                            
                            @foreach ($errors->get('service_id') as $error)
                                  <p class="text-red-600" > {{$error}} </p>
                            @endforeach
                        </div>

                        <div class="mb-5 ">
                            <label for="" class="my-2 block">Enter Your Service Description</label>
                            <textarea class="rounded" name="service_description" id="" cols="30" rows="4">{{old('service_description')}}</textarea>
                            @foreach ($errors->get('service_description') as $error)
                                <p class="text-red-600" > {{$error}} </p>
                            @endforeach
                        </div>

                        <div class="mb-6">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900 "> Price  </label>
                            <input type="number" name="service_price" value="{{old('service_price')}}" id="price" class="bg-gray-50 w-80 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 " placeholder="50000 " >
                            @foreach ($errors->get('service_price') as $error)
                                <p class="text-red-600" > {{$error}} </p>
                            @endforeach
                        </div>

                        <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300  shadow-lg shadow-blue-500/50  font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 ">
                            Add Service
                        </button>
                    </form>

                    <div class="w-7/12 ml-auto overflow-y-scroll" style="height: 25rem; ">
                      
                        <div class="">
                            <h1 class="bg-blue-400 rounded-t-md text-3xl text-white text-center"> Services</h1>
                            
                            <div class="flex flex-wrap items-center ">

                                @foreach ($venue->services as $service)
                                <div class="w-4/12 border p-2">

                                    
                                    <div class="text-2xl text-blue-700">Plan <br> {{App\Models\Plan::where('id',$service->pivot->plan_id)->first()->name ?? 'No Plans'}}</div>
                                    <div class="text-xl border-b pb-1 ">Service:</div>
                                    <div > - {{$service->name}} </div>
                                    <div class="text-xl border-b pb-1 ">Capacity:</div>
                                    <div>- {{$service->capacity}} </div>
                                    <div class="text-xl border-b pb-1 ">Description:</div>
                                    <div>- {{$service->pivot->service_description}} </div>
                                    <div class="text-xl border-b pb-1 ">Price:</div>
                                    <div> - {{$service->pivot->service_price}} INR </div>
                                    <form method="POST" action="{{route('venue.delete.services',['venue_id' => $venue->id,'service_id' => $service->id ])}}">
                                        @csrf
                                        <button type="submit" class="text-white bg-red-600 rounded-sm mx-auto px-2 py-1 text-center mt-3">Cancel Service</button>
                                    </form>
                                </div>
                                @endforeach
             
                            </div>
                        </div>
   
                    </div>

                </div>
        
        </div>
    </body>
</html>
