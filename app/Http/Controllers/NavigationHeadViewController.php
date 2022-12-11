<?php

namespace App\Http\Controllers;

use App\Models\NavigationHeadView;
use Illuminate\Http\Request;

class NavigationHeadViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $navigationHeadView= NavigationHeadView::paginate(10);
        return view('navigationHeadView.index', compact('navigationHeadView'));
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
        $cat = new navigationHeadView;
        $cat->master_head = $request->master_head;
        $cat->sub_head = $request->sub_head;
        $cat->child_one = $request->child_one;
        $cat->child_two = $request->child_two;
        $cat->save();
        return redirect()->route('navigationHeadView.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NavigationHeadView  $navigationHeadView
     * @return \Illuminate\Http\Response
     */
    public function show(NavigationHeadView $navigationHeadView)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NavigationHeadView  $navigationHeadView
     * @return \Illuminate\Http\Response
     */
    public function edit(NavigationHeadView $navigationHeadView)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NavigationHeadView  $navigationHeadView
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NavigationHeadView $navigationHeadView)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NavigationHeadView  $navigationHeadView
     * @return \Illuminate\Http\Response
     */
    public function destroy(NavigationHeadView $navigationHeadView)
    {
        //
    }
}
