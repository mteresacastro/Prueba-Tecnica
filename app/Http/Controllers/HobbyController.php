<?php

namespace App\Http\Controllers;
use App\Models\Hobby;
use App\Models\Customer;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\customersHobbiesExport;

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

    //método para llamar a api externa y recibir la respuesta
    public function hobbiesFromApi($userId){

        $url = env('URL_SERVER_API');
        $response = Http::get($url.'index.php?user_id='.$userId);
        $data = $response->json();

        //return view('hobbiesFromApi', compact('data'));

        $this->syncData($data);
    }

    protected function syncData($data){

        $userId = $data['customer_id'];
        $hobbiesData = $data['hobbies'];

        // Obtener el cliente, a traves de user_id, para relacionar usuario y customers
        $customer = Customer::where('user_id', $userId)->first();

        if ($customer) {
            // Obtener los IDs de los hobbies
            $hobbyIds = [];

            foreach ($hobbiesData as $hobbyData) {
                $hobby = Hobby::firstOrCreate(['name' => $hobbyData['name']]);
                $hobbyIds[] = $hobby->id;
            }

            // Sincronizar los hobbies del cliente
            $customer->hobbies()->sync($hobbyIds);
        } else {
            throw new \Exception("Cliente no encontrado.");
        }
    }
}
