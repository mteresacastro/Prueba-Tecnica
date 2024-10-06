<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\User;
use App\Models\Hobby;
use App\Http\Requests\SavePostRequest;
use App\Http\Requests\SavePostRequest as RequestsSavePostRequest;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class AdminController extends Controller
{
    public function dashboard()
    {
        $admin = Auth::user();

        $users = User::get();
        $customers = Customer::get();
        $hobbies = Hobby::get();



        return view('admin.dashboard',['customers'=>$customers, 'users'=>$users, 'hobbies'=>$hobbies, 'admin' => $admin]);
    }

    public function show(Customer $customer){

        $customer->load('user','hobbies');

        return view('admin.show', ['customer'=>$customer]);

    }

    public function update(Request $request)
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

    }
    public function create(){

        $hobbies = Hobby::all();

        return view('admin.create', ['customer' => new Customer, 'hobbies' => $hobbies]);
    }

    public function store(SavePostRequest $request){

        //valido datos
        $data = $request->validated();

        //asocio al campo user_id, el id del usuario autenticado:
        $data['user_id'] = auth()->id();

        //creo el cliente:
       $customer = Customer::create($data);

       //sincronizo los hobbies:
       $customer->hobbies()->sync($request->input('hobbies', []));


        session()->flash('status', 'Cliente creado con éxito');

        return redirect()->route('admin.dashboard');
    }


}
