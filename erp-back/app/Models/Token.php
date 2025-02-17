<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @method static where(string $string, string $token)
 * @method static find(int $getValue)
 */
class Token extends Model
{
    use HasFactory;
    protected $table = 'personal_access_tokens';
    protected $fillable = [
        'id','token','expires_at'
    ];

}
