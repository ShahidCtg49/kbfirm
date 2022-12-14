<?php

namespace App\Http\Controllers;

use App\Models\Pms_unit;
use Illuminate\Http\Request;
use App\Http\Requests\Pms_unit\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class PmsUnitController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit=Pms_unit::paginate(10);
		return view('pms.unit.index',compact('unit'));
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
            $unit=new Pms_unit;
            $unit->unit_name=$r->unit_name;
            
            if(!!$unit->save()){
                return redirect(route('pmsunit.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('pmsunit.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pms_unit  $pms_unit
     * @return \Illuminate\Http\Response
     */
    public function show(Pms_unit $pms_unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pms_unit  $pms_unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Pms_unit $pms_unit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pms_unit  $pms_unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pms_unit $pms_unit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pms_unit  $pms_unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pms_unit $pms_unit)
    {
        //
    }
}
