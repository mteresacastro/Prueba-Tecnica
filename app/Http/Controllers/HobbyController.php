<?php

namespace App\Http\Controllers;
use App\Models\Hobby;
use App\Http\Requests\SavePostRequest;

use Illuminate\Http\Request;

class HobbyController extends Controller
{
    public function customersByHobby($hobbyId)
    {
        $customers = Hobby::find($hobbyId)->customers()->get()->map(function ($customer) {
            return $customer->name . ' ' . $customer->surname;
        });

        return response()->json($customers);
    }

    public function create(){

        return view('admin.createHobby', ['hobby' => new Hobby]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required','string','max:255','unique:hobbies,name'],
        ]);

        $hobby  = Hobby::create($validatedData);

        session()->flash('status', 'Hobby creado con éxito');

        return redirect()->route('admin.createHobby');


    }
}
