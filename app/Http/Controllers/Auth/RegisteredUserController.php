<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function getUsers()
    {
        return User::where('id', '!=', 9999)->where('status', 1)->orderBy('employment_date', 'asc')->get();
    }

    public function getUser($id)
    {
        return User::where('id', $id)->where('status', 1)->first();
    }

    public function getAuthUser()
    {
        return Auth::user();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'password' => ['required'],
        ]);
        User::create([
            'id' => $request->id,
            'name' => $request->name,
            'kana' => $request->kana,
            'employment_date' => $request->employment_date,
            'department' => $request->department,
            'status' =>1,
            'password' => Hash::make($request->password),
        ]);

        // event(new Registered($user));

        // Auth::login($user);

        // return redirect(RouteServiceProvider::HOME);
    }

    public function updateUser(Request $request,$id)
    {
        User::where('id',$id)->update([
            'id' => $request->id,
            'name' => $request->name,
            'kana' => $request->kana,
            'employment_date' => $request->employment_date,
            'department' => $request->department,
            'status' =>1,
            'password' => Hash::make($request->password),
        ]);
    }

    public function deleteUser($id)
    {
        return User::where('id',$id)->update([
            'status' =>0,
        ]);
    }
}
