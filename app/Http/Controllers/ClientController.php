<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        return view('layouts.client.index');
    }

    //for storing
    public function store(Request $request){

        $request->validate([
            'name' => 'required',
            'phone' => 'required|unique:clients|max:18|min:11',
            'email' => 'required|unique:clients',
        ]);


        $imageName = null;
        if(isset($request->client_photo)){
            $imageName = time(). '.' . $request->client_photo->extension();
            $request->client_photo->move(public_path('images'), $imageName);
        }

        $arrayClient = new Client;

        $arrayClient->name = $request->name;
        $arrayClient->phone = $request->phone;
        $arrayClient->email = $request->email;
        $arrayClient->gender = $request->gender;
        $arrayClient->address = $request->address;
        $arrayClient->facebook_review = $request->facebook_review;
        $arrayClient->google_review = $request->google_review;
        $arrayClient->page_number = $request->page_number;
        $arrayClient->client_photo = $imageName;
        $arrayClient->status = $request->status;
        $arrayClient->facebook_profile = $request->facebook_profile;
        $arrayClient->date_of_birth = $request->date_of_birth;
        $arrayClient->save();

        return redirect()->back()->with("success", "Your client's information has been recorded successfully.");
    }



    //for showing
    public function show(){
        $clientCollection = Client::all();

        return view('layouts.client.all-clients', [
            'clientCollection' => $clientCollection
        ]);
    }

    //for editing
    public function edit($id){
        $editableClientInfo = Client::findOrFail($id);
        return view('layouts.client.edit-client', [
            'editableClientInfo' => $editableClientInfo
        ]);
    }

    // for updating
    public function update(Request $request, $id) {




        $request->validate([
            'name' => 'required',
            'phone' => 'required|max:18|min:11',
            'email' => 'required',
        ]);


        $updateClient = Client::findOrFail($id);

        $imageName = null;
        if(isset($request->client_photo)){
            $imageName = time(). '.' . $request->client_photo->extension();
            $request->client_photo->move(public_path('images'), $imageName);
        } else {
            $imageName =  $updateClient->client_photo;
        }


        $updateClient->name = $request->name;
        $updateClient->phone = $request->phone;
        $updateClient->email = $request->email;
        $updateClient->gender = $request->gender;
        $updateClient->address = $request->address;
        $updateClient->facebook_review = $request->facebook_review;
        $updateClient->google_review = $request->google_review;
        $updateClient->page_number = $request->page_number;
        $updateClient->client_photo = $imageName;
        $updateClient->status = $request->status;
        $updateClient->facebook_profile = $request->facebook_profile;
        $updateClient->date_of_birth = $request->date_of_birth;
        $updateClient->save();

        return redirect()->back()->with("success", "Your client's information has been updated successfully.");

    }


    //for deleting
    public function delete($id){

        $deleteClient = Client::findOrFail($id);
        $deleteClient->delete();

        return redirect()->back()->with("success", "Your client's information has been deleted successfully.");
    }

    //for showing single client information
    public function showSingleClientInfo($id){

        $singleClientInfo = Client::findOrFail($id);
        $previous = Client::where('id', '<', $singleClientInfo->id)->max('id');
        $next = Client::where('id', '>', $singleClientInfo->id)->min('id');
        

        return view('layouts.client.single-client-info', [
            'singleClientInfo' => $singleClientInfo,
            'previous' => $previous,
            'next' => $next,
        ]);
    }


    //for collecting facebook review left emails
    public function facebookReviewLeftEmail(){
        $facebookReviewLeftEmailCollection = Client::where('facebook_review', 0)->get(['email', 'phone']);

        return view ('facebook.facebook-review-left-email', [
            'facebookReviewLeftEmailCollection' => $facebookReviewLeftEmailCollection
        ]);
        
    }
}
