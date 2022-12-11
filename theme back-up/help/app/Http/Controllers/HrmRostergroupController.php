<?php

namespace App\Http\Controllers;

use App\Models\Hrm_rostergroup;
use Illuminate\Http\Request;
use App\Http\Requests\Hrm_rostergroup\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class HrmRostergroupController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roster=Hrm_rostergroup::paginate(10);
		return view('hrm.roster.index',compact('roster'));
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
            $roster=new Hrm_rostergroup;
            $roster->roster_name=$r->roster_name;
            $roster->roster_desc=$r->roster_desc;
            
            if(!!$roster->save()){
                return redirect(route('roster.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('roster.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm_rostergroup  $hrm_rostergroup
     * @return \Illuminate\Http\Response
     */
    public function show(Hrm_rostergroup $hrm_rostergroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm_rostergroup  $hrm_rostergroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Hrm_rostergroup $hrm_rostergroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrm_rostergroup  $hrm_rostergroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hrm_rostergroup $hrm_rostergroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrm_rostergroup  $hrm_rostergroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hrm_rostergroup $hrm_rostergroup)
    {
        //
    }
}
