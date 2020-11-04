<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class RouteController extends Controller
{
    public function index()
    {
        return Inertia::render('Route/Index', [
            'routes' => Route::paginate(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Route/Create');
    }

    public function store(Request $request)
    {
        $input = Validator::make($request->all(), [
            'path'       => ['required', 'string', 'max:255'],
            'methods'    => ['required', 'array'],
            'freeze'     => ['nullable', 'bool'],
            'freeze_ttl' => ['nullable', 'numeric'],
        ])->validateWithBag('createRoute');

        $route = Route::create($input);

        return back()->with('flash', [
            'route' => $route,
        ]);
    }
}
