<?php

namespace App\Http\Controllers;

use App\Action;
use App\Profile;
use App\ProfileAction;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
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

        $profiles = Profile::all();

        return view('profiles.index', [
            'profiles' => $profiles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $actions = Action::all();
        return view('profiles.create', [
            'actions' => $actions
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
        try {
            if ($actions = $request->post('actions')) {
                $profile = Profile::create($request->except(['actions']));
                foreach ($actions as $action) {
                    $profileAction = new ProfileAction();
                    $profileAction->profile_id = $profile->id;
                    $profileAction->action_id = $action;
                    $profileAction->save();
                }
            } else {
                return response()->json([
                    'status_code' => 400,
                    'message' => 'Falha ao criar perfil. Você precisa dar pelo menos uma permissão ao perfil!'
                ]);
            }

            return response()->json([
                'status_code' => 200
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status_code' => 400,
                'message' => 'Falha ao criar perfil. Verifique se você preencheu todos os campos!'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile, Request $request)
    {
        if ($request->user()->cannot('view', $profile)) {
            abort(403);
        }

        $profileActions = ProfileAction::where('profile_id', '=', $profile->id)->get();
        return view('profiles.show', [
            'profile' => $profile,
            'profileActions' => $profileActions
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }

    public function getTotal()
    {
        $profiles = Profile::all();

        return response()->json([
            'total' => count($profiles)
        ]);
    }
}
