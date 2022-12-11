<?php

namespace App\Http\Controllers;

use App\Models\Pms_manufac;
use Illuminate\Http\Request;
use App\Http\Requests\Pms_manufac\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class PmsManufacController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $manufac=Pms_manufac::paginate(10);
		return view('pms.manufac.index',compact('manufac'));
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
            $manufac=new Pms_manufac;
            $manufac->manufac_name=$r->manufac_name;
            
            if(!!$manufac->save()){
                return redirect(route('pmsmanufac.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('pmsmanufac.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pms_manufac  $pms_manufac
     * @return \Illuminate\Http\Response
     */
    public function show(Pms_manufac $pms_manufac)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pms_manufac  $pms_manufac
     * @return \Illuminate\Http\Response
     */
    public function edit(Pms_manufac $pms_manufac)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pms_manufac  $pms_manufac
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pms_manufac $pms_manufac)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pms_manufac  $pms_manufac
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pms_manufac $pms_manufac)
    {
        //
    }
}
