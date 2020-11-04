<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

/**
 * @author  Iqbal Maulana <iq.bluejack@gmail.com>
 */
class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('User/Index', [
            'users' => User::excludeMe()->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('User/Create');
    }

    public function edit(User $user)
    {
        return Inertia::render('User/Edit', [
            'user' => $user,
        ]);
    }

    public function store(Request $request)
    {
        $input = Validator::make($request->all(), [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
        ])->validateWithBag('createUser');

        $user = User::createWithRandomPassword($input);

        return back()->with('flash', [
            'password' => $user->tempPassword,
            'user'     => $user,
        ]);
    }

    public function update(User $user, Request $request)
    {
        $input = Validator::make($request->all(), [
            'name'  => ['required', 'string', 'max:255'],
            'email' => ['required', 'email'],
        ])->validateWithBag('updateUser');

        $user->fill($input)->save();

        return back();
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect(route('user.index'));
    }
}
