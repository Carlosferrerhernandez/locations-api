<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static \Database\Factories\LocationFactory factory(...$parameters)
 *
 * @template TFactory of \Database\Factories\LocationFactory
 */
class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'image',
        'creation_date',
    ];
}
