<?php

namespace App\Http\Controllers;

use App\Boisson;
use Illuminate\Http\Request;

class BoissonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boissons = Boisson::all();
        return view('boisson.index', compact('boissons'));
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
     * @param  \App\Boisson  $boisson
     * @return \Illuminate\Http\Response
     */
    public function show(Boisson $boisson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Boisson  $boisson
     * @return \Illuminate\Http\Response
     */
    public function edit(Boisson $boisson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Boisson  $boisson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Boisson $boisson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Boisson  $boisson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Boisson $boisson)
    {
        //
    }
}
