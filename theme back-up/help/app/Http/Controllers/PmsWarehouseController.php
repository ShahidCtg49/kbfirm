<?php

namespace App\Http\Controllers;

use App\Models\Pms_warehouse;
use Illuminate\Http\Request;
use App\Http\Requests\Pms_warehouse\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class PmsWarehouseController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouse=Pms_warehouse::paginate(10);
		return view('pms.warehouse.index',compact('warehouse'));
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
            $warehouse=new Pms_warehouse;
            $warehouse->warehouse_name=$r->warehouse_name;
            
            if(!!$warehouse->save()){
                return redirect(route('pmswarehouse.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('pmswarehouse.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pms_warehouse  $pms_warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Pms_warehouse $pms_warehouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pms_warehouse  $pms_warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Pms_warehouse $pms_warehouse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pms_warehouse  $pms_warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pms_warehouse $pms_warehouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pms_warehouse  $pms_warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pms_warehouse $pms_warehouse)
    {
        //
    }
}
