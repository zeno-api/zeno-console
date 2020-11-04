<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Service;
use Inertia\Inertia;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class DashboardController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Index', [
            'latencies' => Service::all()->sortByDesc('latency')->values()->slice(0, 5),
            'hits' => Service::all()->sortByDesc('hits')->values()->slice(0, 5),
        ]);
    }
}
