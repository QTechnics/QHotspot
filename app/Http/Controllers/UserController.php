<?php

namespace App\Http\Controllers;

use App\Models\RadCheck;
use Illuminate\Http\Request;

class UserController extends Controller
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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\RadCheck $radCheck
     *
     * @return \Illuminate\Http\Response
     */
    public function show(RadCheck $radCheck)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\RadCheck $radCheck
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(RadCheck $radCheck)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\RadCheck     $radCheck
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RadCheck $radCheck)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\RadCheck $radCheck
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(RadCheck $radCheck)
    {
        //
    }
}
