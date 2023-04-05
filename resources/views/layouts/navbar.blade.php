   {{-- TOP NAV --}}
   <div class="bg-pink-700 h-10 flex items-center justify-between">
    <div class="flex items-center ml-8">
        <div class="text-white text-sm">Your Favorite Venue Booking Website</div>
        <div class="text-white ">
            <select name="" id="" class="py-1 px-2 ml-4 w-36 border-none text-slate-700  outline-none rounded-md">
            <option value="">Vadodara</option>
            </select>
        </div>
    </div>

    <div class="mr-8 flex items-center gap-2">
        <a href="{{route('request.venue')}}" class="text-white flex items-center gap-2 mr-4">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5 bi bi-clipboard-heart" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M5 1.5A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5v1A1.5 1.5 0 0 1 9.5 4h-3A1.5 1.5 0 0 1 5 2.5v-1Zm5 0a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-1Z"/>
                <path d="M3 1.5h1v1H3a1 1 0 0 0-1 1V14a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V3.5a1 1 0 0 0-1-1h-1v-1h1a2 2 0 0 1 2 2V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V3.5a2 2 0 0 1 2-2Z"/>
                <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.31 8 6.982Z"/>
            </svg>
            Write a Review
        </a>
        <div class="text-white">
            @guest

            <a href="{{route('register')}}"> Register </a>
            @endguest
        </div>
    </div>
</div>

{{-- BOTTOM NAV --}}

<div class="bg-pink-600 flex gap-2 justify-between">
    <div class="flex items-center ">
        <div class="text-2xl text-white ml-4"> <a href="{{route('venue.home')}}"> Venue Vault </a></div>
        <div class="flex items-center gap-4 ml-8">

            <div class="text-lg group cursor-pointer p-2 rounded-md relative text-white">
                Venues


                <div class="absolute z-10 cursor-pointer w-44 shadow-md p-4 rounded-md group-hover:block hidden bg-white ">
                    @php
                        use App\Models\Category;
                        $categories = Category::all();
                    @endphp
                    <h1 class="text-xl font-semibold text-slate-800">Venues By Type</h1>
                    @foreach ($categories as $category)
                    <div class="w-full">
                        <a href="{{route('venue.shop',['category_id'=> $category->id])}}" class="text-pink-500 font-semibold text-base">{{$category->name}} </a>
                    </div>
                    @endforeach

                </div>

            </div>
            <div class="relative text-lg p-2 group rounded-md text-white">

                <h1 class="cursor-pointer"> Events </h1>

                <div class="absolute z-10 cursor-pointer w-44 shadow-md p-4 rounded-md group-hover:block hidden bg-white ">
                    @php
                        use App\Models\Event;
                        $events = Event::all();
                    @endphp
                    <h1 class="text-xl font-semibold text-slate-800">Events</h1>
                    @foreach ($events as $event)
                    <div class="w-full">
                        <a href="{{route('venue.shop',['event_id'=> $event->id])}}" class="text-pink-500 font-semibold text-base">{{$event->name}} </a>
                    </div>
                    @endforeach

                </div>
            </div>
            <div class="text-lg p-2 relative group rounded-md text-white">

                <h1 class="cursor-pointer"> Locations</h1>

                <div class="absolute z-10 cursor-pointer w-44 shadow-md p-4 rounded-md group-hover:block hidden bg-white ">
                    @php
                        use App\Models\Location;
                        $locations = Location::all();
                    @endphp
                    <h1 class="text-xl font-semibold text-slate-800">Location</h1>
                    @foreach ($locations as $location)
                    <div class="w-full">
                        <a href="{{route('venue.shop',['location_id'=> $location->id])}}" class="text-pink-500 font-semibold text-base">{{$location->name}} </a>
                    </div>
                    @endforeach

                </div>

            </div>
            <div class="text-lg p-2 rounded-md text-white">Wedding</div>
        </div>
    </div>

    <div class="flex mr-4 items-center">
        <div class="bg-pink-700 p-2 rounded-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="fill-white w-4 h-4 bi bi-search-heart" viewBox="0 0 16 16">
                <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"/>
                <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"/>
            </svg>
        </div>

        <div class="text-white px-8 py-0.5 rounded-xl bg-pink-700 ml-4 text-sm">
            @guest

            <a href="{{route('login')}}"> Login </a>
            @endguest

            @auth
                {{Auth::user()->name}}

                <form action="{{route('logout')}}" method="POST">
                    @csrf

                    <button type="submit" class="bg-transparent border-0">Logout</button>

                </form>
            @endauth

        </div>
    </div>
</div>
