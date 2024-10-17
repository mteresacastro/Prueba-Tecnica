<?php

namespace App\Services;

use App\Models\Hobby;
use App\Models\Customer;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class HobbyService
{
    //método para llamar a api externa y recibir la respuesta
    public function hobbiesFromApi($userId){

        $url = env('URL_SERVER_API');
        $response = Http::get($url.'index.php?user_id='.$userId);


        //return view('hobbiesFromApi', compact('data'))

        if ($response->ok()) {
            $data = $response->json();
            $this->syncdata($data);
        } else {
            Log::error($response->json());
        }
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


