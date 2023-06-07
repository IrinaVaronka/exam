<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Master;
use App\Models\Service;
use Illuminate\Support\Facades\Validator;

class MasterController extends Controller
{
    
    public function index()
    {
        $masters = Master::all();
            
        return view('back.masters.index', [
            'masters' => $masters
        ]);
    }

    
    public function create()
    {
        $services = Service::all();

        return view('back.masters.create', [
            'services' => $services,  
        ]);
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:3',
            'surname' => 'required|string|min:3',
            'specialization' => 'required|string|min:3', 
            'city' => 'required|string|min:3'
        ],
        [
            'name.min' => 'Title is too short - should be at least 3 characters',
            'surname.min' => 'Surname is too short - should be at least 3 characters',
            'specialization.min' => 'Word is too short - should be at least 3 characters',
            'city.min' => 'City is too short - should be at least 3 characters'
        ]);

        if ($validator->fails()) {
            $request->flash();
            return redirect()
                ->back()
                ->withErrors($validator);
        }

    //  dump($request);
    //     die;

        Master::create([
            'name' => $request->name,
            'surname' => $request->surmame,
            'specialization' => $request->specialization,
            'city' => $request->city,
            'service_id' => $request->service_id,
            
        ]);

        return redirect()
        ->route('masters-index');
    }


    
    public function edit(Master $master)
    {
        $services = Service::all();

        return view('back.masters.edit', [
            'master' => $master
            
        ]);
    }

    
    public function update(Request $request, Master $master)
    {
        $master->name = $request->name;
        $master->surmame = $request->surmame;
        $master->specialization = $request->specialization;
        $master->city = $request->city;
        $master->service_id = $request->service_id;
        $master->save();
        return redirect()
            ->route('masters-index');
    }

    
    public function destroy(Master $master)
    {
        $service->delete();
        return redirect()->route('masters-index');
    }
}
