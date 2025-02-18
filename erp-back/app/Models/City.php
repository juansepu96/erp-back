<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static inRandomOrder()
 */
class City extends Model
{
    use HasFactory;

    protected $fillable = ['province_id', 'name'];

    public $timestamps = false;

    protected $table = 'cities';

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }

    public function branches(): HasMany
    {
        return $this->hasMany(Branch::class);
    }
}
