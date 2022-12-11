<?php

namespace App\Http\Controllers;

use App\Models\Hrm_grade;
use Illuminate\Http\Request;
use App\Http\Requests\Hrm_grade\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class HrmGradeController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grade=Hrm_grade::paginate(10);
		return view('hrm.grade.index',compact('grade'));
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
            $grade=new Hrm_grade;
            $grade->grade_code=$r->grade_code;
            $grade->grade_desc=$r->grade_desc;
            
            if(!!$grade->save()){
                return redirect(route('grade.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('grade.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm_grade  $hrm_grade
     * @return \Illuminate\Http\Response
     */
    public function show(Hrm_grade $hrm_grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm_grade  $hrm_grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Hrm_grade $hrm_grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrm_grade  $hrm_grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hrm_grade $hrm_grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrm_grade  $hrm_grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hrm_grade $hrm_grade)
    {
        //
    }
}
