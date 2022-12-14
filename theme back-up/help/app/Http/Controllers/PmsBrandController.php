<?php

namespace App\Http\Controllers;

use App\Models\pms_brand;
use Illuminate\Http\Request;
use App\Http\Requests\Pms_brand\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class PmsBrandController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand=pms_brand::paginate(10);
		return view('pms.brand.index',compact('brand'));
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
            $brand=new pms_brand;
            $brand->brand_name=$r->brand_name;
            
            if(!!$brand->save()){
                return redirect(route('pmsbrand.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('pmsbrand.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pms_brand  $pms_brand
     * @return \Illuminate\Http\Response
     */
    public function show(pms_brand $pms_brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pms_brand  $pms_brand
     * @return \Illuminate\Http\Response
     */
    public function edit(pms_brand $pms_brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pms_brand  $pms_brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pms_brand $pms_brand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pms_brand  $pms_brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(pms_brand $pms_brand)
    {
        //
    }
}
