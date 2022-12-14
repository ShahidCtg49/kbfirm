<?php

namespace App\Http\Controllers;

use App\Models\Hrm_department;
use App\Http\Requests\Department\AddNewRequest;
use Illuminate\Http\Request;

use App\Http\Traits\ResponseTrait;
use Exception;

class HrmDepartmentController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $department=Hrm_department::paginate(10);
		return view('hrm.department.index',compact('department'));
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
    public function store(AddNewRequest $r)
    {
        try{
            $department=new Hrm_department;
            $department->department=$r->department;
            
            if(!!$department->save()){
                return redirect(route('department.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('department.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm_department  $hrm_department
     * @return \Illuminate\Http\Response
     */
    public function show(Hrm_department $hrm_department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm_department  $hrm_department
     * @return \Illuminate\Http\Response
     */
    public function edit(Hrm_department $hrm_department)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrm_department  $hrm_department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hrm_department $hrm_department)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrm_department  $hrm_department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hrm_department $hrm_department)
    {
        //
    }
}
