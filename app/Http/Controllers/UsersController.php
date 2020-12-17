<?php

namespace App\Http\Controllers;

use App\Jobs\UserWelcome as JobsUserWelcome;
use App\Mail\UserWelcome;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()->cannot('viewAny', Auth::user())) {
            abort(403);
        }

        $users = User::all();
        return view('users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()->cannot('create', Auth::user())) {
            abort(403);
        }
        $profiles = Profile::all();

        return view('users.create', [
            'profiles' => $profiles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($user = User::create($request->all())) {
            JobsUserWelcome::dispatch($user, $request->get('password'))->delay(now()->addSeconds('5'));
            return redirect()->route('users.show', $user);
        } else {
            return false;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Request $request)
    {
        if ($request->user()->cannot('view', $user)) {
            abort(403);
        }
        return view('users.show', [
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Request $request)
    {
        if ($request->user()->cannot('update', Auth::user())) {
            abort(403);
        }
        $profiles = Profile::all();
        return view('users.edit', [
            'user' => $user,
            'profiles' => $profiles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Request $request)
    {
        if ($request->user()->cannot('delete', $user)) {
            abort(403);
        }
        echo 'Em construção...';
    }

    public function getTotal()
    {
        $users = User::all();

        return response()->json([
            'total' => count($users)
        ]);
    }
}
