<?php

namespace App\Http\Controllers;

use App\Models\ProfitStatement;
use Illuminate\Http\Request;

class ProfitStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profitStatement= ProfitStatement::get();
        return view('profitStatement.index', compact('profitStatement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profitStatement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new ProfitStatement;
        $cat->status = $request->status;
        $cat->save();
        return redirect()->route('profitStatement.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfitStatement  $profitStatement
     * @return \Illuminate\Http\Response
     */
    public function show(ProfitStatement $profitStatement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfitStatement  $profitStatement
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profitStatement=ProfitStatement::all();
        $monthlyFee=profitStatement::findOrFail($id);
        return view('profitStatement.edit',compact('profitStatement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfitStatement  $profitStatement
     * @return \Illuminate\Http\Response
     */
    public function update(ProfitStatement $profitStatement)
    {
        // dd($profitStatement);
        // $profitStatement=profitStatement::findOrFail($id);
        $profitStatement->status =1;
        $profitStatement->save();
        return redirect()->route('profitStatement.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfitStatement  $profitStatement
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfitStatement $profitStatement)
    {
        //
    }
}