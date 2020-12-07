<?php

namespace App\Http\Controllers;

use App\PostFile;
use Illuminate\Http\Request;

class PostFileController extends Controller
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
     * @param  \App\PostFile  $postFile
     * @return \Illuminate\Http\Response
     */
    public function show(PostFile $postFile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PostFile  $postFile
     * @return \Illuminate\Http\Response
     */
    public function edit(PostFile $postFile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PostFile  $postFile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostFile $postFile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PostFile  $postFile
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostFile $postFile)
    {
        //
    }

    public function getTotal(){
        $postFile = PostFile::all();
        return response()->json([
            'total' => count($postFile)
        ]);
    }
}
