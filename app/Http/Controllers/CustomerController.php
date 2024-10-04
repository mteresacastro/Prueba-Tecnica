<?php

namespace App\Http\Controllers;

use App\Models\Customer;
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

        $customer = Customer::where('user_id', Auth::id())->first();

        return view('customer.dashboard', ['customer' => $customer, 'user' => $user]);
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

        /*duda, como poner la validacion de email, unico.
        /* . $user->id:
        Esta parte es crucial para la actualización de registros. Cuando se actualiza un usuario existente, se necesita excluir el registro actual de la verificación de unicidad.
        . $user->id concatena el ID del usuario actual al final de la regla unique. Esto le dice a Laravel que ignore el registro con este ID al verificar la unicidad del correo electrónico.*/



        //verifica que $customer y $user no sean null
        if ($customer && $user) {
            $customer->update([
                'name' => $request->name,
                'surname' => $request->surname,
            ]);


            $user->email = $request->email;
            $user->save();


            return redirect()->route('customer.dashboard')->with('status', 'Datos actualizados correctamente');
        } else{
            return redirect()->route('customer.dashboard')->with('error','No se pudieron actualizar los datos');
        }
    }
}
