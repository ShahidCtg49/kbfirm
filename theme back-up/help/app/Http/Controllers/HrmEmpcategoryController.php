<?php

namespace App\Http\Controllers;

use App\Models\Hrm_empcategory;
use Illuminate\Http\Request;
use App\Http\Requests\Empcategory\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class HrmEmpcategoryController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empcategory=Hrm_empcategory::paginate(10);
		return view('hrm.empcategory.index',compact('empcategory'));
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
            $empcategory=new Hrm_empcategory;
            $empcategory->empcategory=$r->empcategory;
            
            if(!!$empcategory->save()){
                return redirect(route('empcategory.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('empcategory.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hrm_empcategory  $hrm_empcategory
     * @return \Illuminate\Http\Response
     */
    public function show(Hrm_empcategory $hrm_empcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hrm_empcategory  $hrm_empcategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Hrm_empcategory $hrm_empcategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hrm_empcategory  $hrm_empcategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hrm_empcategory $hrm_empcategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hrm_empcategory  $hrm_empcategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hrm_empcategory $hrm_empcategory)
    {
        //
    }
}
