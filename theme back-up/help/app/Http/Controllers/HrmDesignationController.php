<?php

namespace App\Http\Controllers;

use App\Models\Hrm_designation;
use Illuminate\Http\Request;
use App\Http\Requests\Hrm_designation\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class HrmDesignationController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $designation=Hrm_designation::paginate(10);
		return view('hrm.designation.index',compact('designation'));
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
            $designation=new Hrm_designation;
            $designation->designation=$r->designation;
            
            if(!!$designation->save()){
                return redirect(route('hrmdesignation.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('hrmdesignation.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm_designation  $hrm_designation
     * @return \Illuminate\Http\Response
     */
    public function show(Hrm_designation $hrm_designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm_designation  $hrm_designation
     * @return \Illuminate\Http\Response
     */
    public function edit(Hrm_designation $hrm_designation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrm_designation  $hrm_designation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hrm_designation $hrm_designation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrm_designation  $hrm_designation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hrm_designation $hrm_designation)
    {
        //
    }
}
