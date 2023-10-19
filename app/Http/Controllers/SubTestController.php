<?php

namespace App\Http\Controllers;

use App\Models\SubTest;
use App\Http\Requests\StoreSubTestRequest;
use App\Http\Requests\UpdateSubTestRequest;

class SubTestController extends Controller
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
     * @param  \App\Http\Requests\StoreSubTestRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubTestRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubTest  $subTest
     * @return \Illuminate\Http\Response
     */
    public function show(SubTest $subTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubTest  $subTest
     * @return \Illuminate\Http\Response
     */
    public function edit(SubTest $subTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubTestRequest  $request
     * @param  \App\Models\SubTest  $subTest
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubTestRequest $request, SubTest $subTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubTest  $subTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubTest $subTest)
    {
        //
    }
}
