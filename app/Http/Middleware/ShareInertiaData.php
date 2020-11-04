<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Inertia\Inertia;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class ShareInertiaData
{
    public function handle($request, $next)
    {
        Inertia::share(['ui' => config('app.ui')]);

        return $next($request);
    }
}
