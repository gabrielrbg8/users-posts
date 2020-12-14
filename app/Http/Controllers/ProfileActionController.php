<?php

namespace App\Http\Controllers;

use App\ProfileAction;
use Illuminate\Http\Request;

class ProfileActionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProfileAction  $profileAction
     * @return \Illuminate\Http\Response
     */
    public function show(ProfileAction $profileAction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProfileAction  $profileAction
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfileAction $profileAction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProfileAction  $profileAction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfileAction $profileAction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProfileAction  $profileAction
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfileAction $profileAction)
    {
        echo "Em construção - Deletar uma ação de determinado perfil";
    }
}
