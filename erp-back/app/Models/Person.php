<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'lastname',
        'document',
        'birthdate',
        'email',
        'phone',
        'address',
        'obs',
    ];

    protected $casts = [
        'birthdate' => 'date',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

}
