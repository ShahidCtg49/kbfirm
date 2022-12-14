<?php

namespace App\Http\Controllers;

use App\Models\pms_category;
use Illuminate\Http\Request;
use App\Http\Requests\Pms_category\AddNewRequest;

use App\Http\Traits\ResponseTrait;
use Exception;

class PmsCategoryController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=pms_category::paginate(10);
		return view('pms.category.index',compact('category'));
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
            $category=new pms_category;
            $category->category_name=$r->category_name;
            
            if(!!$category->save()){
                return redirect(route('pmscategory.index'))->with($this->responseMessage(true,null,"Data successfully created."));
            }
        }catch(Exception $e){
			dd($e);
            return redirect(route('pmscategory.create'))->with($this->responseMessage(false,"error","Please try again!"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pms_category  $pms_category
     * @return \Illuminate\Http\Response
     */
    public function show(pms_category $pms_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pms_category  $pms_category
     * @return \Illuminate\Http\Response
     */
    public function edit(pms_category $pms_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pms_category  $pms_category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pms_category $pms_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pms_category  $pms_category
     * @return \Illuminate\Http\Response
     */
    public function destroy(pms_category $pms_category)
    {
        //
    }
}
