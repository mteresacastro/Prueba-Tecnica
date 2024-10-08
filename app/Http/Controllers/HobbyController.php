<?php

namespace App\Http\Controllers;
use App\Models\Hobby;

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
}
