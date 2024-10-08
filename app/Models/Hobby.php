<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hobby extends Model
{
    use HasFactory;
    use softDeletes;

    protected $fillable = ['name'];

    public function customers(){
        return $this->belongsToMany(Customer::class, 'customers_hobbies')->withTimestamps();
    }
}
