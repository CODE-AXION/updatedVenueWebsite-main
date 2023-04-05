<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::all();

        return view('admin.services.index')->with('services',$services);
    }

    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeSingleService(Request $request)
    {
      
        $request->validate([
            'name' => ['required'],
            'capacity' => ['required'],
            'price' => ['required','numeric'],
        ]);

        $service = new Service();
        $service->name = $request->name;
        $service->capacity = $request->capacity;
        $service->price = $request->price;
        $service->save();

        return redirect()->route('service.index');
    }

 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function editService(Request $request,$service_id)
    {
        $service = Service::where('id',$service_id)->first();
        return view('admin.services.edit')->with('service',$service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function updateService(Request $request,$service_id)
    {
        $request->validate([
            'name' => ['required'],
            'capacity' => ['required'],
            'price' => ['required','numeric'],
        ]);

        $service = Service::where('id',$service_id)->first();
        $service->update([
            'name' => $request->name,
            'capacity' => $request->capacity,
            'price' => $request->price,
        ]);

        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function deleteService(Request $request, $service_id)
    {
        $service = Service::where('id',$service_id)->first();

        $service->venues()->detach();

        $service->delete();

        return redirect()->route('service.index');
    }
}
