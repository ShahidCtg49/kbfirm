<?php

namespace App\Http\Controllers;

use App\Models\Hrm_location;
use Illuminate\Http\Request;
use App\Http\Requests\Hrm_location\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class HrmLocationController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location=Hrm_location::paginate(10);
		return view('hrm.location.index',compact('location'));
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
            $location=new Hrm_location;
            $location->location_name=$r->location_name;
            $location->location_desc=$r->location_desc;
            
            if(!!$location->save()){
                return redirect(route('location.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('location.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm_location  $hrm_location
     * @return \Illuminate\Http\Response
     */
    public function show(Hrm_location $hrm_location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm_location  $hrm_location
     * @return \Illuminate\Http\Response
     */
    public function edit(Hrm_location $hrm_location)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrm_location  $hrm_location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hrm_location $hrm_location)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrm_location  $hrm_location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hrm_location $hrm_location)
    {
        //
    }
}
