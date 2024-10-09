<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Hobby;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class CustomerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $hobbies = Hobby::all();
        $customer = Customer::where('user_id', Auth::id())->first();
        $customerHobbies = $customer->hobbies->pluck('id')->toArray();

        return view('customer.dashboard', ['customer' => $customer, 'user' => $user, 'hobbies' => $hobbies, 'customerHobbies' => $customerHobbies]);
    }

    public function update(Request $request)
    {
        $customer = Customer::where('user_id', Auth::id())->first();
        $user = Auth::user();



        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'hobbies'=> 'array'
            /*'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],*/
        ]);

        /*duda, como poner la validacion de email, unico.
        /* . $user->id:
        Esta parte es crucial para la actualización de registros. Cuando se actualiza un usuario existente, se necesita excluir el registro actual de la verificación de unicidad.
        . $user->id concatena el ID del usuario actual al final de la regla unique. Esto le dice a Laravel que ignore el registro con este ID al verificar la unicidad del correo electrónico.*/



        //verifica que $customer y $user no sean null

        $customer->update([
            'name' => $request->name,
            'surname' => $request->surname,

        ]);


            // Sincronizar los hobbies
        $customer->hobbies()->sync($request->input('hobbies', []));


        return redirect()->route('customer.dashboard')->with('status', 'Datos actualizados correctamente');
    }

}


