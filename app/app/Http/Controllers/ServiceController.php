<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


use App\Models\Service;

class ServiceController extends Controller
{
    
    public function index()
    {
        $services = Service::all()->sortBy('title');
            
        return view('back.index', [
            'services' => $services
        ]);
    }

    
    public function create()
    {
        $services = Service::all();

        return view('back.create', [
            'services' => $services
        ]);
    }

    
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|min:3',
            'address' => 'required|string|min:3',
            'lead' => 'required|string|min:3'
        ],
        [
            'title.min' => 'Title is too short - should be at least 3 characters',
            'address.min' => 'Address is too short - should be at least 3 characters',
            'lead.min' => 'Word is too short - should be at least 3 characters'
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }


        Service::create([
            'title' => $request->title,
            'address' => $request->address,
            'lead' => $request->lead
        ]);

        return redirect()
        ->route('services-index');
        
    }

    
    public function edit(Service $service)
    {
        $services = Service::all();

        return view('back.edit', [
            'service' => $service
        ]);
    }

   
    public function update(Request $request, Service $service)
    {
            $service->title = $request->title;
            $service->address = $request->address;
            $service->lead = $request->lead;
            $service->save();
            return redirect()->route('services-index');
    }

    
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('services-index');
    }
}
