<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Customer extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = ['name', 'surname', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hobbies()
    {
        return $this->belongsToMany(Hobby::class, 'customers_hobbies')->withTimestamps();
    }


    //Método para que al borrar un customer añada el softDelete a la tabla customers_hobbies.Explicación:
    protected static function boot() //boot es un método especial en los modelos Eloquent. Este método se ejecuta cuando el modelo se inicializa.
    {
        parent::boot(); //Llama al método boot de la clase padre (Model)

        static::deleting(function ($customer)/*Define un evento deleting que se ejecuta justo antes de que un registro Customer sea eliminado. La función anónima recibe el objeto $customer que está siendo eliminado.*/ {
            DB::table('customers_hobbies') //Selecciona la tabla customers_hobbies usando el facade DB
                ->where('customer_id', $customer->id)//Filtra los registros donde customer_id coincide con el ID del customer que está siendo eliminado.
                ->update(['deleted_at' => now()]);//Actualiza la columna deleted_at con la fecha y hora actuales (now()) para marcar los registros como eliminados (soft delete).
        });
    }
}


