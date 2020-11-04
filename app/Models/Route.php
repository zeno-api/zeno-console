<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class Route extends Model
{
    use Uuid;

    protected $fillable = [
        'path',
        'methods',
        'freeze',
        'freeze_ttl',
        'published',
        'auth_id',
        'forward_headers',
    ];

    protected $attributes = [
        'type'      => 'single',
        'available' => false,
        'published' => false,
    ];

    protected $casts = [
        'methods'         => 'array',
        'freeze'          => 'bool',
        'freeze_ttl'      => 'int',
        'published'       => 'bool',
        'available'       => 'bool',
        'forward_headers' => 'bool',
    ];
}
