<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body class=" bg-slate-50">
    @include('layouts.navbar')


    <div style="height: 500px;" class="w-full overflow-hidden relative">

        <img class="object-cover w-full h-full" src="https://image.wedmegood.com/resized/1900X/uploads/city_bg_image/1/delhi_bg.jpeg" alt="">
        <div style="background-image:linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8) 89%, rgb(0, 0, 0)) " class="absolute opacity-80 inset-0"></div>
        <div style="bottom: 100px" class="absolute flex items-center justify-center z-50 w-full ">

            <form class=" flex items-center justify-center w-full mx-auto" method="POST" action="{{route('location.home.search')}}">
                <div class="  bg-pink-500 flex items-center justify-center w-14 h-12 rounded-l-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-7 h-7 fill-white bi bi-house-heart-fill" viewBox="0 0 16 16">
                        <path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.707L8 2.207 1.354 8.853a.5.5 0 1 1-.708-.707L7.293 1.5Z"/>
                        <path d="m14 9.293-6-6-6 6V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9.293Zm-6-.811c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.691 0-5.018Z"/>
                      </svg>
                </div>
                @csrf
                <select name="location" onchange="this.form.submit()" class="bg-white w-8/12 h-12 font-semibold text-pink-600 text-lg border-none rounded-r-lg " id="">
                    @foreach ($locations as $location)

                    <option value="{{$location->id}}">{{$location->name}}</option>

                    @endforeach
                </select>
            </form>
        </div>
    </div>

    <div class=" max-w-7xl mx-auto my-10">

        <div class="w-10/12 mx-auto mt-8">
            <a href="https://www.myntra.com/">
                <img class="object-cover mx-auto" src="https://image.wedmegood.com/resized-nw/1200X/uploads/images/006baed3d1d24576942b3482224cede3catdeskbannerhome/Bridaloutfit.png" alt="">
            </a>
        </div>

        <div  class="w-10/12 mx-auto flex-wrap mt-8 flex items-center justify-around gap-4">

            <h1 class="text-2xl text-pink-600"> Filter By Popular Locations </h1>

        </div>
        <div class="w-10/12 mx-auto mt-8 flex items-center justify-between gap-4 ">
            @foreach ($categoryLocations as $categoryLocation)
                
            <div class="rounded-md relative overflow-hidden  ">
                <a href="{{route('venue.shop',['location_id' => $categoryLocation->id])}}">
                    <img class=" object-cover w-72 h-36" src="{{asset($categoryLocation->image)}}" alt="">
                    <div style="background-image:linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.8) 89%, rgb(0, 0, 0)) " class="absolute opacity-80 inset-0"></div>
                    <div class="absolute inset-0 text-2xl font-light text-white flex items-center justify-center w-full"> {{$categoryLocation->name}}</div>
                </a>
            </div>
                
            @endforeach
        </div>
        <div  class="w-10/12 mx-auto flex-wrap mt-8 flex items-center justify-around gap-4">

            <h1 class="text-2xl text-pink-600"> Popular Venues </h1>

        </div>

        <div class="w-full mx-auto flex-col md:flex-row flex-wrap mt-8 flex items-center justify-around  gap-4 ">

            @foreach ($venues->take(3) as $venue)


            <div class="rounded-md w-full md:w-[24%]  overflow p-4  shadow-lg overflow-hidden ">
                <img class=" object-cover w-full md:w-80 md:h-44 rounded" src="{{asset($venue->image)}}" alt="">
                <h1>{{$venue->name}}</h1>
                <h1>Capacity : {{$venue->capacity}}</h1>
                <h1>Price: {{$venue->price}} INR </h1>
                <a href="{{route('venue.details',$venue->id)}}" class="bg-blue-500 block mt-2 rounded text-center text-white w-full px-2 py-1">View Venue</a>

            </div>


            @endforeach


        </div>



        <div class="w-full mx-auto  flex-col md:flex-row flex-wrap mt-8 flex items-center justify-around  gap-4 ">

            @foreach ($venues->take(4) as $venue)


            <div  class="rounded-md w-full md:w-[24%]  overflow p-4  shadow-lg overflow-hidden ">
                <img class=" object-cover  w-full md:w-80 md:h-44 rounded" src="{{asset($venue->image)}}" alt="">
                <h1>{{$venue->name}}</h1>
                <h1>Capacity : {{$venue->capacity}}</h1>
                <h1>Price: {{$venue->price}} INR </h1>
                <a href="{{route('venue.details',$venue->id)}}" class="bg-blue-500 block mt-2 rounded text-center text-white w-full px-2 py-1">View Venue</a>

            </div>


            @endforeach


        </div>

        <div class="w-full mx-auto  flex-col md:flex-row flex-wrap mt-8 flex items-center justify-around  gap-4 ">

            @foreach ($venues->take(3) as $venue)


            <div class="rounded-md w-full md:w-[24%] overflow p-4  shadow-lg overflow-hidden ">
                <img class=" object-cover  w-full md:w-80 md:h-44  rounded" src="{{asset($venue->image)}}" alt="">
                <h1>{{$venue->name}}</h1>
                <h1>Capacity : {{$venue->capacity}}</h1>
                <h1>Price: {{$venue->price}} INR </h1>
                <a href="{{route('venue.details',$venue->id)}}" class="bg-blue-500 block mt-2 rounded text-center text-white w-full px-2 py-1">View Venue</a>

            </div>


            @endforeach


        </div>



        <div  class="w-10/12 mx-auto flex-wrap mt-8 flex items-center justify-around gap-4">

            <h1 class="text-2xl ">  Events </h1>

        </div>
        <div class="w-10/12 mx-auto flex-wrap mt-8 flex items-center justify-around gap-4">

            
            @foreach ($categoryEvents as $categoryEvent)
            <a href="{{route('venue.shop',['event_id' => $categoryEvent->id])}}">
                <div>
                    
                    <img class="object-cover w-56 h-56 rounded" src="{{asset($categoryEvent->image)}}" alt="">
                    <div class=" font-semibold text-pink-600 "> {{$categoryEvent->name}} </div>
                </div>
            </a>
            @endforeach

        </div>


        <div  class="w-10/12 mx-auto flex-wrap mt-8 flex items-center justify-around gap-4">

            <h1 class="text-2xl text-pink-600"> Featured Venues </h1>

        </div>
        <div class="w-full mx-auto  flex-col md:flex-row  flex-wrap mt-8 flex items-center justify-around  gap-4 ">

            @foreach ($venues->take(3) as $venue)


            <div class="rounded-md  w-full md:w-[24%] flex-col md:flex-row  overflow p-4  shadow-lg overflow-hidden ">
                <img class="object-cover w-full md:w-80 md:h-44 rounded" src="{{asset($venue->image)}}" alt="">
                <h1>{{$venue->name}}</h1>
                <h1>Capacity : {{$venue->capacity}}</h1>
                <h1>Price: {{$venue->price}} INR </h1>
                <a href="{{route('venue.details',$venue->id)}}" class="bg-blue-500 block mt-2 rounded text-center text-white w-full px-2 py-1">View Venue</a>

            </div>


            @endforeach


        </div>



        <div class="w-full mx-auto  flex-col md:flex-row  flex-wrap mt-8 flex items-center justify-around  gap-4 ">

            @foreach ($venues->take(4) as $venue)


            <div class="rounded-md w-full md:w-[24%]  overflow p-4  shadow-lg overflow-hidden ">
                <img class=" object-cover w-full md:w-80 md:h-44 rounded" src="{{asset($venue->image)}}" alt="">
                <h1>{{$venue->name}}</h1>
                <h1>Capacity : {{$venue->capacity}}</h1>
                <h1>Price: {{$venue->price}} INR </h1>
                <a href="{{route('venue.details',$venue->id)}}" class="bg-blue-500 block mt-2 rounded text-center text-white w-full px-2 py-1">View Venue</a>

            </div>


            @endforeach


        </div>

        <div class="w-full mx-auto  flex-col md:flex-row  flex-wrap mt-8 flex items-center justify-around  gap-4 ">

            @foreach ($venues->take(3) as $venue)


            <div  class="rounded-md w-full md:w-[24%]  overflow p-4  shadow-lg overflow-hidden ">
                <img class=" object-cover w-full md:w-80 md:h-44 rounded" src="{{asset($venue->image)}}" alt="">
                <h1>{{$venue->name}}</h1>
                <h1>Capacity : {{$venue->capacity}}</h1>
                <h1>Price: {{$venue->price}} INR </h1>
                <a href="{{route('venue.details',$venue->id)}}" class="bg-blue-500 block mt-2 rounded text-center text-white w-full px-2 py-1">View Venue</a>

            </div>


            @endforeach


        </div>


    </div>

    <div class=" bg-sky-100 p-4 w-full  md:w-8/12 mx-auto my-14 ">
        <div class="flex items-center justify-around gap-4 md:gap-0"> 
            <div>
                <h1 class="text-xl">Download The WedMeGood Mobile App Today!</h1>
                <h1 class="text-pink-600 mt-2">Write Your Review</h1>
                <form action="{{route('user.review')}}" method="POST">

                    @foreach ($errors->all() as $error)
                        <li class="text-red-600">{{$error}}</li>
                    @endforeach

                    @csrf
                    
                    <input name="email" type="email" id="email" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  " placeholder="priyanshu.dev@gmail.com">

                    <textarea id="message" name="review" rows="4" cols="30" class="block mt-4 p-2.5 w-full text-sm text-gray-900 bg-pink-100 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Leave a Review..."></textarea>
                    <button type="submit" class="px-4 py-2 rounded-xl bg-pink-400 text-white mt-2">Submit Your Review</button>
                </form>
            </div>
            <div style="width: 167px; height:100%">
                <img class="w-full h-full object-cover" src="https://image.wedmegood.com/resized/500X/images/banner/download_app.jpg" alt="">
            </div>
        </div>
    </div>


    @include('layouts.footer')
  
</body>
</html>
