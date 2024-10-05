<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobby extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function customers(){
        return $this->belongsToMany(Customer::class, 'customers_hobbies');
    }
}
