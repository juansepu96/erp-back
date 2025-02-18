<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branches';

    protected $fillable = ['name', 'address', 'city_id', 'hours', 'phone'];

    public $timestamps = true;

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
