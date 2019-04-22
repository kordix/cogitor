<?php

namespace App\Http\Controllers;

use App\Tagpivot;
use Illuminate\Http\Request;

class TagpivotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tagpivots = Tagpivot::all();
        return view('tagpivot.index', compact('tagpivots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tagpivot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Tagpivot::create($request->all());
        session()->flash('message', 'dodano przypisanie tagu');
        return back();
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Tagpivot  $tagpivot
     * @return \Illuminate\Http\Response
     */
    public function show(Tagpivot $tagpivot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tagpivot  $tagpivot
     * @return \Illuminate\Http\Response
     */
    public function edit(Tagpivot $tagpivot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tagpivot  $tagpivot
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tagpivot $tagpivot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tagpivot  $tagpivot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tagpivot $tagpivot)
    {
        //
    }
}
