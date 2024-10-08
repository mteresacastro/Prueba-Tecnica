<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
}

