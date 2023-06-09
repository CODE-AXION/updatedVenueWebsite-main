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
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

        <!-- Scripts -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            .dataTables_wrapper .dataTables_length select{
                width: 4rem;
            }

            #venuestable_wrapper{
                padding: 1rem;
                background: white;
            }
        </style>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 flex">
            @include('layouts.sidebar')


            <section class="w-9/12 px-4 mx-auto ">
                <div class="flex items-center gap-x-3 mt-16">
                    <h2 class="text-lg font-medium text-gray-800 ">Orders</h2>

                    <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full ">{{$checkoutVenues->count()}} Orders</span>

           
                </div>

                <div class="flex flex-col mt-6">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border  border-gray-200  md:rounded-lg">
                                <table id="venuestable" class="min-w-full  bg-white divide-y divide-gray-200 ">
                                    <thead class="bg-gray-50  ">
                                        <tr>
                                            <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                <div class="flex items-center gap-x-3">
                                               
                                                    <span>Id</span>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                <button class="flex items-center gap-x-2">
                                                    <span>User Name</span>
                                                </button>
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                <button class="flex items-center gap-x-2">
                                                    <span>No of. Guests</span>
                                                </button>
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                <button class="flex items-center gap-x-2">
                                                    <span>Date</span>
                                                </button>
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                <button class="flex items-center gap-x-2">
                                                    <span>User Email </span>
                                                </button>
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                <button class="flex items-center gap-x-2">
                                                    <span>User Phone</span>
                                                </button>
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                <button class="flex items-center gap-x-2">
                                                    <span>Event</span>
                                                </button>
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                <button class="flex items-center gap-x-2">
                                                    <span>Plan</span>
                                                </button>
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                <button class="flex items-center gap-x-2">
                                                    <span>Venue</span>
                                                </button>
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                <button class="flex items-center gap-x-2">
                                                    <span>Service</span>
                                                </button>
                                            </th>
                                            
                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                <button class="flex items-center gap-x-2">
                                                    <span>Amount</span>
                                                </button>
                                            </th>



                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 ">
                                                <button class="flex items-center gap-x-2">
                                                    <span>Status</span>
                                                </button>
                                            </th>
                                            <th>Ordered At</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 ">
                                        
                                        @foreach ($checkoutVenues as $order)
                                            
                                        <tr>
                                            <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center gap-x-3">
                                           

                                                    <div class="flex items-center gap-x-2">
                                                        <div>
                                                            <h2 class="font-medium text-gray-800  ">{{$loop->iteration}}</h2>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap">{{$order->name}}</td>
                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap"> {{$order->no_of_guests}} </td>

                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap"> {{$order->date}} </td>

                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap"> {{$order->email}} </td>
                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap"> {{$order->phone ?? ''}} </td>
                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap"> {{$order->event->name}} </td>
                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap"> {{$order->plan->name ?? 'No Plans '}} </td>
                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap"> {{$order->venue->name ?? 'No Venues'}} </td>

                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap"> {{$order->service->name ?? 'No Service Selected'}} </td>
                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap"> {{$order->amount}} </td>
                                            <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                                <div class="inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 ">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>

                                                    <h2 class="text-sm font-normal text-emerald-500">Active</h2>
                                                </div>
                                            </td>
                                            
                                            <td class="px-4 py-4 text-sm text-gray-500 whitespace-nowrap"> {{$order->created_at ??  ''}} </td>
                                           
                                           
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </section>



            
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

        <script>
            $(document).ready( function () {
                $('#venuestable').DataTable();
            } );
        </script>
    
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    
    </body>
</html>
