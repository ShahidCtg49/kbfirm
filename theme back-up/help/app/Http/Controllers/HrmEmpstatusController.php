<?php

namespace App\Http\Controllers;

use App\Models\Hrm_empstatus;
use Illuminate\Http\Request;
use App\Http\Requests\Hrm_empstatus\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class HrmEmpstatusController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empstatus=Hrm_empstatus::paginate(10);
		return view('hrm.empstatus.index',compact('empstatus'));
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
            $empstatus=new Hrm_empstatus;
            $empstatus->emp_status=$r->emp_status;
            
            if(!!$empstatus->save()){
                return redirect(route('empstatus.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('empstatus.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm_empstatus  $hrm_empstatus
     * @return \Illuminate\Http\Response
     */
    public function show(Hrm_empstatus $hrm_empstatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm_empstatus  $hrm_empstatus
     * @return \Illuminate\Http\Response
     */
    public function edit(Hrm_empstatus $hrm_empstatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrm_empstatus  $hrm_empstatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hrm_empstatus $hrm_empstatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrm_empstatus  $hrm_empstatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hrm_empstatus $hrm_empstatus)
    {
        //
    }
}
