<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class Service extends Model
{
    use Uuid;

    protected $fillable = [
        'name',
        'description',
        'driver',
        'options',
        'available',
    ];

    protected $attributes = [
        'available' => false,
    ];

    protected $casts = [
        'available' => 'bool',
        'options'   => 'array',
    ];

    protected $appends = [
        'latency',
        'hits',
    ];

    protected function getLatencyAttribute()
    {
        return rand(5, 45);
    }

    protected function getHitsAttribute()
    {
        return rand(13, 33);
    }
}
