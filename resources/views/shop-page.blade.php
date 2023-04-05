<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venue</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
</head>
<body class=" bg-slate-50">

 
    @include('layouts.navbar')



    <div class="w-10/12 mt-16 mx-auto">
        <div> <span class="font-semibold"> <a href="{{route('venue.home')}}"> Home </a> </span> \ 
        
            @if($event)
            {{$event->name}}
            @elseif($category)
            {{$category->name}}
            @elseif($location)
            {{$location->name}}
            @else
            shop
            @endif
        </div>
 
        
        <div class="flex gap-8 flex-row-reverse justify-between w-full">
            <div class="w-full">
                @if($venues->isNotEmpty())
                @foreach ($venues as $venue)
                    
                
                <a href="{{route('venue.details',$venue->id)}}" class="w-full  mt-4 flex items-start gap-4 p-4 shadow-md">
                    <div class="rounded-md w-80 overflow-hidden">
                        <img class="w-full object-cover" src="https://image.wedmegood.com/resized/450X/uploads/member/2366606/1633744428_DSC_9645.JPG?crop=16,239,2006,1128" alt="">
                    </div>

                    <div>
                        <h1 class="font-semibold text-slate-700 text-xl">{{$venue->name}}</h1>

                        <div class="flex items-center mt-2 gap-4">
                            <div class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 fill-slate-400 bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                    <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                </svg>

                                <h1 class="text-slate-600 font-semibold"> {{$venue->location->name ?? ''}} </h1> 
                            </div>

                            <div class="flex items-center gap-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 fill-slate-400 bi bi-building-fill-check" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
                                    <path d="M2 1a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1v7.256A4.493 4.493 0 0 0 12.5 8a4.493 4.493 0 0 0-3.59 1.787A.498.498 0 0 0 9 9.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .39-.187A4.476 4.476 0 0 0 8.027 12H6.5a.5.5 0 0 0-.5.5V16H3a1 1 0 0 1-1-1V1Zm2 1.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3 0v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5Zm3.5-.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1ZM4 5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM7.5 5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Zm2.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5ZM4.5 8a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1Z"/>
                                </svg>

                                <h1 class="text-slate-600 font-semibold"> {{$venue->category->name}} </h1>
                                /
                                <h1 class="text-slate-600 font-semibold">  {{$venue->event->name}} </h1>
                            </div>

                            <div class="flex items-center gap-4">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 fill-slate-400 bi bi-people-fill" viewBox="0 0 16 16">
                                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                                </svg>
                                <h1 class="text-slate-600 font-semibold"> 300 - 500 </h1> 
                            </div>
                        </div>

                        <div>
                            <h1 class="font-semibold text-lg text-slate-800 mt-2"> ₹ {{$venue->price}} </h1> 
                        </div>
                        <div>
                            <h1 class="text-sm text-slate-800">

                                {{$venue->description}}
                            </h1>
                        </div>
                    </div>

                </a>

                @endforeach
                <div class="my-10">{{$venues->links()}}</div>
                @else
                <h1 class="text-2xl font-semibold text-center flex items-center justify-center">No Venues Found !</h1>
                @endif
            </div>

            <div class="mt-8 w-3/12">
                <h1 class="text-xl text-left text-pink-500 font-semibold">Venues By Type</h1>
                
                @foreach ($occasions as $occasion)
                
                <a href="{{route('venue.shop',['event_id' => $occasion->id])}}" class="block my-2 text-lg">{{$occasion->name}}</a>
                @endforeach

                <h1 class="text-xl mt-8 text-left text-pink-500 font-semibold">Venues By Categories</h1>
                
                @foreach ($categories as $category)
                
                <a  href="{{route('venue.shop',['category_id' => $category->id])}}" class="my-2 block text-lg">{{$category->name}}</a>
                @endforeach
                <h1 class="text-xl mt-8 text-left text-pink-500 font-semibold">Venues By Locations</h1>

                 
                @foreach ($locations as $location)
                
                <a href="{{route('venue.shop',['location_id' => $location->id])}}" class="my-2 block text-lg">{{$location->name}}</a>
                @endforeach
         
      
            </div>
        </div>
    </div>



</body>

</html>
