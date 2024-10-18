<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(){
        $serviceCollection = Service::all();
        return view('layouts.services.index', [
            'serviceCollection' => $serviceCollection
        ]);
    }

    //to store data
    public function store(Request $request){

        $request->validate([
            'name' => 'required|unique:services',
        ]);

        $arrayService = new Service;

        $arrayService->name = $request->name;
        $arrayService->save();
        return redirect()->back()->with('success', 'The service item was recorded successfully');
    }

    //to edit
    public function edit($id){
        $serviceCollection = Service::all();
        $editableItem = Service::findOrFail($id);
        return view('layouts.services.edit', [
            'editableItem' => $editableItem,
            'serviceCollection' => $serviceCollection
        ]); 
    }

    //to update
    public function update(Request $request, $id){

        $request->validate([
            'name' => 'required',
        ]);

        $updateService = Service::findOrFail($id);

        $updateService->name = $request->name;
        $updateService->save();
        return redirect()->back()->with('success', 'The service item was updated successfully');
    }


    // to delete
    public function delete($id){
        $deletedItem = Service::findOrFail($id);
        $deletedItem->delete();

        return redirect()->back()->with('success', 'Your Item has been deleted successfully');
    }
}