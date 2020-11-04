<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class Auth extends Model
{
    use Uuid;

    protected $fillable = [
        'name',
        'driver',
        'cache',
        'cache_ttl',
        'options',
    ];

    protected $casts = [
        'cache'     => 'bool',
        'cache_ttl' => 'int',
        'options'   => 'array',
    ];
}
