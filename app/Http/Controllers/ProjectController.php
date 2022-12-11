<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project= Project::paginate(10);
        return view('project.index', compact('project'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new project;
        $cat->name = $request->name;
        $cat->description = $request->description;
        $cat->amount = $request->amount;
        $cat->duration = $request->duration;
        $cat->starting_date = $request->starting_date;
        $cat->end_date = $request->end_date;
        $cat->profit_projections = $request->profit_projections;
        $cat->return_date = $request->return_date;
        $cat->return_profit = $request->return_profit;
        $cat->remarks = $request->remarks;
        $cat->save();
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = project::findOrFail($id);
        return view('project.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project=project::findOrFail($id);
        $project->name = $request->name;
        $project->description = $request->description;
        $project->amount = $request->amount;
        $project->duration = $request->duration;
        $project->starting_date = $request->starting_date;
        $project->end_date = $request->end_date;
        $project->profit_projections = $request->profit_projections;
        $project->return_date = $request->return_date;
        $project->return_profit = $request->return_profit;
        $project->remarks = $request->remarks;
        $project->save();
        return redirect()->route('project.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->back();
    }
}
