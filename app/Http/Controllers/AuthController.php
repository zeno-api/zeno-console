<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class AuthController extends Controller
{
    private static array $availableDrivers = ['token'];

    public function index()
    {
        return Inertia::render('Auth/Index', [
            'auths' => Auth::all(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Auth/Create', [
            'availableDrivers' => self::$availableDrivers,
        ]);
    }

    public function edit(Auth $auth)
    {
        return Inertia::render('Auth/Edit', [
            'auth'             => $auth,
            'availableDrivers' => self::$availableDrivers,
        ]);
    }

    public function store(Request $request)
    {
        $input = Validator::make($request->all(), [
            'name'             => ['required', 'string', 'max:255'],
            'driver'           => ['required', 'in:token'],
            'cache'            => ['nullable', 'bool'],
            'cache_ttl'        => ['nullable', 'required_if:cache,true', 'numeric'],
            'options.endpoint' => ['required', 'string'],
        ])->validateWithBag('createAuth');

        $auth = Auth::create($input);

        return back()->with('flash', [
            'auth' => $auth,
        ]);
    }

    public function update(Auth $auth, Request $request)
    {
        $input = Validator::make($request->all(), [
            'name'             => ['required', 'string', 'max:255'],
            'driver'           => ['required', 'in:token'],
            'cache'            => ['nullable', 'bool'],
            'cache_ttl'        => ['nullable', 'required_if:cache,true', 'numeric'],
            'options.endpoint' => ['required', 'string'],
        ])->validateWithBag('updateAuth');

        $auth->fill($input)->save();

        return back();
    }

    public function destroy(Auth $auth)
    {
        $auth->delete();

        return redirect(route('auth.index'));
    }
}
