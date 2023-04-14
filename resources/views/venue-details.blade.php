<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Venue</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

</head>
<body>

    @include('layouts.navbar')

    <div class="ml-8 my-8"> <b> <a href="{{route('venue.home')}}"> Home </a> </b> \ <a href="{{route('venue.shop')}}"> Venue </a>  \ {{$venue->name}} </div>
    <div class="container py-10 flex mx-auto px-2 md:px-8 gap-4 flex-col lg:flex-row">
        <div class="w-full lg:w-8/12">
            <img style="height: 395px" class="mx-auto object-cover" src="https://image.wedmegood.com/resized/1000X/uploads/member/443535/1665662591_DSC_8803.jpg?crop=40,3,2000,1125" alt="">
            <div class="mt-2  shadow-md border p-4">
                <h1 class="text-xl"> {{$venue->name}} </h1>
                <div class="mt-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                    </svg>
                    <h1> Location: {{$venue->location->name}} </h1>
                </div>
                <div class="mt-2">
                    <h1 class="text-slate-400">{{$venue->description}}</h1>
                </div>
            </div>
            <div class="mt-4 shadow-md p-4 border">
                <div class="text-pink-600 text-xl font-semibold text-center">Photos</div>
            </div>
            <div class="mt-4 w-full flex-wrap flex gap-3 shadow-md p-4 border">

                <div class="border rounded-md w-56 p-2">
                    <div class="w-full mx-auto rounded-sm overflow-hidden">
                        <img src="https://image.wedmegood.com/resized/450X/uploads/member/705803/1567765584_098e7f10_dc67_46dd_8545_a857be0c4664.JPG" alt="">
                    </div>

                </div>


                <div class="border rounded-md w-56 p-2">
                    <div class="w-full mx-auto rounded-sm overflow-hidden">
                        <img src="https://image.wedmegood.com/resized/1000X/uploads/member/893894/1575444836_Screenshot_from_2019_12_04_13_03_08.png?crop=0,95,648,365" alt="">
                    </div>

                </div>

                <div class="border rounded-md w-56 p-2">
                    <div class="w-full mx-auto rounded-sm overflow-hidden">
                        <img src="https://image.wedmegood.com/resized/1000X/uploads/member/893894/1575444836_Screenshot_from_2019_12_04_13_03_08.png?crop=0,95,648,365" alt="">
                    </div>

                </div>
            </div>
        </div>
        <div class="shadow-lg mx-auto border h-fit border-slate-300 w-full lg:w-4/12 p-4 rounded-md">

            <div class="flex items-center justify-between">
                <div class="text-xl"> Price Per day Estimate</div>
                <div class="text-base text-pink-600">Pricing Info</div>
            </div>

            <div class="flex items-center justify-between py-2  mt-4 border-t border-b">
                <div class="text-pink-600 text-2xl  "> ₹ {{$venue->price}} </div>
                <div>Plot Price</div>
            </div>
            <form action="{{route('checkout',$venue->id)}}" method="POST">
                @csrf


                <div class="mt-4">
                    <label for="" class="font-semibold">Choose Your Occasion</label>
                    <select name="occasion" id="occasion" class="w-full outline-none border rounded-md ">
                        @foreach ($occasions as $occasion)

                            <option value="{{$occasion->id}}"> {{$occasion->name}} </option>


                        @endforeach
                    </select>
                </div>
                @foreach ($errors->get('occasion') as $error)
                <li class="text-red-600">{{$error}}</li>
                @endforeach
                <div class="flex items-center mt-4 w-full justify-between gap-4">
                    <div class="w-full"><input type="text" name="capacity" class="border rounded-md w-full" placeholder="No. of guests" id="capacity"></div>

                    <div class="w-full"><input type="date" name="date" class="border rounded-md w-full" id="date"></div>


                </div>
                @foreach ($errors->get('date') as $error)
                <li class="text-red-600">{{$error}}</li>
                @endforeach
                @foreach ($errors->get('capacity') as $error)
                <li class="text-red-600">{{$error}}</li>
                @endforeach
                <div class="mt-4 ">
                    <input type="text" name="name" placeholder="Your Name." class="border w-full rounded-md outline-none " id="name">
                </div>
                @foreach ($errors->get('name') as $error)
                <li class="text-red-600">{{$error}}</li>
                @endforeach
                <div class="mt-4 ">
                    <input type="number" name="phone" placeholder="Enter Your Phone Number" class="border w-full rounded-md outline-none " id="phone">
                </div>
                @foreach ($errors->get('phone') as $error)
                <li class="text-red-600">{{$error}}</li>
                @endforeach
                <div class="mt-4 ">
                    <input type="email" name="email" placeholder="Enter Your Email" class="border w-full rounded-md outline-none " id="email">
                </div>
                @foreach ($errors->get('email') as $error)
                <li class="text-red-600">{{$error}}</li>
                @endforeach
                <hr class="my-2">
                <h1 class="text-lg font-semibold my-2">Do You Want To Include Plans Services ? </h1>
                <label class="relative inline-flex items-center mb-4 cursor-pointer">
                    <input id="plan_services" type="checkbox" value="" class="sr-only peer">
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Yes/No</span>
                  </label>

                <div class="show-plans">
                    @php
                    use App\Models\Plan;
                    @endphp

                    @foreach ($venueServices as $service)

                    <input type="hidden" name="service_id" value="{{$service->id}}">
                    @php
                        $plan = Plan::where('id',$service->pivot->plan_id)->first();
                    @endphp

                    <input type="radio" value="{{$plan->id}}" name="plan_id" class="peer/{{$plan->name}} hidden" id="{{$plan->name}}">
                    <label for="{{$plan->name}}" class=" w-full cursor-pointer shadow-md peer-checked/{{$plan->name}}:border-blue-500 border-2 rounded-md overflow-hidden flex items-start">
                        <div class="bg-orange-500 h-20 py-2 text-center flex items-center">
                            <span class="text-white block " style="-webkit-transform:rotate(270deg);">


                                {{$plan->name}}

                            </span>
                        </div>
                        <div class="ml-4">
                            <h1 class=" font-semibold"> {{$service->name}} </h1>
                            <h1 class="">Capacity: {{$service->capacity}}</h1>
                            <h1 class="text-blue-500">₹ {{$service->price}} </h1>
                        </div>
                    </label>

                    @endforeach

                    {{-- <input  type="radio" value="standard" name="plans" class="peer/standard hidden" id="standard">
                    <label for="standard" class="w-full cursor-pointer shadow-md peer-checked/standard:border-blue-500 border-2   rounded-md overflow-hidden flex items-start mt-4">
                        <div class="bg-blue-500 h-20 py-2 text-center flex items-center">
                            <span class="text-white block " style="-webkit-transform:rotate(270deg);">Standard</span>
                        </div>
                        <div class="ml-4">
                            <h1 class=" font-semibold">DJ Services</h1>
                            <h1 class="">Capacity: 5000 to 100</h1>
                            <h1 class="text-blue-500">₹ 500 </h1>
                        </div>
                    </label>

                    <input  type="radio" value="premium" name="plans" class="peer/premium hidden" id="premium">

                    <label for="premium" class="w-full cursor-pointer peer-checked/premium:border-blue-500  border-2 shadow-md   rounded-md overflow-hidden flex items-start mt-4">

                        <div class="bg-indigo-500 h-20 py-2 text-center flex items-center">
                            <span class="text-white block " style="-webkit-transform:rotate(270deg);">Premium</span>
                        </div>
                        <div class="ml-4">
                            <h1 class=" font-semibold">DJ Services</h1>
                            <h1 class="">Capacity: 5000 to 100</h1>
                            <h1 class="text-blue-500">₹ 500 </h1>
                        </div>
                    </label> --}}
                </div>
                {{-- f4UkkonKrQe3LqF1tnD3x7Mz --}}
                @if(request('checkout_pay') == 1)
                @else
                <button id="checkout" type="submit" class="block w-full text-white cursor-pointer bg-blue-600 py-2 px-5 rounded-md text-lg text-center mt-10">Checkout</button>
                @endif
            </form>.

            @if(request('checkout_pay') == 1)
            <form action="{{route('venue.details',$venue->id)}}" method="POST" class="text-center p-2 bg-red-600 text-white rounded mx-auto mt-5">
                <script
                    src="https://checkout.razorpay.com/v1/checkout.js"
                    data-key="rzp_test_9yMCbTx92bJVap"
                    data-amount="{{ request('checkout') }}"
                    data-currency="INR"
                    data-buttontext="Pay with Razorpay"
                    data-name="Coffee"

                ></script>

            </form>
            @endif


        </div>
    </div>

    @include('layouts.footer')

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // $('#checkout-loading').hide()
        // $('#checkout').click(function (e) {
        //     e.preventDefault();

        //     $.ajaxSetup({
        //         headers: {
        //             'X-CSRF-TOKEN': '{{csrf_token()}}'
        //         }
        //     })

        //     $.ajax({

        //         type: "POST",
        //         url: "{{route('checkout')}}",
        //         data: {

        //             'occasion' : $('#occasion').val(),
        //             'capacity' : $('#capacity').val(),
        //             'date' : $('#date').val(),
        //             'name' : $('#name').val(),
        //             'phone' : $('#phone').val(),
        //             'email' : $('#email').val(),
        //         },
        //         dataType: "json",
        //         beforeSend: function() {
        //             $('#checkout').hide()
        //             $('#checkout-loading').show()

        //         },
        //         success: function (response) {
        //             console.log(response);
        //         },
        //         complete: function() {
        //             $('#checkout').show()
        //             $('#checkout-loading').hide()
        //             Swal.fire(
        //             'Thank You !',
        //             'Your Venue Has Been Booked !',
        //             'success'
        //             )
        //         },


        //     });

        // });


        togglePlanServices =  $('#plan_services')

        $('.show-plans').hide()
        $(togglePlanServices).click(function (e) {

            if (!$("#plan_services").is(':checked')) {

                $('.show-plans').hide()
            }
            else {

                $('.show-plans').show()
            }
        });

    </script>
</body>
</html>
